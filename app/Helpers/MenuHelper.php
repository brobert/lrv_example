<?php

namespace App\Helpers;

use App\Models\User;
/**
 * @author Robert
 *
 */
trait MenuHelper {

    public function getMenu( User $user ) {
        return [
            [
                'target'    => 'messages-box',
                'icon'      => 'ico-envelop3',
                'id'        => 'message',
                'children'  => [
                    [],
                    []
                ]
            ],
            [
                'href' => '/events',
                'icon'  => 'ico-calendar',
                'id'  => 'event'
            ],
            [
                'href' => '/trips',
                'icon'  => 'ico-calendar',
                'id'  => 'trip'
            ],
            [
                'href' => '/payments',
                'icon'  => 'ico-money',
                'id'  => 'payment'
            ],
        ];
    }
}