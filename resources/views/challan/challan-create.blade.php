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
				<li class="breadcrumb-item active">Add Challan</li> 
			</ul>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
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

				<h4 class="card-title">Create New Challan
					<a class="fa fa-list float-right mt-1" href="/challan-display" roal="button"></a>
					<a class="btn btn btn-outline-info float-right mr-4" href="/party-create-view">
						<i class="fa fa-plus"></i> ADD New Party</a>
					&nbsp;
				</h4>

			</div>
			<div class="card-body">
				<form action="/challan-create" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-xl-6">

							{{-- <div class="form-group row">
								<label class="col-sm-3 col-form-label">C</label>
								<div class="col-sm-9">

									<input type="text" readonly value="" name="poid" id="poid"
										class="form-control border-primary">
									
								</div>
							</div> --}}
                            <input type="hidden" readonly value="{{old('pid')}}" name="pid" id="pid"
										class="form-control border-primary">
							<div class="form-group row">

								<label class="col-sm-3 col-form-label">Party Name<span style="color:red" >*</span> </label>
								<div class="col-sm-9 input-group">
									<div class="input-group mb-3">
										<input type="text" value="{{old('pname')}}" name="pname" id="pname"
											class="form-control border-primary " readonly required>
										<div class="input-group-append">
											<button class="fa fa-user" style="height:40px;" type="button"
												data-toggle="modal" data-target="#exampleModal"></button>
										</div>
									</div>
									@error('name')<p style="color:red">{{$message}}</p>@enderror
								</div>

							</div>

							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Address</label>
								<div class="col-lg-9">
									<input type="text" value="{{old('paddress')}}" name="paddress" id="paddress" readonly required
										class="form-control border-primary">

								</div>
							</div>

							<div class="form-group row ">
								<label class="col-lg-3 col-form-label">Challan Image</label>
								<div class="col-lg-9">
									<input type="file" value="{{old('cimage')}}" name="cimage" id="cimage" class="form-control border-primary">
								</div>
							</div>

						</div>
						<div class="col-xl-6">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Challan Name<span style="color:red" >*</span></label>
								<div class="col-lg-9">
									<input type="text" value="{{old('cname')}}" name="cname" id="cname" class="form-control border-primary" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Date<span style="color:red" >*</span></label>
								<div class="col-lg-9">
									<input type="text" name="cdate" id="cdate" value="{{ date('d-m-Y') }}" required
										class="form-control border-primary">
									@error('podate')<p style="color:red">{{$message}}</p>@enderror
								</div>
							</div>

						</div>
					</div>
			</div>
			<div class="text-right p-3">
				<button type="submit" name="submit" class="btn btn-primary mx-3 my-3">Save</button>
			</div>
			</form>






		</div>
	</div>
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Party List</h5>
				{{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
			</div>
			<br>
			<!-- <div class="form-group ml-3 mr-5">
				<input type="text" class="form-control" name="search" id="search" aria-describedby="helpId"
					placeholder="search">
			</div> -->

			<div class="modal-body">
				<table id="example" class="example table table-stripped table-hover" id="tvalue">
					<thead>
						<tr id="trow">
							<th>Id</th>
							<th>Party Name</th>
							<th>Party Address</th>

						</tr>
					</thead>
					<tbody id="myTable">
						@foreach($partyData as $item)
						<tr>

							<td>{{$item->party_id}}</td>
							<td>{{$item->party_name}}</td>
							<td>{{$item->party_address }}</td>

						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
			{{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
		</div>
	</div>
</div>


@endsection

@section('extra-script')
<script>
	// script for display record of seller in field
	var table = document.getElementsByTagName("table")[0];
	var tbody = table.getElementsByTagName("tbody")[0];
	tbody.onclick = function (e) {
		e = e || window.event;
		var data = [];
		var target = e.srcElement || e.target;
		while (target && target.nodeName !== "TR") {
			target = target.parentNode;
		}
		if (target) {
			var cells = target.getElementsByTagName("td");
			for (var i = 0; i < 3; i++) {
				data.push(cells[i].innerHTML

				);


			}
		}
		// alert(data);

		document.getElementById("pid").value = data[0];
		document.getElementById("pname").value = data[1];
		document.getElementById("paddress").value = data[2];
		$('#exampleModal').modal('hide');



	};
		
</script>
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>	

@endsection