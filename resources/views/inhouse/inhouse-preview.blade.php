@extends('site-layout.layout')
@section('title','Krishna Creation')
@section('extra-css')
@endsection

@section('content')
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">

								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="/master_dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">View InHouse</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Challan Information<a class="fa fa-list float-right"  href="/jobcard-display" roal="button"></a></h4>

								</div>
								<div class="card-body">
									<div class="row">                                   
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Challan Name</label>													
													<p class="col-sm-9 col-form-label">{{$data->challan_name}}</p>													
												</div>
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Jobcard Number</label>													
													<p class="col-sm-9 col-form-label">{{$data->jobcard_number}}</p>													
												</div>
                                                <div class="form-group row">
													<label class="col-sm-3 col-form-label">Design Number</label>													
													<p class="col-sm-9 col-form-label">{{$data->design_number}}</p>													
												</div>
                                                <div class="form-group row">
													<label class="col-sm-3 col-form-label">Production Type</label>													
													<p class="col-sm-9 col-form-label">{{$data->production_type}}</p>													
												</div> 
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Jobwork Type</label>													
													<p class="col-sm-9 col-form-label">@foreach(explode(',',$data->jobwork_type) as $jw) {{$jw}}, @endforeach</p>													
												</div> 
												 <div class="form-group row">
													<label class="col-sm-3 col-form-label">Total Pieces</label>													
													<p class="col-sm-9 col-form-label">{{$data->total_pieces}}</p>													
												</div>
                                                <div class="form-group row">
													<label class="col-sm-3 col-form-label">Job Status</label>													
													<p class="col-sm-9 col-form-label">@if($data->job_status == 0) Not Stared @elseif($data->job_status == 1) Complete @elseif($data->job_status == 2) Pending @endif</p>													
												</div>
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Job Created</label>													
													<p class="col-sm-9 col-form-label">{{$data->created_at}}</p>													
												</div>
                                                <div class="form-group row">
													<label class="col-sm-3 col-form-label">Design Image</label>	
													@foreach(explode(',',$data->design_image) as $image)
													<img src="../DesignImages/{{$image}}" height="100" />
													@endforeach																									
												</div>
                                                
                                               
                                                
			
    
								</div>
							</div>
						</div>
					</div>
 @endsection

@section('extra-script')

@endsection	