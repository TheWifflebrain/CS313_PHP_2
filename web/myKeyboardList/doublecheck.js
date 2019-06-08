function doublecheck(){
    var txt;
    if(confirm("Press a button!")){
        txt="you pressed ok";
    }
    else{
        txt = "you pressed cancel";
    }
    document.getElementById("demo").innerHTML = txt;
}
//<a href="removeKeyboard.php?keyboard_id=<?php echo $keyID; ?>