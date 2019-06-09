function doublecheck(){
    var keyID = document.getElementById("keyboard_id").value;
    if(confirm("Are you sure you want to delete this keyboard?")){
        window.location.href = "removeKeyboard.php?keyboard_id=" + keyID;
    }
}

function doublecheck2(){
    var keyID = document.getElementById("keyboard_id").value;
    var commentID = document.getElementById("comment_id").value;
    if(confirm("Are you sure you want to delete this comment?")){
        window.location.href = "removeCommentHandler.php?keyboard_id=" + keyID +"&comment_id=" +commentID;
    }
}
function editComment(){
    var keyID = document.getElementById("keyboard_id").value;
    var commentID = document.getElementById("comment_id").value;
    var commentC = document.getElementById("editC").value;
    if(confirm("Are you sure you want to edit this comment?")){
        window.location.href = "editComment.php?keyboard_id=" + keyID +"&comment_id=" +commentID +"&comment=" + commentC;
    }
}

function showInput(){
    var x = document.getElementById("edits");
    if(x.style.type==="hidden"){
        x.style.display="block";
    }
    else{
        x.style.display="hidden";
    }
}

//<a href="editComment.php?comment_id=<?php echo $cID; ?>&keyboard_id=<?php echo $keyID; ?>"></a>