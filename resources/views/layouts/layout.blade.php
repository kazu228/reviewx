<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ config('app.name') }}</title>
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('img/logo/favicon.ico') }}">
        {{-- <link rel="icon" type="image/x-icon" href="asset/favicon.ico" /> --}}
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

         <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    {{-- <link rel="shortcut icon" href="{{ asset('img/logo/favicon.ico') }}"> --}}

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    </head>


    @if (session('message'))
      <div class="alert success-primary mb0_pc">
          {{ session('message') }}
      </div>
    @endif

    <!--/ ヘッダー -->
    @yield('content')

    <!-- フッター -->
    <footer class="footer text-center">
      <div class="container px-4 px-lg-5">
          <ul class="list-inline mb-5">
              <li class="list-inline-item">
                  <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                  <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                  <a class="social-link rounded-circle text-white" href="#!"><i class="icon-social-github"></i></a>
              </li>
          </ul>
          <p class="text-muted small mb-0">Copyright &copy; やまちゃーん 2023</p>
      </div>
  </footer>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>