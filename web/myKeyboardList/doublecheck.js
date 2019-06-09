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
    if(confirm("Are you sure you want to edit this comment?")){
        window.location.href = "editComment.php?keyboard_id=" + keyID +"&comment_id=" +commentID;
    }
}
