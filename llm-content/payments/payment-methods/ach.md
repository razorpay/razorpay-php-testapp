---
title: ACH Direct Debit
description: Accept payments with ACH Direct Debit Payment Method.
---

# ACH Direct Debit

ACH Direct Debits are processed through the Automated Clearing House (ACH) payments system, which is operated by the National Automated Clearing House Association (NACHA).

With ACH Direct Debit, customers can authorise businesses to pull funds directly from their bank accounts, providing a cost-effective alternative to card payments with fees as low as 0.5% (capped at $5) compared to typical card processing fees of 2.5-3%.

    
### Advantages

         - **Significant Cost Savings**: ACH Direct Debit processing fees are substantially lower than card network fees, saving businesses up to 70-85% on transaction costs. For a $5,000 transaction, businesses save up to $120-145 compared to card payments.

         - **Enterprise-Ready Solution**: ACH Direct Debit is the preferred payment method for B2B transactions, high-value payments and recurring billing across industries including education, healthcare and SaaS.

         - **Secure Transactions**: ACH Direct Debit payments are protected through bank-level security, automated verification systems and NACHA compliance standards, ensuring safe and reliable payment processing.

         - **Seamless Bank Verification**: Integration with Razorpay enables instant bank account verification, whilst manual entry options provide flexibility for all customer preferences.

         - **Extended Payment Capability**: ACH Direct Debit supports higher transaction values than card payments, making it ideal for enterprise contracts and large invoices without card limit constraints.
        

> **INFO**
>
> 
> 
> **Feature Request**
> 
> This is an on-demand feature. Reach out to our [support team](https://razorpay.com/us/) to get this feature activated on your account.
> 
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> ACH Direct Debit is currently available only for US-based businesses processing payments in USD currency. Ensure your business is registered in the United States before enabling this payment method.
> 

## Payment Flow for Customers

Given below is the payment flow for ACH Direct Debit at Razorpay checkout:

1. The customer enters their contact details and clicks **Continue**.
2. They select **Bank Transfer**, enter personal details and address, and click **Continue**.
   ![specific and meaningful image title](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ach-bank-transfer.jpg.md)
3. The customer enters bank details, selects either **Business account** or **Personal account**, and clicks **Pay Now**.
   ![specific and meaningful image title](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ach-paynow.jpg.md)

Upon successful submission, the customer receives an email confirmation with the payment id.

> **WARN**
>
> 
> **Settlement Timeline**
> 
> Unlike card payments, ACH Direct Debit transactions are not processed in real-time. The payment settles in 3-5 business days, with funds available to businesses on T+5 (5 business days after transaction). Most returns occur within the first 5 days if there are issues with the bank account.
> 
> ![ACH Settlement flow diagram](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ach-settlement-flow.jpg.md)
> 

## Understanding ACH Direct Debit Payment States

ACH payments progress through the following states:

- **Created**: Payment request has been initiated.
- **Authorised**: Payment has been accepted by Razorpay and submitted to the ACH network.
- **Captured**: Funds have been confirmed and will be settled to your account.
- **Failed**: Payment was rejected due to invalid account details, insufficient funds or other errors.
