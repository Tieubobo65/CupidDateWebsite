const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button");
var chatBox = document.querySelector("#chat-box");



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



setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/cupiddate/messages/getChat", true);
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

