<?php

use utils\App;
use Http\Form\LoginForm;
use utils\Authenticator;

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

return view(
    'session/login.view.php',
    [
        'errors' => $form->getErrors()
    ]
);




// } else {
//     return view(
//         'session/login.view.php',
//         [
//             'errors' => 'No matching credentials found!'
//         ]
//     );
//     exit();
// }
