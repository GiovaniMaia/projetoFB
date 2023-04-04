var users = [
	{username: "usuario1", password: "senha1"},
	{username: "usuario2", password: "senha2"},
	{username: "usuario3", password: "senha3"}
];

document.getElementById("loginForm").addEventListener("submit", function(event) {
	event.preventDefault();
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;

	// Verifica se o usuário e a senha estão corretos
	var isValidUser = false;
	for (var i = 0; i < users.length; i++) {
		if (users[i].username === username && users[i].password === password) {
			isValidUser = true;
			break;
		}
	}

	// Se o usuário e a senha forem válidos, redireciona para a página de sucesso
	if (isValidUser) {
		window.location.href = "../html/view.html";
	} else {
		alert("Usuário ou senha inválidos!");
	}
});
