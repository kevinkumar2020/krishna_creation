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
									<li class="breadcrumb-item active">Party Edit</li>
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
            {{-- <div class="card-header">
                <h4 class="card-title">Create New User</h4>
            </div> --}}
            <div class="card-body">
                <form action="/party-update" method="POST">
                    @csrf
                    <h4 class="card-title">Party Information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Party Name</label>
                                <input type="hidden" name="party_id" class="form-control" size="50" value="{{$data->party_id}}" required>
                                <input type="text" name="name" class="form-control" size="50" value="{{$data->party_name}}" required>
                            </div>
                            <div class="form-group">
                                <label>Party Address</label>
                                <input type="text" name="address"  value="{{$data->party_address}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Party GST</label>
                                <input type="text" name="gst" maxlength="15" size="15" value="{{$data->party_gst}}" class="form-control" required>
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