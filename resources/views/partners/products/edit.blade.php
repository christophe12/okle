@extends('layouts.app')

@section('content')
@include('partials.admin.header')
@include('partials.admin.navigation')
<div class="content-wrapper">
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
      	     <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Product Update</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                {{ Form::model($product, array('route' => ['update.product', $logged_user->username, $product->name])) }}
                   <div class="box-body">
                    <div class="form-group">
                      {{ Form::label('Product name', 'Product Name')}}
                      {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::label('Product description', 'Product description')}}
                      {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'description']) }}
                    </div>
                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</button>
                    <a href="{{ route('user.products', $logged_user->username)}}" class="btn btn-danger"> Cancel</a>
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