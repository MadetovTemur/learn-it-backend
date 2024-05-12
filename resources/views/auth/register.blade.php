<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>REGISTER</title>
  <!-- loader-->
  <link href=" {{ asset('/assets/css/pace.min.css') }}" rel="stylesheet"/>
  <script src="{{ asset('/assets/js/pace.min.js') }}"></script>
  <!--favicon-->
  <link rel="icon" href="{{ asset('/assets/images/favicon.ico') }}" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ asset('/assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('/assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="{{ asset('/assets/css/app-style.css') }}" rel="stylesheet"/> 
</head>

<body class="bg-theme bg-theme1">
<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->
<!-- Start wrapper-->
 <div id="wrapper">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
    <div class="card card-authentication1 mx-auto my-5">
        <div class="card-body">
         <div class="card-content p-2">
            <div class="text-center">
                <img src="{{ asset('assets/images/logo-icon.png') }}" alt="logo icon">
            </div>
          <div class="card-title text-uppercase text-center py-3">Sign In</div>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-group">
                <label for="exampleInputUsername" class="sr-only">Name</label>
               <div class="position-relative has-icon-right">
                  <input type="text" id="exampleInputUsername" name="name" value="{{ old('name') }}" required autofocus autocomplete="username"  class="form-control input-shadow" placeholder="Enter Name">
                  <div class="form-control-position">
                      <i class="icon-user"></i>
                  </div>
               </div>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername" class="sr-only">Email</label>
               <div class="position-relative has-icon-right">
                  <input type="email" id="exampleInputUsername" name="email" :value="old('email')" required autofocus autocomplete="username"  class="form-control input-shadow" placeholder="Enter email">
                  <div class="form-control-position">
                      <i class="icon-user"></i>
                  </div>
               </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword" class="sr-only">Password</label>
               <div class="position-relative has-icon-right">
                  <input type="password" id="exampleInputPassword"
                            name="password"
                            required autocomplete="current-password" class="form-control input-shadow" placeholder="Enter Password">
                  <div class="form-control-position">
                      <i class="icon-lock"></i>
                  </div>
               </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword" class="sr-only">Confirm Password</label>
               <div class="position-relative has-icon-right">
                  <input type="password" id="exampleInputPassword"
                            name="password_confirmation"
                            required autocomplete="current-password" class="form-control input-shadow" placeholder="Enter Password">
                  <div class="form-control-position">
                      <i class="icon-lock"></i>
                  </div>
               </div>
              </div>
             <button type="submit" class="btn btn-light btn-block">Sign In</button>            
             </form>
           </div>
          </div>
          <div class="card-footer text-center py-3">
            <p class="text-warning mb-0">Do not have an account? <a href="{{ route('login') }}"> Sign Up here</a></p>
          </div>
         </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
    
    </div><!--wrapper-->
    
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('/assets/js/popper.min.js') }} "></script>
  <script src="{{ asset('/assets/js/bootstrap.min.js') }} "></script>
    
  <!-- sidebar-menu js -->
  <script src="{{ asset('/assets/js/sidebar-menu.js') }} "></script>
  
  <!-- Custom scripts -->
  <script src="{{ asset('/assets/js/app-script.js') }} "></script>
  
</body>
</html>
    


    {{-- <form >
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!--  -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}
