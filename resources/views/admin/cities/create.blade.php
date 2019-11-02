{{-- @extends('admin.layouts.admin_app')

@section('admins_content')
<div class="container addcitiescontainer">
      <div class="page-header">
        <h1>Cities</h1>
      </div><!-- /.page-header -->
  <div class="card">
    <div class="card-body">
      <h5>ADD CITY</h5>
      <button class="back" value="Back" onclick="history.back()">Back</button>
      <form method="POST" action="{{ route('cities.store') }}">
        @csrf
        <div class="form-group addcitiesblock">
               <div class="row">
                <div class="col-12">
                  <label for="name">City*</label>
                  <input type="text" class="form-control" name="cityName" placeholder="City Name"autocomplete="off">
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
           <div class="addcitiesbutton">
              <button class="addcancel"onclick="history.back()"><i class="fas fa-times"></i>Cancel</button>
              <button type="submit" class="addsave"onclick="history.back()"><i class="fas fa-check"></i>Save</button>
          </div>

      </form>
          </div>
  </div>
  </div>

@endsection --}}