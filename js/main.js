$(function(){

    //validating the register with plugin 4 numbers
    $('#regis').mask("0000");

//Calling the function with click buttton    
 $('button[name=btn-send]').click(function(){

 var name =  $('input[name=nome]').val();
 var last_name =  $('input[name=last-name]').val();
 var email =  $('input[name=email]').val();
 var city =  $('input[name=city]').val();
 var br_states =  $('#states').val();
 var register =  $('input[name=register]').val();


  
//Validating inputs 


if(!name.match(/^[a-zA-Z]{1}[a-z]{1,}$/)){
  $(".erro-name").show();
  return false;
}

if(!last_name.match(/^[a-zA-Z]{1}[a-z]{1,}$/)){
  $(".erro-last-name").show();
  return false;
}

if(email.match(/^([a-z0-9-_.]{1,})+@+([a-z.]{1,})$/)== null){
  $(".erro-email").show();
  return false;
}

if(!city.match(/[a-zA-Z]$/)){
  $(".erro-city").show();
  return false;
}

if($br_states = ''){
  $(".erro-state").show();
  return false;
  
}

if (register == '' || register.length < 4) {
  $(".erro-regis").show();
  return false;
}

 // check the checkbox 
 const checkbox = document.getElementById("checkcheck");
 const isChecked = checkbox.checked;
 if (isChecked == false) {
   $("#block").show();
 }else{

  //send the data with ajax
  $.ajax({
    url: "enviar.php",
    type: "post",
    data:{
       first_name: name,
       last: last_name,
       email_correct: email,
       cityes: city,
       state: br_states,
       registers: register
    },

    beforeSend: function(){
       $('#btn-ajax').html("Enviando...");
    }

  }).done(function(e){
       $("#btn-ajax").html("Dados enviados com sucesso");
       Swal.fire({
          icon: 'success',
          title: 'Cadastrado com sucesso',
          text: 'Efetue o login'            
        })
       
        //will be sent to search screen
       setTimeout(function() {
         window.location = 'search.php';
       }, 3000)

         
  })


 }
})   
})