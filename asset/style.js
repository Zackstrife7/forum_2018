
window.addEventListener('load', function(e){

  var sending = document.querySelector("#sending");
  var message = document.getElementById("textarea");
   var conve = document.getElementById("convers");
  var spanReponse = document.querySelector("span.response");
  var form = document.getElementById("connexion");
  
  sending.addEventListener('click', function(e){
            // arreter la fonction click avant le submit pour catch les consolelog                
            executeXHR(e);                       
            e.preventDefault();
          

          });
  function executeXHR()
  {
    var xmlhttp;
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

  
            
           if(message.value!=''){
           	// append(index , valeur) rajoute les valeur entrée dans les POST 
            var formData = new FormData();
            formData.append("mess", message.value);
            formData.append("conv", conve.value);
            formData.append("ins", "Inserer");
            xmlhttp.open(form.method, form.action, true);
            xmlhttp.send(formData);

                
                var logError = '<span style="color:blue;font-size:20px;">Message ajouté à la conversation  ' + conve.value + ' </span>';
                spanReponse.innerHTML = logError;
                
                 // window.redirect.href = "?c=conversation&a=showConversations";
                 
            
       
          }     
    
          if (message.value === ''){

            var logError = "<span style='background-color:red;color:white;font-size:1.5rem'>Veuillez rentrer un message   </span>";
            spanReponse.innerHTML = logError;
            
          }
          
  }

});





