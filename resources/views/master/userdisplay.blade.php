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
									<li class="breadcrumb-item"><a href="/">Dashbord</a></li>
									<li class="breadcrumb-item active">User List</li>
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
									<h4 class="card-title">Total Member<label>({{$userCount-1}})</label> 
									<a class="btn btn btn-outline-info float-right"  href="/createuserView" roal="button"><i class="fa fa-plus"></i> Add New Member</a></h4>
									<div class="card-body">
								<div class="table-responsive">

								<table id="example" class="display table table-stripedsss" style="width:100%">
															<thead>
																<tr>
																	<th>Id</th>                                                               
                                                                    <th>Username</th>
                                                                    <th>Role</th>
                                                                    <th>Hand Work Type</th>
																	<th>Action</th>
																	
																</tr>
															</thead>
															<tbody>

															@foreach($userList as $item)
															<tr>
                                                            <td>{{$item->user_id}}</td>
                                                                    <td>{{$item->name}}</td>
                                                                    <td>{{$item->role}}</td>
                                                                    <td>{{$item->handwork_type}}</td>
																	<td><a class="fa fa-edit btn btn-outline-success"  href="/update-user-view/{{$item->user_id}}" roal="button"></a>&nbsp;&nbsp;&nbsp;<a class="fa fa-trash btn btn-outline-danger confirm"  href="/userdelete/{{$item->user_id}}" roal="button"></a></td>																	
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