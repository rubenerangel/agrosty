<!doctype html>
<html>
  <head>
      @include('includes.head')
  </head>
  <body>
    @include('includes.header')
    
    <div class="container-fluid">
      <div class="row">
        @include('includes.sidebar')

        @yield('content') 
      </div>        
      
    <footer class="row">
        @include('includes.footer')
    </footer>
    </div>
    <!-- JavaScript -->
    <script href="{{ asset('js/app.js') }}" defer></script>
  </body>
</html>