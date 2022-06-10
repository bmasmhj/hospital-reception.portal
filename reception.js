function cancelit(id){
    $.ajax({
    url: "controller/update.php",
    method: 'POST',
    data:{'cancelapp':id},
    success:function(data){
        document.getElementById('appointmenttable_'+id).innerHTML = data;

    }
}); 
}
function closemodel(){
    document.getElementById('preview').style.display = 'none';
}
function acceptit(id){
    $.ajax({
    url: "controller/update.php",
    method: 'POST',
    data:{'aceptapp':id},
    success:function(data){
        document.getElementById('appointmenttable_'+id).innerHTML = data;

    }
}); 

}
function viewappointment(id){
    $.ajax({
    url: "modelview.php",
    method: 'POST',
    data:{'viewapoint':id},
    success:function(data){
        document.getElementById('preview').innerHTML = data;
        document.getElementById('preview').style.display = 'block';
    }
}); 

}

function closemodel(){
    document.getElementById('preview').style.display = 'none';
    document.getElementById('editrecordform').style.display = 'none';
}



function viewhealthpkg(id){
    $.ajax({
    url: "modelview.php",
    method: 'POST',
    data:{'viewhealth':id},
    success:function(data){
        document.getElementById('preview').innerHTML = data;
        document.getElementById('preview').style.display = 'block';
    }
}); 

}

function removemedicalreport(id){
    $.ajax({
      url: "controller/deleter.php",
      method: 'POST',
      data:{'deleterecords':id},
      success:function(data){
      document.getElementById('row_'+id).style.display = 'none';   
      }
  }); 
}

function viewimg(id){
    var image = document.getElementById('imagesrc_'+id).src;
    document.getElementById('preview').style.display = 'block';
    document.getElementById('medicalreportimage').innerHTML = '<img id="reportimage" src = "'+image+'">';

}

function deleteuser(id){
    var name = $('#name_'+id).text();
   Swal.fire({
       title: 'Are you sure user '+name+' ?',
       text: "You won't be able to revert this!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Yes, delete it!'
     }).then((result) => {
       if (result.isConfirmed) {
         jQuery.ajax({
         url:'controller/deleter.php',
         type:'post',
         data:'deleteuser='+id,
         success:function(datas){
           var results = $.trim(datas);
 
           if(results == 'deleted'){
             Swal.fire(
               'Deleted!',
               'User '+name+' has been deleted.',
               'success'
             )
             jQuery('#tr_'+id).hide(500);
 
           }else{  
             alert('no'+datas);
           }
         } 
     });      
       }
     })
 }



 function deletedoctor(id){
    var name = $('#name_'+id).text();
   Swal.fire({
       title: 'Are you sure user '+name+' ?',
       text: "You won't be able to revert this!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Yes, delete it!'
     }).then((result) => {
       if (result.isConfirmed) {
         jQuery.ajax({
         url:'controller/deleter.php',
         type:'post',
         data:'deletedoctor='+id,
         success:function(datas){
           var results = $.trim(datas);
 
           if(results == 'deleted'){
             Swal.fire(
               'Deleted!',
               'User '+name+' has been deleted.',
               'success'
             )
             jQuery('#tr_'+id).hide(500);
 
           }else{  
             alert('no'+datas);
           }
         } 
     });
 
 
       
       }
     })
 
     
 
 }

 function addreportform(){
  document.getElementById('reportformmodal').style.display = 'block';

}
function closeform(){
document.getElementById('reportformmodal').style.display = 'none';
}

function editrecords(id){

  var name = $('#patienname_'+id).text();
  var checkupfor = $('#nameofrecord_'+id).text();
  var details = $('#detail_'+id).text();
  var message = $('#messange_'+id).text();
  var image = document.getElementById('imagesrc_'+id).alt;

  document.getElementById('editrecordform').style.display = 'block';
  document.getElementById('patientnames').value = name;
  document.getElementById('checkupfors').value = checkupfor;
  document.getElementById('reportdetailss').value = details;
  document.getElementById('reportmessages').value = message;
  document.getElementById('imageurl').value = image;
  document.getElementById('id').value = id;

}


$(document).ready(function(e) {
$('#patientreportform').on('submit', function(e) {
    e.preventDefault();
    var patientname = $('#patientname').val();
    var checkupfor = $('#checkupfor').val();
    var reportdetails = $('#reportdetails').val();
    var reportmessage = $('#reportmessage').val();
    

    if( checkupfor!="" && patientname != "" && reportdetails  != ""  && reportdetails != "" ){
            $('#alert').html('Saving records');
            setTimeout(() => {
              $.ajax({
                    url: "controller/add.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success:function(response){
                        var result = $.trim(response);

                        if(result == 'failed'){
                            $('#alert').html('Failed while Saving data!');
                        }
                        if(result == 'success'){
                            $('#alert').html('Report Saved please reload page to see changes');
                            document.getElementById("patientreportform").reset();
                        }
                        else{
                            $('#alert').html(response );
                        }
                    }
                });
            }, 1000);
        }
        else{    
          $('#alert').html("Can't save Empty Data !");
        }
});
});

