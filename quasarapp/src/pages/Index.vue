<template>
  <div>
    <div class="row">
      <div class="col-md-9">
          <q-table
      title="Treats"
      :data="teacher"
      :columns="columns"
      row-key="name"
    />
      </div>
      <div class="col q-ma-sm">
        <q-input
          class="q-ma-sm"
          dense
          outlined
          v-model="form.name"
          label="Name"
        />
        <q-input
          class="q-ma-sm"
          dense
          outlined
          v-model="form.last_name"
          label="Last Name"
        />
        <q-input
          class="q-ma-sm"
          dense
          outlined
          v-model="form.email"
          label="email"
        />
        <q-input
          class="q-ma-sm"
          dense
          outlined
          v-model="form.phone"
          label="phone"
        />
        <q-btn
          @click="saveRecord"
          class="q-mr-sm"
          color="white"
          text-color="green"
          icon="save"
          label="Save"
        />
        <q-btn color="white" text-color="red" icon="close" label="Cancel" />
      </div>
      
    </div>
  </div>
</template>

<script>
export default {
  name: "PageIndex",
  data() {
    return {
       columns: [
        { name: 'Name', align: 'center', label: 'Name', field: 'name', sortable: true },
        { name: 'Last Name', label: 'Last Name', field: 'last_name', sortable: true },
        { name: 'Email', label: 'Email', field: 'email' },
        { name: 'phone', label: 'phone', field: 'phone' },
      ],
      teacher: [],
      form: {
        name: null,
        last_name: null,
        email: null,
        phone: null
      },
    };
  },
  methods:{
    saveRecord(){

      // console.log('test File',this.form.name)
      this.$axios.post('teacher/store',this.form).then(res=>{
        this.$q.notify({
                color: "green-4",
                textColor: "white",
                icon: "cloud_done",
                position:'top-right',
                message: "Successfully inserted",
              })
              this.clear()
        this.$route.push('/teacher')

      });
    },
    clear(){
      this.form.name='',
      this.form.last_name='',
      this.form.email='',
      this.form.phone=''
    },
    getdata(){
      this.$axios.get('teacher/display',this.teacher).then(response=>{
        this.teacher=response.data;
      })
    }
  },
  created(){
    this.getdata();
  }
};
</script>
