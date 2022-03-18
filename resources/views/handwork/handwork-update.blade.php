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
				<li class="breadcrumb-item active">Edit Handwork</li> 
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

				<h4 class="card-title">Edit Handwork
					<a class="fa fa-list float-right mt-1" href="/handwork-display" roal="button"></a>
				</h4>

			</div>
			<div class="card-body">
				<form action="/handwork-update" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-xl-6">
                            <input type="hidden" readonly value="{{$data->jobcard_id}}" name="jid" id="jid"
										class="form-control border-primary">

							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Estimated Time<span style="color:red" >*</span></label>
								<div class="col-lg-9">
									<input type="date" value="{{$data->estimated_time}}" name="edate" id="edate" required
										class="form-control border-primary">
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Handwork Image</label>
								<div class="col-lg-9">
									<input type="file" value="{{old('himage')}}" name="himage" id="himage" class="form-control border-primary">
								</div>
							</div>

							<div class="form-group row">
								<label class="col-lg-3 col-form-label"></label>
								<div class="col-lg-9">
									<img src="../HandWork/{{$data->handwork_image}}" height="100" />
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


@endsection

@section('extra-script')

@endsection