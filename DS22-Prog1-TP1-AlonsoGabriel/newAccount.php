<?php
require_once 'savings.php';
require_once 'current.php';
require_once 'specialSavings.php';

if (isset($_POST['name']) && $_POST['name'] !== '' && isset($_POST['balance']))
{
    if($_POST['type'] === 'sa')
    {
        $account = new SavingsAccount(rand(1000, 9999), $_POST['name'], (int) $_POST['balance']);
    } elseif($_POST['type'] === 'ca'){
        $account = new CurrentAccount(rand(1000, 9999), $_POST['name'], (int) $_POST['balance']);
    } elseif($_POST['type'] === 'special'){
        $account = new SpecialSavings(rand(1000, 9999), $_POST['name'], (int) $_POST['balance']);
    }
    else
    {
        die("Error in account type");
    }
}
else
{
    die("Error in name or balance");
}

session_start();
$_SESSION['account'] = serialize($account);

// transactions.php?b= means that the variable b will be passed with get method
$redirect = 'transactions.php?b=' . $account->getBalance() . "&m=Account created successfully";
header("Location: $redirect");