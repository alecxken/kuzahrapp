@extends('layouts.template')

@section('title', '| Users')

@section('content')
<div class="card bd-0">
                <div class="card-header tx-medium bd-0 tx-white bg-gray-800">
                 <i class="fa fa-users"></i> {{Auth::user()->name}} Profile  Administration 
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0">
                  <center>
                  <div class="btn-group" role="group" aria-label="Basic example">
                       <a href="{{route('user.create')}}" class="btn btn-secondary pd-x-25 {{ (request()->is('steponeuser')) ? 'active' : '' }}"> Step One</a>
                       <a href="{{url('steptwouser')}}" class="btn btn-secondary pd-x-25  {{ (request()->is('steptwouser')) ? 'active' : '' }}"> Step Two</a>
                       <a href="{{url('stepthreeuser')}}" class="btn btn-secondary pd-x-25 {{ (request()->is('stepthreeuser')) ? 'active' : '' }}"> Step Three</a>                          
                  </div>
                   </center>
                  <hr>

                     
        <div class="card-body"> 
   <div class="az-content az-content-profile">
      <div class="container mn-ht-100p">
        <div class="az-content-left az-content-left-profile">

          <div class="az-profile-overview">
            <div class="az-img-user">
              <img src="{{asset('images/'.Auth::user()->profile_pic)}}" onerror="this.onerror=null;this.src='{{asset('/images/default.gif')}}';" alt="">
            </div><!-- az-img-user -->
            <div class="d-flex justify-content-between mg-b-20">
              <div>
                <h5 class="az-profile-name">{{Auth::user()->name}}</h5>
                <p class="az-profile-name-text">@if(!empty($emp)){{$emp->position}}@endif</p>
              </div>
            
            
            </div>
                <div class="az-profile-bio">
                  @if(!empty($emp)){{$emp->emp_about}} @endif

                    @php $sig = \App\Models\SignatureDirectory::all()->where('user_id',Auth::id())->first(); @endphp
                        
                  @if(!empty($sig))                    
                    <img class="profile-user-img img-fluid img-circle" 
                       src="{{ url($sig->signature)}}"  
                      alt="User profile picture">
                    @endif
               </div><!-- az-profile-bio -->
               {!! Form::open(['method'=> 'post','url' => 'profile_update', 'files' => true ]) !!}
               <div class="row">
            <div class="form-group col-md-8 center">
            <!--   {!! Form::label('weight', 'Select Profile Picture', ['class' => 'awesome'])!!} -->
              <input type="file" name="files"  class="form-control input-sm">
           </div>
            <div class="form-group col-md-4 center">
               <button class="btn btn-indigo btn-icon" type="submit"><i class="typcn typcn-plus-outline"></i></button>
            </div>
          </div>
   {!!Form::close()!!}
            

        


            <hr class="mg-y-3">
               <div class="card-body">

                 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

  

    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

        <style>

        .kbw-signature { width:120px; height: 70px;}

        #sig canvas{

            width: 100% !important;

            height: auto;

        }

    </style>
               	 <form method="POST" action="{{ url('signaturepad-post') }}">

                        @csrf

                          <div class=" card-body col-md-12 center">
             {!! Form::label('weight', 'Your Signature:', ['class' => 'awesome'])!!}
     
                            <div id="sig" ></div>

                           </div>
						<div class="btn-group">
							   <button id="clear" class="btn btn-danger btn-xs">Clear </button>

                                <textarea id="signature64" name="signed" style="display: none"></textarea>

                                 <button class="btn btn-success">Save</button>
					</div>
                         

                    </form>
               </div>
               <script type="text/javascript">

    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});

    $('#clear').click(function(e) {

        e.preventDefault();

        sig.signature('clear');

        $("#signature64").val('');

    });

</script>

          <!-- az-profile-social-list -->

          </div><!-- az-profile-overview -->

        </div><!-- az-content-left -->
        <div class="az-content-body az-content-body-profile">
          <nav class="nav az-nav-line">
            <a href="" class="nav-link active" data-toggle="tab">Overview</a>
          <!--   <a href="" class="nav-link" data-toggle="tab">Reviews</a>
            <a href="" class="nav-link" data-toggle="tab">Followers</a>
            <a href="" class="nav-link" data-toggle="tab">Following</a>
            <a href="" class="nav-link" data-toggle="tab">Account Settings</a> -->
          </nav>

          <div class="az-profile-body">

        

         

            <div class="row">
            	
            <!-- col -->
          
           <!-- col -->
              <div class="col-md-12">
                <div class="az-content-label tx-13 mg-b-25">Contact Information</div>
                <div class="az-profile-contact-list">
                <div class="row">
