---
title: Direct Settlements for Linked Accounts on Route
heading: Direct Settlements on Route
description: Route for Direct Settlement (DS) automates payment splits for DS transactions, letting businesses auto-distribute funds to linked accounts.
---

# Direct Settlements on Route

is an enhancement to Razorpay's existing Route product that enables businesses using Direct Settlement transactions to automatically split payments among multiple vendors, suppliers or linked accounts.

Direct Settlement refers to the settlement of money directly from the gateway to the business without involving Razorpay in the money movement. In DS transactions, funds move from the customer to the gateway, then directly to the business' account, bypassing Razorpay's escrow system.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> 
> 

 to get this feature activated on your account.

## Advantages

    
### For Banking Partners

        - **Eliminates Manual Processing**: No need to manually calculate and distribute funds to linked accounts.
        - **Reduces Operational Overhead**: Streamlined process reduces time and resources spent on settlement management.
        - **Improves Accuracy**: Automated processing significantly reduces errors in split calculations.
        - **Enhanced Reconciliation**: Simplified reconciliation process with consistent reporting.
        

    
### For Businesses

        - **Faster Vendor Payouts**: Automated splits enable quicker payments to suppliers and partners.
        - **Consistent Experience**: Same Route functionality regardless of settlement method (DS or standard).
        - **Operational Efficiency**: Reduced manual intervention in payment distribution.
        

    
### For Linked Account Holders (Vendors/Suppliers)

        - **Timely Payments**: Faster receipt of funds without manual processing delays.
        - **Predictable Settlement**: Automated processing ensures consistent payment timing.
        

## Standard Route vs.  

  operates differently from standard Route by bypassing the traditional balance check mechanism while maintaining all other Route functionalities.

    
### Standard Route vs.  

        

        **Feature**|Standard Route| |
        ---
        **Balance Check**|Required|Bypassed|
        ---
        **Fund Flow**|Through Razorpay escrow|Direct to business|
        ---
        **Settlement Speed**|T+2 (standard)|Based on banking partner schedule|
        ---
        **Transfer Limit**|Based on Razorpay dashboard balance|As per original transaction amount|
        ---
        **Availability**|Business hours dependent|Banking partner dependent|
        ---
        **Money Movement**|Razorpay-managed|Banking partner-managed|
        ---
        **Refund Impact**|Standard process| |
        ---
        **Additional Fees**|Standard Route fees|As per banking partner|

        
        

## Use Cases 

Here is a list of use cases for  :

    
### E-commerce Marketplaces

        E-commerce marketplaces connect buyers and sellers, often on a large scale. They use technology to manage product listings, payments, and order fulfillment.

        Acme Marketplace provides an online platform where multiple sellers can list their products. The platform uses   to manage payments seamlessly.

        Here is how   helps Acme Marketplace:

        **Step 1: Customer Purchase**

        A customer buys products from various sellers in a single transaction.

        **Step 2: Payment Collection**

        The payment is processed and collected by Acme Marketplace through its payment gateway. Since they use Direct Settlement, the funds are instantly settled to the marketplace's bank account.

        **Step 3: Payment Split**

        Once the payment is settled,   automatically splits the amount. The platform's commission is retained, and the remaining amount is disbursed to the respective sellers.
        

    
### Service Aggregators

        Service aggregators bring together various service providers under one platform, like home services, freelance work, or ride-sharing. They use technology to match customers with providers and handle payment logistics.

        Acme Services is a platform that connects customers with freelance photographers. They use   for efficient payment management.

        Here is how   helps Acme Services:

        **Step 1: Customer Booking**

        A customer books a photography session with a freelance photographer through the Acme Services app and makes a payment.

        **Step 2: Payment Settlement**

        The payment is settled directly into Acme Services' bank account using Direct Settlement.

        **Step 3: Fee Distribution**

          automatically splits the payment. The platform retains its service fee, and the rest is transferred to the photographer's account, ensuring both parties are paid accurately and on time.
        

    
