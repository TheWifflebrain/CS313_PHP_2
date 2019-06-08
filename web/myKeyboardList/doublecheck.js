function doublecheck(){
    var keyID = document.getElementById("keyboard_id").value;
    if(confirm("Are you sure you want to delete this keyboard?")){
        window.location.href = "removeKeyboard.php?keyboardID=" + keyID;
    }
}
//<a href="removeKeyboard.php?keyboard_id=<?php echo $keyID; ?>