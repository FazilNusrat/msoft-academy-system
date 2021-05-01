<template>
	<q-card-actions align="right">
    <!-- <q-btn flat label="Save" color="primary" v-close-popup /> -->
    <!-- <q-btn label="Submit" type="submit" color="primary" /> -->
    <q-btn
      label="Reset"
      type="reset"
      color="white"
      text-color="primary"
      push
      icon="refresh"
	   />
      <q-btn
        type="submit"
        :loading="submitting"
        :label="label"
        push
        icon="save"
        color="cyan-8"
      >
        <template v-slot:loading>
          <q-spinner-facebook />
        </template>
      </q-btn>
	</q-card-actions>
</template>

<script>
export default {
  props: ['submitting', 'label']
};
</script>

<style lang="css" scoped>
</style>
