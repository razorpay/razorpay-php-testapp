---
title: Tokenise Cards when Razorpay is Token Requestor
description: Know how to save customer card details as tokens using Razorpay's TokenHQ solution.
---

# Tokenise Cards when Razorpay is Token Requestor

Tokenisation is the process by which the original card number / Primary Account Number (PAN) is replaced with a surrogate value called a `token`. 

For example, you can securely save a customer's card details during the first transaction in the form of a token. For the next transaction, the customer does not need to re-enter the card details. They can just provide the OTP and use their saved card to complete the transaction.

The advantages of using tokens are:
- Faster checkout experience for the customers.
- Reduction in payment failures due to incorrect card details.

## RBI Guidelines on Tokenisation

According to the recent RBI guidelines on Card Tokenisation, Payment Aggregators (PA)/ Payment Gateway (PG) and businesses cannot save their customers' card numbers and other card data on their servers.

Given below are some of the key takeaways from the guidelines:
- Card networks and card issuers are the only parties that can now save plain text cards. Businesses, Payment Gateways and Payment Aggregators are no longer allowed to store actual customer card details.
- To continue offering customers a 'saved card experience', businesses should adopt a tokenisation solution.
- The token will not be visible to the cardholder. It will be managed between the Token Requestor and Network.
- Customer consent and additional factor of authentication (AFA) is required for saving a card / creating a token. This can be clubbed with the same 2FA used during the first transaction.

## Razorpay Card Tokenisation Solution

In absence of tokenisation, your customers will not be able to avail a 'saved card experience' at checkout. Razorpay introduces an end-to-end RBI-compliant solution that allows you to save customer credentials as tokens with card networks and card-issuing banks. Customers can then use these `tokens` to make repeat purchases on your website, without re-entering card details.

With this solution, you can:
- Process payments through any PA/PG while tokenising cards through Razorpay.
- Use Razorpay Optimizer to route payments through the PA/PG of your choice.

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

> **INFO**
>
> 
> **Onboarding as Token Requestor**
> 
> In this integration, you can choose to be a Token Requestor(TR) or work with Razorpay as the Token Requestor.
> 

> **INFO**
>
> 
> **Data Localisation Guidelines**
> 
> This integration complies with data localisation guidelines.
> 

## Flow

Given below is the first payment tokenisation flow:

![Tokenisation flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cards-tokenisation.jpg.md)

1. The customer consents to save a card on your website/app checkout.
2. The saved card consent is stored by Razorpay Token Requestor after successful authentication of the transaction. 
3. We initiate the tokenisation request at checkout.
4. The Card Network or issuing bank returns a unique Token corresponding to the tokenisation request, to the customer through Razorpay.

Given below is the subsequent payment tokenisation flow:

![Subsequent payment Tokenisation flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cards-tokenisation-subsequent-payment-rtr.jpg.md)

1. The customer initiates payment using the token.
2. We automatically fetch the token cryptogram from the Card Network or the issuing bank.
3. The payment is initiated and processed using token cryptogram.
4. The payment is either processed or cancelled.

### Related Information

- [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/token-hq/razorpay-requestor-with-network-tokens/apis.md)
- [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/token-hq/razorpay-requestor-with-network-tokens/webhooks.md)
- [Tokenisation FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/token-hq.md)
