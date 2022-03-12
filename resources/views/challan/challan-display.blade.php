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
									<li class="breadcrumb-item active">Challan List</li>
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
									<h4 class="card-title">Total Challan<label>({{$challanCount}})</label>
										<div class="btn-group float-right btn-group-justified">
										
										<a class="btn btn btn-outline-info"  href="/challan-create-view"  > <i class="fa fa-plus"></i>New Challan</a>
										</div>
									 </h4>
								</div>								
								<div class="card-body">	
								<div class="table-responsive"> 
							
								<table id="example" class="display table table-stripedsss" style="width:100%">
									<thead>
											<tr>
											<th>Challan Id</th>
											<th>Challan Name</th>
											<th>Party Name</th>
											<th>Date</th>					
											<th>Image</th>
											<th>Action</th>
											</tr>
											</thead>
											<tbody>
															
											@foreach($challanList as $item)
											<tr>
											<td>{{$item->challan_id}}</td>
											<td>{{$item->challan_name}}</td>
											<td>{{$item->party_name}}</td>
											<td>{{$item->challan_date}}</td>
											<td><a href="../ChallanImage/{{$item->challan_image}}"><img src="../ChallanImage/{{$item->challan_image}}" height="100" /></a></td>							
											<td><a class="fa fa-edit btn btn-outline-success"  href="/challan-update-view/{{$item->challan_id}}" roal="button"></a>
											&nbsp;&nbsp;&nbsp;<a class="fa fa-trash btn btn-outline-danger confirm"  href="/challan-delete/{{$item->challan_id}}" roal="button"></a>
											{{-- &nbsp;&nbsp;&nbsp;<a class="fa fa-eye btn btn-outline-success"  href="" roal="button"></a></td>							 --}}
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

		