@extends('layouts.app')

@section('content')
@include('partials.admin.deletemodal')
@include('partials.admin.header')
@include('partials.admin.navigation')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="pageTitle">
            <a href="{{ route('user.page.create', $logged_user->username)}}" class="main-action-btn"><i class="fa fa-plus"></i></a>Ok乐 {{ $page_title }}
          </h1>
          <ol class="breadcrumb">
            <li class="active">{{ $page_title }}</li>
            <li><a href="#"><i class="fa fa-archive"></i> Products</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          	@include('partials.admin.message')  
            @if (count($pages) != 0)
            <!-- <a href="#" style="font-size:1.8em;" title="Create a page"><i class="fa fa-plus"></i></a> <br /> -->
            @foreach ($pages as $page)
          	<div class="col-md-4">
              <div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-purple">
                  <div class="widget-user-image">
                    <img class="img-circle" src="/images/avatar.png" alt="User Avatar">
                  </div>
                  <h3 class="widget-user-username"><i class="fa fa-file"></i> {{ $page->name }}</h3>
                  <h5 class="widget-user-desc text-orange"> <i class="fa fa-archive"></i> 
                     @if ($page->hasproduct != false)
                         {{$page->product_name}}
                     @else
                         No product &nbsp;<a href="{{ route("user.page.product.form.create", [$logged_user->username, str_slug($page->name, "_")])}}" class="action-btn" style="font-size:1.1em" title="Add a product"><i class="fa fa-plus"></i></a>
                     @endif
                  </h5>
                  <a href="#" class="pull-right action-btn deleteBtn" style="font-size:1.1em" title="Delete Page" data-toggle="modal" page="{{str_slug($page->name, '_')}}" user="{{$logged_user->username}}"><i class="fa fa-trash-o"></i></a>
                  <a href="{{ route('user.page.form.edit', [$logged_user->username, str_slug($page->name, '_')])}}" class="pull-right action-btn" style="font-size:1.1em"><i class="fa fa-pencil-square-o"></i></a>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a href="#">videos {!! $page->hasvideo != false ? '<span class="pull-right text-maroon"><i class="fa fa-check"></i></span>' : '<span class="pull-right text-maroon"><i class="fa fa-remove"></i></span>' !!}</a></li>
                    <li><a href="#">images {!! $page->hasimages != false ? '<span class="pull-right text-navy"><i class="fa fa-check"></i></span>' : '<span class="pull-right text-navy"><i class="fa fa-remove"></i></span>' !!}</a></li>
                    <li><a href="#">textBlocks {!! $page->hastextblocks != false ? '<span class="pull-right text-green"><i class="fa fa-check"></i></span>' : '<span class="pull-right text-green"><i class="fa fa-remove"></i></span>' !!}</a></li>
                  </ul>
                </div>
              </div><!-- /.widget-user -->
            </div><!-- /.col -->
            @endforeach
            @else
            <div class="content">
            	<div class="alert alert-danger">
               You haven't created any page yet. <a href="{{ route('user.page.create', $logged_user->username)}}" style="font-size:1.5em">Create One</a>
             </div>
            </div>
            @endif
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@include('partials.admin.footer')
@endsection