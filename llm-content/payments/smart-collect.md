---
title: Payments | Smart Collect
heading: About Smart Collect
description: Create Customer Identifiers on-demand for customers to pay via NEFT, RTGS and IMPS using Smart Collect and UPI transfers via Smart Collect 2.0.
---

# About Smart Collect

Discover new features, updates and deprecations related to Razorpay Smart Collect (since Jan 2024).

Razorpay Smart Collect empowers businesses to create on-demand Customer Identifiers (CI) for receiving payments via NEFT, RTGS, and IMPS. Smart Collect 2.0 expands this functionality to include UPI payments through Virtual UPI IDs. These identifiers are linked to your registered bank account, and Razorpay automates payment reconciliation and provides notifications for received payments.

#### What is a Customer Identifier and a Virtual UPI ID?

**Customer Identifier** 

Customer identifier is a customisable virtual receiver (with customer identifier number and IFSC) created on top of your current/escrow account. You can share the Customer Identifier information with your customers/businesses and collect payments.

**Virtual UPI ID** 

Virtual UPI id is an extension of Customer Identifier. It is a customisable UPI id that your customers/businesses can use to pay you. It combines the ease of UPI payments and id customisation to offer you a seamless payment reconciliation experience. 

> **INFO**
>
> 
> **Handy Tips**
> 
> - Understand the Razorpay [payment flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md) that Smart Collect follows to collect payments.
> - Smart Collect also supports [Third-Party Validation (TPV)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/third-party-validation.md).
> 
> 

    
### Advantages

         
            
            Smart Collect has the following advantages:

                - **Instant Identifier Creation**: Generate Customer Identifiers in real-time using the Dashboard and APIs.
                - **Multiple Payment Avenues**: Enable customers to make payments via NEFT, RTGS and IMPS.
                - **Automatic Reconciliation**: Eliminate the difficulty of manual reconciliation and save time and cost.
                - **Account-level Visibility**: View and manage every payment received from customers.
                - **Real-time Notifications**: Get real-time notifications on payments with Webhooks.
                - **Third-Party Validation (TPV)**: Smart Collect supports Third-Party Validation.
            
            
            Smart Collect 2.0 offers the following additional advantages:
                - **UPI Transactions**: In addition to NEFT, RTGS, and IMPS, use Smart Collect 2.0 to accept payments using UPI.
                - **Customisable Customer Identifiers**: Personalise your Customer Identifiers to align with your brand, making it easier for internal tracking.
                - **Automatic Payment Mode Differentiation**: Automated distinction based on the payment method used, simplifying reconciliation and reporting.
                - **Real-time Payment Confirmations via Webhooks**: Receive instant notifications through webhooks (if enabled), allowing for immediate updates and actions.
                - **Creation of Unlimited Identifiers**: Generate unlimited Customer Identifiers and Virtual UPI IDs, providing scalability for businesses with diverse needs.
                - **Transaction-Level Breakup of Payments**: Detailed, transaction-level information for all payments, enhancing reconciliation accuracy.
            
         
        

    
### Smart Collect 2.0 vs Smart Collect

         Smart Collect and Smart Collect 2.0 use the same APIs to create and maintain Customer Identifiers. Smart Collect 2.0 offers additional benefits, such as:

         
         Features | Smart Collect 2.0 | Smart Collect 
         ---
         NEFT/RTGS/IMPS | ✓ | ✓
         ---
         UPI | ✓ | x 
         ---
         Settlement time | Direct and real time | T+2 working days
         ---
         APIs to create/disable customer identifiers/VPAs | ✓ | ✓
         ---
         API-based notifications | ✓ | ✓
         ---
         TPV Check | ✓ | ✓
         --- 
         Auto-refund for closed/disabled customer identifiers/virtual UPI ids | ✓ | ✓
         --- 
         Supported banks | Yes Bank, Axis Bank, RBL Bank | NA
         ---
         Receive Payment Gateway Settlements via customer identifiers/Virtual UPI ids | ✓ | x
         --- 
         Transaction-level breakup in account | ✓ |  x
         
        

    

    
### Smart Collect Use Cases

        Explore the [Smart Collect Use Cases](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/use-cases.md) to gain deeper insights into the capabilities and practical applications of Smart Collect and Smart Collect 2.0.
        

## Prerequisites

    
        1. Ensure that you do not fall under the `Individuals` merchant category as Smart Collect is not available for this Merchant Category Code (MCC).
        2. Read and understand the [pricing model](https://razorpay.com/smart-collect/#pricing) and have the [API documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md) for Smart Collect handy. 
        3. Ensure that the business use case is well charted. Smart Collect supports **many customers - one account** and **many customers - many accounts** models.
        4. Raise a request through a Point of Contact (POC) or the Dashboard to enable Smart Collect and Smart Collect TPV for your account.
        5. Do check the [list of banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/bank-list.md#list-of-banks-supporting-tpv-for-smart-collect) which support Smart Collect with TPV.
    
    
        1. You must open a [Current account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/account-types/current-account.md)/[Escrow account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/account-types/escrow.md). We enable you in this process. 
        2. All the prerequisites for Smart Collect are also applicable for Smart Collect 2.0.
    

## Supported Platforms

Razorpay Smart Collect is supported on the following platforms:

   
      
      Web | Android | iOS | Webview
      ---
      ✓ | ✓ | ✓ | ✓
      
   
   
      
      Web | Android | iOS | Webview
      ---
      ✓ | ✓ | ✓ | ✓
      
   

### Related Information

- [How Smart Collect Works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/how-it-works.md) 
- [Customer Identifier States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/states.md)
- [Auto Third Party Validation (TPV) on Smart Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/third-party-validation.md)
- [Smart Collect APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md)
- [Subscribe to Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/subscribe-to-webhooks.md)
