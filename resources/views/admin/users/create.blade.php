{{-- @extends('admin.layouts.admin_app')
@section('admins_content')
<div class="container addusercontainer">
    <div class="page-header">
      <h1>Users</h1>
    </div><!-- /.page-header -->
<div class="card">
  <div class="card-body">
    <h5>ADD USER</h5>
    <button class="back" value="Back" onclick="history.back()">Back</button>
    <form>
      <div class="form-group adduserblock">
             <div class="row">
              <div class="col-4">
                <label for="name">Full Name*</label>
                <input type="text" class="form-control" placeholder="Full Name">
              </div>
              <div class="col-4">
                <label for="email">Mail Id*</label>
                <input type="text" class="form-control" placeholder="Email">
              </div>
               <div class="col-4">
                <label for="role">Role*</label>
                  <select class="form-control">
                       <option value="-1">select</option>
                       <option value="1">superadmin</option>
                       <option value="2">admin</option>
                       <option value="3">editor</option>
                       <option value="4">viewer</option>
                 </select>
              </div>
           </div>
         </div>
         <div class="adduserbutton">
           <button class="addcancel"onclick="history.back()"><i class="fas fa-times"></i>Cancel</button>
           <button class="addsave"onclick="history.back()"><i class="fas fa-check"></i>Save</button>
         </div>
    </form>
  </div>
</div>
</div>
@endsection --}}