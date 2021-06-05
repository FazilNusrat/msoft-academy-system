<template>
  <div class="q-pa-md q-gutter-sm">
    <!-- <q-card class="bg-teal text-white" style="width: 300px">
        <q-card-section>
          <div class="text-h6">Add Class</div>
        </q-card-section> -->
    <h-title>Human Department Entry</h-title>
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
      <n-table :title="$t('humandepartmentList')" :loading="loading" :data="data" :pagination.sync="pagination" @del="del" @info="info" @edit="edit" :filter.sync="filter" :columns="columns" @request="onRequest" />

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
import NAddModal from 'src/components/modals/humandepartment/Add.vue'
import NEditModal from 'src/components/modals/humandepartment/Edit.vue'
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
        { name: 'description',classes: 'bg-grey-2 ellipsis', align: 'center', label: 'Description', field: row=>row.description, sortable: true },
        { name: 'actions', label: 'Actions', classes: 'my_width10', sortable: false, align: 'center my_width20'},

      ],
      data: [],
      original: [],
      getProp:{}
    }
  },
  mounted () {
    this.getLayoutButtonId();
     this.onRequest({
      pagination: this.pagination,
      filter: undefined
    });
  },
  methods: {
       getLayoutButtonId() {
      if (this.$route.query.id==7) {
        this.showAddModal = true;
      }
    },
    getRecord() {
      let p = this.getProp;
      this.visible = true;
      this.loading = true;
      this.$axios.get('class'+
      '?current_page='+
      p.pagination.page+'&per_page='+p.pagination.rowsPerPage+'&filter='+this.filter+'&sort_by='+p.pagination.sortBy+'&descending='+p.pagination.descending).then(res=>{
      this.pagination.sortBy = p.pagination.sortBy
        this.show = false;
        this.visible = false;
        this.loading = false;
        this.data = res.data.data;
      this.data = res.data.data;
      this.pagination.page = res.data.current_page;
      console.log('p.pagination.sortBy===: ', this.pagination.sortBy==='name');
      console.log('p.pagination.descending===: ', p.pagination.descending);
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
      (this.form.name = ""), (this.form.description = "");
    },
    head(name) {
      if (this.pagination.descending) this.pagination.descending = true;
      else this.pagination.descending = true;
      this.pagination.sortBy = name;
    },

    del(id = 0) {
      console.log('id is ',id);
      this.$delete(`class/${id}`);
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