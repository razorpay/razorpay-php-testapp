---
title: TokenHQ - Business as Token Requestor
description: Know how to save customer card details as tokens using Razorpay's TokenHQ solution.
---

# TokenHQ - Business as Token Requestor

Tokenisation is the process by which the original card number / Primary Account Number (PAN) is replaced with a surrogate value called a `token`. 

For example, you can save a customer's card securely details during the first transaction in the form of a token. For the next transaction, the customer does not need to re-enter the card details. They can just provide the OTP and use their saved card to complete the transaction.

The advantages of using tokens are:
- Faster checkout experience for the customers.
- Reduction in payment failures due to incorrect card details.

## RBI Guidelines on Tokenisation

According to the recent RBI guidelines on Card Tokenisation, Payment Aggregators (PA)/ Payment Gateway (PG) and businesses cannot save their customers' card numbers and other card data on their servers.

Given below are some of the key takeaways from the guidelines:
- Card networks and card issuers are the only parties that can now save plain text cards. Businesses, Payment Gateways and Payment Aggregators are no longer allowed to store actual customer card details.
- To continue offering customers a 'saved card experience', businesses need to adopt a tokenisation solution.
- The token will not be visible to the cardholder. It will be managed between the Token Requestor and Network.
-  Customer consent and additional factor of authentication (AFA) is required for saving a card / creating a token. This can be clubbed with the same 2FA used during the first transaction.

## Razorpay TokenHQ

In absence of tokenisation, your customers will not be able to avail a 'saved card experience' at checkout. Razorpay introduces an end-to-end RBI-compliant solution, TokenHQ, that allows you to save customer credentials as `tokens` with card networks and card-issuing banks. Customers can then use these `tokens` to make repeat purchases on your website, without re-entering card details.

With TokenHQ, you can:
- Process payments through any PA/PG while tokenising cards through Razorpay.
- Use Razorpay Optimizer to route payments through the PA/PG of your choice.

> **INFO**
>
> 
> **Feature Request**
> 
> This is an on-demand feature and available only to PCI-compliant merchants. [Get in touch](https://razorpay.com/support/) with us to get this feature enabled on your account.
> 

**Onboard as a Token Requestor**

In this flow, you will be onboarded with card networks and Issuers as token requestors as well as a merchant.

## Flow

Given below is the first payment tokenisation flow:

1. The customer consents to save a card on your website/app checkout.
2. The saved card consent is stored by Razorpay Token Requestor after successful authentication of the transaction. 
3. We initiate the tokenisation request at checkout.
4. The Card Network or issuing bank returns a unique Token corresponding to the tokenisation request, to the customer through Razorpay.

Given below is the subsequent payment tokenisation flow:

1. The customer initiates payment using the token.
2. We automatically fetch the token cryptogram from the Card Network or the issuing bank.
3. The payment is initiated and processed using token cryptogram.
4. The payment is either processed or cancelled.

### Related Information

- [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-hq/merchant-requestor/apis.md)
- [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-hq/merchant-requestor/webhooks.md)
- [Tokenisation FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-hq.md)
