//function to login
function checkThreeFields(field1, field2, field3) {
    var field1 = document.getElementById(field1);
    var field2 = document.getElementById(field2);
    var field3 = document.getElementById(field3);

    if (field1.value == null || field1.value == 0 || field1.value == " ") {
        field1.style.background = 'red';
    }

    if (field2.value == null || field2.value == 0 || field2.value == " ") {
        field2.style.background = 'red';
    }

    if (field3.value == null || field3.value == 0 || field3.value == " ") {
        field3.style.background = 'red';
    }

    if (field1.value == null || field1.value == 0 || field1.value == " " || field2.value == null || field2.value == 0 || field2.value == " " || field3.value == null || field3.value == 0 || field3.value == " " ) {
        document.getElementsByClassName('error')[0].innerHTML = "Please fill out the empty field(s) in red!";
    }
    else {
        document.getElementById('buttonSubmit').type = 'submit';
    }
}

//scripts for modals
//function to open a modal
function openModal (item) {
    var item = document.getElementById(item);
    item.style.display = 'block';
}

//function to close modal
function closeModal (item) {
    var item = document.getElementById(item);
    item.style.display = 'none';
}

window.addEventListener('click', outsideClick);

//function to close the modal if a blank space is pressed
function outsideClick(e) {
    var menu = document.getElementById('mobile-menu');
    if (e.target == menu) {
        menu.style.display = 'none';
    }
}

//functiuon to open Comment box
function commentBox() {
    var commentBox = document.getElementById('commentBox');
    if (commentBox.style.display == 'block') {
        commentBox.style.display = 'none';
    }
    else {
        commentBox.style.display = 'block';
    }
}

//function to open user modal
function openUserModal(UsersId) {
    var modal = document.getElementById('modalUsers');
    modal.style.display = 'block';

    var UsersId = document.getElementById(UsersId);
    UsersId.style.display = 'block';
}


window.addEventListener('click', outsideClickUsers);
//function to close the modal if a blank space is pressed
function outsideClickUsers(e) {
    var menu = document.getElementById('modalUsers');
    if (e.target == menu) {
        menu.style.display = 'none';
        var a = 1;
        while (a < 99) {
            document.getElementById(a).style.display = 'none';
            a++;
        }
    }
}

//enable button
function enableButton (button, field) {
    var field = document.getElementById(field);
    var button = document.getElementById(button);
    if (field.value != "" || field.value != null || field.value != " ") {
        button.disabled = false;
    }
    else {
        button.disabled = true;
    }
}

//function to show and hide commentBox
function commentBox(i) {
    var commentBox = 'commentBox'+i;
    var openCommentBox = document.getElementById(commentBox);
    if (openCommentBox.style.display == 'block') {
        openCommentBox.style.display = 'none';
    }
    else {
        openCommentBox.style.display = 'block';
    }
}

//function to postComment()
function postComment(i) {
    var Comment = document.getElementById('Comment'+i);
    if (Comment.value == "" || Comment.value == null) {
        alert('Nothing to post');
    }
    else {
        buttonComment = document.getElementById('buttonComment'+i);
        buttonComment.type = 'submit';
    }

}
