var Main = {

    Init:function(){

        $(document).on('click', '.edit', function(e){

            $.ajax({
                type: 'POST', 
                url: 'ajax/returnUser',
                data:{ 
                    id: $(this).attr('data-id'),
                },
                
                dataType: 'TEXT',
                success: (resp) => {
        
                    if(!resp.error){
        
                        var json = $.parseJSON(resp);
        
                        $("form[name='edituser'] #id").val($(this).attr('data-id'));
                        $("form[name='edituser'] #name").val(json.name);
                        $(".modal-title").text(json.name);
                        $("form[name='edituser'] #cpf").val(json.cpf);
                        $("form[name='edituser'] #email").val(json.email);
                        $("form[name='edituser'] #born").val(json.born);
                        $("form[name='edituser'] #phone").val(json.phone);
                        $("form[name='edituser'] #cep").val(json.cep);
                        $("form[name='edituser'] #province").val(json.province);
                        $("form[name='edituser'] .city").text(json.city);
                        $("form[name='edituser'] #address").val(json.address);
    
                        $('#editUser').modal('show');
        
                    }else{
        
                        Swal.fire(
                            'Ops!',                                
                            'Ocorreu um erro.',
                        )
        
                    }
        
                }
                
            });

        });
     
        $("form[name='edituser']").submit(function(event){
        
            event.preventDefault();
    
            $.ajax({
                url: 'ajax/updateUser',
                type: 'POST',
                data:{ 
                    id: $("form[name='edituser'] #id").val(json.id),
                    name: $("form[name='edituser'] #name").val(json.name),
                    cpf: $("form[name='edituser'] #cpf").val(json.cpf),
                    email: $("form[name='edituser'] #email").val(json.email),
                    born: $("form[name='edituser'] #born").val(json.born),
                    phone: $("form[name='edituser'] #phone").val(json.phone),
                    province: $("form[name='edituser'] #province").val(json.province),
                    city: $("form[name='edituser'] #city").val(json.city),
                    address: $("form[name='edituser'] #address").val(json.address),
                },
                dataType: 'JSON',
                success: function (result) {
    
                    if(!result.error){
                    
                        Swal.fire({
                            title: result.alert,
                            icon: 'success',
                            
                        }).then(function () {
                            window.location.reload();
                        });
    
    
                    }else{
    
                        Swal.fire({
                            title: result.alert,
                            icon: 'error',
                            
                        }).then(function () {
                            window.location.reload();
                        });
    
                        
                    }
                
                }
            });
        });

        $(document).on('click', '.delete', function(e){
            
            Swal.fire({

                title: 'Deseja mesmo deletar?',
            
                icon: 'warning',
            
                showCancelButton: true,
            
                confirmButtonColor: '#3085d6',
            
                cancelButtonColor: '#d33',
            
                confirmButtonText: 'SIM',
            
                cancelButtonText: 'NÂO',
            
                }).then((result) => {
            
                if (result.isConfirmed) {

                    $.ajax({
                        type: 'POST',
                        url: 'ajax/delUser',
                        data: {
                            id: $(this).attr('data-id')
                        },
                        
                        dataType: 'TEXT',
                        success: function (result) {
    
                            if(!result.error){
                            
                                Swal.fire({
                                    title: 'Deletado com sucesso!',
                                    icon: 'success',
                                    
                                }).then(function () {
                                   window.location.reload();
                                });

                                
                            }else{

                                Swal.fire({
                                    title: 'Erro ao deletar!',
                                    icon: 'error',
                                    
                                }).then(function () {
                                   window.location.reload();
                                });

                                
                            }
                        
                        }
        
                    });

                }
            
        });



    });




//capturando POSTS Ajax.php
$(function(){

    clicked = false;

    $(document).on('submit', 'form', (e) => {

        e.preventDefault();

        var form     = $(e.target);
        var formData = new FormData(form[0]);


        if(!clicked){

            $.ajax({

                type: 'POST',

                url: form.attr('action'),

                data: formData,

                processData: false,

                contentType: false,

                dataType: 'JSON',

                beforeSend: (event) => {

                    clicked = true;

                    form.animate({'opacity':'0.5'});

                },

                success: (data) => {

                    clicked = false;

                    form.animate({'opacity':'1'});

                    if(!data.error){

                        if(data.reloadUsers){

                            Swal.close();
                            $('.modal').modal('hide');
                            $('select').trigger('change')
                            $('.modal-backdrop').remove()

                        } else {
                            
                            if(data.reload && !data.alert){

                                Reload();

                                $('.modal').css('display','none').removeClass('show')

                                $('.modal-backdrop').remove()

                            } else if(data.alert && !data.reload) {

                                Swal.fire({

                                    title: data.title ? data.title : 'Tudo certo!',

                                    icon: 'success',

                                    text: data.alert

                                });

                         
                            } else {

                                console.log('ok')

                                Swal.fire({

                                    title: data.title ? data.title : 'Tudo certo!',

                                    icon: 'success',

                                    text: data.alert,

                                    confirmButtonText: 'OK',

                                }).then((result) => {

                                    if(data.reloadSchedule){

                                    } else {
                                        window.location.reload();
                                        Swal.close();
                                        $('.modal').css('display','none').removeClass('show')
                                        $('.modal-backdrop').remove()
                                    }


                                });

                            }
                        }

                    } else if(data.error){

                        Swal.fire({

                            title: 'Oops!',

                            icon: 'error',

                            text: data.alert

                        });

                    } else {

                        Swal.fire({

                            title: 'Oops!',

                            icon: 'error',

                            text: 'Ocorreu um erro interno. Tente novamente mais tarde.'

                        });

                    }

                

                }

            });

        }

    });


    //buscando cidade
    $('select[name="province"]').on('change', function(){
        if($(this).val().length > 0 && !clicked){
            clicked = true;
            let form = $(this).closest('form')
            let tg = form.find('select[name="city"]')
            $.ajax({
                type: 'POST',
                url: 'ajax/getCities',
                data: {
                    sigla: $(this).val()
                },
                dataType: 'json',
                beforeSend: function(){
                    tg.find('option').remove();
                    tg.append('<option>Carregando...</option>').trigger('change');
                },
                success: function(data){
                    clicked = false
                    tg.find('option').remove()
                    $.each(data, (i, value) => {
                        tg.append('<option value="'+value.nome+'">'+value.nome+'</option>').trigger('change');
                    })
                }
            })
        }
    })



});

}
}

