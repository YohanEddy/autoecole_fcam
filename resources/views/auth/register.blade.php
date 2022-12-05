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
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">
	
	


</head>
<body>

<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
                        <x-guest-layout>
                            <x-auth-card>
                                <x-slot name="logo">
                                    <a href="/">
                                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                                    </a>
                                </x-slot>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div  class="card-body">
                                    <h4 class="mb-3 f-w-400">Register</h4>
                                    </div>
                                    <!-- Name -->
                                    <div>
                                        <x-input-label class="floating-label" for="name" :value="__('Name')" />

                                        <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />

                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <x-input-label class="floating-label" for="email" :value="__('Email')" />

                                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />

                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-input-label class="floating-label" for="password" :value="__('Password')" />

                                        <x-text-input id="password" class="form-control"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <x-input-label class="floating-label" for="password_confirmation" :value="__('Confirm Password')" />

                                        <x-text-input id="password_confirmation" class="form-control"
                                                        type="password"
                                                        name="password_confirmation" required />

                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                            {{ __('Already registered?') }}
                                        </a>

                                        <x-primary-button class="btn btn-block btn-primary mb-4">
                                            {{ __('Register') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </x-auth-card>
                        </x-guest-layout>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/ripple.js"></script>
<script src="assets/js/pcoded.min.js"></script>



</body>

</html>