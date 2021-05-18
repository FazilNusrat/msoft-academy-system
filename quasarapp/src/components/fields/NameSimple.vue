<template>
	<div>
		<q-input
      outlined
      :label="label"
      :ref="refname"
      dense
      :type="type?type:'text'"
      :value="name"
      maxlength='maxlength'
      class="q-mt-sm"
      @input="inputs($event)"
    >
      <template v-slot:prepend>
        <q-icon :size="(size?size:'sm')" :name="(icon?icon:'info')" color="cyan-7" />
      </template>
        </q-input>
	</div>
</template>

<script>

export default {
	props: ['name', 'label', 'refname','icon','type', 'size','maxlength'],
  name: 'SimpleName',

  data() {
    return {

    };
  },
  methods: {
    inputs(e) {

      this.$emit('update:name', e)
      this.$emit('input',e);
    }
  }
};
</script>

<style lang="css" scoped>
</style>
