<div class="container">
  <div class="row">
      <div class="col-md-12">
        <form>
          <div class="form-group">
            <div class="col-md-12 p-0">
            <input type="text" class="form-control" placeholder="Search state"id="stateInput" onkeyup="stateFunction()" autocomplete="off">
            </div>
            <!-- <div class="col-1 p-0">
              <button class="search"><i class="fas fa-search"></i></button>
            </div> -->
          </div>
        </form>
      </div>
      <div class="col-md-12">
        @include('inc.status.err_success')

        <button class="btn btn-sm mb-3 grey-btn no-border" id="addButton">Add States</button>
      </div>
      <div class="col-md-12">
        <div class="form-popup addstatecontainer" id="myForm" style="display: none">
            <div class="page-header">
              {{-- <h1>States</h1> --}}
            </div><!-- /.page-header -->
            <div class="card" id="items">
              <div class="card-body">
                <h5>ADD STATE</h5>
                      @csrf {{-- It can be placed anywhere --}}
                      <input type="text" class="form-control" name="stateName" placeholder="State name" id="addState">
                      <div class="button m-2" style="float: right;">  
                        <button class="btn btn-primary btn-save"><i class="fas fa-check"></i>Save</button>

                        <button class="btn btn-warning"onclick="closeForm()"><i class="fas fa-times"></i>Close</button>
                      </div>
               
              </div>
            </div>
        </div>
      </div>
  </div>
  
  {{-- 
  <div class="alert alert-danger" id="deleteerrormsg"style="display:none">
          <button type="button" class="close" data-dismiss="alert"></button>                              
          <span class="h4">State</span> is deleted successfully
    </div> --}}
  {{-- <div class="alert alert-success" id="updatealertmsg">
          <button type="button" class="close" data-dismiss="alert"></button>                              
          <span class="h4">State</span> is updated successfully
  </div> --}}
  <table class="table state-content" id="stateTable">
    <thead>
      <tr>
        <th scope="col">S.No.</th>
        <th scope="col">State name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @if(isset($states) && count($states) > 0)
        @php
        $i = 0;
        @endphp
          @foreach($states as $state)
          @php
          $i++;
          @endphp
          <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$state->name}}</td>
            <td>
              <button type="button" class="btn mr-3 btn-warning btn-sm editState" id="editState" data-id="{{ $state->id }}" value="{{ $state->name }}" ><i class="fas fa-pencil-alt"></i></button>
              <button type="button" class="btn mr-3 btn-danger btn-sm deleteState"data-toggle="modal" data-target="#deletemodal" value="{{ $state->name }}" id="deleteState" data-id="{{ $state->id }}"><i class="fa fa-trash"></i> </button>
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
          <h5 class="modal-title" id="deletemodalLabel">Delete the states</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          These states will be permanently deleted and cannot be recovered.<br>
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