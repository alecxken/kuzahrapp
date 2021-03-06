@extends('layouts.template')
@section('content')
<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class=" col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="index.html" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Company</li>
														</ol>
														<h4 class="text-dark">Company</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						
								<div class="card shadow-sm ctm-border-radius">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block">Overview </h4>
										<a href="employees-team.html" class="float-right text-primary">Manage Teams</a>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-6 col-6 text-center">
												<h5 class="btn btn-outline-primary mt-3"><b>@if(!empty($offices)){{$offices}}@endif
												</b></h5>
												<p class="mb-3">Department(s)</p>
											</div>
											<div class="col-md-6 col-6 text-center">
												<h5 class="btn btn-outline-primary mt-3"><b>
												@if(!empty($teams)){{$teams}}@endif
											    </b></h5>
												<p class="mb-3">Teams</p>
											</div>
										</div>
										<div class="text-center">
											<a href="employees.html" class="btn btn-theme text-white ctm-border-radius mt-2 button-1">People Directory</a>
										</div>
									</div>
								</div>
								<!-- <div class="card ctm-border-radius shadow-sm">
									<div class="card-header">
										<div class="d-inline-block">
											<h4 class="card-title mb-0">Focus Technologies</h4>
											<p class="mb-0 ctm-text-sm">Head Office</p>
										</div>
										<div class="d-inline-block float-right" data-toggle="modal" data-target="#editOffice">
											<a href="javascript:void(0)" class="btn btn-theme mt-2 text-white float-right ctm-border-radius" title="Edit"><i class="fa fa-pencil"></i>	</a>
										</div>
									</div>
									<div class="card-body">
										<h4 class="card-title">Members</h4>
										<a href="employment.html"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Danny Ward"><img alt="avatar image" src="assets/img/profiles/img-5.jpg" class="img-fluid"></span></a>
										<a href="employment.html"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Linda Craver"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-4.jpg"></span></a>
										<a href="employment.html"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Jenni Sims"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-3.jpg"></span></a>
										<a href="employment.html"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Maria Cotton"><img alt="avatar image" src="assets/img/profiles/img-6.jpg" class="img-fluid"></span></a>
										<a href="employment.html"><span class="avatar" data-toggle="tooltip" data-placement="top" title="John Gibbs"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-2.jpg"></span></a>
										<a href="employment.html"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Richard Wilson"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></span></a>
									</div>
								</div> -->
							</aside>
						</div>
					
						<div class="col-xl-9 col-lg-8 col-md-12">
							 <div class="card shadow-sm ctm-border-radius">
                            <div class="card-body align-center">
                                <h4 class="card-title float-left mb-0 mt-2"> Company Management</h4>
                                <ul class="nav nav-tabs float-right border-0 tab-list-emp">
                               
										
                                    
                                    <li class="nav-item pl-3">
                                    	   @if(empty($comps))<a href="javascript:void(0)"
 												data-toggle="modal" data-target="#add-information"
                                            class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i
                                                class="fa fa-plus"></i> Add Company Info</a>@else
                                        <a href="javascript:void(0)"
 												data-toggle="modal" data-target="#addOffice"
                                            class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i
                                                class="fa fa-plus"></i> Add Offices</a>@endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if(!empty($comps))

							<div class="row">
							
								<div class="col-xl-7 col-lg-12 col-md-7 d-flex">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">
												@if(!empty($comps))
													{{$comps->comp_name}}
												@else
												
												@endif
												 
										
												<a href="javascript:void(0)" class="float-right text-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											</h4>
										</div>
										<div class="card-body">

											<div class="row">
											
												<div class="col-md-6">
													<p><span class="text-primary">Register Number : </span>{{$comps->comp_regno}}</p>
													<p><span class="text-primary">Incorporation Date : </span>{{\Carbon\Carbon::parse($comps->created_at)->format('D m Y')}}</p>
													<p><span class="text-primary">Company : </span>{{$comps->comp_name}}</p>
												</div>
												<div class="col-md-6">
													<p>
														<span class="text-primary">Address:</span><br>
														
														{{$comps->comp_address}}
													
													</p>
													
												</div>
												
											</div>
											<div class="text-center mt-3">
												<button class="btn btn-theme text-white ctm-border-radius button-1" data-toggle="modal" data-target="#add-information">Add Department Info </button>
											</div>
										</div>
									</div>
								</div>
								@if(!empty($comps))
								<div class="col-xl-5 col-lg-12 col-md-5 d-flex">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">
												Contact
											</h4>
										</div>
										<div class="card-body">
											<div class="input-group mb-3">
												<input type="text" class="form-control" placeholder="Contact" value="{{$comps->comp_phoneno}}">
												<div class="input-group-append">
													<button class="btn btn-theme text-white" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
												</div>
											</div>
											<div class="input-group mb-3">
												<input type="text" class="form-control" placeholder="focustechnology.com" value="{{$comps->comp_website}}">
												<div class="input-group-append">
													<button class="btn btn-theme text-white" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
												</div>
											</div>
											<div class="input-group mb-0">
												<input type="email" class="form-control" placeholder="hr@focustechnology.com" value="{{$comps->comp_email}}">
												<div class="input-group-append">
													<button class="btn btn-theme text-white" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endif
								<div class="col-md-12">
									<div class="company-doc">
										<div class="card ctm-border-radius shadow-sm">
											<div class="card-header">
												<h4 class="card-title d-inline-block mb-0">
													Documents
												</h4>
												<a href="javascript:void(0)" class="float-right add-doc text-primary" data-toggle="modal" data-target="#addDocument">Add Document
													</a>
											</div>
											<div class="card-body">
												<div class="employee-office-table">
													<div class="table-responsive">
														<table class="table custom-table table-hover">
															<thead>
																<tr>
																	<th>Type</th>
																	<th>Name</th>
																	<th>Date</th>
																	<th>Size</th>
																	<th class="text-right">Action</th>
																</tr>
															</thead>
															<tbody>
															@if(!empty($comp_docs))
															@foreach ($comp_docs as $comp )		
																<tr>
																	<td class="text-primary"><i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="PDF" aria-hidden="true"></i></td>
																	<td><a href="{{url('read-file/'.$comp->doc)}}" target="_blank" class="text-primary">{{$comp->doc_name}}</a></td>
																	<td>{{\Carbon\Carbon::parse($comp->doc_date)->format('D m Y')}} </td>
																	<td>{{number_format($comp->doc_size/1000000,2)}} MB</td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
																				<span class="lnr lnr-trash"></span> Delete
																			</a>
																		</div>
																	</td>
																	
																</tr>
															@endforeach
															@endif
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						
							</div>
						@endif
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
		<!--  add office The Modal -->
		<div class="modal fade" id="addOffice">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					@if(!empty($comps))
		 {!! Form::open(['method'=> 'post','route' => 'store.company_office', 'files' => true ]) !!}
 					<input type="hidden" value="{{$comps->comp_token}}" name="comp_token">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create a New Office</h4>
						<p>Offices allow you to group people by location. Offices can subscribe to different public holidays, helping you to localize people's time off allowances.</p>
						<div class="form-group">
							<input type="text" name="office_name" class="form-control" placeholder="Name">
						</div>
						<div class="form-group">
							<input type="text" name="office_desc" class="form-control" placeholder="Description">
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
			{!!Form::close()!!}
			@endif
				</div>
			</div>
		</div>
		<div class="modal fade" id="editOffice">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Edit Office</h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Office Name">
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme text-white ctm-border-radius float-right">Save</button>
					</div>
				</div>
			</div>
		</div>
		
		<!--Delete The Modal -->
		<div class="modal fade" id="delete">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-4">Are You Sure Want to Delete?</h4>
						<button type="button" class="btn btn-danger text-white text-center ctm-border-radius mb-2 mr-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme text-white text-center ctm-border-radius mb-2 button-1 button-1" data-dismiss="modal">Delete</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- New Team The Modal -->
			
		<div class="modal fade" id="add-information" role="document">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					   {!! Form::open(['method'=> 'post','route' => 'store.company_page', 'files' => true ]) !!}
 
					<div class="modal-body style-add-modal">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Add Company Information</h4>

						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" name="comp_name" type="text" readonly=""  placeholder="Company Name"}>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" name="comp_email" type="email" placeholder="Company Email">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" name="comp_regno" type="text" placeholder="Company RegistrationNo">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" name="comp_phoneno" type="text" placeholder="Company Phone">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" name="comp_address" type="text" placeholder="Company Address">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" name="comp_website" type="text" placeholder="Company Website">
							</div>
						</div>
							<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" name="comp_primary_color" type="color" placeholder="Company Color">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" name="comp_logo" type="file" placeholder="Company Logo">
							</div>
						</div>
						
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
					{!!Form::close()!!}
				</div>
			</div>
		</div>
			
		
		<!-- New Folder The Modal -->
		<div class="modal fade" id="NewFolder">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create New Folder</h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Name">
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- add document The Modal -->	
		@if(!empty($comps))
		<div class="modal fade" id="addDocument">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					   {!! Form::open(['method'=> 'post','url' => 'store_company_doc', 'files' => true ]) !!}
							<input type="hidden" name="comp_token" value="{{$comps->comp_token}}">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Upload Document</h4>
						<div class="form-group">
							<input type="file"  name="file" class="form-control">
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-theme ctm-border-radius text-white float-right button-1">Upload</button>
					</div>
						{!!Form::close()!!}
				</div>
			</div>
		</div>
		@endif
		
		<!-- add office The Modal -->
		<div class="modal fade" id="addOffice1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Add Office</h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Name">
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
				</div>
			</div>
		</div>
@endsection