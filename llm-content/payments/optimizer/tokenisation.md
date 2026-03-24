---
title: Tokenisation for Optimizer
description: Know how to save customer card details as tokens with multiple payment partners using Optimizer.
---

# Tokenisation for Optimizer

Tokenisation is the process by which the original card number/Primary Account Number (PAN) is replaced with a surrogate value called a `token`. You can securely save a customer's card details as a token during the first transaction. The customer does not need to re-enter the card details for the next transaction. They can provide the OTP and use their saved card to complete the transaction.

**Advantages**
- Faster checkout experience for the customers.
- Reduction in payment failures due to incorrect card details.

### RBI Guidelines on Tokenisation

According to the [RBI guidelines on Card Tokenisation](https://rbidocs.rbi.org.in/rdocs/notification/PDFs/DPSSCOFTBA69C3B5B8CC4025AD089456DD857C5F.PDF), Payment Aggregators(PA)/Payment Gateway(PG) and businesses cannot save their customers' card numbers and other card data on their servers.

**Key Takeaways**
- Card networks and card issuers are the only parties that can save plain text cards. Businesses, Payment Gateways and Payment Aggregators are no longer allowed to store actual customer card details.
- Businesses should adopt a tokenisation solution to continue offering customers a **saved card experience**. 
- The token should not be visible to the cardholder. Tokens should be managed between the Token Requestor and Network.
- Customer consent and Additional Factor of Authentication (AFA) are required for saving a card/creating a token. This can be clubbed with the same Two-Factor Authentication (2FA) used during the first transaction.

## Optimizer Card Tokenisation Solution

Your customers can not avail **saved card experience** at checkout without tokenisation. Optimizer offers an end-to-end RBI-compliant solution that allows you to save customer credentials as tokens with card networks and issuing banks and process payments through any PA/PG. Customers can then use these `tokens` to make repeat purchases on your website without re-entering card details. You can process these payments through any PA/PG as per your business requirements.

> **WARN**
>
> 
> **Watch Out!**
> 
>  If you are using the saved card feature, you must redirect cards traffic to the supported gateways only. Know more about [supported payment gateways](#supported-payment-gateways).
> 

#### Onboarding as Token Requestor
In this integration, you can choose to be a Token Requestor(TR) or work with Razorpay as the Token Requestor.

#### Data Localisation Guidelines
This integration complies with data localisation guidelines.

## Payment Processing on Optimizer

Tokenised payment processing on Optimizer occurs in two scenarios:
1. When [Razorpay is a Token Requestor(TR)](#when-razorpay-is-a-token-requestortr).
2. When [External PA/PG or Merchant is a Token Requestor(TR)](#when-external-papg-or-merchant-is-a-token).

### When Razorpay is a Token Requestor(TR)
You can use Optimizer with Razorpay as Token Requestor and process payments on Razorpay and external gateways. Given below is the Optimizer Tokenisation flow when Razorpay is the Token Requestor.

    
### First-time Card Payment Flow

         ![Tokenisation flow first time](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/tokenisation_entity.jpg.md)

            Given below is the first-time payment tokenisation flow:
            1. The customer initiates a payment.
            2. The customer consents to save a card on your website/app checkout.
            3. After completing the transaction successfully through Optimizer, we initiate the tokenisation request at checkout.
            4. The Card Network or issuing bank returns a unique `token` corresponding to the tokenisation request to the merchant through Razorpay.

        

    
### Saved Card Payment Flow

         ![Saved card payment Tokenisation flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cards-tokenisation-saved-payment2.jpg.md)

            Given below is the saved card payment tokenisation flow:
            1. The customer initiates a payment using a saved card.
            2. We retrieve the token data from the token service provider automatically.
            3. Using the token data, Optimizer will process the payment through any of the selected payment gateways.
            4. The payment is initiated and processed using token data.
        

### When External PA/PG or Merchant is a Token Requestor(TR)
If the `token` is requested by the merchant or any other external gateway, the payment can be processed via Razorpay or external gateways.

#### Flow

![External Tokenisation flow first time](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/external-cards-tokenisation3.jpg.md)

Given below is the tokenisation flow when the merchant or external PA/PG is the Token Requestor:
1. The customer initiates a payment using a saved card.
2. The merchant retrieves the token data and passes it on to Optimizer.
3. Optimizer passes the token data to the selected gateway.
4. The payment is initiated and processed using the token data.

> **WARN**
>
> 
> **Watch Out!**
> 
> If a merchant requests a token from a payment partner other than Razorpay and attempts to complete the transaction through another payment partner, please contact us at `payments_optimizer@razorpay.com`. We'll assist you with the additional token attributes required by the payment partner to complete the transaction.
> 

## Supported Payment Gateways and Card Networks
Below is the list of supported payment gateways and card networks that support tokenisation:

> **WARN**
>
> 
> **Watch Out!**
> 
> - Tokenisation for **Amex** and **Diners** card networks is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature enabled on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Razorpay Dashboard.
> 
> 
>     ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md) 
> - Ensure that tokenization flags are enabled for all networks at the downstream gateway.
> 

       

    
        
        Payment Gateways | Availability
        ---
        Pine Labs | ✓
        ---
        PayU | ✓
        ---
        Cashfree | ✓
        ---
        BillDesk | ✓
        ---
        Paytm | ✓
        ---
        Easebuzz | ✓
        ---
        Airwallex | ✓
        
    
    
        
        Payment Gateways | Visa | MasterCard | Diners | Amex | Rupay
        ---
        Easebuzz | ✓ | ✓ | ✓ | ✓ | ✓ 
        ---
        BillDesk | ✓ | ✓ | ✓ | ✓ | ✓ 
        ---
        Cashfree | ✓ | ✓ | ✓ | ✓ | ✓ 
        ---
        Paytm | ✓ | ✓ | ✓ | ✓ | ✓
        ---
        PayU | ✓ | ✓ | ✓ | ✓ | ✓
        ---
        Pine Labs | ✓ | ✓ | x | x | ✓ 
        ---
        Razorpay | ✓ | ✓ | ✓ | ✓  | ✓ 
        
    

### Related Information

- [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-hq/razorpay-requestor-with-network-tokens/apis.md)
- [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-hq/razorpay-requestor-with-network-tokens/webhooks.md)
- [Tokenisation FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-hq.md)
