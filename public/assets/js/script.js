$(document).ready(function(){
    $('.statefinaldelete').click(function(){
        $('.alert-danger').show().fadeOut(3000);
    }) 
    $('.updatestate').click(function(){
        $('.alert-success').show().fadeOut(3000);
    }) 
    $('.userfinaldelete').click(function(){
        $('.alert-danger').show().fadeOut(3000);
    }) 
    $('.updateuser').click(function(){
        $('.alert-success').show().fadeOut(3000);
    }) 
     $('.citiesfinaldelete').click(function(){
      
        $('.alert-danger').show().fadeOut(3000);
    }) 
    $('.updatecities').click(function(){
        $('.alert-success').show().fadeOut(3000);
    }) 
     $('.regionsfinaldelete').click(function(){
        $('.alert-danger').show().fadeOut(3000);
    }) 
    $('.updateregions').click(function(){
        $('.alert-success').show().fadeOut(3000);
    }) 
     $('.clientsfinaldelete').click(function(){
        $('.alert-danger').show().fadeOut(3000);
    }) 
    $('.updateclients').click(function(){
        $('.alert-success').show().fadeOut(3000);
    }) 
      $('.rolesfinaldelete').click(function(){
        $('.alert-danger').show().fadeOut(3000);
    }) 
    $('.updateroles').click(function(){
        $('.alert-success').show().fadeOut(3000);
    }) 
});
function stateFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("stateInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("stateTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function citiesFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("citiesInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("citiesTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function regionsFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("regionsInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("regionsTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function usersFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("usersInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("usersTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function clientsFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("clientsInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("clientsTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function rolesFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("rolesInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("rolesTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
// function openForm() {
//   document.getElementById("myForm").style.display = "block";
//   $(function() {
//       $("#multipleselect").chosen();
//   });
// }

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
function validateEmail(email) {
var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
return re.test(email);
}
(function( $ ){
  var email='';
  var emailCount=0;
  var emailStored= '';
     $.fn.multipleInput = function() {
          return this.each(function() {
               // list of email addresses as unordered list
               $list = $('<ul/>');
               // input
               var $input = $('<input type="email" id="email_search" placeholder="Enter email address" class="email_search multiemail"/>').keyup(function(event) { 
                    if(event.which == 13 || event.which == 32 || event.which == 188) {                        
                         if(event.which==188){
                           var val = $(this).val().slice(0, -1);// remove space/comma from value
                         }
                         else{
                         var val = $(this).val(); // key press is space or comma                        
                         }                         
                         if(validateEmail(val)){
                         // append to list of emails with remove button
                         //Animesh 
                         var storedEmail = document.querySelectorAll('.multipleInput-email span');
                         if(storedEmail.length > 0){
                          storedEmail.forEach(function(emai, i) {
                            if(i== 0 ){
                              emailStored = emai.innerHTML;
                            }else{
                              emailStored += '|' + emai.innerHTML;
                            }
                          });
                          email = emailStored;
                         }
                         // else{
                         //  var emailExixts = $('#clients_email').val();
                         //  if(emailExixts){
                         //    email = emailExixts;
                         //  }else{
                         //    email= '';
                         //  }
                         // }
                          if(email != '' ){
                            email += '|' + val;
                          }else{
                            if(val!= null){
                              emailCount ++;
                              if(emailCount == 1){
                               email = val;
                              }else{
                                 email += '|' + val;
                             }
                            }
                          }
                         console.log(email);
                         
                         $('#clients_email').attr('value', email);
                         // /Animesh
                         $list.append($('<li class="multipleInput-email"><span>' + val + '</span></li>')
                              .append($('<a href="#" class="multipleInput-close" title="Remove"><i class="fas fa-times-circle"></i></a>')
                                   .click(function(e) {
                                        $('#clients_email').val('');
                                        $(this).parent().remove();
                                        var storedEmail = document.querySelectorAll('.multipleInput-email span');
                                        if(storedEmail.length > 0){
                                         storedEmail.forEach(function(emai, i) {
                                           if(i== 0 ){
                                             emailStored = emai.innerHTML;
                                           }else{
                                             emailStored += '|' + emai.innerHTML;
                                           }
                                         });
                                         email = emailStored;
                                         // $('#clients_email').val(email);
                                        }else{
                                          email = '';
                                          emailCount = 0;
                                        }
                                        $('#clients_email').val(email);
                                        e.preventDefault();
                                   })
                              )
                         );
                         $(this).attr('placeholder', '');
                         // empty input
                         $(this).val('');
                          }
                          else{
                            alert('Please enter valid email id, Thanks!');
                          }
                    }
               });
               // container div
               var $container = $('<div class="multipleInput-container" />').click(function() {
                    $input.focus();
               });
               // insert elements into DOM
               $container.append($list).append($input).insertAfter($(this));
               return $(this).hide();
          });
     };
})( jQuery );
$('#recipient_email').multipleInput();
$(document).keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
    }
});



    