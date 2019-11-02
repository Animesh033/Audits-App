<div class="container">
    <div class="page-header">
      {{-- <h1>Clients</h1> --}}
    </div><!-- /.page-header -->
<div class="card">
  <div class="card-body">
    <h5>ADD CLIENT</h5>
    <form method="POST" action="{{ route('clients.update',[$client->id]) }}">
        @csrf
        @method('PUT')
      <div class="form-group">
             <div class="row">
              <div class="col-md-3">
                <label for="name">Client*</label>
                <input type="text" class="form-control" name="clientName" value="{{ $client->name }}" id="clientName" aria-describedby="clientName" placeholder="Enter client name">
              </div>
              <div class="col-md-3">
                <label for="name">Site*</label>
                <input type="text" class="form-control" name="siteName" value="{{ $client->site }}" id="siteName" aria-describedby="siteName" placeholder="Enter site name">
              </div>
              <div class="col-md-3">
                <label for="role">State*</label>
                  <select class="form-control" name="stateName" id="stateNameRegion">
                       {{-- <option value="">Select state </option> --}}
                       @if(isset($states) && count($states) > 0)
                           @foreach($states as $state)
                               <option value="{{ $state->id }}" {{ ($state->id == $client->state_id)  ? 'selected' : ''}}>{{ $state->name }}</option>
                           @endforeach
                       @endif
                 </select>
              </div>              
              <div class="col-md-3">
                <label for="role">City*</label>
                  <select class="form-control" name="cityName" id="cityNameRegion">
                       {{-- <option value="">Select state first</option> --}}
                       @if(isset($cities) && count($cities) > 0)
                           @foreach($cities as $city)
                               <option value="{{ $city->id }}" {{ ($city->id == $client->city_id)  ? 'selected' : ''}}>{{ $city->name }}</option>
                           @endforeach
                       @endif
                 </select>
              </div>
           </div> <br>
          <div class="row"> 
               <div class="col-md-3">
                <label for="role">Regions*</label>
                  <select class="form-control" name="regionName" id="regionName" required="">
                       {{-- <option value="">Select city first</option> --}}
                       @if(isset($region) && count($region) > 0)
                           {{-- @foreach($regions as $region) --}}
                               <option value="{{ $region->id }}" {{-- {{ ($region->id == $client->region_id)  ? 'selected' : ''}} --}}>{{ $region->name }}</option>
                           {{-- @endforeach --}}
                       @endif
                 </select>
              </div>         
             <div class="col-md-3">
               <label for="name">Attendance Cycle*</label>
               <input type="text" class="form-control" name="attendanceCycle" value="{{ $client->attendance_cycle }}" id="attendanceCycle" aria-describedby="attendanceCycle" placeholder="Enter attendance cycle">
             </div>
            <div class="col-md-3">
                <label for="name">Site Incharge*</label>
                <input type="text" class="form-control" name="siteIncharge" value="{{ $client->incharge }}" id="siteIncharge" aria-describedby="siteIncharge" placeholder="Enter site incharge">
            </div>
            <div class="col-md-3">
             <label for="name">Remarks</label>
             <input type="text" class="form-control" name="remarks" value="{{ $client->remarks }}" id="remarks" aria-describedby="remarks" placeholder="Enter remarks name">
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
                           <option value="{{ $editor->id }}" {{ ($editor->id == $client->editor_id)  ? 'selected' : ''}}>{{ $editor->name }}</option>
                       @endforeach
                   @endif
             </select>
          </div>  --}}
          <div class="col-md-12">
             <label for="name">Email Id*</label>
             <input type="email" name="recipient_email" id="recipient_email" class="form-control" autocomplete="off">
             <input type="hidden" name="clients_email" id="clients_email" value="{{ $client->email_id }}" class="form-control"autocomplete="off">
          </div> 
        </div>
      </div>
      <div class="button m-2" style="float: right;">  
        <button type="submit" class="btn btn-primary btn-save-client"><i class="fas fa-check"></i>Update</button>

        {{-- <button class="btn btn-warning"onclick="closeForm()"><i class="fas fa-times"></i>Close</button> --}}
      </div>
    </form>

  </div>
</div>
</div>

@push('admin_scripts')
<script>
  // document.addEventListener("DOMContentLoaded", function(event) { 
    //do work
    document.querySelector('.multipleInput-container ul').innerHTML = '@foreach(explode("|",$client->email_id) as $email)<li class="multipleInput-email"><span>{{ $email }}</span><a href="#" class="multipleInput-close" title="Remove"><i class="fas fa-times-circle"></i></a></li>@endforeach';
  // });

  $(function() {
      console.log( "ready!" );
      $('.multipleInput-close')
       .click(function(e) {
            $('#clients_email').val('');
            $(this).parent().remove();
            var storedEmail = document.querySelectorAll('.multipleInput-email span');
            if(storedEmail.length > 0){
             storedEmail.forEach(function(emai, i) {
               // console.log(i + '=' + emai.innerHTML)
               if(i== 0 ){
                 emailStored = emai.innerHTML;
                 // console.log(i + '=' + email)
               }else{
                 emailStored += '|' + emai.innerHTML;
                 // console.log(i + '=' + email)
               }
             });
             email = emailStored;
             $('#clients_email').val(email);
            }else{
              email = '';
              emailCount = 0;
            }
            e.preventDefault();
       })

  });
    
</script>
@endpush