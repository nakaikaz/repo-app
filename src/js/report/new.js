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