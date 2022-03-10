@extends('site-layout.layout')
@section('title','Krishna Creation')
@section('extra-css')
@endsection

@section('content')
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title"></h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="/master_dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">CreateUser</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
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
            {{-- <div class="card-header">
                <h4 class="card-title">Create New User</h4>
            </div> --}}
            <div class="card-body">
                <form action="/createNewUser" method="POST">
                    @csrf
                    <h4 class="card-title">Personal Information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>UserName</label>
                                <input type="text" name="username" class="form-control" size="50" value="{{old('username')}}" required>
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" name="phone" maxlength="10" size="10" value="{{old('phone')}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role" required>
                                    <option value="" checked>Select User Role</option>
                                    @foreach($roles as $item)
                                        <option value="{{$item->role_id}}">{{$item->role}}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hand Work Categorie</label>
                                <select class="form-control" name="hwc">
                                    <option value="" checked>Hand Work Categorie</option>
                                    @foreach ($hwc as $item)
                                        <option value="{{$item->handwork_id}}">{{$item->handwork_type}}</option>
                                    @endforeach
                                </select>
                            </div>  
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" minlength="8" maxlength="10"  class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Repeat Password</label>
                                <input type="password" name="repassword" minlength="8" maxlength="10" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')
@endsection