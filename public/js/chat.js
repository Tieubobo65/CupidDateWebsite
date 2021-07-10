const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button");
var chatBox = document.querySelector("#chat-box");
var chat = document.getElementById("chat-box");

form.onsubmit = (e) => {
    e.preventDefault();
}



sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../../messages/insertChat", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = "";
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

var loadChat = window.setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../../messages/getChat", true);
    xhr.onload = () => {
        
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
            }
        }
    }
    
    let formData = new FormData(form);
    xhr.send(formData);
}, 500);

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("chat-title__option");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

function showBlock() {
    document.getElementById("warning-show").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.chat-title__block')) {
        var dropdowns = document.getElementsByClassName("fullscreen");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
