jQuery(document).ready(function ($) {
    function changeVal(elem) {
        if (elem.val() === 'off') elem.val('on');
        else if (elem.val() === 'on') elem.val('off');
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) === 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    if ($('#create').length > 0) {
        $('#submit').hide();
    }

    $('#show-password').click(function () {
        $('#password-field').removeAttr('type');
        $(this).hide();
        $('#hide-password').show();
    });

    $('#hide-password').click(function () {
        $('#password-field').attr('type', 'password');
        $(this).hide();
        $('#show-password').show();
    });

    if (getCookie('agree') === "yes") {
        $('.terms-cms-container').hide();
        $('.db-enter').show();
    }

    $('#terms-cms-chbox').change(function () {
        changeVal($(this));
        $('#terms-cms-btm').prop('disabled', function(i, v) { return !v; });
        console.log($(this).val());
    });
    $('#terms-cms-btm').click(function () {
        setCookie('agree', 'yes', 1);
        $('.terms-cms-container').hide();
        $('.db-enter').show();
    });
});