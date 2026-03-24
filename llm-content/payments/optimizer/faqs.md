---
title: Optimizer | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Optimizer.
---

# Frequently Asked Questions (FAQs)

## General

    
### 1. Which types of Razorpay Checkout does Optimizer support?

         Optimizer is compatible with all types of Razorpay Checkout, including [Standard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard.md), [Custom](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom.md), and [Server-to-Server (S2S)](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration.md) integrations.
        

    
### 2. What integration is required for Optimizer?

         Integrating Optimizer is a straightforward process involving a simple back-end feature enablement. If you already live with Razorpay as a payment gateway, Optimizer can be enabled for you without additional integration efforts.
        

    
### 3. Which payment gateways are supported by Optimizer?

         Optimizer supports a wide range of payment gateways and aggregators, including PayU, Pinelabs, Billdesk, Cashfree, Paytm, and many others. Find the complete [list of supported gateways](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/add-payment-providers#supported-payment-providers.md).
        

    
### 4. What payment modes are supported by Optimizer for different payment gateways?

         Optimizer supports a range of payment modes, including cards, UPI, Netbanking, wallets, and EMI, providing a comprehensive payment solution. Optimizer also facilitates seamless refund and settlement processes, enhancing the overall payment experience. Know more about [supported gateways and methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/supported-gateways-aggregators.md).
        

    
### 5. What is the process to onboard other gateways on Optimizer?

         To onboard additional gateways on Optimizer, follow these simple steps:
         1. Log in to your Dashboard.
         2. Follow the [steps to add a payment gateway](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/add-payment-providers.md).

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          - Ensure that the required prerequisites for your Merchant ID (MID) are enabled/configured by the respective gateways.
>          - Please note that the prerequisites may vary for each gateway. Know more about [prerequisites for various gateways](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/add-payment-providers/#supported-payment-providers.md).
>          

         Once the necessary steps are completed, the gateway will instantly activate, allowing you to start routing transactions through Optimizer.
        

    
### 6. Is PCI compliance required to use Optimizer or enable seamless mode for other gateways?

         PCI compliance is not required when using Optimizer or enabling seamless mode for other gateways. Since Optimizer makes the necessary calls to these gateways, all transactions take place within the Razorpay environment. Razorpay's PCI certificate covers the necessary compliance requirements in such scenarios.

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          PCI compliance is mandatory if you use Server-to-Server (S2S) integration for Razorpay and Optimizer instead of Razorpay Standard or Custom Checkout.
>          

        

    
### 7. What types of reports are generated with Optimizer?

         With Optimizer, you can access various standard reports, including payments and refunds. Additionally, Optimizer provides the Optimizer settlement report, which offers visibility into settlements across the supported gateways.

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          Please contact your Razorpay POC if you require any specific reports in a particular format.
>          

        

    
### 8. How can I identify the payment gateway used for a payment in the payment fetch API or webhook events?

         When Optimizer is enabled for your account, an additional parameter `gateway_provider` is included in the payment fetch response and webhook events. This parameter specifies the payment gateway through which the payment was made. Know more about [Payment API and Webhook events](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/get-started/#payments-api.md).
        

    
### 9. Can I use Optimizer without using Razorpay as the payment gateway?

         Yes, you can use Optimizer with payment gateways other than Razorpay. 

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          Even if you use a different payment gateway, the checkout experience will be facilitated by Razorpay.
>          

        

    
### 10. Payments are failing for me with the error code **GATEWAY_ERROR** with an internal error of **GATEWAY_ERROR_AUTHENTICATION_FAILED** and the description “Payment processing failed due to error at bank or wallet gateway”. How should I correct it?

         You need to reach out to the payment provider and get the merchant return URL whitelisted.
        

## Routing Capabilities

    
### 1. Where can I pass the custom identifier in the order? 

         The custom identifier needs to be passed in the Payments or Orders API. Know more about [custom identifiers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/create-custom-rule/#custom-identifiers.md).
        

    
### 2. What happens when an incoming payment satisfies two different rules simultaneously?

         In Optimizer, you can set rule priorities, with 1 being the highest priority. Let us consider an example with two rules:
         1. When the payment method is equal to netbanking, route 100% of transactions to PayU.
         2. When the payment method is equal to netbanking and the bank is SBI, route 100% of transactions to Razorpay.

         In such cases, you can assign a higher priority to rule number 2. As a result, when a user makes an SBI netbanking transaction, the transaction will be routed through Razorpay because the rule with higher priority takes precedence over rule number 1.
        

    
### 3. What happens to merchants using risk rules with specific payment gateways?

         When using Optimizer, the existing risk rules set by specific payment gateways will remain unaffected. These rules will continue to apply for each gateway used through Optimizer.  

         For example, consider a scenario where Business X has a risk rule with PayU that requires one card per phone number within a specific time. This rule will still be enforced for transactions routed to PayU via Optimizer. 

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          When using Optimizer, the risk rules set by specific payment gateways will only apply to transactions routed through those particular gateways. Transactions routed to other gateways via Optimizer will not be subject to these risk rules.
>          

        

## Refunds

    
### 1. How does Optimizer support refunds?

         Refunds in Optimizer can be created using both the API and the Dashboard. There are two types of refunds available:
         - [Normal Refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds/normal.md): For normal refunds, the refund is initiated with the respective payment gateway and depends on the availability of funds in the gateway's balance.
         - [Instant Refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds/instant.md): For instant refunds, If Razorpay processes the payment, we initiate an instant refund through Razorpay. If another payment gateway processes the payment, we initiate the refund through that specific gateway.
        

    
### 2. How do instant refunds work on Optimizer?

         If the payment is processed through Razorpay, we will initiate an instant refund via Razorpay. If the payment was processed through another payment gateway, the refund will be initiated with that specific gateway.
        

    
### 3. What happens if I initiate refunds directly from another payment gateway's dashboard? How will Optimizer track the refund status, and how will the payment reflect on the Razorpay Dashboard?

         When you integrate Optimizer, there is no need to use other payment gateway's dashboards for refunds. All payments and refunds can be managed through Optimizer and the Razorpay Dashboard. Optimizer will track the refund status and ensure the payment details reflect accurately on the Razorpay Dashboard.
        

## Security

    
### 1. How does Optimizer handle the security risk when it has access to all my payment gateway keys and ids?

         We do not accept the key and id over email. It is securely added to our Dashboard through a self-serve flow where access is restricted and not shared internally for any other purpose than supporting your integration.

         Know more about [Razorpay Security](https://razorpay.com/docs/security/).
