<div class="container">
	<div class="schedule_button mb-3">
	    <button class="btn btn-primary tablink new_schedule" onclick="openPage('newschedule')" id="defaultOpen">New Schedule</button>
	    <button class="btn btn-secondary tablink audit_details" onclick="openPage('auditdetails')">Audit Details</button>
	</div>
<div id="newschedule" class="tabcontent">
 <div class="card">
   <div class="card-body">
	{{-- <form> --}}
		<div class="form-group">
		<div class="row">
			<div class="col-md-2">
				<label for="site">Site name</label>
				<select class="form-control form-control-chosen-required" name="siteSchedule" id="siteSchedule" data-placeholder="Please select...">
		           <option></option>
		           @if(isset($sites) && count($sites) > 0)
		               @foreach($sites as $site)
		                   <option value="{{ $site->site }}">{{ $site->site }}</option>
		               @endforeach
		           @else
		           		<option value="">Site not found</option>
		           @endif
		         </select>
			</div>
			<div class="col-md-2">
				<label for="client">Client name</label>
				{{-- <select class="form-control" name="clientName" id="clientName">
                   <option value="">Select client </option>
                   @if(isset($clients) && count($clients) > 0)
                       @foreach($clients as $client)
                           <option value="{{ $client->id }}">{{ $client->name }}</option>
                       @endforeach
                   @else
                   		<option value="">Client not found</option>
                   @endif
             </select> --}}
             <select class="form-control" name="clientSchedule" id="clientSchedule" data-placeholder="Please select...">
               <option value="">Select site first </option>
               {{-- @if(isset($clients) && count($clients) > 0)
                   @foreach($clients as $client)
                       <option value="{{ $client->name }}">{{ $client->name }}</option>
                   @endforeach
               @else
               		<option value="">Client not found</option>
               @endif --}}
             </select>
			</div>
			<div class="col-md-2">
				<label for="state">State name</label>
				<select class="form-control" name="stateSchedule" id="stateSchedule">
                   <option value="">Select state </option>
                   @if(isset($states) && count($states) > 0)
                       @foreach($states as $state)
                           <option value="{{ $state->id }}">{{ $state->name }}</option>
                       @endforeach
                   @endif
             </select>
			</div>
			<div class="col-md-2">
				<label for="city">City name</label>
				<select class="form-control" name="citySchedule" id="citySchedule">
                   <option value="">Select state first</option>
             </select>
			</div>
			<div class="col-md-2">
				<label for="region">Region name</label>
				<select class="form-control" name="regionSchedule" id="regionSchedule">
                   <option value="">Select city first</option>
                </select>
			</div>
			
			<div class="col-md-2">
				<label>Date Of Audit</label>
				<div class="input-group-addon date">
				    <input type="text" class="form-control" name="dateAudit" placeholder="Select Date" id="auditDate" autocomplete="off"readonly>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-2">
				<label>Month-year</label>
				<input type="text" name="monthYear" class="form-control input-sm month-year" placeholder="Select Month-Year"autocomplete="off"readonly id="monthYear">
			</div>
			<div class="col-md-1">
				<div class="add_month_year"><span style="cursor:pointer;"><i class="fa fa-plus-circle"></i></span></div>
			</div>
			{{-- <div class="col-md-3">
				<label>Auditor mail id</label>
				<input type="email" class="form-control" placeholder="Type mail id">
			</div> --}}
		</div>
		<div id="add_month_year"></div>
		</div>
		<button class="btn btn-primary ml-auto" type="submit" id="create_schedule">Submit</button>
	{{-- </form> --}}
   </div>
 </div>
 <div class="row">
 	<ul>
 		@if(isset($schedules) && count($schedules) > 0)
 		@foreach($schedules as $schedule)
 		<li>{{ $schedule->site }} : {{ $schedule->audit_date }} </li>
 		@endforeach
 		@endif
 	</ul>
 </div>
 </div>

 <div id="auditdetails" class="tabcontent">
 	<div class="table-responsive">
 	<table class="table scheduler-upload" id="schedulerTable" style="display: none;">
 	  <thead>
 	    <tr>
 	      <th scope="row">S.No.</th>
 	      <th>Particulars</th>
 	      <th>Month 1</th>
 	      <th>Month 2</th>
 	      <th>Month 3</th>
 	    </tr>
 	  </thead>
 	  <tbody>
 	    <tr>
 	      <th scope="row">1</th>
 	      <td>Pf challan</td>
 	      <td><input type="file" name="checklist-upload"></td>
 	      <td><input type="file" name="checklist-upload"></td>
 	      <td><input type="file" name="checklist-upload"></td>
 	    </tr>
 	    <tr>
 	      <th scope="row">2</th>
 	      <td>Professional Tax</td>
 	      <td><input type="file" name="checklist-upload"></td>
 	      <td><input type="file" name="checklist-upload"></td>
 	      <td><input type="file" name="checklist-upload"></td>
 	    </tr>
 	  </tbody>
 	</table>
 	</div>
 	</div>
 </div>
