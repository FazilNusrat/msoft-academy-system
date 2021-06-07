<template>
  <div>
    <q-card >
      <q-form @submit.prevent="onSubmit" @reset="onReset">
        <!-- <q-card-section> -->
          <div class="three_d q-pa-sm bg-cyan-7 text-white">{{$t('Add Time')}}</div>
        <!-- </q-card-section> -->

        <q-separator />

        <q-card-section style="max-height: 50vh" class="scroll">
          <n-name icon="explore" :label="$t('Name')" class="q-mb-sm" ref="modalName" autofocus="autofocus" refname="name" :name.sync="form.name"/>

          <a-select
          icon="groups"
          :label="$t('Test')"
          :model.sync="selected_test"
          :options="classes"
          class="q-ma-sm"
          @filter="filterAccountTest"
        />
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
      submitting: false,
      form: {
        class_id: '',
        name:'',
      },
    }
  },
  methods: {
    filterAccountTest(val, update, abort) {
      update(
        () => {
          if (val === "") {
            this.classes = this.classes;
          } else {
            const needle = val.toLowerCase();
            this.classes = this.classes.filter(
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
        // this.form.class_id =
        //   this.selected_test && this.selected_test.id
        //     ? this.selected_test.id
        //     : null;
        this.submitting = true;
        this.$axios.post('time/store', this.form).then(res=>{
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
    // this.$getAcademy("classes")
  }

};
</script>

<style lang="css" scoped>
</style>
