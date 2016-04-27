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