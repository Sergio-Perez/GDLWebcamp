$(function() {
    $(".nombre-sitio").lettering(), $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass("activo"), $('body.calendario .navegacion-principal a:contains("Calendario")').addClass("activo"), $('body.invitados .navegacion-principal a:contains("Invitados")').addClass("activo");
    var a = $(window).height(),
        i = $(".barra").innerHeight();
    $(window).scroll(function() {
        var n = $(window).scrollTop();
        a < n ? ($(".barra").addClass("fixed"), $("body").css({
            "margin-top": i + "px"
        })) : ($(".barra").removeClass("fixed"), $("body").css({
            "margin-top": "0px"
        }))
    }), $(".menu-movil").on("click", function() {
        $(".navegacion-principal").slideToggle()
    }), $(".programa-evento .info-curso:first").show(), $(".menu-programa a:first").addClass("activo"), $(".menu-programa a").on("click", function() {
        $(".menu-programa a").removeClass("activo"), $(this).addClass("activo"), $(".ocultar").hide();
        var n = $(this).attr("href");
        return $(n).fadeIn(1e3), !1
    }), $(".resumen-evento li:nth-child(1) p").animateNumber({
        number: 6
    }, 1200), $(".resumen-evento li:nth-child(2) p").animateNumber({
        number: 15
    }, 1200), $(".resumen-evento li:nth-child(3) p").animateNumber({
        number: 3
    }, 1600), $(".resumen-evento li:nth-child(4) p").animateNumber({
        number: 9
    }, 1200), $(".cuenta-regresiva").countdown("2020/12/28 09:00:00", function(n) {
        $("#dias").html(n.strftime("%D")), $("#horas").html(n.strftime("%H")), $("#minutos").html(n.strftime("%M")), $("#segundos").html(n.strftime("%S"))
    }), $(".invitado-info").colorbox({
        inline: !0,
        width: "50%"
    }), $(".boton_newsletter").colorbox({
        inline: !0,
        width: "50%"
    })
});