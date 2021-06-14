<template>
  <div>
    <div
      icon="person_add"
      bg="bg-cyan-7"
      class="q-ma-smbg my_radio_less bg-cyan-7 my_border_white text-white three_d glossy text-h6 q-pl-sm"
    >
      {{ $t("Add Book") }}
    </div>
    
       <div class="row q-mt-sm">
      <div class="col-12">
        <div class="row q-mb-sm q-px-sm">
          <input-required
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.book_title"
            outlined
            :label="$t('Book Title')"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.book_number"
            outlined
            :label="$t('Book Number')"
          />
        </div>
        

        <div class="row q-mb-sm q-px-sm">
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.rack_number"
            outlined
            :label="$t('Rack Number')"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.publisher"
            outlined
            :label="$t('Publisher')"
          />
        </div>


        <div class="row q-mb-sm q-px-sm">
          <input-required
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.author"
            outlined
            :label="$t('Author')"
          />
          <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.subject"
            outlined
            :label="$t('Subject')"
          />
        </div>

        
        <div class="row q-mb-sm q-px-sm">
          <input-required
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.book_price"
            outlined
            :label="$t('Book Price')"
          />

           <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.description"
            outlined
            :label="$t('Description')"
          />
        </div>
        <div class="row q-mb-sm q-px-sm">
             
           <input-simple
            class="col q-ma-xs"
            icon="apps"
            dense
            :name.sync="form.phone"
            outlined
            :label="$t('phone')"
          />  
          <date-picker
            class="col q-ma-sm"
            dense
            :date.sync="form.get_book"
            :label="$t('Get Book')"
          />    
        </div>
        <div class="row q-mb-sm q-px-sm">
          <date-picker
            class="col q-ma-sm"
            dense
            :date.sync="form.return_book"
            :label="$t('Return Book')"
          />  
        </div>




      </div>
    </div>

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
      <q-btn color="red" outline :label="$t('Cancel')" to="/library" />
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
        book_title: null,
        book_number: null,
        publisher: null,
        author: null,
        subject: null,
        get_book: null,
        return_book: null,
        book_price: null,
        phone: null,
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
      const fileData = new FormData();
      fileData.append("_method",'patch');
      fileData.append('form',JSON.stringify(this.form));
      this.$axios.post(`library/${this.$route.params.id}`,fileData)
      .then(res =>{
          this.$router.push("/booklist");
          this.$q.notify({
            color: "green-4",
            textColor: "white",
            icon: "cloud_done",
            message: "Successfull"
          });
        });
       
  },
  editData(){
      this.$axios.get(`library/edit/${this.$route.params.id}`).then(data=>{
          data=data.data;
          this.form.book_title          = data.book_title;
          this.form.book_number         = data.book_number;
          this.form.publisher           = data.publisher;
          this.form.author              = data.author;
          this.form.get_book            = data.get_book;
          this.form.return_book         = data.return_book;
          this.form.book_price          = data.book_price;
          this.form.subject             = data.subject;
          this.form.phone               = data.phone;
      });
    }
  },
  mounted() {
      this.editData();
    // this.$getAcademy("department").then(() => {
    //   console.log("aaaaa", this.departments);
    // });  
    // this.$getAcademy("class").then(() => {
    //   console.log("aaaaa", this.classes);
    // });
  }
  
};
</script>
