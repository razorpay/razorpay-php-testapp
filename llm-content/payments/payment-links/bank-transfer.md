---
title: Payment Links | Bank Transfer Payments
heading: Receive Payments via Bank Transfer
description: Accept payments from customers using bank transfer as the payment method in Payment Links.
---

# Receive Payments via Bank Transfer

Accept payments from customers in the form of bank transfers using the Razorpay Payment Links. Customers can select **Bank Transfer** as the payment method at the Checkout and copy your account details. They can then initiate online bank transfers from their netbanking account.

Usually, businesses accept online payments from their customers via NEFT. However, the payment reconciliation process requires a lot of time and manual effort. Using Razorpay **Customer Identifiers** you can accept payments through online methods, such as NEFT, RTGS and IMPS via transactions made to a Customer Identifier. Since each Payment Link is associated with a Customer Identifier, payment reconciliation is effortless. 

 to get this feature activated on your Razorpay account.

> **WARN**
>
> 
> **Watch Out!**
> 
> This feature is not available for UPI Payment Links.
> 

## Use Cases

Payment via bank transfers is useful for:

- Personal loan payment recollection: If you are a credit provider who offers personal loans, your customers can now repay the loan amount through an online bank transfer.

- Advance or token amount collection in case of large transactions: If you operate a business that requires you to collect an advance or token booking amount, your customers can now pay the amount through bank transfer.

## Workflow

To create Payment Links with Bank Transfer as a payment method:

1. Create a Payment Link and send them to your customers using 
    [ Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/create.md) or [Bulk Upload feature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/batch.md).
1. Each Payment Link will have a designated Customer Identifier. This Customer Identifier has an account number and IFSC associated with it. 
1. Customers open the Payment Link and select **Bank Transfer** as the payment method.
    
   ![Payment Links - select bank transfer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-links-bank_transfer.gif.md)
   
1. Customers copy the account number and IFSC number provided at Checkout and make an NEFT or RTGS transfer to the mentioned Customer Identifier.
    
   ![Bank transfer on Payment Links checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-links-bank_transfer_checkout.jpg.md)
   
1. The amount is transferred to the designated Customer Identifier. Later, based on your settlement schedule, we will settle the net amount (payment minus fees and tax) to your bank account.
1. You can view the payment under the **Transactions** → **Payments** tab on the Dashboard.

### Related Information

- [Bank Transfer FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/faqs.md#bank-transfer)

- [Bank Transfer as a Payment Method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer.md)

- [About Customer Identifiers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect.md)
