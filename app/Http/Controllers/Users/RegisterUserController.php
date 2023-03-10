<?php

namespace App\Http\Controllers\Users;

use Framework\Routing\Router;

class RegisterUserController
{
    protected Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function handle()
    {
        secure();

        $data = validate($_POST, [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // use $data to create a database record...

        $_SESSION['registered'] = true;

        return redirect($this->router->route('show-home-page'));
    }
}
