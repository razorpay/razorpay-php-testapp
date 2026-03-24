---
title: Cardless EMI - S2S
description: Know how you can configure cardless EMI as a payment method on your S2S integration.
---

# Cardless EMI - S2S

Using Razorpay, you can let your customers use Cardless EMI as a payment method to convert their payment amount to EMIs without needing their debit or credit card. Customers enjoy the benefits of the EMI as the payments are made using credits approved by the supported Cardless EMI Payment Partners.

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

## Supported Payment Partners

Following is the list of supported Payment Partners for Cardless EMI:

Banks | Provider Code | Minimum Order Amount
---
ICICI Bank | `icic` | ₹7000 
---
IDFC Bank | `idfb` | ₹5000
---
HDFC Bank | `hdfc` | ₹5000
---
Kotak Bank| `kkbk` | ₹3000
---
axio | `walnut369` | ₹900 
---
Fibe | `earlysalary` | ₹3000  
---
ZestMoney | `zestmoney` | ₹3000

## Payment Flow

The payment flow for a customer using Cardless EMI is described below:

1. Customers enter the required details on the Checkout form and select **EMI**.
1. Customer selects the preferred cardless EMI service provider.
1. If the amount entered in the Checkout is eligible for EMI, customers are sent an OTP on their registered mobile numbers to authenticate their account with the selected cardless EMI service provider.
1. If the entered mobile number is invalid, an error message is displayed that the user does not have an account with the service provider.
1. After the successful verification, customers select EMI plan of their choice and complete the transaction.

You will receive the entire transaction amount from the Cardless EMI service provider. As per the terms and conditions, the customers pay the total order amount with additional interest (if any) as EMIs to the provider.

## Prerequisites

- Keep the API keys (a combination of `Key_Id` and `Key_Secret`) handy for integration.
- [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard.
- Integrate with [Razorpay APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md) to accept payments on your website or app.

## Integration Step

After the order is created and the customer's payment details are obtained, the information should be sent to Razorpay to complete the payment. You can do this by passing `method = cardless_emi` and `provider=` while creating the payment.

/payments/create/json

```curl: Request
curl -u : \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
 -d '{
  "amount": "100",
  "currency": "INR",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "order_id": "order_EAkbvXiCJlwhHR",
  "method": "cardless_emi",
  "provider_name": "earlysalary"
}'
```json: Response
{
  "razorpay_payment_id": "pay_FVptEVkDdNzFx8",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/FVptEs3cSWX1fs/authorize"
    }
  ]
}
```

#### Request Parameters
The payment request for each of the supported payment methods will slightly vary. Know more about the [relevant payment request fields](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods.md).

#### Response Parameters

If the payment request is valid, the response contains the following fields.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` An indication of the next step available to you to continue the payment process. The value here is `redirect`. Use this URL to redirect the customer to the bank's page.

    `url`
    : `string`  URL to be used for the action indicated.
