<!doctype html>
<html>
<head>
   @include('components.head')
</head>
<body>
<div class="container-fluid ">
   <div >
       @include('components.header')
   </div>
   <div id="main" > 
           @yield('content')
   </div>
</div>
 
       
</body>
</html>