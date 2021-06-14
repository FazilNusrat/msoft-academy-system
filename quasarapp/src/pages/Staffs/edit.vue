<template>
  <div>
    <div
      icon="person_add"
      bg="bg-cyan-7"
      class="q-ma-smbg my_radio_less bg-cyan-7 my_border_white text-white three_d glossy text-h6 q-pl-sm"
    >
      {{ $t("Update Staffs") }}
    </div>
    <q-card>
      <div class="q-pa-lg">
        <div class="row">
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('First Name')"
              ref="modalName"
              autofocus="autofocus"
              refname="name"
              :name.sync="form.first_name"
            />
          </div>
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Last Name')"
              ref="modalName"
              refname="name"
              :name.sync="form.last_name"
            />
          </div>
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Father Name')"
              ref="modalName"
              refname="name"
              :name.sync="form.father_name"
            />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Phone')"
              ref="modalName"
              refname="name"
              :name.sync="form.phone"
            />
          </div>
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Email')"
              type="email"
              ref="modalName"
              refname="name"
              :name.sync="form.email"
            />
          </div>
         <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Current Address')"
              ref="modalName"
              refname="name"
              :name.sync="form.salary"
            />
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Permenent Address')"
              ref="modalName"
              refname="name"
              :name.sync="form.address"
            />
          </div>
          <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('Education Level')"
              ref="modalName"
              refname="name"
              :name.sync="form.city"
            />
          </div>
         <div class="col-md-4 q-pa-sm">
            <input-simple
              icon="explore"
              :label="$t('job_name')"
              ref="modalName"
              refname="name"
              :name.sync="form.job_name"
            />
          </div>
        </div>
      </div>
    </q-card>
    <q-card-actions class="col-5 flex flex-center">
      <q-btn
        push
        color="light-blue"
        class="q-ma-sm"
        @click="handleUpdate()"
        text-color="white"
        icon="save"
        :label="$t('update')"
        v-close-popup
      />
      <q-btn color="red" outline :label="$t('Cancel')" to="/staffs" />
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
        first_name: null,
        last_name: null,
        father_name: null,
        email: null,
        phone: null,
        salary: null,
        address: null,
        city: null,
        job_name: null,
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
    handleUpdate() {
      console.log("Thanks For Data Insert");
      this.submitting = true;
      const fileData = new FormData();

      fileData.append("_method", 'patch');
      fileData.append("form", JSON.stringify(this.form));
      this.$axios.post(`staff/${this.$route.params.id}`, fileData)
        .then(res => {
          this.$router.push("/staffs");
          this.submitting = false;
          this.$q.notify({
            color: "green-4",
            textColor: "white",
            icon: "cloud_done",
            message: "Successfull Updated"
          });
        });

    },
    editData() {
      this.$axios.get(`staff/edit/${this.$route.params.id}`).then(data => {
        data = data.data;
        this.form.first_name = data.first_name;
        this.form.last_name = data.last_name;
        this.form.father_name = data.father_name;
        this.form.phone = data.phone;
        this.form.email = data.email;
        this.form.salary = data.salary;
        this.form.address = data.address;
        this.form.city = data.city;
        this.form.job_name = data.job_name;
      });
    }
  },
  
  mounted() {
    this.editData();
  }
};
</script>
<style lang="css" scoped></style>
