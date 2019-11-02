<div class="container">
{{--   <form>
       <div class="form-group checklist-box"> --}}
          <div class="row">
            <div class="col-md-2">
               <select class="form-control">
                  <option value="-1">Select region</option>
                  <option value="1">region 1</option>
                  <option value="2">region 2</option>
                  <option value="3">region 3</option>
              </select>
           </div>
          <div class="col-md-10">
              <input type="text" class="form-control" placeholder="search checklist"id="checklistInput" onkeyup="checklistFunction()" autocomplete="off">
          </div>
           <div class="col-md-12">
              <button class="btn btn-sm my-3" id="checkListAddButton">Add Checklist</button>
          </div>
        </div>
{{--       </div>
  </form>   --}}
  <div class="form-popup addchecklistcontainer" id="myForm" style="display: none">
      <div class="page-header">
        {{-- <h1>Checklist</h1> --}}
      </div><!-- /.page-header -->
  <div class="card">
    <div class="card-body">
      <h5>ADD CHECKLIST</h5>
      {{-- <a href="{{route('checklists.index')}}"value="Back"><button class="btn btn-sm back">Back</button></a> --}}
      {{-- <form> --}}
        <div class="form-group addchecklistblock">
              <div class="row">
                <div class="col-md-4">
                  <label for="name">Particulars*</label>
                  <input type="text" class="form-control" name="particular" placeholder="Checklist Name" id="particular">
                </div>
                 <div class="col-md-4">
                  <label for="name">Details</label>
                  <input type="text" class="form-control" name="detail" placeholder="Details" id="detail">
                </div>
                 <div class="col-md-4">
                  <label for="role">Sites*</label>
                    <select class="form-control form-control-chosen-optgroup" title="siteChecklist" name="siteChecklist[]" id="siteChecklist" data-placeholder="Please select..." multiple>
                      {{-- <option value="-1">Select City</option> --}}
                      @if(isset($sites) && count($sites) > 0)
                        <optgroup label="All Cities">
                          @foreach($sites as $site)
                              <option value="{{ $site->site }}">{{ $site->site }}</option>
                          @endforeach
                        </optgroup>
                      @else
                          <option value="">Site not found</option>
                      @endif
                    </select>
                </div>
              </div>
             
           </div>
      <div class="button m-2" style="float: right;">  
        <button class="btn btn-primary btn-save-checklist"><i class="fas fa-check"></i>Save</button>

        <button class="btn btn-warning" onclick="closeForm()"><i class="fas fa-times"></i>Close</button>
      </div>
      {{-- </form> --}}
   
    </div>
  </div>
  </div>

  <div class="table-responsive">
  <table class="table checklist-content" id="checklistTable">
    <thead>
      <tr>
        <th scope="col">S.No.</th>
        <th scope="col">Particulars</th>
        <th scope="col">Details</th>
        <th scope="col">Site Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @if(isset($checklists) && count($checklists) > 0)
        @php
        $i = 0;
        @endphp
          @foreach($checklists as $checklist)
          @php
          $i++;
          @endphp
          <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$checklist->particulars}}</td>
            <td>{{$checklist->details}}</td>
            <td>{{$checklist->site_name}}</td>
            <td>
              <button type="button" class="btn mr-3 btn-warning btn-sm editCheckList" id="editCheckList" data-id="{{ $checklist->id }}" value="{{ $checklist->name }}" ><i class="fas fa-pencil-alt"></i></button>
              <button type="button" class="btn mr-3 btn-danger btn-sm deleteCheckList"data-toggle="modal" data-target="#deletemodal" value="{{ $checklist->name }}" id="deleteCheckList" data-id="{{ $checklist->id }}"><i class="fa fa-trash"></i> </button>
              </td>
          </tr>
      @endforeach
      @endif
    </tbody>
  </table>
  </div>
</div>

    
   
{{-- <div class="alert alert-danger" id="deleteerrormsg" style="display: none;">
        <button type="button" class="close" data-dismiss="alert"></button>                              
        <span class="h4">Checklist</span> is deleted successfully
  </div> --}}
<!-- <div class="alert alert-success" id="updatealertmsg">
        <button type="button" class="close" data-dismiss="alert"></button>                              
        <span class="h4">Checklist</span> is updated successfully
</div> -->

   
   <div class="modal fade" id="deletemodal" tabindex="-1"role="dialog"aria-labelledby="deletemodalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="deletemodalLabel">Delete the checklist</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           These checklist will be permanently deleted and cannot be recovered.<br>
           <i class="far fa-hand-point-right"></i>Are you sure?
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
           <button type="button" class="btn btn-danger" id="deleteButton" data-dismiss="modal">Delete</button>
         </div>
       </div>
     </div>
     
   </div>


   @push('admin_scripts')
       <script>
         // document.addEventListener("DOMContentLoaded", function(event) { 
           // For Select All 
           $('.form-control-chosen-optgroup').chosen({
             width: '100%'
           });

           $(function() {
             $('[title="siteChecklist"]').addClass('chosen-container-optgroup-clickable');
           });
           $(document).on('click', '[title="siteChecklist"] .group-result', function() {
             var unselected = $(this).nextUntil('.group-result').not('.result-selected');
             if(unselected.length) {
               unselected.trigger('mouseup');
             } else {
               $(this).nextUntil('.group-result').each(function() {
                 $('a.search-choice-close[data-option-array-index="' + $(this).data('option-array-index') + '"]').trigger('click');
               });
             }
           });

           // /Select All

         
    // }); 
   </script>
   @endpush