$(function(){
    var $progress = $('#progress-container');
    var $form = $('#signup-form');

    $form.submit(function(event){
        event.preventDefault();

        $('.form-group', this).removeClass('has-error');
        $('.error-message', this).hide();

        var name = $('#signup-name').val();
        var email = $('#signup-email').val();
        var pass = $('#signup-password').val();
        var pass2 = $('#signup-confirmation').val();
        //var token = $('#signup-token').val();
        var token = location.search.match(/t=(.*?)(&|$)/)[1];

        // 名前のチェック
        if('' === name){
            $('.form-name-group', this).addClass('has-error');
            $('.form-name-group .error-required', this).show();
        }
        // メールアドレスのチェック
        /*if('' === email){
            $('.form-email-group', this).addClass('has-error');
            $('.form-email-group .error-required', this).show();
        }
        if('' !== email && !email.match(/.+@.+\..+/g)){
            $('.form-email-group', this).addClass('has-error');
            $('.form-email-group .error-invalid', this).show();
        }*/
        // パスワードのチェック
        if('' === pass){
            $('.form-password-group', this).addClass('has-error');
            $('.form-password-group .error-required', this).show();
        }else if(pass.length < 8){
            $('.form-password-group', this).addClass('has-error');
            $('.form-password-group .error-minlength', this).show();
        }
        // パスワード確認のチェック
        if('' === pass2 || pass !== pass2){
            $('.form-confirmation-group', this).addClass('has-error');
            $('.form-confirmation-group .error-passwordNoMatch', this).show();
        }

        if($('.has-error', this).size() > 0){
            return false;
        }
        $progress.show();
        $.post('/account/signup', {name: name, email: email, password: pass, token: token}, null, 'json')
        .done(function(data){
            if(data.status){
                console.log(data);
                location.href = '/report/list';
            }else{
                console.log(data);
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
