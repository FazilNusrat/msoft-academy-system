<template>
  <div class="q-pa-md q-gutter-sm">
    <!-- <q-card class="bg-teal text-white" style="width: 300px">
        <q-card-section>
          <div class="text-h6">Add Class</div>
        </q-card-section> -->
    <q-btn  color="primary" @click="medium = true">
      <q-icon name="add" />
    </q-btn>

    <div class="col-md-9">
      <q-table
        title="Treats"
        :data="subjectdata"
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
              <q-input color="teal" v-model="subject.name" label="Name">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="subject.description" label="Description">
                <template v-slot:prepend>
                  <q-icon name="info" />
                </template>
              </q-input>
              
            </div>
          </div>
        </q-card-section>

        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn flat  label="OK" @click="SaveRecord" v-close-popup>
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
          name: "Name",
          align: "center",
          label: "Name",
          field: "name",
          sortable: true,
        },
        {
          name: "description",
          label: "Description",
          field: "description",
          sortable: true,
        },
      ],
      medium: false,
      subjectdata:[],
      subject:{
        name:null,
        description:null
      }
    };
  },
  methods:{
    SaveRecord(){
    // console.log("Test File", this.subject.name);
    this.$axios.post('subject/store',this.subject).then(res=> {
     this.$q.notify({
                color: "green-4",
                textColor: "white",
                icon: "cloud_done",
                position:'top-right',
                message: "Successfully inserted",
              })
              this.clear()
        this.$router.push('/subjects/index')
    });
    },
    getdata()
    {
      this.$axios.get('subject/display',this.subjectdata).then ((Response) =>{
        this.subjectdata=Response.data;
      })
    },
   clear(){
      this.subject.name='',
      this.subject.description =''
    },
  },
  created()
  {
    this.getdata();
  }
};
</script>

<style>
</style>