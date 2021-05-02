<template>
      <q-select
        :value="model"
        use-input
        outlined
        class="q-mt-sm"
        dense
        :standout="standout"
        :label="label"
        :ref="refname"
        input-debounce="0"
        option-label="name"
        :options="options"
        @filter="filterFn"
        @input="input($event)"
      >
        <template v-slot:prepend>
          <q-icon :name="(icon?icon:'account_circle')" color="light-blue-8" />
        </template>
        <template v-slot:no-option>
          <q-item>
            <q-item-section class="text-grey">
              No results
            </q-item-section>
          </q-item>
        </template>
      </q-select>
</template>

<script>
export default {
  props:['options', 'model', 'label','refname','icon','standout'],
  name: 'Select',
  methods: {
     filterFn (val, update, abort) {
       this.$emit('filter',val, update, abort);
    },
    input(e) {
      this.$emit('update:model', e)
      this.$emit('input')
    }
  }
};
</script>

<style lang="css" scoped>
</style>
