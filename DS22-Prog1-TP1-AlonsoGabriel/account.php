<?php

abstract class Account
{
    /**
     * @var int $number account number.
     */
    protected $number;
    /**
     * @var int $balance accuount balance.
     */
    protected $name;
    /**
     * @var string $name account owner.
     */
    protected $balance;

    public function __construct($number, $name, $balance)
    {
        $this->number = $number;
        $this->name = $name;
        $this->balance = $balance;
    }

    public function deposit($amount)
    {
        $this->balance += $amount;
        return "The deposit was made successfully";
    }

    public function extraction($amount)
    {
        $this->balance -= $amount;
        return "The extraction was made successfully";
    }

    public function getBalance()
    {
        return $this->balance;
    }
}