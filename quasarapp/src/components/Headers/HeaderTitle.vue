<template>
  <div class="row">
  	<!-- <q-linear-progress rounded :size="(size?size:'35px')" value="1" :color="(color?color:'cyan-7')" class="three_d  my_radio_less my_border_white glossy">
      <div class="text-white absolute-full q-ml-sm text-h6">
      	<slot></slot>
      </div>
    </q-linear-progress> -->
    <div class="three_d bg-cyan-7 text-white text-h6 glossy my_radio_less my_border_white full-width q-pl-sm">
      <slot></slot>
    </div>
  </div>
</template>
<script>
export default {
	props: ['size','color'],

  name: 'HeaderTitle',

  data() {
    return {

    }
  }
}

</script>
<style lang="css" scoped>
</style>
