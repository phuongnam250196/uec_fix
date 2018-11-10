// Common
function gotoUrl(str){
    window.location.href = str;
}

function moneyFormat(n) { 
    var t = n == null ? "0" : n.toString(); 
    return t.replace(/\d(?=(?:\d{3})+(?!\d))/g, "$&,") 
}
// End common
$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 3,
                nav: true
            },
            600: {
                items: 4,
                nav: false
            },
            1000: {
                items: 6,
                nav: true,
                loop: false,
                margin: 20
            }
        }
    })
})
function RegisterEmail(){
    rg_name = $("#rg_name").val();
    rg_email = $("#rg_email").val();
    $.ajax({
        type: "POST",
        url: vncms_url+"/?mod=home&act=saveMail",
        dataType: "text",
        data: {rg_name:rg_name,rg_email:rg_email}
    }).done(function( key ) {
        if (key == 1) {
            var tag_img = "<img src="+URL_IMAGES+"/success-icon-10.png \" style='width:100px;'/><br>";
            $('#result_okok').html(tag_img+"ÄĂ£ gá»­i thĂ´ng tin thĂ nh cĂ´ng<br>Xin quĂ½ khĂ¡ch vui lĂ²ng Ä‘á»£i trong Ă­t phĂºt, chĂºng tĂ´i sáº½ liĂªn há»‡ láº¡i ngay.");
        } else {
            $('#result_okok p').html("Báº¡n vui lĂ²ng nháº­p Ä‘áº§y Ä‘á»§ vĂ  chĂ­nh xĂ¡c thĂ´ng tin, email, sá»‘ Ä‘iá»‡n thoáº¡i !");
        }
    }); 
}
