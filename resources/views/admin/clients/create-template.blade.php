<div class="container">
    <div class="page-header">
      {{-- <h1>Clients</h1> --}}
    </div><!-- /.page-header -->
<div class="card">
  <div class="card-body">
    <h5>ADD CLIENT</h5>
    <form method="POST" action="{{ route('clients.store') }}">
        @csrf
      <div class="form-group">
             <div class="row">
              <div class="col-md-3">
                <label for="name">Client*</label>
                <input type="text" class="form-control" name="clientName" id="clientName" aria-describedby="clientName" placeholder="Enter client name">
              </div>
              <div class="col-md-3">
                <label for="name">Site*</label>
                <input type="text" class="form-control" name="siteName" id="siteName" aria-describedby="siteName" placeholder="Enter site name">
              </div>
              <div class="col-md-3">
                <label for="role">State*</label>
                  <select class="form-control" name="stateName" id="stateName">
                       <option value="">Select state </option>
                       @if(isset($states) && count($states) > 0)
                           @foreach($states as $state)
                               <option value="{{ $state->id }}">{{ $state->name }}</option>
                           @endforeach
                       @endif
                 </select>
              </div>              
              <div class="col-md-3">
                <label for="role">City*</label>
                  <select class="form-control" name="cityName" id="cityName">
                       <option value="">Select state first</option>
                 </select>
              </div>
           </div>
          <div class="row"> 
               <div class="col-md-3">
                <label for="role">Regions*</label>
                  <select class="form-control" name="regionName" id="regionName">
                       <option value="">Select city first</option>
                 </select>
              </div>         
             <div class="col-md-3">
               <label for="name">Attendance Cycle*</label>
               <input type="text" class="form-control" name="attendanceCycle" id="attendanceCycle" aria-describedby="attendanceCycle" placeholder="Enter attendance cycle">
             </div>
            <div class="col-md-3">
                <label for="name">Site Incharge*</label>
                <input type="text" class="form-control" name="siteIncharge" id="siteIncharge" aria-describedby="siteIncharge" placeholder="Enter site incharge">
            </div>
            <div class="col-md-3">
             <label for="name">Remarks</label>
             <input type="text" class="form-control" name="remarks" id="remarks" aria-describedby="remarks" placeholder="Enter remarks name">
            </div>
        </div>
        <br>
        <div class="row">
          {{-- <div class="col-md-3">
            <label for="role">Editor*</label>
              <select class="form-control" name="editor" id="editor">
                   <option value="">Select editor </option>
                   @if(isset($editors) && count($editors) > 0)
                       @foreach($editors as $editor)
                           <option value="{{ $editor->id }}">{{ $editor->name }}</option>
                       @endforeach
                   @endif
             </select>
          </div>  --}}
          <div class="col-md-12">
             <label for="name">Email Id*</label>
             <input type="email" name="recipient_email" id="recipient_email" class="form-control"autocomplete="off">
             <input type="hidden" name="clients_email" id="clients_email" value="" class="form-control"autocomplete="off">
          </div> 

        </div>
        <div class="button m-2" style="float: right;">  
          <button type="submit" class="btn btn-primary btn-save-client"><i class="fas fa-check"></i>Save</button>

          {{-- <button class="btn btn-warning"onclick="closeForm()"><i class="fas fa-times"></i>Close</button> --}}
        </div>
      </div>
      
    </form>

  </div>
</div>
</div>