let Init = () => {

    /*
    Verifica se é CPF

    @see http://www.todoespacoonline.com/w/
    */
    function verifica_cpf(valor){

        // Garante que o valor é uma string
        valor = valor.toString();

        // Remove caracteres inválidos do valor
        valor = valor.replace(/[^0-9]/g, '');

        // Verifica CPF
        if ( valor.length === 11 ) {
            return 'CPF';
        } 
        // Não retorna nada
        else {
            return false;
        }

    } // verifica_cpf_cnpj


    //Multiplica dígitos vezes posições

    function calc_digitos_posicoes(digitos, posicoes = 10, soma_digitos = 0) {

        // Garante que o valor é uma string
        digitos = digitos.toString();

        // Faz a soma dos dígitos com a posição
        // Ex. para 10 posições:
        //   0    2    5    4    6    2    8    8   4
        // x10   x9   x8   x7   x6   x5   x4   x3  x2
        //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196

        for(var i = 0; i < digitos.length; i++){
            // Preenche a soma com o dígito vezes a posição
            soma_digitos = soma_digitos + (digitos[i] * posicoes);

            // Subtrai 1 da posição
            posicoes--;

            // Parte específica para CNPJ
            // Ex.: 5-4-3-2-9-8-7-6-5-4-3-2
            if (posicoes < 2) {
            // Retorno a posição para 9
                posicoes = 9;
            }
        }

        // Captura o resto da divisão entre soma_digitos dividido por 11
        // Ex.: 196 % 11 = 9
        soma_digitos = soma_digitos % 11;

        // Verifica se soma_digitos é menor que 2
        if (soma_digitos < 2){
            // soma_digitos agora será zero
            soma_digitos = 0;
        } else {
            // Se for maior que 2, o resultado é 11 menos soma_digitos
            // Ex.: 11 - 9 = 2
            // Nosso dígito procurado é 2
            soma_digitos = 11 - soma_digitos;
        }

        // Concatena mais um dígito aos primeiro nove dígitos
        // Ex.: 025462884 + 2 = 0254628842
        var cpf = digitos + soma_digitos;

        // Retorna
        return cpf;

    } 

    //Valida CPF
    function valida_cpfs(valor){

        // Garante que o valor é uma string
        valor = valor.toString();

        // Remove caracteres inválidos do valor
        valor = valor.replace(/[^0-9]/g, '');


        // Captura os 9 primeiros dígitos do CPF
        // Ex.: 02546288423 = 025462884
        var digitos = valor.substr(0, 9);

        // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
        var novo_cpf = calc_digitos_posicoes(digitos);

        // Faz o cálculo dos 10 dígitos do CPF para obter o último dígito
        var novo_cpf = calc_digitos_posicoes(novo_cpf, 11);

        // Verifica se o novo CPF gerado é idêntico ao CPF enviado

        if(novo_cpf === valor){
            // CPF válido
            return true;
            } else {
            // CPF inválido
            return false;
        }
    } 



    //Valida o CPF 2

    function valida_cpf(valor) {

        // Verifica se é CPF ou CNPJ
        var valida = verifica_cpf(valor);

        // Garante que o valor é uma string
        valor = valor.toString();

        // Remove caracteres inválidos do valor
        valor = valor.replace(/[^0-9]/g, '');


        // Valida CPF
        if (valida === 'CPF') {
            // Retorna true para cpf válido
            return valida_cpfs(valor);
            } 

            // Não retorna nada
            else {
            return false;
        }

    } 


    function formata_cpf(valor) {

        // O valor formatado
        var formatado = false;

        // Verifica se é CPF ou CNPJ
        var valida = verifica_cpf(valor);

        // Garante que o valor é uma string
        valor = valor.toString();

        // Remove caracteres inválidos do valor
        valor = valor.replace(/[^0-9]/g, '');


        // Valida CPF
        if (valida === 'CPF') {

            // Verifica se o CPF é válido
            if (valida_cpf(valor)) {

                // Formata o CPF ###.###.###-##
                formatado  = valor.substr(0,3) + '.';
                formatado += valor.substr(3,3) + '.';
                formatado += valor.substr(6,3) + '-';
                formatado += valor.substr(9,2) + '';

            }

        }

        return formatado;

    } 


    $(function(){

    // Aciona a validação ao sair do input
        $('.cpf').blur(function(){

            // O CPF ou CNPJ
            var cpf = $(this).val();

            // Testa a validação
            if (valida_cpf(cpf) ){

                formata_cpf(cpf);

            } else {
                Swal.fire({

                    title: 'Erro!',

                    icon: 'error',

                    text: 'CPF inválido!',

                });
            }

        });

    });


}



//iniciando
Init();
Main.Init();



