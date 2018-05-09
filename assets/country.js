jQuery(document).ready(function($) {

    $( '#hg_add_country_ajax_form' ).submit( function(event){
        event.preventDefault();

        var data = {
            'action': 'country_form_post',
            'countryName': $("#country-name").val(),     // We pass php values differently!
            'code': $("#code").val(),
            'active': jQuery("#active").is(":checked") ? 1 : 0
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
            $('.notice').show();
            var message = resp.responseJSON ? resp.responseJSON.data : 'Ups! error inesperado';
            $('.notice p').html( message );
        })
        .always( function() {
            event.target.reset();
        });;
    });

    
});

function editCountry(id, name, code, active) {
    event.preventDefault();
    jQuery('#country-id').val(id);
    jQuery('#country-name').val(name);
    jQuery('#code').val(code);
    jQuery('#active').prop('checked', active);
    jQuery('#save').removeClass('hidden');  
    jQuery('#cancel').removeClass('hidden');  
    jQuery('#submit').addClass('hidden');  
}

function cancelEditCountry() {
    jQuery('#country-id').val('');
    jQuery('#active').prop('checked', false);
    jQuery('#save').addClass('hidden');  
    jQuery('#cancel').addClass('hidden');  
    jQuery('#submit').removeClass('hidden');    
}

function updateCountry() {
    event.preventDefault();
    var data = {
        'action': 'country_form_put',
        'countryId': jQuery("#country-id").val(),     // We pass php values differently!
        'countryName': jQuery("#country-name").val(),     // We pass php values differently!
        'code': jQuery("#code").val(),
        'active': jQuery("#active").is(":checked") ? 1 : 0
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
        jQuery('.notice').show();
        var message = resp.responseJSON ? resp.responseJSON.data : 'Ups! error inesperado';
        jQuery('.notice p').html( message );    })
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
        jQuery('.notice').show();
        var message = resp.responseJSON ? resp.responseJSON.data : 'Ups! error inesperado';
        jQuery('.notice p').html( message );    })
    .always( function() {
        event.target.reset();
    });;
}