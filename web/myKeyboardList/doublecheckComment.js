function doublecheck2(){
    var keyID = document.getElementById("keyboard_id").value;
    var commentID = document.getElementById("comment_id").value;
    if(confirm("Are you sure you want to delete this comment?")){
        window.location.href = "removeCommentHandler.php?keyboard_id=" + keyID +"?comment_id=" +commentID;
    }
}