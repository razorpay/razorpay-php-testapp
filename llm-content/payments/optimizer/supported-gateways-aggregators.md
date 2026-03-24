---
title: Supported Gateways and Aggregators
description: List of payment gateways and methods supported on Optimizer.
---

# Supported Gateways and Aggregators

## Supported Aggregators
Given below is the list of payment aggregators supported on Optimizer.

S No. | Aggregators | Availability
---
1 | Atom | Live
---
2 | Billdesk | Live
---
3 | Cashfree | Live
---
4 | CCAvenue | Live
---
5 | Easebuzz | Live
---
6 | Ingenico | Live
---
7 | Paytm | Live
---
8 | PayU | Live
---
9| PineLabs | Live
---
10 | Razorpay | Live
---
11 | Checkout | Coming Soon
---
12 | Stripe | Coming Soon

## Supported Bank Gateways
Given below is the list of supported bank gateways on Optimizer.

S No. | Bank Gateways 
---
1 | Amex 
---
2 | Axis 
---
3 | HDFC  
---
4 | ICICI 
---
5 | Kotak 
---
6 | SBI 

## Supported Payment Methods
Given below are the supported payment methods and payment providers for [Cards](#cards), [UPI](#upi), [Netbanking](#netbanking), [EMI](#emi), [Cardless EMI](#cardless-emis), [Meal Cards](#meal-cards), [Wallets](#wallets) and [Pay Later](#pay-later).

> **INFO**
>
> 
> **Handy Tips**
> 
> All Razorpay netbanking gateways are available upon request. Please contact [support](https://razorpay.com/support/#request) to activate them on your Razorpay account.
> 

    
### Cards

         List of supported providers is given below:

            
            S No. | Provider
            ---
            1 | Amex 
            ---
            2 | Axis Migs
            ---
            3 | Cashfree
            ---
            4 | CCAvenue
            ---
            5 | Cybersource
            ---
            6 | Easebuzz
            ---
            7 | HDFC
            ---
            8 | MPGS
            ---
            9 | Paytm
            ---
            10 | PayU
            ---
            11 | Razorpay
            
        

    
### UPI

         List of supported providers is given below:

            
            S No. | Provider | TPV Supported? (Yes/No)
            ---
            1 | Airtel | No
            ---
            2 | Axis | Yes
            ---
            3 | Cashfree | No
            ---
            4 | CCAvenue | No
            ---
            5 | Easebuzz | No
            ---
            6 | ICICI | Yes
            ---
            7 | HDFC Mindgate | Yes
            ---
            8 | Paytm | No
            ---
            9 | PayU | No
            ---
            10 | PineLabs | No
            ---
            11 | Razorpay | Yes
            ---
            12 | SBI | No
            
        

    
### Netbanking

        List of supported providers is given below:

        
        S No. | Provider
        ---
        1 | Airtel
        ---
        2 | Allahabad 
        ---
        3 | Atom
        ---
        4 | AU Small Finance
        ---
        5 | Axis (TPV Supported)
        ---
        6 | Bank of Baroda
        ---
        7 | Billdesk
        ---
        8 | Canara
        ---
        9 | Cashfree
        ---
        10 | CCAvenue
        ---
        11 | Central Bank India
        ---
        12 | CSB
        ---
        13 | CUB
        ---
        14 | EBS
        ---
        15 | Equitas
        ---
        16 | Federal
        ---
        17 | FSB
        ---
        18 | HDFC
        ---
        19 | IBK
        ---
        20 | ICICI
        ---
        21 | IDFC
        ---
        22 | IndusInd
        ---
        23 | IOB
        ---
        24 | JKB
        ---
        25 | JSB
        ---
        26 | Kotak
        ---
        27 | KVB
        ---
        28 | OBC
        ---
        29 | Paytm
        ---
        30 | PayU
        ---
        31 | PNB
        ---
        32 | Razorpay
        ---
        33 | RBL
        ---
        34 | SBI
        ---
        35 | SCB
        ---
        36 | SIB
        ---
        37 | SVC
        ---
        38 | UBI
        ---
        39 | Vijaya
        ---
        40 | Yes
        
    

    
### EMI

        Given below is the list of payment gateways that support EMI:
        
        Payment Gateways | Availability
        ---
        [PayU](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/supported-gateways-aggregators/#payu-emi.md) | Live
        ---
        [Billdesk](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/supported-gateways-aggregators/#billdesk-and-ingenico-emi.md) | Live
        ---
        [Ingenico](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/supported-gateways-aggregators/#billdesk-and-ingenico-emi.md) | Live
        

        
> **WARN**
>
> 
>         **Watch Out!**
> 
>         Optimizer supports EMI options for both credit and debit cards.
>         
 

        
            
                PayU EMI
                
                Follow the steps given below to enable PayU EMI on Optimizer:
                 1. Reach out to your Relationship Manager to get the `EMI flag` enabled on PayU's side.
                 2. Provided that PayU has a `Fetch EMI` API, use it to retrieve the EMI banks and plans supported by PayU and display them at your checkout.

                 The list of supported banks by PayU for its EMI transactions is given below:

                 
                 Sr No | Issuer
                 ---
                 1 | Amex
                 ---
                 2 | Bank of Broda
                 ---
                 3 | Citi
                 ---
                 4 | HDFC
                 ---
                 5 | ICICI
                 ---
                 6 | IndusInd Bank
                 ---
                 7 | Kotak Mahindra
                 ---
                 8 | RBL
                 ---
                 9 | SBI
                 ---
                 10 | SCB
                 ---
                 11 | Axis
                 ---
                 12 | Yes Bank
                 ---
                 
                

            
### Billdesk and Ingenico EMI

                Follow the steps given below to enable Billdesk and Ingenico EMI on Optimizer:
                 1. Add EMI as a payment method on the Dashboard. Know more about [how to request for a payment method](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/payment-methods/#request-for-payment-methods.md).
                 2. Enable [Optimizer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/get-started.md) for your account.
                 3. [Add Billdesk or Ingenico as a payment method](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/billdesk.md).
                 4. Route transactions via Billdesk or Ingenico. Know [how to route transactions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/create-custom-rule/#steps.md).

                

        
    
    
    
### Cardless EMI

    List of supported cardless EMIs on Optimizer is given below:

        
        S No. | Provider
        ---
        1 | [ShopSe](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/cardless-emi/shopse.md)
        ---
        2 | [Snapmint](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/cardless-emi/snapmint.md)
        
    

    
### Meal Cards

    List of supported meal cards on Optimizer is given below:

        
        S No. | Provider
        ---
        1 | [Sodexo](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/sodexo.md)
        
    

    
### Pay Later

    List of supported aggregators for Pay Later on Optimizer is given below:

        
        S No. | Provider
        ---
        1 | [Simpl](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/simpl.md)
        
    

    
### Wallets

     Optimizer supports **wallets** for PayU, CCAvenue, Paytm and Razorpay.

     
        
            PayU
            
             List of supported wallets for PayU is given below:

                
                S No. | Provider
                ---
                1 | ItzCash
                ---
                2 | PayZapp
                ---
                3 | OlaMoney
                ---
                4 | JioMoney
                ---
                5 | Amazon Pay
                ---
                6 | PhonePe
                ---
                7 | Airtel Money
                ---
                8 | Oxigen
                ---
                9 | AMEX ezeClick
                ---
                10 | PayCash
                ---
                11 | Citi Bank Reward Points
                ---
                12 | Paytm
                
            

        
### CCAvenue

             List of supported wallets for CCAvenue is given below:

                
                S No. | Provider
                ---
                1 | ItzCash
                ---
                2 | JioMoney
                ---
                3 | Paytm
                ---
                4 | MobiKwik
                
            

        
### Paytm

             List of supported wallets for Paytm is given below:

                
                S No. | Provider
                ---
                1 | Paytm
                
          

        
### Razorpay

         List of supported wallets for Razorpay is given below:

            
            S No. | Provider | Availability 
            ---
            1 | PayZapp | Live 
            ---
            2 | Airtel Money | Live 
            ---
            3 | MobiKwik | Live 
            ---
            4 | JioMoney | Live 
            ---
            5 | Ola Money | Live 
            ---
            6 | Bajaj Pay | [Contact Support](https://razorpay.com/support).  
            ---
            7 | PhonePe | [Contact Support](https://razorpay.com/support). 
            ---
            8 | [PhonePe Switch](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch.md) | **For businesses that are registered with PhonePe Switch Only**. 
            ---
            9 | [PayPal](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/wallets/paypal.md) | **International Payments Only**.
 [Contact Support](https://razorpay.com/support). 
            ---
            10 | [Amazon Pay](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/wallets/amazon-pay.md)| [Contact Support](https://razorpay.com/support).
            
         
   
     
    
    

## International Payments
When a Razorpay business registered in India accepts a payment from a customer using an international card or payment instrument, it is called an international payment.

> **WARN**
>
> 
> **Watch Out!**
> 
> - International payments are supported only on Razorpay.
> - Non-INR payments are not supported on other downstream gateways for international transactions.
> 

    
### Supported Cases

         Given below are a few specific cases where we support international payments.
         1. **Amex Payments** - Amex is considered a domestic payment instrument and is not classified as an international payment. Razorpay converts these payments to the base currency, INR.

         2. **Non-INR Payment Using Indian Payment Card/Instrument** - Payments made in a non-INR currency using an Indian-issued payment card or instrument are considered domestic. Razorpay converts the amount to the base currency, INR.

         3. **INR Payment Using International Card/Instrument** - Although the card or instrument is international, payments made in INR are treated as domestic since the money collection occurs in INR. These transactions can be passed to the downstream gateways.
        

Given below is the list of payment aggregators that support international payments on Optimizer.

S No. | Aggregators | Availability
---
1 | Razorpay | Live
---
2 | Airwallex | Live
---
3 | Stripe | Coming Soon

### Related Information

- [Add Payment Providers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/add-payment-providers.md)
- [SR Analytics Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/success-rate.md)
- [Single Reconciliation View](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/reconciliation.md)
- [Roles and Permissions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/roles-and-permissions.md)
- [Tokenisation for Optimizer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/tokenisation.md)
- [FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/faqs.md)
