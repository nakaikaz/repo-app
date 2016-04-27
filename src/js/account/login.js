$(function(){
    var $progress = $('#progress-container');
    var $form = $('#login-form');
    var $alert = $('#login-alert');

    $form.submit(function(event){
        event.preventDefault();

        $('.form-group', this).removeClass('has-error');
        $('.error-message', this).hide();

        var email = $('#login-email').val();
        var pass = $('#login-password').val();

        if('' === email){
            $('.form-email-group', this).addClass('has-error');
            $('.form-email-group .error-required', this).show();
        }
        if('' !== email && !email.match(/.+@.+\..+/g)){
            $('.form-email-group', this).addClass('has-error');
            $('.form-email-group .error-invalid', this).show();
        }
        if('' === pass){
            $('.form-password-group', this).addClass('has-error');
            $('.form-password-group .error-required', this).show();
        }

        if($('.has-error', this).size() > 0){
            return false;
        }

        $progress.show();
        $.post('/account/login', {email: email, password: pass}, '', 'json')
        .done(function(data){
            if(data.status){
                // /report/listへ移動する
                window.location.href = '/report/list';
            }else{
                $alert.show();
            }
        })
        .always(function(data){
            $progress.hide();
        });
    });
});
