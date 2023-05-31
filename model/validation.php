<?php

/**
 * Validates username given on the login/signup page
 * checks to see that a string is all alphabetic (no numbers).
 * @param $username
 * @return bool
 */
function validUsername($username)
{
    return (strlen($username) >= 2 && !ctype_digit($username));
}

/**
 * Validates the password given on the login/signup page
 * @param $password
 * @return bool
 */
function validPassword($password)
{
    return true;
}

/**
 * @param $email
 * @return mixed
 */
function validEmail($email)
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


