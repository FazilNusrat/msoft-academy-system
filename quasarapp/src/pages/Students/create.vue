
<template>
  <div>
    <div
      icon="person_add"
      bg="bg-cyan-7"
      class="q-ma-smbg my_radio_less bg-cyan-7 my_border_white text-white three_d glossy text-h6 q-pl-sm"
    >
      {{ $t("Add Student") }}
    </div>

    <div class="row q-mt-sm">
      <div class="col-9">
        <div class="row q-mb-sm q-px-sm">
          <input-required
            class="col"
            icon="apps"
            dense
            :name.sync="form.addmission_number"
            outlined
            :label="$t('addmission No')"
          />
          <input-simple
            class="q-mx-sm col"
            icon="apps"
            dense
            :name.sync="form.roll_number"
            outlined
            :label="$t('Roll Number')"
          />
          <n-select
            icon="mdi-clock"
            :label="$t('Class')"
            :model.sync="selected_class"
            :options="classes"
            @filter="filterClass"
            :name.sync="selected_class"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <n-select
            icon="mdi-clock"
            :label="$t('Section')"
            :model.sync="selected_time"
            :options="departments"
            @filter="filterDepartment"
            :name.sync="slected_department"
          />
          <input-required
            class="q-mx-sm col"
            icon="apps"
            dense
            outlined
            :label="$t('First Name')"
            :name.sync="form.first_name"
          />
          <input-simple
            class="col"
            icon="apps"
            dense
            :name.sync="form.last_name"
            outlined
            :label="$t('Last Name')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <n-select
            icon="mdi-clock"
            :label="$t('Gender')"
            :model.sync="selected_time"
            :options="times"
            :name.sync="form.gender"
            @filter="filterTimes"
          />
          <!-- <input-simple  icon="apps" dense outlined :label="$t('DateOfBirt')" /> -->
          <!-- <date-picker class="q-mx-sm col" :name.sync="form.date_of_birth" :label="$t('Date Of Birth')" /> -->
          <date-picker
            class="q-mx-sm col"
            :date.sync="form.date_of_birth"
            :label="$t('Date Of Birth')"
          />
          <n-select
            icon="mdi-clock"
            :label="$t('Category')"
            :model.sync="selected_time"
            :options="times"
            :name.sync="form.category"
            @filter="filterTimes"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <input-simple
            class="col"
            icon="apps"
            dense
            outlined
            :name.sync="form.religion"
            :label="$t('Religion')"
          />
          <input-simple
            class="q-mx-sm col"
            icon="apps"
            dense
            outlined
            :name.sync="form.caste"
            :label="$t('Caste')"
          />
          <input-simple
            class="col"
            icon="apps"
            dense
            outlined
            :name.sync="form.mobile_number"
            :label="$t('Mobile Number')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <input-simple
            class="col"
            icon="apps"
            dense
            outlined
            :name.sync="form.email"
            :label="$t('Email')"
          />
          <date-picker
            class="q-mx-sm col"
            :date.sync="form.addmission_date"
            :label="$t('Addmission Date')"
          />

          <input-simple
            class="col"
            icon="apps"
            dense
            outlined
            :name.sync="form.blood_group"
            :label="$t('Blood Group')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <input-simple
            class="col"
            icon="apps"
            dense
            :name.sync="form.student_house"
            outlined
            :label="$t('Student House')"
          />
          <input-simple
            class="q-mx-sm col"
            icon="apps"
            dense
            :name.sync="form.height"
            outlined
            :label="$t('Height')"
          />
          <input-required
            class="col"
            icon="apps"
            dense
            :name.sync="form.weight"
            outlined
            :label="$t('Weight')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <date-picker
            :name.sync="form.as_on_date"
            class="col"
            :label="$t('As On Date')"
          />
          <input-required
            class="q-ml-sm col"
            icon="apps"
            dense
            :name.sync="form.medical_history"
            outlined
            :label="$t('Medical History')"
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

        <div class="q-ma-sm">
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

    <q-card class="three_d q-ma-sm">
      <div class="three_d">
        <q-tabs
          content-class
          ripple
          no-caps
          v-model="tab"
          inline-label
          dense
          class="text-white bg-cyan-7 three_d glossy"
          active-color="cyan-7"
          active-bg-color="grey-3"
          indicator-color="negative"
          align="justify"
          narrow-indicator
        >
          <q-tab
            :label="$t('Parent Details')"
            name="parent_details"
            icon="recent_actors"
          />
          <q-tab
            :label="$t('Student Address')"
            name="student_address"
            icon="contact_phone"
          />
          <q-tab
            :label="$t('Transport Details')"
            name="transport_details"
            icon="payment"
          />
          <q-tab
            :label="$t('Hostel Details')"
            name="hostel_details
            "
            icon="payment"
          />
          <q-tab
            :label="$t('Miscellaneous Details')"
            name="miscellaneous_details"
            icon="payment"
          />
          <q-tab
            :label="$t('Upload Documents')"
            name="upload_details"
            icon="payment"
          />
        </q-tabs>
      </div>
      <q-tab-panels v-model="tab" animated>
        <q-tab-panel name="parent_details">
          <div class="row">
            <div>
              <div class="text-h6">{{ $t("Parent Details") }}</div>
            </div>
          </div>
          <div>
            <div class="row q-mb-lg">
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.father_name"
                :label="$t('Father Name')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.father_phone_number"
                :label="$t('Father Phone No')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.father_occupation"
                :label="$t('Father Occupation')"
              />
            </div>

            <div class="row q-mb-lg">
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.mother_name"
                :label="$t('Mother Name')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.mother_phone_number"
                :label="$t('Mother phone No')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.mother_occupation"
              />
            </div>

            <div class="row q-mb-lg">
              <input-required
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.guardian_name"
                :label="$t('Guardian name')"
              />
              <input-required
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.guardian_relation"
                :label="$t('Guardian Relation')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.guardian_email"
                :label="$t('Guardian Email')"
              />
            </div>
            <div class="row q-mb-sm">
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.guardian_phone"
                :label="$t('Guardian Phone')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.guardian_occupation"
                :label="$t('Guardian Occupation')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.guardian_address"
                :label="$t('Guardian Address')"
              />
            </div>
            <div class="row q-mb-sm">
              <div class="q-ma-sm">
                <div
                  class="bg-cyan-7 text-white text-center"
                  style="border-radius: 0.3rem 0.3rem 0 0"
                >
                  <div class="text-h7">{{ $t("Gender") }}</div>
                </div>
                <div
                  style="
                    border: 1px solid #0288d1;
                    border-radius: 0 0 0.3rem 0.3rem;
                  "
                  class="text-cyan-7 flex flex-center"
                >
                  <div class="row justify-center">
                    <q-radio
                      color="cyan-7"
                      :label="$t('Male')"
                      class="col-md-4"
                      val="male"
                      v-model="form.parent_details.gender"
                    />
                    <q-radio
                      color="cyan-7"
                      :label="$t('Female')"
                      class="col-md-4"
                      val="female"
                      v-model="form.parent_details.gender"
                    />
                    <q-radio
                      color="cyan-7"
                      :label="$t('Other')"
                      class="col-md-4"
                      val="other"
                      v-model="form.parent_details.gender"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </q-tab-panel>
        <q-tab-panel name="student_address">
          <div class="row">
            <div>
              <div class="text-h6">{{ $t("Student Address") }}</div>
            </div>
          </div>
          <div class="row">
            <div class="col q-ml-sm">
              <input-required
                style="max-height: 4px"
                icon="apps"
                type="textarea"
                dense
                :name.sync="form.student_address.current_address"
                class="q-my-sm"
                outlined
                :label="$t('Current Address')"
              />
            </div>
            <div class="col">
              <input-required
                style="height: 4px"
                icon="apps"
                type="textarea"
                dense
                :name.sync="form.student_address.Permanent_address"
                class="q-my-sm"
                outlined
                :label="$t('Permanent Address')"
              />
            </div>
          </div>
        </q-tab-panel>
        <q-tab-panel name="transport_details">
          <div class="row">
            <div>
              <div class="text-h6">{{ $t("TransportDetails") }}</div>
            </div>
          </div>
          <div class="row">
            <div class="col q-ml-sm">
              <div class="q-gutter-md">
                <q-select
                  filled
                  v-model="model"
                  :options="options"
                  :name.sync="form.transport_details.route_list"
                  label="Route List"
                />
              </div>
            </div>
          </div>
        </q-tab-panel>

        <q-tab-panel name="hostel_details">
          <div class="row">
            <div>
              <div class="text-h6">{{ $t("HostelDetails") }}</div>
            </div>
          </div>
          <div>
            <div class="row">
              <div class="col q-ml-sm">
                <div class="q-gutter-md">
                  <q-select
                    filled
                    v-model="model"
                    :options="options"
                    label="Hostel"
                  />
                </div>
              </div>
              <div class="col q-ml-sm">
                <div class="q-gutter-md">
                  <q-select
                    filled
                    v-model="model"
                    :options="options"
                    label="Room Number"
                  />
                </div>
              </div>
            </div>
          </div>
        </q-tab-panel>

        <q-tab-panel name="miscellaneous_details">
          <div class="row">
            <div>
              <div class="text-h6">{{ $t("Miscellaneous Details") }}</div>
            </div>
          </div>
          <div>
            <div class="row q-mb-sm">
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.miscellaneous_details.bank_account_number"
                :label="$t('Bank Account Number')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.miscellaneous_details.bank_name"
                :label="$t('Bank Name')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                :name.sync="form.miscellaneous_details.ifsc_code"
                outlined
                :label="$t('IFSC Code')"
              />
            </div>

            <div class="row q-mb-sm">
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                :name.sync="
                  form.miscellaneous_details.national_identification_number
                "
                outlined
                :label="$t('National Identification Number')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="
                  form.miscellaneous_details.local_identifiction_number
                "
                :label="$t('Local Identification Number')"
              />
            </div>

            <div class="row q-mb-sm">
              <input-simple
                class="col q-ml-sm"
                type="textarea"
                icon="apps"
                dense
                :name.sync="form.miscellaneous_details.previou_school_details"
                outlined
                :label="$t('previous School Details')"
              />
              <input-simple
                class="col q-ml-sm"
                type="textarea"
                icon="apps"
                dense
                :name.sync="form.miscellaneous_details.note"
                outlined
                :label="$t('Note')"
              />
            </div>
          </div>
        </q-tab-panel>

        <q-tab-panel name="upload_details">
          <div class="row">
            <div>
              <div class="text-h6">{{ $t("Upload Details") }}</div>
            </div>
          </div>
          <div>
            <div class="row q-mb-sm">
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Title')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Documents')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Title')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Documents')"
              />
            </div>

            <div class="row q-mb-sm">
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Title')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Documents')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Title')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Documents')"
              />
            </div>
          </div>
        </q-tab-panel>
      </q-tab-panels>
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
        <q-btn color="red" outline :label="$t('Cancel')" to="/student" />
      </q-card-actions>
    </q-card>
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
      model: null,
      options: ["Imran", "Khan", "jan", "Man", "Qanad"],
      submitting: false,
      tab: "parent_details",
      departments: [],
      department_options: [],
      selected_department: null,
      classes: [],
      class_options: [],
      selected_class: null,
      jobs: [],
      job_options: [],
      selected_job: null,
      times: [],
      time_options: [],
      selected_time: null,
      blood_groups: [],
      blood_group_options: [],
      selected_blood_group: null,
      departments: [],
      slected_department: null,
      department_options: [],
      currencies: [],
      currency_options: [],
      selected_currency: null,
      currency_type_options: [],
      selected_type_currency: null,
      status: [
        { name: this.$t("Active"), value: 1 },
        { name: this.$t("DeActive"), value: 0 },
      ],
      selectedStatus: { name: this.$t("Active"), value: 1 },
      form: {
        addmission_number: null,
        roll_number: null,
        class_id: null,
        section_id: null,
        first_name: null,
        last_name: null,
        gender: "male",
        date_of_birth: null,
        category: null,
        religion: null,
        caste: null,
        mobile_number: null,
        email: null,
        addmission_date: null,
        blood_group: null,
        student_house: null,
        height: null,
        weight: null,
        as_on_date: null,
        medical_history: null,
        medical_history: null,

        parent_details: {
          father_name: null,
          father_phone_number: null,
          father_occupation: null,
          mother_name: null,
          mother_phone_number: null,
          mother_occupation: null,
          guardian_name: null,
          guardian_occupation: null,
          guardian_email: null,
          guardian_address: null,
          guardian_phone: null,
          guardian_relation: null,
        },
        student_address: {
          current_address: null,
          Permanent_address: null,
        },
        transport_details: {
          route_list: null,
        },
        // hostel_details
        //{

        //},
        miscellaneous_details: {
          bank_account_number: null,
          bank_name: null,
          ifsc_code: null,
          national_identification_number: null,
          local_identification_number: null,
          yes: null,
          no: null,
          previou_school_details: null,
          note: null,
        },
      },
    };
  },
  components: {
    InputRequired,
    InputSimple,
    NSelect,
    DatePicker,
  },
  computed: {},
  methods: {
    handleSubmit() {
      console.log("come on aostaz");
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
        .post("student/store", fileData, {
          // headers: {
          //   "Content-Type": "multipart/form-data"
          // }
        })
        .then((res) => {
          this.$router.push("/student");
          this.submitting = false;
          this.$q.notify({
            color: "green-4",
            textColor: "white",
            icon: "cloud_done",
            message: "Successfull",
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
        message: `${rejectedEntries.length} file(s) did not pass validation constraints`,
      });
    },
    onRejectedScan(rejectedEntries) {
      this.$q.notify({
        type: "negative",
        message: `${rejectedEntries.length} file(s) did not pass validation constraints`,
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
              (v) => v.name.toLowerCase().indexOf(needle) > -1
            );
          }
        },
        (ref) => {
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
              (v) => v.name.toLowerCase().indexOf(needle) > -1
            );
          }
        },
        (ref) => {
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
              (v) => v.name.toLowerCase().indexOf(needle) > -1
            );
          }
        },
        (ref) => {
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
              (v) => v.name.toLowerCase().indexOf(needle) > -1
            );
          }
        },
        (ref) => {
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
              (v) => v.name.toLowerCase().indexOf(needle) > -1
            );
          }
        },
        (ref) => {
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
              (v) => v.name.toLowerCase().indexOf(needle) > -1
            );
          }
        },
        (ref) => {
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
              (v) => v.name.toLowerCase().indexOf(needle) > -1
            );
          }
        },
        (ref) => {
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
              (v) => v.name.toLowerCase().indexOf(needle) > -1
            );
          }
        },
        (ref) => {
          if (val !== "" && ref.options.length > 0) {
            ref.setOptionIndex(-1); // reset optionIndex in case there is something selected
            ref.moveOptionSelection(1, true); // focus the first selectable option and do not update the input-value
          }
        }
      );
    },
    editData() {
      this.$axios.get(`student/edit/${this.$route.params.id}`).then((data) => {
        data = data.data;
        this.form.code = data.code;
        this.form.name = data.name;
        this.form.last_name = data.last_name;
        this.form.GrandFather_name = data.GrandFather_name;
        this.form.phone_no = data.phone_no;
        this.selectedStatus = this.status.find(
          (e) => e.value === (data.status ? 1 : 0)
        );
        this.selected_department = this.departments.find(
          (e) => e.id === data.department_id
        );
        this.selected_time = this.times.find((e) => e.id === data.time_id);
        // PERSONAL TAB---

        // CONTACT DETAILS -----------

        //  BANK DETIALS ------------

        // CONTACT PERSON

        // COMPANY ------

        // console.log('data: ', data);
      });
    },
  },
  mounted() {
    this.$getAcademy("department").then(() => {
      console.log("aaaaa", this.departments);
    });
    this.$getAcademy("class").then(() => {
      console.log("aaaaa", this.classes);
    });
  },
};
</script>
<style lang="css" scoped></style>
