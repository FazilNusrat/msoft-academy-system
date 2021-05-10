<template>
  <div class="q-pa-md q-gutter-sm">

    <h-title>Teacher Entry</h-title>
    <div class="row justify-between">
      <div class="row"> 
        <l-button icon="add" color="red" @click="addModal"
          >Add New</l-button
        >
        <l-button icon="mdi-file-pdf" color="orange">PDF</l-button>
        <l-button icon="mdi-microsoft-excel" color="green-10">Excel</l-button>
        <l-button icon="mdi-email-send" color="red-6">Email</l-button>
        <l-button icon="mdi-whatsapp" color="green-6">Whatsapp</l-button>
      </div>
      <div class="row">
        <l-button icon="mdi-database-search" color="blue-grey-9"
          >Advance Search</l-button
        >
        <l-button icon="mdi-database-import" color="blue-7">Import</l-button>
      </div>
    </div>
    <div>
      <n-table :title="$t('teacherList')" :loading="loading" :data="data" :pagination.sync="pagination" @del="del" @info="info" @edit="edit" :filter.sync="filter" :columns="columns" @request="onRequest" />

      <m-modal :showCM.sync="showAddModal">
    <n-add-modal @close="hideAddModal()" />
  </m-modal>
  <m-modal :showCM.sync="showEditModal">
    <n-edit-modal :id="id" @close="hideEditModal()" />
  </m-modal>
    </div>
  </div>
</template>

<script>
import NTable from "../../components/tables/DataTable.vue";
import LButton from "../../components/Buttons/LinearButton.vue";
import HTitle from "../../components/Headers/HeaderTitle.vue";
import NAddModal from 'src/components/modals/teacher/Add.vue'
import NEditModal from 'src/components/modals/teacher/Edit.vue'
import MModal from 'src/components/general-components/MainModal.vue'

export default {
  components: { NTable, LButton, HTitle, MModal,NAddModal, NEditModal},

  data() {
    return {
      id:0,
      showModal: false,
      showAddModal:false,
      showEditModal:false,
      form: {name:null},
      show:true,
      visible:true,
      filter: '',
      loading: false,
      pagination: {
        sortBy: 'created_at',
        descending: true,
        page: 1,
        rowsPerPage: 12,
        rowsNumber: 12 
      },
      columns: [
        {
          name: "id",
          required: true,
          label: this.$t("Number"),
          field: (row) => row.id,
          sortable: true,
          classes: "bg-grey-2 ellipsis my_width10",
          align: "center",
          headerClasses: "bg-light-blue-6 text-white ",
        },
        { name: 'name', align: 'center', label: 'Name', field: row=>row.name, sortable: true },
        { name: 'last_name',classes: 'bg-grey-2 ellipsis', align: 'center', label: 'last_name', field: row=>row.last_name, sortable: true },
        { name: 'father_name',classes: 'bg-grey-2 ellipsis', align: 'center', label: 'father_name', field: row=>row.father_name, sortable: true },
        { name: 'eduaction',classes: 'bg-grey-2 ellipsis', align: 'center', label: 'eduaction', field: row=>row.eduaction, sortable: true },
        { name: 'email',classes: 'bg-grey-2 ellipsis', align: 'center', label: 'email', field: row=>row.email, sortable: true },
        { name: 'cnic',classes: 'bg-grey-2 ellipsis', align: 'center', label: 'cnic', field: row=>row.cnic, sortable: true },
        { name: 'phone',classes: 'bg-grey-2 ellipsis', align: 'center', label: 'phone', field: row=>row.phone, sortable: true },
        { name: 'gender_id',classes: 'bg-grey-2 ellipsis', align: 'center', label: 'gender_id', field: row=>row.gender_id, sortable: true },
        { name: 'address',classes: 'bg-grey-2 ellipsis', align: 'center', label: 'address', field: row=>row.address, sortable: true },
        { name: 'birth_id',classes: 'bg-grey-2 ellipsis', align: 'center', label: 'birth_id', field: row=>row.birth_id, sortable: true },
        { name: 'age',classes: 'bg-grey-2 ellipsis', align: 'center', label: 'age', field: row=>row.age, sortable: true },
        { name: 'actions', label: 'Actions', classes: 'my_width10', sortable: false, align: 'center my_width20'},

      ],
      data: [],
      original: [],
      getProp:{}
    }
  },
  mounted () {
     this.onRequest({
      pagination: this.pagination,
      filter: undefined
    });
  },
  methods: {
    getRecord() {
      let p = this.getProp;
      this.visible = true;
      this.loading = true;
      this.$axios.get('teacher'+
      '?current_page='+
      p.pagination.page+'&per_page='+p.pagination.rowsPerPage+'&filter='+this.filter+'&sort_by='+p.pagination.sortBy+'&descending='+p.pagination.descending).then(res=>{
      this.pagination.sortBy = p.pagination.sortBy
        this.show = false;
        this.visible = false;
        this.loading = false;
        this.data = res.data.data;
      this.data = res.data.data;
      this.pagination.page = res.data.current_page;
      // console.log('p.pagination.sortBy===: ', this.pagination.sortBy==='name');
      // console.log('p.pagination.descending===: ', p.pagination.descending);
      if (this.pagination.sortBy==='name' || this.pagination.sortBy==='id')
         {
          if (this.pagination.descending)
             this.pagination.descending = false;
          else
            this.pagination.descending = true
         }
      this.pagination.rowsPerPage = res.data.per_page;
      this.pagination.rowsNumber = res.data.total;
      }).catch(error=>{

    })
    },
    clear() {
      (this.form.name = ""),
      (this.form.last_name = "");
      (this.form.father_name = "");
      (this.form.eduaction = "");
      (this.form.email = "");
      (this.form.cnic = "");
      (this.form.phone = "");
      (this.form.gender_id = "");
      (this.form.address = "");
      (this.form.birth_id = "");
      (this.form.age = "");
    },
    head(name) {
      if (this.pagination.descending) this.pagination.descending = true;
      else this.pagination.descending = true;
      this.pagination.sortBy = name;
    },

    del(id = 0) {
      this.id = id;
      // this.showEditModal = true;
      console.log(id);
    },
    

    edit(id = 0) {
      this.id = id;
      this.showEditModal = true;
    },
    addModal () {
      // alert("Clicked")
      // this.form.name = null;
      this.showAddModal = true;
    },
    hideAddModal () {
      this.showAddModal = false;
      this.getRecord()
    },
    hideEditModal () {
      this.showEditModal = false;
      this.getRecord()
    },
    info (id=0) {
      console.log('info: ', id);
    },
    onRequest (props) {
      console.log('propss: ', props);
      this.getProp = props
      this.getRecord();
    },
  },

  // created() {
  //   this.getdata();
  // },
};
</script>

<style>
</style>