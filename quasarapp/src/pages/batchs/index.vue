<template>
  <div>
    <div class="q-ma-sm my_radio_less three_d q-pa-xs">
      <div class="row">
        <!-- <div class="three_d my_radio_less glossy q-ma-xs">
          <div class="row">
            <l-button icon="mdi-whatsapp" color="green-6"/>
            <l-button icon="mdi-whatsapp" color="green-6"/>
          </div>
          <div class="row">
            <l-button icon="mdi-whatsapp" color="green-6"/>
            <l-button icon="mdi-whatsapp" color="green-6"/>
          </div>
        </div> -->
        <div class="col">
          <div class="q-ma-xs  q-pa-xs">  
    <q-linear-progress rounded size="35px" value="0.14" color="light-blue-7" class="three_d  my_radio_less my_border_white glossy">
      <div class="text-white absolute-full q-ml-sm text-h6">Batch Master</div>
    </q-linear-progress>
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
      <n-table :loading="loading" @head="head" :data="batchData" :pagination.sync="pagination" @del="del" @info="info" @edit="edit" :filter.sync="filter" :columns="columns" @request="onRequest" />
    </div>
    <q-dialog v-model="medium">
      <q-card style="width: 700px; width: 80vw">
        <q-card-section class="bg-teal text-white">
          <div class="text-h6">Add Batch</div>
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
              <!-- <q-input
                color="teal"
                v-model="form.description"
                label="Description"
              >
                <template v-slot:prepend>
                  <q-icon name="info" />
                </template>
              </q-input> -->
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
      columns: [{
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
          classes: "my_width20",
          align: "left",
          // label: this.$t("Name"),
          label: "Name",
          field: (row) => row.name,
          sortable: true,
        },
        // {
        //   name: "description",
        //   classes: "bg-grey-2 ellipsis my_width20",
        //   // label: this.$t("ContactPerson"),
        //   label: "Description",
        //   align: "left",
        //   field: (row) => row.description,
        //   sortable: true,
        // },

        {
          name: "actions",
          label: this.$t("Actions"),
          align: "center",
          sortable: false,
          classes: "my_width10",
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
      batchData: [],
      form: {
        name: null,
        // description: null,
      },
    };
  },
  methods: {
    SaveRecord() {
      // console.log("Test File", this.form.name);
      this.$axios.post('batch/store', this.form).then((res) => {
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
      this.$axios.get('batch/display', this.batchData).then((Response) => {
        this.batchData = Response.data;
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

    edit(id = 0) {
      this.$router.push('/customer/edit/' + id);
    },
  },

  created() {
    this.getdata();
  },
};

</script>
<style>
</style>
