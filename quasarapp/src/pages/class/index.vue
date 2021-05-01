<template>
  <div class="q-pa-md q-gutter-sm">
    <!-- <q-card class="bg-teal text-white" style="width: 300px">
        <q-card-section>
          <div class="text-h6">Add Class</div>
        </q-card-section> -->

    <h-title>Entry Class</h-title>
    <div class="row justify-between">
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
          <div class="text-h6">Add Class</div>
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

              <q-select
                dense
                outlined
                v-model="selectedClass"
                :options="classList"
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
import MModal from 'src/components/general-components/MainModal.vue';
import NAddModal from 'src/components/modals/class/Add.vue';
import NEditModal from 'src/components/modals/class/Edit.vue';
import NInfoModal from 'src/components/modals/class/Info.vue';

export default {
  components: { NTable, LButton, HTitle, MModal, NAddModal, NEditModal, NInfoModal },

  data() {
    return {
      id: 0,
      showAddModal: false,
      showEditModal: false,
      showInfoModal: false,
      selectedClass: null,
      // classList: ['CS-Morning', 'IT-Evening'],
      classList: [],
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
      data: [],
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
      // console.log("Test File", this.form.name);
      this.$axios.post("class/store", this.form).then((res) => {
        this.$q.notify({
          color: "green-4",
          textColor: "white",
          icon: "cloud_done",
          position: "top-right",
          message: "Successfully inserted",
        });
        this.clear();
        // this.$router.push("/class/index");
        this.getdata();
      });
    },
    clear() {
      (this.form.name = ""), (this.form.description = "");
    },
    getdata() {
      this.$axios.get("class/display", this.classdata).then((Response) => {
        this.classdata = Response.data;

        this.$axios.get("class/display", this.classList).then((Response) => {
          this.classList = Response.data;
        });
      });
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
  },

  created() {
    this.getdata();
  },
};
</script>

<style>
</style>