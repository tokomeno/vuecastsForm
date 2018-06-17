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
   		}
   	}  

    record(errors){
      this.errors = errors;
    }

    clear(val){
      // this.errors[val] = ''
      // i think we can rid of this field cause if we ara typing it is clear automatcly
    // we call this on type input and claering errors field 
      // if(val){
          delete this.errors[val]
          // return;
      // }
        // this.errors = {}
    }
    any(){
         // how this any is reactive
         // return true or false for disavled validations
          return Object.keys(this.errors).length > 0
    }
 }
