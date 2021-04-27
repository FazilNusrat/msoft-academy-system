<template>
  <div class="q-pa-md q-gutter-sm">
    <q-btn label="Create Account" color="primary" @click="teachers = true" />

    <q-dialog v-model="teachers" teachers transition-show="scale" transition-hide="scale">
      <q-card class="bg-primary text-white" style="width: 550px">
        <q-card-section>
          <div class="text-h6">Teachers</div>
        </q-card-section>

        <q-card-actions align="right" class="bg-white text-primary">
          <q-input color="primary" class="q-mb-sm" dense outlined v-model="form.first_name" label="First Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

          <q-input color="primary" class="q-mb-sm" dense outlined v-model="form.last_name" label="Last Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>
      
         <q-input color="primary" class="q-mb-sm" dense outlined v-model="form.father_name" label="Father Name" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="form.cnic" label="CNIC" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="form.phone" label="Phone" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="form.email" label="Email" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="form.address" label="Address" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense outlined v-model="form.gender_id" label="Gender_Id" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

      <q-input color="primary" class="q-mb-sm" dense dsnse outlined v-model="form.birth_day" label="Birth Day" style="width: 500px">
        <template v-slot:append>
          <q-avatar>
            <img src="https://lh3.googleusercontent.com/p/AF1QipOG8-OnUc2-cUURj-iANnzco9N1jWsgQJZf4CDJ=s1600-w400">
          </q-avatar>
        </template>
      </q-input>

        <q-input color="primary" class="q-mb-sm" dense outlined v-model="form.age" label="Age" style="width: 500px">
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
      teachers: false,
      teachers:[],
      form:{
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
    AddRecord(){

      this.$axios.post('teacher/store',this.form).then(res=>{
          this.$q.notify({
                message: "Successfully inserted",
              })
          this.$router.push('/teacher')
        });
    }
  }
}

</script>