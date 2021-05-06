<template>
  <div class="q-pa-md q-gutter-sm">
    <!-- <q-card class="bg-teal text-white" style="width: 300px">
        <q-card-section>
          <div class="text-h6">Add Class</div>
        </q-card-section> -->
    <h-title>Subjects Entry</h-title>
    <div class="row justify-between">
      <div class="row">
        <l-button icon="add" color="red" @click="addModal"
          >Add New</l-button
        >
        <l-button icon="mdi-file-pdf" color="orange">PDF</l-button>
        <l-button icon="mdi-microsoft-excel" color="green-10">Excel</l-button>
        <l-button icon="mdi-email-send" color="red-6">Email</l-button>
        <l-button icon="mdi-whatsapp" color="orange-6">Whatsapp</l-button>
      </div>
      <div class="row">
        <l-button icon="mdi-database-search" color="blue-grey-9"
          >Advance Search</l-button
        >
        <l-button icon="mdi-database-import" color="blue-7">Import</l-button>
      </div>
    </div>
    <div>
      <n-table :title="$t('SubjectList')" :loading="loading" :data="data" :pagination.sync="pagination" @del="del" @info="info" @edit="edit" :filter.sync="filter" :columns="columns" @request="onRequest" />

      <m-modal :showCM.sync="showAddModal">
    <n-add-modal @close="hideAddModal()" />
  </m-modal>
  <m-modal :showCM.sync="showEditModal">
    <n-edit-modal :id="id" @close="hideEditModal()" />
  </m-modal>
    </div>
    <!-- <q-dialog v-model="medium">
      <q-card style="width: 700px; width: 80vw">
        <q-card-section class="bg-teal text-white">
          <div class="text-h6">Add Subject</div>
        </q-card-section>

        <q-card-section class="q-pt-none">
          <div class="row">
            <div class="col"></div>
            <div class="col-10 q-mr-lg">
              <q-input color="teal" v-model="form.name" label="Name">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input
                color="teal"
                v-model="form.description"
                label="Description"
              >
                <template v-slot:prepend>
                  <q-icon name="info" />
                </template>
              </q-input>
            </div>
          </div>
        </q-card-section>

        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn flat label="OK" @click="SaveRecord" v-close-popup>
            <q-icon name="save" />
          </q-btn>
          <q-btn flat label="close" v-close-popup>
            <q-icon name="close" />
          </q-btn>
        </q-card-actions>
      </q-card>
    </q-dialog> -->
  </div>
</template>

<script>
import NTable from "../../components/tables/DataTable.vue";
import LButton from "../../components/Buttons/LinearButton.vue";
import HTitle from "../../components/Headers/HeaderTitle.vue";
import NAddModal from 'src/components/modals/subject/Add.vue'
import NEditModal from 'src/components/modals/subject/Edit.vue'
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
          name: 'number',
          required: true,
          label: 'Number',
          align: 'center',
          field: row => row.symbol,
          sortable: true,
          classes: 'bg-grey-2 ellipsis my_width10',
          headerClasses: ' text-white'
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
      this.$axios.get('subject'+
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
    getdata() {
      this.$axios.get("subject/display", this.subjectdata).then((Response) => {
        this.subjectdata = Response.data;
      });
    },
    head(name) {
      if (this.pagination.descending) this.pagination.descending = true;
      else this.pagination.descending = true;
      this.pagination.sortBy = name;
    },

    edit (id=0) {
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
    del (id=0) {
      console.log('dels: ', id);
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