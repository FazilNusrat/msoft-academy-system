<template>
  <div class="q-pa-md q-gutter-sm">
    <q-btn label="Create Account" color="primary" @click="students = true" />

  <div class="col-md-9">
      <q-table
        title="Treats"
        :data="studentData"
        :columns="columns"
        row-key="name"
      />
    </div>
    <q-dialog v-model="students" students transition-show="scale" transition-hide="scale">
      <q-card class="bg-primary text-white" style="width: 550px">
        <q-card-section>
          <div class="text-h6">students</div>
        </q-card-section>

        <q-card-actions align="right" class="bg-white text-primary">
          <q-input color="primary" class="q-mb-sm" dense outlined v-model="student.first_name" label="First Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

          <q-input color="primary" class="q-mb-sm" dense outlined v-model="student.last_name" label="Last Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>
      
         <q-input color="primary" class="q-mb-sm" dense outlined v-model="student.father_name" label="Father Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" type="number" class="q-mb-sm" dense outlined v-model="student.cnic" label="CNIC" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" type="number" class="q-mb-sm" dense outlined v-model="student.phone" label="Phone" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" type="email" class="q-mb-sm" dense outlined v-model="student.email" label="Email" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="student.address" label="Address" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" type="number" class="q-mb-sm" dense outlined v-model="student.salary" label="Salary" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" type="number" class="q-mb-sm" dense dsnse outlined v-model="student.start_date" label="Start Date" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

        <q-input color="primary" type="number" class="q-mb-sm" dense outlined v-model="student.end_date" label="End Date" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

        </q-card-actions>
        <q-card-actions align="right" class="bg-primary text-primary">
          <q-btn flat label="Submit" @click="SaveRecord" class="bg-white" v-close-popup />
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
          name: "first_Name",
          align: "center",
          label: "First Name",
          field: "first_name",
          sortable: true,
        },
        {
          name: "last_Name",
          align: "center",
          label: "Last Name",
          field: "last_name",
          sortable: true,
        },
        {
          name: "father_Name",
          align: "center",
          label: "Father Name",
          field: "father_name",
          sortable: true,
        },
        {
          name: "cnic",
          align: "center",
          label: "Tazkara #",
          field: "cnic",
          sortable: true,
        },
        {
          name: "phone",
          align: "center",
          label: "Phone",
          field: "phone",
          sortable: true,
        },
        {
          name: "email",
          align: "center",
          label: "Email",
          field: "email",
          sortable: true,
        },
        {
          name: "address",
          align: "center",
          label: "Address",
          field: "address",
          sortable: true,
        },
        {
          name: "salary",
          align: "center",
          label: "Gender",
          field: "salary",
          sortable: true,
        },
        {
          name: "start_date",
          align: "center",
          label: "Start Date",
          field: "start_date",
          sortable: true,
        },
        {
          name: "end_date",
          align: "center",
          label: "end_date",
          field: "end_date",
          sortable: true,
        },
      ],

      students: false,
      studentData:[],
      student:{
        first_name:null,
        last_name:null,
        father_name:null,
        cnic:null,
        phone:null,
        email:null,
        address:null,
        salary:null,
        start_date:null,
        end_date:null
      }
    }
  },
 methods:{
    SaveRecord(){
      this.$axios.post('student/store',this.student).then(res=>{
          this.$q.notify({
                color: "green-4",
                textColor: "white",
                icon: "cloud_done",
                position:'top-right',
                messend_date: "Successfully inserted",
              })
              this.clear();
              this.getdata();
          // this.$router.push('/students/index')
        }).then(
          this.getdata()
        );
    },
    getdata()
    {
      this.$axios.get('student/display',this.studentData).then((Response)=>{
        this.studentData = Response.data;
      })
    },
    clear()
    {
        this.first_name='',
        this.last_name='',
        this.father_name='',
        this.cnic='',
        this.phone='',
        this.email='',
        this.address='',
        this.salary='',
        this.start_date='',
        this.end_date=''
    }
  },

  created()
  {
    this.getdata();
  }
}

</script>