@extends('site-layout.login_layout')
@section('title','TMS - login')

@section('content') 
<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our User</p>
								<!-- Form -->
								<form action="/login" method="POST">
									@csrf
									<div class="form-group">
										<input class="form-control"  value="{{old('phone')}}" type="text" name="phone" placeholder="Enter Phone Number" minlength="10" size="10" required>
										@error('phone')<p style="color:red">{{$message}}</p>@enderror
									</div>
									<div class="form-group">
										<input class="form-control"  value="{{old('password')}}" type="password" name="password" placeholder="Password" minlength="8" maxlength="10" required>
										@error('password')<p style="color:red">{{$message}}</p>@enderror									 	 								
									</div>
					 
									<div class="form-group">
										<button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								@if(Session::has('error'))
								<div class="login-or"> 
									<p style="color:red">{{Session::get('error')}} </p>
								</div>
								@endif 

								<div class="text-center forgotpass"><a href="{{url('forgotpassword')}}">Forgot Password?</a></div>
								<!-- Social Login -->
								<!-- <div class="social-login">
									<span>Login with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div> -->
								<!-- /Social Login -->
								
								<!-- <div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div> -->
							</div>			
@endsection



