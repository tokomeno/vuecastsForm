var app = new Vue({
      el: '#one',
      data:{ 
            form: new Form({
                  name: '',
                  desc: ''
            })
      },
      methods:{ 
            onSubmit(){
                  this.form.submit('post', 'post')
                              // or i can send manulluy req dont forger 
                                    // in success reset() form 
                                          // on fail assign response  error.response.data.errors to form errors
                  // axios.post('post', this.form)
                  // .then( res => {
                  //       this.onSuccess()
                  // })
                  // .catch( error => {
                  //       this.form.errors.record(error.response.data.errors)
                  // });
                   
            }
      }
})
 
      

   