### Franchise Operations

        Franchise businesses consist of a central headquarters and multiple independent franchise locations. They use technology to maintain brand consistency and streamline financial operations.

        Acme Fitness is a national gym chain with multiple franchise locations. They use   to centralise membership fee collection while ensuring each location receives its share.

        Here is how   helps Acme Fitness:

        **Step 1: Member Payment**

        A new member signs up and pays for a membership at their local Acme Fitness branch. The payment is processed through the central headquarters' payment gateway.

        **Step 2: Direct Settlement**

        The funds are instantly settled into the headquarters' bank account via Direct Settlement.

        **Step 3: Payment Routing**

          automatically routes a portion of the payment to the specific franchise location where the membership was purchased, after deducting the headquarters' royalty fees.
        

    
### Supply Chain Finance

        Supply chain finance involves the technologies and processes used to manage the financial flow between buyers and suppliers. This often includes automated payment systems to improve efficiency and cash flow.

        Acme Manufacturing produces industrial parts and has a network of suppliers. They use Route on Collect Now to automate payments to these suppliers upon fulfilling an order.
        Here is how Route on Collect Now helps Acme Manufacturing:

        **Step 1: Customer Order**

        A customer places a large order for parts on Acme Manufacturing's platform.

        **Step 2: Payment and Settlement**

        The customer's payment is collected and settled directly into Acme Manufacturing's account.

        **Step 3: Automated Supplier Payments**

        Upon the order's completion, Route on Collect Now automatically disburses payments to the relevant suppliers for the materials they provided, ensuring timely and hassle-free payments across the supply chain.

        

## Supported and Non-Supported Transaction Types

  supports the following transaction and transfer types:

    

    **Payment Transfers**

    - Created after payment capture via webhook integration.
    - Can be created through Payment Transfer API or Razorpay dashboard.
    - Linked account holder responsibility to retry failed transfers.
    - Fees and taxes must be deducted before creating transfers.
    
    

    
    - **Direct Transfers**: Not supported for DS transactions as these require balance deduction from Razorpay escrow account.
    - **International Currencies**: Currently limited to INR transactions only.
    - **Partial Payment Orders**: Orders with `partial_payment` parameter enabled cannot use transfers.
    - **Order transfers**: To use   payments, you must create a transfer at the time of the payment, not the order.
     
    

## Linked Account Management

    

    

    
    #### Onboarding Methods

    - **S2S APIs**: Server-to-server integration for programmatic onboarding.
    - **Bulk Upload**: CSV-based bulk account creation.
    - **Razorpay Dashboard**: Manual onboarding through web interface.

    #### Features Available

    - Full self-service linked account management.
    - Real-time account status updates.
    - Dashboard access for linked account holders (configurable).
    - Flexible permissions and access controls.
    

 supports a comprehensive refund scenario:

    
### Direct Settlement with Refunds

        **Configuration**: Gateway (partner bank) directly handles refund processing and money movement.

        #### Refund Settlement Process

        - Refund amount is directly deducted from business' bank account by the gateway.
        - Razorpay processes refund request and communicates to partner bank.
        - No impact on Razorpay's escrow balance.

        #### Refund Scenarios

        

        Transfer Status|Refund Available|Process|
        ---
        Settled|Yes|Business can reverse amount from linked account first, then refund.|
        ---
        Not Settled|Yes|Transfer reversal not required as funds have not moved.|

        

        ### Refund Processing Options

        **Partial Refunds**: Supported for both configurations with proportional linked account adjustments.

        #### Failure Scenarios

        - **With Refunds**: Bank may reject if insufficient business balance.
        - **Without Refunds**: Refund creation fails if insufficient Razorpay balance.

        #### Actions Required

        - Monitor refund status and handle failures appropriately.
        - Maintain adequate balances based on refund configuration.
        - Implement proper error handling for refund API responses.
        

### Related Information

- [Setup and Configuration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements/direct/route/setup.md)
- [Troubleshooting FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements/direct/route/troubleshooting-faqs.md)
