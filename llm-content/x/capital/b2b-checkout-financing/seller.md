---
title: Use Razorpay B2B Checkout Financing for invoice financing as an Seller | Razorpay Capital
heading: Use Razorpay B2B Checkout Financing (Sellers)
description: Check how to use Razorpay B2B Checkout Financing as an Seller.
---

# Use Razorpay B2B Checkout Financing (Sellers)

Razorpay B2B Checkout Financing is a [Buy Now, Pay Later](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/pay-later.md) (BNPL) facility with which sellers receive payments from their [buyers](@/Applications/MAMP/htdocs/new-docs/llm-content/x.md) immediately. B2B Checkout Financing provides a seamless Checkout experience that sellers can use to improve business relationships with their buyers. 

    
### Who is a Seller?

         Seller is a business or marketplace that sells products or services to registered business buyers. Sellers are the providers of goods and/or raw materials to businesses. 
        

    
### Advantages of Razorpay B2B Checkout Financing for Sellers

         - Razorpay B2B Checkout Financing outsources credit cycles so buyers can enjoy a frictionless and quick payment experience. This also facilitates quicker payment cycles for sellers.  
         - B2B Checkout Financing is [Digital Lending Guidelines (DLG)](@/Applications/MAMP/htdocs/new-docs/llm-content/x/glossary/#razorpayx-capital.md)-compliant. 
         - No specialised integration or product development is necessary.
         - Enhances conversion rates of sellers as the buyers can spread out their payments flexibly. 
         - Convenient credit payment experience on Checkout and all other payment methods boost customer retention.
         - Improves seller and buyer relationships due to digitised processes, convenience, payment flexibility and more. 
        

## How it Works

Following is a workflow of the B2B Checkout Financing process. 

1. [Enable Razorpay B2B Checkout Financing](#1-onboarding) for your business. 
1. [Integrate Payment Gateway](#2-integration) and show B2B Checkout Financing as a payment option. 
1. [Collect payments](#3-billing--payment) for the goods sold to buyers via Checkout using B2B Checkout Financing. 

## Use B2B Checkout Financing 

As a seller, you can onboard and set up B2B Checkout Financing on Razorpay Checkout for buyers in the following way.

### 1. Onboarding 

Contact the Razorpay Capital [support team](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support/#raise-a-new-request.md) and convey your interest in enabling Razorpay B2B Checkout Financing for your buyers. 

### 2. Integration

You can display B2B Checkout Financing on either the Standard Checkout or Custom Checkout using the following integrations. B2B Checkout Financing is also available as part of Pay Later payment options in the EMI² Suite.

Checkout Type | Steps
---
[Standard Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard.md) | No integration steps. Enable B2B Checkout Financing to display on Checkout. 
 You can also perform an [eligibility check](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/eligibility-check/standard.md) to display the most relevant payment methods to buyers. 
---
[Custom Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration/#12-fetch-payment-methods.md) | - [Enable Pay Later](#1-onboarding) as a payment method via onboarding. 
- Follow the steps to [create an order](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration/#11-create-an-order-in-server.md) for the buyer. B2B Checkout Financing appears when you fetch the payment methods.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can [try out the Pay Later flow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/#try-emi-flow-on-checkout.md) on the Demo after enabling B2B Checkout Financing.  
> 

You have successfully enabled B2B Checkout Financing as a payment method for your buyers on the Checkout.  

### 3. Billing & Payment

To use B2B Checkout Financing:

1. Complete the [onboarding](#1-onboarding) and [integration](#2-integration) process.
1. Your buyers can use the B2B Checkout Financing option to pay for invoices you raise during the business cycle. This creates a loan on the buyer's name. 

    The Lender pays the seller on the buyer’s behalf and we settle the amount to the you as per the schedule finalised [in the agreement](#1-onboarding). 

You have successfully billed and collected the payment from your buyers. The payment method is populated with **Pay Later** on the Razorpay Dashboard when buyers use Razorpay B2B Checkout Financing.  
    ![Razorpay B2B Checkout Financing narration after payment](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-capital-postpaid-txn-overview.jpg.md)

### 4. Settlement 

After the buyer makes the payment on Checkout: 
- Razorpay pays you on the buyer's behalf via [direct settlement](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/settlements.md). This means you receive the B2B Checkout Financing payment in your account separately from the regular settlement cycle. 
- Payments are settled on a T+1 basis, where T is the date of payment. 

### Refunds

You can initiate a refund from the Dashboard. The buyer receives the amount in their account on a T+1 basis, where T is the date you initiated the refund.   

1. Log in to the Dashboard. 
1. Navigate to **Transactions** from the left menu. 
1. Select the transaction to refund using the Payment id/Order id.
1. Click **Issue Refund** on the right pane.  
    ![Razorpay B2B Checkout Financing narration after payment](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-capital-postpaid-txn-overview.jpg.md)
1. Enter the amount to refund in the text box. You can issue partial refunds as well. 

    The refund amount is deducted from your upcoming [settlement](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/settlements.md).
    ![Issue Razorpay B2B Checkout Financing refund on Razorpay Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-capital-postpaid-refund.jpg.md)

### Related Information 

- [About Pay Later](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/pay-later.md)
- [Pay Later FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/faqs/#pay-later.md)
- [About Payment Methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods.md)
