$(document).ready(function(){
    $('#meuform').validate({
        rules:{
            nome_completo:{
                required:true,
                minlength:5
            },
            email:{
                required:true,
                email:true
            }
        },
        messages:{
            nome_completo:{
                required:'Este campo é obrigatório',
                minlength:'O nome deve ter pelo menos 5 caracteres'
            },
            email:{
                required:'Este campo é obrigatório',
                email:'Insira um endereço de email válido'
            }
        }
    });
});
