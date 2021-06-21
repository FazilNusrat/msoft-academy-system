<template>
  <div>
    <q-card class="my-card">
      <q-card-section
        class="text-center bg-grey-4 q-pa-xl"
        style="height: 30vh"
      >
        <q-avatar
          size="150px"
          class="avatar1 shadow-5 fixed"
          clickable
          v-ripple
        >
          <img src="" />
        </q-avatar>
      </q-card-section>
    </q-card>
    <div class="q-pa-md">
      <q-toolbar class="bg-cyan-7 q-mb-xs text-white shadow-2 text-center">
        <q-toolbar-title>Informations</q-toolbar-title>
      </q-toolbar>
      <div class="row">
        <div class="q-pa-md col-4" style="max-width: 350px">
          <q-toolbar class="bg-cyan-7 text-white text-center shadow-7 my_border_white my_radio_less shadow-2">
            <q-toolbar-title>Student Information</q-toolbar-title>
          </q-toolbar>
          <q-list bordered>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label
                  >Addmission Number :
                  {{ info.addmission_number }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label
                  >Roll Number : {{ info.roll_number }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>First Name : {{ info.first_name }}</q-item-label>
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>Last Name : {{ info.last_name }}</q-item-label>
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>DOB : {{ info.date_of_birth }}</q-item-label>
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>phone : {{ info.mobile_number }}</q-item-label>
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>Email : {{ info.email }}</q-item-label>
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label
                  >Addmission Date : {{ info.addmission_date }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>gender : {{ info.gender }}</q-item-label>
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
          </q-list>
          <div class="q-mt-md">
            <q-toolbar class="bg-cyan-7 text-white text-center shadow-7 my_border_white my_radio_less shadow-7 my_border_white my_radio_less">
            <q-toolbar-title>Hostal Information</q-toolbar-title>
          </q-toolbar>

          <q-list bordered>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Room Number : {{ hostel_details.room_number }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Room Type : {{ hostel_details.room_type }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Floor Number : {{ hostel_details.floor_number }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Setter : {{ hostel_details.setter }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label> Bet# : {{ hostel_details.bet }}</q-item-label>
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
          </q-list>
          </div>
        </div>
        <!-- Parent details   -->
        <div class="q-pa-md col-4" style="max-width: 350px">
          <q-toolbar class="bg-cyan-7 text-white text-center shadow-7 my_border_white my_radio_less shadow-2">
            <q-toolbar-title>Parent Information</q-toolbar-title>
          </q-toolbar>

          <q-list bordered>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Fateher Name : {{ parent_details.father_name }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Fateher Phone# :
                  {{ parent_details.father_phone_number }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Fateher Occupation :
                  {{ parent_details.father_occupation }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Brother Name : {{ parent_details.brother_name }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Brother Phone # :
                  {{ parent_details.brother_name }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Brother Occupation :
                  {{ parent_details.brother_occupation }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
          </q-list>
          <div class="q-mt-md">
            <q-toolbar class="bg-cyan-7 text-white text-center shadow-7 my_border_white my_radio_less shadow-2">
            <q-toolbar-title>Miscellaneous Information</q-toolbar-title>
          </q-toolbar>

          <q-list bordered>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Account Number : {{ miscellaneous_details.bank_account_number }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Bank Name {{ miscellaneous_details.bank_name }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  IFSC Code: {{ miscellaneous_details.ifsc_code }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  National Number: {{ miscellaneous_details.national_identification_number }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Local Number : {{ miscellaneous_details.local_identification_number }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Pervious School : {{ miscellaneous_details.previou_school_details }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Note: {{ miscellaneous_details.note }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
          </q-list>
          </div>
        </div>

        <div class="q-pa-md col-4" style="max-width: 350px">
          <q-toolbar class="bg-cyan-7 text-white text-center shadow-7 my_border_white my_radio_less shadow-2">
            <q-toolbar-title>Transport Information</q-toolbar-title>
          </q-toolbar>

          <q-list bordered>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Driver Name :
                  {{ transport_details.driver_name }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Route : {{ transport_details.route }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label> Area: {{ transport_details.area }}</q-item-label>
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Number Plate # :
                  {{ transport_details.plate_number }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Price : {{ transport_details.price }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>

            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label> KM : {{ transport_details.km }}</q-item-label>
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
            <q-item class="shadow-7 my_radio" clickable v-ripple>
              <q-item-section avatar>
                <q-btn
                  round
                  icon="account_circle"
                  size="sm"
                  push
                  color="white"
                  text-color="cyan-7"
                >
                </q-btn>
              </q-item-section>

              <q-item-section>
                <q-item-label>
                  Car Model : {{ transport_details.car_model }}</q-item-label
                >
              </q-item-section>
              <q-item-section side>
                <q-icon name="chat_bubble" color="cyan-7" />
              </q-item-section>
            </q-item>
          </q-list>
        </div>

      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "profile",
  data() {
    return {
      info: [],
      parent_details: [],
      student_address: [],
      transport_details: [],
      hostel_details: [],
      miscellaneous_details: [],
    };
  },
  methods: {
    showData() {
      this.$axios.get(`student/show/${this.$route.params.id}`).then((data) => {
        this.info = data.data;
        // console.log('info is ',JSON.parse(this.info.parent_details));
        if (this.info.parent_details) {
          this.parent_details = JSON.parse(this.info.parent_details);
        }
        if (this.info.student_address) {
          this.student_Address = JSON.parse(this.info.student_address);
        }
        if (this.info.transport_details) {
          this.transport_details = JSON.parse(this.info.transport_details);
        }
        if (this.info.hostel_details) {
          this.hostel_details = JSON.parse(this.info.hostel_details);
        }
        if (this.info.miscellaneous_details) {
          this.miscellaneous_details = JSON.parse(
            this.info.miscellaneous_details
          );
        }
        //console.log('asas',data)

        //we can not make like edit becuase just we want to display
        //if we write this.info.last_name= data.last_name it store
        //but we wont to display data on database
      });
    },
  },
  created() {
    this.showData();
    // console.log($info)
  },
};
</script>
