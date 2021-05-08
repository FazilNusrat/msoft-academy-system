<template>
  <div>
    <q-card >
      <q-form @submit.prevent="onSubmit" @reset="onReset">
        <!-- <q-card-section> -->
          <div class="three_d q-pa-sm bg-cyan-7 text-white">{{$t('AddTeacher')}}</div>
        <!-- </q-card-section> -->

        <q-separator />
        <q-card-section style="max-height: 50vh" class="scroll">
          <n-name icon="explore" :label="$t('first_name')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.first_name"/>
          <n-name icon="explore" :label="$t('last_name')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.last_name"/>
          <n-name icon="explore" :label="$t('father_name')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.father_name"/>
          <n-name icon="explore" type="number" :label="$t('cnic')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.cnic"/>
          <n-name icon="explore" tye="number" :label="$t('phone')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.phone"/>
          <n-name icon="explore" type="email" :label="$t('email')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.email"/>
          <n-name icon="explore" :label="$t('address')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.address"/>
          <n-name icon="explore" type="number" :label="$t('gender_id')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.gender_id"/>
          <n-name icon="explore" type="number" :label="$t('birth_day')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.birth_day"/>
          <n-name icon="explore" type="number" :label="$t('age')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.age"/>
          <n-simple icon="description" :label="$t('Description')"  :name.sync="form.description"/>
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
        description:''
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
      this.form.first_name = null;
      this.form.last_name = null;
      this.form.father_name = null;
      this.form.cnic = null;
      this.form.phone = null;
      this.form.email = null;
      this.form.address = null;
      this.form.gender_id = null;
      this.form.birth_day = null;
      this.form.age = null;
      this.form.description = null;

    },

  },
  created() {
  }

};
</script>

<style lang="css" scoped>
</style>
