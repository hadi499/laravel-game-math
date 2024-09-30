<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <title>{{ $title ?? 'Dashboard Admin' }}</title>

</head>

<body>

  @include('partials.admin-navbar')


  <div class="mt-5">

    @yield('content')

  </div>


</body>

</html>