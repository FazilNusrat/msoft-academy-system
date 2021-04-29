<template>
  <div class="q-pa-md q-gutter-sm">
    <!-- <q-card class="bg-teal text-white" style="width: 300px">
        <q-card-section>
          <div class="text-h6">Add Class</div>
        </q-card-section> -->
    <q-btn color="primary" @click="medium = true">
      <q-icon name="add" />
    </q-btn>

     <div class="col-md-9">
      <q-table
        title="Treats"
        :data="batchdata"
        :columns="columns"
        row-key="name"
      />
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
              <q-input
                filled
                v-model="batch.date"
                mask="date"
                :rules="['date']"
              >
                <template v-slot:append>
                  <q-icon name="event" class="cursor-pointer">
                    <q-popup-proxy
                      ref="qDateProxy"
                      transition-show="scale"
                      transition-hide="scale"
                    >
                      <q-date v-model="batch.date">
                        <div class="row items-center justify-end">
                          <q-btn
                            v-close-popup
                            label="Close"
                            color="primary"
                            flat
                          />
                        </div>
                      </q-date>
                    </q-popup-proxy>
                  </q-icon>
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
    </q-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
       columns: [
        {
          name: "date",
          align: "center",
          label: "Batchs",
          field: "date",
          sortable: true,
        },
       
      ],
      medium: false,
      date: "2019-02-01 12:44",
      batchdata: [],
      batch: {
        date: null,
      },
    };
  },
  methods: {
    SaveRecord() {
      // console.log("Test File", this.form.name);
      this.$axios.post("batch/store", this.batch).then((res) => {
        this.$q.notify({
          color: "green-4",
          textColor: "white",
          icon: "cloud_done",
          position: "top-right",
          message: "Successfully inserted",
        });
        this.$route.push("/batchs/index");
      });
    },
    getdata()
    {
      this.$axios.get('batch/display',this.batchdata).then((Response)=>{
        this.batchdata = Response.data;
      })
    },
    clear()
    {
      this.batch.data = '';
    }
  },
  created()
  {
    this.getdata();
    this.SaveRecord();
  }
};
</script>

<style>
</style>