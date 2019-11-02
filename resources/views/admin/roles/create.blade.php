{{-- @extends('admin.layouts.admin_app')

@section('admins_content')
<div class="container addrolescontainer">
    <div class="page-header">
      <h1>Roles</h1>
    </div><!-- /.page-header -->
<div class="card">
  <div class="card-body">
    <h5>ADD ROLE</h5>
    <button class="back" value="Back" onclick="history.back()">Back</button>
      <form method="POST" action="{{ route('roles.store') }}">
          @csrf
          <div>
              <label for="roleName">Role Name</label>
              <input type="text" class="form-control" name="roleName" id="roleName" placeholder="role name"autocomplete="off">
            </div>
            <div class="addrolesbutton">
                <button class="addsave"onclick="history.back()"><i class="fas fa-check"></i>Save</button>
              <button class="addcancel"onclick="history.back()"><i class="fas fa-times"></i>Cancel</button>
              
            </div>
      </form>
    
  </div>
</div>
</div>

@endsection --}}