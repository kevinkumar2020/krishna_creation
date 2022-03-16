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
				<li class="breadcrumb-item active">Edit JobCard</li> 
			</ul>
		</div>
	</div>
</div>

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
			<div class="card-header">

				<h4 class="card-title">Edit Jobcard
					<a class="fa fa-list float-right mt-1" href="/jobcard-display" roal="button"></a>
				</h4>

			</div>
			<div class="card-body">
				<form action="/jobcard-update" method="POST" enctype="multipart/form-data">
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
                            <input type="hidden" readonly value="{{$jobcardData->jobcard_id}}" name="jid" id="jid" class="form-control border-primary">
                            <input type="hidden" readonly value="{{$jobcardData->challan_id}}" name="cid" id="cid"
										class="form-control border-primary">
							<div class="form-group row">

								<label class="col-sm-3 col-form-label">Challan Name<span style="color:red" >*</span> </label>
								<div class="col-sm-9 input-group">
									<div class="input-group mb-3">
										<input type="text" value="{{$jobcardData->challan_name}}" name="cname" id="cname"
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
								<label class="col-lg-3 col-form-label">Date</label>
								<div class="col-lg-9">
									<input type="text" value="{{$jobcardData->challan_date}}" name="cdate" id="cdate" readonly required
										class="form-control border-primary">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Jobcard Number<span style="color:red" >*</span></label>
								<div class="col-lg-9">
									<input type="number" value="{{$jobcardData->jobcard_number}}" name="jnumber" id="jnumber" required
										class="form-control border-primary">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Job-Work</label>
								<div class="col-lg-9"> 
									@foreach(explode(',',$jobcardData->jobwork_type) as $item)
										@if($item=='Lehenga')
										 <input type="checkbox" value="Lehenga" name="jw[]" checked />Lehenga <br/>
										 @elseif($item=='Front')
										 <input type="checkbox" value="Front" name="jw[]" checked />Front <br/>
										 @elseif($item=='Butto')
										 <input type="checkbox" value="Butto" name="jw[]" checked />Butto <br/>
										 @elseif($item=='Dupatta')
										 <input type="checkbox" value="Dupatta" name="jw[]" checked />Dupatta <br/>
										 @elseif($item=='All-over')
										 <input type="checkbox" value="All-over" name="jw[]" checked />All-over <br/>
										 @elseif($item=='Sleeve')
										 <input type="checkbox" value="Sleeve" name="jw[]" checked />Sleeve <br/>
										 @else
										 <input type="checkbox" value="Lehenga" name="jw[]" />Lehenga <br/>
										 <input type="checkbox" value="Front" name="jw[]"/>Front <br/>
										 <input type="checkbox" value="Butto" name="jw[]" />Butto <br/>
										 <input type="checkbox" value="Dupatta" name="jw[]" />Dupatta <br/>
										 <input type="checkbox" value="All-over" name="jw[]"/>All-over <br/>
										 <input type="checkbox" value="Sleeve" name="jw[]" />Sleeve <br/>
										@endif
									@endforeach
								</div>
							</div>

							<div class="form-group row">
								<label class="col-lg-3 col-form-label"></label>
								<div class="col-lg-9">
									@foreach(explode(',',$jobcardData->design_image) as $image)
													<img src="../DesignImages/{{$image}}" height="100" />
													@endforeach	
								</div>
							</div>




						</div>
						<div class="col-xl-6">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Production Type<span style="color:red" >*</span></label>
								<div class="col-lg-9">
									<select name="ptype" id="ptype" class="form-control" required>
										@if($jobcardData->production_type == 'In-House')
											<option value="In-House" checked>In-House</option>
											<option value="Out-House">Out-House</option>
										@else
											<option value="In-House">In-House</option>
											<option value="Out-House" checked>Out-House</option>
										@endif
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Pieces<span style="color:red" >*</span></label>
								<div class="col-lg-9">
									<input type="number" name="pieces" id="pieces" value="{{$jobcardData->total_pieces}}"  required
										class="form-control border-primary">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Design Number<span style="color:red" >*</span></label>
								<div class="col-lg-9">
									<input type="number" value="{{$jobcardData->design_number}}" name="dnumber" id="dnumber" required
										class="form-control border-primary">
								</div>
							</div>

							<div class="form-group row ">
								<label class="col-lg-3 col-form-label">Design Image</label>
								<div class="col-lg-9">
									<input type="file" value="{{old('dimage')}}" name="dimage[]" id="dimage" class="form-control border-primary" multiple>
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
				<h5 class="modal-title" id="exampleModalLabel">Challan List</h5>
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
							<th>Challan Name</th>
							<th>Challan Date</th>

						</tr>
					</thead>
					<tbody id="myTable">
						@foreach($challanData as $item)
						<tr>

							<td>{{$item->challan_id}}</td>
							<td>{{$item->challan_name}}</td>
							<td>{{$item->challan_date}}</td>

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

		document.getElementById("cid").value = data[0];
		document.getElementById("cname").value = data[1];
		document.getElementById("cdate").value = data[2];
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