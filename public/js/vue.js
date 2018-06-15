

var app = new Vue({
      el: '#one',
      data:{ 
            form: {}, 
            errors: new Errors()
      },
      methods:{ 
            onSubmit(){
                  axios.post('post', this.form)
                  .then( res => {
                        alert("cool")
                  })
                  .catch( error => 
                        this.errors.record(error.response.data.errors)
                  )
                   console.log(this.form); 
            },

            onSuccess(res){



            }
      }
})
 
      

   