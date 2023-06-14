<?php

use utils\App;
use Http\Form\LoginForm;
use utils\Authenticator;
use utils\Session;

$db = App::resolve('utils\Database');

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();

if (empty($form->validate($email, $password))) {

    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {
        redirect('/');
    }

    return view(
        'session/login.view.php',
        [
            'errors' => [
                'email' => 'No matching credentials found!'
            ]
        ]
    );
}

Session::flash("errors", $form->getErrors());

Session::flash(
    "old",
    [
        "email" => $_POST['email']
    ]
);

return redirect('/login');
