export default function getErp(url, id=0) {
  let type = url;
  if(id!=null || id>0)
    type += '&id='+id;
  else type =url;
  let main_url = '/method_search?type=' + type;
    return new Promise((resovle, reject) => {
        this.$axios.get(main_url).then(res => {
            resovle('data');
            if (url === 'classes')
                this.classes = res.data;
            
            // if (url === 'contra_banks')
            //     if(res.data)
            //     {
            //         this.banks            = res.data 
            //         this.from_AccountList = res.data 
            //         this.to_AccountList   = res.data;

            //     }
            
        })
    })
}
