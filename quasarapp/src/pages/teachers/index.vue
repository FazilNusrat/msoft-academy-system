<template>
  <div class="q-ma-sm my_radio_less three_d q-pa-xs">
    <!-- <q-card class="bg-teal text-white" style="width: 300px">
        <q-card-section>
          <div class="text-h6">Add Class</div>
        </q-card-section> -->

    <h-title>Entry Teachers</h-title>
    <div class="row justify-between q-mt-sm">
      <div class="row">
        <l-button icon="add" color="red" @click="medium = true"
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
      <n-table
        :loading="loading"
        @head="head"
        :data="classdata"
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
          <div class="text-h6">Add Teacher</div>
        </q-card-section>

        <q-card-section class="q-pt-none">
          <div class="row">
            <div class="col"></div>
            <div class="col-10 q-mr-lg">
              <q-input color="teal" v-model="form.first_name" label="first_name">
                <template v-slot:prepend>
                  <q-icon first_name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.last_name" label="last_name">
                <template v-slot:prepend>
                  <q-icon last_name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.father_name" label="father_name">
                <template v-slot:prepend>
                  <q-icon father_name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.cnic" label="cnic">
                <template v-slot:prepend>
                  <q-icon cnic="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.phone" label="phone">
                <template v-slot:prepend>
                  <q-icon phone="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.email" label="email">
                <template v-slot:prepend>
                  <q-icon email="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.address" label="address">
                <template v-slot:prepend>
                  <q-icon address="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.gender_id" label="gender_id">
                <template v-slot:prepend>
                  <q-icon gender_id="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.birth_day" label="birth_day">
                <template v-slot:prepend>
                  <q-icon birth_day="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.age" label="age">
                <template v-slot:prepend>
                  <q-icon age="add" />
                </template>
              </q-input>

              <q-select
                dense
                outlined
                v-model="selectTeacher"
                :options="teacherClass"
                option-label="first_name"
                :label="$t('CreditLimitStatus')"
                class="q-ma-sm"
              >
                <template v-slot:prepend>
                  <q-icon first_name="credit_card_off" color="light-blue-8" />
                </template>
              </q-select>
            </div>
          </div>
        </q-card-section>

        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn flat label="OK" @click="SaveRecord" v-close-popup>
            <q-icon first_name="save" />
          </q-btn>
          <q-btn flat label="close" v-close-popup>
            <q-icon first_name="close" />
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
      selectTeacher: null,
      // teacherClass: ['CS-Morning', 'IT-Evening'],
      teacherClass: [],
      columns: [
        {
          first_name: "id",
          required: true,
          label: this.$t("Number"),
          field: (row) => row.id,
          sortable: true,
          classes: "bg-grey-2 ellipsis my_width10",
          align: "center",
          headerClasses: "bg-light-blue-6 text-white ",
        },
        {
          first_name: "first_name",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("first_name"),
          label: "first_name",
          field: (row) => row.first_name,
          sortable: true,
        },
        {
          last_name: "last_name",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("last_name"),
          label: "last_name",
          field: (row) => row.last_name,
          sortable: true,
        },
        {
          father_name: "father_name",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("father_name"),
          label: "father_name",
          field: (row) => row.father_name,
          sortable: true,
        },
        {
          cnic: "cnic",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("cnic"),
          label: "cnic",
          field: (row) => row.cnic,
          sortable: true,
        },
        {
          phone: "phone",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("phone"),
          label: "phone",
          field: (row) => row.phone,
          sortable: true,
        },
        {
          email: "email",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("email"),
          label: "email",
          field: (row) => row.email,
          sortable: true,
        },
        {
          address: "address",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("address"),
          label: "address",
          field: (row) => row.address,
          sortable: true,
        },
        {
          gender_id: "gender_id",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("gender_id"),
          label: "gender_id",
          field: (row) => row.gender_id,
          sortable: true,
        },
        {
          birth_day: "birth_day",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("birth_day"),
          label: "birth_day",
          field: (row) => row.birth_day,
          sortable: true,
        },
        {
          age: "age",
          classes: "my_width20 bg-grey-2",
          align: "left",
          // label: this.$t("age"),
          label: "age",
          field: (row) => row.age,
          sortable: true,
        },
        {
          first_name: "actions",
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
        first_name: null,
        last_name: null,
        father_name: null,
        cnic: null,
        phone: null,
        email: null,
        address: null,
        gender_id: null,
        birth_day: null,
        age: null,
      },
    };
  },
  methods: {
    SaveRecord() {
      this.visible = true;
      this.loading = true;
      // console.log("Test File", this.form.first_name);
      this.$axios.post("teacher/store", this.form).then((res) => {
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
      (this.form.first_name = ""), 
      (this.form.last_name = ""), 
      (this.form.father_name = ""), 
      (this.form.cnic = ""), 
      (this.form.phone = ""), 
      (this.form.email = ""), 
      (this.form.address = ""), 
      (this.form.gender_id = "");
      (this.form.birth_day = "");
      (this.form.age = "");
    },
    getRecord() {
      let p = this.getP;
      this.visible = true;
      this.loading = true;
      this.$axios.get('class'+
      '?current_page='+
      p.pagination.page+'&per_page='+p.pagination.rowsPerPage+'&filter='+this.filter+'&sort_by='+p.pagination.sortBy+'&descending='+this.pagination.descending).then(res=>{
      this.show = false;
      this.visible = false;
      this.loading = false;
      this.classdata = res.data;
      // this.classdata = res.data.data;
      this.pagination.page = res.data.current_page;
      this.pagination.rowsPerPage = res.data.per_page;
      this.pagination.rowsNumber = res.data.total;
      }).catch(error=>{

    })
      // this.$axios.get("class/display", this.classdata).then((Response) => {
      //   this.classdata = Response.data;
      // });
    },
    head(first_name) {
      if (this.pagination.descending) this.pagination.descending = true;
      else this.pagination.descending = true;
      this.pagination.sortBy = first_name;
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
      // this.form.first_name = null;
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

  created() {
    // this.getRecord();
    this.onRequest({
      pagination: this.pagination,
      filter: undefined
    });
  },
};
</script>

<style>
</style>