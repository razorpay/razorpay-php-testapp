---
title: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Razorpay Smart Collect, Third Party Validation and Smart Collect 2.0.
---

# Frequently Asked Questions (FAQs)

## Smart Collect

   
### 1. How can a customer make a payment to a Smart Collect Customer Identifier?

       The customer can make a transaction to the bank account via a simple NEFT, RTGS or IMPS transaction from their preferred internet banking portal.
      

   
### 2. Can a customer make payment to a Customer Identifier via an offline transaction?

       Yes, customers can visit their bank and fill out an RTGS form, or a NEFT challan with the beneficiary details provided by Razorpay and initiate a transfer from their account.

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          Customers cannot deposit cash into a Customer Identifier. Only NEFT, RTGS or IMPS transactions are permitted.
>          

      

   
### 3. What does a Smart Collect Customer Identifier look like?

       Exactly like a normal account! Here's an example:

         ```
         Account Number: 11122219877893452 
         IFSC: RAZR0000001 
         Name: Acme Corporation
         ```
      

   
### 4. What name will be associated with a Smart Collect customer identifier?

       Your merchant billing label will be used as the name on your customer identifier.
      

   
### 5. What happens if a customer makes an NEFT, RTGS or IMPS payment to a `Closed` customer identifier?

       Once the customer identifier is `Closed`, we will automatically refund all payments back to the source. Refunds are generally processed within 1 business day via the same mode used by the customer.
      

   
### 6. Can I pass a dynamic merchant identifier via API?

       Currently, this feature is not available.
      

   
### 7. Can I create customer identifiers in bulk?

       Yes, you can create customer identifiers in bulk. To do this, please contact our [support team](https://razorpay.com/support/#request).
      

   
### 8. How to close a customer identifier?

       A customer identifier can be closed in two ways:
         - Automatically, by using the `close_by` option at the time of customer identifier creation, via Dashboard or API.
         - Manually, from the Dashboard or using the API.
       Once a customer identifier is in closed state, customers cannot make payments to that account.
      

   
### 9. Where can I find pricing details for Smart Collect?

       Check the [Smart Collect Pricing](https://razorpay.com/smart-collect/#pricing).
      

   
### 10. I have created an ICICI-based customer identifier. When I try to make a bank transfer using a UPI PSP app such as Google Pay, I am getting errors. Why?

       Currently, we do not support a bank transfer to an ICICI-based customer identifier, using a UPI PSP app.
      

   
### 11. Does Razorpay process an RBL to RBL transfer using Smart Collect?

       Yes, we support RBL to RBL Internal Fund Transfer (IFT) transactions on Smart Collect RBL customer identifiers.
      

   
### 12. Are Google Spot payments supported on Smart Collect VPAs?

       Currently, we do not support Google Spot integration on Smart Collect VPAs.
      

   
### 13. Can I create Smart Collect VPAs in the test mode?

       Currently, we support creation of Smart Collect VPAs in the live mode only.
      

   
### 14. Is TR field supported on Smart Collect VPAs?

       Currently, we do not support TR field on Smart Collect VPAs.
      

## Third Party Validation

   
### 1. What is Third-Party Validation (TPV)?

       Third-Party Validation (TPV) of bank accounts is a mandatory requirement for merchants in securities, broking and mutual funds operating in the BFSI (Banking, Financial Services and Insurance) sector.

       As per Securities and Exchange Board of India (SEBI) guidelines, transactions must be made by the customers only from those bank accounts that were submitted to your business at the time of registration. 
      

   
### 2. Does it require a ​manual verification of account details for the customer identifier?

       No. Smart Collect eliminates the need for manually verification of account details.

       All you have to do is pass the customer's account details when creating the customer identifier. Razorpay verifies the customer's account details on every payment made to the customer identifier.
      

   
### 3. How do I know the allowed payers list?

       You can fetch the `allowed_payers` list using [Webhook](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/smart-collect.md) or API response.
      

   
### 4. Is there a limit on the number of bank accounts for TPV validation for customer identifiers?

       Customer Identifiers support TPV validation for a maximum of 10 bank accounts.
      

   
### 5. What happens if a customer attempts a payment from a different account which is not in the allowed payers?

       If a payment is made from an account that is different from what is provided in the `allowed_payer` attribute, the amount is instantly refunded to the customer via the same mode NEFT/RTGS/IMPS.

       You can view these payments on the **Transactions** → **Refunded** tab on your Dashboard. These payments have the following description: `Bank Account Validation Failed`.
      

## Smart Collect 2.0

    
### 1. What is the difference between Smart Collect and Smart Collect 2.0?

         Smart Collect 2.0 offers solutions that Smart Collect does not. With Smart Collect 2.0, you can: 
         - Collect and settle payments instantly from customers and third parties. 
         - Create alphanumeric Customer Identifiers as well as virtual UPI IDs to collect payments. 
        

    
### 2. What is a Smart Collect 2.0 Customer Identifier?

         Customer Identifiers (CI) are 16-digit numbers used to collect funds via IMPS/NEFT/RTGS. Payments made to Customer Identifiers are settled instantly. 
        

    
### 3. How do I know if I need an Escrow account or a Current account?

         You must open an Escrow account if the end beneficiary is a third party. However, if your end beneficiary is a merchant/customer, you need a Current account.
        

    
### 4. With which banks can I open a Current/Escrow Account?

         You can open a [Current account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/current-account.md)/[Escrow account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/escrow.md) with Yes Bank or Axis Bank. 
        

    
### 5. How do I make payouts from the Escrow/Current account?

         You can make payouts using the [Payouts APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/api.md).
        

    
### 6. Do I need to make changes to the Smart Collect APIs to use Smart Collect 2.0?

         Yes. You must update the Customer Identifiers when using the Smart Collect APIs. Smart Collect Customer Identifiers are numeric whereas Smart Collect 2.0 Customer Identifiers are alphanumeric. That is the only change you must make. 
        

    
### 7. Is it mandatory to migrate from Smart Collect to Smart Collect 2.0?

         No, it is not mandatory. You can migrate from Smart Collect to Smart Collect 2.0 based on your business requirements.   
        

    
### 8. How is the fee for Smart Collect 2.0 collected?

         We collect the Smart Collect 2.0 usage fee from your [Fee Credits](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/credits#fee-credits.md). If your Fee Credits are low, we charge it from your [settlement](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/settlements/#settlement-cycle.md).
