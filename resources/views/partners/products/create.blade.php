@extends('layouts.app')

@section('content')
@include('partials.admin.header')
@include('partials.admin.navigation')
<div class="content-wrapper">
	 <section class="content-header">
          <h1>
            Products {{ $page_title }} 
          </h1>
          <ol class="breadcrumb">
            <li class="active">{{ $page_title }}</li>
            <li><a href="#"><i class="fa fa-archive"></i> Products</a></li>
          </ol>
      </section>
      <section class="content">
      	<div class="row">
      	  <div class="content">
      	   @if(count($errors) > 0)
      	      <div class="alert alert-danger alert-dismissable">
      	       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <ul>
               	@foreach ($errors->all() as $error)
               	    <li>{{ $error }}</li>
               	@endforeach
               </ul>
              </div>
      	   @endif
      	     <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Page Creation</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                {{ Form::open(array('route' => ['product.create', $logged_user->username])) }}
                   <div class="box-body">
                    <div class="form-group">
                      {{ Form::label('name', 'Page Name')}}
                      {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                    </div>
                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('user.pages', $logged_user->username)}}" class="btn btn-danger"> Cancel</a>
                    </div>
                  </div><!-- /.box-body -->
                {{ Form::close() }}
              </div><!-- /.box -->
      	  	
      	  </div>
      	</div>
      </section>
</div>
@include('partials.admin.footer')
@endsection