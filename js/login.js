document.getElementById("loginBtn").addEventListener("click", () => {
    let username = document.getElementById("username");
    let password = document.getElementById("password");
    const errorMessage = document.getElementById("errorMessage");

    if (!username.value || !password.value) {
        errorMessage.textContent = "Todos los campos son obligatorios";
        errorMessage.style.display = "block";
        return;
    }
    username.value = "";
    password.value = "";
    window.location.href = "/index.html";
});