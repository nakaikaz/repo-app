$(function(){
    var $progress = $('#progress-container');
    var $form = $('#pre-signup-form');
    var $input = $form.find('input[type="email"]');
    var $nameGroup = $form.find('.form-name-group');
    $form.submit(function(event){
        event.preventDefault();
        $nameGroup.removeClass('has-error');
        $form.find('.error-message').hide();
        var email = $input.val();
        if('' === email){
            $('#pre-signup-form .error-required').show();
            $nameGroup.addClass('has-error');
        }
        if('' ==! email && !email.match(/.+@.+\..+/g)){
            $('#pre-signup-form .error-invalid').show();
            $nameGroup.addClass('has-error');
        }
        if($form.find('.has-error').size() > 0){
            return false;
        }
        $progress.show();
        // メールアドレスをポスト
        $.post('/account/pre_signup', {email: email}, null, 'json')
        .done(function(data){
            if(data.status){
                $input.val('');
                $form.hide();
                $('#pre-signup-done-message').fadeIn();
            }else{
                $('#pre-signup-alert').fadeIn();
            }
        })
        .fail(function(jqxhr, status, error){
            console.log(error);
        })
        .always(function(){
            $progress.hide();
        });
    });
});
