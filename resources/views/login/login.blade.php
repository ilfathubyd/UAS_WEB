<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('login.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Halaman Login</title>
</head>
<body>
    <div class="log px-3 py-3">
        <h2 class="text-center">LOGIN</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
              </ul>
            </div>
        @endif
        <form action="/fungsiLogin" method="POST">
            @csrf
            <div class="field mb-4">
              <input type="email" name="email" required autocomplete="off" value="{{old('email')}}">
              <span></span>
              <label for="Email" class="form-label">Email</label>
            </div>
            <div class="field mb-4">
            <input type="password" name="password" id="password" required>
            <span></span>
            <label for="Password" class="form-label">Password</label>
            <div id="toggle" onclick="showHide();"></div> 
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" class="btn btn-primary rounded-5">Login</button>
            </div>
            <span class="account">Belum punya akun? </span><a href="/register">Register</a>
        </form>
    </div>

    <script>
      let password = document.getElementById('password');
      let togglePassword = document.getElementById('toggle');

      function showHide(){
          if(password.type === 'password'){
          password.setAttribute('type', 'text');
          togglePassword.classList.add('hide');
          }else{
          password.setAttribute('type', 'password');
          togglePassword.classList.remove('hide');
          }
      }
  </script>
  
</body>
</html>