<template>
  <div class="">
    <q-card >
      <q-form @submit.prevent="onSubmit" @reset="onReset">
        <!-- <q-card-section> -->
          <div class="three_d q-pa-sm bg-cyan-7 text-white">{{$t('imran')}}</div>
        <!-- </q-card-section> -->

        <!-- <q-separator />

        <q-card-section style="max-height: 80vh" class="scroll" >
          <n-name ref="modalName" class="q-mb-sm" autofocus="autofocus" icon="explore" :label="$t('Name')" refname="name" :name.sync="form.name" />
          <n-simple icon="last_name" class="q-mb-sm" :label="$t('last_name')" :name.sync="form.last_name"/>
          <n-simple icon="father_name" class="q-mb-sm" :label="$t('father_name')" :name.sync="form.father_name"/>
          <n-simple icon="education" class="q-mb-sm" :label="$t('education')" :name.sync="form.education"/>
          <n-simple icon="email" class="q-mb-sm" :label="$t('email')" :name.sync="form.email"/>
          <n-simple icon="cnic" class="q-mb-sm" :label="$t('cnic')" :name.sync="form.cnic"/>
          <n-simple icon="phone" class="q-mb-sm" :label="$t('phone')" :name.sync="form.phone"/>
          <n-simple icon="gender_id" class="q-mb-sm" :label="$t('gender_id')" :name.sync="form.gender_id"/>
          <n-simple icon="address" class="q-mb-sm" :label="$t('addresss')" :name.sync="form.address"/>
          <n-simple icon="birth_day" class="q-mb-sm" :label="$t('birth_day')" :name.sync="form.birth_day"/>
        </q-card-section>

        <q-separator /> -->
        
        <div class="row">
          <div class="col-md-12">
            <div class="q-pa-md">
                <div class="q-gutter-md row items-start">
                     <q-input v-model="password" filled type="password" hint="Password" />

                        <q-input v-model="password" filled :type="isPwd ? 'password' : 'text'" hint="Password with toggle">
                         <template v-slot:append>
                          <q-icon
                              :name="isPwd ? 'visibility_off' : 'visibility'"
                              class="cursor-pointer"
                               @click="isPwd = !isPwd"
          />
        </template>
      </q-input>

      <q-input v-model="email" filled type="email" hint="Email" />

      <q-input v-model="search" filled type="search" hint="Search">
        <template v-slot:append>
          <q-icon name="search" />
        </template>
      </q-input>

      <q-input v-model="tel" filled type="tel" hint="Telephone number" />

      <q-input v-model="url" filled type="url" hint="URL" />

      <q-input v-model="time" filled type="time" hint="Native time" />

      <q-input v-model="date" filled type="date" hint="Native date" />
    </div>
  </div>
          </div>
        </div>

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
