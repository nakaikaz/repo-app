$(function(){
    var $form = $('#pre-signup-form');
    var $input = $('#pre-signup-form input[type="email"]');
    var $formGroup = $('#pre-signup-form .form-group');
    var $doneMessage = $('#pre-signup-done-message');
    var $alert = $('#pre-signup-alert');
    var $errorRequired = $('#pre-signup-form .error-required');
    var $errorValid = $('#pre-signup-form .error-valid');
    $doneMessage.hide();
    $alert.hide();
    $errorRequired.hide();
    $errorValid.hide();
    $form.submit(function(event){
        event.preventDefault();
        var email = $input.val();
        if("" === email){
            $errorRequired.show();
            $formGroup.addClass('has-error');
            return false;
        }
        if(!email.match(/.+@.+\..+/)){
            $errorValid.show();
            $formGroup.addClass('has-error');
            return false;
        }
        // メールアドレスをポスト
        $.post('/account/pre_signup_email', {email: email}, null, 'json')
        .done(function(data){
            if(data.status){
                $input.val('');
                $form.fadeOut();
                $doneMessage.fadeIn();
            }else{
                $alert.fadeIn();
            }
        })
        .fail(function(jqxhr, status, error){
            console.log(error);
        });
    });
});
