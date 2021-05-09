<template>
  <div>
    <q-card >
      <q-form @submit.prevent="onSubmit" @reset="onReset">
        <!-- <q-card-section> -->
          <div class="three_d q-pa-sm bg-cyan-7 text-white">{{$t('AddStudent')}}</div>
        <!-- </q-card-section> -->

        <q-separator />

        <q-card-section style="max-height: 50vh" class="scroll">
          <n-name icon="explore" :label="$t('name')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.name"/>
          <n-simple icon="explore" :label="$t('last_name')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.last_name"/>
          <n-simple icon="explore" :label="$t('father_name')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.father_name"/>
          <n-simple icon="explore" type="email" :label="$t('email')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.email"/>
          <n-simple icon="explore" type="number" :label="$t('cnic')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.cnic"/>
          <n-name icon="explore" type="number" :label="$t('phone')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.phone"/>
          <n-simple icon="explore" :label="$t('salary')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.salary"/>
          <n-simple icon="explore" :label="$t('address')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.address"/>
          <n-simple icon="explore" :label="$t('regint')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.regint"/>
        
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
        email:'',
        cnic:'',
        phone:'',
        salary:'',
        address:'',
        regint:''
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
        this.$axios.post('student/store', this.form).then(res=>{
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
      this.form.email = null;
      this.form.cnic = null;
      this.form.phone = null;
      this.form.salary = null;
      this.form.address = null;
      this.form.regint = null;

    },

  },
  created() {
  }

};
</script>

<style lang="css" scoped>
</style>
