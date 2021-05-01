<template>
	 <div>
    <q-table
      :title="title"
      :data="data"
      :columns="columns"
      :row-key="(rowKey?rowKey:'id')"
      :pagination.sync="paginations"
      :loading="loading"
      :filter="filter"
      :dense="dense"
      @request="onRequest"
      binary-state-sort
      color="negative"
      :fullscreen.sync="isFullscreen"
      class=" three_d q-ma-sm my_radio_less"
    >
    <template v-slot:header="props">
        <q-tr :props="props">
          <q-th
            v-for="col in props.cols"
            :key="col.name"
            :props="props"
            class="bg-primary text-white"
            @click="head(col.name)"
          >
            {{ col.label }}
          </q-th>
        </q-tr>
      </template>
        <template v-slot:body-cell-actions="props" :dense="dense">
          <q-td key="actions" :props="props">
            <q-btn size="sm" color="primary" class="glossy three_d my_border_white_less q-ml-xs" v-show="noEdit?false:true" icon="edit" @click="edit(props.row.id)" />
            <q-btn size="sm" color="secondary" class="glossy three_d my_border_white_less q-ml-xs" v-show="noInfo?false:true" :icon="infoIcon?infoIcon:'info'" @click="info(props.row.id)" />
            <q-btn size="sm" color="negative" class="glossy three_d my_border_white_less q-ml-xs" v-show="noDelete?false:true" icon="delete" @click="del(props.row.id)"  />
           
            <!-- <q-btn-group rounded>
              <q-btn color="yellow-13" rounded flat glossy icon="edit" @click="edit(props.row.id)" />
              <q-btn color="green" rounded glossy flat icon="visibility"  @click="info(props.row.id)" />
              <q-btn color="negative" rounded flat glossy icon-right="delete" @click="del(props.row.id)" />
            </q-btn-group> -->
          </q-td>
      </template>
      <template v-slot:top-right>
        <q-input standout="bg-light-blue-8" class="q-ml-sm" :loading="loading" dense debounce="300" @input="$emit('update:filter', $event)"  :value="filter" placeholder="Search">
          <template v-slot:append>
            <q-icon name="search" />
          </template>
        </q-input>
      </template>
      <template v-slot:top-left>
        <q-btn flat round dense :icon="isFullscreen ? 'fullscreen_exit' : 'fullscreen'" @click="isFullscreen =! isFullscreen" class="q-ml-md" />
        <q-toggle label="M-Sizer" v-model="dense" icon="apps" />
      </template>

    </q-table>
  </div>
</template>

<script>
export default {
  props: ['loading', 'data', 'pagination', "filter", 'columns', 'rowKey', 'infoIcon', 'title','noEdit','noInfo','noDelete'],
  data() {
    return {
      paginations: this.pagination,
      isFullscreen: false,
      dense: true,
    };
  },
  methods: {
    onRequest (props) {
      this.$emit('request',props);
      this.paginations = this.pagination
    },
    del(id) {
      this.$emit('del',id);
    },
    edit(id) {
      this.$emit('edit',id);
    },
    info(id) {
      this.$emit('info',id);
    },
    head(name) {
      this.$emit('head',name);
    }
  }
};
</script>

<style lang="css" scoped>
</style>
