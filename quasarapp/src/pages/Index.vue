<template>
  <div class="q-pa-md q-gutter-sm">
    <q-btn label="Create Account" color="primary" @click="students = true" />

    <q-dialog v-model="students" teachers transition-show="scale" transition-hide="scale">
      <q-card class="bg-primary text-white" style="width: 550px">
        <q-card-section>
          <div class="text-h6">Student</div>
        </q-card-section>

        <q-card-actions align="right" class="bg-white text-primary">
          <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.first_name" label="First Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

          <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.last_name" label="Last Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>
      
         <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.father_name" label="Father Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.cnic" label="CNIC" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.phone" label="Phone" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.email" label="Email" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.address" label="Address" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="stdform.regint" label="Regint" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
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
      students: false,
      std:[],
      stdform:{
        first_name:null,
        last_name:null,
        father_name:null,
        cnic:null,
        phone:null,
        email:null,
        address:null,
        regint:null,
      }
    }
  },
 methods:{
    AddRecord(){

      this.$axios.post('student/store',this.stdform).then(res=>{
          this.$q.notify({
                color: "green-4",
                textColor: "white",
                icon: "cloud_done",
                position:'top-right',
                message: "Successfully inserted",
              })
          this.$router.push('/Students/index.vue')
        });
    }
  }
}

</script>