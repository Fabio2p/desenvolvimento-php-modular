jQuery(function() {

    jQuery("form[name='login_submit']").submit(function() {

        var host = location.hostname;

        var path = location.pathname;

        var pass = jQuery("input[name=pass]").val();

        var user = jQuery("input[name=user]").val();

        var token = jQuery("input[name=token]").val();

        var verify = jQuery("input[name=verify]").val();

        jQuery.ajax({

            type: 'POST',

            url: 'http://' + host + path + '/?module=Users&option=Login&view=Index',

            datatype: 'html',
            
            async: true,

            data: {pass:pass, user:user,token:token,verify:verify},

            success: function(response) {

                jQuery('#results').empty().html(response);
            }
        });

        return false;
    });

});