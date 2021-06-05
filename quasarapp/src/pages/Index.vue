<template>
  <div class="q-pa-md q-gutter-sm">
    <q-btn label="Create Account" color="primary" @click="students = true" />

     <div class="q-pa-md">
    <q-table
      title="Treats"
      :data="studentData"
      :columns="columns"
      row-key="name"
    />
  </div>
          <h1>  </h1>

    <q-dialog v-model="students" teachers transition-show="scale" transition-hide="scale">
      <q-card class="bg-primary text-white" style="width: 550px">
        <q-card-section>
          <div class="text-h6">Student</div>
        </q-card-section>

        <q-card-actions align="right" class="bg-white text-primary">
          <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.first_name" label="First Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

          <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.last_name" label="Last Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>
      
         <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.father_name" label="Father Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
        
      </q-input>

      <q-input color="primary" class="q-mb-sm" type="number" dense outlined v-model="stdform.cnic" label="CNIC" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.phone" label="Phone" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" type="email" class="q-mb-sm" dense outlined v-model="stdform.email" label="Email" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.address" label="Address" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.regint" label="Regint" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>


        </q-card-actions>
        <q-card-actions align="right" class="bg-primary text-primary">
          <q-btn flat label="Submit" @click="AddRecord" class="bg-white" v-close-popup />
          <q-btn flat label="Close" class="bg-white" v-close-popup />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
export default {
  data () {
    return {
      
      columns: [
        {
          name: "first_name",
          align: "center",
          label: "First Name",
          field: "first_name",
          sortable: true,
        },
        {
          name: "last_name",
          align: "center",
          label: "Last Name",
          field: "last_name",
          sortable: true,
        },
        {
          name: "father_name",
          align: "center",
          label: "Father Name",
          field: "father_name",
          sortable: true,
        },
        {
          name: "cnic_name",
          align: "center",
          label: "Cnic Name",
          field: "cnic_name",
          sortable: true,
        },
        {
          name: "phone_name",
          align: "center",
          label: "Phone Name",
          field: "phone_name",
          sortable: true,
        },
        {
          name: "email_name",
          align: "center",
          label: "Email Name",
          field: "email_name",
          sortable: true,
        },
        {
          name: "address_name",
          align: "center",
          label: "address Name",
          field: "address_name",
          sortable: true,
        },
        {
          name: "regint_name",
          align: "center",
          label: "Regint Name",
          field: "regint_name",
          sortable: true,
        },
      ],
      students: false,
      
      medium: false,
      studentData: [],
      stdform:{
        first_name:null,
        last_name:null,
        father_name:null,
        cnic:null,
        phone:null,
        email:null,
        address:null,
        regint:null,
      },

    }
  },
 methods:
 {
  
  
    AddRecord(){

      this.$axios.post('student/store',this.stdform).then(res=>{
          this.$q.notify({
                color: "green-4",
                textColor: "white",
                icon: "cloud_done",
                position:'top-right',
                message: "Successfully inserted",
              })
              this.clear();
              this.getdata();
          // this.$router.push('/Students/index.vue')
        });
    }
  },
   getdata()
    {
      this.$axios.get('student/display',this.studentData).then((Response)=>{
        this.studentData = Response.data;
      })
    },
    //   clear()
    // {
    //     this.stdform.first_name='',
    //     this.stdform.last_name='',
    //     this.stdform.father_name='',
    //     this.stdform.cnic='',
    //     this.stdform.phone='',
    //     this.stdform.email='',
    //     this.stdform.address='',
    //     this.stdform.regint='',
    // },


   created()
  {
    // this.getdata();
  },
}

</script>