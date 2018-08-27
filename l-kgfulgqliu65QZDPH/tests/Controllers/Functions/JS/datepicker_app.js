    /* Quite obvious, la nuance c'est que là j'évite les rdv pris le jour même, on évite les malpolis et en cas de vrais urgences ILS SE BOUGENT LE CUL */

    function datepicker_app() {
        
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        
        if(mm === 6 || mm === 7 || mm === 8 || mm === 1 || mm === 3 || mm === 5){
            if(dd >= 31){
                dd = 1;
                mm = today.getMonth() + 2;
                
            } else {
                dd = dd + 1;
            }
        }
        mm = checktime(mm);
        dd = checktime(dd);
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datepicker_app").setAttribute("min", today);
    }

    function checktime(i){
        if(i < 10) {
            i = "0" + i;
        }
        return i;
    }
