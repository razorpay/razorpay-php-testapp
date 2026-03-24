---
title: Integrate Payment Methods in Custom Checkout
description: Integrate Cardless EMI, Debit and Credit Card EMI and Pay Later payment methods at Custom Checkout.
---

# Integrate Payment Methods in Custom Checkout

You can integrate the following payment methods at Checkout to make your products or services more affordable for the customers:

- **Cardless EMI**

 Use Cardless EMI to convert their payment amount to EMIs, without a debit or a credit card. This makes high-value products affordable for customers, as they can purchase without a large down payment. Some of the Cardless EMI providers in the market are InstaCred, EarlySalary and Zestmoney.

- **Debit and Credit Card EMI**

  EMI is a popular payment method that customers prefer to reduce upfront product payments. The EMIs are available on both debit cards and credit cards.

- **Pay Later** 

  Pay Later offers digital credit to your customers, allowing them to purchase products without making an immediate payment. Some Pay Later providers in the market are FlexiPay by HDFC Bank, ICICI Pay Later, Simpl, and LazyPay.

## Integration Steps

To submit the payment details, you must invoke the `createPayment` method. In this method, add the following parameters and the usual checkout parameters.

## Cardless EMI

Cardless EMI is a checkout payment method that allows customers to convert their payment amount to EMIs. The user does not require a debit or credit card. Make payments via credits approved by the supported Cardless EMI payment partner. 

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

> **WARN**
>
> 
> **Watch Out!**
> 
> The customer should be registered with the cardless EMI payment partner before a payment.
> 

```js: Cardless EMI
var data = {
  amount: 500000,
  currency: 'INR',
  email: 'gaurav.kumar@example.com',
  contact: '9000090000',
  order_id: 'order_EAkbvXiCJlwhHR',
  method: 'cardless_emi',
  provider: 'zestmoney'
});
```

### Request Parameters

`method` _mandatory_
: `string` The payment method to be used by the customer to complete the payment. Here, the value must be `cardless_emi`.

`provider`
: The Cardless EMI provider. Possible values:
    - `hdfc`
    - `icic`
    - `idfb`
    - `kkbk`
    - `zestmoney`
    - `earlysalary`
    - `walnut369`

## Debit and Credit Card EMI

For EMIs, data is the same as the card, with the following differences:

- `method` should be `emi`
- An additional field, `emi_duration` corresponding to the number of months for EMI, should be included. After the customer selects the desired plan, pass the corresponding value in the `emi_duration` field.

```js: EMI
razorpay.createPayment({
  amount: 300000,
  email: 'gaurav.kumar@example.com',
  contact: '9000090000',
  order_id: 'order_9A33XWu170gUtm',
  method: 'emi',
  emi_duration: 9,
  'card[name]': 'Gaurav Kumar',
  'card[number]': '5241810000000000',
  'card[cvv]': '123',
  'card[expiry_month]': '10',
  'card[expiry_year]': '30'
});
```

### Request Parameters

`method` _mandatory_
: `string` The payment method to be used by the customer to complete the payment. Here, the value must be `emi`.

`emi_duration` _mandatory_
: `integer` Enter the duration of the EMI scheme in months. For example, `12`.

`card`
: The debit or credit card details should be entered when making the payment.

    `number` _mandatory_
    : `integer` Unformatted card number.

    `name` _mandatory_
    : `string` The name of the cardholder.

    `expiry_month` _mandatory_
    : `integer` Expiry month for the card in `MM` format.

    `expiry_year` _mandatory_
    : `integer` Expiry year for the card in `YY` format.

    `cvv` _mandatory_
    : `integer` CVV printed on the back of the card.
    
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>       - CVV is not required by default for tokenised cards across all networks.
>       - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>       - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>       - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>       - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.             
>     

### Fetch EMI Plans

To display the available EMI plans, use the Razorpay checkout helper methods to fetch and display the details of the EMI plans. You can use the event ready, as shown below:

```javascript: Request
var razorpay = new Razorpay(...); // as before

    /**
       * The above code remains the same.
       * You can fetch the available EMI plans by adding the below code in your options.
       */
razorpay.once('ready', function() {
  console.log(razorpay.methods.emi_plans);
  console.log(razorpay.methods.netbanking);
})
```json: Response
{
  "HDFC": {
    "min_amount": 300000,
    "plans": {
      "3": 12,
      "6": 12,
      "9": 13,
      "12": 13,
      "18": 15,
      "24": 15
    }
  },
  "AMEX": {
    "min_amount": 500000,
    "plans": {
      "3": 15,
      "6": 15,
      "9": 15,
      "12": 15
    }
  }
  // etc..
}
```

`razorpay.methods.emi_plans`
: `string` Lists the EMI-supported banks with their respective interest rates.

`razorpay.methods.netbanking`
: `string` Contains the list of all banks and bank codes.

## Pay Later

```js: Pay Later
razorpay.createPayment({
  amount: 200000,
  currency: 'INR',
  email: 'gaurav.kumar@example.com',
  contact: '9111145678',
  order_id: 'order_DPzFe1Q1dEObDv',
  method: 'paylater',
  provider: 
});
```

### Request Parameters

`method` _mandatory_
: `string` The payment method to be used by the customer to complete the payment. Here, the value must be `Pay Later`.

`provider` _mandatory_
: The Pay Later provider. Possible values:
    - `lazypay`
    - `paypal`

### Related Information

[EMI² Suite](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi².md)
