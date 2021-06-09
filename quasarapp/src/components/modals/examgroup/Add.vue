<template>
  <div>
    <q-card >
      <q-form @submit.prevent="onSubmit" @reset="onReset">
        
        <q-card-section class="row items-center q-pb-none three_d q-pa-sm bg-cyan-7 text-white">{{$t('Add Exam Group')}}
               <q-space />
               <q-btn icon="close" flat round dense v-close-popup />
               </q-card-section> 

        <q-card-section style="max-height: 50vh" class="scroll">
          <n-name icon="explore" :label="$t('Name')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.name"/>
           <a-select
          icon="mdi-clock"
          :label="$t('Times')"
          :model.sync="selected_time"
          :options="times"
          class="q-mb-sm"
          @filter="filterTimes"
        />
          <n-simple icon="description" :label="$t('Description')"  :name.sync="form.description"/>

         

        <!-- <a-select
          icon="mdi-clock"
          :label="$t('Class')"
          :model.sync="selected_class"
          :options="classes"
          @filter="filterTimes"
        /> -->

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
import ASelect from 'src/components/fields/Select.vue'
import NSimple from 'src/components/fields/NameSimple.vue'
export default {
  name: 'Modal',
  components: {
    NName,
    NSimple,ASelect,
    'n-submit': require('components/fields/Submit.vue').default
  },
  data () {
    return {
      // selected_class:null,
      // classes:[],
      times: [],
      selected_time: null,
      submitting: false,
      form: {
        name:'',
        description:'',
        time_id:0,
      },
    }
  },
  methods: {
    filterTimes(val, update, abort) {
      update(
        () => {
          if (val === "") {
            this.times = this.times;
          } else {
            const needle = val.toLowerCase();
            this.times = this.times.filter(
              v => v.name.toLowerCase().indexOf(needle) > -1
            );
          }
        },
        ref => {
          if (val !== "" && ref.options.length > 0) {
            ref.setOptionIndex(-1); // reset optionIndex in case there is something selected
            ref.moveOptionSelection(1, true); // focus the first selectable option and do not update the input-value
          }
        } 
      );
    },
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
        this.form.time_id =
          this.selected_time && this.selected_time.id
            ? this.selected_time.id
            : null;
        this.submitting = true;
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
      }
    },
    onReset() {
      this.form.name = null;
      this.form.description = null;
    },

  },
  created() {
    this.$getAcademy("times");
    // this.$getAcademy("classes")

  }

};
</script>

<style lang="css" scoped>
</style>
