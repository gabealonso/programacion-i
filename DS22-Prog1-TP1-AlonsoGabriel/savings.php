<?php
require_once 'account.php';

/** 
* Representa una caja de ahorro
*
* Tope de extracción fijado en cierto monto
*
* No permite descubierto (saldo negativo)
*
*/

class SavingsAccount extends Account
{
    /**
     * @var int $extlim extraction limit.
     */
    protected $extlim;

    public function __construct($number, $name, $balance, $lim = 2000)
    {
        parent::__construct($number, $name, $balance);
        $this->extlim = $lim;
    }

    public function extraction($amount)
    {
        if($amount > $this->balance){
            return "The amount entered exceeds your balance";
        }
        elseif($amount > $this->extlim)
        {
            return "The amount entered exceeds the limit";
        }
        else
        {
            return parent::extraction($amount);
        }
    }
}