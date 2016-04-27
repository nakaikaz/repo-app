$(function(){
   $.delete = function(url, data, callback, type){
       if($.isFunction(data)){
           type = type || callback, callback = data, data = {};
       }
       return $.ajax({
           url: url,
           method: 'DELETE',
           success: callback,
           data: data,
           contentType: type
       });
   }
   
   $.put = function(url, data, callback, type){
       if($.isFunction(data)){
           type = type || callback, callback = data, data = {};
       }
       return $.ajax({
           url: url,
           method: 'PUT',
           success: callback,
           data: data,
           contentType: type
       });
   }
});
$(function(){
    // セッションを調べてログイン状態か確認
});

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
        if('' !== email && !email.match(/.+@.+\..+/g)){
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

$(function(){
    var $progress = $('#progress-container');
    var $newForm = $('#newForm');
    $('.btn-file', $newForm).on('click', function(e){
        $('input[type="file"]', $newForm).click();
    });
    $(document).on('change', 'input[type="file"]', $newForm, function(){
        var memo = $('.img-memo', $newForm).text();
        var file = $(this).prop('files')[0];
        var fd = new FormData();
        fd.append('image', file);
        fd.append('memo', '');
        //fd.append('email', 'bbb');
        $progress.show();
        $.ajax({
            url: '/report/image',
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false
        })
        .done(function(data){
            if(data.status){
                var reader = new FileReader();
                reader.onload = function(event){
                    var $template = Handlebars.compile($('#img-tmpl').html());
                    $('.img-container', $newForm).append($template({
                        imageName: data.uploaded.name,
                        imageSource: event.target.result,
                        imageAlt: ''
                    }));
                }
                reader.readAsDataURL(file);
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR, textStatus, errorThrown);
        })
        .always(function(){
            $progress.hide();
        });
    });
    
    $(document).on('mouseenter', '.img-box', $newForm, function(){
        $('.glyphicon', $(this)).addClass('visible');
    });
    $(document).on('mouseleave', '.img-box', $newForm, function(){
        $('.glyphicon', $(this)).removeClass('visible');
    });
    $(document).on('mouseover', '.img-box > .glyphicon', $newForm, function(){
        $(this).addClass('hover');
    });
    $(document).on('mousedown', '.img-box > .glyphicon', $newForm, function(){
        $(this).addClass('active');
    });
    $(document).on('mouseleave', '.img-box > .glyphicon', $newForm, function(){
        $(this).removeClass('active').removeClass('hover');
    })
    
    $(document).on('click', '.img-box > .glyphicon-remove', $newForm, function(){
        $img = $(this).next('img');
        $progress.show();
        $.delete('/report/image/' + $img.attr('data-name'))
        .done(function(data){
            console.log(data);
            if(data.status){
                $img.parent('.img-box').remove();
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR, textStatus, errorThrown);
        })
        .always(function(){
            $progress.hide();
        });
    });
    
    $('#add-btn').click(function(event){
        var title = $('#report-title').val();
        var content = $('#report-content').val();
        var images = [];
        $('.img-box', $newForm).each(function(){
            var name = $('img', $(this)).attr('data-name');
            var memo = $('.img-memo', $(this)).text();
            images.push({name: name, memo: memo});
        });
        var r = {title: title, content: content, images: images};
        console.log(r);
        $progress.show();
        $.post('/report', r)
        .done(function(data){
            console.log(data);
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR, textStatus, errorThrown);
        })
        .always(function(){
            $progress.hide();
        });
    });
    
    var CONST = (function(){
        function CONST(){}
        CONST.prototype.EDITING_PROP = 'editing';
        return CONST;
    })();
    $(document).on('dblclick', '.img-box > .img-memo', $newForm, function(){
        $memoElement = $(this);
        $textArea = $(this).next('.tmp-textarea');
        $textArea.val($(this).text());
        if(!$memoElement.hasClass(CONST.EDITING_PROP)){
            // 編集可能状態クラスを追加
            $memoElement.addClass(CONST.EDITING_PROP);
            // 要素を非表示にして、テキストボックスを表示
            $memoElement.hide().next('.tmp-textarea').show();
            // focusを失うかEnterキーが押されたら、テキストエリアの値を元の要素にセットし、テキストエリアを非表示に
            function done(){
                var value = $textArea.val();
                $memoElement.removeClass(CONST.EDITING_PROP).text(value);
                $textArea.hide();
                // 元の要素を表示
                $memoElement.show();
            }
            $textArea.on('blur', done);
            $textArea.on('keydown', function(e){ if(e.keyCode === 13){ done(); } });
            $textArea.on('remove', function(){
                // テキストエリアからイベントを全て削除
                $textArea.off();
            });
            $textArea.focus();
        }
    });

});