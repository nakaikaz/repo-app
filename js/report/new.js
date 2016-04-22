$(function(){
    var $newForm = $('#newForm');
    $('.btn-file', $newForm).on('click', function(e){
        $('input[type="file"]', $newForm).click(); 
    });
    $(document).on('change', 'input[type="file"]', $newForm, function(){
        var $this = $(this);
        var file = $this.prop('files')[0];
        console.log(file);
        var fd = new FormData();
        fd.append('image', file);
        fd.append('memo', 'aaa');
        //fd.append('email', 'bbb');
        $.ajax({
            url: '/report/image',
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false
        })
        .done(function(data){
            console.log(data);
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR, textStatus, errorThrown);
        });
    });
});