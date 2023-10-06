@extends('layout/aplikasi')

@section('konten')

<body>
  
<main class="form-signin w-100 m-auto">
  <div class="w-50 center border rounded px-3 py-3 mx-auto">
    <form action="/sesi/login" method="post">
      @csrf
      <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    
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
      <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      <p>Belum Punya Akun? <a href="/sesi/register">Buat Akun</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
    </main>
  </div>

@endsection