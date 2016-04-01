@if (Session::has('success_message'))
 <div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 <h4>	<i class="icon fa fa-check"></i> Done!</h4>
     <p>{!! Session::get('success_message') !!}</p>
 </div>
@endif
@if (Session::has('error_message'))
 <div class="alert alert-danger">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 <h4> <i class="icon fa fa-frown-o"></i> Failed!</h4>
     <p>{!! Session::get('error_message') !!}</p>
 </div>
@endif