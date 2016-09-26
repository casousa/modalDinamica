$('document').ready(function () {
    requestAjax();
});

// Reponsável pela request ajax e inserção de mensagens na modal.
function requestAjax() {
    $('.enviar').on('click', function () {
        var $url_request  = $('.enviar').data('url-request');
        var $url_redirect = $('.enviar').data('url-redirect');

        $.ajax({
            method: "POST",
            url: $url_request,
            data: {'descricao': $('#descricao').val()}
        }).success(function (data) {
            var result = data.result;
            if(result.msg == 'Success'){
                $(location).attr('href',$url_redirect);
            }
            else{
                $('.content-redirect').html(result.msg);
            }
        }).fail(function (data) {
            $('.content-redirect').html('<h4 class="text-danger">Não foi possível realizar a requisição.</h4>');
        }).done(function () {});
    });
}