<!--                   emp_contact
emp_address
emp_type
emp_details
emp_department
emp_position
emp_date -->
                	<div class="col-md-4">
                		   <div class="media">
                    <div class="media-icon"><i class="icon ion-md-phone-portrait"></i></div>
                    <div class="media-body">
                      <span>Mobile</span>
                      <div>@if(!empty($emp)){{$emp->emp_contact}}@endif</div>
                    </div><!-- media-body -->
                  </div><!-- media -->
                  <div class="media">
                    <div class="media-icon"><i class="icon fa fa-check"></i></div>
                    <div class="media-body">
                      <span>Email</span>
                      <div>@if(!empty($emp)){{Auth::user()->email}}@endif</div>
                    </div><!-- media-body -->
                  </div><!-- media -->
                  <div class="media">
                    <div class="media-icon"><i class="icon ion-md-locate"></i></div>
                    <div class="media-body">
                      <span>Current Address</span>
                      <div>@if(!empty($emp)){{$emp->emp_address}}@endif</div>
                    </div><!-- media-body -->
                  </div><!-- media -->
                </div>
                <div class="col-md-4">
                		   <div class="media">
                    <div class="media-icon"><i class="icon fa fa-check"></i></div>
                    <div class="media-body">
                      <span>Department</span>
                      <div>@if(!empty($emp)){{$emp->emp_department}}@endif</div>
                    </div><!-- media-body -->
                  </div><!-- media -->
                  <div class="media">
                    <div class="media-icon"><i class="icon fa fa-check"></i></div>
                    <div class="media-body">
                      <span>Position</span>
                      <div>@if(!empty($emp)){{$emp->emp_position}}@endif</div>
                    </div><!-- media-body -->
                  </div><!-- media -->
                  <div class="media">
                    <div class="media-icon"><i class="icon fa fa-clock"></i></div>
                    <div class="media-body">
                      <span>Employement Date</span>
                      <div>@if(!empty($emp)){{$emp->emp_date}}@endif</div>
                    </div><!-- media-body -->
                  </div><!-- media -->
                </div>
                	</div>
             
                
                </div><!-- az-profile-contact-list -->
              </div><!-- col -->
          </div>
               <hr class="mg-y-34">
               <div class="col-md-12"></div>
               <div class="row">
               	   <div class="col-md-4">
                <div class="az-content-label tx-13 mg-b-25">Work &amp; Education</div>
                <div class="az-profile-work-list">
                  <div class="media">
                    <div class="media-logo bg-success"><i class="icon ion-logo-whatsapp"></i></div>
                    <div class="media-body">
                      <h6>UI/UX Designer at <a href="">Whatsapp</a></h6>
                      <span>2016 - present</span>
                      <p>Past Work: ThemePixels, Inc. and ThemeForest, Inc.</p>
                    </div><!-- media-body -->
                  </div><!-- media -->
                  <div class="media">
                    <div class="media-logo bg-primary"><i class="icon ion-logo-buffer"></i></div>
                    <div class="media-body">
                      <h6>Studied at <a href="">Buffer University</a></h6>
                      <span>2002 - 2006</span>
                      <p>Degree: Bachelor of Science in Computer Science</p>
                    </div><!-- media-body -->
                  </div><!-- media -->
                </div><!-- az-profile-work-list -->
              </div>
              <div class="col-md-4">
                <label class="az-content-label tx-13 mg-b-20">Websites &amp; Social Channel</label>
            <div class="az-profile-social-list">
              <div class="media">
                <div class="media-icon"><i class="icon ion-logo-github"></i></div>
                <div class="media-body">
                  <span>Github</span>
                  <a href="">github.com/sophia.white</a>
                </div>
              </div><!-- media -->
              <div class="media">
                <div class="media-icon"><i class="icon ion-logo-twitter"></i></div>
                <div class="media-body">
                  <span>Twitter</span>
                  <a href="">twitter.com/sophia.me</a>
                </div>
              </div><!-- media -->
              <div class="media">
                <div class="media-icon"><i class="icon ion-logo-linkedin"></i></div>
                <div class="media-body">
                  <span>Linkedin</span>
                  <a href="">linkedin.com/in/sophiaw</a>
                </div>
              </div><!-- media -->
              <div class="media">
                <div class="media-icon"><i class="icon ion-md-link"></i></div>
                <div class="media-body">
                  <span>My Portfolio</span>
                  <a href="">themepixels.me/</a>
                </div>
              </div><!-- media -->
            </div>
        </div>

            <div class="col-md-4">
                <div class="az-content-label tx-13 mg-b-20">Profile Checklit</div>
                <div class="az-traffic-detail-item">
                  <div>
                    <span>People with title Founder &amp; CEO</span>
                    <span>24 <span>(20%)</span></span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar wd-20p" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div>
                <div class="az-traffic-detail-item">
                  <div>
                    <span>People with title UX Designer</span>
                    <span>16 <span>(15%)</span></span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-success wd-15p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div>
                <div class="az-traffic-detail-item">
                  <div>
                    <span>People with title Recruitment</span>
                    <span>87 <span>(45%)</span></span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-pink wd-45p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div>
                <div class="az-traffic-detail-item">
                  <div>
                    <span>People with title Software Engineer</span>
                    <span>32 <span>(25%)</span></span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-teal wd-25p" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div>
              </div><!-- col -->
          
            </div><!-- row -->

            <div class="mg-b-20"></div>

          </div><!-- az-profile-body -->
        </div><!-- az-content-body -->
      </div><!-- container -->
    </div><!-- az-content -->
</div>

    
</div>
</div>


@endsection

<!-- row -->