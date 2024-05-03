$('#first_name, #last_name, #email, #password, #confirm_password').on('keyup', function () {
    var password_pattern = /^[a-zA-Z0-9]{7,12}$/;
    var pass = $('#password').val();
    var valid = password_pattern.test(pass);
    //Check the username field
    if ($('#first_name').val() == "" || $('#last_name').val() == "") {
        $('#message').html('Please enter the first and last name').css('color', 'red');

         //Check the email field
    } else if ($('#email').val() == "") {
        $('#message').html('Please enter the email').css('color', 'red');
 

        //Check the confirmed password field
    } else if ($('#password').val() == "") {
        $('#message').html('Please enter your password').css('color', 'red');

        //Check the confirmed password field
    } else if (!valid){
        $('#message').html('Password must contain 7 - 12 letters with at least one number').css('color', 'red');
     
    } else if ($('#confirm_password').val() == "") {
      $('#message').html('Please re-type your password').css('color', 'red');

        //Check whether the retyped password matches the password
    } else if ($('#password').val() != $('#confirm_password').val()) {
        $('#message').html('Confirmed password does not match with the password').css('color', 'red');

       
        //Check whether a user agreed or not
    } else if (!$('#adult').is(':checked')) {
  
        $('#message').html('Only 18+ can register. ').css('color', 'red');
 
        //When the form is successfully submited, create an alert message
    } else {
        alert("Your form has been successfully submited");
    }
});

$('#regiForm').on('submit', function(){

    event.preventDefault();
    var password_pattern = /^[a-zA-Z0-9]{7,12}$/;
    var pass = $('#password').val();
    var valid = password_pattern.test(pass);
    //Check the username field
    if ($('#first_name').val() == "" || $('#last_name').val() == "") {
        $('#regiModal').show();
        $('#message').html('Please enter the first and last name').css('color', 'red');
        

         //Check the email field
    } else if ($('#email').val() == "") {
        $('#message').html('Please enter the email').css('color', 'red');
 

        //Check the confirmed password field
    } else if ($('#password').val() == "") {
        $('#message').html('Please enter your password').css('color', 'red');

        //Check the confirmed password field
    } else if (!valid){
        $('#message').html('Password must contain 7 - 12 letters with at least one number').css('color', 'red');
     
    } else if ($('#confirm_password').val() == "") {
      $('#message').html('Please re-type your password').css('color', 'red');

        //Check whether the retyped password matches the password
    } else if ($('#password').val() != $('#confirm_password').val()) {
        $('#message').html('Confirmed password does not match with the password').css('color', 'red');

       
        //Check whether a user agreed or not
    } else if (!$('#adult').is(':checked')) {
  
        $('#message').html('Only 18+ can register. ').css('color', 'red');
 
        //When the form is successfully submited, create an alert message
    } else {
        alert("Your form has been successfully submited");
    }

});


$('#next').on('click', function() {
    $.ajax({
        url:"subpages/engine.php",
        method: "POST",
        data: $(this).serialize(),
        success:function(response){
            if (response == "error"){
                $('.statusMsg').html('<span style="color:red;">You already submitted the paper</span>');
   
            } else {
                $('.statusMsg').html('<span style="color:green;">You can submit the paper </span>');
                setTimeout(' window.location.href = "./subpages/new_paper.php?author_id"'+response+'; ',500);
      

            }
            
          }
    });
});

$('#close').click(function(){
    location.reload(true);
});

function loadData(id){
    if(id ==""){
        alert ('error found');
        return;
    }
   const xhttp = new XMLHttpRequest();
   xhttp.onload = function(){
    document.getElementById("txtHint").innerHTML = this.responseText;
   
   }
   xhttp.open("GET", "subpages/engine.php?q="+id);
   xhttp.send();


   }

$('.view-review').on('click', function() {
    event.preventDefault();
    console.log('clicked');
//     $('#view_review_modal').show();
//     var paper_id = $(this).attr('id');
// console.log('paper_id');
//     $.ajax({
//         url:"subpages/engine.php",
//         method: "POST",
//         data: {paper_id: paper_id},
//         dataType:"json",
//         success: function(data){
//             $('#view_id').val(data.wineID);
//             $('#view_name').val(data.name);
//             $('#view_score').val(data.type);
          
//             $('#edit_wine_modal').show();

//         }

//     });
});
  