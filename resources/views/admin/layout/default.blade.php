<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    @stack('style')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            
            <!-- start sidebar -->
            @include('admin.layout.sidebar')
            <!-- end sidebar -->

            <!--  -->
            <div class="col-9 offset-3 p-0 position-relative">
                <!-- start haeder -->
                @include('admin.layout.header')
                <!--  end header-->

                <!-- start namin -->
                @yield('content')
                <!-- end main -->

                <!-- start footer -->
                   @include('admin.layout.footer')
                <!-- end footer -->

            </div>
         

        </div>
    </div>


    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    @stack('script')
</body>

</html>