<template>
  <div class="row">
  	<q-linear-progress rounded :size="(size?size:'35px')" :value="(value?value:'0.14')" :color="(color?color:'cyan-7')" class="three_d  my_radio_less my_border_white glossy">
      <div class="text-white absolute-full q-ml-sm text-h6">
      	<slot></slot>
      </div>
    </q-linear-progress>
  </div>
</template>
<script>
export default {
	props: ['size','value','color'],

  name: 'HeaderTitle',

  data() {
    return {

    }
  }
}

</script>
<style lang="css" scoped>
</style>
