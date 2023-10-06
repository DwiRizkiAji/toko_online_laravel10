@if ($errors->any())
    <div class="alert alert-danger w-auto">
      <ul>
      @foreach ($errors->all() as $eror)
         <li>{{ $eror }}</li> 
      @endforeach
    </ul>
    </div>
@endif

@if (Session::get('success'))
    <div class="alert alert-success w-auto">{{ Session::get('success') }}</div>
@endif