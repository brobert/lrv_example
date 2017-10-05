<?php

namespace App\Helpers;

use App\Models\User;

trait AuthLoginHelper {

    public function showLoginForm() {

        return $this->render('auth.login');
    }

    protected function checkEmail( $email ) {

    }
}