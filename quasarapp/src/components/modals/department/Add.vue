<template>
  <div>
    <q-card>
      <q-form @submit.prevent="onSubmit" @reset="onReset">
        <!-- <q-card-section> -->
          <div class="bg-red">{{$t('NewClass')}}</div>
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
// import NName from 'src/components/fields/Name.vue'
// import NSimple from 'src/components/fields/NameSimple.vue'
// import NSelect from 'src/components/fields/Select.vue';
export default {

  name: 'Modal',
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
      // options: [],
      // employees: [],
      // acg_options: [],
      // // account_groups: [],
      // selectedGroup:null,
      // selectedEmployee:null,
      // testName:null,
      // // label:'name is required',

    }
  },
  methods: {
    // validate()
    // {
    //   if(this.testName ==null)
    //   {
    //     this.label ='this field is reuqired'
    //   }
    //   else {
    //     this.label = this.label;
    //   }
    //   // alert('hi');
    // },
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
        // if(this.selectedGroup && this.selectedGroup.id)
        //   this.form.group_id = this.selectedGroup.id;
        // if(this.selectedEmployee && this.selectedEmployee.id)
        //   this.form.employee_id = this.selectedEmployee.id;

        // console.log('this.form',this.form);
        this.$axios.post('class/store', this.form).then(res=>{
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
      //    this.submitting = true;
      //  // console.log("Test File", this.form.name);
      // this.$axios.post("class/store", this.form).then((res) => {
      //     this.submitting = false

      //   this.$q.notify({
      //     color: "green-4",
      //     textColor: "white",
      //     icon: "cloud_done",
      //     position: "top-right",
      //     message: "Successfully inserted",
      //   });
      //   this.clear();
      //   // this.$router.push("/class/index");
      //   this.getdata();
      // });
       }
    },
    onReset() {
      this.form.name = null;
      this.form.description = null;
      
      
    },
    filterFn (val, update, abort) {

      // update(() => {
      // 	console.log('val: ', val);
      //   const needle = val.toLowerCase()
      //   this.options = this.data.filter(v => v.name.toLowerCase().indexOf(needle) > -1)
      // });
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

      // update(() => {
      // 	console.log('val: ', val);
      //   const needle = val.toLowerCase()
      //   this.options = this.data.filter(v => v.name.toLowerCase().indexOf(needle) > -1)
      // });
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
  	// this.getData();
  	// this.getAccountGroups();
    // this.$getMark('employee')
    // this.$getMark('account_groups').then(()=>{
    //   this.selectedGroup = this.account_groups.find(e=>e.name==='Store');
    // })
    // this.getdata();
    
  }

};
</script>

<style lang="css" scoped>
</style>
