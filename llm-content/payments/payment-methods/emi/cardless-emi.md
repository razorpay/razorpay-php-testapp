---
title: Cardless EMI at Razorpay Standard Checkout
heading: About Cardless EMI
description: Offer automatic EMI payments without using credit or debit cards to your customers. Check the payment flow and supported Cardless EMI providers.
---

# About Cardless EMI

- **Cardless EMI Changelog**: Discover new features, updates and deprecations related to Cardless EMI (since Jan 2024).

Offer Cardless EMI as a payment method to convert their payment amount to EMIs without a debit or credit card. Customers enjoy the benefits of the EMI as the payments are made using credits approved by the supported Cardless EMI Payment Partners.

> **WARN**
>
> 
> **Watch Out!**
> 
> Instant Refunds are not supported on EMI, Cardless EMI and Pay Later.
> 

> **INFO**
>
> 
> **Feature Enablement**
> 
> Cardless EMI as a payment method is not enabled by default. Raise a request with our [Support Team](https://razorpay.com/support/#request) to enable this feature.
> 
> 

## Supported Payment Partners

Following is the list of supported Payment Partners for Cardless EMI and the minimum order amount stipulated by them:

    
        
        Banks | Provider Code | Minimum Order Amount
        ---
        ICICI Bank | `icic` | ₹7000 
        ---
        IDFC Bank | `idfb` | ₹5000
        ---
        HDFC Bank | `hdfc` | ₹5000
        ---
        Kotak Bank| `kkbk` | ₹3000
        ---
        [axio](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/cardless-emi/axio.md) | `walnut369` | ₹900 
        ---
        Fibe | `earlysalary` | ₹3000  
        ---
        ZestMoney | `zestmoney` | ₹3000
        
        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         Check the standard [interest rates charged by Banks/Partners](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/faqs/#1-what-are-the-standard-interest-rates-charged.md).
>         

    
    
        
        Payment Partners | Provider Code | Minimum Order Amount 
        ---
        axio | `walnut369` | ₹900
        ---
        Fibe | `earlysalary` | ₹3000
        ---
        ZestMoney | `zestmoney` | ₹3000
        

        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         Check the standard [ interest rates charged by Pay Later Providers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/faqs/#2-what-are-the-standard-interest-rates-charged.md).
>        

    
    
        
        Payment Partners | Provider Code | Minimum Order Amount 
        ---
        [ShopSe](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/cardless-emi/shopse.md) | `shopse` | ₹3000
        ---
        [Snapmint](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/cardless-emi/snapmint.md) | `snapmint` | None
        

        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         Check the standard [ interest rates charged by Pay Later Providers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/faqs/#2-what-are-the-standard-interest-rates-charged.md).
>        

    

## Payment Flow

Given below is a diagram that explains the payment flow for Cardless EMI:

![payment flow for Cardless EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-flow-cardless_emi.jpg.md)

## Payment Flow on Standard Checkout

Customers select the products on your website or app and proceed to Checkout. On the Checkout page, the customers:

1. Enter their **Phone Number** and click **Continue**.
1. Select **EMI** as the payment method.
    ![Select emi payment option on checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/emi-options-card.jpg.md)
1. Select **Cardless and Others**.
    ![Select Cardless and Others](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/emi-select-cardless.jpg.md)
1. Choose a payment instrument from the list and select the EMI tenure. Click **Continue**.
    ![EMI tenure and click Select Plan](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/emi-cardless-tenure.jpg.md)

After the successful payment, Razorpay redirects customers to your application or website. Customers' monthly statements will reflect the EMI amount with interest charged by the bank.

You will receive the entire payment amount from the Cardless EMI service provider. Based on the terms and conditions, the customer pays the total payment amount with additional interest (if any) as EMIs to the provider.

## Standard Checkout Integration

No additional integration is required to show Cardless EMI on your Standard Checkout page.

## FAQs

See: [Cardless EMI FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/faqs/#cardless-emi.md).
