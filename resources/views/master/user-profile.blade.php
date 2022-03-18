@extends('site-layout.layout')

@section('title','Krishna Creation')

@section('extra-css')
@endsection

@section('content')
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="/master_dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0">{{$profileData->name}}</h4>
										<h6 class="text-muted">{{$profileData->role_id}}</h6>
										<!-- <div class="user-Location"><i class="fa fa-map-marker"></i> Florida, United States</div>
										<div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div> -->
									</div>
									<!-- <div class="col-auto profile-btn">
										<a href="#" class="btn btn-primary">
											Message
										</a>
										<a href="#" class="btn btn-primary">
											Edit
										</a>
									</div> -->
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>
									{{-- <li class="nav-item ml-auto">
									<a class="btn btn btn-info float-right" href="" class="btn btn-primary" role='button'>Compay Details</a>
									</li> --}}
									</ul>

									
								
								
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-9">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-9">{{$profileData->name}}</p>
													</div>
								
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Phone Number </p>
														<p class="col-sm-9">{{$profileData->phone}}</p>
													</div>

													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Role</p>
														<p class="col-sm-9">{{$profileData->role_id}}</p>
													</div>
													
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Hand Work</p>
														<p class="col-sm-9">{{$profileData->handwork_id}}</p>
													</div>
													
												</div>
											</div>
											
											<!-- Edit Details Modal -->
												{{-- <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
													<div class="modal-dialog modal-dialog-centered" role="document" >
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Personal Details</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">

																<form action="" method="post" enctype="multipart/form-data">
																@csrf
																	<div class="row form-row">
																		<div class="col-12 col-sm-6">
																			<div class="form-group">
																				<label>Username</label>
																				<input type="text" name="username" class="form-control" readonly value="">
																				@error('username')<p class="text-danger"> {{$message}}</p>@enderror
																			</div>
																		</div>
																		<div class="col-12 col-sm-6">
																			<div class="form-group">
																				<label>Phone Number</label>
																				<input type="text" name="phone" class="form-control" value="">
																				@error('phone')<p class="text-danger"> {{$message}}</p>@enderror
																			</div>
																		</div>
																		<div class="col-12 col-sm-6">
																			<div class="form-group">
																				<label>Email ID</label>
																				<input type="email" name="email" class="form-control" value="">
																				@error('email')<p class="text-danger"> {{$message}}</p>@enderror
																			</div>
																		</div>
																		<div class="col-12 col-sm-6">
																			<div class="form-group">
																				<label>Image</label> 
																				<input type="file" name="image" value="" class="form-control">
																				<!-- @error('password')<p style="color:red">{{$message}}</p>@enderror -->
																				@error('image')<p class="text-danger"> {{$message}}</p>@enderror
																			</div>
																		</div>
																		
																	</div>
																	<button type="submit" class="btn btn-primary btn-block">Save</button>
																</form>
															</div>
													
														</div>
												
													

													</div>
													
												
												
												</div> --}}
											<!-- /Edit Details Modal -->
											
										</div>

										<div class="col-lg-3">
											
											
											<!-- Skills -->
											<!-- <div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Skills </span> 
														<a class="edit-link" href="#"><i class="fa fa-edit mr-1"></i> Edit</a>
													</h5>
													<div class="skill-tags">
														<span>Html5</span>
														<span>CSS3</span>
														<span>WordPress</span>
														<span>Javascript</span>
														<span>Android</span>
														<span>iOS</span>
														<span>Angular</span>
														<span>PHP</span>
													</div>
												</div>
											</div> -->
											<!-- /Skills -->

										</div>
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card"> 
										@if(session()->has('error')) 
										<div class="alert alert-warning ">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											{{session()->get('error')}}
										</div>									
										@endif
										@if(session()->has('msg'))
										<div class="alert alert-success ">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											{{session()->get('msg')}}
										</div>									
										@endif 
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form method="post" action="user-password-update">
													@csrf
													<div class="form-group">
														<label>Old Password</label>
														<input type="password" name="opassword" class="form-control" minlength="8" maxlength="10" required>
														@error('password')<p style="color: red">{{$message}}</p>@enderror
													</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" name="password" class="form-control" minlength="8" maxlength="10" required>
															@error('password')<p style="color: red">{{$message}}</p>@enderror
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password"  name="cpassword" class="form-control" minlength="8" maxlength="10" required>
															@error('cpassword')<p style="color: red">{{$message}}</p>@enderror
														</div>
														<button class="btn btn-primary" type="submit">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
@endsection

@section('extra-script')
@endsection