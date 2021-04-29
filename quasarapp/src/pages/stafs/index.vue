<template>
  <div>
    <n-table
      title="Teachers"
      :loading="loading"
      @head="head"
      :data="data"
      :pagination.sync="pagination"
      @del="del"
      @info="info"
      @edit="edit"
      :filter.sync="filter"
      :columns="columns"
      @request="onRequest"
    />
  </div>
</template>

<script>
import NTable from "../../components/tables/DataTable.vue";
export default {
  components: { NTable },
  data() {
    return {
      columns: [
        {
          name: "id",
          required: true,
          label: this.$t("Number"),
          field: (row) => row.id,
          sortable: true,
          classes: "bg-grey-2 ellipsis my_width10",
          align: "center",
          headerClasses: "bg-light-blue-6 text-white ",
        },
        {
          name: "name",
          classes: "my_width20",
          align: "left",
          label: this.$t("Name"),
          field: (row) => row.name,
          sortable: true,
        },
        {
          name: "employee",
          classes: "bg-grey-2 ellipsis my_width20",
          label: this.$t("ContactPerson"),
          align: "left",
          field: (row) => row.employee,
          sortable: true,
        },
        {
          name: "phone_no",
          label: this.$t("Phone"),
          classes: "my_width20",
          align: "left",
          field: (row) => row.phone_no,
          sortable: true,
        },
        {
          name: "address",
          classes: "bg-grey-2 ellipsis my_width30",
          label: this.$t("Address"),
          align: "left",
          field: (row) => row.address,
          sortable: true,
        },
        {
          name: "actions",
          label: this.$t("Actions"),
          align: "center",
          sortable: false,
          classes: "my_width10",
        },
      ],
      loading: false,
      filter: "",
      sortBy: "created_at",
      descending: false,
      page: 1,
      rowsPerPage: 12,
      rowsNumber: 12,
      data: [],
      pagination: {
        sortBy: "created_at",
        descending: false,
        page: 1,
        rowsPerPage: 12,
        rowsNumber: 12,
      },
    };
  },
};
</script>

<style>
</style>