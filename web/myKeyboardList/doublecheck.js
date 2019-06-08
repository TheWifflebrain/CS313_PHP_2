function doublecheck(){
    if(confirm("Are you sure you want to delete this keyboard?")){
        window.location.href = "removeKeyboard.php";
    }
    else{
        
    }
}
//<a href="removeKeyboard.php?keyboard_id=<?php echo $keyID; ?>