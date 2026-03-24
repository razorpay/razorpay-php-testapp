---
title: Address Verification System - Service by Razorpay
heading: Address Verification System
description: Use Razorpay's AVS as an address verification service to identify and reduce the risk of fraud in international payments.
---

# Address Verification System

The Address Verification System (AVS) verifies if a customer's billing address (postal code and the billing street address) matches the billing address on file with the card issuer. Based on the response from the issuer, Razorpay will accept or cancel the transaction. This helps prevent fraud in international payments.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

> **SUCCESS**
>
> 
> **Availability**
> 
> This feature is available only for US, UK, and Canada cards.
> 

    
### Example

         Suppose an international customer, John Doe, uses a Wells Fargo credit card to make an online purchase on your website with the following address:

         ```
         1304 Main Street, Anytown, Illinois, 60473
         ```
         The AVS will compare the numbers **1304** and/or **60473** with the address on file with Wells Fargo.
 
         If the match is successful, Razorpay authorises the transaction. In case of a mismatch, Razorpay declines the transaction.
        

    
### Advantages

         The advantages of using the Address Verification System are:
         - **Extra layer of security for your customers:** Your customer's lost or stolen credit card cannot be used for fraudulent transactions as the address entered during the transactions will not match the address in the card issuer's database. Razorpay will not authorize such transactions. This protects customers from credit card fraud to an extent.
        - **Higher chances of winning cashback disputes**: Suppose your customer's stolen or lost card is 
         used for transactions, and the fraudulent party uses the customer's correct address. In that case, AVS cannot detect such transactions as fraudulent as there is no address mismatch. Razorpay authorises such transactions. If the customer files a chargeback dispute, you are more likely to win the dispute as the transaction passed the AVS check.
        

    
### Prerequisites

         - [Integrate](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard.md) with Razorpay Standard Checkout. This feature is available for all types of Standard Checkout, including server language SDKs, e-commerce plugins, and products such as Invoices, Payment Button, Payment Links and Payment Pages.
         - Enable [international payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments.md) for your Razorpay account.
        

## How it Works

Below is a diagram of the workflow:

![AVS Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/international-payments-address-verification-system-flow.jpg.md)

## How Customers Add Card and Address Details at Checkout

Your customers can add their card and address details on the checkout pop-up page for address verification.

1. The customer selects `card` as the payment method and enters the credit card details.
    
    ![Address Verification Service - Customer enters credit card details](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/international-payments-avs-checkout-card.jpg.md)
    
2. The customer is asked to enter their billing address. This is a one-time activity and Razorpay will save the address securely. Customer will not be asked to provide the address on repeat transactions.
    
    ![Address Verification Service - Customer enters address details](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/international-payments-avs-address-details.jpg.md)
    
3. The Address Verification System matches both addresses. There can be three types of matches:
    - **Complete Match**: The address provided by the customer matches exactly with the address available with the card issuer.
    - **Partial Match**: This indicates that the billing address being compared has the same ZIP code or the same numeric values in the street address, but not both. 
    - **No Match**: A `no match` response indicates that neither part of the billing address matches the card issuer data. This can act as a strong signal of potential fraud. 
4. Based on the match, Razorpay takes the following actions:
    - Authorise the transaction: The transaction is authorised, and the credit card is debited.
    - Cancel the transaction: The transaction is declined.

## Frequently Asked Questions (FAQs)

  
### 1. Do I need to make any changes to my integration?

     No, if you use Razorpay Standard Checkout, you do not need to make any change to your integration. This feature will work out-of-the-box once it is enabled for your account.
    

  
### 2. Is this feature available for domestic payments?

     No, this feature is available only for international payments.
    

  
### 3. Can my customer complete the payment in case of a partial match?

     Yes, your customer can complete the payment even if there is a partial match.
