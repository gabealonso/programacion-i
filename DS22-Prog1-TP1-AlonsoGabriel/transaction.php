<?php
require_once 'savings.php';
require_once 'current.php';
require_once 'specialSavings.php';

session_start();
$account = unserialize($_SESSION['account']);

$message = "Transaction error";
switch($_POST['type'])
{
    case "ext":
        $message = $account->extraction($_POST['amount']);
    break;

    case "dep":
        $message = $account->deposit($_POST['amount']);
    break;

    default:
        $message = "Non-existing transaction";
    break;
}

$_SESSION['account'] = serialize($account);
$redirect = 'transactions.php?b=' . $account->getBalance() . "&m=$message";
header("Location: $redirect");