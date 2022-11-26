<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Absensi | {{ $title }}</title>
  @vite('resources/css/app.css')
  @yield('head')
</head>

<body>
  @if (session('alert-content'))
    <script>
      alert('{{ session('alert-content') }}');
    </script>
  @endif
  @yield('body')
</body>

</html>
