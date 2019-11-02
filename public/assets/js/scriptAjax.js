$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.form-control-chosen').chosen({
      allow_single_deselect: true,
      width: '100%'
    });

    

    /*=================State=======================*/ 
    $('#addButton').click(function() {
        var btnSave = document.querySelector('.btn-save');
        btnSave.id = 'saveButton';
        $('#addState').attr("placeholder", 'Enter state name');
        $('input[name=stateName]').val('');
        // $('.btn-save').attr('id', 'saveButton');
        $('.button #saveButton').text('Save');
        openForm();
        $('#saveButton').click(function() {
            var input = $('#addState').val();
            if (input == ''){
                alert('Please enter the item');
            }else{
                $.post(
                    '/states', 
                    {'stateName': input, '_token' : $('input[name =_token]').val() 
                }, 
                function(data) {
                    console.log(data);
                    // $('#items').load(location.href + ' #items');
                    if(data.success == true){ // if true (1)
                      setTimeout(function(){// wait for 5 secs(2)
                           location.reload(); // then reload the page.(3)
                      }, 0); 
                   }
                });
            }
        });
    });

    
    $(".deleteState").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
       $( "#deleteButton").click(function() {
        $.ajax(
        {
            url: "/states/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (data){
                console.log("it Works");
                 if(data.success == true){ // if true (1)
                   setTimeout(function(){// wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                   }, 0); 
                }
            }
        });
       });
        
       
    });

    $(".editState").click(function(){
        var id = $(this).data("id");
        var stateName = $(this).val();
        var btnSave = document.querySelector('.btn-save');
        btnSave.id = 'editButton';
        // alert(stateName);
        $('#addState').attr("placeholder", stateName);
        $('input[name=stateName]').val(stateName);
        // $('#saveButton').attr('id', 'editButton');
        $('.button #editButton').text('Update');
        openForm();
        var token = $("meta[name='csrf-token']").attr("content");
       $( "#editButton").click(function() {
        var updatedStateName = $('#addState').val();
        if (updatedStateName == ''){
            alert('Please enter the state name');
        }else{
            $.ajax(
            {
                url: "/states/"+id,
                type: 'PUT',
                data: {
                    "id": id,
                    "stateName": updatedStateName,
                    "_token": token,
                },
                success: function (data){
                    console.log("it Works");
                     if(data.success == true){ // if true (1)
                       setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                       }, 0); 
                    }
                }
            });
        }
       });
        
       
    });
    /*=================City=======================*/ 
    $('#cityAddButton').click(function() {
        var btnSave = document.querySelector('.btn-save-city');
        btnSave.id = 'saveButton';
        $('#addCity').attr("placeholder", 'Enter city name');
        $('input[name=cityName]').val('');
        // $('.btn-save').attr('id', 'saveButton');
        $('.button #saveButton').text('Save');
        openForm();
        $('#saveButton').click(function() {
            var input = $('#addCity').val();
            var cityState = $('#cityState').val();
            if (input == ''){
                alert('Please enter the city');
            }else{
                $.post(
                    '/cities', 
                    {'cityName': input, 'cityState': cityState,'_token' : $('input[name =_token]').val() 
                }, 
                function(data) {
                    console.log(data);
                    // $('#items').load(location.href + ' #items');
                    if(data.success == true){ // if true (1)
                      setTimeout(function(){// wait for 5 secs(2)
                           location.reload(); // then reload the page.(3)
                      }, 0); 
                   }
                });
            }
        });
    });

    $(".deleteCity").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
       $( "#deleteButton").click(function() {
        $.ajax(
        {
            url: "/cities/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (data){
                console.log("it Works");
                 if(data.success == true){ // if true (1)
                   setTimeout(function(){// wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                   }, 0); 
                }
            }
        });
       });
        
       
    });


    $(".editCity").click(function(){
        var id = $(this).data("id");
        var cityName = $(this).val();
        var btnSave = document.querySelector('.btn-save-city');
        btnSave.id = 'editButton';
        // alert(stateName);
        $('#addCity').attr("placeholder", cityName);
        $('input[name=cityName]').val(cityName);
        $('input[name=cityState]').val($('#cityState').val());
        // $('#saveButton').attr('id', 'editButton');
        $('.button #editButton').text('Update');
        openForm();
        var token = $("meta[name='csrf-token']").attr("content");
       $( "#editButton").click(function() {
        var updatedCityName = $('#addCity').val();
        var updatedStateName = $('#cityState').val();
        if (updatedStateName == ''){
            alert('Please enter the city name');
        }else{
            $.ajax(
            {
                url: "/cities/"+id,
                type: 'PUT',
                data: {
                    "id": id,
                    "cityName": updatedCityName,
                    "cityState": updatedStateName,
                    "_token": token,
                },
                success: function (data){
                    console.log(data.cityState);
                     if(data.success == true){ // if true (1)
                       setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                       }, 0); 
                    }
                }
            });
        }
       });
        
       
    });

    /*=================Roles=======================*/ 
    $('#roleAddButton').click(function() {
        var btnSave = document.querySelector('.btn-save-role');
        btnSave.id = 'saveButton';
        $('#addRole').attr("placeholder", 'Enter role name');
        $('input[name=roleName]').val('');
        // $('.btn-save').attr('id', 'saveButton');
        $('.button #saveButton').text('Save');
        openForm();
        $('#saveButton').click(function() {
            var input = $('#addRole').val();
            if (input == ''){
                alert('Please enter the role');
            }else{
                $.post(
                    '/roles', 
                    {'roleName': input, '_token' : $('input[name =_token]').val() 
                }, 
                function(data) {
                    console.log(data);
                    // $('#items').load(location.href + ' #items');
                    if(data.success == true){ // if true (1)
                      setTimeout(function(){// wait for 5 secs(2)
                           location.reload(); // then reload the page.(3)
                      }, 0); 
                   }
                });
            }
        });
    });

    
    $(".deleteRole").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
       $( "#deleteButton").click(function() {
        $.ajax(
        {
            url: "/roles/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (data){
                console.log("it Works");
                 if(data.success == true){ // if true (1)
                   setTimeout(function(){// wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                   }, 0); 
                }
            }
        });
       });
        
       
    });

    $(".editRole").click(function(){
        var id = $(this).data("id");
        var stateRole = $(this).val();
        var btnSave = document.querySelector('.btn-save-role');
        btnSave.id = 'editButton';
        // alert(stateName);
        $('#addRole').attr("placeholder", stateRole);
        $('input[name=roleName]').val(stateRole);
        // $('#saveButton').attr('id', 'editButton');
        $('.button #editButton').text('Update');
        openForm();
        var token = $("meta[name='csrf-token']").attr("content");
       $( "#editButton").click(function() {
        var updatedRoleName = $('#addRole').val();
        if (updatedRoleName == ''){
            alert('Please enter the role name');
        }else{
            $.ajax(
            {
                url: "/roles/"+id,
                type: 'PUT',
                data: {
                    "id": id,
                    "roleName": updatedRoleName,
                    "_token": token,
                },
                success: function (data){
                    console.log("it Works");
                     if(data.success == true){ // if true (1)
                       setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                       }, 0); 
                    }
                }
            });
        }
       });
        
       
    });

    /*=================Regions=======================*/ 
    $('#regionAddButton').click(function() {
            var btnSave = document.querySelector('.btn-save-region');
            btnSave.id = 'saveButton';
            $('#addRegion').attr("placeholder", 'Enter region name');
            $('input[name=regionName]').val('');
            $('#cityNameRegion').prop('selectedIndex',0);
            $('#stateNameRegion').prop('selectedIndex',0);
            // $('.btn-save').attr('id', 'saveButton');
            $('.button #saveButton').text('Save');
            openForm();
            $('#saveButton').click(function() {
                var element = document.querySelector('#region-container');
                var region = $('#addRegion').val();
                var totalStates = element.querySelectorAll('select[name="stateNameRegion"]');
                // console.log(totalStates)
                if (totalStates) {
                    totalStates.forEach(function(state){
                        // console.log(state.id)
                        var e = document.getElementById(state.id);
                        var stateId = e.options[e.selectedIndex].value;
                        // console.log('state id ='+ stateId)

                        var element2 = $('#'+state.id+'_city');
                        // console.log('cities_id ='+element2.val())
                        var citiesId = element2.val();

                        if (region == '' || stateId == '' || citiesId == ''){
                            alert('Please enter the all input field');
                            exit();
                        }else{
                        citiesId.forEach(function(cityId){
                                $.post(
                                    '/regions', 
                                    {
                                        'regionName': region, 
                                        'stateName': stateId,
                                        'cityName': cityId, 
                                        '_token' : $('input[name =_token]').val() 
                                    }, 
                                    function(data) {
                                        console.log(data);
                                        // $('#items').load(location.href + ' #items');
                                        if(data.success == true){ // if true (1)
                                          setTimeout(function(){// wait for 5 secs(2)
                                               location.reload(); // then reload the page.(3)
                                          }, 0); 
                                       }
                                    });
                        });
                    }

                        // console.log('region_name ='+region)
                    });
                }
                // var region = $('#addRegion').val();
                // var cityName = $('#cityNameRegion').val();
                // console.log(cityName)
                // var stateName = $('#stateNameRegion').val();
                // if (region == '' || cityName == '' || stateName == ''){
                //     alert('Please enter the all input field');
                // }else{
                //        cityName.forEach(function(cityName){
                //        $.post(
                //            '/regions', 
                //            {
                //                'regionName': region, 
                //                'stateName': stateName,
                //                'cityName': cityName, 
                //                '_token' : $('input[name =_token]').val() 
                //            }, 
                //            function(data) {
                //                console.log(data);
                //                // $('#items').load(location.href + ' #items');
                //                if(data.success == true){ // if true (1)
                //                  setTimeout(function(){// wait for 5 secs(2)
                //                       location.reload(); // then reload the page.(3)
                //                  }, 0); 
                //               }
                //            });
                //        });
                //    }
            });
        });

    $('#stateName').on('change', function (e) {
        e.preventDefault();
        var stateId = $(this).val();
        $.ajax({
            type: "POST",
            url: '/regions/city',
            data: {'state_id' : stateId},
            success: function( res ) {
                console.log(res.cities)
                if(res.cities.length > 0){
                    var option = '<option value="">Select city</option>';
                    res.cities.forEach(function(city){
                      console.log(city)
                      option += '<option value="'+city.id+'">'+city.name+'</option>';
                    })
                    $('#cityName').html(option);
                }else{
                    $('#cityName').html('<option value="">No city found</option>');
                }
                      // $('.form-control-chosen').trigger("chosen:updated");
            }
        });
    });

    $(".deleteRegion").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
       $( "#deleteButton").click(function() {
        $.ajax(
        {
            url: "/regions/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (data){
                console.log("it Works");
                 if(data.success == true){ // if true (1)
                   setTimeout(function(){// wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                   }, 0); 
                }
            }
        });
       });
        
       
    });


    $(".editRegion").click(function(){
        var id = $(this).data("id");
        var regionName = $(this).val();
        var btnSave = document.querySelector('.btn-save-region');
        btnSave.id = 'editButton';
        // alert(stateName);
        $('#addRegion').attr("placeholder", regionName);
        $('input[name=regionName]').val(regionName);
        // $('#saveButton').attr('id', 'editButton');
        $('.button #editButton').text('Update');
        openForm();
        var token = $("meta[name='csrf-token']").attr("content");
       $( "#editButton").click(function() {
        var region = $('#addRegion').val();
        var cityName = $('#cityNameRegion').val();
        var stateName = $('#stateNameRegion').val();
        if (region == '' || cityName == '' || stateName == ''){
            alert('Please enter the all input field');
        }else{
            $.ajax(
            {
                url: "/regions/"+id,
                type: 'PUT',
                data: {
                    "id": id,
                    "regionName": region,
                    "stateName": stateName,
                    "cityName": cityName,
                    "_token": token,
                },
                success: function (data){
                    console.log("it Works");
                     if(data.success == true){ // if true (1)
                       setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                       }, 0); 
                    }
                }
            });
        }
       });
        
       
    });
    /*=================Users=======================*/ 
    $('#userAddButton').click(function() {
        var btnSave = document.querySelector('.btn-save-user');
        btnSave.id = 'saveButton';
        $('#addUser').attr("placeholder", 'Enter user name');
        $('input[name=name]').val('');
        $('input[name=email]').val('');
        $('input[name=password]').val('');
        $('input[name=roleName]').val('');
        // $('#cityNameRegion').prop('selectedIndex',0);
        // $('#stateNameRegion').prop('selectedIndex',0);
        // $('.btn-save').attr('id', 'saveButton');
        $('.button #saveButton').text('Save');
        openForm();
        $('#saveButton').click(function() {
            var userName = $('#name').val();
            var userEmail = $('#email').val();
            var userPassword = $('#password').val();
            var userRole = $('#roleName').val();
            if (userName == '' || userEmail == '' || userPassword == ''){
                alert('Please enter the all input field');
            }else{
                $.post(
                    '/users', 
                    {
                        'name': userName, 
                        'email': userEmail,
                        'password': userPassword, 
                        'role_id': userRole, 
                        '_token' : $('input[name =_token]').val() 
                    }, 
                    function(data) {
                        console.log(data);
                        // $('#items').load(location.href + ' #items');
                        if(data.success == true){ // if true (1)
                          setTimeout(function(){// wait for 5 secs(2)
                               location.reload(); // then reload the page.(3)
                          }, 0); 
                       }
                    });
            }
        });
    });

    $(".deleteUser").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
       $( "#deleteButton").click(function() {
        $.ajax(
        {
            url: "/users/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (data){
                console.log("it Works");
                 if(data.success == true){ // if true (1)
                   setTimeout(function(){// wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                   }, 0); 
                }
            }
        });
       });
       
    });

    $(".editUser").click(function(){
        var id = $(this).data("id");
        var email = $(this).data("email");
        var userName = $(this).val();
        var btnSave = document.querySelector('.btn-save-user');
        btnSave.id = 'editButton';
        // alert(stateName);
        $('#name').attr("placeholder", userName);
        $('input[name=name]').val(userName);
        $('#email').attr("placeholder", email);
        $('input[name=email]').val(email);
        // $('#saveButton').attr('id', 'editButton');
        $('.button #editButton').text('Update');
        openForm();
        var token = $("meta[name='csrf-token']").attr("content");
       $( "#editButton").click(function() {
        var userName = $('#name').val();
        var userEmail = $('#email').val();
        var userPassword = $('#password').val();
        var userRole = $('#roleName').val();
        if (userName == '' || userEmail == '' || userPassword == ''){
            alert('Please enter the all input field');
        }else{
            $.ajax(
            {
                url: "/users/"+id,
                type: 'PUT',
                data: {
                    "id": id,
                    "name": userName,
                    "email": userEmail,
                    "password": userPassword,
                    "role_id": userRole,
                    "_token": token,
                },
                success: function (data){
                    console.log("it Works");
                     if(data.success == true){ // if true (1)
                       setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                       }, 0); 
                    }
                }
            });
        }
       });
        
       
    });
    /*=================Clients=======================*/ 
    $('#cityName').on('change', function (e) {
        e.preventDefault();
        var cityId = $(this).val();
        var stateId = $('#stateName').val();
        $.ajax({
            type: "POST",
            url: '/regions/region',
            data: {
                'state_id' : stateId,
                'city_id' : cityId,
               },
            success: function( res ) {
                console.log(res.regions)
                if(res.regions.length > 0){
                    // var option = '<option value="">All city</option>';
                    res.regions.forEach(function(region){
                      console.log(region)
                      option = '<option value="'+region.id+'">'+region.name+'</option>';
                    })
                    $('#regionName').html(option);
                }else{
                    $('#regionName').html('<option value="">No region found</option>');
                }    
            }
        });
    });
    $(".deleteClient").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
       $( "#deleteButton").click(function() {
        $.ajax(
        {
            url: "/clients/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (data){
                console.log("it Works");
                 if(data.success == true){ // if true (1)
                   setTimeout(function(){// wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                   }, 0); 
                }
            }
        });
       });
        
       
    });
    
    /*=================Clients=======================*/ 
    
    /*=================Checklists=======================*/ 
    $('#checkListAddButton').click(function() {
        var btnSave = document.querySelector('.btn-save-checklist');
        btnSave.id = 'saveButton';
        $('#particular').attr("placeholder", 'Enter particulars');
        $('input[name=cityName]').val('');
        // $('.btn-save').attr('id', 'saveButton');
        $('.button #saveButton').text('Save');
        openForm();
        $('#saveButton').click(function() {
            var particular = $('#particular').val();
            var detail = $('#detail').val();
            var sites = $('#siteChecklist').val();
console.log(sites);
            if (particular == '' || detail == '' || sites == ''){
                alert('Please enter the input field');
            }else{
                sites.forEach(function(site){
                    $.post(
                        '/checklists', 
                        {'particular': particular, 'detail': detail, 'site': site,'_token' : $('input[name =_token]').val() 
                    }, 
                    function(data) {
                        console.log(data);
                        // $('#items').load(location.href + ' #items');
                        if(data.success == true){ // if true (1)
                          setTimeout(function(){// wait for 5 secs(2)
                               location.reload(); // then reload the page.(3)
                          }, 0); 
                       }
                    });
                });
            }
        });
    });

    /*================= /Checklists=======================*/ 
    /*================= Scheduler=======================*/ 
    $('.form-control-chosen-required').chosen({
      allow_single_deselect: false,
      width: '100%'
    });
    $('#siteSchedule').on('change', function (e) {
        e.preventDefault();
        var siteName = $(this).val();
        alert(siteName)
        $.ajax({
            type: "POST",
            url: '/schedulers/site_details',
            data: {
                'name' : siteName,
               },
            success: function( res ) {
                console.log(res.client.name)
                console.log(res.state.name)
                console.log(res.city.name)
                console.log(res.region.name)
                    $('#clientSchedule').html('<option value="'+res.client.id+'">'+res.client.name+'</option>');
                    $('#stateSchedule').html('<option value="'+res.state.id+'">'+res.state.name+'</option>');
                    $('#citySchedule').html('<option value="'+res.city.id+'">'+res.city.name+'</option>');
                    $('#regionSchedule').html('<option value="'+res.region.id+'">'+res.region.name+'</option>');
                }
        });
    });

    $('#create_schedule').click(function() {
        var siteName = $('#siteSchedule').val();
        var clientId = $('#clientSchedule').val();
        var stateId = $('#stateSchedule').val();
        var cityId = $('#citySchedule').val();
        var regionId = $('#regionSchedule').val();
        var auditDate = $('#auditDate').val();
        // var monthYear = $('#monthYear').val();
        alert(siteName)
        var monthYearVal='';
        var storedMonthYear = document.querySelectorAll('.month-year');
        if(storedMonthYear.length > 0){
         storedMonthYear.forEach(function(monthYear, i) {
            console.log(monthYear.id)
           if(i== 0 ){
             monthYearVal += $('#'+monthYear.id).val();
           }else{
             monthYearVal += '|' + $('#'+monthYear.id).val();
           }
         });
        }
        console.log(monthYearVal)
        if (siteName == '' ||clientId == '' ||stateId == '' ||cityId == '' ||regionId == '' ||auditDate == '' ||monthYearVal == ''){
            alert('Please enter the item');
        }else{
            $.post(
                '/schedulers', 
                {'siteName': siteName,'clientId': clientId,'stateId': stateId,'cityId': cityId,'regionId': regionId,'auditDate': auditDate,'monthYear': monthYearVal, '_token' : $('input[name =_token]').val() 
            }, 
            function(data) {
                // console.log(data.scheduleAudits);
                console.log(data.client_email);
                // $('#items').load(location.href + ' #items');
                if(data.success == true){ // if true (1)
                  setTimeout(function(){// wait for 5 secs(2)
                       location.reload(); // then reload the page.(3)
                  }, 0); 
               }
                
            });
        }
    });

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

    /*================= /Scheduler=======================*/ 
    
});

function openForm() {
  document.getElementById("myForm").style.display = "block";
  $(function() {
      $("#multipleselect").chosen();
  });
}