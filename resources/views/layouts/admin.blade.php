<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    @stack('head_scripts')

    <title>Sidebar template</title>

</head>

<body>
<div class="page-wrapper toggled boder-radius-on default-theme">

    @include('layouts.partials.nav-admin')

    <main id="page-content" class="page-content">
        <div id="overlay" class="overlay"></div>
        <header class="grid-item main-header">
          <i id="pin-sidebar" class="fas fa-angle-left"></i>

        </header>
        <article class="grid-item main-content">
            @yield('content')
        </article>
        <aside class="grid-item main-sidebar">Sidebar</aside>
        <footer class="grid-item main-footer">Footer</footer>
    </main>
</div>

    <script src="{{ asset('js/admin.js') }}"></script>
@stack('view_scripts')
</body>

</html>
