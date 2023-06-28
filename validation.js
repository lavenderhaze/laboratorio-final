function validateForm() {
    var nombre = document.getElementById("nombre").value;
    var apellido1 = document.getElementById("apellido1").value;
    var apellido2 = document.getElementById("apellido2").value;
    var email = document.getElementById("email").value;
    var login = document.getElementById("login").value;
    var password = document.getElementById("password").value;

    if (nombre.trim() === "" || nombre.length > 50) {
        alert("Por favor, ingresa un nombre válido (máximo 50 caracteres).");
        return false;
    }
    if (apellido1.trim() === "" || apellido1.length > 50) {
        alert("Por favor, ingresa un primer apellido válido (máximo 50 caracteres).");
        return false;
    }
    if (apellido2.trim() === "" || apellido2.length > 50) {
        alert("Por favor, ingresa un segundo apellido válido (máximo 50 caracteres).");
        return false;
    }
    if (email.trim() === "" || !validateEmail(email) || email.length > 100) {
        alert("Por favor, ingresa un correo electrónico válido (máximo 100 caracteres).");
        return false;
    }
    if (login.trim() === "" || login.length > 20) {
        alert("Por favor, ingresa un login válido (máximo 20 caracteres).");
        return false;
    }
    if (password.trim() === "" || password.length < 4 || password.length > 8) {
        alert("Por favor, ingresa una contraseña válida (entre 4 y 8 caracteres).");
        return false;
    }

    return true;
}

function validateEmail(email) {
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(email);
}

function getUserList() {
    fetch("getUserList.php")
        .then(function(response) {
            return response.text();
        })
        .then(function(data) {
            document.getElementById("userList").innerHTML = data;
        })
        .catch(function(error) {
            console.log("Error fetching user list:", error);
        });
}