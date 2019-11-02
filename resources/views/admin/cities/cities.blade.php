<div class="container">
  <div class="row">
      <div class="col-md-12">
          <form>
               <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                       <select class="form-control">
                        <option value="-1">select state</option>
                              @if(isset($states) && count($states) > 0)
                                @foreach($states as $state)
                                   <option value="{{ $state->id }}">{{ $state->name }}</option>
                                 @endforeach
                          @endif
                        </select>
                   </div>
                  <div class="col-md-9">
                      <input type="text" class="form-control" placeholder="search cities"id="citiesInput" onkeyup="citiesFunction()" autocomplete="off">
                  </div>
                </div>
              </div>
          </form> 
      </div>
      <div class="col-md-12">
        @include('inc.status.err_success')
        <button class="btn btn-sm mb-3 grey-btn no-border" id="cityAddButton"onclick="openForm()">Add Cities</button>
      </div>
      <div class="col-md-12">
        <div class="form-popup addcitiescontainer" id="myForm" style="display: none">
            <div class="page-header">
              {{-- <h1>Cities</h1> --}}
            </div><!-- /.page-header -->
        <div class="card">
          <div class="card-body">
            <h5>ADD CITY</h5>
            {{-- <form method="POST" action="{{ route('cities.store') }}"> --}}
              @csrf
              <div class="form-group addcitiesblock">
                     <div class="row">
                      <div class="col-12">
                        <label for="name">City*</label>
                        <input type="text" class="form-control" name="cityName" placeholder="City Name"autocomplete="off" id="addCity">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                       <div class="col-12">
                        <label for="role">State*</label>
                           <select class="form-control" name="cityState" id="cityState">
                            <option>select state</option>
                              @if(isset($states) && count($states) > 0)
                                  @foreach($states as $state)
                                      <option value="{{ $state->id }}">{{ $state->name }}</option>
                                  @endforeach
                              @endif
                            </select>
                      </div>
                   </div>
                 </div>
                 <div class="button m-2" style="float: right;">  
                   <button class="btn btn-primary btn-save-city"><i class="fas fa-check"></i>Save</button>

                   <button class="btn btn-warning"onclick="closeForm()"><i class="fas fa-times"></i>Close</button>
                 </div>

            {{-- </form> --}}
                </div>
        </div>
        </div>
      </div>
  </div>
  
{{-- <div class="alert alert-danger" id="deleteerrormsg"style="display:none">
        <button type="button" class="close" data-dismiss="alert"></button>                              
        <span class="h4">City</span> is deleted successfully
  </div> --}}
{{-- <div class="alert alert-success" id="updatealertmsg">
        <button type="button" class="close" data-dismiss="alert"></button>                              
        <span class="h4">City</span> is updated successfully
</div> --}}
<table class="table cities-content" id="citiesTable">
  <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Cities name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($cities) && count($cities) > 0)
      @php
      $i = 0;
      @endphp
        @foreach($cities as $city)
        @php
        $i++;
        @endphp
    <tr>
      <th scope="row">{{ $i}}</th>
      <td>{{ $city->name }}</td>
      <td>
        <button type="button" class="btn mr-3 btn-warning btn-sm editCity" id="editCity" data-id="{{ $city->id }}" value="{{ $city->name }}" ><i class="fas fa-pencil-alt"></i></button>
        <button type="button" class="btn mr-3 btn-danger btn-sm deleteCity"data-toggle="modal" data-target="#deletemodal" value="{{ $city->name }}" id="deleteCity" data-id="{{ $city->id }}"><i class="fa fa-trash"></i> </button>
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
        <h5 class="modal-title" id="deletemodalLabel">Delete the cities</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        These cities will be permanently deleted and cannot be recovered.<br>
        <i class="fas fa-hand-point-right"></i>Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="deleteButton" data-dismiss="modal">Delete</button>
      </div>
    </div>
  </div>
  
</div>
{{-- <div class="modal fade" id="editmodal" tabindex="-1"role="dialog"aria-labelledby="editmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editmodalLabel">edit the cities</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
           <div>
           <input type="text" class="form-control" placeholder="cities name">
           </div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger updatecities"data-dismiss="modal">Update</button>
      </div>
    </div>
  </div>
  
</div> --}}
</div>