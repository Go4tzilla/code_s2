function updateHistory(str){
    var ajaxRequest;  // The variable that makes Ajax possible!
     try {
         ajaxRequest = new XMLHttpRequest();
     }catch (e) {
         try {
             ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
         }catch (e) {
             try{
                 ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
             }catch (e){
                 alert("Your browser broke!");
                 return false;
             }
         }
     }
    /** Crée la connexion et récupère la réponse */
         
    ajaxRequest.onreadystatechange = function(){
       if(ajaxRequest.readyState == 4){
          var ajaxDisplay = document.getElementById('txtHint');
          ajaxDisplay.innerHTML = ajaxRequest.responseText;
          ajaxRequest.abort();
       }
    }
    
     /** Valeurs à passer en arguments et déclaration du Model à utiliser */
    var a = document.getElementById('animal').value;
    var h = document.getElementById('history').value;

    var queryString = "?d=" + a ;
    queryString += "&h=" + h;
    ajaxRequest.open("POST","./Models/update_history_vets.php" + queryString, true);
    ajaxRequest.send(); 
    
 }