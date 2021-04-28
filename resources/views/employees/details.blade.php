@extends('layouts.template')

@section('content')
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script>
			<!-- Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="index.html" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Profile</li>
														</ol>
														<h4 class="text-dark">Profile</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="user-card card shadow-sm bg-white text-center ctm-border-radius">
									<div class="user-info card-body">
										<div class="user-avatar mb-4">
										  @if(!empty(Auth::user()->profile_pic))
                                                    <img src="/img/profiles/{{Auth::user()->profile_pic}}" alt="user avatar"
                                                        class="img-fluid rounded-circle" width="100">
                                                @else
                                                    <img src="{{assets('/img/6.png')}}" alt="user avatar"
                                                        class="img-fluid rounded-circle" width="100">
                                                @endif
										
										</div>
										<div class="user-details">
											<h4><b>Welcome {{Auth::user()->name}}</b></h4>
											<p>{{\Carbon\Carbon::today()->format('D, d M Y')}}</p>
										</div>
									</div>
								</div>
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white p-4 mb-4 card">
									<ul class="list-group">
										<li class="list-group-item text-center button-6"><a href="employment.html" class="text-dark">Employement</a></li>
										<li class="list-group-item text-center active button-5"><a href="details.html" class="text-white">Detail</a></li>
										<li class="list-group-item text-center button-6"><a href="documents.html" class="text-dark">Document</a></li>
										<li class="list-group-item text-center button-6"><a href="payroll.html" class="text-dark">Payroll</a></li>
										<li class="list-group-item text-center button-6"><a href="time-off.html" class="text-dark">Timeoff</a></li>
										<li class="list-group-item text-center button-6"><a href="profile-reviews.html" class="text-dark">Reviews</a></li>
										<li class="list-group-item text-center button-6"><a class="text-dark" href="profile-settings.html">Settings</a></li>
									</ul>
								</div>
							</aside>
						</div>

						<div class="col-xl-9 col-lg-8  col-md-12">
						
							<div class="row">
								<div class="col-xl-4 col-lg-6 col-md-6 d-flex">
									<div class="card flex-fill ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">Basic Information</h4>
										</div>

										<div class="card-body text-center">
											@if (!empty($BasicDetails))
											<p class="card-text mb-3"><span class="text-primary">Preferred Name :</span><b>	{{ $BasicDetails->Preferred_name}}</b></p>
											<p class="card-text mb-3"><span class="text-primary">First Name :</span>{{ $BasicDetails->First_name}} </p>
											<p class="card-text mb-3"><span class="text-primary">Last Name : </span>{{ $BasicDetails->Last_name}}</p>
											<p class="card-text mb-3"><span class="text-primary">Nationality :</span>  {{$BasicDetails->Nationality}}</p>
											<p class="card-text mb-3"><span class="text-primary">Date of Birth :</span> 05 May 1990</p>
											<p class="card-text mb-3"><span class="text-primary">Gender : </span> {{$BasicDetails->Gender}}</p>
											<p class="card-text mb-3"><span class="text-primary">Blood Group :</span> {{$BasicDetails->Blood_group}}</p>
											@endif
											
											<a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm" data-toggle="modal" data-target="#add_basicInformation"><i class="fa fa-plus" aria-hidden="true"></i></a>
											@if (!empty($BasicDetails))
											<button value="{{ $BasicDetails->id}}" class="btn btn-theme ctm-border-radius text-white btn-sm open-complete " > <i class="fa fa-pencil" aria-hidden="true"></i></button>
										@endif
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-lg-6 col-md-6 d-flex">
									<div class="card flex-fill  ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">Contact</h4>
										</div>

										<div class="card-body text-center">
											@if (!empty($ContactDetails))
											<p class="card-text mb-3"><span class="text-primary">Phone Number : </span>	 {{$ContactDetails->Phone_number}}</p>
											<p class="card-text mb-3"><span class="text-primary">Personal Email : </span>{{$ContactDetails->Login_email}}</p>
											<p class="card-text mb-3"><span class="text-primary">Secondary Number : </span>{{$ContactDetails->Personal_email}}</p>
											<p class="card-text mb-3"><span class="text-primary">Web Site : </span>{{$ContactDetails->Web_site}}</p>
											<p class="card-text mb-3"><span class="text-primary">Linkedin : </span>{{$ContactDetails->Linkedin}}</p>
											@endif
										
											<a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm" data-toggle="modal" data-target="#add_Contact"><i class="fa fa-plus" aria-hidden="true"></i></a>
											<a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm" data-toggle="modal" data-target="#edit_Contact"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										</div>

									</div>
								</div>
								<div class="col-xl-4 col-lg-12 col-md-12">
									<div class="row">
										<div class="col-xl-12 col-lg-6 col-md-6 d-flex">
											<div class="card ctm-border-radius shadow-sm flex-fill">
												<div class="card-header">
													<h4 class="card-title mb-0">Dates</h4>
												</div>
												<div class="card-body text-center">
													<p class="card-text mb-3"><span class="text-primary">Start Date : </span>06 Jun 2017</p>
													<p class="card-text mb-3"><span class="text-primary">Visa Expiry Date : </span>06 Jun 2020</p>
													<a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm" data-toggle="modal" data-target="#edit_Dates"><i class="fa fa-pencil" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
										<div class="col-xl-12 col-lg-6 col-md-6 d-flex">
											<div class="card ctm-border-radius shadow-sm flex-fill">
												<div class="card-header">
													<h4 class="card-title d-inline-block mb-0">Dates</h4>
													<span class="float-right"><a href="javascript:void(0)" class="text-primary" data-toggle="modal" data-target="#addNewType"> New Type</a></span>
												</div>
												<div class="card-body">
													<div class="input-group mb-3">
														<input class="form-control datetimepicker date-enter" type="text" placeholder="Add Start Date">
														<div class="input-group-append">
															<button class="btn btn-theme text-white" type="button"><i class="fa fa-calendar" aria-hidden="true"></i></button>
														</div>
													</div>
													<div class="input-group mb-3">
														<input class="form-control datetimepicker date-enter" type="text" placeholder="Add Visa Expiry Date">
														<div class="input-group-append">
															<button class="btn btn-theme text-white" type="button"><i class="fa fa-calendar" aria-hidden="true"></i></button>
														</div>
													</div>
													<div class="text-center">
														<a href="javascript:void(0)" class="btn btn-theme  button-1 ctm-border-radius text-white">Add A Key Date</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
		<!-- New Team The Modal -->
		<div class="modal fade" id="addNewType">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create New Date Type</h4>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control date-enter" type="text" placeholder="Date Type">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control datetimepicker date-enter" type="text" placeholder="Key Date">
							</div>
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn text-white ctm-border-radius btn-theme  button-1 float-right">Add</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Add Basic Information The Modal -->
		<div class="modal fade" id="add_basicInformation">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					{!! Form::open(['method'=> 'post','route' => 'store.basic_Information', 'files' => true ]) !!}

					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Basic Information</h4>
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="Preferred_name" placeholder="Add Preferred Name">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="First_name" placeholder="First Name">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="Last_name" placeholder="Last Name">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="Nationality" placeholder="Add Nationality">
						</div>
						<div class="input-group mb-3">
							<input class="form-control datetimepicker date-enter" name="Date_birth" type="text" placeholder="Add Date of Birth">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="Gender" placeholder="Add Gender">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="Blood_group" placeholder="Add Blood Group">
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-theme  button-1 text-white ctm-border-radius float-right">Add</button>
					</div>
					{!!Form::close()!!}
				</div>
			</div>
		</div>
		<!-- Edit Basic Information The Modal -->
		<div class="modal fade" id="edit_basicInformation">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Edit Basic Information</h4>
						<div class="input-group mb-3">
							<input type="text" class="form-control" id="Preferred_name" placeholder="Add Preferred Name" value="Maria">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="First Name" value="Maria">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Last Name" value="Cotton">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Add Nationality" value="American">
						</div>
						<div class="input-group mb-3">
							<input class="form-control datetimepicker date-enter" type="text" placeholder="Add Date of Birth" value="05-07-1990">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Add Gender" value="Female">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Add Blood Group" value="A+">
						</div>
						<button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme  button-1 text-white ctm-border-radius float-right">Save</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Edit Contact The Modal -->
		<div class="modal fade" id="edit_Contact">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Edit Contact</h4>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Add Phone Number" value="987654321">
						</div>
						<div class="input-group mb-3">
							<input type="email" class="form-control" placeholder="Login Email" value="mariacotton@example.com">
						</div>
						<div class="input-group mb-3">
							<input type="email" class="form-control" placeholder="Add Personal Email" value="maria@example.com">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Add Seconary Phone Number" value="986754231">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Add Web Site" value="www.focustechnology.com">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Connect Your Linkedin" value="#mariacotton">
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-theme  button-1 text-white ctm-border-radius float-right">Save</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Add Contact The Modal -->
		<div class="modal fade" id="add_Contact">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->

					{!! Form::open(['method'=> 'post','route' => 'store.contact_Details', 'files' => true ]) !!}
					{{-- <form action="/store.contact_Details" method="post" enctype="multipart/form-data"> --}}
						{{-- @csrf --}}
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Add Contact</h4>
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="Phone_number" placeholder="Add Phone Number">
						</div>
						<div class="input-group mb-3">
							<input type="email" class="form-control" name="Login_email" placeholder="Login Email">
						</div>
						<div class="input-group mb-3">
							<input type="email" class="form-control" name="Personal_email" placeholder="Add Personal Email">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="Secondary_Phone_number" placeholder="Add Seconary Phone Number">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="Web_site" placeholder="Add Web Site">
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="Linkedin" placeholder="Connect Your Linkedin">
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-theme  button-1 text-white ctm-border-radius float-right">Save</button>
					</div>
				{{-- </form> --}}
					{!!Form::close()!!}
				</div>
			</div>
		</div>
		<!-- Add a Key Date Modal-->
		<div class="modal fade" id="addKeyDate">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Add New Date</h4>
						<div class="form-group">
							<div class="input-group mb-1">
								<input class="form-control datetimepicker date-enter" type="text" placeholder="Date Type">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control datetimepicker date-enter" type="text" placeholder="Key Date">
							</div>
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme  button-1 text-white ctm-border-radius float-right">Add</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Edit Date Modal-->
		<div class="modal fade" id="edit_Dates">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Edit Date</h4>
						<div class="form-group">
							<div class="input-group mb-1">
								<input class="form-control datetimepicker date-enter" type="text" placeholder="Start Date" value="06-07-2017">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control datetimepicker date-enter" type="text" placeholder="Visa Expiry Date" value="06 -07-2020">
							</div>
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme  button-1 text-white ctm-border-radius float-right">Add</button>
					</div>
				</div>
			</div>
		</div>
				
		@section('extrajs')
		
		 <script>
		
		
		   $(document).ready(function(){
		
			var url = "get-basicdetails";
		
			$('.open-complete').click(function(){
				var task_id = $(this).val();
		
				var base_url = window.location.origin;
		
				$.get(base_url + '/' + url + '/' + task_id, function (data) {
					//success data
					console.log(data);
					$('#basic_id').text(data.id);
					$('#Preferred_name').val(data.Preferred_name);
				  
					$('#ViewModal').modal('show');
				}) 
			});
		  });
		  </script>
		@endsection
		@endsection