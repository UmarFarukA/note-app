<?php

use utils\Response;

/**
 * The funnction returns the URL of the 
 * passed parameter.
 * @param: value - path of url to return.
 */
function urls($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function dd($value)
{
    "<pre>";
    var_dump($value);
    "</pre>";
}


/**
 * The function sanitize the inputs
 * before passing them to the server.
 * @param: value - input value.
 */
function sanitizeFields($value)
{
    return htmlentities(htmlspecialchars($value));
}

/**
 * This function return the path, the 
 * absolute path of a fille
 * @param: path - filename
 */
function base_path($path)
{
    return BASE_PATH . $path;
}


/**
 * The fuction include the views of 
 * the path file passed as a parameter.
 * @param: path - filename
 * @param: attributes (array)
 */
function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {

        abort($status);
    }
    return true;
}

function abort($code = 404)
{
    // require view("{$code}.php");
    require base_path("views/{$code}.php");
    die();
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = "")
{
    return utils\Session::get('old')[$key] ?? $default;
}
