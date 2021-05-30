<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function processTransaction (Request $request)
    {
        $amount = (float)$request->input('amount');
        $unpaid_appliance_rates = (float)$request->input('unpaid_appliance_rates');
        $appliance_rate_cost = (float)$request->input('appliance_rate_cost');
        $tariff_fixed_costs = (float)$request->input('tariff_fixed_costs');
        $price_per_kwh = (float)$request->input('price_per_kwh');

        $paid_for_appliance_rates = $appliance_rate_cost * $unpaid_appliance_rates;
        $rest_amount = $amount - ( $tariff_fixed_costs + $paid_for_appliance_rates );

        $topup_for_energy = 0;
        $sold_energy = 0.0;

        $energy_chunks =  $rest_amount / $price_per_kwh;
        if(strlen(substr(strrchr($energy_chunks, "."), 1)) > 1 ) {
            $sold_energy = round($energy_chunks, 1);
            if( ($sold_energy - $energy_chunks) < 0 ) {
                $sold_energy = $sold_energy + 0.1;
            }

            $topup_for_energy = (($rest_amount * $sold_energy) / $energy_chunks)  - $rest_amount;
        }

        $paid_for_energy = $rest_amount + $topup_for_energy;

        return [
            'data' =>     [
                "paid_for_appliance_rates" => $paid_for_appliance_rates,
                "fully_covered_appliance_rate" => $unpaid_appliance_rates,
                "paid_for_fixed_tariff"  => $tariff_fixed_costs,
                "paid_for_energy" => $paid_for_energy,
                "topup_for_energy" => $topup_for_energy,
                "sold_energy" => round($sold_energy, 1)
            ]
        ];
    }
}
