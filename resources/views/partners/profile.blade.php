@extends('layouts.app')

@section('content')
@include('partials.admin.header')
@include('partials.admin.navigation')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Page Header
            <small>Optional description</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <h1 class="text-danger">Not Yet implemented</h1>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@include('partials.admin.footer')
@endsection