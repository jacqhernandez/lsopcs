<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <div id="wrapper">

            @include('includes.header')

        <div id="main" class="row">
    		 <div id="page-wrapper">
    		 <br>
                @yield('content')
    		</div>

        </div>
    	
        <footer class="row">
            
        </footer>

    </div>


<!-- jQuery -->
<script src="{{ URL::asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ URL::asset('/bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js')}}"></script>

<script src="{{ URL::asset('/js/sorttable.js') }}"></script>

</body>
</html>