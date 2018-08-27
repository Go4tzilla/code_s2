<!DOCTYPE>
<html>
    <head>
        <title><?php echo $_GET['page']; ?>- Heal My Bichon</title>
        <meta content='http-equiv' content-type='text/html'/>
        <meta charset="UTF-8">
        <script src="./Ressources/jquery-3.3.1.min.js"></script>
        <script src="./Ressources/bootstrap/js/bootstrap.min.js"></script>
        <script src="./Ressources/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
        <script src="./Ressources/bootstrap/js/bootstrap-datetimepicker.fr.js"></script>
        <script src="./Ressources/moment.js"></script>
        <script src="./Ressources/multiselect.js"></script>
        <script type="text/javascript" src="./Ressources/Datatables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="./Ressources/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="Datatables/datatables.min.css"/>
        <link rel="stylesheet" href="./Ressources/bootstrap/css/bootstrap-datetimepicker.min.css"/>
        <link rel="stylesheet" href="./Ressources/Datatables/DataTables-1.10.16/css/jquery.dataTables.min.css"/>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAXOniOyoNZ2yV7m7hB9-FsEwnmAvs6_uw&exp&sensor=false&libraries=places">sensor=false"></script>
        <script type="text/javascript" src="./Controllers/Functions/JS/javastreets.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="./Views/CSS/stylesheet.css">
    </head>
    <style>
input {
    background: #decba4;
    width : 170px;
    height: 35px;
    margin-top: 10px;
    margin-right: 10%;
    position:relative;
    border:0;
    border-radius: 6px;
    border-color: #decba4;
    cursor: pointer;
    transition: background 250ms ease-in-out, 
                transform 150ms ease;
    -webkit-appearance: none;
    -moz-appearance: none;
}
.msg{
    background:#333333;
    margin : 4px;
    position:sticky;
    margin-right: 6%;
    margin-top: 10px;
    margin-bottom:-5px;
}
input:hover,
input:focus {
    background:#3d5504;
    color: #decba4;
}


input:active {
    transform: scale(0.99);
}
textarea{
    font-family:'Titillium Web', sans-serif;
    border-radius: 4px;
    min-width: 250px;
    min-height: 150px;
}
button {
    position:relative;
    top: 45px;
    font-family:'Titillium Web', sans-serif;
    width :100px;
    height:25px;
    margin-top:25px;
    border-radius: 4px;
    transition: background 250ms ease-in-out, 
                transform 150ms ease;
    -webkit-appearance: none;
    -moz-appearance: none;
}
</style>
<body>
