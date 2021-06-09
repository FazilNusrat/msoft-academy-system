<template>
  <div class="">
    <q-card >
      <q-form @submit.prevent="onSubmit" @reset="onReset">
        <!-- <q-card-section> -->
          <div class="three_d q-pa-sm bg-cyan-7 text-white">{{$t('ModifySubject')}}</div>
        <!-- </q-card-section> -->

        <q-separator />

        <q-card-section style="max-height: 50vh" class="scroll">
          <n-name ref="modalName" class="q-mb-sm" autofocus="autofocus" icon="explore" :label="$t('Name')" refname="name" :name.sync="form.name"/>
          <n-simple icon="last_name" :label="$t('last_name')" :name.sync="form.last_name"/>
          <n-simple icon="father_name" :label="$t('father_name')" :name.sync="form.father_name"/>
          <n-simple icon="email" :label="$t('email')" :name.sync="form.email"/>
          <n-simple icon="cnic" :label="$t('cnic')" :name.sync="form.cnic"/>
          <n-simple icon="phone" :label="$t('phone')" :name.sync="form.phone"/>
          <n-simple icon="fees" :label="$t('fees')" :name.sync="form.fees"/>
          <n-simple icon="address" :label="$t('address')" :name.sync="form.address"/>
          <n-simple icon="regint" :label="$t('regint')" :name.sync="form.regint"/>
        </q-card-section>

        <q-separator />

        <q-card-actions align="right">
          <n-submit :submitting="submitting" label="Update"></n-submit>
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
  props:['id'],
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
        fees:'',
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
        this.$axios.patch('student/'+this.id, this.form).then(res=>{
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
      this.form.fees = null;
      this.form.address = null;
      this.form.regint = null;

    },
    edit() {
      this.$axios.get('student/edit/'+this.id).then(res=>{
        this.form.name = res.data.name;
        this.form.last_name = res.data.last_name;
        this.form.father_name = res.data.father_name;
        this.form.email = res.data.email;
        this.form.cnic = res.data.cnic;
        this.form.phone = res.data.phone;
        this.form.fees = res.data.fees;
        this.form.address = res.data.address;
        this.form.regint = res.data.regint;
        console.log('res',res);
      })
    }

  },
  created() {
    this.edit();
  }

};
</script>

<style lang="css" scoped>
</style>
