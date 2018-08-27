function order_by(str){
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
       }
    }
    

     /** Valeurs à passer en arguments et déclaration du Model à utiliser */
    var o = document.getElementById('owner').value;
    var queryString = "?a=" + str;
    queryString += "&o=" + o;
    ajaxRequest.open("GET", "./Controllers/order_by_clients_ajax.php" + queryString, true);
    ajaxRequest.send(null); 
}