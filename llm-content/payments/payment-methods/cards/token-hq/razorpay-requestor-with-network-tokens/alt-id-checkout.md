---
title: Enable Guest Checkout Payments With Alt ID
description: Use Razorpay Alt ID feature and comply with RBI guidelines for guest checkout payments.
---

# Enable Guest Checkout Payments With Alt ID

Razorpay offers Alternate Identifier (Alt id), a solution that is compliant with RBI guidelines for guest checkout payments. Alternate Identifier provides a smooth payment experience to customers.

## Guest Checkout Payments Guidelines

According to the RBI circular, if a customer manually enters the card details during the guest checkout (without saving the card information), the following guidelines must be adhered to:

- Besides the card issuer and the network, the merchant or Payment Aggregator (PA) involved in the settlement of such transactions can save the data of a particular transaction for a maximum period of T+4 days (T being the transaction date) or till the settlement date, whichever is earlier. This data shall be used only for settlement of such transactions and must be deleted after that.

- Entities in the transaction/payment chain shall deploy an alternate solution for handling guest checkout transactions by **October 31, 2023**.

For RBI-compliant Guest Checkout payments, Razorpay will use an Alt id. Alt id is a unique code provided by card networks and issuers. It replaces the actual card number and supports all post-transaction activities such as refunds, settlements, and dispute handling.

> **WARN**
>
> 
> **Watch Out!**
> 
> Alt id is not applicable for tokenised transactions. In such cases, as per the new tokenisation guidelines, the tokenised card number and cryptogram are used throughout the transaction's lifecycle.
> 

## FAQs

    
### 1. Is Razorpay compliant with RBI's guest checkout guidelines?

         Yes, Razorpay complies with RBI guidelines, facilitating guest checkout payments with the secure Alt id solution.
        

    
### 2. What actions should I be taking to be compliant?

         Just like most of our features, you are automatically compliant with RBI's guest checkout regulations.
        

    
### 3. I am a Juspay merchant. What should I do to ensure compliance?

         Juspay and Razorpay will take care of compliance on behalf of all Juspay merchants. No additional steps are required from your end.
        

    
### 4. I use Razorpay Optimizer. How can I ensure that I am compliant?

         On behalf of all Optimizer merchants, Razorpay and your payment aggregator will take care of the compliance. No additional steps are required from your end.
        

    
### 5. I have a direct integration with networks for tokenisation. How can I ensure compliance?

         In this case, you can consider either of the following:
         - Approach 1 (Recommended). You continue to send us the card details. Razorpay will automatically: 
             - Generate Alt id in collaboration with networks.
             - Process payments using Alt id.
         You can continue to tokenise your card in this flow.
         - Approach 2. You can generate an Alt id with networks and initiate a payment with Razorpay using these Alt details. For API details on this approach, please reach out to our [support team](https://razorpay.com/support/#request).

         
> **INFO**
>
> 
>          **Handy Tips**
>          
>          As per NPCI's specifications, Razorpay (payment processor) will be the token requestor for all Rupay-routed payments on Razorpay. In this case, you must pass clear card details to Razorpay. 
>          

        

    
### 6. What is Alt id?

         Alt id is a unique code provided by card networks and issuers. It replaces the actual card number and supports all post-transaction activities like refunds, settlements, and dispute handling.
        

    
### 7. What are guest checkout payments?

         A guest checkout payment occurs when the cardholder enters the card details directly without the intention of saving the details. This can happen when:
            - The card is not saved, and the user does not intend to save it. 
            - The card is being saved for the first time.
         RBI has prohibited Payment Aggregators (PAs), Acquires, and Acquirer TSPs (gateways) from using the card number for guest checkout transactions, ensuring security and compliance.
        

    
### 8. How do these changes affect the cardholder?

         With the introduction of Alt id and Alt cryptogram for each payment, we prioritise cardholder security. Alt id creates a safer environment for digital card payments. This means that Alt id enhances the benefits Razorpay offers to businesses and their users, contributing to a more secure and robust ecosystem for digital payments.
