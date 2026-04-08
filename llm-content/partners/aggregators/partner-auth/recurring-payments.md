---
title: About Recurring Payments for Partners
description: Accept recurring payments using payment methods such as cards, emandate and UPI.
---

# About Recurring Payments for Partners

Partner Auth is Razorpay's framework that enables partners (aggregators) to authorise payment requests on behalf of sub-merchants. For recurring card transactions, this system leverages industry-standard card tokenisation with token sharing capabilities to create a seamless payment experience across multiple business units.

## Initial Setup: Card Token Creation and Sharing
When customers make their first card payment on a sub-merchant's platform, they can opt to save their card for future transactions. Razorpay immediately tokenises their card details according to RBI and card network guidelines, ensuring actual card numbers are never stored or transmitted after the initial transaction.

For businesses operating multiple sub-merchants under a parent entity, each sub-merchant maintains a unique Razorpay account identifier (MID). The token sharing feature enables cards saved with one sub-merchant to be automatically available across all related sub-merchants within the same parent entity. This eliminates the need for customers to re-enter card details when purchasing from different brands under the same parent company.

## Processing Recurring Payments
The recurring payment flow operates as follows:
- Partners initiate payment requests to Razorpay using Partner Auth credentials through Basic Authentication, providing their `client_id` and `client_secret`. Each API request must specify the target sub-merchant's `account_id` in the `X-Razorpay-Account header`, along with the customer's payment token.
- Razorpay processes the transaction using the stored token, charging the customer's card without requiring card details to be re-entered. This process relies on the customer's prior consent for recurring charges.

## Security and Compliance Framework
The system maintains strict security standards through comprehensive tokenisation. 

- All card information is tokenised according to RBI mandates and industry standards. Tokens remain restricted to approved businesses within the same legal entity and cannot be shared across different payment aggregators.
- PCI compliance requirements vary based on whether Razorpay or the partner serves as the token requestor. 
- Token lifecycle management (including creation, updates and deletion) follows strict access controls. When a token is deleted, it becomes unavailable across all sub-merchants within the entity.

#### Customer Payment Journey Example
Consider a typical recurring payment scenario:

1. A customer saves their card during an initial purchase with sub-merchant A.
2. Razorpay generates and securely stores a token representing the card.
3. When the customer makes a subsequent purchase from sub-merchant B (under the same parent company), the partner uses Partner Auth to submit the existing token.
4. Razorpay processes the payment without exposing the actual card details.

This approach ensures that customers enjoy a frictionless payment experience across all brands while maintaining the highest security standards.

    
### Key Benefits

         Partner Auth combined with tokenisation delivers several advantages:
            - **Enhanced Security**: Card details are never exposed after initial tokenisation.
            - **Improved Customer Experience**: One-time card entry works across all related businesses.
            - **Regulatory Compliance**: Meets RBI guidelines and card network requirements.
            - **Operational Efficiency**: Simplified payment processing for multi-brand businesses.
        

Through this combination of API security via Partner Auth headers and card network tokenisation, Razorpay enables secure, compliant recurring payments that balance customer convenience with robust data protection.

## API Authentication Using Partner Auth

Use the Partner credentials as described in the [Dashboard Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators.md#partner-credentials) as Basic Auth.

In the API request:
- The authorisation information is expressed using the `Authorization` header with Basic auth scheme.
- The sub-merchant account is specified using the `X-Razorpay-Account` header.

For example:

```curl: Partner Auth
curl -X GET 'https://api.razorpay.com/v1/payments/pay_KjtVtO37KdpfjG' \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H 'X-Razorpay-Account: acc_KBrJAIEqre5ucn'
```

## Integration Flow

    
### Using Razorpay S2S APIs (Cards Only)

         Following is the integration flow to [collect recurring card payments using Razorpay payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/recurring-payments/cards/payment-api.md):
            1. Create a Customer for your sub-merchant. This returns a `customer_id`.
            2. Create a registration payment using card details with our Composite Orders and Payments API. This API returns a URL where customers can complete registration by submitting the OTP. At the end of this registration, the recurring token is generated.
            3. Fetch the recurring token:
                - Using the Fetch Payments API.
                - By subscribing to the `payment.authorized` webhook event and verify if the token is created.
                - By subscribing to the `token.confirmed` webhook event and verify if the token is activated.
            4. Subscribe to the `token.service_provider_token.activated` webhook event to retrieve the saved card token.
            5. Create registration payment using the saved card token with our Composite Orders and Payments API. This API returns a URL where customers can complete registration by submitting the OTP.
            6. To initiate subsequent payments, you must create an order using the Orders API. Send the `customer_id` along with the other parameters in the API request. 
            7. Create a subsequent payment using the Recurring Payment API. Pass the `order_id` (received in the response of the previous step), the `token_id` and the `customer_id` in the request body. Subscribe to the `payment.captured` webhook event to confirm the payment. You may also subscribe to the `token.rejected` webhook to get notified in case the token is rejected.
        

    
### Using Razorpay Standard Checkout (Emandate and UPI)

         You can integrate Recurring Payments using Razorpay Standard Checkout via APIs. 

         Following is the integration flow to collect recurring payments using the Razorpay Standard Checkout:
            1. Create a Customer for your sub-merchant. This returns a `customer_id`.
            2. Create an Order for your sub-merchant. This returns an `order_id`. The minimum order amount for:
                - Emandate: ₹0.
                - UPI: ₹1.
            3. Create an Authorisation Transaction. Pass the `customer_id`, `order_id`, `account_id` and a few additional parameters in your Checkout to create the authorisation payment. The customer completes the authorisation payment, which generates a token. This payment can be authorised using one of the following instruments:
                - Emandate
                - UPI
            4. Retrieve and check the status of the token. After the token status changes to `confirmed`, you can create and charge subsequent payments.
            5. Create and charge subsequent payments. To do this, you have to manually:
                1. Create a new order.
                2. Create a recurring payment.
        

    
### Using a Registration Link

         You can create registration links from the Dashboard or using APIs.
         Following is the integration flow to collect recurring payments using a registration link:
            1. Create a registration link and send it to your customer. The customer completes the authorisation payment, which generates a token. This payment can be authorised using one of the following instruments:
                - [Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/recurring-payments/emandate/registration.md)
                - [Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/recurring-payments/cards/registration-links/create-authorisation-transaction.md)
                - [UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/recurring-payments/upi/create-authorisation-transaction.md)

                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 There is no need to create a customer and order separately if you use a registration link to create the authorisation transaction. Razorpay automatically creates a customer and the order on your behalf.
>                 

            2. Retrieve and check the token status. After the token status changes to `confirmed`, you can create and charge subsequent payments.
            3. Create and charge subsequent payments. To do this, you have to manually:
                1. Create a new order.
                2. Create a recurring payment.
        

 
#### Related Information

- [Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/recurring-payments/emandate/registration.md)
- [Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/recurring-payments/cards/payment-api.md)
- [UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/recurring-payments/upi/create-authorisation-transaction.md)
- [UPI with TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/recurring-payments/upi-tpv/create-authorisation-transaction.md)
