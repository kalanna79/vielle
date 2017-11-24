/**
 * Created by natacha on 10/10/2017.
 */

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 3000);
