<template>
  <div>
     <q-card class="my-card">
      <q-img
        :src="'http://localhost:8000/uploads/staff/' + info.photo"
        style="height: 300px"
      />
    </q-card>
    <q-card class="my-card">
    </q-card>
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
                  'http://localhost:8000/uploads/sttaf/small/' + info.photo
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
              >Addmission No : {{ info.addmission_number }}</q-item-label
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
              >last Name  : {{ info.last_name }}</q-item-label
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
              >Date Of Birth  : {{ info.date_of_birth }}</q-item-label
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
              >Address  : {{ info.address }}</q-item-label
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
              >Roll Number : {{ info.roll_number }}</q-item-label
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
              >Father Name  : {{ info.father_name }}</q-item-label
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
              >Email  : {{ info.email }}</q-item-label
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
              >City  : {{ info.city }}</q-item-label
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
              >First Name : {{ info.first_name }}</q-item-label
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
              >phone  : {{ info.phone }}</q-item-label
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
              >Salary  : {{ info.salary }}</q-item-label
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
              >Job Name  : {{ info.job_name }}</q-item-label
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
        info:[],
    };
  },
  methods: {
    showData() {
        this.$axios.get(`staff/show/${this.$route.params.id}`).then(data => {
        this.info= data.data;
      });
    },
  },
  created() {
    this.showData();
    // console.log($info)
  },
};
</script>
