<div class="container" id="region-container">
  <div class="row">
      <div class="col-md-12">
          {{-- <form> --}}
                  <div class="form-group regions-box">
                     <div class="row">
                       <div class="col-md-4">
                          <select class="form-control" name="stateName" id="stateName2">
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
                       <div class="col-md-4">
                          <select class="form-control" name="cityName" id="cityName2">
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
                     <div class="col-md-4">
                         <input type="text" class="form-control" placeholder="search regions" id="regionsInput" onkeyup="regionsFunction()" autocomplete="off">
                     </div>
                   </div>
                 </div>
             {{-- </form>  --}}
      </div>
      <div class="col-md-12">
        {{-- @include('inc.status.err_success') --}}

        <button class="btn btn-sm mb-3 grey-btn no-border" id="regionAddButton">Add Region</button>
      </div>
      <div class="col-md-12">
         <div class="form-popup addregionscontainer" id="myForm" style="display: none">
            <div class="page-header">
              {{-- <h1>Regions</h1> --}}
            </div><!-- /.page-header -->
        <div class="card">
          <div class="card-body">
            {{-- <form> --}}
              <h5>ADD REGION</h5>
                    @csrf
              <div class="form-group">
                     <div class="row">
                      <div class="col-md-3">
                        <label for="name">Region*</label>
                        <input type="text" class="form-control" name="regionName" placeholder="Region Name" id="addRegion">
                      </div>
                       <div class="col-md-4" id="morestate">
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
                      <div class="col-md-3"id="morecity">
                        <div class="form-group">
                            <label for="cityNameRegion">City Name</label>
                            <select class="form-control form-control-chosen-optgroup" title="regionCity" name="cityNameRegion[]" id="stateNameRegion_city" data-placeholder="Please select..." multiple>
                              {{-- <option value="-1">Select City</option> --}}
                              @if(isset($cities) && count($cities) > 0)
                                <optgroup label="All Cities">
                                  @foreach($cities as $city)
                                      <option value="{{ $city->id }}">{{ $city->name }}</option>
                                  @endforeach
                                </optgroup>
                              @else
                                  <option value="">City not found</option>
                              @endif
                            </select>
                        </div>
                      </div>
                     {{--  <div class="col-md-2">
                        <button id="addmore">Add More</button></a>
                      </div> --}}
                        <div class="col-md-2">
                         <div class="add_state_city"><span style="cursor:pointer;"><i class="fa fa-plus-circle"></i></span></div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div id="add_state_city"></div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- <div class="field_wrapper">
            <div>
                <input type="text" name="field_name[]" value=""/>
                <input type="text" name="field_name[]" value=""/>
                <a href="javascript:void(0);" class="add_button" title="Add field"><img src="add-icon.png"/></a>
            </div>
        </div> -->
            {{-- </form> --}}
            <div class="button m-2" style="float: right;">  
              <button class="btn btn-primary btn-save-region"><i class="fas fa-check"></i>Save</button>

              <button class="btn btn-warning"onclick="closeForm()"><i class="fas fa-times"></i>Close</button>
            </div>
          </div>
        </div>
        </div>
      </div>
  </div>



      
            
           <div class="alert alert-danger" id="deleteerrormsg"style="display:none">
                   <button type="button" class="close" data-dismiss="alert"></button>                              
                   <span class="h4">Region</span> is deleted successfully
             </div>
           <table class="table state-content" id="regionsTable">
             <thead>
               <tr>
                 <th scope="col">S.No.</th>
                 <th scope="col">Region name</th>
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
                     @php
                    $regionName = trim($region->name," ");
                     @endphp
                     <td><a href="{{ route('single.region', [$region->name]) }}">{{$region->name}}</a></td>
                     <td>
                       {{-- <button type="button" class="btn mr-3 btn-warning btn-sm editRegion" id="editRegion" data-id="{{ $region->id }}" value="{{ $region->name }}" ><i class="fas fa-pencil-alt"></i></button>
                       <button type="button" class="btn mr-3 btn-danger btn-sm deleteRegion"data-toggle="modal" data-target="#deletemodal" value="{{ $region->name }}" id="deleteRegion" data-id="{{ $region->id }}"><i class="fa fa-trash"></i> </button> --}}
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


