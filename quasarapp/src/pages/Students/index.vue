<template>
  <div class="q-ma-sm my_radio_less three_d q-pa-xs">
    <!-- <q-card class="bg-teal text-white" style="width: 300px">
        <q-card-section>
          <div class="text-h6">Add Class</div>
        </q-card-section> -->

    <h-title>Entry Student</h-title>
    <div class="row justify-between q-mt-sm">
      <div class="row">
        <l-button icon="add" color="red" @click="medium = true"
          >Add New</l-button
        >
        <l-button icon="mdi-file-pdf" color="orange">PDF</l-button>
        <l-button @click="addModal" icon="mdi-microsoft-excel" color="green-10"
          >Excel</l-button
        >
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
      <n-table
        :loading="loading"
        @head="head"
        :data="studentDate"
        :pagination.sync="pagination"
        @del="del"
        @info="info"
        @edit="edit"
        :filter.sync="filter"
        :columns="columns"
        @request="onRequest"
      />

      <m-modal :showCM.sync="showAddModal">
        <n-add-modal @close="hideAddModal()" />
      </m-modal>
      <m-modal :showCM.sync="showEditModal">
        <n-edit-modal :id="id" @close="hideEditModal()" />
      </m-modal>
      <m-modal :showCM.sync="showInfoModal">
        <n-info-modal :id="id" @close="hideInfoModal()" />
      </m-modal>
    </div>
    <q-dialog v-model="medium">
      <q-card style="width: 700px; width: 80vw">
        <q-card-section class="bg-teal text-white">
          <div class="text-h6">Add Student</div>
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
              <q-input color="teal" v-model="form.last_name" label="Last Name">
                <template v-slot:prepend>
                  <q-icon last_name="add" />
                </template>
              </q-input>
              <q-input
                color="teal"
                v-model="form.father_name"
                label="father_name"
              >
                <template v-slot:prepend>
                  <q-icon father_name="add" />
                </template>
              </q-input>
              <q-input
                color="teal"
                type="email"
                v-model="form.email"
                label="email"
              >
                <template v-slot:prepend>
                  <q-icon email="add" />
                </template>
              </q-input>
              <q-input
                color="teal"
                type="number"
                v-model="form.cnic"
                label="cnic"
              >
                <template v-slot:prepend>
                  <q-icon cnic="add" />
                </template>
              </q-input>
              <q-input
                color="teal"
                type="number"
                v-model="form.phone"
                label="phone"
              >
                <template v-slot:prepend>
                  <q-icon phone="add" />
                </template>
              </q-input>
              <q-input
                color="teal"
                type="number"
                v-model="form.salary"
                label="salary"
              >
                <template v-slot:prepend>
                  <q-icon salary="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.address" label="address">
                <template v-slot:prepend>
                  <q-icon address="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.regint" label="regint">
                <template v-slot:prepend>
                  <q-icon regint="add" />
                </template>
              </q-input>

              <q-select
                dense
                outlined
                v-model="selectStudent"
                :options="studentList"
                option-label="name"
                :label="$t('CreditLimitStatus')"
                class="q-ma-sm"
              >
                <template v-slot:prepend>
                  <q-icon name="credit_card_off" color="light-blue-8" />
                </template>
              </q-select>
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
    </q-dialog>
  </div>
</template>

<script>
import NTable from "../../components/tables/DataTable.vue";
import LButton from "../../components/Buttons/LinearButton.vue";
import HTitle from "../../components/Headers/HeaderTitle.vue";
import MModal from "src/components/general-components/MainModal.vue";
import NAddModal from "src/components/modals/class/Add.vue";
import NEditModal from "src/components/modals/class/Edit.vue";
import NInfoModal from "src/components/modals/class/Info.vue";

export default {
  components: {
    NTable,
    LButton,
    HTitle,
    MModal,
    NAddModal,
    NEditModal,
    NInfoModal,
  },

  data() {
    return {
      getP: null,
      visible: true,
      loading: false,
      id: 0,
      showAddModal: false,
      showEditModal: false,
      showInfoModal: false,

      selectStudent: null,
      // studentList: ['CS-Morning', 'IT-Evening'],
      studentList: [],
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
          classes: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "last_name",
          align: "left",
          field: (row) => row.last_name,
          sortable: true,
        },
        {
          name: "father_name",
          classes: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "father_name",
          align: "left",
          field: (row) => row.father_name,
          sortable: true,
        },
        {
          name: "email",
          classes: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "email",
          align: "left",
          field: (row) => row.email,
          sortable: true,
        },
        {
          name: "cnic",
          classes: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "cnic",
          align: "left",
          field: (row) => row.cnic,
          sortable: true,
        },
        {
          name: "phone",
          classes: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "phone",

          align: "left",
          field: (row) => row.description,
          sortable: true,
        },
        {
          name: "salary",
          classes: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "salary",
          align: "left",
          field: (row) => row.salary,
          sortable: true,
        },
        {
          name: "address",
          classes: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "address",
          align: "left",
          field: (row) => row.address,
          sortable: true,
        },
        {
          name: "regint",
          classes: "bg-grey-2 ellipsis my_width20",
          // label: this.$t("ContactPerson"),
          label: "regint",
          align: "left",
          field: (row) => row.regint,
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
      studentDate: [],
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
      this.$axios.post("subject/store", this.form).then((res) => {
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
      this.form.regint = "";
    },
    getRecord() {
      let p = this.getP;
      this.visible = true;
      this.loading = true;
      this.$axios
        .get(
          "class" +
            "?current_page=" +
            p.pagination.page +
            "&per_page=" +
            p.pagination.rowsPerPage +
            "&filter=" +
            this.filter +
            "&sort_by=" +
            p.pagination.sortBy +
            "&descending=" +
            this.pagination.descending
        )
        .then((res) => {
          this.show = false;
          this.visible = false;
          this.loading = false;
          this.studentDate = res.data;
          // this.studentDate = res.data.data;
          this.pagination.page = res.data.current_page;
          this.pagination.rowsPerPage = res.data.per_page;
          this.pagination.rowsNumber = res.data.total;
        })
        .catch((error) => {});
      // this.$axios.get("class/display", this.studentDate).then((Response) => {
      //   this.studentDate = Response.data;
      // });
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
      this.getRecord();
    },
    hideEditModal() {
      this.showEditModal = false;
      this.getRecord();
    },
    hideInfoModal() {
      this.showInfoModal = false;
      this.getRecord();
    },
    onRequest(props) {
      this.getP = props;
      this.getRecord();
    },
  },

  created() {
    // this.getRecord();
    this.onRequest({
      pagination: this.pagination,
      filter: undefined,
    });
  },
};
</script>

<style>
</style>