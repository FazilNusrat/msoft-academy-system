<template>
	<!-- <div v-if="showCM=true" > -->
    <q-dialog :value="showCM" @input="$emit('update:showCM', $event)">
      <div style="width: 500px; max-width: 80vw;" class="my_border_bottom">
        <slot></slot>
      </div>
    </q-dialog>
  <!-- </div> -->
</template>

<script>
export default {
	props: ['showCM'],
  name: 'MainModal',

  data() {
    return {
      name: this.value
    };
  },
};
</script>

<style lang="css" scoped>
</style>
