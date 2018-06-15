 class Errors{
 	constructor(){
 		this.errors = {}
 	}

      has(field){ 
            return this.errors.hasOwnProperty(field)
      }

 	get(field){
 		if(this.errors[field]){
                  return this.errors[field][0];
                  // return this.errors[field][0];
 		}
 	}  

      record(errors){
            this.errors = errors;
      }

      clear(val){
            // this.errors[val] = ''
            delete this.errors[val]
      }

      any(){
           // how this any is reactive
            return Object.keys(this.errors).length > 0
      }
 }


 // class Form {

 //      constructor(data){
 //           // crate all key and values
 //           for (let field in data){
 //            this.field = data[data];
 //           }
 //      }

 //      reset(){
 //            this.name = ''
 //      }

 // }
