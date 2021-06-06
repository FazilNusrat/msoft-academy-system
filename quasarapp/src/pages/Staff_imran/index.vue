<template>
  <div>
    <q-card >
      <q-form class="q-pa-lg"> 
          <div class="row">
              <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('ID')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.ID"/>      
              </div>
                <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('First Name')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.First_Name"/>      
                </div>
                <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('Last Name')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.last_name"/>      
                </div>
          </div>
          <div class="row">
              <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('Father Name')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.father_name"/>      
              </div>
                <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('Phone')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.phone"/>      
                </div>
                <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('Email')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.email"/>      
                </div>
          </div>
          <div class="row">
              <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('Photo')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.hoto"/>      
              </div>
                <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('Salary')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.salary"/>      
                </div>
                <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('Address')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.address"/>      
                </div>
          </div>
          <div class="row">
              <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('City')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.city"/>      
              </div>
                <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('Job Name')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.job_name"/>      
                </div>
                <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('Commission')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.commission"/>      
                </div>
          </div>
          <div class="row">
              <div class="col-md-4 q-pa-sm">
              <date-picker :label="$t('Hire Date')" />
              </div>
                <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('Department ID')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.dep_id"/>      
                </div>
                <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('Manager ID')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.manager_Id"/>      
                </div>
          </div>
          
          <!-- <div class="row">
              <div class="col-md-12 q-pa-sm">
                <n-simple icon="explore" :label="$t('Email')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.name"/>      
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 q-pa-sm">
                <n-simple icon="explore" :label="$t('Phone')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.name"/>      
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 q-pa-sm">
                <n-simple icon="explore" :label="$t('Current_Address')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.name"/>      
              </div>
          </div>
          <div class="row">
              <div class="col-md-4 q-pa-sm">
                   <date-picker
                :label="$t('Date_Of_Birth')"
              /> 
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 q-pa-sm">
                <n-simple icon="explore" :label="$t('Permenent_Address')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.name"/>      
              </div>
          </div>
          <div class="row">
              <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('Gender')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.name"/>      
              </div>
                <div class="col-md-4 q-pa-sm">
                <n-simple icon="explore" :label="$t('Tazkera_Number')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.name"/>      
                </div>
          </div>
          <div class="row">
              <div class="col-md-12 q-pa-sm">
                <n-simple icon="explore" :label="$t('Education_Level')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.name"/>      
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 q-pa-sm">
                <n-simple icon="explore" :label="$t('Experience')" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.name"/>      
              </div> -->
          <!-- </div> -->
      </q-form>
    </q-card>
  </div>
</template>
<script>
import NName from 'src/components/fields/Name.vue'
import NSimple from 'src/components/fields/NameSimple.vue'
import DatePicker from 'src/components/fields/date-picker.vue'
import NameSimple from '../../components/fields/NameSimple.vue';
export default {
  name: 'Modal',
  components: {
    NName,
    NSimple,
    DatePicker,
    'n-submit': require('components/fields/Submit.vue').default
  },
  data () {
    NameSimple
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
};
</script>

<style lang="css" scoped>
</style>
