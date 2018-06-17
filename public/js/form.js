 class Form {

     constructor(data){
        this.originalData = data
        //crate all key and values to access this.name make key = value of all data
        for (let field in data){
          this[field] = data[field]
        }
        this.errors = new Errors();
     }
     reset(){
        for( let field in this.originalData){
          // this.originalData[field] = '' // it is not reactive
          this[field] = '' // this is ractive after make for field in data
        }
     }

     // data which we are sending
     data(){
        // clone object clear all unnessery data and for sending request
        let data = Object.assign({}, this);
        delete data.originalData;
        delete data.errors;
        return data;

     }

     // submit(requestType, url){
     //  console.log(this.data())
     //     axios[requestType](url, this.data())
     //        .then(this.onSuccess.bind(this))
     //        .catch(this.onFail.bind(this)); // this give param automaticly but how?
     // }
     
     // onSuccess(response){
     //  this.reset();
     // }

     // onFail(error){
     //  this.errors.record(error.response.data.errors)
     // }

 }
