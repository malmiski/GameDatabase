<?php
require("DatabaseManager.php");
function is_logged_in()
{
    session_start();
    return isset($_SESSION["username"]);
}

function try_login($username, $pass)
{
    if (user_matches($username, crypt($pass, "saltsalt"))) {
        session_start();
        $_SESSION["username"] = "mo";
        return true;
    }
    return false;
}

function logout()
{
    session_start();
    session_destroy();
}


function try_register($user, $password)
{
    if (user_exists($user)) {
        return false;
    }
    $db = DatabaseManager::getInstance();
    $db->mongoInsert("users", ["username" => $user, "password" => $password]);
}

function user_exists($user)
{
    $db = DatabaseManager::getInstance();
    // Check if the user exists and the password matches
    return ($db->mongoQuery("users", ["username"=>$user]) == []);
}

function user_matches($user, $pass)
{
    $db = DatabaseManager::getInstance();
    // Check if the user exists and the password matches
    return ($db->mongoQuery("users", ["username"=>$user, "password"=>$pass]) == []);
}
