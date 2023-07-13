<?php

namespace utils\Middleware;

class Guest
{
    public function handle()
    {
        if ($_SESSION['user'] ?? false) {
            redirect('/');
            exit();
        }
    }
}
