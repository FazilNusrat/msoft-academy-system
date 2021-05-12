// import something here
import deleteData from '../mixins/delete.js';
// "async" is optional;
// more info on params: https://quasar.dev/quasar-cli/boot-files
export default async ({ Vue }) => {
  // something to do
  Vue.prototype.$delete = deleteData;
}
