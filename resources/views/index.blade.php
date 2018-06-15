@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
             <div class="card mb-4">
            <div class="card-body">
                @foreach($posts as $p)
                    <ul>
                        <li>{{$p->name}}</li>
                        <li>{{$p->desc}}</li>
                    </ul>
                    <hr>
                @endforeach
            </div>
        </div>
        </div>
       
            <div id='one' class='col-md-12'>
                <form 
                  id='contact-form' 
                  @submit.prevent="onSubmit" 
                  @keydown="errors.clear($event.target.name)">

                    <div class="form-group">   
                          <input type="text" v-model="form.name" name="name" class="form-control" />

                          <span class="text-danger" 
                          v-if="errors.has('name')" 
                          v-text="errors.get('name')"></span>
                    </div>

                    <div class="form-group"> 
                          <input type="text" v-model="form.desc" name="desc" class="form-control" />

                          <span class="text-danger"
                          v-if="errors.has('desc')"  
                          v-text="errors.get('desc')"></span>
                      </div> 


                      <div class="form-group">
                        <button class="btn btn-primary pull-right" type="submit" :disabled="errors.any()" >გაგზავნა</button>
                      </div>    
                </form>
            </div>
    </div>
</div>
@endsection
