
<!DOCTYPE html>

<html>


<head>

    <meta charset="utf-8">
    
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
</head>


<style>
#mydiv {
    position: absolute;
    margin:auto;
    z-index: 9;
    background-color: #f1f1f1;
    text-align: center;
    border: 1px solid #d3d3d3;
    z-index:99;
    top:15px;
}

#mydivheader {
    padding: 10px;
    cursor: move;
    z-index: 10;
    background-color: #2196F3;
    color: #fff;
}
.div_sid{
position:absolute;
width:40px;
height:30px;
border-radius:100px;
}
</style>
<body>
<div style="width:300px;height:45px;background-color:#decba4">
<div class='mydiv' id="mydiv"><div id="mydivheader">Click here to move</div></div>
</div>
<h1>Draggable DIV Element</h1>

<p>Click and hold the mouse button down while moving the DIV element</p>

<div id="mydick">
  <div id="mydivheader">Click here to move</div>
  <p>Move</p>
  <p>this</p>
  <p>DIV</p>
</div>

<script>
//Make the DIV element draggagle:
dragElement(document.getElementById("mydiv"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
      e = e || window.event;
      e.preventDefault();
      // get the mouse cursor position at startup:
      
    pos4 = e.clientY;
    console.log(elmnt.offsetTop);
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    if(elmnt.offsetTop >= 0 && elmnt.offsetTop <= 170){
    document.onmousemove = elementDrag;
    }
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    
    pos2 = pos4 - e.clientY;
    console.log(pos2);
    pos4 = e.clientY;
    lol = elmnt.offsetTop;
    console.log(lol);
    check = (elmnt.offsetTop/170) - 1;
    check = Math.abs(check);
    console.log(check);
    // set the element's new position:
    if((lol-pos2) >= 0 && (lol-pos2) < 170){
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    }
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>

</body>
</html>

</body>
<script>
    function count(){
        var count = document.getElementsByTagName('audio');
        document.getElementById('txthint').textContent = count.length;
    }
</script>
<script>

$("#test").submit(function(e){
    e.preventDefault();
    $.ajax({
        type:"POST",
        url: "./check_form.php",
        data: {"name" : $("#name").val(), "pute" : $("#pute").val()},
        success: function(result){
            document.getElementById('txthint').textContent = result;
        }
    })
})
</script>

