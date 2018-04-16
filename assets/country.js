jQuery(document).ready(function($) {

    $( '#hg_add_country_ajax_form' ).submit( function(event){
        event.preventDefault();

        var data = {
            'action': 'country_form_post',
            'countryName': $("#country-name").val()     // We pass php values differently!
        };

        $.ajax({
            url:    'admin-ajax.php', //params.ajaxurl, // domain/wp-admin/admin-ajax.php
            type:   'post',                
            data:   data
        })
        .done(function (resp){
            //$(" #nds_form_feedback ").html( "<div class='notice notice-success is-dismissible'><h2>The request was successful </h2>" + resp + '</div>');
            // $(" #nds_form_feedback ").html( "<div class='notice notice-success is-dismissible'>             <p><strong>Settings saved.</strong></p>            <button type='button' class='notice-dismiss'>               <span class='screen-reader-text'>Dismiss this notice.</span>            </button>        </div>" );
        })
        .fail(function (resp){
            $(" #hg_country_form_feedback ").html( "<h2>" +  resp.responseJSON.data +  ".</h2><br>" );                  
        })
        .always( function() {
            event.target.reset();
        });;
    });

});