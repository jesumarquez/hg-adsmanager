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
            window.location.reload();
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

function editCountry(id, name) {
    event.preventDefault();
    jQuery('#country-id').val(id);
    jQuery('#country-name').val(name);
    jQuery('#save').removeClass('hidden');  
    jQuery('#cancel').removeClass('hidden');  
    jQuery('#submit').addClass('hidden');  
}

function cancelEditCountry() {
    jQuery('#country-id').val('');
    jQuery('#save').addClass('hidden');  
    jQuery('#cancel').addClass('hidden');  
    jQuery('#submit').removeClass('hidden');    
}

function updateCountry() {
    event.preventDefault();
    var data = {
        'action': 'country_form_put',
        'countryId': jQuery("#country-id").val(),     // We pass php values differently!
        'countryName': jQuery("#country-name").val()     // We pass php values differently!
    };

    jQuery.ajax({
        url:    'admin-ajax.php', //params.ajaxurl, // domain/wp-admin/admin-ajax.php
        type:   'post',                
        data:   data
    })
    .done(function (resp){
        window.location.reload();
        //$(" #nds_form_feedback ").html( "<div class='notice notice-success is-dismissible'><h2>The request was successful </h2>" + resp + '</div>');
        // $(" #nds_form_feedback ").html( "<div class='notice notice-success is-dismissible'>             <p><strong>Settings saved.</strong></p>            <button type='button' class='notice-dismiss'>               <span class='screen-reader-text'>Dismiss this notice.</span>            </button>        </div>" );
    })
    .fail(function (resp){
        jQuery(" #hg_country_form_feedback ").html( "<h2>" +  resp.responseJSON.data +  ".</h2><br>" );                  
    })
    .always( function() {
        event.target.reset();
    });;
}

function deleteCountry(id) {
    event.preventDefault();
    var data = {
        'action': 'country_form_delete',
        'countryId': id,     // We pass php values differently!
    };

    jQuery.ajax({
        url:    'admin-ajax.php', //params.ajaxurl, // domain/wp-admin/admin-ajax.php
        type:   'post',                
        data:   data
    })
    .done(function (resp){
        window.location.reload();
        //$(" #nds_form_feedback ").html( "<div class='notice notice-success is-dismissible'><h2>The request was successful </h2>" + resp + '</div>');
        // $(" #nds_form_feedback ").html( "<div class='notice notice-success is-dismissible'>             <p><strong>Settings saved.</strong></p>            <button type='button' class='notice-dismiss'>               <span class='screen-reader-text'>Dismiss this notice.</span>            </button>        </div>" );
    })
    .fail(function (resp){
        jQuery(" #hg_country_form_feedback ").html( "<h2>" +  resp.responseJSON.data +  ".</h2><br>" );                  
    })
    .always( function() {
        event.target.reset();
    });;
}