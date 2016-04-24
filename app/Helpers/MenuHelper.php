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
                'href' => '/events',
                'icon'  => 'ico-calendar',
                'id'  => 'event'
            ],
            [
                'href' => '/events',
                'icon'  => 'ico-calendar',
                'id'  => 'event'
            ],
            [
                'href' => '/events',
                'icon'  => 'ico-calendar',
                'id'  => 'event'
            ],
        ];
    }
}