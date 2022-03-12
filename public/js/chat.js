const chat_id = document.getElementById('info').dataset.chat
const user_id = document.getElementById('info').dataset.user
let socket = new WebSocket("ws://192.168.0.4:8080");

socket.onopen = function () {
    socket.send(`{"action": "conn", "chat_id": "${chat_id}"}`);
};

socket.onmessage = function (event) {
    messageToContainer(event.data, true);
};

socket.onclose = function (event) {
    if (event.wasClean) {
        console.log(`[close] Соединение закрыто чисто, код=${event.code} причина=${event.reason}`);
    } else {
        console.log(`[close] Соединение прервано, код=${event.code} причина=${event.reason}`);
    }
};

socket.onerror = function (error) {
    console.log(`[error] ${error.message}`);
};

function sendfile(filePath, message) {
    socket.send(`{"action": "message", "chat_id": "${chat_id}", "file": "${filePath}", "message": "${message}", "user_id": "${user_id}"}`);
}

function sendMessage(message) {
    socket.send(`{"action": "message", "chat_id": "${chat_id}", "message": "${message}", "user_id": "${user_id}"}`);
}

function messageToContainer(message, is_writer) {
    // if (is_writer) {
    //     let html = '<div class="message message-writer">' +
    //                     '<div class="message-thumbnail">' +
    //                     '</div>'
    //     const messageElement = '<div class="writer">' + message + '</div>';
    //     document.getElementById('message-container').insertAdjacentHTML('afterbegin', messageElement)
    // } else {
    //     const messageElement = '<div class="reader">' + message + '</div>';
    //     document.getElementById('message-container').insertAdjacentHTML('afterbegin', messageElement)
    // }
    document.getElementById('message-container').insertAdjacentHTML('afterbegin', message)
}

document.forms.publish.onsubmit = function () {
    let outgoingMessage = this.message.value;
    const filePath = document.getElementById('file-path').value;

    if (outgoingMessage.length === 0) {
        if (filePath.length > 0) {
            sendfile(filePath, outgoingMessage)
        }
        clearForm()
        return false;
    }

    if (filePath.length > 0) {
        sendfile(filePath, outgoingMessage)
    } else {
        sendMessage(outgoingMessage);
    }
    clearForm()
    return false;
};

function clearForm() {
    $('#file-input').show();
    $('#image').hide();
    document.getElementById('file-path').value = '';
    document.getElementById('message').value = '';
}
