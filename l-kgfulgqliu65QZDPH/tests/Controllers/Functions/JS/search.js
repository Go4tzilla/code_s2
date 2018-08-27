/* Petite astuce magique qui vérifie la touche pressée et balance la requête. PORN */
function seek_pet(){
$("#search_form").submit(function (e) {
    e.preventDefault();
    // Get input field values
    var a = $('#check').val();
    var i = document.getElementById('owner').value;

    // Simple validation at client's end
    // We simply change border color to red if empty field using .css()
    var proceed = true;

    if (a === "") {
        $('input[name=search]').css('border-color', 'red');
        proceed = false;
    }

    if (proceed) {
        // Insert the AJAX here.
        cancel_app(search,i);
        
    }
    });
}

function cancel_app(a,b){
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
    
    var queryString = "?d=" + a;
    queryString += "&i=" + b;
    ajaxRequest.open("GET", "./Controllers/cancel_apps.php" + queryString, true);
    ajaxRequest.send(); 
}