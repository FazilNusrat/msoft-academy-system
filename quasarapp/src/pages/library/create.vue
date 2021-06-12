<template>
  <div>
    <div
      icon="person_add"
      bg="bg-cyan-7"
      class="q-ma-smbg my_radio_less bg-cyan-7 my_border_white text-white three_d glossy text-h6 q-pl-sm"
    >
      {{ $t("Add Book") }}
    </div>
    
       <div class="row q-mt-sm">
      <div class="col-12">
        <div class="row q-mb-sm q-px-sm">
          <input-required
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.book_title"
            outlined
            :label="$t('Book Title')"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.book_number"
            outlined
            :label="$t('Book Number')"
          />
        </div>
        

        <div class="row q-mb-sm q-px-sm">
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.rack_number"
            outlined
            :label="$t('Rack Number')"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.publicher"
            outlined
            :label="$t('Publicher')"
          />
        </div>


        <div class="row q-mb-sm q-px-sm">
          <input-required
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.author"
            outlined
            :label="$t('Author')"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.subject"
            outlined
            :label="$t('Subject')"
          />
        </div>

        
        <div class="row q-mb-sm q-px-sm">
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.qty"
            outlined
            :label="$t('Qty')"
          />
          <input-required
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.book_price"
            outlined
            :label="$t('Book Price')"
          />
        </div>


        <div class="row q-mb-sm q-px-sm">
          
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.post_date"
            outlined
            :label="$t('Post Date')"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.description"
            outlined
            :label="$t('Description')"
          />
        </div>




      </div>
    </div>

    <q-card-actions class="col-5 flex flex-center">
      <q-btn
        push
        color="light-blue"
        class="q-ma-sm"
        @click="handleSubmit($event)"
        text-color="white"
        icon="save"
        :label="$t('Save')"
        v-close-popup
      />
      <q-btn color="red" outline :label="$t('Cancel')" to="/teacher" />
    </q-card-actions>
  </div>
</template>
<script>
import InputRequired from "../../components/fields/Name.vue";
import InputSimple from "../../components/fields/NameSimple.vue";
import NSelect from "../../components/fields/Select.vue";
import DatePicker from "../../components/fields/date-picker.vue";

export default {
  data() {
    return {
      form: {
        book_title: null,
        book_number: null,
        publicher: null,
        author: null,
        subject: null,
        rack_number: null,
        qty: null,
        book_price: null,
        post_date: null,
        book_price: null,
      }
    };
  },
  components: {
    InputRequired,
    InputSimple,
    NSelect,
    DatePicker
  },
  computed: {},
  methods: {
    handleSubmit() {
      console.log("Thanks For Data Insert");
      this.submitting = true;
      this.form.class_id =
        this.selected_class && this.selected_class.id > 0
          ? this.selected_class.id
          : 0;
      this.form.section_id =
        this.selected_section && this.selected_section.id > 0
          ? this.selected_section.id
          : 0;
      const fileData = new FormData();
      fileData.append("form", JSON.stringify(this.form));
      this.$axios
        .post("library/store", fileData, {
          // headers: {
          //   "Content-Type": "multipart/form-data"
          // }
        })
        .then(res => {
          this.$router.push("/library");
          this.submitting = false;
          this.$q.notify({
            color: "green-4",
            textColor: "white",
            icon: "cloud_done",
            message: "Successfull"
          });
        });
    },
    uploadFile(files) {
      //   this.form.personal.photo = files[0];
      // console.log("this.form.personal.photo: ", this.form.personal.photo);
    },
    onRejected(rejectedEntries) {
      this.$q.notify({
        type: "negative",
        message: `${rejectedEntries.length} file(s) did not pass validation constraints`
      });
    },
    onRejectedScan(rejectedEntries) {
      this.$q.notify({
        type: "negative",
        message: `${rejectedEntries.length} file(s) did not pass validation constraints`
      });
    },
    filterDepartment(val, update, abort) {
      update(
        () => {
          if (val === "") {
            this.department_options = this.departments;
          } else {
            const needle = val.toLowerCase();
            this.department_options = this.departments.filter(
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
    filterClass(val, update, abort) {
      update(
        () => {
          if (val === "") {
            this.class_options = this.classes;
          } else {
            const needle = val.toLowerCase();
            this.class_options = this.classes.filter(
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
    filterTimes(val, update, abort) {
      update(
        () => {
          if (val === "") {
            this.time_options = this.times;
          } else {
            const needle = val.toLowerCase();
            this.time_options = this.times.filter(
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
    filterDepartment(val, update, abort) {
      update(
        () => {
          if (val === "") {
            this.department_options = this.departments;
          } else {
            const needle = val.toLowerCase();
            this.department_options = this.departments.filter(
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
    filterJob(val, update, abort) {
      update(
        () => {
          if (val === "") {
            this.job_options = this.jobs;
          } else {
            const needle = val.toLowerCase();
            this.job_options = this.jobs.filter(
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
    filterCurrency(val, update, abort) {
      update(
        () => {
          if (val === "") {
            this.currency_options = this.currencies;
          } else {
            const needle = val.toLowerCase();
            this.currency_options = this.currencies.filter(
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
    filterCurrencyType(val, update, abort) {
      update(
        () => {
          if (val === "") {
            this.currency_type_options = this.currencies;
          } else {
            const needle = val.toLowerCase();
            this.currency_type_options = this.currencies.filter(
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
    filterBloodGroup(val, update, abort) {
      update(
        () => {
          if (val === "") {
            this.blood_group_options = this.blood_groups;
          } else {
            const needle = val.toLowerCase();
            this.blood_group_options = this.blood_groups.filter(
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
  },
  mounted() {
    // this.$getAcademy("department").then(() => {
    //   console.log("aaaaa", this.departments);
    // });
    // this.$getAcademy("class").then(() => {
    //   console.log("aaaaa", this.classes);
    // });
  }
};
</script>
<style lang="css" scoped></style>
