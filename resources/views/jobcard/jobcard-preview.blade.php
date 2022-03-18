@extends('site-layout.layout')
@section('title','Krishna Creation')
@section('extra-css')
@endsection

@section('content')

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">JobCard Preview</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="/master_dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">JobCard Preview</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Design Image</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped mb-0">
												<tr>
													@foreach(explode(',',$data->design_image) as $image)
													<td><a href="../DesignImages/{{$image}}" > <img src="../DesignImages/{{$image}}" height="150" /></a></td>
													@endforeach	
												</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Jobcard Details</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped mb-0">
												<tr>
													<td>Jobcard Number</td><td>{{$data->jobcard_number}}</td>
												</tr>
												<tr>
													<td>Design Number</td><td>{{$data->design_number}}</td>
												</tr>
												<tr>
													<td>Production Type</td><td>{{$data->production_type}}</td>
												</tr>
												<tr>
													<td>JobWork Type</td><td>{{$data->jobwork_type}}</td>
												</tr>
												<tr>
													<td>Total Piece</td><td>{{$data->total_pieces}}</td>
												</tr>	
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Challan Details</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped mb-0">
												<tr>
													<td>Challan Number</td><td>{{$data->jobcard_number}}</td>
												</tr>
												<tr>
													<td>Challan Name</td><td>{{$data->challan_name}}</td>
												</tr>
												<tr>
													<td>Challan Date</td><td>{{$data->challan_date}}</td>
												</tr>
												<tr>
													<td>Challan Image</td><td><a href="/ChallanImage/{{$data->challan_image}}"><img src="/ChallanImage/{{$data->challan_image}}" height="150" /></a> </td>
												</tr>	
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Party Details</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped mb-0">
												<tr>
													<td>Party Name</td><td>{{$partyData->party_name}}</td>
												</tr>
												<tr>
													<td>Party address</td><td>{{$partyData->party_address}}</td>
												</tr>
												<tr>
													<td>Party GST</td><td>{{$partyData->party_gst}}</td>
												</tr>	
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Inhouse Production</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped mb-0">
												<tr>
													<td>Estimated Time</td><td>{{$inhouseData->estimated_time ?? ''}}</td>
												</tr>
												<tr> 
													<td>Status</td>
													<td>
														@if($data->inhouse_status == 0)<span class="badge badge-pill bg-danger inv-badge">Not Running</span>
														@elseif($data->inhouse_status == 1)<span class="badge badge-pill bg-success inv-badge">Completed</span>
														@else <span class="badge badge-pill bg-warning inv-badge">Pending</span>
														@endif
													</td>
												</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">OutHouse Details</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped mb-0">
												<tr>
													<td>Estimated Time</td><td>{{$outhouseData->estimated_time ?? ''}}</td>
												</tr>
												<tr> 
													<td>Status</td>
													<td>
														@if($data->outhouse_status == 0)<span class="badge badge-pill bg-danger inv-badge">Not Running</span>
														@elseif($data->outhouse_status == 1)<span class="badge badge-pill bg-success inv-badge">Completed</span>
														@else <span class="badge badge-pill bg-warning inv-badge">Pending</span>
														@endif
													</td>
												</tr>	
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">ThreadCutting</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped mb-0">
												<tr>
													<td>Estimated Time</td><td>{{$threadcuttingData->estimated_time ?? ''}}</td>
												</tr>
												<tr> 
													<td>Status</td>
													<td>
														@if($data->inhouse_status == 0)<span class="badge badge-pill bg-danger inv-badge">Not Running</span>
														@elseif($data->inhouse_status == 1)<span class="badge badge-pill bg-success inv-badge">Completed</span>
														@else <span class="badge badge-pill bg-warning inv-badge">Pending</span>
														@endif
													</td>
												</tr>
												<tr>
													<td>Image</td>
													<td><a href="/Threadcutting/{{$threadcuttingData->threadcutting_image ?? ''}}"><img src="/Threadcutting/{{$threadcuttingData->threadcutting_image  ?? ''}}" height="150" alt=""></a></td>
												</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Stitching Details</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped mb-0">
												<tr>
													<td>Estimated Time</td><td>{{$stitchingData->estimated_time ?? ''}}</td>
												</tr>
												<tr> 
													<td>Status</td>
													<td>
														@if($data->stitching_status == 0)<span class="badge badge-pill bg-danger inv-badge">Not Running</span>
														@elseif($data->stitching_status == 1)<span class="badge badge-pill bg-success inv-badge">Completed</span>
														@else <span class="badge badge-pill bg-warning inv-badge">Pending</span>
														@endif
													</td>
												</tr>
												<tr>
													<td>Stitching Image</td>
													<td><a href="/Stitching/{{$stitchingData->stitching_image ?? ''}}"><img src="/Stitching/{{$stitchingData->stitching_image ?? ''}}" height="150" alt=""></a></td>
												</tr>	
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">HandWork Details</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped mb-0">
												<tr>
													<td>Estimated Time</td><td>{{$handworkData->estimated_time ?? ''}}</td>
												</tr>
												<tr> 
													<td>Status</td>
													<td>
														@if($data->handwork_status == 0)<span class="badge badge-pill bg-danger inv-badge">Not Running</span>
														@elseif($data->handwork_status == 1)<span class="badge badge-pill bg-success inv-badge">Completed</span>
														@else <span class="badge badge-pill bg-warning inv-badge">Pending</span>
														@endif
													</td>
												</tr>
												<tr>
													<td>HandWrok Image</td>
													<td><a href="/HandWork/{{$handworkData->handwork_image ?? ''}}"><img src="/HandWork/{{$handworkData->handwork_image ?? ''}}" height="150" alt=""></a></td>
												</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- <div class="row">
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Responsive Tables</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-nowrap mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Firstname</th>
													<th>Lastname</th>
													<th>Age</th>
													<th>City</th>
													<th>Country</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Responsive Tables</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-nowrap mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Firstname</th>
													<th>Lastname</th>
													<th>Age</th>
													<th>City</th>
													<th>Country</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Anna</td>
													<td>Pitt</td>
													<td>35</td>
													<td>New York</td>
													<td>USA</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div> 
					</div> --}}
@endsection

@section('extra-script')
@endsection	