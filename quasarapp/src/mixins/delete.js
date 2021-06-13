export default function deleteData(url) {
  let deleteUrl = url;

  return new Promise((resovle, reject) => {
    this.$q.dialog({
      title: 'Confirm',
      message: 'Do you Want to Delete ?',
      ok: {
        push: true
      },
      cancel: {
        push: true,
        color: 'negative'
      },
      persistent: true
    }).onOk(() => {
      this.$axios.delete(deleteUrl).then(res => {
        this.$q.notify({
          color: "green-4",
          textColor: "white",
          icon: "cloud_done",
          position:'top-right',
          message: "Successfull",
        })
        this.getRecord();
      })
    }).onCancel(() => {
      this.$q.notify({
        color: "green-4",
        textColor: "white",
        icon: "cloud_done",
        position:'top-right',
        message: "Your File is save",
      })
    }).onDismiss(() => {
      // console.log('I am triggered on both OK and Cancel')
    })
  })
}
