@extends('admin.layouts.admin_app')

@section('admins_content')
{{-- <div class="row justify-content-center">
    <div class="col-md-12">
    @include('inc.status.err_success')
    </div>
</div> --}}
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Scheduler</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Scheduler</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container">
    @include('admin.scheduler.scheduler')
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection