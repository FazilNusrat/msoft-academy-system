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
    <div class="q-pa-md" >
      <q-toolbar class="bg-cyan-7 q-mb-xs text-white shadow-2 text-center ">
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
              >Book Title : {{ info.book_title }}</q-item-label
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
              > Publisher  : {{ info.publisher }}</q-item-label
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
              >Book Prince  : {{ info.book_price }}</q-item-label
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
              >Book Number : {{ info.book_number }}</q-item-label
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
              >Author  : {{ info.author }}</q-item-label
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
              >Description  : {{ info.description }}</q-item-label
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
              >Rack Number : {{ info.rack_number }}</q-item-label
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
              >Subject  : {{ info.subject }}</q-item-label
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
              >Phone  : {{ info.phone }}</q-item-label
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
        this.$axios.get(`library/show/${this.$route.params.id}`).then(data => {
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
