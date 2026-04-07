---
title: About Dynamic Routing
description: Know how to route transactions through multiple gateways.
---

# About Dynamic Routing

## What is Dynamic Routing?

Dynamic Routing simplifies payments for businesses by routing them to the most suitable acquiring bank or payment gateway in real-time, resulting in enhanced success rates, reduced failed transactions, and lowered costs. Instead of designating one primary and one backup gateway, businesses can set up rules to route transactions through multiple gateways based on their performance. 

**For example**, if you have integrated with payment providers A, B, and C, businesses can configure a rule to route a certain percentage of card transactions through each gateway, such as 50% through A, 30% through B, and 20% through C.

## Standard/Default Routing
You may not have specific routing requirements for all your payments. A simple routing rule could be to set the priority of the gateway, which would apply to all payments. This can be done using the [default rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/update-default-rule.md).

With Standard Routing you can:
- Prioritise the gateways for all your transactions.
- Distribute the load among the gateways, such as allocating 50% transactions to payment gateway A and the remaining 50% to payment gateway B.

## Rule-based Routing
Standard routing may not always work for all your transactions. Your business might have specific requirements based on various parameters such as payment method, bank, card networks, and more, which can be used to determine the most relevant payment gateway to handle a specific transaction.

[Custom rules](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/create-custom-rule.md) provide you with the capability and flexibility to define your business rules using various payment parameters.

    
### Example 1

         Let us assume you want to set up a custom rule wherein 80% of Android and iOS transactions are to be routed via Paytm and 20% of transactions via PayU.

         Watch this video to see how to perform **channel-based routing**.

         
        

    
### Example 2

         Let us assume you want to set up a custom rule wherein 50% of cards and netbanking transactions are to be routed via PineLabs and 50% of transactions via Razorpay.

         Watch this video to see how to perform **method-based routing**.

         
        

### Supported Payments Parameters
The table below lists various payments parameters which can be used to determine the most relevant payment gateway to handle a specific transaction.

    Field | Possible Values
    ---
    Parameters | • Channels (Website, Android, iOS) 
 
• Payment Method (Card, Netbanking and UPI) 
 
• BIN Number (Card IIN Number) 
 
• Card Type (Debit, Credit, Prepaid, Corporate) 
 
• Card Brand (American Express, Diners Club, Discover and so on) 
 
• Card Issuer (SBIN, HDFC, ICIC, UTIB, KKBK and so on) 
 
• Banks (SBIN, HDFC, ICIC, UTIB and so on) 
 
• Amount (In Rupees) 
 

    

## Custom Identifiers
Apart from regular payment parameters, you might need to route payments to a particular gateway based on some business logic defined at your end, such as customer or product information. You can use [custom identifiers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/create-custom-rule.md#custom-identifiers) for such requirements to pass the value to us while creating the order and use it to [create a custom rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/create-custom-rule.md).

    
### Example

         Let us assume you want to route all payments coming from a particular referrer code to a particular payment gateway like Paytm using a custom identifier.

         Watch this video to see how to create a custom rule using **Custom Identifiers**.

         
        

## Priority-based Routing
In addition to the routing mechanisms explained above, Optimizer also allows you to add gateways in order of priority when creating custom rules. Our AI-ML algorithm constantly monitors the traffic and routes transactions to the best-performing gateway, considering your priority order. The algorithm creates temporary downtimes for 20 minutes when the success rate (SR) drops below a certain threshold for high-priority gateways and starts routing transactions to the next gateway based on priority and performance.

This ensures that payment processing remains smooth and uninterrupted for your customers, even if some payment gateways experience issues. For example, if the success rate of a gateway assigned to Priority 1 drops below a certain level, transactions will be automatically routed to the gateway configured at Priority 2.

When the success rate of the gateway assigned to a higher priority level retains a certain level, the transactions will be routed back to those gateways.

    
### Example

         Let us assume you want to set up a rule wherein:

         
         Priority Levels | Transaction Split - Payment Gateway/Provider
         ---
         Priority 1 | • 100% of transactions to be routed via PineLabs
         ---
         Priority 2 | • 100% of transactions to be routed via Paytm 
         

         This means that if the success rate of PineLabs drops below a certain level, all transactions will automatically be routed to Paytm.

         Watch this video to see how to perform **priority-based routing**.

         
        

## Smart Routing 

 Smart Router automatically routes payments to payment service providers with a higher probability of success. This eliminates the need for you to manually configure rules and enables you to optimise your success rate and net revenue effortlessly. 

 If you have integrated with Razorpay, you can use Smart Router to maximise your success rate and net revenue. Smart Router can be used for all cards and UPI payments via Routing as a Service (RAAS), to route traffic based on a rule, or to enable Smart Router only if payment fails via the preferred payment provider.

**Feature Availability**

- Dashboard Mode: This feature is available only on the Live mode.
- User roles: All user roles can access this feature.

### Related Information

- [Create Custom Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/create-custom-rule.md)
- [Set Rule Priority](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/set-rule-priority.md)
- [Update Default Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/update-default-rule.md)
