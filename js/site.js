$(document).ready(function(){

    $("#inputCPF").mask('999.999.999-99');
    //$("#inputCNPJ").mask('');

    $("#btnValidarCPF").on("click", function(){        

        var erros = false;
        var msgErro = "";
        var cpf = $("#inputCPF").val();
        cpf = cpf.replace('/','');
        cpf = cpf.replace('.','');
        cpf = cpf.replace('.','');
        cpf = cpf.replace('-','');

        if(cpf == "" ){
            msgErro = "Campo CPF obrigatório!";
            erros = true;
        }

        if(cpf.length != 11){
            msgErro = "Campo CPF deve ter 11 caracteres!";
            erros = true;
        }
    
        if(erros){
            alert(msgErro);
            event.preventDefault();                
        }

    });

});

