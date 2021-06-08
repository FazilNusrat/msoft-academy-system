<template>
  <div>
    <div
      icon="person_add"
      bg="bg-cyan-7"
      class="q-ma-smbg my_radio_less bg-cyan-7 my_border_white text-white three_d glossy text-h6 q-pl-sm"
    >
      {{ $t("Add Teachers") }}
    </div>
    <q-card>
      <div class="q-pa-lg">
        <div class="row">
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('First Name')"
              ref="modalName"
              autofocus="autofocus"
              refname="name"
              :name.sync="form.first_name"
            />
          </div>
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Last Name')"
              ref="modalName"
              refname="name"
              :name.sync="form.last_name"
            />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Father Name')"
              ref="modalName"
              refname="name"
              :name.sync="form.father_name"
            />
          </div>
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Phone')"
              ref="modalName"
              refname="name"
              :name.sync="form.phone"
            />
          </div>
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Email')"
              type="email"
              ref="modalName"
              refname="name"
              :name.sync="form.email"
            />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Current Address')"
              ref="modalName"
              refname="name"
              :name.sync="form.current_address"
            />
          </div>
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Permenent Address')"
              ref="modalName"
              refname="name"
              :name.sync="form.permenent_address"
            />
          </div>
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Education Level')"
              ref="modalName"
              refname="name"
              :name.sync="form.education_level"
            />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Experience')"
              ref="modalName"
              refname="name"
              :name.sync="form.experience"
            />
          </div>
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Tazkera Number')"
              ref="modalName"
              refname="name"
              :name.sync="form.tazkera_number"
            />
          </div>
        </div>
      </div>
    </q-card>
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
        first_name: null,
        last_name: null,
        father_name: null,
        email: null,
        phone: null,
        photo: null,
        current_permenent_address: null,
        permenent_permenent_address: null,
        education_level: null,
        experience: null,
        tazkera_number: null,
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
        .post("teacher/store", fileData, {
          // headers: {
          //   "Content-Type": "multipart/form-data"
          // }
        })
        .then(res => {
          this.$router.push("/teacher");
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
    editData() {
      this.$axios.get(`teacher/edit/${this.$route.params.id}`).then(data => {
        data = data.data;
        this.form.code = data.code;
        this.form.name = data.name;
        this.form.last_name = data.last_name;
        this.form.GrandFather_name = data.GrandFather_name;
        this.form.phone_no = data.phone_no;
        this.selectedStatus = this.status.find(
          e => e.value === (data.status ? 1 : 0)
        );
        this.selected_department = this.departments.find(
          e => e.id === data.department_id
        );
        this.selected_time = this.times.find(e => e.id === data.time_id);
        // PERSONAL TAB---

        // CONTACT DETAILS -----------

        //  BANK DETIALS ------------

        // CONTACT PERSON

        // COMPANY ------

        // console.log('data: ', data);
      });
    }
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
