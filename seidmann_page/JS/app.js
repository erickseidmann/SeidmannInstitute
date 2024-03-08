


/* Obrigatorio CPF, CNPJ , email   */
const btncadastrar = $('#btncadastrar')

form.addEventListener('submit', (evente) => {

    const erro = document.getElementById( 'email','nome_completo','cpf');
    const cpf = document.getElementById('cpf')
    const cnpj = document.getElementById('cnpj');
    const cep = document.getElementById('cep');
    const telefone = document.getElementById('tele')
    const nome = document.getElementById('nome')
    const sobrenome = document.getElementById('sobrenome')
    const data = document.getElementById('data')
    const senha = document.getElementById('senha')
    const rsenha = document.getElementById('senha2')
    const logradouro = document.getElementById('logradouro')
    const cidade = document.getElementById('cidade')
    const estado = document.getElementById('uf')
    const bairro = document.getElementById('bairro')
    const numero = document.getElementById('numero')

    if (erro.value == "") {
        erro.classList.add("is-invalid");
        erro.focus();
    } else {
        erro.classList.remove("is-invalid");
    }
    if (data.value == "") {
        data.classList.add("is-invalid");
        data.focus();
    } else {
        data.classList.remove("is-invalid");
    }
    if (senha.value == "") {
        senha.classList.add("is-invalid");
        senha.focus()
    } else {
        senha.classList.remove("is-invalid")
    }
    if (rsenha.value == "") {
        rsenha.classList.add("is-invalid");
        rsenha.focus();
    } else {
        rsenha.classList.remove("is-invalid");
    }
    if (cpf.value == false) {
        cpf.classList.add("is-invalid");
        cpf.focus();
    } else {
        cpf.classList.remove("is-invalid");
    }
    if (cep.value == false) {
        cep.classList.add("is-invalid");
        cep.focus();
    } else {
        cep.classList.remove("is-invalid");
    }
    if (cnpj.value == false) {
        cnpj.classList.add("is-invalid");
        cnpj.focus();
    } else {
        cnpj.classList.remove("is-invalid");
    }
    if (telefone.value == "") {
        telefone.classList.add("is-invalid");
        telefone.focus();
    } else {
        telefone.classList.remove("is-invalid");
    }
    if (nome.value == "") {
        nome.classList.add("is-invalid");
        nome.focus();
    } else {
        nome.classList.remove("is-invalid");
    }
    if (sobrenome.value == "") {
        sobrenome.classList.add("is-invalid");
        sobrenome.focus();
    } else {
        sobrenome.classList.remove("is-invalid");
    }
    if (logradouro.value == "") {
        logradouro.classList.add("is-invalid");
        logradouro.focus();
    } else {
        logradouro.classList.remove("is-invalid");
    }
    if (cidade.value == "") {
        cidade.classList.add("is-invalid");
        cidade.focus();
    } else {
        cidade.classList.remove("is-invalid");
    }
    if (estado.value == "") {
        estado.classList.add("is-invalid");
        estado.focus()
    } else {
        estado.classList.remove("is-invalid");
    }
    if (bairro.value == "") {
        bairro.classList.add("is-invalid");
        bairro.focus();
    } else {
        bairro.classList.remove("is-invalid");
    }
    if (numero.value == "") {
        numero.classList.add("is-invalid");
        numero.focus();
    } else {
        numero.classList.remove("is-invalid");
    }
})
// mascara cpf, telefone, cnpj e cep usando jquery
$(document).ready(function () {
    $("#cep").mask('00.000-000', { placeholder: '__.___-___' });
    $("#telefone").mask('(00)0000-00000', { placeholder: '(__)_____-____' });
    $("#cpf").mask('000.000.000-00', { placeholder: '___.___.___-__' });
    $("#cnpj").mask('00.000.000/0000-00', { placeholder: '__.___.___/____-__' })
    $("#valor_combinado").mask('R$990,00', { placeholder: 'R$00,00' })
})



// validador do cpf/ termos / cnpj jquery  
$(document).ready(function () {

    $.validator.addMethod('strongPassword', function (value, element) {
        return this.optional(element) ||
            value.length >= 6 &&
            /\d/.test(value) &&
            /[a-z]/i.test(value);
    }, "Sua senha deve conter ao menos 6 digitos sendo ao menos um numero e uma letra\.")

    $("#form").validate({
        rules: {
            cpf: {
                required: true,
                cpfBR: true,
                maxlength: 14,
                minlength: 14,
            },
            termos: {
                required: true,
            },
            cnpj: {
                maxlength: 18,
                minlength: 18,
                cnpjBR: true,
            },
            cep: {
                required: true,
                postalcodeBR: true,
                maxlength: 10,
                minlength: 10,
            },
            email: {
                required: true,
                email: true,
            },
            nome_completo: {
                required: true,
            },
            sobrenome: {
                required: true,
            },
            tele: {
                required: true,
            },
            data: {
                required: true,
            },
            data_nascimento: {
                required: true,
            },
            numero: {
                required: true,
            },
            sexo: {
                required: true,
            }
        },
        messages: {
            cpf: {
                required: "Este campo é obrigatório!",
                minlength: "Deve conter no min 12 numeros!",
            },
            termos: {
                required: "Você deve aceitar os termos e condições!",
            },
            cnpj: {
                minlength: "Deve conter no min 16 numeros!",
            },
            cep: {
                required: "Este campo é obrigatório!",
                minlength: "Deve conter no min 8 numeros!",
            },
            senha: {
                required: "Este campo é obrigatório!",
                rangelength: "Deve conter entre 6 e 10 caracteres!",
            },
            senha2: {
                required: "Este campo é obrigatório!",
                equalTo: "As senhas estão diferentes, verifique!",
            },
            email: {
                required: "Este campo é obrigatório!",
            },
            nome: {
                required: "Este campo é obrigatório!",
            },
            tele: {
                required: "Este campo é obrigatório!",
            },
            data: {
                required: "Este campo é obrigatório!",
            },
        },
        errorPlacement: function (error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents('.input-group'));
            } else { // This is the default behavior 
                error.insertAfter(element);
            }
        }
    })
})

// validar força da senha 
/*$(document).ready(function(){

    $("#senha").keyup(function() {

        var strength = 1;

        if(this.value.length >= 5) {
            strength++;
        }

        if(this.value.match(/[a-z]+/)) {
            strength++;
        }

        
        if(this.value.match(/[0-9]+/)) {
            strength++;
        }

        if(this.value.match(/[A-Z]+/)) {
            strength++;
        }

        alert(strength);
    });
 });*/

  // Função para gerar o número de matrícula automático
  function generateNumeroMatricula() {
    // Prefixo da matrícula (se desejar)
    var prefixo = "MAT";

    // Gerar um ID único baseado no timestamp atual
    var idUnico = Date.now().toString(36); // Usando timestamp como ID único em formato base36

    // Concatenar o prefixo (se existir) com o ID único
    var numeroMatricula = prefixo + idUnico;

    // Retornar o número de matrícula gerado
    return numeroMatricula;
  }

  // Quando o documento estiver pronto, atribuir o valor gerado ao campo de matrícula
  document.addEventListener("DOMContentLoaded", function() {
    var campoMatricula = document.getElementById("numero_matricula");
    campoMatricula.value = generateNumeroMatricula();
  });