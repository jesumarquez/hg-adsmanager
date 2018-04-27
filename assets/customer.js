jQuery(document).ready(function($) {

    $( '#hg_add_customer_ajax_form' ).submit( function(event){
        event.preventDefault();

        var data = {
            'action': 'customer_form_post',
            'customerName': $("#customer-name").val()
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
            $(" #hg_customer_form_feedback ").html( "<h2>" +  resp.responseJSON.data +  ".</h2><br>" );                  
        })
        .always( function() {
            event.target.reset();
        });;
    });

    
});

function editCustomer(id, name) {
    event.preventDefault();
    jQuery('#customer-id').val(id);
    jQuery('#customer-name').val(name);
    jQuery('#save').removeClass('hidden');  
    jQuery('#cancel').removeClass('hidden');  
    jQuery('#submit').addClass('hidden');  
}

function cancelEditCustomer() {
    jQuery('#customer-id').val('');
    jQuery('#save').addClass('hidden');  
    jQuery('#cancel').addClass('hidden');  
    jQuery('#submit').removeClass('hidden');    
}

function updateCustomer() {
    event.preventDefault();
    var data = {
        'action': 'customer_form_put',
        'customerId': jQuery("#customer-id").val(),     // We pass php values differently!
        'customerName': jQuery("#customer-name").val()
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
        jQuery(" #hg_customer_form_feedback ").html( "<h2>" +  resp.responseJSON.data +  ".</h2><br>" );                  
    })
    .always( function() {
        event.target.reset();
    });;
}

function deleteCustomer(id) {
    event.preventDefault();
    var data = {
        'action': 'customer_form_delete',
        'customerId': id,     // We pass php values differently!
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
        jQuery(" #hg_customer_form_feedback ").html( "<h2>" +  resp.responseJSON.data +  ".</h2><br>" );                  
    })
    .always( function() {
        event.target.reset();
    });;
}