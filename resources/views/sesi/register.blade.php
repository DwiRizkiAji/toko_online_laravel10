@extends('layout/aplikasi')

@section('konten')

<body>
  
  <div class="w-50 center border rounded px-3 py-3 mx-auto">
    <form action="/sesi/create" method="post">
      @csrf 
      <h1 class="h3 mb-3 fw-normal">Register</h1>
    
      <div class="form-floating mb-3">
        <input type="name" class="form-control" name="name" id="name" placeholder="masukan name" value="{{ Session::get('name') }}">
        <label for="name">Name: </label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" id="email" placeholder="masukan email" value="{{ Session::get('email') }}">
        <label for="email">Email</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <label for="password">Password</label>
      </div>
    
      {{-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> --}}
      <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
  </div>

@endsection