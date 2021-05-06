<template>
  <div staff="q-pa-md q-gutter-sm ">
      <div class="row">

        <div class="col">
          <div class="q-ma-xs  q-pa-xs">  

    <h-title value="0.14" >Add Staff</h-title>
    </div>
    <div class="row justify-between">
      <div class="row">
        <l-button icon="add" color="red" @click="medium = true">Add New</l-button>
        <l-button icon="mdi-file-pdf" color="orange">PDF</l-button>
        <l-button icon="mdi-microsoft-excel" color="green-10">Excel</l-button>
        <l-button icon="mdi-email-send" color="red-6">Email</l-button>
        <l-button icon="mdi-whatsapp" color="green-6">Whatsapp</l-button>
      </div>
      <div class="row">
        <l-button icon="mdi-database-search" color="blue-grey-9">Advance Search</l-button>
        <l-button icon="mdi-database-import" color="blue-7">Import</l-button>
      </div>
    </div>
        </div>
      </div>

    <div>
      <n-table
        :loading="loading"
        @head="head"
        :data="staffDate"
        :pagination.sync="pagination"
        @del="del"
        @info="info"
        @edit="edit"
        :filter.sync="filter"
        :columns="columns"
        @request="onRequest"
      />
    </div>
    <q-dialog v-model="medium">
      <q-card style="width: 700px; width: 80vw">
        <q-card-section staff="bg-teal text-white">
          <div staff="text-h6">Add staff</div>
        </q-card-section>

        <q-card-section staff="q-pt-none">
          <div staff="row">
            <div staff="col"></div>
            <div staff="col-10 q-mr-lg">
              <q-input color="teal" v-model="form.name" label="Name">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.last_name" label="Last Name">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.father_name" label="Father Name">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" tye="email" v-model="form.email" label="Email">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" type="number" v-model="form.cnic" label="CNIC">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" type="number" v-model="form.phone" label="Phone">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.salary" label="Salary">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.address" label="Address">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" type="date" v-model="form.start_date">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
            </div>
          </div>
        </q-card-section>

        <q-card-actions align="right" staff="bg-white text-teal">
          <q-btn flat label="OK" @click="SaveRecord" v-close-popup>
            <q-icon name="save" />
          </q-btn>
          <q-btn flat label="close" v-close-popup>
            <q-icon name="close" />
          </q-btn>
        </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import NTable from "../../components/tables/DataTable.vue";
import LButton from "../../components/Buttons/LinearButton.vue";
import HTitle from "../../components/Headers/HeaderTitle.vue";

export default {
  components: { NTable, LButton, HTitle},

  data() {
    return {
      selectedstaff:null,
      staffList: [],
      columns: [
        {
          name: "id",
          required: true,
          label: this.$t("Number"),
          field: (row) => row.id,
          sortable: true,
          staffes: "bg-grey-2 ellipsis my_width10",
          align: "center",
          headerstaffes: "bg-light-blue-6 text-white ",
        },
        {
          name: "name",
          staff: "my_width20 bg-grey-2",
          align: "left",
          label: "Name",
          field: (row) => row.name,
          sortable: true,
        },
        {
          name: "last_name",
          staff: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "Last name",
          align: "left",
          field: (row) => row.last_name,
          sortable: true,
        },
        {
          name: "father_name",
          staff: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "Father Name",
          align: "left",
          field: (row) => row.father_name,
          sortable: true,
        },
        {
          name: "email",
          staff: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "Email",
          align: "left",
          field: (row) => row.email,
          sortable: true,
        },
        {
          name: "cnic",
          staff: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "CNIC",
          align: "left",
          field: (row) => row.cnic,
          sortable: true,
        },
        {
          name: "phone",
          staff: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "Phone",
          align: "left",
          field: (row) => row.phone,
          sortable: true,
        },
        {
          name: "salry",
          staff: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "Salry",
          align: "left",
          field: (row) => row.Phone,
          sortable: true,
        },
        {
          name: "address",
          staff: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "Address",
          align: "left",
          field: (row) => row.address,
          sortable: true,
        },
        {
          name: "start_date",
          staff: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "Start Date",
          align: "left",
          field: (row) => row.start_date,
          sortable: true,
        },
        

        {
          name: "actions",
          label: this.$t("Actions"),
          align: "center",
          sortable: false,
          staffes: "bg-grey-2 my_width10",
        },
      ],
      loading: false,
      filter: "",
      sortBy: "created_at",
      descending: false,
      page: 1,
      rowsPerPage: 12,
      rowsNumber: 12,
      data: [],
      pagination: {
        sortBy: "created_at",
        descending: false,
        page: 1,
        rowsPerPage: 12,
        rowsNumber: 12,
      },
      medium: false,
      staffDate: [],
      form: {
        name: null,
        last_name: null,
        father_name: null,
        email: null,
        cnic: null,
        phone: null,
        salary: null,
        address: null,
        start_date: null,
      },
    };
  },
  methods: {
    SaveRecord() {
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
        // this.$router.push("/staff/index");
        this.getdata();
      });
    },
    clear() {
      (this.form.name = ""), 
      (this.form.last_name = "");
      (this.form.father_name = "");
      (this.form.email = "");
      (this.form.cnic = "");
      (this.form.phone = "");
      (this.form.salary = "");
      (this.form.address = "");
      (this.form.start_date = "");
    },
    getdata() {
      this.$axios.get("staff/", this.staffDate).then((Response) => {
        this.staffDate = Response.data;

      // this.$axios.get("staff/display", this.staffList).then((Response) => {
      //   this.staffList = Response.data;


      });
    },
    head(name) {
      if (this.pagination.descending) this.pagination.descending = true;
      else this.pagination.descending = true;
      this.pagination.sortBy = name;
    },
  

  del(id = 0) {
    console.log("dels: ", id);
  },
  info(id = 0) {
    this.$router.push("/customer/show/" + id);
  },
  onRequest(props) {
    // console.log("propss: ", props);
    this.getProp = props;
    this.getRecord();
  },
  
edit (id=0) {
        this.$router.push('/customer/edit/'+id);
    },
  },

  created() {
    this.getdata();
  },
};
</script>

<style>
</style>