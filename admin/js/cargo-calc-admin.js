jQuery(document).ready(function ($) {
    $('[data-toggle="datepicker"]').datepicker({
        language: 'ru-RU',
        format: 'dd.mm.yyyy',
        autoHide: true,
        autoPick: true
    });

    var form = $("#form-export");
    var spinner = $('#spinner');

    form.validate();

    $('#btn-submit').click(function (event) {
        event.preventDefault();

        if (form.valid()) {
            var data = {
                action: 'export_csv',
                info: form.serialize()
            };
            var jqxhr = $.post(ajaxurl, data);
            spinner.show();

            jqxhr.done(function (response) {
                console.log(response);
            });

            jqxhr.fail(function (error) {
                console.log(error.statusText);
            });

            jqxhr.always(function () {
                spinner.hide();
            });

        }
    });
});
