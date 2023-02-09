<?php

class Actions
{
    static public $notify = '';
    static public $err = '';

    static public function validate($value)
    {
        return trim(strip_tags($value));
    }

    static public function login()
    {
        $email = self::validate($_POST['email']);
        $pass = md5(self::validate($_POST['pass']));

        $result = DB::getRow("SELECT * FROM users WHERE email = '$email' AND pass = '$pass'");

        if($result)
        {
            $_SESSION['login'] = $result;
            Router::redirect('/add-comment');
        }
        else
        {
            self::$err = 'Incorrect login or password';
        }

    }

    static public function logout()
    {
        unset($_SESSION['login']);
        Router::redirect('/login');
    }

    static public function addComment()
    {
        $title = self::validate($_POST['title']);
        $text = self::validate($_POST['text']);
        $theme = $_POST['theme'];
        $tags = json_encode($_POST['tags']);
        $level = $_POST['level'];
        $user_id = $_SESSION['login']['id'];

        if($title && $text)
        {
            $result = DB::setData("INSERT INTO comments SET title = '$title',
                                                            text = '$text',
                                                            theme = '$theme',
                                                            tags = '$tags',
                                                            level = '$level',
                                                            user_id = '$user_id'
                     ");

            if($result)
            {
                self::$notify = 'Add comment success';
                self::$err = '';
            }
            else
            {
                self::$notify = '';
                self::$err = 'Error add comment';
            }
        }
        else
        {
            self::$notify = '';
            self::$err = 'Required fields. (Title and Text)';
        }
    }

    static public function getAllComments()
    {
        return DB::getAll("SELECT * FROM comments INNER JOIN users ON comments.user_id = users.id");
    }

    static public function getUserComments()
    {
        $user_id = $_SESSION['login']['id'];

        return DB::getAll("SELECT * FROM comments WHERE user_id = $user_id");
    }

    static public function getOneComment()
    {
        $user_id = $_SESSION['login']['id'];
        $pageId = pageId;

        return DB::getRow("SELECT * FROM comments WHERE id = $pageId AND user_id = $user_id");
    }

    static public function saveComment()
    {
        $title = self::validate($_POST['title']);
        $text = self::validate($_POST['text']);
        $theme = $_POST['theme'];
        $tags = json_encode($_POST['tags']);
        $level = $_POST['level'];
        $user_id = $_SESSION['login']['id'];
        $pageId = pageId;

        if($title && $text)
        {
            $result = DB::setData("UPDATE comments SET title = '$title',
                                                            text = '$text',
                                                            theme = '$theme',
                                                            tags = '$tags',
                                                            level = '$level'
                                                       WHERE id = $pageId AND user_id = $user_id
                     ");

            if($result)
            {
                self::$notify = 'Save comment success';
                self::$err = '';
            }
            else
            {
                self::$notify = '';
                self::$err = 'Error save comment';
            }
        }
        else
        {
            self::$notify = '';
            self::$err = 'Required fields. (Title and Text)';
        }
    }

    static public function removeComment()
    {
        $user_id = $_SESSION['login']['id'];
        $id = $_POST['remove_btn'];

        $result = DB::setData("DELETE FROM comments WHERE id = $id AND user_id = $user_id");

        if($result)
        {
            self::$notify = 'Remove comment success';
            self::$err = '';
        }
        else
        {
            self::$notify = '';
            self::$err = 'Error remove comment';
        }
    }

}



?>