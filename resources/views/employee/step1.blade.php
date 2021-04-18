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

                     {!! Form::open(['method'=> 'post','route' => 'user.create.post', 'files' => true ]) !!}
        <div class="card-body"> 

       
          <div class="row">
            <input type="hidden" value="{{$token}}" name="emp_token">

            <input type="hidden" value="{{Auth::id()}}" name="emp_id">
           <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'Your Full Name', ['class' => 'awesome'])!!}
             <input type="text" name="emp_name" readonly value="{{Auth::user()->name}}" class="form-control input-sm">
           </div>

           <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'Your Email Address', ['class' => 'awesome'])!!}
          <input type="text" name="emp_email" readonly value="{{Auth::user()->email}}" class="form-control input-sm">
           </div>

           <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'Your Phone Number', ['class' => 'awesome'])!!}
             <input type="Number" name="emp_contact"  value="{{{ $emp->emp_contact ?? '' }}}" class="form-control input-sm">
           </div>

           <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'Physical Address', ['class' => 'awesome'])!!}
             <input type="text" name="emp_address" value="{{{ $emp->emp_address ?? '' }}}" class="form-control input-sm">
           </div>

           <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'Reg Document Type', ['class' => 'awesome'])!!}
             <select class="form-control" required="" name="emp_type" value="{{{ $emp->emp_type ?? '' }}}">
               <option value="">Choose Reg Type</option>
               <option>Passport</option>
               <option>National IDNo</option>
               <option>Alien IDNo</option>
             </select>
           </div>

           <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'Reg Details', ['class' => 'awesome'])!!}
             <input type="text" name="emp_details" value="{{{ $emp->emp_details ?? '' }}}"  class="form-control input-sm">
           </div>

        
         </div>
         </div>
          <div class="card-footer">
            
             <button class="btn btn-success pull-right" type="Submit">Proceed</button>
          </div>
          {!!Form::close()!!}
        </div>

      </div>
          
     
   

@endsection
