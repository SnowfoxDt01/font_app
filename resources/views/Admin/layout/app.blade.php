<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<title>@yield('title')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('../css/styles.css') }}">
</head>
<body>
<!-- header -->
    @include('Admin/layout/header')
<!-- end header -->
<div class="container">
  {{-- navbar --}}
    @include('Admin/layout/navbar')
  {{-- end navbar --}}

  <main class="main">  
    @yield('content')

  </main>
</div>

<script src="{{ asset('../js/script.js') }}"></script>
</body>
</html>
