/**
 * 
 */
/* ========================================================================
 * form.js
 * Page/renders: *.form.html
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
        var $forms    = $('form');
        
        function sendForm( $form, event ) {
            // prevent default
        	event.preventDefault();
            
            var $this = $(this);
            $this.prop('disabled', true);

            // start nprogress bar
            NProgress.start();
            $.ajax(
                $form.prop('action'),
                {
                    data: $form.serialize(),
                    method: $($form.prop('_method')).val() || $form.prop('method'),
                    success: function( response, status, reqStatus ) {
                        console.debug(reqStatus)
                    }
                }
            ).fail(
                function( xhr, status, statusText) {
                    if ( xhr.status === 404 ) {
                        console.info( 'user not found' )
                    }
                    console.debug('form::send::fail: ', xhr, status, statusText );
                }
            ).always( function() {
                // done nprogress bar
                NProgress.done();

                // redirect user
                $this.prop('disabled', false);
            });
        }

        $forms.each( function() {
        	var $form = $(this);
        	
        	$form.on( 'click', 'button[type=submit]', function (event) {

        		return sendForm( $form, event );
        		
        	});
        });

    });

}));