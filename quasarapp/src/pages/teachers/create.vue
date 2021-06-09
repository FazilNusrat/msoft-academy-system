<template>
  <div>
    <div
      icon="person_add"
      bg="bg-cyan-7"
      class="q-ma-smbg my_radio_less bg-cyan-7 my_border_white text-white three_d glossy text-h6 q-pl-sm"
    >
      {{ $t("Add Teachers") }}
    </div>
    
       <div class="row q-mt-sm">
      <div class="col-9">
        <div class="row q-mb-sm q-px-sm">
          <input-required
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.addmission_number"
            outlined
            :label="$t('Addmission No')"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.roll_number"
            outlined
            :label="$t('Roll Number')"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.first_name"
            outlined
            :label="$t('First Name')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.last_name"
            outlined
            :label="$t('Last Name')"
          />
          
          <input-required
            class="col q-ma-xs"
            icon="apps"
            dense
            outlined
            :label="$t('Father Name')"
            :name.sync="form.father_name"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.phone"
            outlined
            :label="$t('Mobile Number')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <date-picker
            class="col q-ma-xs"
            dense
            :date.sync="form.date_of_birth"
            :label="$t('Date Of Birth')"
          />
           <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            outlined
            :name.sync="form.email"
            :label="$t('Email')"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            outlined
            :name.sync="form.salary"
            :label="$t('Salary')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
         <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            outlined
            :name.sync="form.current_address"
            :label="$t('Current Address')"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            outlined
            :name.sync="form.permenet_address"
            :label="$t('permenet_address')"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            outlined
            :name.sync="form.education_level"
            :label="$t('education Level')"
          />
        </div> 


        <div class="row q-mb-sm q-px-sm">
         <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            outlined
            :name.sync="form.experience"
            :label="$t('Experience')"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            outlined
            :name.sync="form.tazkera_number"
            :label="$t('Tazkera Number')"
          />
        </div>  
      </div>
      <div class="col-3">
        <div class="q-mx-sm q-mb-sm">
          <div
            class="bg-cyan-7 text-white text-center"
            style="border-radius: 0.3rem 0.3rem 0 0"
          >
            <div class="text-h7">{{ $t("Gender") }}</div>
          </div>
          <div
            style="border: 1px solid #0288d1; border-radius: 0 0 0.3rem 0.3rem"
            class="text-cyan-7 flex flex-center"
          >
            <div class="row justify-center">
              <q-radio
                :label="$t('Male')"
                class="col-md-4"
                val="male"
                v-model="form.gender"
              />
              <q-radio
                :label="$t('Female')"
                class="col-md-4"
                val="female"
                v-model="form.gender"
              />
              <q-radio
                :label="$t('Other')"
                class="col-md-4"
                val="other"
                v-model="form.gender"
              />
            </div>
          </div>
        </div>

        <div class="q-ma-xs">
                <q-uploader
                  class="full-width"
                  :label="$t('Photo')"
                  :factory="uploadFile"
                  max-files="1"
                  auto-upload
                  accept=".jpg, image/*"
                  @rejected="onRejected"
                  ref="photo"
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
        addmission_number: null,
        roll_number: null,
        first_name: null,
        last_name: null,
        father_name: null,
        phone: null,
        date_of_birth: null,
        email: null,
        photo: null,
        salary: null,
        current_address: null,
        permenent_address: null,
        education_level: null,
        experience: null,
        gender: 'male',
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
