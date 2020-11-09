<?php
require_once 'savings.php';

class SpecialSavings extends SavingsAccount
{
    /**
     * @var int $mindep minimum deposit
     */
    protected $mindep;

    public function __construct($number, $name, $balance, $extlim = 2000, $mindep = 1000)
    {
        parent::__construct($number, $name, $balance, $extlim);
        $this->mindep = $mindep;
    }

    public function deposit($amount)
    {
        if($amount < $this->mindep)
        {
            return "Error: minimum deposit is $this->mindep";
        }
        else {
            return parent::deposit($amount);
        }
    }
}