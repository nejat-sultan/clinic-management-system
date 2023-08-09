<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <title>Clinic Management System</title>

</head>
<body>

    <div id="wrapper">

    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <h2>Logo</h2>
        </div>
        <ul class="sidebar-nav">
            <li class="active"> <a href="#"><i class="fa fa-home"> </i>Home</a></li>
            <li> <a href="{{ url('/employee') }}"><i class="fa fa-users"></i>Employees</a> </li>
            <li> <a href="{{ url('/') }}"><i class="fa fa-bed"></i>Patients</a> </li> 
            <li> <a href="{{ url('/') }}"><i class="fa fa-calendar-check-o"></i>Appointments</a> </li>
            <li> <a href="{{ url('/') }}"><i class="fa fa-lock"></i>Change Password</a> </li> 
        </ul>
    </aside>

    <div id="navbar-wrapper">
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        </nav>
    </div>

    <section id="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                @yield('content')
            </div>
        </div>
    </section>

    </div>

    <script>
        const $button  = document.querySelector('#sidebar-toggle');
        const $wrapper = document.querySelector('#wrapper');

        $button.addEventListener('click', (e) => {
        e.preventDefault();
        $wrapper.classList.toggle('toggled');
        });

    </script>
</body>
</html>