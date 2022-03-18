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
									<li class="breadcrumb-item active">Jobcard List</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					 
					<div class="row">
						<div class="col-sm-12">
							<div class="card"> 
							@if(session()->has('msg'))
							<div class="alert alert-success ">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								{{session()->get('msg')}}
							</div>
							@endif
							@if(session()->has('error'))
							<div class="alert alert-warning ">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								{{session()->get('error')}}
							</div>									
							@endif
								<div class="card-header">
									<h4 class="card-title">Total Jobcard<label>({{$jobcardCount}})</label>
										<div class="btn-group float-right btn-group-justified">
										
										<a class="btn btn btn-outline-info"  href="/jobcard-create-view"  > <i class="fa fa-plus"></i>New Jobcard</a>
										</div>
									 </h4>
								</div>								
								<div class="card-body">	
								<div class="table-responsive"> 
							
								<table id="example" class="display table table-stripedsss" style="width:100%">
									<thead>
											<tr>
											<th>Jobcard Id</th>
											<th>Jobcard number</th>
											<th>Challan name</th>
											<th>Design number</th>					
											<th>Production Type</th>
											<th>Status</th>
											<th>Action</th>
											</tr>
											</thead>
											<tbody> 
															
											@foreach($jobcardList as $item)
											<tr>
											<td>{{$item->jobcard_id}}</td>
											<td>{{$item->jobcard_number}}</td>
											<td>{{$item->challan_name}}</td>
											<td>{{$item->design_number}}</td>
											<td>{{$item->production_type}}</td>
											<td>
												@if($item->inhouse_status == 0 && $item->outhouse_status == 0) <span class="badge badge-pill bg-danger inv-badge">Not Running</span> 
												@elseif($item->handwork_status == 1) <span class="badge badge-pill bg-success inv-badge">Completed</span>
												@else <span class="badge badge-pill bg-warning inv-badge">Pending</span> 
												@endif
											</td>							
											<td><a class="fa fa-edit btn btn-outline-success"  href="/jobcard-update-view/{{$item->jobcard_id}}" roal="button"></a>
											&nbsp;&nbsp;&nbsp;<a class="fa fa-trash btn btn-outline-danger confirm"  href="/jobcard-delete/{{$item->jobcard_id}}" roal="button"></a>
											&nbsp;&nbsp;&nbsp;<a class="fa fa-eye btn btn-outline-success"  href="jobcard-preview/{{$item->jobcard_id}}" roal="button"></a></td>							
										</tr>
												@endforeach
													</tbody>
												</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				

@endsection

@section('extra-script')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection			

		