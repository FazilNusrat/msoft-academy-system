<template>
  <div class="q-pa-md q-gutter-sm">
    <q-btn label="Create Account" color="primary" @click="teachers = true" />

  <div class="col-md-9">
      <q-table
        title="Treats"
        :data="teacherdata"
        :columns="columns"
        row-key="name"
      />
    </div>
    <q-dialog v-model="teachers" teachers transition-show="scale" transition-hide="scale">
      <q-card class="bg-primary text-white" style="width: 550px">
        <q-card-section>
          <div class="text-h6">Teachers</div>
        </q-card-section>

        <q-card-actions align="right" class="bg-white text-primary">
          <q-input color="primary" class="q-mb-sm" dense outlined v-model="teacher.first_name" label="First Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

          <q-input color="primary" class="q-mb-sm" dense outlined v-model="teacher.last_name" label="Last Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>
      
         <q-input color="primary" class="q-mb-sm" dense outlined v-model="teacher.father_name" label="Father Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="teacher.cnic" label="CNIC" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="teacher.phone" label="Phone" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="teacher.email" label="Email" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="teacher.address" label="Address" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="teacher.gender_id" label="Gender_Id" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense dsnse outlined v-model="teacher.birth_day" label="Birth Day" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="">
          </q-avatar>
        </template>
      </q-input>

        <q-input color="primary" class="q-mb-sm" dense outlined v-model="teacher.age" label="Age" style="width: 500px">
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
          name: "gender_id",
          align: "center",
          label: "Gender",
          field: "gender_id",
          sortable: true,
        },
        {
          name: "birth_day",
          align: "center",
          label: "Birth Day",
          field: "birth_day",
          sortable: true,
        },
        {
          name: "age",
          align: "center",
          label: "Age",
          field: "age",
          sortable: true,
        },
      ],

      teachers: false,
      teacherdata:[],
      teacher:{
        first_name:null,
        last_name:null,
        father_name:null,
        cnic:null,
        phone:null,
        email:null,
        address:null,
        gender_id:null,
        birth_day:null,
        age:null
      }
    }
  },
 methods:{
    SaveRecord(){
      this.$axios.post('teacher/store',this.teacher).then(res=>{
          this.$q.notify({
                color: "green-4",
                textColor: "white",
                icon: "cloud_done",
                position:'top-right',
                message: "Successfully inserted",
              })
              this.clear();
          this.$router.push('/teachers/index')
        });
    },
    getdata()
    {
      this.$axios.get('teacher/display',this.teacherdata).then((Response)=>{
        this.teacherdata = Response.data;
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
        this.gender_id='',
        this.birth_day='',
        this.age=''
    }
  },

  created()
  {
    this.getdata();
  }
}

</script>