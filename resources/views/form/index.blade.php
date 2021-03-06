<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="/form" class="nav-link">Vue Form</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

<div id="one">

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
                  @keydown="form.errors.clear($event.target.name)">

                    <div class="form-group">   
                          <input type="text" v-model="form.name" name="name" class="form-control" />

                          <span class="text-danger" 
                          v-if="form.errors.has('name')" 
                          v-text="form.errors.get('name')"></span>
                    </div>

                    <div class="form-group"> 
                          <input type="text" v-model="form.desc" name="desc" class="form-control" />

                          <span class="text-danger"
                          v-if="form.errors.has('desc')"  
                          v-text="form.errors.get('desc')"></span>
                      </div> 


                      <div class="form-group">
                        <button class="btn btn-primary pull-right" type="submit" :disabled="form.errors.any()" >გაგზავნა</button>
                      </div>    
                </form>
            </div>
    </div>
</div>
</div>


       </main>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.js"></script> 

<script src='{{asset('js/errors.js')}}'></script>
<script src='{{asset('js/form.js')}}'></script>
<script src='{{asset('js/vue.js')}}'></script>
</body>
</html>

