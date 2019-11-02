{{-- @extends('admin.layouts.admin_app')

@section('admins_content')
<div class="container addstatecontainer">
    <div class="page-header">
      <h1>States</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
        @include('inc.status.err_success')
        </div>
    </div>
<div class="card">
  <div class="card-body">
    <h5>ADD STATE</h5>
    <button class="back" value="Back" onclick="history.back()">Back</button>
      <form method="POST" action="{{ route('states.store') }}">
        @csrf
        <input type="text" class="form-control" name="stateName" placeholder="state name" autocomplete="off">
        <div class="addstatebutton">
          <button class="addcancel"onclick="history.back()"><i class="fas fa-times"></i>Cancel</button>
          <button type="submit" class="addsave"><i class="fas fa-check"></i>Save</button>
        </div>
    </form>
   
  </div>
</div>
</div>

@endsection --}}