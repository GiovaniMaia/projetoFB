const loginForm = document.getElementById("form");
const atencao = document.getElementById('msg');


    loginForm.addEventListener("submit", async (e) => {

        if (document.getElementById('usuario').value === " "){
            atencao.innerHTML = "usuario ou senha incorretos!!";
        }

    });