<?php


class Validate
{
    /**
     * Validates username given on the login/signup page
     * checks to see that a string is all alphabetic (no numbers).
     * @param $username
     * @return bool
     */
    static function validUsername($username)
    {
        return (strlen($username) >= 2 && !ctype_digit($username));
    }

    /**
     * Validates the password given on the login/signup page
     * @param $password
     * @return bool
     */
     static function validPassword($password)
    {
        $number = preg_match('@[0-9]@', $password);
        return (strlen($password) >= 8 && $number);

    }

    /**
     * @param $email
     * @return mixed
     */
    static function validEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);

    }

    /**
     * Validates the rice boxes selected in the menu page
     * @param $rice
     * @return void
     */
    function validSelectionRice($rice)
    {

    }
}



