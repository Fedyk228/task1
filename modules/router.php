<?php

define('pageId', array_pop(explode('/', $_SERVER['REQUEST_URI'])));


class Router
{

    static private $routes_nologin = [
        [ 'url' => '/', 'view' => 'home', 'title' => 'Home page' ],
        [ 'url' => '/login', 'view' => 'login', 'title' => 'Login App' ]
    ];

    static private $routes_login = [
        [ 'url' => '/', 'view' => 'home', 'title' => 'Home page' ],
        [ 'url' => '/add-comment', 'view' => 'add_comment', 'title' => 'Add comment' ],
        [ 'url' => '/edit-comment/' . pageId, 'view' => 'edit_comment', 'title' => 'Edit comment' ]
    ];



    static private $not_found = [ 'view' => '404', 'title' => 'Page not found' ];

    static public function getRoute($key)
    {
        if($_SESSION['login'])
            $Routes = self::$routes_login;
        else
            $Routes = self::$routes_nologin;



        foreach ($Routes as $route) :
                if($route['url'] == $_SERVER['REQUEST_URI'])
                    return $route[$key];
        endforeach;

        return self::$not_found[$key];
    }

    static public function redirect($url)
    {
        echo "<script>window.location.assign('$url')</script>";
    }
}

if($_GET['p'] == 'logout')
    Actions::logout();

?>