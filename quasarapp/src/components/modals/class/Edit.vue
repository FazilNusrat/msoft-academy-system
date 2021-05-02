<template>
  <div>
    <q-card>
      <q-form @submit.prevent="onSubmit" @reset="onReset">
        <!-- <q-card-section> -->
          <div class="bg-red">{{$t('EditClass')}}</div>
        <!-- </q-card-section> -->
        <q-card-section style="max-height: 50vh" class="scroll">
          <n-name ref="modalName" autofocus="autofocus" icon="store" :label="$t('Name')" refname="class_name" :name.sync="form.name"/>

          <n-simple  autofocus="autofocus" icon="home" :label="$t('Description')"  :name.sync="form.description"/>
        </q-card-section>
        <!-- <q-separator /> -->
        <q-card-actions class="q-pa-none" align="right">
          <n-submit :submitting="submitting"  :label="$t('Save')" v-close-popup></n-submit>
        </q-card-actions>
      </q-form>
    </q-card>
  </div>
</template>
<script>
export default {
  name: 'Modal',
  props:['id'],
  components: {
    'n-submit': require('components/fields/Submit.vue').default,
    'n-simple': require('components/fields/NameSimple.vue').default,
    'n-name': require('components/fields/Name.vue').default,
    'n-select': require('components/fields/Select.vue').default,
  },
  data () {
    return {
      submitting: false,
      form: {
        name:null,
        description:null,
        
      },
    }
  },
  methods: {
    onSubmit() {
          if (this.$refs.modalName.$refs.class_name.hasError) {
        this.$emit("close");
        this.$q.notify({
            color: "red-5",
            textColor: "white",
            icon: "warning",
            message: "You need to accept the license and terms first",
          });
      }
       else {
        this.submitting = true;

        this.$axios.post('class/'+this.id, this.form).then(res=>{
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
      this.form.description = null;
    },
    edit() {
      this.$axios.get('class/edit/'+this.id).then(res=>{
        this.form.name = res.data.name;
        this.form.description = res.data.description;
        console.log('res',res);
      });
    },
    filterFn (val, update, abort) {
         update(
          () => {
            if (val === '') {
              this.options = this.employees
            }
            else {
              const needle = val.toLowerCase()
              this.options = this.employees.filter(v => v.name.toLowerCase().indexOf(needle) > -1)
            }
          },

          // next function is available in Quasar v1.7.4+;
          // "ref" is the Vue reference to the QSelect
          ref => {
            if (val !== '' && ref.options.length > 0) {
              ref.setOptionIndex(-1) // reset optionIndex in case there is something selected
              ref.moveOptionSelection(1, true) // focus the first selectable option and do not update the input-value
            }
          }
        )
    },
    filterAccount (val, update, abort) {
         update(
          () => {
            if (val === '') {
              this.acg_options = this.account_groups
            }
            else {
              const needle = val.toLowerCase()
              this.acg_options = this.account_groups.filter(v => v.name.toLowerCase().indexOf(needle) > -1)
            }
          },

          // next function is available in Quasar v1.7.4+;
          // "ref" is the Vue reference to the QSelect
          ref => {
            if (val !== '' && ref.options.length > 0) {
              ref.setOptionIndex(-1) // reset optionIndex in case there is something selected
              ref.moveOptionSelection(1, true) // focus the first selectable option and do not update the input-value
            }
          }
        )
    },
    clear() {
      (this.form.name = ""), (this.form.description = "");
    },

  },

  created() {
    this.edit();
    
  }

};
</script>

<style lang="css" scoped>
</style>