<template>
  <div class="q-ma-sm my_radio_less three_d q-pa-xs">
    <!-- <q-card class="bg-teal text-white" style="width: 300px">
        <q-card-section>
          <div class="text-h6">Add Class</div>
        </q-card-section> -->

    <h-title>Entry Staff</h-title>
    <div class="row justify-between q-mt-sm">
      <div class="row">
        <l-button icon="add" color="red" @click="addModal"
          >Add New</l-button
        >
        <l-button icon="mdi-file-pdf" color="orange">PDF</l-button>
        <l-button @click="addModal" icon="mdi-microsoft-excel" color="green-10">Excel</l-button>
        <l-button icon="mdi-email-send" color="red-6">Email</l-button>
        <l-button icon="mdi-whatsapp" color="green-6">Whatsapp</l-button>
      </div>
      <div class="row">
        <l-button icon="mdi-database-search" color="blue-grey-9"
          >Advance Search</l-button
        >
        <l-button icon="mdi-database-import" color="blue-7">Import</l-button>
      </div>
    </div>

  <m-modal :showCM.sync="showAddModal">
    <n-add-modal @close="hideAddModal()" />
  </m-modal>
  <m-modal :showCM.sync="showEditModal">
    <!-- <n-edit-modal :id="id" @close="hideEditModal()" /> -->
  </m-modal>


    <!-- <q-dialog v-model="medium">
      <q-card style="width: 700px; width: 80vw">
        <q-card-section class="bg-teal text-white">
          <div class="text-h6">Add Staff</div>
        </q-card-section>

        <q-card-section class="q-pt-none">
          <div class="row">
            <div class="col"></div>
            <div class="col-10 q-mr-lg">
              <q-input color="teal" v-model="form.name" label="Name">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.last_name" label="last_name">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.father_name" label="father_name">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.email" label="email">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.cnic" label="cnic">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.phone" label="phone">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.salary" label="salary">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.address" label="address">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>
              <q-input color="teal" v-model="form.start_date" label="start_date">
                <template v-slot:prepend>
                  <q-icon name="add" />
                </template>
              </q-input>

              <q-select
                dense
                outlined
                v-model="selectStaff"
                :options="staffClass"
                option-label="name"
                :label="$t('CreditLimitStatus')"
                class="q-ma-sm"
              >
                <template v-slot:prepend>
                  <q-icon name="credit_card_off" color="light-blue-8" />
                </template>
              </q-select>
            </div>
          </div>
        </q-card-section>

        <q-card-actions align="right" class="bg-white text-teal">
          <q-btn flat label="OK" @click="SaveRecord" v-close-popup>
            <q-icon name="save" />
          </q-btn>
          <q-btn flat label="close" v-close-popup>
            <q-icon name="close" />
          </q-btn>
        </q-card-actions>
      </q-card>
    </q-dialog> -->
  </div>
</template>

<script>

import NTable from "../../components/tables/DataTable.vue";
import LButton from "../../components/Buttons/LinearButton.vue";
import HTitle from "../../components/Headers/HeaderTitle.vue";
import MModal from 'src/components/general-components/MainModal.vue';
import NAddModal from 'src/components/modals/staff/Add.vue';
// import NEditModal from 'src/components/modals/class/Edit.vue';
// import NInfoModal from 'src/components/modals/class/Info.vue';

export default {
  components: { NTable, LButton, HTitle, MModal, NAddModal, },

  data() {
    return {
      showAddModal: false,
      visible: true,
      loading: false,
      id: 0,
      
    
    };
  },
  methods: {
    addModal(){
      // alert("Clicked")
      this.showAddModal = true

    },

    hideModal(){
      this.showAddModal = false
    },
    
    // clear() {
    //   (this.form.name = ""), 
    //   (this.form.last_name = ""), 
    //   (this.form.father_name = ""), 
    //   (this.form.email = ""), 
    //   (this.form.cnic = ""), 
    //   (this.form.phone = ""), 
    //   (this.form.salary = ""), 
    //   (this.form.address = "");
    //   (this.form.start_date = "");
    // },
   
  },

  created() {
  },
};
</script>

<style>
</style>