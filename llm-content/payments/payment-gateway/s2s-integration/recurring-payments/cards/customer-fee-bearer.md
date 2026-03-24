---
title: Customer Fee Bearer (CFB) for Recurring Card Payments
description: Implement Customer Fee Bearer (CFB) model for recurring card payments to pass payment gateway fees to customers with transparent fee calculation.
---

# Customer Fee Bearer (CFB) for Recurring Card Payments

The Customer Fee Bearer (CFB) model for recurring card payments allows businesses to pass payment gateway fees to the end customer, improving cost transparency and regulatory compliance. With this enhancement, you can implement transparent fee structures where customers bear the payment processing costs.

If you have already integrated with [Recurring Payments Cards APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/cards/authorization-transaction.md), you must implement an additional API integration step that calculates fees before creating recurring payments.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

## Use Cases

The CFB model for Recurring Payments is particularly useful for:

- **Subscription Services**: Monthly or annual subscription billing with transparent fee structures.
- **EMI Payments**: Instalment-based payments where customers understand the complete cost breakdown.
- **Utility Payments**: Regular utility bill payments with clear fee transparency.
- **Insurance Premiums**: Recurring premium payments with upfront fee disclosure.
- **Membership Fees**: Club or service memberships with transparent cost structures.

## Prerequisites

You must have:
- An active Razorpay account.
- Existing recurring payment setup with card payments.

## Integration Steps

Follow these steps to implement CFB for your recurring card payments:

### Step 1: Calculate Fees Before Payment Creation

Call Razorpay's `calculate/fees` API endpoint with the intended base amount before creating a recurring payment.

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST 'https://api.razorpay.com/v1/payments/fees' \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "card": {
    "name": "Gaurav Kumar",
    "number": "4386289407660153",
    "cvv": "100",
    "expiry_month": "09",
    "expiry_year": "2028"
  },
  "recurring": 1,
  "save": 1,
  "contact": 9999999999,
  "email": "gaurav.kumar@example.com"
}'

```json: Response
{
  "original_amount": 100,
  "fees": 2,
  "razorpay_fee": 2,
  "tax": 0,
  "amount": 102,
  "currency": "INR"
}
```

  
### Request Parameters

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency sub-unit, such as paise (in case of INR). For example, for an actual amount of ₹299.35, the value of this field should be `29935`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. Length must be of 3 characters.

`method` _mandatory_
: `string` Payment method used to make the payment. In this case, it is `card`.

`card` _mandatory_
: `object` Additional fields to accept card payments.

  `name` _mandatory_
  : `string` The name of the cardholder.

  `number` _mandatory_
  : `string` The card number.

  `cvv` _mandatory_
  : `string` 3-digit CVV code given at the back of the card.

  `expiry_month` _mandatory_
  : `string` The month of expiry of the card in `MM` format.

  `expiry_year` _mandatory_
  : `string` The year of expiry of the card in `YYYY` format.

`contact` _mandatory_
: `string` Customer's phone number.

`email` _mandatory_
: `string` Customer's email address.

`recurring` _mandatory_
: `integer` Determines whether the payment is a one-time payment or a recurring payment. Possible values:
    - `1`: It is a recurring payment.
    - `0`: It is a one-time payment.

`save` _mandatory_
: `integer` Determines whether Razorpay should save customer card details as tokens with the card network. Possible values:
    - `1`: Razorpay should save customer card details as tokens with the card network. This will work only if explicit customer consent has been received from the customer.
    - `0`: Razorpay should not save the card details.

    

  
### Response Parameters

`original_amount`
: `integer` Original order amount in rupees (alternative field). For example, `100` for ₹100.

`fees`
: `decimal` Total fees amount in rupees. For example, `1.00` for regular UPI or `236.00` for credit card on UPI.

`razorpay_fee`
: `decimal` Razorpay processing fee in rupees. For example, `1.00` for regular UPI or `200.00` for credit card on UPI.

`tax`
: `decimal` Tax amount on fees in rupees. For example, `0` for regular UPI or `36.00` for credit card on UPI.

`amount`
: `decimal` Total amount including fees in rupees. For example, `101.00` for regular UPI or `336.00` for credit card on UPI.

`currency`
: `string` The currency in which the transaction is made. Length must be of 3 characters. For example, `INR`.
    

### Step 2: Display Fee Breakdown to Customer

Use the Calculate Fee API response to show customers:
- Original order amount
- Processing fee (convenience fee)
- Total amount to be charged

The fee breakdown must be displayed transparently before the customer confirms payment.

### Step 3: Update Payment Creation Request

In your payment creation request to Razorpay, use the values from the fee calculation step to ensure:

- The correct total amount is presented to the customer.
- The final payment entity reflects the business and customer share as required by policy.
- Proper fee breakup is maintained for compliance.

Refer to the [Create a Subsequent Card Payment API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/cards/create-subsequent-payments.md#32-create-a-recurring-payment) to proceed.

## Related Information

- [Recurring Payments Documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments.md)
- [Recurring Payments APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments.md)
