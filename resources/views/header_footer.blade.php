<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/resources/css/app.css" /> 
    <script src = "/resources/js/app.js" type = "text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"rel="stylesheet"/>
    <title> @yield('title')</title>
</head>

<body>
<div>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">ZoRentMe</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
              </button>
        
              <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Search</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Location</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                  </li> --}}
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">User</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown04">
                      <li><a class="dropdown-item" href="login">Login</a></li>
                      <li><a class="dropdown-item" href="Register">Register</a></li>
                      <li><a class="dropdown-item" href="vendor">Become a Vendor</a></li>
                      <li><a class="dropdown-item" href="logout">Logout</a></li>
                    </ul>
                  </li>
                </ul>
                {{-- <form>
                  <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form> --}}
              </div>
            </div>
          </nav>
        <!-- Navbar -->
      
        <!--Section: Design Block-->
        {{-- <section>
          <!-- Intro -->
          <div id="intro" class="bg-image vh-100" style="
                background-image: url('https://mdbootstrap.com/img/Photos/new-templates/psychologist/img1.jpg');
              ">
            <div class="mask" style="background-color: rgba(250, 182, 162, 0.15);"></div>
          </div>
          <!-- Intro -->
        </section> --}}
        <!--Section: Design Block-->
    </header>
@yield('main')

<footer>
    <footer class="text-center text-white fixed-bottom" style="background-color: #21081a;">
        <!-- Grid container -->
        <div class="container p-0"></div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2023 Copyright:
          <a class="text-white" href="/about">ZoRentMe.in</a>
        </div>
        <!-- Copyright -->
      </footer>
</footer>
</div>
</body>