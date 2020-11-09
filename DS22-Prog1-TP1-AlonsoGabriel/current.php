<?php
require_once 'account.php';

/**
 * Cuenta corriente
 * 
 * Permite descubierto hasta 2000
 * 
 * Máximo de extracción 2000
 * 
 */

class CurrentAccount extends Account
{
    /**
     * @var int $uncovered uncovered balance.
     */
    protected $uncovered;

    public function __construct($number, $name, $balance, $unc = 2000)
    {
        parent::__construct($number, $name, $balance);
        $this->uncovered = $unc;
    }

    public function extraction($amount)
    {
        if($amount > $this->balance + $this->uncovered)
        {
            return "The amount entered exceeds your balance";
        }
        else
        {
            return parent::extraction($amount);
        }
    }
}