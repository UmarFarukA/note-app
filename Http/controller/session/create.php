<?php

use utils\Session;

return view(
    'session/login.view.php',
    [
        "errors" => Session::get("errors")
    ]
);
