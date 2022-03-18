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
									<li class="breadcrumb-item active">Handwork List</li>
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
									<h4 class="card-title">Total Handwork<label>({{$dataCount}})</label>
										<div class="btn-group float-right btn-group-justified">
										
										{{-- <a class="btn btn btn-outline-info"  href="/jobcard-create-view"  > <i class="fa fa-plus"></i>New Jobcard</a> --}}
										</div>
									 </h4>
								</div>								
								<div class="card-body">	
								<div class="table-responsive"> 
							
								<table id="example" class="display table table-stripedsss" style="width:100%">
									<thead>
											<tr>
											<th>Handwork Id</th>
											<th>Jobcard number</th>
											<th>Design number</th>					
											<th>Status</th>
											<th>Action</th>
											</tr>
											</thead>
											<tbody>
											<?php $i=1; ?>			
											@foreach($data as $item)
											<tr>
											<td>{{$i++}}</td>
											<td>{{$item->jobcard_number}}</td>
											<td>{{$item->design_number}}</td>
											<td>
												@if($item->handwork_status == 0) <span class="badge badge-pill bg-danger inv-badge">Not Running</span>@endif
												@if($item->handwork_status == 1) <span class="badge badge-pill bg-success inv-badge">Completed</span>@endif
												@if($item->handwork_status == 2) <span class="badge badge-pill bg-warning inv-badge">Pending</span>@endif
											</td>							
											<td><a class="fa fa-play btn btn-outline-success"  href="/handwork-insert-view/{{$item->jobcard_id}}" roal="button"></a>
											&nbsp;&nbsp;&nbsp;<a class="fa fa-edit btn btn-outline-success"  href="handwork-update-view/{{$item->jobcard_id}}" roal="button"></a>							
											&nbsp;&nbsp;&nbsp;<a class="fa fa-check btn btn-outline-success confirm"  href="/handwork-done-view/{{$item->jobcard_id}}" roal="button"></a>
										</td> 
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

		