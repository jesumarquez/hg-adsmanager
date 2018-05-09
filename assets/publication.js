jQuery(document).ready(function($) {

    $( '#hg_add_publication_ajax_form' ).submit( function(event){
        event.preventDefault();

        var data = {
            'action':           'publication_form_post',
            'publicationName':  $("#publication-name").val(),
            'customerId':       $("#customer-id").val(),
            'countryId':        $("#country-id").val(),
            'imageUrl':         $("#image-url").val(),
            'callToActionUrl':  $("#call-to-action-url").val(),
            'startDate':        $("#start-date").val(),
            'endDate':          $("#finish-date").val(),
            'active':           $("#active").is(":checked") ? 1 : 0,
        };

        $.ajax({
            url:    'admin-ajax.php', //params.ajaxurl, // domain/wp-admin/admin-ajax.php
            type:   'post',                
            data:   data
        })
        .done(function (resp){
            window.location.href = '?page=hg_adsmanager_publication';
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


function updatePublication() {
    var $ = jQuery;
    var data = {
                'action':           'publication_form_put',
                'id':               $("#publication-id").val(),
                'publicationName':  $("#publication-name").val(),
                'customerId':       $("#customer-id").val(),
                'countryId':        $("#country-id").val(),
                'imageUrl':         $("#image-url").val(),
                'callToActionUrl':  $("#call-to-action-url").val(),
                'startDate':        $("#start-date").val(),
                'endDate':          $("#finish-date").val(),
                'active':           $("#active").is(":checked") ? 1 : 0,
            };

    $.ajax({
        url:    'admin-ajax.php', //params.ajaxurl, // domain/wp-admin/admin-ajax.php
        type:   'post',                
        data:   data
    })
    .done(function (resp){
        window.location.href = '?page=hg_adsmanager_publication';
    })
    .fail(function (resp){
        $('.notice').show();
        var message = resp.responseJSON ? resp.responseJSON.data : 'Ups! error inesperado';
        $('.notice p').html( message );
    })
    .always( function() {
        event.target.reset();
    });;    
}

function deletePublication() {
    var $ = jQuery;
    var data = {
                'action':   'publication_form_delete',
                'id':       $("#publication-id").val()
            };

    $.ajax({
        url:    'admin-ajax.php', //params.ajaxurl, // domain/wp-admin/admin-ajax.php
        type:   'post',                
        data:   data
    })
    .done(function (resp){
        window.location.href = '?page=hg_adsmanager_publication';
    })
    .fail(function (resp){
        $('.notice').show();
        var message = resp.responseJSON ? resp.responseJSON.data : 'Ups! error inesperado';
        $('.notice p').html( message );
    })
    .always( function() {
        event.target.reset();
    });;        
}