<template>
  <div class="q-ma-sm my_radio_less three_d q-pa-xs">
    <h-title>Department Entry</h-title>
    <div class="row justify-between">
      <div class="row"> 
        <l-button icon="add" color="red" @click="addModal"
          >Add New</l-button
        >
        <l-button icon="mdi-file-pdf" color="orange">PDF</l-button>
        <l-button @click="addModal" icon="mdi-microsoft-excel" color="green-10">Excel</l-button>
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
import NAddModal from 'src/components/modals/department/Add.vue'
import NEditModal from 'src/components/modals/department/Edit.vue'
import MModal from 'src/components/general-components/MainModal.vue'

export default {
  components: {
    NTable,
    LButton,
    HTitle,
    MModal,
    NAddModal,
    NEditModal,
    // NInfoModal,
  },

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
        {
          name: "name",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("Name"),
          label: "Name",
          field: (row) => row.name,
          sortable: true,
        },
        {
          name: "description",
          classes: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "Description",
          align: "left",
          field: (row) => row.description,
          sortable: true,
        },

        {
          name: "actions",
          label: this.$t("Actions"),
          align: "center",
          sortable: false,
          classes: "bg-grey-2 my_width10",
        },
      ],
      loading: false,
      filter: "",
      sortBy: "created_at",
      descending: false,
      page: 1,
      rowsPerPage: 12,
      rowsNumber: 12,
      pagination: {
        sortBy: "created_at",
        descending: false,
        page: 1,
        rowsPerPage: 12,
        rowsNumber: 12,
      },
      medium: false,
      classdata: [],
      form: {
        name: null,
        description: null,
      },
    };
  },
  methods: {
    SaveRecord() {
      this.visible = true;
      this.loading = true;
      // console.log("Test File", this.form.name);
      this.$axios.post("department/store", this.form).then((res) => {
        this.$q.notify({
          color: "green-4",
          textColor: "white",
          icon: "cloud_done",
          position: "top-right",
          message: "Successfully inserted",
        });
        this.clear();
        // this.$router.push("/class/index");
        this.getRecord();
      });
    },
    clear() {
      (this.form.name = ""), (this.form.description = "");
    },
    head(name) {
      if (this.pagination.descending) this.pagination.descending = true;
      else this.pagination.descending = true;
      this.pagination.sortBy = name;
    },
    
    hideAddModal () {
      this.showAddModal = false;
      this.getRecord()
    },
    edit(id = 0) {
      this.id = id;
      this.showEditModal = true;
    },
    addModal() {
      // this.form.name = null;
      this.showAddModal = true;
    },
    hideAddModal() {
      this.showAddModal = false;
      this.getRecord()
    },
    hideEditModal() {
      this.showEditModal = false;
      this.getRecord()
    },
    hideInfoModal() {
      this.showInfoModal = false;
      this.getRecord()
    },
    onRequest(props) {
       this.getP = props;
      this.getRecord();
    },
  },
};
</script>

<style>
</style>