@push('admin_scripts')
<script>
	//add more month-year
	var addButton = document.querySelector('.add_month_year')
	addButton.addEventListener('click', addItem)
	var i=0;
	function addItem(){
		i++;
	    const myNewPara = document.createElement('div') 
	    myNewPara.innerHTML = '<div class="row"><div class="col-md-2"><label>Month-year</label><input type="text" name="monthYear'+i+'" class="form-control input-sm month-year" placeholder="Select Month-Year"readonly id="monthYear'+i+'"></div><div class="col-md-1"><span style="cursor:pointer; padding-top:" class="remove_district"><i class="fa fa-minus-circle"></i></span></div></div>'  
	    document.querySelector('#add_month_year').appendChild(myNewPara)
	    var li = myNewPara.childNodes
	    for (let index = 0; index < li.length; index++) {
	        const minus = li[index].children[1].childNodes
	        minus[0].onclick = () => {//arrow function
	            myNewPara.remove(); 
	            i--;
	            // const hasMinus = document.querySelector('#has_minus')
	            // if (!hasMinus) {
	            //     stateFile.style.display = 'block';
	            // }
	        }    
	    }
	    $('.month-year').datepicker({
	        autoclose: true,
	        minViewMode: 1,
	        format: 'M-yyyy'
	    })
	}

	// For Scheduler
	$("#defaultOpen").click();
	function openPage(pageName) {
	if(pageName == 'auditdetails'){
		$('#defaultOpen').removeClass("btn-primary").addClass("btn-secondary");
		$("#schedulerTable").css("display", "block");
		$(".audit_details").addClass("btn-primary").removeClass("btn-secondary");
	}else{
		$('.audit_details').removeClass("btn-primary").addClass("btn-secondary");
		$('#defaultOpen').removeClass("btn-secondary").addClass("btn-primary");
	}
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
	    tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablink");
	  for (i = 0; i < tablinks.length; i++) {
	    tablinks[i].style.backgroundColor = "";
	  }
	  document.getElementById(pageName).style.display = "block";
	  // elmnt.style.backgroundColor = color;
	}
	
	// Get the element with id="defaultOpen" and click on it
	// document.getElementById("defaultOpen").click();

	//datepicker 
	$(document).ready(function() {
	    $('#auditDate').datepicker({
	      autoclose: true,
	      format: 'dd-M-yyyy'
	    });
	    $('.month-year').datepicker({
	        autoclose: true,
	        minViewMode: 1,
	        format: 'M-yyyy'
	    })


	    // $('#clientSchedule').on('change', function (e) {
	    //     e.preventDefault();
	    //     var clientName = $(this).val();
	    //     alert(clientName)
	    //     $.ajax({
	    //         type: "POST",
	    //         url: '/schedulers/client_states',
	    //         data: {
	    //             'name' : clientName,
	    //            },
	    //         success: function( res ) {
	    //             // console.log(res.clientstate)
	    //             if(res.clientstate.length > 0){
	    //                 var option = '<option value="">Select State</option>';
	    //                 res.clientstate.forEach(function(state){
	    //                   console.log(state.name)
	    //                   option += '<option value="'+state.id+'">'+state.name+'</option>';
	    //                 })
	    //                 $('#stateNameClient').html(option);
	    //             }else{
	    //                 $('#stateNameClient').html('<option value="">No state found</option>');
	    //             }    
	    //         }
	    //     });
	    // });

	    // $('#stateNameClient').on('change', function (e) {
	    //     e.preventDefault();
	    //     var clientName = $('#clientSchedule').val();
	    //     var stateId = $(this).val();
	    //     alert(stateId)
	    //     $.ajax({
	    //         type: "POST",
	    //         url: '/schedulers/client_cities',
	    //         data: {
	    //             'client_name' : clientName,
	    //             'state_id' : stateId,
	    //            },
	    //         success: function( res ) {
	    //             // console.log(res.clientcity)
	    //             if(res.clientcity.length > 0){
	    //                 var option = '<option value="">Select City</option>';
	    //                 res.clientcity.forEach(function(city){
	    //                   console.log(city.name)
	    //                   option += '<option value="'+city.id+'">'+city.name+'</option>';
	    //                 })
	    //                 $('#cityNameClient').html(option);
	    //             }else{
	    //                 $('#cityNameClient').html('<option value="">No city found</option>');
	    //             }    
	    //         }
	    //     });
	    // });

	    // $('#cityNameClient').on('change', function (e) {
	    //     e.preventDefault();
	    //     var clientName = $('#clientSchedule').val();
	    //     var stateId = $('#stateNameClient').val();
	    //     var cityId = $(this).val();
	    //     alert(cityId)
	    //     $.ajax({
	    //         type: "POST",
	    //         url: '/schedulers/client_region',
	    //         data: {
	    //             'client_name' : clientName,
	    //             'state_id' : stateId,
	    //             'city_id' : cityId,
	    //            },
	    //         success: function( res ) {
	    //             console.log(res.clientregion)
	    //             if(res.clientregion != ''){
	    //                 var option = '<option value="'+res.clientregion.id+'">'+res.clientregion.name+'</option>';
	    //                 // res.clientregion.forEach(function(region){
	    //                 //   console.log(region.name)
	    //                 //   option += '<option value="'+region.id+'">'+region.name+'</option>';
	    //                 // })
	    //                 $('#regionNameClient').html(option);
	    //             }else{
	    //                 $('#regionNameClient').html('<option value="">No region found</option>');
	    //             }    
	    //         }
	    //     });
	    // });

	    // $('#create_schedule').click(function() {
	    //     var siteName = $('#site_name').val();
	    //     var clientName = $('#clientSchedule').val();
	    //     var stateId = $('#stateNameClient').val();
	    //     var cityId = $('#cityNameClient').val();
	    //     var regionId = $('#regionNameClient').val();
	    //     var auditDate = $('#js-date').val();
	    //     // var monthYear = $('#monthYear').val();
	    //     alert(auditDate)
	    //     var storedMonthYear = document.querySelectorAll('.month-year');
	    //     if(storedMonthYear.length > 0){
	    //      storedMonthYear.forEach(function(monthYear, i) {
	    //         console.log(monthYear)
	    //        if(i== 0 ){
	    //          monthYear = monthYear.value;
	    //        }else{
	    //          monthYear += '|' + monthYear.value;
	    //        }
	    //      });
	    //      monthYear2 = monthYear;
	    //     }
	    //     alert(monthYear2)
	    //     if (siteName == '' ||clientName == '' ||stateId == '' ||cityId == '' ||regionId == '' ||auditDate == '' ||monthYear2 == ''){
	    //         alert('Please enter the item');
	    //     }else{
	    //         $.post(
	    //             '/states', 
	    //             {'stateName': input, '_token' : $('input[name =_token]').val() 
	    //         }, 
	    //         function(data) {
	    //             console.log(data);
	    //             // $('#items').load(location.href + ' #items');
	    //             if(data.success == true){ // if true (1)
	    //               setTimeout(function(){// wait for 5 secs(2)
	    //                    location.reload(); // then reload the page.(3)
	    //               }, 0); 
	    //            }
	    //         });
	    //     }
	    // });
	});
</script>

@endpush

