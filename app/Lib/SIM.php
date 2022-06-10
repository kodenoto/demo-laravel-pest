<?php

namespace App\Lib;

use Exception;

class SIM
{
    public function isValidAge($umur)
    {
        if (is_string($umur) || !is_numeric($umur)) {
            throw new Exception("Please input only number");
        }

        if ($umur < 1) {
            throw new Exception("Number must be greather than 0");
        }

        if ($umur >= 17 && $umur <= 50) {
            return true;
        }

        return false;
    }
}
