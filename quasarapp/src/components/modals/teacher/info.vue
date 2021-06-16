<template>
  <div class="">
    <q-card >
      <q-form>
        <!-- <q-card-section> -->
          <div class="three_d q-pa-sm bg-cyan-7 text-white">{{$t('ModifyTeacher')}}</div>
        <!-- </q-card-section> -->

        <q-separator />

        <q-card-section style="max-height: 50vh" class="scroll">
          <n-name ref="modalName" class="q-mb-sm" autofocus="autofocus" icon="explore" :label="$t('Name')" refname="name" :name.sync="form.name"/>
        
          <n-simple icon="birth_day" :label="$t('birth_day')" :name.sync="form.birth_day"/>
        </q-card-section>

        <q-separator />

        <q-card-actions align="right">
          <n-submit label="Ok"></n-submit>
        </q-card-actions>
      </q-form>
    </q-card>
  </div>
</template>
<script>
import NName from 'src/components/fields/Name.vue'
import NSimple from 'src/components/fields/NameSimple.vue'
export default {
  name: 'Modal',
  props:['id'],
  components: {
    NName,
    NSimple,
    'n-submit': require('components/fields/Submit.vue').default
  },
  data () {
    return {
      submitting: false,
      form: {

      },
    }
  },
  methods: {

  },
  created() {
  }

};
</script>

<style lang="css" scoped>
</style>
