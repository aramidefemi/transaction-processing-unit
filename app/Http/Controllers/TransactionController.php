<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function processTransaction (Request $request)
    {
        $body = $request->getContent();
        return [
            'data' =>     [
                "paid_for_appliance_rates" => 400,
                "fully_covered_appliance_rate" =>2,
                "paid_for_fixed_tariff"  => 160,
                "paid_for_energy" => 490,
                "topup_for_energy" => 50,
                "sold_energy" => 0.7
            ]
        ];
    }
}
