<!DOCTYPE html>
<html>
<head>
    <title>Refinery Users</title>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>
<body>
  
<div class="container">
    @yield('content')
    <a class="btn btn-primary" href="{{ url('/') }}">RETURN HOME</a>
</div>
   
</body>
</html>