@extends('site-layout.login_layout')
@section('title','KC - SignUp')

@section('content') 
							<div class="login-right-wrap">
								<h1>SignUp</h1>
								<p class="account-subtitle">Create New Account</p>
								<!-- Form -->
								<form action="/signup" method="POST" >
								@csrf
									<div class="form-group"> 
										<input class="form-control" type="text" name="username" placeholder="Username" value="{{old('username')}}">
										@error('username')<p style="color:red">{{$message}}</p>@enderror
									</div> 
									<div class="form-group">
										<select class="form-control" name="role"> 
											<option value="" checked>Select Role</option>
											@foreach ($roles as $item)
												<option value="{{$item->role_id}}">{{$item->role_type}}</option>
											@endforeach
										</select>
										@error('role')<p style="color:red">{{$message}}</p>@enderror
                                    </div>
                                    <div class="form-group">
										<input class="form-control" type="text" name="phone" placeholder="Contact number" value="{{old('phone')}}">
										@error('phone')<p style="color:red">{{$message}}</p>@enderror
									</div>
									<div class="form-group">
										<select class="form-control" name="categorie"> 
											<option value="" checked>Hand Work Categories</option>
											@foreach($hand_work as $item)
											<option value="{{$item->handwork_id}}">{{$item->handwork_type}}</option>
											@endforeach
											<option value=""></option>
										</select>
										@error('categorie')<p style="color:red">{{$message}}</p>@enderror
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="password" placeholder="Password">
										@error('password')<p style="color:red">{{$message}}</p>@enderror
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="cpassword" placeholder="Confirm Password">
										@error('cpassword')<p style="color:red">{{$message}}</p>@enderror
									</div>
									
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" name="register" type="submit">Register</button>
									</div>
								</form>
								<!-- /Form -->
								@if(Session::get('Succsess'))
								<div class="text-center dont-have">
									<p style="color:green">New Registration is Done..!</p>
								</div>
								@endif
								@if(Session::get('error'))
								<div class="text-center dont-have">
									<!-- <span class="or-line" "login-or"></span> -->
									<p style="color:red">Not File Proper Detail..!</p>
								</div>
								@endif
								@if(Session::has('perror'))
								<div class="text-center dont-have">
									<!-- <span class="or-line"></span> -->
									<p style="color:red">{{session::get('perror')}}</p>
								</div>
								@endif
								@if(Session::has('aerror'))
								<div class="text-center dont-have">
									<!-- <span class="or-line"></span> -->
									<p style="color:red">{{session::get('aerror')}}</p>
								</div>
								@endif
								
								{{-- <div class="text-center dont-have"><a href="{{url('index')}}">go to Home page</a></div> --}}
							</div>
@endsection
