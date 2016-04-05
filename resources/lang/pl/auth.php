<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'    => 'Login i hasło nie pasują',
    'throttle'  => 'Błędne logowania. Poczekaj :secods sekund na odblokowanie możliwości logowania.',

    'login' => [
        'form_title'        => 'Logowanie',
        'form_submit'       => 'Zaloguj',
        'forgot_password'   => 'Niepamiętam hasła',

        'fields' => [
            'email'         => 'Podaj email',
            'password'      => 'Podaj hasło',
            'remember_me'   => 'Zapamiętaj mnie'
        ]
    ],
    'register' => [
        'form_title'    => 'Dodaj konto',
        'form_submit'   => 'Utwórz konto',
        'fields' => [
            'name'                  => 'Imię i nazwisko',
            'email'                 => 'E-mail',
            'password'              => 'Hasło',
            'password_confirmation' => 'Potwierdź hasło'
        ]
    ]

];
