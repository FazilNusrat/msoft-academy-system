<template>
  <div>
     <q-card class="my-card">
      <q-img
        :src="'http://localhost:8000/uploads/teachers/' + info.photo"
        style="height: 300px"
      />
    </q-card>
    <!-- <q-card class="my-card">
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
          <img :src="'http://localhost:8000/uploads/teachers/small/'+info.photo" />
        </q-avatar>
      </q-card-section>
    </q-card> -->
    <div class="q-pa-md" >
      <q-toolbar class="bg-cyan-7 q-mb-xs text-white shadow-2">
        <div class="col text-center">
          <q-btn
            push
            size="xl"
            round
            style="margin-top: -17%"
            class="my_border_white three_d"
          >
            <q-avatar size="170px" class="my_border_white">
              <q-img
                :src="
                  'http://localhost:8000/uploads/teachers/small/' + info.photo
                "
                style="height: 200px"
              />
            </q-avatar>
          </q-btn>
        </div>
        <q-toolbar-title>Informations</q-toolbar-title>
      </q-toolbar>

      <div class="row">
        <div class="col q-mr-sm">
          <q-list bordered>
        <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Name : {{ info.first_name }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>
         <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Last Name  : {{ info.last_name }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>
         <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Email : {{ info.email }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>
         <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Phone :{{ info.mobile_number }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>
        <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Class :{{ info.class_name }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>
      </q-list>
        </div>

        <div class="col q-mr-sm">
          <q-list bordered>
        <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >DOB :{{ info.date_of_birth }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>
         <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Salary:{{ info.salary }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>
         <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Current Address : {{ info.current_address }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>
         <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Permenent Address :{{ info.permenent_address }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>

        <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Section :{{ info.section_name }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>
      </q-list>
        </div>

        <div class="col">
          <q-list bordered>
        <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Tazkera Number :{{ info.tazkera_number }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>
         <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Education Level : {{ info.education_level }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>
         <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Email : {{ info.email }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>
         <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Experience :{{ info.experience }}</q-item-label
            >
          </q-item-section>
          <q-item-section side>
            <q-icon name="chat_bubble" color="cyan-7" />
          </q-item-section>
        </q-item>

           <q-item class="shadow-7 my_radio " clickable v-ripple>
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
              >Gender :{{ info.gender }}</q-item-label
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
    };
  },
  methods: {
    showData() {
      this.$axios.get(`teacher/show/${this.$route.params.id}`).then((data) => {
        this.info = data.data;
      // console.log('asas',data)

        //we can not make like edit becuase just we want to display
        //if we write this.info,last_name= data.last_name it store
        //but we have data on database
      });
    },
  },
  created() {
    this.showData();
    // console.log($info)
  },
};
</script>
