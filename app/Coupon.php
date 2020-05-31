<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public static function findByCode($code)
    {   
        return self::where('code', $code)->get();
    }

    public function discount($total)
    {
        if ($this->type == 'fixed') {
            return $this->value;
        } elseif ($this->type == 'percentage') {
            return round(($this->percent_off / 100) * $total);
        } else return 0;
    }
}
