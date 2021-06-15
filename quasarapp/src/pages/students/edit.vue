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
            class="col q-ma-sm"
            icon="apps"
            dense
            :name.sync="form.addmission_number  "
            outlined
            :label="$t('Addmission No')"
          />
          <input-simple
            class="col q-ma-sm"
            icon="apps"
            dense
            :name.sync="form.roll_number"
            outlined
            :label="$t('Roll Number')"
          />
          <n-select
            icon="mdi-clock"
            class="col q-ma-sm"
            :label="$t('Class')"
            :model.sync="selected_class"
            :options="classes"
            :name.sync="selected_class"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <n-select
            icon="mdi-clock"
            class="col q-ma-sm"
            :label="$t('Section')"
            :model.sync="selected_department"
            :options="departments"
            
            :name.sync="slected_department"
          />
          
          <input-required
            class="col q-ma-sm"
            icon="apps"
            dense
            outlined
            :label="$t('First Name')"
            :name.sync="form.first_name"
          />
          <input-simple
            class="col q-ma-sm"
            icon="apps"
            dense
            :name.sync="form.last_name"
            outlined
            :label="$t('Last Name')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <date-picker
            class="col q-ma-sm"
            dense
            :date.sync="form.date_of_birth"
            :label="$t('Date Of Birth')"
          />
           <input-simple
            class="col q-ma-sm"
            icon="apps"
            dense
            type="number"
            outlined
            :name.sync="form.mobile_number"
            :label="$t('Phone Number')"
          />
          <input-simple
            class="col q-ma-sm"
            icon="apps"
            dense
            outlined
            :name.sync="form.email"
            :label="$t('Email')"
          />
        </div>

        <div class="row q-mb-sm q-px-sm">
          <date-picker
            class="col q-ma-sm"
            dense
            :date.sync="form.addmission_date"
            :label="$t('Addmisstion Date')"
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
                  max-files="1"
                  auto-upload
                  accept=".jpg, image/*"
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
            :label="$t('Transport Detddails')"
            name="transport_details"
            icon="payment"
          />
          <q-tab
            :label="$t('HostelDetails')"
            name="hostel_details"
            icon="business"
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
                :name.sync="form.parent_details.brother_name"
                :label="$t('Brother Name')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.brother_phone_number"
                :label="$t('Brother phone No')"
              />
              <input-simple
                class="col q-ml-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.parent_details.brother_occupation"
                :label="$t('Brother Occuption')"

              />
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
                
                icon="apps"
                type="textarea"
                dense
                :name.sync="form.student_address.current_address"
                class="q-my-sm"
                outlined
                :label="$t('Current Address')"
              />
            </div>
            <div class="col q-ml-sm">
              <input-required
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
              <div class="col">
              <input-simple
                class="col q-ml-sm q-mb-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.transport_details.driver_name"
                :label="$t('Driver Name')"
              />
               <input-simple
                class="col q-ml-sm q-mb-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.transport_details.route"
                :label="$t('Route')"
              />
               <input-simple
                class="col q-ml-sm q-mb-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.transport_details.price"
                :label="$t('Price')"
              />
              <input-simple
                class="col q-ml-sm q-mb-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.transport_details.km"
                :label="$t('KM')"
              />
            </div>
              <div class="col">
              <input-simple
                class="col q-ml-sm q-mb-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.transport_details.Area"
                :label="$t('Area')"
              />
              <input-simple
                class="col q-ml-sm q-mb-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.transport_details.plate_number"
                :label="$t(' Plate #')"
              />
               <input-simple
                class="col q-ml-sm q-mb-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.transport_details.car_model"
                :label="$t('Car Type')"
              />
            </div>
          </div>
        </q-tab-panel>
        <q-tab-panel name="hostel_details">
          <div class="row">
            <div>
              <div class="text-h6">{{ $t("HostelDetails") }}</div>
            </div>
          </div>
          <div class="row">
              <div class="col">
              <input-simple
                class="col q-ml-sm q-mb-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.hostel_details.room_number"
                :label="$t('Room Number')"
              />
               <input-simple
                class="col q-ml-sm q-mb-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.hostel_details.floor_number"
                :label="$t('Floor Number')"
              />
             <input-simple
                class="col q-ml-sm q-mb-sm"
                icon="apps"
                dense
                outlined
                :name.sync="form.hostel_details.bet_number"
                :label="$t(' Bet #')"
              />
            </div>
              <div class="col">
           
              
          <div class="col">
             <n-select
            icon="mdi-clock"
            class="col q-ma-sm"
            :label="$t('Room Type')"
            :model.sync="selected_department"
            :options="departments"
            :name.sync="slected_department"
          /> 
           <n-select
            icon="mdi-clock"
            class="col q-ma-sm"
            :label="$t('Setter')"
            :model.sync="selected_department"
            :options="departments"
            :name.sync="slected_department"
          /> 
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
          @click="handleUpdate($event)"
          text-color="white"
          icon="save"
          :label="$t('update')"
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
      selected_job: null,
      selected_time: null,
      departments: [],
      slected_department: null,
      department_options: [],
      selectedStatus: { name: this.$t("Active"), value: 1 },
      form: {
        addmission_number : null,
        roll_number: null,
        class_id: 0,
        department_id: 0,
        first_name: null,
        last_name: null,
        gender: "male",
        date_of_birth: null,
        mobile_number: null,
        email: null,
        addmission_date: null,

        parent_details: {
          father_name: null,
          father_phone_number: null,
          father_occupation: null,
          brother_name: null,
          brother_phone_number: null,
          brother_occupation: null,
          
        },
        student_address: {
          current_address: null,
          Permanent_address: null,
        },
        hostel_details:{
          room_number:null,
          floor_number:null,
          bet_number:null
        },
        transport_details: {
          driver_name: null,
          area: null,
          route: null,
          plate_number: null,
          plate_number: null,
          car_model: null,
          price: null,
          km: null,
        },
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
         handleUpdate() {
        this.submitting =true;
        const fileData = new FormData();
        fileData.append("_method",'patch');
        fileData.append("form", JSON.stringify(this.form));
        this.$axios.post(`student/${this.$route.params.id}`,fileData)
        .then(res =>{
            this.$router.push("/student");
            this.submitting = false;
            this.$q.notify({
                color: "green-4",
                textColor: "white",
                icon: "cloud_done",
                message: "Successfull"
            });
            });
    },
    
  
    editData()
  {
    this.$axios.get(`student/edit/${this.$route.params.id}`).then(data =>{
      data =data.data;
      console.log(data.first_name);
      this.form.class_id          = data.class_id;
      this.form.department_id     = data.department_id;
      this.form.first_name        = data.first_name;
      this.form.last_name         = data.last_name;
      this.form.addmission_date   = data.addmission_date;
      this.form.mobile_number     = data.mobile_number;
      this.form.email             = data.email;
      //json parse konim ka data ba json save shoda
      if(data.parent_details)
      {
        let parent_details = JSON.parse(data.parent_details);
        this.form.parent_details.father_name          = parent_details.father_name ;
        this.form.parent_details.father_phone_number  = parent_details.father_phone_number ;
        this.form.parent_details.father_occupation    = parent_details.father_occupation ;

        this.form.parent_details.brother_name         = parent_details.brother_name ;
        this.form.parent_details.brother_phone_number = parent_details.brother_phone_number ;
        this.form.parent_details.brother_occupation   = parent_details.brother_occupation ;

      }

      if(data.student_address)
      {
        let student_address = JSON.parse(data.student_address);
        this.form.student_address.current_address     = student_address.current_address ;
        this.form.student_address.Permanent_address   = student_address.Permanent_address ;
      }
      if(data.transport_details)
      {
        let transport_details = JSON.parse(data.transport_details);
      this.form.transport_details.driver_name       = transport_details.driver_name ;
      this.form.transport_details.route             = transport_details.route ;
      this.form.transport_details.area              = transport_details.area ;
      this.form.transport_details.price             = transport_details.price ;
      this.form.transport_details.km                = transport_details.km ;
      this.form.transport_details.plate_number      = transport_details.plate_number ;
      this.form.transport_details.plate_number      = transport_details.plate_number ;
      this.form.transport_details.car_model         = transport_details.car_model ;
      }

      if(data.hostel_details)
      {
        let hostel_details = JSON.parse(data.hostel_details);
        this.form.hostel_details.room_number          = hostel_details.room_number;
        this.form.hostel_details.floor_number         = hostel_details.floor_number;
        this.form.hostel_details.bet_number           = hostel_details.bet_number;
      }


      if(data.miscellaneous_details)
      {
        let miscellaneous_details = JSON.parse(data.miscellaneous_details);
        this.form.miscellaneous_details.bank_account_number                 = miscellaneous_details.bank_account_number;
        this.form.miscellaneous_details.bank_name                           = miscellaneous_details.bank_name;
        this.form.miscellaneous_details.ifsc_code                           = miscellaneous_details.ifsc_code;
        this.form.miscellaneous_details.national_identification_number      = miscellaneous_details.national_identification_number;
        this.form.miscellaneous_details.local_identification_number         = miscellaneous_details.local_identification_number;
        this.form.miscellaneous_details.previou_school_details              = miscellaneous_details.previou_school_details;
        this.form.miscellaneous_details.note                                = miscellaneous_details.note;
      }
          });
    },
  },
  
  mounted() {
    this.editData();
  }
};
</script>
<style lang="css" scoped></style>
