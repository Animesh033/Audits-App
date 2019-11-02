<div class="container">
  <div class="row">
      <div class="col-md-12">
        <form>
          <div class="form-group">
            <div class="col-md-12 p-0">
      <input type="text" class="form-control" placeholder="Search roles"id="rolesInput" onkeyup="rolesFunction()" autocomplete="off">
            </div>
            <!-- <div class="col-1 p-0">
              <button class="search"><i class="fas fa-search"></i></button>
            </div> -->
          </div>
        </form>
      </div>
      <div class="col-md-12">
        @include('inc.status.err_success')

        <button class="btn btn-sm mb-3 grey-btn no-border" id="roleAddButton">Add States</button>
      </div>
      <div class="col-md-12">
        <div class="form-popup addstatecontainer" id="myForm" style="display: none">
            <div class="page-header">
              {{-- <h1>States</h1> --}}
            </div><!-- /.page-header -->
            <div class="card" id="items">
              <div class="card-body">
                <h5>ADD ROLE</h5>
                      @csrf {{-- It can be placed anywhere --}}
                      <input type="text" class="form-control" name="roleName" placeholder="Role name" id="addRole">
                      <div class="button m-2" style="float: right;">  
                        <button class="btn btn-primary btn-save-role"><i class="fas fa-check"></i>Save</button>

                        <button class="btn btn-warning"onclick="closeForm()"><i class="fas fa-times"></i>Close</button>
                      </div>
               
              </div>
            </div>
        </div>
      </div>
  </div>
  {{-- <div class="alert alert-danger" id="deleteerrormsg"style="display:none">
          <button type="button" class="close" data-dismiss="alert"></button>                              
          <span class="h4">Role</span> is deleted successfully
    </div> --}}
  <table class="table roles-content" id="rolesTable">
    <thead>
      <tr>
        <th scope="col">S.No.</th>
        <th scope="col">Roles name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @if(isset($roles) && count($roles) > 0)
      @php
      $i = 0;
      @endphp
          @foreach($roles as $role)
          @php
          $i++;
          @endphp
      <tr>
        <th scope="row">{{ $i }}</th>
        <td>{{ $role->name }}</td>
        <td>
          <button type="button" class="btn mr-3 btn-warning btn-sm editRole" id="editRole" data-id="{{ $role->id }}" value="{{ $role->name }}" ><i class="fas fa-pencil-alt"></i></button>
          <button type="button" class="btn mr-3 btn-danger btn-sm deleteRole"data-toggle="modal" data-target="#deletemodal" value="{{ $role->name }}" id="deleteRole" data-id="{{ $role->id }}"><i class="fa fa-trash"></i> </button>
          </td>
      </tr>
      @endforeach
      @endif      
    </tbody>
  </table>

  <div class="modal fade" id="deletemodal" tabindex="-1"role="dialog"aria-labelledby="deletemodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deletemodalLabel">Delete the roles</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          These roles will be permanently deleted and cannot be recovered.<br>
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