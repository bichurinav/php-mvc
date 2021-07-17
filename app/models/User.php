<?php

class User {

    public function signup($POST)
    {
        $error = '';
        $data = array();
        $db = Database::getInstance();
        $data['username'] = trim($POST['name']);
        $data['email'] = trim($POST['email']);
        $data['password'] = trim($POST['password']);
        $data['url_address'] = generate_random_string(8);
        $password_repeat = trim($POST['password2']);

        $pattern_user = '/^[a-zA-Z0-9]{3,16}$/';
        $pattern_password = '/^(?=.*[A-Z])(?=.*[0-9])[0-9a-zA-Z!@#$%^&*]{6,}$/';
        $pattern_email = '/^[\w-]+@\w+\.[A-Za-z]+$/';


        if (empty($data['username']) || !preg_match($pattern_user,  $data['username']))
        {
            $error .= 'invalid username <br />';
        }

        if (empty($data['email']) || !preg_match($pattern_email,  $data['email']))
        {
            $error .= 'invalid email <br />';
        }

        if (empty($data['password']) || !preg_match($pattern_password,  $data['password']))
        {
            $error .= 'invalid password <br/>';
        }

        if ($data['password'] !== $password_repeat)
        {
            $error .= 'different passwords';
        }

        // if url_address exists
        $query = 'SELECT * FROM users WHERE url_address = :url_address';
        $result = $db->read($query, ['url_address' => $data['url_address']]);
        if (is_array($result)) $data['url_address'] = generate_random_string(8);;

        // if email exists
        $query = 'SELECT * FROM users WHERE email = :email';
        $result = $db->read($query, ['email' => $data['email']]);
        if (is_array($result)) $error .= 'email exists';

        // create user
        if ($error == '')
        {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            $data['date'] = date('Y-m-d H:i:s');
            $data['rank'] = 'customer';

            $query = '
                INSERT INTO users (url_address, username, email, password, date, rank)
                 VALUES (:url_address, :username, :email, :password, :date, :rank)
            ';
            $result = $db->write($query, $data);

            if ($result)
            {
                header('Location: ' . ROOT . '/login');
                exit;
            }
        }

        $_SESSION['error'] = $error;
    }

    public function login($POST)
    {

    }

    public function get_user($url)
    {

    }

}