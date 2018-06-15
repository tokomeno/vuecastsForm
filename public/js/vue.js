var app = new Vue({
      el: '#one',
      data:{ 
            form: new Form({
                  name: '',
                  desc: ''
            }), 
            // errors: new Errors()
      },
      methods:{ 
            onSubmit(){
                  axios.post('post', this.form)
                  .then( res => {
                        this.onSuccess
                  })
                  .catch( error => {
                       console.log(error);
                        // this.form.errors.record(error.response.data.errors)
                  });
                   console.log(this.form); 
                   
            },
            onSuccess(res){
                  this.form.reset();
            }
      }
})
 
      

   