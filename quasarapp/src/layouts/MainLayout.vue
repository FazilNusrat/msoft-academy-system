<template>
  <q-layout view="hHh LpR fFf" class="shadow-2 rounded-borders">
    <q-header elevated>
      <q-toolbar class="bg-cyan-7">
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="leftDrawerOpen = !leftDrawerOpen"
        />

        <q-toolbar-title> Academy Management System </q-toolbar-title>

        <div>Academy v{{ $q.version }}</div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
      content-class="bg-grey-1"
    >
      <q-item-label header>Navigation</q-item-label>
      <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="ControlPanel"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/class/index"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="school"
              />
            </q-item-section>
            <q-item-section>Add Class</q-item-section>
          </q-item>
           <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/departments/index"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="manage_accounts"
              />
            </q-item-section>
            <q-item-section>Add Department</q-item-section>
          </q-item>
           <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/batchs/index"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="batch_prediction"
              />
            </q-item-section>
            <q-item-section>Add Batch</q-item-section>
          </q-item>
           <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/subjects/index"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="subject"
              />
            </q-item-section>
            <q-item-section>Add Subjects</q-item-section>
          </q-item>
           <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/times/index"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="history"
              />
            </q-item-section>
            <q-item-section>Add Time</q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>
      <q-expansion-item
        color="white"
        group="somegroup"
        expand-separator
        icon="list"
        label="Data Entery"
      >
        <q-list class="q-ml-md">
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/students/index"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="card_giftcard"
              />
            </q-item-section>
            <q-item-section>Students</q-item-section>
          </q-item>
          <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/teachers/index"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Teacher</q-item-section>
          </q-item>
               <q-item
            clickable
            class="my_hover"
            dense
            v-ripple
            to="/staf/index"
          >
            <q-item-section avatar>
              <q-btn
                push
                color="white"
                size="sm"
                text-color="cyan-7"
                round
                icon="apps"
              />
            </q-item-section>
            <q-item-section>Staf</q-item-section>
          </q-item>
        </q-list>
      </q-expansion-item>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import EssentialLink from "components/EssentialLink.vue";

const linksData = [
  {
    title: 'Student',
    caption: 'quasar.dev',
    icon: 'school',
    link: 'pages/students/index.vue'
  },
  {
    title: 'Teachares',
    caption: 'github.com/quasarframework',
    icon: 'code',
    link: 'pages/teachars/index.vue'
  },
];
export default {
  name: "MainLayout",
  components: { EssentialLink },
  data() {
    return {
      leftDrawerOpen: false,
      essentialLinks: linksData,
      link: "inbox",
    };
  },
};
</script>
<style lang="sass">
.my-menu-link
  color: white
  background: #F2C037
</style>