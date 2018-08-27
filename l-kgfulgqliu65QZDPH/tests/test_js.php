<!DOCTYPEhtml>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Tester</title>
    
    <script type="text/javascript">

var colors = ['#ce0e0e', '#079b0c', '#3e3fd6','#decba4','#00c6ff','#ffd194','#556270','#6E48AA','#780206'];
var old;
function changeColor(){
    var randomColor = colors[Math.floor(Math.random() * colors.length)];
    if(old){

        if(old !== randomColor){


            myDiv.style.backgroundColor = randomColor;
            old = randomColor;
        } else {
            console.log(old);
            setTimeout(changeColor,40);
        }
    } else {
        myDiv.style.backgroundColor = randomColor;
        old = randomColor;



    }
}
</script>
    <style>
        .divClass {
            width:300px;
            height:300px;
            border: 1px solid #decba4;
            border-radius:1000px;
            background-color:transparent;
        }
    </style>
</head>
<body>

    <div class=divClass id="myDiv">
    </div>

    <input id=button type=button value="chagne color" onclick='changeColor()'>

</body>
</html>
