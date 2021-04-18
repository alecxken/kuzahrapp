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

                     {!! Form::open(['method'=> 'post','route' => 'user.create.post.two', 'files' => true ]) !!}
        <div class="card-body"> 

       
          <div class="row">
      
           <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'Select Your Department', ['class' => 'awesome'])!!}
             <select name="emp_department" required=""  value="{{{ $emp->emp_department ?? '' }}}"  class="form-control input-sm">
              <option value="">Choose Department</option>
               @foreach($departments as $dept)
                <option>{{$dept->dept_name}}</option>
               @endforeach
             </select>
           
           </div>

           <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'Select Your Position', ['class' => 'awesome'])!!}
          <input type="text" name="emp_position"  value="{{{ $emp->emp_position ?? '' }}}" class="form-control input-sm">
           </div>

           <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'Your Employment Date', ['class' => 'awesome'])!!}
             <input type="date" name="emp_date"  value="{{{ $emp->emp_date ?? '' }}}" class="form-control input-sm">
           </div>

           <div class="form-group col-md-12 center">
             {!! Form::label('weight', 'Tell us About Yourself', ['class' => 'awesome'])!!}
             <input type="textarea" name="emp_about" rows='2' value="{{{ $emp->emp_about ?? '' }}}" class="form-control input-sm">
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
