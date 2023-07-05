<!DOCTYPE html>
<html lang="en">

<head>

	<title>FCAM</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="{{URL::asset('assets/images/favicon.ico')}}" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	
	


</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="row align-items-center text-center">
                    <div class="col-md-12">
                        <div class="card-body">
                        <h4 class="mb-3 f-w-400">FCAM</h4>
                            <div class="row align-items-center text-center"> 
                                <div class="col-md-7">  
                                    <div class="flex items-center justify-end mt-4">
                                        <form>
                                        
                                            <a href="{{ route('login') }}">
                                            <button type="button" class="btn  btn-primary btn-sm"> Log in </button>
                                            </a>
                                        
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="flex items-center justify-end mt-3">
                                        <form>
                                        
                                            <a href="{{ route('register') }}">
                                            <button type="button" class="btn  btn-primary btn-sm">Register</button>
                                            </a>
                                        
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/ripple.js')}}"></script>
<script src="{{asset('assets/js/pcoded.min.js')}}"></script>



</body>

</html>
