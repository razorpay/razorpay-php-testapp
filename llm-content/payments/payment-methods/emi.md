---
title: About EMI
description: Let your customers avail various EMI plans at Razorpay Standard Checkout. Debit Cards, Credit Cards, No Cost EMI, Low Cost EMI and Cardless EMI.
---

# About EMI

EMI provides an option to your customers for making total payment in easy equal monthly installments at the applicable interest rates from the list of banks and partners. This payment option encourages your customer to make big value purchases without worrying about paying the full amount upfront. Customers pay principal amount and interest in monthly equal installments.

With Razorpay, you can offer your customers EMI as a payment method to buy various products on EMI using   Debit Cards, Credit Cards, No Cost EMI, Low Cost EMI and Cardless EMI. 

> **WARN**
>
> 
> **Watch Out!**
> 
> Instant Refunds are not supported on EMI, Cardless EMI and Pay Later.
> 

 

## EMI Types

EMI Types | Availability
---
[Credit Card EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/credit-card-emi.md) | ✓ (SBI Credit Card requires [Approval](https://razorpay.com/support))
---
[Debit Card EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/debit-card-emi.md) | ✓
---
[No Cost EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/no-cost-emi.md) | ✓ (Debit and Credit card EMIs)
---
[Low Cost EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/low-cost-emi.md) | ✓ (Debit and Credit card EMIs)
---
[Cardless EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/cardless-emi.md) | Requires [Approval](https://razorpay.com/support)

## Payment Flow on Standard Checkout

On your website or app, customers select the products and proceed to Checkout. 

    
### On the Checkout page, the customers:

         1. Enter the **Phone Number** and click **Continue**
         2. Select **EMI**, **No Cost EMI** or **Low Cost EMI** as the payment method as highlighted below.
             ![Select EMI or No Cost EMI option.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/emi-no-low-cost-emi.jpg.md)
         3. Select a preferred EMI type, [Credit](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/credit-card-emi.md), [Debit](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/debit-card-emi.md) or [Cardless](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/cardless-emi.md). 
         4. Choose a bank from the list and select the EMI tenure. This flow is for Credit Card EMI. Click **Continue**.
             ![EMI tenure and click Select Plan](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/emi-tenure-new.jpg.md)
         5. Enter the required details and choose if they want to **Save this card as per RBI guidelines** or pay without saving the card. 
         6. Click **Continue**. 

         After the successful payment, Razorpay redirects customers to your application or website. Customers' monthly statements will reflect the EMI amount with interest charged by the bank. You receive the full amount in your bank account as per your [settlement cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/settlements#settlement-cycle.md).
        

 

 
## Try EMI Flow on Checkout

You can try the EMI flow by clicking the **Pay with Razorpay** button. This initiates a ₹5,500 payment. Provide the relevant details and complete the payment.

> **WARN**
>
> 
> **Live Transaction with Auto Refund**
> 
> This is a real transaction and money will be deducted from your account. However, the amount debited will be auto-refunded to your account in 5-7 working days.
> 

[Pay with Razorpay](https://razorpay.com/emidemo/)

## Test Card
You can use the test cards to test domestic payments, international payments and subscriptions. Know more about [Test Card details](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/test-card-details/#test-card-for-emi-payments.md).
