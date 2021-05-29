<template>
  <div>
    <q-card>
      <q-form @submit.prevent="onSubmit" @reset="onReset">
        <!-- <q-card-section> -->
          <div class="bg-red">{{$t('EditClass')}}</div>
        <!-- </q-card-section> -->
        <q-card-section style="max-height: 50vh" class="scroll">
          <q-input
          ref="modalName"
            color="teal"
            v-model="form.name"
            label="Name"
          >
            <template v-slot:prepend>
              <q-icon name="info" />
            </template>
          </q-input>

          <q-input
            color="teal"
            v-model="form.description"
            label="Description"
          >
            <template v-slot:prepend>
              <q-icon name="info" />
            </template>
          </q-input>
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
    'n-submit': require('components/fields/Submit.vue').default
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
        this.$axios.patch('area/'+this.id, this.form).then(res=>{
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
    onSubmit() {
      this.submitting = true;
        // if(this.selectedGroup && this.selectedGroup.id)
        //   this.form.group_id = this.selectedGroup.id;
        // if(this.selectedEmployee && this.selectedEmployee.id)
        //   this.form.employee_id = this.selectedEmployee.id;

        // console.log('this.form',this.form);
        this.$axios.post('class/edit', this.form).then(res=>{
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
