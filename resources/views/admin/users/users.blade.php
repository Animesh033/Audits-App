<div class="container">
        <div class="row">
          <div class="col-md-4">
             <select class="form-control">
                <option value="1">Name</option>
                <option value="2" selected="selected">Email</option>
                <option value="3">Role</option>
            </select>
         </div>
        <div class="col-md-8">

            <div class="form-group">
            	<input type="text" class="form-control" placeholder="Search user"id="usersInput" onkeyup="usersFunction()" autocomplete="off">
            </div>
        </div>
      	 <div class="col-md-12">
	        @include('inc.status.err_success')

	        <button class="btn btn-sm mb-3 grey-btn no-border" id="userAddButton">Add Users</button>
	      </div>
      </div>
	
	      	 
   <div class="form-popup adduserscontainer" id="myForm" style="display: none">
      <div class="page-header">
        {{-- <h1>Users</h1> --}}
      </div><!-- /.page-header -->
  <div class="card">
    <div class="card-body">
      <h5>ADD USER</h5>
      {{-- <form method="POST" action="{{ route('users.store') }}"> --}}
      	@csrf
        <div class="form-group adduserblock">
               <div class="row">
                   <div class="col-md-3">
                       <div class="form-group">
                           <label for="name" class="">{{ __('Name') }}</label>
                           <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter name">

                           @if ($errors->has('name'))
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $errors->first('name') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group">
                           <label for="email" class="">{{ __('E-Mail Address') }}</label>
                           <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Enter email address">

                           @if ($errors->has('email'))
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $errors->first('email') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group">
                           <label for="password" class="">{{ __('Password') }}</label>
                           <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Enter password">

                           @if ($errors->has('password'))
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $errors->first('password') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group">
                           <label for="role" class="">{{ __('Role') }}</label>
                           <select class="form-control" name="roleName" id="roleName">
                             @if(isset($roles) && count($roles) > 0)
                                 @foreach($roles as $role)
                                     <option value="{{ $role->id }}">{{ $role->name }}</option>
                                 @endforeach
                             @endif
                           </select>
                       </div>
                   </div>
               </div>
           </div>
          
      {{-- </form> --}}
      	 <div class="button m-2" style="float: right;">  
      	   <button class="btn btn-primary btn-save-user"><i class="fas fa-check"></i>Save</button>

      	   <button class="btn btn-warning"onclick="closeForm()"><i class="fas fa-times"></i>Close</button>
      	 </div>
    </div>
  </div>
  </div>
  {{-- <div class="alert alert-danger" id="deleteerrormsg" style="display: none">
          <button type="button" class="close" data-dismiss="alert"></button>                              
          <span class="h4">User</span> is deleted successfully
    </div> --}}
  <div class="table-responsive">
    <table class="table user-content" id="usersTable">
      <thead>
        <tr>
          <th scope="col">S.No.</th>
          <th scope="col">User name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if(isset($users) && count($users) > 0)
          @php
          $i = 0;
          @endphp
            @foreach($users as $user)
            @php
            $i++;
            $roleName = $user->roles()->get();
            // dd($roleName);
            @endphp
            <tr>
              <th scope="row">{{$i}}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$roleName[0]->name}}</td>
              <td>
                <button type="button" class="btn mr-3 btn-warning btn-sm editUser" id="editUser" data-email="{{ $user->email }}" data-id="{{ $user->id }}" value="{{ $user->name }}" ><i class="fas fa-pencil-alt"></i></button>
                <button type="button" class="btn mr-3 btn-danger btn-sm deleteUser"data-toggle="modal" data-target="#deletemodal" value="{{ $user->name }}" id="deleteUser" data-id="{{ $user->id }}"><i class="fa fa-trash"></i> </button>
                </td>
            </tr>
        @endforeach
        @endif
      </tbody>
    </table>
  </div>
 

  <div class="modal fade" id="deletemodal" tabindex="-1"role="dialog"aria-labelledby="deletemodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deletemodalLabel">Delete users</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          These users will be permanently deleted and cannot be recovered.<br>
          <i class="fas fa-hand-point-right"></i>Are you sure?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" id="deleteButton" data-dismiss="modal">Delete</button>
        </div>
      </div>
    </div>
  </div>
	</div>
	 