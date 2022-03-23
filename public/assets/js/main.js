
let option = '';

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
                        $("form[name='edituser'] #email").val(json.email);
                        $("form[name='edituser'] #phone").val(json.phone);
                        $("form[name='edituser'] #cep").val(json.cep);
                        $("form[name='edituser'] #province").val(json.province);
                        $("form[name='edituser'] #city").val(json.city);
                        $("form[name='edituser'] #district").val(json.district);
                        $("form[name='edituser'] #number").val(json.number);
                        $("form[name='edituser'] #complemet").val(json.complemet);
    
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
     
        $("form[name='pdfreports']").submit(function(event){
        
            event.preventDefault();
    
            $.ajax({
                url: 'ajax/updateUser',
                type: 'POST',
                data:{ 
                    id: $("form[name='edituser'] #id").val(json.id),
                    name: $("form[name='edituser'] #name").val(json.name),
                    email: $("form[name='edituser'] #email").val(json.email),
                    email: $("form[name='edituser'] #phone").val(json.phone),
                    cep: $("form[name='edituser'] #cep").val(json.cep),
                    province: $("form[name='edituser'] #province").val(json.province),
                    city: $("form[name='edituser'] #city").val(json.city),
                    district: $("form[name='edituser'] #district").val(json.district),
                    number: $("form[name='edituser'] #number").val(json.number),
                    complemet: $("form[name='edituser'] #complemet").val(json.complemet),
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

                        $('.ui-datepicker-current-day').trigger('click');

                        if(data.reloadUsers){

                            Swal.close();
                            $('.modal').modal('hide');
                            $('select').trigger('change')
                            $('.modal-backdrop').remove()

                        } else {
                            
                            if(data.reload && !data.alert){

                                Reload();

                                // Swal.close();

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

                                        // $('[]').trigger('change')
                                    
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
});

    }
}


Main.Init();



$(document).ready(function() {



    function limpa_formulário_cep() {
        $("input[id='complement']").val("");
        $("input[id='address']").val("");
        $("input[id='citys']").val("");
        $("input[id='provinces']").val("");
        // $("input[id='ibge']").val("");
    }
    
    //Quando o campo cep perde o foco.
    // $("input[id='cep']").on('click',function() {
    // });
    $("input[id='cep']").blur(function() {
    
    
    var cep = $(this).val().replace(/\D/g, '');
    
    if (cep != "") {
    
        var validacep = /^[0-9]{8}$/;
        
        if(validacep.test(cep)) {
        
            $("input[id='complement']").val("...");
            $("input[id='address']").val("...");
            $("input[id='city']").val("...");
            $("input[id='province']").val("...");
            // $("input[id='ibge']").val("...");
            
            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
        
                if (!("erro" in dados)) {
                    $("input[id='complement']").val(dados.logradouro);
                    $("input[id='district']").val(dados.bairro);
                    $("input[id='city']").val(dados.localidade);
                    $("input[id='province']").val(dados.uf);
                    // $("input[id='ibge']").val(dados.ibge);
                }
                else {
                    limpa_formulário_cep();
                    Swal.fire({
                
                        title: 'Erro!',
                        
                        icon: 'error',
                        
                        text: 'CEP não encontrado!',
                    
                    });
                }
            });
        }else {
                //cep é inválido.
                limpa_formulário_cep();
                Swal.fire({
                
                    title: 'Erro!',
                    
                    icon: 'error',
                    
                    text: 'Formato de CEP inválido!',
                
                });
            
        }
        }else {
            //cep sem valor, limpa formulário.
                limpa_formulário_cep();
        }
    });
});
// $(function () {
//     var nua = navigator.userAgent
//     var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
//     if (isAndroid) {
//         $('select.form-control').removeClass('form-control').css('width', '100%')
//     }
// })


