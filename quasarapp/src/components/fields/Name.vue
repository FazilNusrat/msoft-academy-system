<template>
		<q-input
      outlined
      :label="label"
      :ref="refname"
      :value="name"
      dense
      :type="type?type:'text'"
      hide-bottom-space
      @input="$emit('update:name', $event)"
      :autofocus="autofocus?true:false"
      :rules="[(val) => (val && val.length > 0) || 'Please type something']">
      <template v-slot:prepend>
        <q-icon :name="(icon?icon:'account_circle')" color="cyan-7" />
      </template>
    </q-input>
</template>

<script>

export default {
	props: ['name', 'label', 'refname', 'autofocus','icon', 'type'],
  name: 'Name',

  data() {
    return {

    };
  },
};
</script>

<style lang="css" scoped>
</style>
