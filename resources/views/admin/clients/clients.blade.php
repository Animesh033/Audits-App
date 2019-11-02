  <div class="container">
{{--   <form>
     <div class="form-group"> --}}
        <div class="row">
          <div class="col-md-2">
              <select class="form-control" name="stateName" id="stateNameRegion">
                   <option value="">Select state </option>
                   @if(isset($states) && count($states) > 0)
                       @foreach($states as $state)
                           <option value="{{ $state->id }}">{{ $state->name }}</option>
                       @endforeach
                   @endif
             </select>
         </div>
          <div class="col-md-2">
              <select class="form-control" name="cityName" id="cityNameRegion">
                   <option value="">Select state first</option>
             </select>
         </div>
          <div class="col-md-2">
              <select class="form-control" name="regionName" id="regionName">
                   <option value="">Select city first</option>
             </select>
         </div>
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="search clients"id="clientsInput" onkeyup="clientsFunction()" autocomplete="off">
        </div>
        <div class="col-md-12">
          {{-- @include('inc.status.err_success') --}}

          <a href="{{route('clients.create')}}" class="btn btn-sm my-3 grey-btn no-border" id="clientAddButton">Add clients</a>
        </div>
      </div>
{{--     </div>
</form> 
<div class="alert alert-danger" id="deleteerrormsg" style="display: none">
        <button type="button" class="close" data-dismiss="alert"></button>                              
        <span class="h4">Client</span> is deleted successfully
  </div> --}}
<!-- <div class="alert alert-success" id="updatealertmsg">
        <button type="button" class="close" data-dismiss="alert"></button>                              
        <span class="h4">Client</span> is updated successfully
</div> -->

<table class="table state-content" id="stateTable">
  <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Client name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($clients) && count($clients) > 0)
      @php
      $i = 0;
      @endphp
        @foreach($clients as $client)
        @php
        $i++;
        @endphp
        <tr>
          <th scope="row">{{$i}}</th>
          <td>{{$client->name}}</td>
          <td>
            <a class="btn mr-3 btn-warning btn-sm editClient" id="editClient" data-id="{{ $client->id }}" value="{{ $client->name }}" href="{{ route('clients.edit',[$client->id]) }}" ><i class="fas fa-pencil-alt"></i></a>
            <button type="button" class="btn mr-3 btn-danger btn-sm deleteClient"data-toggle="modal" data-target="#deletemodal" value="{{ $client->name }}" id="deleteClient" data-id="{{ $client->id }}"><i class="fa fa-trash"></i> </button>
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
        <h5 class="modal-title" id="deletemodalLabel">Delete the clients</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        These clients will be permanently deleted and cannot be recovered.<br>
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