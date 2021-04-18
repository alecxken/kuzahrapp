 <div id="modaldemo2" class="modal">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title">Profile Update Modal</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           {!! Form::open(['method'=> 'post','route' => 'user.create.post.two', 'files' => true ]) !!}
          <div class="modal-body">

            
         
           <div class="form-group col-md-4 center">
              {!! Form::label('weight', 'Select Profile Picture', ['class' => 'awesome'])!!}
              <input type="file" name="file"  class="form-control input-sm">
           </div>

          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-indigo">Save changes</button>
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          </div>
           {!!Form::close()!!}

        </div>
      </div><!-- modal-dialog -->
    </div>