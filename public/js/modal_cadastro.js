$(document).ready(function () {
    $(".cadastro_registro").on("click", function (g) {
        g.preventDefault();

        var h = $(this).data("title");
        var i = $("#cadastro-modal");
        
        var c = '<h3 class="word-break">Favor preencher o campo abaixo:</h3>';
            
        i.find(".modal-header .modal-title").html(h);
        i.find(".modal-header").addClass("success");
        i.find(".modal-body section").html(c);
        
        i.modal({show: true});
    });
});



