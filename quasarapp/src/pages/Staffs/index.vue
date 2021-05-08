<template>
  <div class="q-ma-sm my_radio_less three_d q-pa-xs">
    <!-- <q-card class="bg-teal text-white" style="width: 300px">
        <q-card-section>
          <div class="text-h6">Add Class</div>
        </q-card-section> -->

    <h-title>Entry Staff</h-title>
    <div class="row justify-between q-mt-sm">
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
  </div>
</template>

<script>

import NTable from "../../components/tables/DataTable.vue";
import LButton from "../../components/Buttons/LinearButton.vue";
import HTitle from "../../components/Headers/HeaderTitle.vue";
import MModal from 'src/components/general-components/MainModal.vue';
import NAddModal from 'src/components/modals/class/Add.vue';
import NEditModal from 'src/components/modals/class/Edit.vue';
import NInfoModal from 'src/components/modals/class/Info.vue';

export default {
  components: { NTable, LButton, HTitle, MModal, NAddModal, NEditModal, NInfoModal },

  data() {
    return {
      getP:null,
      visible: true,
      loading: false,
      id: 0,
      showAddModal: false,
      showEditModal: false,
      showInfoModal: false,
      selectStaff: null,
      // staffClass: ['CS-Morning', 'IT-Evening'],
      staffClass: [],
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
          name: "last_name",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("last_name"),
          label: "last_name",
          field: (row) => row.last_name,
          sortable: true,
        },
        {
          name: "father_name",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("father_name"),
          label: "father_name",
          field: (row) => row.father_name,
          sortable: true,
        },
        {
          name: "email",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("email"),
          label: "email",
          field: (row) => row.email,
          sortable: true,
        },
        {
          name: "cnic",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("cnic"),
          label: "cnic",
          field: (row) => row.cnic,
          sortable: true,
        },
        {
          name: "phone",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("phone"),
          label: "phone",
          field: (row) => row.phone,
          sortable: true,
        },
        {
          name: "salary",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("salary"),
          label: "salary",
          field: (row) => row.salary,
          sortable: true,
        },
        {
          name: "address",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("address"),
          label: "address",
          field: (row) => row.address,
          sortable: true,
        },
        {
          name: "start_date",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("start_date"),
          label: "start_date",
          field: (row) => row.start_date,
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
      this.$axios.post("staff/store", this.form).then((res) => {
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
      (this.form.name = ""), 
      (this.form.last_name = ""), 
      (this.form.father_name = ""), 
      (this.form.email = ""), 
      (this.form.cnic = ""), 
      (this.form.phone = ""), 
      (this.form.salary = ""), 
      (this.form.address = "");
      (this.form.start_date = "");
    },
    getdata() {
      this.$axios.get("staff/", this.staffDate).then((Response) => {
        this.staffDate = Response.data;

     
      }); // this.$axios.get("staff/display", this.staffList).then((Response) => {
      //   this.staffList = Response.data;
    },
    head(name) {
      if (this.pagination.descending) this.pagination.descending = true;
      else this.pagination.descending = true;
      this.pagination.sortBy = name;
    },

    del(id = 0) {
      this.id = id;
      this.showEditModal = true;
    },
    info(id = 0) {
      this.id = id;
      this.showInfoModal = true;
    },
    onRequest(props) {
      // console.log("propss: ", props);
      this.getProp = props;
      this.getRecord();
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

}
  },
};

</script>

<style>
</style>