---
title: Late Payment Authorisations
description: Check the Late Payment authorisation and its causes, differences between normal and late authorised payments and how to handle them.
---

# Late Payment Authorisations

Late authorisation is a situation that arises when a payment is interrupted by external factors, such as network issues or technical errors at the customer's or bank's end. In such cases, funds may or may not get debited from the customer's bank account, and Razorpay does not receive a bank's payment status.

## How Late Authorisations are Handled

If there is no response from the bank about a payment that a customer has made, the Dashboard displays this transaction's status as `Created.` If there is no response, even after 10 minutes, the transaction is marked as `Failed` due to timeout. After that, Razorpay polls the bank at various intervals for 3 days, from the payment creation day. During this time, if our system receives the payment status from the bank as **Successful**, the payment is marked as `Authorized.` The payments authorised in this manner are considered as late authorised.

![Handle Late authorisation](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/late_auth.jpg.md)

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> On average, less than 0.5% of the total number of payments get late authorised. In cases where funds get debited from the customer's bank account and are not [captured](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments.md), the amount is automatically refunded to the customer. As a best practice, you should subscribe to the [ **`payment.authorized`** webhook ](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md) to get notifications about authorised or failed payments.
> 

Not all payments that appear as failed are considered as late authorised. Late authorisation is a special case of handling technical or manual interruptions that prevent Razorpay from receiving payment status from the bank and proceed with the payment flow.

## What Causes Late Authorisation

Interruptions that prevent a payment gateway from receiving payment status information from the bank is a common cause for late authorisations. In most cases, payments are interrupted because of any of the following reasons:
- Network issues at the customer's end.
- Technical issues at the customer's bank's end.
- Customers closing the pop-up window or pressing the back button after submitting the OTP.

If Razorpay receives the payment status from the bank later, payment is moved to the `authorized` state leading to late payment authorisation. You have little control over these interruptions. Know more about [handling late authorisations](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/late-authorisation/handle.md) to avoid customer inconvenience.

## Normal Authorisations Vs. Late Authorisations

The difference in the payment flow for a normal payment and a late authorised payment is explained in the table below:

**Normal Payment** [columWidth="50"] | **Late Authorised Payment** [columWidth="50"]
---
The customer completes the payment; bank gateway notifies Razorpay. | The customer completes the payment; bank gateway fails to notify Razorpay.
---
If the bank gateway response is **Successful** (customer's bank account is debited), Razorpay records this as an **Authorised** payment. | If there is no response from the bank, the payment remains in the **Created** state for the first 10 minutes and is later marked as **Failed** after getting timed out. The customer's bank account may or may not have been debited.
---
Once authorised, you can either choose to **capture** or **refund** this payment. | This payment can be **Captured** or **Refunded** only if it is late authorised.

**Handy Tips**

Authorised payments are payments that the customer completes. You need to capture the payment for it to be settled in your account.

### Related Information

[ Handle Late Payment Authorisations ](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/late-authorisation/handle.md)
