/**
 * 
 */

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
    if ( window.location.pathname !== '/auth/settings') {
        return;
    }
    var drawTree = function(response, status, code) {
        console.info(response, status, code)
    }
    $.get('/auth/tree', {}, drawTree );
    console.info( window.location );
    
    $('html').on('fa.panelrefresh.refresh', function($panel, cb) {
        debugger;
        console.info('Panel refreshed', $panel);
//        if ( cb ) cb.call(this);
    })
}
))