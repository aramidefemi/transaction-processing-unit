# Inensus - Transaction Handling

## Request Sample
`POST /api/transactions`
```json
{
    "amount": 1000,
    "unpaid_appliance_rates": 2,
    "appliance_rate_cost": 200,
    "tariff_fixed_costs": 160,
    "price_per_kwh": 700
}
```

## Expected Response
```json
{
    "data": 
    {
        "paid_for_appliance_rates": 400,
        "fully_covered_appliance_rate":2,
        "paid_for_fixed_tariff" : 160,
        "paid_for_energy": 490,
        "topup_for_energy": 50,
        "sold_energy":0.7
    }
}
```
