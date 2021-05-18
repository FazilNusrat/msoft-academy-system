<template>
  <q-input
    outlined
    dense
    today-btn
    square
    :label="label?label:$t('Date')"
    :value.sync="value"
    @focus.prevent="show()"
    @input="$emit('update:value', $event)">
    <template v-slot:append >
      <q-icon
        name="event"
        class="cursor-pointer">
        <q-popup-proxy
          ref="qDateProxy"
          transition-show="scale"
          transition-hide="scale">
          <q-date
            :value="value"
            today-btn
            :options="optionsFn2"
            :calendar="calendar?calender:'gregorian'"
            @input="close($event)">
            <!-- <div class="row items-center justify-end">
              <q-btn v-close-popup label="Close" color="primary" flat/>
            </div> -->
          </q-date>
        </q-popup-proxy>
      </q-icon>
    </template>
  </q-input>
</template>

<script>
import { date } from 'quasar'

let timeStamp = Date.now()
// let formattedString = date.formatDate(timeStamp, 'YYYY/MM/DD')
export default {
  name: 'Date',
  props: ['value','calendar', 'min','max', 'label'],
  data() {
    return {
      dates:this.value
    }
  },
  methods: {
    optionsFn2 (date) {
        if(this.max && this.min)
          return date >= this.min && date <= this.max;
        else if(this.max)
          return date <= this.max;
        else if(this.min)
          return date >= this.min;
        else return date >= '1800/01/01';

    },
    close(e) {
      this.$emit('update:value', e);
        if (e !=null) this.$refs.qDateProxy.hide()
      },
    show() {
      this.$refs.qDateProxy.show()
    },
  },
  mounted() {
      // this.$emit('update:date', date.formatDate(timeStamp, 'YYYY/MM/DD'));
  }
};
</script>

<style lang="css" scoped>
</style>