$('#updatename').click(function(){
  const name = $('#fullname').val();
  $.ajax({
    url: "controller/update.php",
    type: "POST",
    data: {'updatereceptname' : name},
    success:function(response){
        var result = $.trim(response);
        if(result == 'sucess'){
          $('#stat').html('Name has been changed!');
          $('#stat').removeClass('text-danger');
          $('#stat').addClass('text-success');
        }
        else{
            $('#stat').html(response );
        }
    }
});

});

$('#cnewps').keyup(function(){
  const newpw = $('#newpw').val();
  const cnewps = $('#cnewps').val();
  if( newpw == cnewps ){
    $('#stat').html("Password matched");
    $('#stat').removeClass('text-danger');
    $('#stat').addClass('text-success');
  }else{
    $('#stat').html("Password did not matched");
    $('#stat').removeClass('text-success');
    $('#stat').addClass('text-danger');
  }
});


$('#newpw').keyup(function(){
  const newpw = $('#newpw').val();
  const cnewps = $('#cnewps').val();
  if(cnewps !== ''){
    if( newpw == cnewps ){
    $('#stat').html("Password matched");
    $('#stat').removeClass('text-danger');
    $('#stat').addClass('text-success');
  }else{
    $('#stat').html("Password did not matched");
    $('#stat').removeClass('text-success');
    $('#stat').addClass('text-danger');
  }
  }
});

$('#updatepass').on('submit', function(e) {
  e.preventDefault();
  const newpw = $('#newpw').val();
  const oldpw = $('#oldpw').val();
  const cnewps = $('#cnewps').val();

  if(oldpw !='' && newpw !='' && cnewps != '' ){
    console.log('first part');
    if(newpw == cnewps){
      $.ajax({
        url: "controller/update.php",
        type: "POST",
        data: {"newpw" : newpw  ,'oldpw': oldpw ,'cnewps':cnewps},
        success:function(response){
            var result = $.trim(response);

            if(result == 'oldwrong'){
                $('#stat').html('Old Password Wrong');
                $('#stat').removeClass('text-success');
                $('#stat').addClass('text-danger');
                $('#oldpw').val('');
            }
            else if(result == 'sucess'){
                $('#stat').html('Password Changed');
                $('#stat').removeClass('text-danger');
                $('#stat').addClass('text-success');
                document.getElementById("updatepass").reset();
            }
            else{
                $('#stat').html(response );
            }
        }
    });
    }
  }
});



$('#patienteditform').on('submit', function(e) {
    e.preventDefault();
    var id = document.getElementById("id").value;
    var patientname = $('#patientnames').val();
    var checkupfor = $('#checkupfors').val();
    var reportdetails = $('#reportdetailss').val();
    var reportmessage = $('#reportmessages').val();

    
    if( checkupfor!="" && patientname != "" && reportdetails  != ""  && reportdetails != "" ){
            $('#alerts').html('Saving records');
            setTimeout(() => {
              $.ajax({
                    url: "controller/update.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success:function(response){
                        var result = $.trim(response);

                        if(result == 'failed'){
                            $('#alerts').html('Failed while Saving data!');
                        }else{
                            $('#alerts').html('Edit Saved');
                            $('#row_'+id).html(response );
                            closemodel();
                            $('#row_'+id).css("background","#0000000a");
                            setTimeout( 
                               function change(){ 
                            $('#row_'+id).css("background","#fff");
                               }, 8000);
                               
                        }
                    }
                });
            }, 1000);
        }
        else{    
          $('#alerts').html("Can't save Empty Data !");
        }

});


function viewdoctordetail(id){
  $.ajax({
  url: "modelview.php",
  method: 'POST',
  data:{'viewdoctordetail':id},
  success:function(data){
      document.getElementById('preview').innerHTML = data;
      document.getElementById('preview').style.display = 'block';
  }
}); 

}

function viewuserdetail(id){
  $.ajax({
  url: "modelview.php",
  method: 'POST',
  data:{'viewuserdetail':id},
  success:function(data){
      document.getElementById('preview').innerHTML = data;
      document.getElementById('preview').style.display = 'block';
  }
}); 

}
