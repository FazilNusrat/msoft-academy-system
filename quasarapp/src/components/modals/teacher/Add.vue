<template>
  <div>
    <q-card >
      <q-form @submit.prevent="onSubmit" @reset="onReset">
        <!-- <q-card-section> -->
          <div class="three_d q-pa-sm bg-cyan-7 my_border_white_less glossy my_radio_less text-white">
            <div class="row justify-between">
              <div class="self-center">{{$t('AddTeacher')}}</div>
            <q-btn icon="close" flat round dense v-close-popup />
            </div>
            </div>
          
        <!-- </q-card-section> -->

        <q-separator />

        <q-card-section style="max-height: 50vh" class="scroll">
          <n-name icon="explore" :label="$t('Name')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.name"/>
          <n-simple icon="last_name" :label="$t('last_name')"  :name.sync="form.last_name"/>
          <n-simple icon="father_name" :label="$t('father_name')"  :name.sync="form.father_name"/>
          <n-simple icon="education" :label="$t('education')"  :name.sync="form.education"/>
          <n-simple icon="email" :label="$t('email')"  :name.sync="form.email"/>
          <n-simple icon="cnic" :label="$t('cnic')"  :name.sync="form.cnic"/>
          <n-simple icon="phone" :label="$t('phone')"  :name.sync="form.phone"/>
          <n-simple icon="gender_id" :label="$t('gender_id')"  :name.sync="form.gender_id"/>
          <n-simple icon="address" :label="$t('address')"  :name.sync="form.address"/>
          <n-simple icon="birth_day" :label="$t('birth_day')"  :name.sync="form.birth_day"/>
          <n-simple icon="age" :label="$t('age')"  :name.sync="form.age"/>
        </q-card-section>

        <q-separator />

        <q-card-actions align="right">
          <n-submit :submitting="submitting" :label="$t('Save')"></n-submit>
        </q-card-actions>
      </q-form>
    </q-card>
  </div>
</template>
<script>
import NName from 'src/components/fields/Name.vue'
import NSimple from 'src/components/fields/NameSimple.vue'
export default {
  name: 'Modal',
  components: {
    NName,
    NSimple,
    'n-submit': require('components/fields/Submit.vue').default
  },
  data () {
    return {
      submitting: false,
      form: {
        name:'',
        last_name:'',
        father_name:'',
        education:'',
        email:'',
        cnic:'',
        phone:'',
        gender_id:'',
        address:'',
        birth_day:'',
        age:''
      },
    }
  },
  methods: {
    onSubmit() {
      if (this.$refs.modalName.$refs.name.hasError) {
        this.$emit("close");
        this.$q.notify({
            color: "red-5",
            textColor: "white",
            icon: "warning",
            message: "You need to accept the license and terms first",
          });
      } else {
        this.submitting = true;
        this.$axios.post('teacher/store', this.form).then(res=>{
          this.submitting = false
          this.onReset();
          this.$emit("close");
          this.$q.notify({
            color: "green-4",
            textColor: "white",
            position:"top-right",
            icon: "cloud_done",
            message: "Successfull",
          });
      })
      }
    },
    onReset() {
      this.form.name = null;
      this.form.last_name = null;
      this.form.father_name = null;
      this.form.education = null;
      this.form.email = null;
      this.form.cnic = null;
      this.form.phone = null;
      this.form.gender_id = null;
      this.form.address = null;
      this.form.birth_day = null;
      this.form.age = null;

    },
  },
  created() {
  }

};
</script>

<style lang="css" scoped>
</style>
