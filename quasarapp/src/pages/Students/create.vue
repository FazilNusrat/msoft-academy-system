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
            outlined
            :label="$t('Admission No')"
          />
          <input-simple
            class="q-mx-sm col"
            icon="apps"
            dense
            outlined
            :label="$t('Roll Number')"
          />
          <input-required
            class="col"
            icon="apps"
            dense
            outlined
            :label="$t('Class')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <input-required
            class="col"
            icon="apps"
            dense
            outlined
            :label="$t('Section')"
          />
          <input-required
            class="q-mx-sm col"
            icon="apps"
            dense
            outlined
            :label="$t('First Name')"
          />
          <input-simple
            class="col"
            icon="apps"
            dense
            outlined
            :label="$t('Last Name')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <input-required
            class="col"
            icon="apps"
            dense
            outlined
            :label="$t('Gender')"
          />
          <!-- <input-simple  icon="apps" dense outlined :label="$t('DateOfBirt')" /> -->
          <date-picker class="q-mx-sm col" :label="$t('Date Of Birth')" />

          <input-simple
            class="col"
            icon="apps"
            dense
            outlined
            :label="$t('Category')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <input-simple
            class="col"
            icon="apps"
            dense
            outlined
            :label="$t('Religion')"
          />
          <input-simple
            class="q-mx-sm col"
            icon="apps"
            dense
            outlined
            :label="$t('Caste')"
          />
          <input-simple
            class="col"
            icon="apps"
            dense
            outlined
            :label="$t('Mobile Number')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <input-simple
            class="col"
            icon="apps"
            dense
            outlined
            :label="$t('Email')"
          />
          <date-picker class="q-mx-sm col" :label="$t('Admission Date')" />
          <input-simple
            class="col"
            icon="apps"
            dense
            outlined
            :label="$t('Blood Group')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <input-simple
            class="col"
            icon="apps"
            dense
            outlined
            :label="$t('Student House')"
          />
          <input-simple
            class="q-mx-sm col"
            icon="apps"
            dense
            outlined
            :label="$t('Height')"
          />
          <input-required
            class="col"
            icon="apps"
            dense
            outlined
            :label="$t('Weight')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <date-picker class="col" :label="$t('As On Date')" />
          <input-required
            class="q-ml-sm col"
            icon="apps"
            dense
            outlined
            :label="$t('Medical History')"
          />
        </div>
      </div>
      <div class="col-3">
        <div class="q-mx-sm q-mb-sm">
          <div
            class="bg-cyan-7 text-white text-center"
            style="border-radius: 0.3rem 0.3rem 0 0;"
          >
            <div class="text-h7">{{ $t("Gender") }}</div>
          </div>
          <div
            style="border:1px solid #0288d1; border-radius: 0 0 0.3rem 0.3rem;"
            class="text-cyan-7 flex  flex-center"
          >
            <div class="row justify-center">
              <q-radio
                color="cyan-7"
                :label="$t('Male')"
                class="col-md-4"
                val="male"
                v-model="form.personal.gender"
              />
              <q-radio
                color="cyan-7"
                :label="$t('Female')"
                class="col-md-4"
                val="female"
                v-model="form.personal.gender"
              />
              <q-radio
                color="cyan-7"
                :label="$t('Other')"
                class="col-md-4"
                val="other"
                v-model="form.personal.gender"
              />
            </div>
          </div>
        </div>

        <div class="q-mx-sm">
          <q-uploader
            url="http://localhost:4444/upload"
            color="cyan-7"
            flat
            class="full-width"
            label="Image"
            bordered
          />
        </div>
      </div>
    </div>

    <q-card class="three_d  q-ma-sm">
      <div class="three_d">
        <q-tabs
          content-class
          ripple
          no-caps
          v-model="tab"
          inline-label
          dense
          class="text-white bg-cyan-7  three_d glossy"
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
            name="hostel_details"
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
                :label="$t('Father Name')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Father Phone No')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Father Occupation')"
              />
              <q-uploader
                class="col q-mb-s"
                  label="Upload"
                  :factory="factoryFn"
                  style="height:50px; q-ml-sm"
                />
              <!--  -->
            </div>

            <div class="row q-mb-lg">
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Mother Name')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Mother phone No')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Mother Occupation ')"
              />
              <q-uploader
                class="col q-mb-s"
                  label="Upload"
                  :factory="factoryFn"
                  style="height:50px; q-ml-sm"
                />
            </div>

            <div class="row q-mb-lg">
              <input-required
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Guardian Name ')"
              />
              <input-required
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Guardian Relation')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Guardian Email')"
              />
              <q-uploader
                class="col q-mb-s"
                  label="Upload"
                  :factory="factoryFn"
                  style="height:50px; q-ml-sm"
                />
            </div>
            <div class="row q-mb-sm">
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Guardian Phone')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Guardian Occupation')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Guardian Address')"
              />
            </div>
            <div class="row q-mb-sm">
              <div class="q-ma-sm">
                <div
                  class="bg-cyan-7 text-white text-center"
                  style="border-radius: 0.3rem 0.3rem 0 0;"
                >
                  <div class="text-h7">{{ $t("Gender") }}</div>
                </div>
                <div
                  style="border:1px solid #0288d1; border-radius: 0 0 0.3rem 0.3rem;"
                  class="text-cyan-7 flex  flex-center"
                >
                  <div class="row justify-center">
                    <q-radio
                      color="cyan-7"
                      :label="$t('Male')"
                      class="col-md-4"
                      val="male"
                      v-model="form.personal.gender"
                    />
                    <q-radio
                      color="cyan-7"
                      :label="$t('Female')"
                      class="col-md-4"
                      val="female"
                      v-model="form.personal.gender"
                    />
                    <q-radio
                      color="cyan-7"
                      :label="$t('Other')"
                      class="col-md-4"
                      val="other"
                      v-model="form.personal.gender"
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
                :label="$t('Bank Account Number')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Bank Name')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('IFSC Code')"
              />
            </div>

            <div class="row q-mb-sm">
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('National Identification Number')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :label="$t('Local Identification Number')"
              />
              <q-radio name="shape" v-model="shape" val="polygon" label="yes" />
              <q-radio name="shape" v-model="shape" val="polygon" label="No" />
            </div>

            <div class="row q-mb-sm">
              <input-simple
                class="col q-ml-sm"
                :type="textarea"
                icon="apps"
                dense
                outlined
                :label="$t('National Identification Number')"
              />
              <input-simple
                class="col q-ml-sm"
                :type="textarea"
                icon="apps"
                dense
                outlined
                :label="$t('Local Identification Number')"
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
          color="primary"
          outline
          :label="$t('Update')"
          @click="handleUpdate($event)"
        />
        <q-btn color="red" outline :label="$t('Cancel')" to="/employee" />
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
      jobs: [],
      job_options: [],
      selected_job: null,
      times: [],
      time_options: [],
      selected_time: null,
      blood_groups: [],
      blood_group_options: [],
      selected_blood_group: null,
      currencies: [],
      currency_options: [],
      selected_currency: null,
      currency_type_options: [],
      selected_type_currency: null,
      status: [
        { name: this.$t("Active"), value: 1 },
        { name: this.$t("DeActive"), value: 0 }
      ],
      selectedStatus: { name: this.$t("Active"), value: 1 },
      form: {
        code: null,
        name: null,
        last_name: null,
        phone_no: null,
        GrandFather_name: null,
        status: true,
        time_id: 0,
        department_id: 0,
        personal: {
          join_date: null,
          FatherName: null,
          birth_date: null,
          narration: null,
          fee: null,
          gender: "male",
          blood_group_id: 0,
          nationality: null,
          photo: null,
          email: null,
          marital_status: "married",
          birth_place: null
        },
        contact_details: {
          city: null,
          Religion: null,
          address: null,
          phone_no: null,
          passport_no: null
        },
        bank: {
          name: null,
          account_no: null,
          currency: null,
          branch: null,
          city: null,
          holder_name: null
        },
        contact_person: {
          name: null,
          relation: null,
          phone: null,
          email: null,
          job_id: 0,
          address: null
        },
        company: {
          phone: null,
          email: null
        },
        education: {
          education: null,
          specialization: null,
          awarded: null,
          start_date: null,
          FatherName: null,
          address: null
        },
        passport: {
          passport_no: 0,
          Religion: null,
          file: null,
          visa_type: null,
          currentAddress: null,
          Placeofbirth: null
        },
        Fees: {
          currency: null,
          admin_cost: 0,
          transport: 0,
          // government_tax: 0,
          securityFees: 0,
          libraryFees: 0,
          addmisstionFees: 0,
          remark: null
        }
      }
    };
  },
  components: {
    InputRequired,
    InputSimple,
    NSelect,
    DatePicker
  },
  computed: {
    tax() {
      var tax = 0;
      if (this.form.personal.fee) {
        if (this.form.personal.fee >= 5000 && this.form.personal.fee <= 12500) {
          tax = (Number(this.form.personal.fee - 5000) * 2) / 100;
        }
        if (
          this.form.personal.fee > 12500 &&
          this.form.personal.fee <= 100000
        ) {
          tax = (Number(this.form.personal.fee - 12500) * 10) / 100 + 150;
        }
        if (this.form.personal.fee > 100000) {
          tax = (Number(this.form.personal.fee - 100000) * 20) / 100 + 8900;
        }
      }
      return tax;
    },
    total() {
      var sum = 0;
      if (this.form.personal.fee) {
        sum =
          Number(this.form.Fees.securityFees) +
          Number(this.form.personal.fee) +
          Number(this.form.Fees.transport) +
          Number(this.form.Fees.libraryFees) +
          Number(this.form.Fees.addmisstionFees) +
          Number(this.form.Fees.admin_cost);
      }
      return sum;
    }
  },
  methods: {
    handleUpdate() {
      if (this.$refs.name.$refs.name.hasError) {
        this.$q.notify({
          color: "red-5",
          textColor: "white",
          icon: "warning",
          message: "You need to accept the license and terms first"
        });
      } else {
        this.submitting = true;
        // console.log('this.selected_athlete: ', this.selected_athlete);
        // if(this.selected_department && this.selected_department.id)
        this.form.status =
          this.selectedStatus && this.selectedStatus.value > 0
            ? this.selectedStatus.value
            : 1;
        this.form.department_id =
          this.selected_department && this.selected_department.id > 0
            ? this.selected_department.id
            : 0;
        this.form.time_id =
          this.selected_time && this.selected_time.id > 0
            ? this.selected_time.id
            : 0;
        this.form.personal.blood_group_id =
          this.selected_blood_group && this.selected_blood_group.id > 0
            ? this.selected_blood_group.id
            : 0;
        this.form.contact_person.job_id =
          this.selected_job && this.selected_job.id > 0
            ? this.selected_job.id
            : 0;
        this.form.bank.currency =
          this.selected_currency && this.selected_currency.code.length > 0
            ? this.selected_currency.code
            : "AFN";
        this.form.Fees.currency =
          this.selected_type_currency &&
          this.selected_type_currency.code.length > 0
            ? this.selected_type_currency.code
            : "AFN";

        const fileData = new FormData();
        fileData.append("photo", this.form.personal.photo);
        fileData.append("file", this.form.passport.file);
        fileData.append("_method", "PATCH");
        fileData.append("form", JSON.stringify(this.form));

        this.$axios
          .post(`employee/${this.$route.params.id}`, fileData, {
            headers: {
              "Content-Type": "multipart/form-data"
            }
          })
          .then(res => {
            this.submitting = false;
            this.$q.notify({
              color: "green-4",
              textColor: "white",
              icon: "cloud_done",
              message: "Successfull"
            });
            this.$router.push("/employee");
          });
      }
    },
    uploadFile(files) {
      this.form.personal.photo = files[0];
      console.log("this.form.personal.photo: ", this.form.personal.photo);
    },
    onRejected(rejectedEntries) {
      this.$q.notify({
        type: "negative",
        message: `${rejectedEntries.length} file(s) did not pass validation constraints`
      });
    },
    uploadScan(files) {
      this.form.passport.file = files[0];
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
    filtertime(val, update, abort) {
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
      this.$axios.get(`employee/edit/${this.$route.params.id}`).then(data => {
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
        if (data.personal) {
          const personal = JSON.parse(data.personal);
          this.form.personal.birth_date = personal.birth_date;
          this.form.personal.birth_place = personal.birth_place;
          this.form.personal.email = personal.email;
          this.form.personal.FatherName = personal.FatherName;
          this.form.personal.gender = personal.gender;
          this.form.personal.join_date = personal.join_date;
          this.form.personal.marital_status = personal.marital_status;
          this.form.personal.narration = personal.narration;
          this.form.personal.nationality = personal.nationality;
          this.form.personal.fee = personal.fee;
          this.selected_blood_group = this.blood_groups.find(
            e => e.id === personal.blood_group_id
          );
        }
        // CONTACT DETAILS -----------
        if (data.contact_details) {
          const contact_details = JSON.parse(data.contact_details);
          this.form.contact_details.address = contact_details.address;
          this.form.contact_details.city = contact_details.city;
          this.form.contact_details.Religion = contact_details.Religion;
          this.form.contact_details.passport_no = contact_details.passport_no;
          this.form.contact_details.phone_no = contact_details.address;
        }
        //  BANK DETIALS ------------
        if (data.bank_name) {
          console.log("data.bank_name", data.bank_name);
          this.form.bank.name = data.bank_name;
          this.form.bank.branch = data.branch;
          this.form.bank.city = data.city;
          this.form.bank.account_no = data.account_no;
          this.form.bank.holder_name = data.holder_name;
          this.selected_currency = this.currencies.find(
            e => e.code === data.currency
          );
        }
        // CONTACT PERSON
        if (data.contact_person) {
          const contact_person = JSON.parse(data.contact_person);
          this.form.contact_person.name = contact_person.name;
          this.form.contact_person.relation = contact_person.relation;
          this.form.contact_person.address = contact_person.address;
          this.form.contact_person.phone = contact_person.phone;
          this.form.contact_person.email = contact_person.email;
          this.selected_job = this.jobs.find(
            e => e.id === contact_person.job_id
          );
        }
        // COMPANY ------
        if (data.company) {
          const company = JSON.parse(data.company);
          this.form.company.email = company.email;
          this.form.company.phone = company.phone;
        }
        // EDUCATION ---------
        if (data.education) {
          const education = JSON.parse(data.education);
          this.form.education.education = education.education;
          this.form.education.address = education.address;
          this.form.education.awarded = education.awarded;
          this.form.education.FatherName = education.FatherName;
          this.form.education.specialization = education.specialization;
          this.form.education.start_date = education.start_date;
        }
        // PASSPORT ------------
        if (data.passport) {
          const passport = JSON.parse(data.passport);
          this.form.passport.Religion = passport.Religion;
          this.form.passport.passport_no = passport.number;
          this.form.passport.Placeofbirth = passport.Placeofbirth;
          this.form.passport.currentAddress = passport.currentAddress;
          this.form.passport.visa_type = passport.visa_type;
        }
        // Fees Tab----------
        const Fees = JSON.parse(data.Fees);
        console.log("JSON.parses(data.Fees)", Fees.currency);
        if (Fees.currency != undefined) {
          this.form.Fees.admin_cost = Fees.admin_cost ? Fees.admin_cost : 0;
          this.form.Fees.libraryFees = Fees.libraryFees;
          // this.form.Fees.government_tax = Fees.government_tax;
          this.form.Fees.addmisstionFees = Fees.addmisstionFees;
          this.form.Fees.remark = Fees.remark;
          this.form.Fees.securityFees = Fees.securityFees;
          this.form.Fees.transport = Fees.transport;
          this.selected_type_currency = this.currencies.find(
            e => e.code === Fees.currency
          );
        }

        // console.log('data: ', data);
      });
    }
  },
  mounted() {}
};
</script>
<style lang="css" scoped></style>
