@extends('layouts.app')

@section('content')
@include('partials.admin.header')
@include('partials.admin.navigation')
<div class="content-wrapper">
	 <section class="content-header">
          <h1>
             {{ $page_title == "Pages" ? 'Pages' : 'Products' }} 
          </h1>
          <ol class="breadcrumb">
            <li class="active">{{ $page_title }}</li>
            @if($page_title == "Pages")
            <li>
            <a href="#">
            <i class="fa fa-archive"></i> Products
            </a></li>
            @else
            <li>
            <a href="{{route('user.pages', $logged_user->username)}}">
            <i class="fa fa-file"></i> Pages
            </a></li>
            @endif
          </ol>
      </section>
      <section class="content">
      	<div class="row">
      	  <div class="content">
           @include('partials.admin.message')
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
                  <h3 class="box-title"> {{ $page_title == "Pages" ? 'Page Creation' : 'Product Creaction' }}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @if ($page_title == "Pages")
                {{ Form::open(array('route' => ['page.create', $logged_user->username])) }}
                   <div class="box-body">
                    <div class="form-group">
                      {{ Form::label('name', 'Page Name')}}
                      {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                    </div>
                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Create</button>
                    <a href="{{ route('user.pages', $logged_user->username)}}" class="btn btn-danger"> Cancel</a>
                    </div>
                  </div><!-- /.box-body -->
                {{ Form::close() }}
                @else
                   {{ Form::open(array('route' => ['user.page.product.create', $logged_user->username, str_slug($page->name, '_')])) }}
                   <div class="box-body">
                    <div class="form-group">
                      {{ Form::label('name', 'Product Name')}}
                      {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                    </div>
                    <div class="form-group">
                      {{ Form::label('description', 'Product Description')}}
                      {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) }}
                    </div>
                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Create</button>
                    <a href="{{ route('user.pages', $logged_user->username)}}" class="btn btn-danger"> Cancel</a>
                    </div>
                  </div><!-- /.box-body -->
                {{ Form::close() }}
                @endif
              </div><!-- /.box -->
      	  	
      	  </div>
      	</div>
      </section>
</div>
@include('partials.admin.footer')
@endsection