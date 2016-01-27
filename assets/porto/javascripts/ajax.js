/**
 * Created by SWD on 27/01/2016.
 */
(function($){
    $('.table').on('click', 'btn-success', function(e){
        e.preventDefault();
        var $a = $(this);
        var url = $a.attr('href');

        $.ajax(url)
            .done(function(data, text, jqxhr){
                alert(jqxhr.responseText);
            })
            .fail(function(jqxhr){
                alert(jqxhr.responseText);
            })
            .always(function(){
                $.a.text("<i class='fa fa-star fa-2x'></i>");
            });
    });
})(jQuery);
