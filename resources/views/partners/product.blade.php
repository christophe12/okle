@extends('layouts.app')

@section('content')
@include('partials.admin.header')
@include('partials.admin.navigation')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="row">
           <div class="col-md-6">
           </div>
           <div class="col-md-6">
              <div class="row">
                  <div class="col-md-8">
                  </div>
                  <div class="col-md-4">
                    @if(count($products) != 0)
                     <a href="{{ route('create.product.form', $logged_user->username) }}" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add a product</a>
                    @endif
                  </div>
              </div>
           </div>
        </div>
        </section>

        <!-- Main content -->
        <section class="content">
                @include('partials.admin.message')
                @if(count($products) != 0)
                    <div class="row">
                        <div class="col-xs-12">
                          <div class="box box-primary customTable">
                            <div class="box-header">
                              <h3 class="box-title">Products</h3>
                              <div class="box-tools">
                                <div class="input-group" style="width: 150px;">
                                  <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                                  <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                  </div>
                                </div>
                              </div>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                              <table class="table table-hover">
                                <tr class="text-light-blue">
                                  <th>Name</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Actions</th>
                                </tr>
                                @foreach($products as $product)
                                <tr>
                                  <td>{{$product->name}}</td>
                                  <td>{{$product->description}}</td>
                                  <td>
                                  @if($product->has_content != 0)
                                  <span class="label label-success">can be added to any page</span>
                                  @else
                                  <span class="label label-warning">can't be added to any page</span>
                                  @endif
                                  </td>
                                  <td>
                                    <a href="#" class="btn btn-primary"><i class="icon fa fa-eye"></i> view</a>&nbsp;&nbsp;
                                    <a href="{{ route('edit.product.form', [$logged_user->username, $product->name])}}" class="btn btn-success"><i class="icon fa fa-edit"> edit</i></a>&nbsp;&nbsp;
                                    <a href="#" class="btn btn-danger" ><i class="icon fa fa-trash-o"></i> delete</a>&nbsp;&nbsp;
                                  </td>
                                </tr>
                                @endforeach
                              </table>
                            </div><!-- /.box-body -->
                            <div class="box-footer clearfix"> 
                                <ul class="pagination pagination-sm no-margin pull-right">
                                  <li><a href="#">&laquo;</a></li>
                                  <li><a href="#">1</a></li>
                                  <li><a href="#">2</a></li>
                                  <li><a href="#">3</a></li>
                                  <li><a href="#">&raquo;</a></li>
                                </ul>
                            </div>
                          </div><!-- /.box -->
                        </div>
                  </div>
                      @else
                        <div class="alert alert-warning">
                          <h4>
                            <i class="icon fa fa-warning"></i>
                            Product missing!
                          </h4>
                          You have not added any product so far. <a href="{{ route('create.product.form', $logged_user->username)}}" class="text-green"> Add One</a>
                        </div>
                        @endif
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@include('partials.admin.footer')
@endsection