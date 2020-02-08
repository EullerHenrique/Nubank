
function login(){
    let email = document.getElementById('email').value;
    let senha = document.getElementById('senha').value;

    if(email === 'nubank@outlook.com' && senha === 'Nucontapraninguem'){
         window.location.href = '../HTML/pagamento.html';
    }
    else{
        alert('O nome de usuário e a senha fornecidos não correspondem às informações em nossos registros. Verifique-as e tente novamente.')
    }
}
