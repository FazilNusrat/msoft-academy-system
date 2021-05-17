// import something here
import deleteData from '../mixins/delete.js'
import getAcademy from '../mixins/erp.js'
// "async" is optional;
// more info on params: https://quasar.dev/quasar-cli/boot-files
export default async ({ Vue }) => {
  // something to do
  Vue.prototype.$getAcademy = getAcademy;
  Vue.prototype.$delete = deleteData;
  
};
