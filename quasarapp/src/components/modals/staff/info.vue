<template>
  <div class="">
    <q-card >
      <q-form @submit.prevent="onSubmit" @reset="onReset">
        <!-- <q-card-section> -->
          <div class="three_d q-pa-sm bg-cyan-7 text-white">{{$t('Staff Dettails')}}</div>
        <!-- </q-card-section> -->

        <q-separator />

        <q-card-section style="max-height: 80vh" class="scroll" >
          <n-name ref="modalName" class="q-mb-sm" autofocus="autofocus" icosn="explore" :label="$t('Name')" refname="name" :name.sync="form.name" />
          <n-simple icon="last_name" class="q-mb-sm" :label="$t('last_name')" :name.sync="form.last_name"/>
          <n-simple icon="father_name" class="q-mb-sm" :label="$t('father_name')" :name.sync="form.father_name"/>
          <n-simple icon="education" class="q-mb-sm" :label="$t('education')" :name.sync="form.education"/>
          <n-simple icon="email" class="q-mb-sm" :label="$t('email')" :name.sync="form.email"/>
          <n-simple icon="roll_number" class="q-mb-sm" :label="$t('Roll Number')" :name.sync="form.roll_number"/>
          <n-simple icon="birth_day" class="q-mb-sm" :label="$t('birth_day')" :name.sync="form.birth_day"/>
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

  },
  created() {
  }

};
</script>

<style lang="css" scoped>
</style>
