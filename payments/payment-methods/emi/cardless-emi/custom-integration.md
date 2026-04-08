---
title: Cardless EMI - Custom Checkout
description: Extend easy EMI payment options for your customers on the Custom Checkout. Customers can make automatic EMI payments without using any credit or debit card.
---

# Cardless EMI - Custom Checkout

Using Razorpay, you can let your customers use Cardless EMI as a payment method to convert their payment amount to EMIs without the need of a debit or credit card. Customers enjoy the benefits of the EMI as the payments are made using credits approved by the supported Cardless EMI Payment Partners.

> **INFO**
>
> 
> **Feature Enablement**
> 
> Cardless EMI as a payment method is not enabled by default. Raise a request with our [Support Team](https://razorpay.com/support/#request) to enable this feature.
> 

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

> **INFO**
>
> 
> **Minimum Order Amount**
> 
> To avail Cardless EMI payment option at your checkout, your customers should place a minimum order amount.
> - ₹1000 for **ZestMoney**.
> - ₹3000 for **Fibe**.
> - ₹5000 for the banks mentioned above.
> 

## Payment Flow

The payment flow for a customer using cardless EMI at Custom Checkout is described below:

1. Customers enter the required details on the Checkout form and select **EMI**.
1. Customer selects the preferred cardless EMI service provider.
1. If the amount entered in the Checkout is eligible for EMI, customers are sent an OTP on their registered mobile numbers to authenticate their account with the selected cardless EMI service provider.
1. In case, the entered mobile number is invalid, an error message is displayed that the user does not have an account with the service provider.
1. After the successful verification, customers select EMI plan of their choice and complete the transaction.

You will receive the entire payment amount from the cardless EMI service provider. Based on the terms and conditions, the customer pays the total payment amount with additional interest (if any) as EMIs to the provider.

## Prerequisites

- Keep the API keys (a combination of `Key_Id` and `Key_Secret`) handy for integration. 
- [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard.
- Have [Razorpay Custom Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom.md) integrated on your website or app.

## Integration Steps

After an order is created and the customer's payment details are obtained, the information should be sent to Razorpay to complete the payment. You can do this by invoking `createPayment` method `method = cardless_emi` and `provider=`.

```js: Sample Request
razorpay.createPayment({
  amount: 500000,
  currency: 'INR',
  email: 'gaurav.kumar@example.com',
  contact: '9123456000',
  order_id: 'order_EAkbvXiCJlwhHR',
  method: 'cardless_emi',
  provider: 'zestmoney'
});
```
