@extends('header_footer')
@section('title','Zorentme_Register')
@section('main')

<br><br><br>
<div div class="mx-auto" style="width: px;">

<!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
  <li class="nav-item "  role="presentation">
    <a class="nav-link " style="background-color:rgb(255, 255, 255);" id="tab-login" data-mdb-toggle="pill" href="/Register" role="tab"
      aria-controls="pills-login" aria-selected="true"><h1 style="font-family: fantasy; color:rgb(163, 61, 211);">Registrer</h1></a>
  </li>
  
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content ">
  <div  class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">



    @if($errors->any())
      @foreach($errors->all() as $error)
      <p style="color:red">{{ $error }}></p>
      @endforeach
    @endif
      <form action="{{route('userRegister')}}" method="POST">
      @csrf

      <div class="container mt-5">
        <div class="row">
          <div class="col-md-5 d-flex align-items-center">
            <h1>Sliding labels for Bootstrap forms</h1>
          </div>
          <div class="col-md-6 offset-md-1">
            <form class="mt-4 mt-md-0">
              <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text"/>
              </div>
              <div class="form-group">
                <label for="surname">Surname</label>
                <input class="form-control" type="text"/>
              </div>
              <div class="form-group">
                <label for="email">E-mail</label>
                <input class="form-control" type="email"/>
              </div>
            </form>
          </div>
        </div>
      </div>
      </form>
      <!-- Register buttons -->
      <div class="text-center">
        <p><a href="/login">Back</a></p>
        @if(Session::has('success'))
      <p style="color:green">{{Session::get('success') }}</p>
      <h5>You can <a href="/login">Login here</a></h5>
      @endif
      </div>
    
      
  </div>
</div>


@endsection