<template>
  <q-btn flat dense :color="color" class="my_radio no-padding q-ml-sm" @click="$emit('click')">
    <q-linear-progress :value="progress" query size="45px"  style="width:50px; height: 50px" :color="color" class="glossy my_radio_less three_d my_border_white_less bg-grey-3">
      <div class="absolute-full flex flex-center">
        <q-icon :name="icon" size="md" color="white" />
      </div>
    </q-linear-progress>
    <div class=" self-center q-pl-xs text-bold" :class="textclass">
      <slot></slot>
    </div>
  </q-btn>
</template>
<script>
export default {
	props: ['color','indeterminate','icon', 'textclass'],

  name: 'LinearButton',

  data () {
    return {
      progress: 0.01,
      buffer: 0.01
    }
  },

  mounted () {
    this.interval = setInterval(() => {
      if (this.progress >= 1) {
        this.progress = 0.01
        this.buffer = 0.01
        return
      }

      this.progress = Math.min(1, this.buffer, this.progress + 0.4)
    }, 700 + Math.random() * 1000)

    this.bufferInterval = setInterval(() => {
      if (this.buffer < 1) {
        this.buffer = Math.min(1, this.buffer + Math.random() * 0.6)
      }
    }, 700)
  },

  beforeDestroy () {
    clearInterval(this.interval)
    clearInterval(this.bufferInterval)
  }
}

</script>
<style lang="css" scoped>
</style>
