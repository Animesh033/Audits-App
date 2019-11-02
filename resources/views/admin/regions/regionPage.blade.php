@extends('admin.layouts.admin_app')

@section('admins_content')
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Region</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">regions</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="content">
  <div class="container">
    <div class="card" id="myForm" style="display: none;">
      <div class="card-body">
        <div class="form-group">
               <div class="row">
                <div class="col-md-4">
                  <label for="name">Region*</label>
                  <input type="text" class="form-control" name="regionName" placeholder="Region Name" id="addRegion">
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                      <label for="stateNameRegion">State Name</label>
                      <select class="form-control" name="stateNameRegion" id="stateNameRegion">
                        <option value="-1">Select State</option>
                        @if(isset($states) && count($states) > 0)
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        @else
                            <option value="">State not found</option>
                        @endif
                      </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="cityNameRegion">City Name</label>
                      <select class="form-control" name="cityNameRegion" id="cityNameRegion">
                        <option value="-1">Select City</option>
                        @if(isset($cities) && count($cities) > 0)
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        @else
                            <option value="">City not found</option>
                        @endif
                      </select>
                  </div>
                </div>
               {{--  <div class="col-md-2">
                  <button id="addmore">Add More</button></a>
                </div> --}}
              </div>
            </div>
            <div class="button m-2" style="float: right;">  
              <button class="btn btn-primary btn-save-region"><i class="fas fa-check"></i>Save</button>

              <button class="btn btn-warning"onclick="closeForm()"><i class="fas fa-times"></i>Close</button>
            </div>
      </div>
    </div>
    
    <div class="card">
      <div class="card-body">
        <table class="table" id="regionEditPage">
          <thead>
            <tr>
              <th scope="col">S.No.</th>
              <th scope="col">Region name</th>
              <th scope="col">State</th>
              <th scope="col">City</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($regions) && count($regions) > 0)
              @php
              $i = 0;
              @endphp
                @foreach($regions as $region)
                @php
                $i++;
                @endphp
            <tr>
              <th scope="row">{{$i}}</th>
              <td>{{$region->name}}</td>
              <td>{{$region->state->name}}</td>
              <td>{{$region->city->name}}</td>
             {{--  <td>
                <a href="#"><button type="button" class="btn  btn-warning btn-sm editregions"><i class="fas fa-pencil-alt"></i></button></a>
                <button type="button" class="btn btn-danger btn-sm deleteregions"data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i> </button>
              </td> --}}
              <td>
                <button type="button" class="btn mr-3 btn-warning btn-sm editRegion" id="editButton" data-id="{{ $region->id }}" value="{{$region->name}}" ><i class="fas fa-pencil-alt"></i></button>
                <button type="button" class="btn mr-3 btn-danger btn-sm deleteregions"data-toggle="modal" data-target="#deletemodal" value="{{$region->name}}" id="deleteregions" data-id="{{ $region->id }}"><i class="fa fa-trash"></i> </button>
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
                <h5 class="modal-title" id="deletemodalLabel">Delete the regions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                These regions will be permanently deleted and cannot be recovered.<br>
                <i class="fas fa-hand-point-right"></i>Are you sure?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger"id="deleteButton" data-dismiss="modal">Delete</button>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>

@endsection