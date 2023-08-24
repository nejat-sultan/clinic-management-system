<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <title>Clinic Management System</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
            @guest
            <main class="py-4">
            <div class="container">
                            <div class="row justify-content-center">
                            <div class="col-md-6">
                            <div class="card" >
                                        <h2><div class="card-header">{{ __('Feker Medium Clinic Login') }}</div></h2>
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf

                                                <div class="row mb-3">
                                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6 offset-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                            <label class="form-check-label" for="remember">
                                                                {{ __('Remember Me') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-0">
                                                    <div class="col-md-8 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Login') }}
                                                        </button>

                                                     
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        @else
        
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: #eee">
            <div class="container">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                            <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
			
                    </ul>
            </div>
        </nav>
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <h2>Logo</h2>
        </div>
        <ul class="sidebar-nav" tabindex="1">
            <!-- <li class=" active"> <a href="#"><i class="fa fa-home"> </i>Home</a></li>  -->
            <li class="active"> <a href="{{ url('/dashboard') }}"><i class="fa fa-tachometer"></i>Dashboard</a> </li>
            <li> <a href="{{ url('/employee') }}"><i class="fa fa-users"></i>Employees</a> </li>
            <li> <a href="{{ url('/patient') }}"><i class="fa fa-bed"></i>Patients</a> </li> 
            <li> <a href="{{ url('/appointment') }}"><i class="fa fa-calendar-check-o"></i>Appointments</a> </li>
            <li> <a href="{{ url('/labhistory') }}"><i class="fa fa-stethoscope"></i>Ordered Labs</a> </li>
            <li> <a href="{{ url('/doctorappointment') }}"><i class="fa fa-calendar-check-o"></i>Doctor Appointments</a> </li>
            <li> 
                <a class="dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-info"></i>Other Info
                </a> 
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ url('/lab') }}">Manage Lab</a>
                    <a class="dropdown-item" href="{{ url('/region') }}">Manage Region</a>
                    <a class="dropdown-item" href="{{ url('/employeetype') }}">Manage Employee Type</a>
                </div>
            </li>
            <li> <a href="{{ url('/chpwd') }}"><i class="fa fa-lock"></i>Change Password</a> </li> 
        </ul>
    </aside>



  <div id="wrapper">
     <section id="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                @if(session()->exists('message'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{session('message')}}</li>
                        </ul>
                    </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </section>


     @endguest

    <script>
        const $button  = document.querySelector('#sidebar-toggle');
        const $wrapper = document.querySelector('#wrapper');

        $button.addEventListener('click', (e) => {
        e.preventDefault();
        $wrapper.classList.toggle('toggled');
        });


        // const links =document.querySelectorAll(".link ");
        // links.forEach(btn => btn.addEventListener("click",(e)=>{
        //     e.preventDefault();
        //     document.querySelector(".link.active").classList.remove("active");
        //     btn.classList.add("active")
        // }));

    </script>


</body>
</html>