jQuery(document).ready(function ($) {
    $('#get-started').click(function () {
        $('#start').hide();
        $('#form-config-db').show();
    });
    $('#conf-continue').click(function () {
        $('#db-form').hide();
        $('#finish-conf').show();
    });
    $('#language-button').click(function () {
        $('.lang-selection').toggle();
    });
});