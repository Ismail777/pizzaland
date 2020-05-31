<?php

use App\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'ABC1234',
            'type' => 'fixed',
            'value' => 15,
        ]);

                Coupon::create([
                'code' => 'DEF456',
                'type' => 'percentage',
                'percent_off' => 10,
                ]);
    }
}