@push('admin_scripts')
    <script>
      // document.addEventListener("DOMContentLoaded", function(event) { 
        // For Select All 
        $('.form-control-chosen-optgroup').chosen({
          width: '100%'
        });

        $(function() {
          $('[title="regionCity"]').addClass('chosen-container-optgroup-clickable');
        });
        $(document).on('click', '[title="regionCity"] .group-result', function() {
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

        $('#stateNameRegion').on('change', function (e) {
            e.preventDefault();
            var stateId = $(this).val();
            $.ajax({
                type: "POST",
                url: '/regions/city',
                data: {'state_id' : stateId},
                success: function( res ) {
                    console.log(res.cities)
                    if(res.cities.length > 0){
                        var option = '';
                        res.cities.forEach(function(city){
                          console.log(city)
                          option += '<option value="'+city.id+'">'+city.name+'</option>';
                        })
                        $('#stateNameRegion_city').html('<optgroup label="All Cities">'+option+'</optgroup>');
                    }else{
                        $('#stateNameRegion_city').html('<option value="">No city found</option>');
                    }
                    // $('.form-control-chosen').trigger("chosen:updated");
                    $('.form-control-chosen-optgroup').trigger("chosen:updated");
                }
            });
        });

  //add more state-city
  var count = 0;
  var addButton1 = document.querySelector('.add_state_city')
  addButton1.addEventListener('click', addnewItem)
  function addnewItem(){
    count++;
    // alert(count);
      const myNewPara1 = document.createElement('div')
      // myNewPara1.setAttribute('class', 'has_minus')
      myNewPara1.innerHTML = '<div class="row"><div class="col-md-4 offset-md-3" id="morestate"> <div class="form-group"> <label for="stateNameRegion">State Name</label> <select class="form-control" name="stateNameRegion" id="stateNameRegion'+count+'"> <option value="-1">Select State</option> @if(isset($states) && count($states) > 0) @foreach($states as $state) <option value="{{ $state->id }}">{{ $state->name }}</option> @endforeach @else <option value="">State not found</option> @endif </select> </div> </div> <div class="col-md-3"id="morecity"> <div class="form-group"> <label for="cityNameRegion">City Name</label> <select class="form-control form-control-chosen-optgroup" title="regionCity" name="cityNameRegion[]" id="stateNameRegion'+count+'_city" data-placeholder="Please select..." multiple> @if(isset($cities) && count($cities) > 0) <optgroup label="All Cities"> @foreach($cities as $city) <option value="{{ $city->id }}">{{ $city->name }}</option> @endforeach </optgroup> @else <option value="">City not found</option> @endif </select> </div> </div><div class="col-md-1"><span style="cursor:pointer; padding-top:" class="remove_district"><i class="fa fa-minus-circle"></i></span></div></div>'; 
      document.querySelector('#add_state_city').appendChild(myNewPara1)
      var li = myNewPara1.childNodes
      for (let index = 0; index < li.length; index++) {
          const minus = li[index].children[2].childNodes
          minus[0].onclick = () => {//arrow function
              myNewPara1.remove(); 
              count--;
              // const hasMinus = document.querySelector('#has_minus')
              // if (!hasMinus) {
              //     stateFile.style.display = 'block';
              // }
          }    
      }

      $('.form-control-chosen-optgroup').chosen({
        width: '100%'
      });
      callAjax(count)
  }
  function callAjax(i){
    // for (var i = 1; i <= count; i++) {
      $('#stateNameRegion'+i).on('change', function (e) {
                e.preventDefault();
                var stateId = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '/regions/city',
                    data: {'state_id' : stateId},
                    success: function( res ) {
                        console.log(res.cities)
                        if(res.cities.length > 0){
                            var option = '';
                            res.cities.forEach(function(city){
                              option += '<option value="'+city.id+'">'+city.name+'</option>';
                            })
                            $('#stateNameRegion'+i+'_city').html('<optgroup label="All Cities">'+option+'</optgroup>');
                        }else{
                            $('#stateNameRegion'+i+'_city').html('<option value="">No city found</option>');
                        }
                      // $('.form-control-chosen').trigger("chosen:updated");
                      $('.form-control-chosen-optgroup').trigger("chosen:updated");
                    }
                });
            });
    // }
  }

 // }); 
</script>
@endpush