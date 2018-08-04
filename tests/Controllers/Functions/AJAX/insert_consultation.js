function insertConsultation(){
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
    var a = document.getElementById('animal').value;
    var r = document.getElementById('reason').value;
    var e = document.getElementById('exams').value;
    var d = document.getElementById('diagnosis').value;
    var t = document.getElementById('treatment').value;
    var n = document.getElementById('notes').value;
    var w = document.getElementById('weight').value;
    var ro = document.getElementById('room').value;
    var o = document.getElementById('owner').value;
    var queryString = "?a=" + a ;
 
    queryString +=  "&r=" + r + "&e=" + e +"&d=" + d + "&t=" + t + "&n=" + n + "&w=" + w + "&ro=" + ro + "&o=" + o;
    ajaxRequest.open("GET", "./Models/insert_annihilate.php" + queryString, true);
    ajaxRequest.send(null); 
 }