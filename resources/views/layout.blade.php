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
    
  </body>
</html>