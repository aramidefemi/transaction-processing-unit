# Inensus - Transaction Handling

Hi! Are you ready to join our team working on an innovative and exciting project? 

For the test assignment, we would like you to create a basic **transaction processing unit** that is responsible to cover different types of debts and generating energy. 

**Helpful notes:**
- If the sent amount can not cover the debts, just pay as much as you can.
- The energy could be sold as chunks. That means, if the amount can not cover the whole unit; 0.x ( `1<=x<=9` with only one decimal) units could be generated.
- When the rest amount (after all debts are paid) can not fit 0.x; Please topup the amount to the next 0.x. 

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
