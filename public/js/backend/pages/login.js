/* ========================================================================
 * login.js
 * Page/renders: page-login.html
 * Plugins used: parsley
 * ======================================================================== */

'use strict';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'parsley'
        ], factory);
    } else {
        factory();
    }
}(function () {

    $(function () {
        // Login form function
        // ================================
        var $form    = $('form[name=form-login]');

        var $errNode = $('#error-container ul.parsley-errors-list[id=serverSide]');
        $errNode.removeClass('filled').find('li').empty();
        
        $form.find('input').on('keyup', function() {
            var $errNode = $('#error-container ul.parsley-errors-list[id=serverSide]');
            $errNode.removeClass('filled').find('li').empty();
        })
        
        function showErrors( messages ) {
            if ( !$errNode.length ) {
                $errNode = $( '<ul/>', {
                    class: 'parsley-errors-list',
                    id: 'serverSide',
                }).append(
                    $('<li/>', {class: 'parsley-custom-error-message'})
                );
                $('#error-container').append( $errNode );
            } else {
                $errNode.removeClass('filled').find('li').empty();
            }
            
            $errNode.addClass( 'filled' );
            if (typeof( messages ) === 'string') {
                $errNode.find('li').append( $( '<div/>', { text: messages } ) );
            } else {
                Object.keys( messages ).forEach( function( field ) {
                    $errNode.find('li').append( $( '<div/>', { text: messages[ field ].join('<br/>') } ) );
                });
            }
        }
        // On button submit click
        $form.on('click', 'button[type=submit]', function (e) {
            var $this = $(this);
            
            // Run parsley validation
            if ($form.parsley().validate()) {
                // Disable submit button
                $this.prop('disabled', true);

                // start nprogress bar
                NProgress.start();

                $.post(
                    $form.prop('action'),
                    $form.serialize(),
                    function( response, status, reqStatus ) {

                        if ( typeof response === 'object' && response.status.code === 0 ) {
                            window.location.href = (response.data && response.data.location)
                                ? response.data.location
                                :'/';
                        } else {
                            showErrors( response.status.msg );
                        }
                    }
                ).fail(
                    function( xhr, status, statusText) {
                        showErrors( xhr.responseJSON.status.msg );
                        if ( xhr.status === 404 ) {
                            console.info( 'user not found' )
                        }
                    }
                ).always( function() {
                    // done nprogress bar
                    NProgress.done();

                    // redirect user
                    $this.prop('disabled', false);
                });

            } else {
                // toggle animation
                $form
                    .removeClass('animation animating ')
                    .addClass('animation animating ')
                    .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                        $(this).removeClass('animation animating ');
                    });
            }
            // prevent default
            e.preventDefault();
        });
    });

}));