---
title: FAQs
description: Questions frequently asked on Smart Collect.
---

# FAQs

1. **How can a customer make a payment to a Smart Collect virtual bank account or UPI ID?**

    The customer can make a transaction to the bank account via a simple NEFT, RTGS or IMPS transaction from their preferred internet banking portal.

    In case of a virtual UPI ID, the customer can add the UPI ID in their UPI PSP (Payment Service Provider) app and make a payment.

1. **Can a customer make payment to a virtual bank account via an offline transaction?**

    Yes, customers can visit their bank and fill out an RTGS form, or a NEFT challan with the beneficiary details provided by Razorpay and initiate a transfer from their account. 

    
> **INFO**
>
> 
>     **Note**:
>     Customers cannot deposit cash into a virtual bank account. Only NEFT, RTGS or IMPS transactions are permitted. 
>     

1. **What does a Smart Collect virtual bank account look like?**

Exactly like a normal account! Here's an example:

    
> **SUCCESS**
>
> 
>     **Account Number**
> 
>     **IFSC**: RAZR0000001 

>     **Name**: Acme Corporation 
>     

1. **What does a Smart Collect virtual UPI ID look like?**

Like a normal virtual payment address! Here's an example:

> **SUCCESS**
>
> 
> **UPI ID**: rpy.payto00000gaurikumari@icici
> 

1. **What name will be associated with a Smart Collect virtual account?**

    Your merchant billing label will be used as the name on your virtual account.

1. **What happens if a customer makes an NEFT, RTGS, IMPS or UPI payment to a `Closed` virtual account?**   
    Once the virtual account is `Closed`, we will automatically refund all payments back to the source. Refunds are generally processed within 1 business day via the same mode used by the customer.

1. **Can I pass a dynamic merchant identifier via API?**
    
Currently, this feature is not available.

1. **Is third party validation possible for payments via Smart Collect?**

Payer bank account details are made available in the webhook and reports. As a merchant, you can choose to refund the payment if payer bank account details are not from a KYC verified account.

1. **Can I create virtual accounts in bulk?**

Yes, you can create virtual accounts in bulk. To do this, please contact our [support team](https://razorpay.com/support/#request).

1. **How to close a virtual account?**

A virtual account can be closed in two ways:
    - Automatically, by using the `close_by` option at the time of virtual account creation, via Dashboard or API.
    - Manually, from the Dashboard or using the API.

Once a virtual account is in closed state, customers cannot make payments to that account.
