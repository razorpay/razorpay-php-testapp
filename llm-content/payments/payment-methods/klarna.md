---
title: Klarna
description: Accept payments from customers using Klarna.
---

# Klarna

Klarna is a global payment provider that offers flexible payment solutions, allowing customers to Pay Now, Pay Later or pay in installments. These options make payments more convenient for customers and drive conversions for businesses. Here is a breakdown of Klarna's individual payment modes:

    
### Pay Now

         Customers can pay the full amount immediately using their bank account, debit card, or credit card. This option ensures that transactions are completed instantly, providing you with quick access to funds.
        

    
### Pay Later

         Customers have the flexibility to defer the payment for a certain period after the purchase, giving them more time before completing the payment.
        

    
### Pay in Installments (also known as Pay in 3 or 4)

         Customers can split their total purchase amount into smaller, interest-free payments over a set period (often 3 or 4 months). This offers customers financial flexibility without any additional costs, while you can enjoy full payment upfront from Klarna.
        

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
> **Handy Tips**
> 
> - List of [supported region, currencies and payment methods](#supported-region-currencies-and-payment-methods).
> - Razorpay's [pay in native currency](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/dynamic-currency-conversion.md) feature will ensure that your customer is shown the right currency.
> 

    
### Advantages

         - **Flexible Payment Options:** Customers are presented with multiple payment methods, such as Pay Now, Pay Later and pay in installments, allowing them to choose their preferred option during checkout. 
         - **Wide Availability:** Supports various countries and currencies, catering to international customers.
         - **Seamless Integration:** Easily integrates into systems, enhancing the checkout experience. 
         - **High Transaction Limits:** Accommodates both small and large purchases with high transaction limits.
        

### Refunds and Settlements

Payments follow standard refund and settlement timelines.

- You can refund customer payments made using Klarna by following the usual [refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds.md) process.  
 
- Klarna payments take T+21 days to get settled to your Razorpay account.

### Supported Integrations

Secure [S2S integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/klarna/s2s-integration.md) for seamless payment processing.

### Supported Region, Currencies and Payment Methods

Given below is the list of region, currencies and payment methods that support Klarna payments:

Country | Currency Code | Pay Now (instruments vary by market) | Pay Later (in 30 days) | Pay in 3 (in 0, 30 & 60 days) [columWidth="50"] | Financing (6 - 36 months)
---
🇦🇹 Austria (AT) | `EUR` | ✓ | ✓ | x | ✓
---
🇧🇪 Belgium (BE) | `EUR` | ✓ | ✓ | x | x
---
🇩🇰 Denmark (DK) | `DKK` | x | ✓ | ✓ | x
---
🇫🇮 Finland (FI) | `EUR` | x | ✓ | x | ✓
---
🇫🇷 France (FR) | `EUR` | x | x | ✓ | x
---
🇩🇪 Germany (DE) | `EUR` | ✓ | ✓ | x | ✓
---
🇮🇹 Italy (IT) | `EUR` | ✓ | x | ✓ | x
---
🇳🇱 Netherlands (NL) | `EUR` | ✓ | ✓ | x | x
---
🇳🇴 Norway (NO) | `NOR` | x | ✓ | x | ✓
---
🇵🇱 Poland (PL) | `PLN` | x | ✓ | x | x
---
🇵🇹 Portugal (PT) | `EUR` | x | x | ✓ | x
---
🇪🇸 Spain (ES) | `EUR` | ✓ | x | ✓ | x
---
🇸🇪 Sweden (SC) | `SEK` | ✓ | ✓ | x | ✓
---
🇨🇭 Switzerland (CH) | `CHF` | ✓ | ✓ | x | x
---
🇬🇧 United Kingdom (GB) | `GBP` | x | ✓ | ✓ | x

### Minimum and Maximum Transaction Amounts for Klarna Payments

  
    
    Country Code | 6 months | 12 months | 24 months | 36 months
    ---
    AT, DE | EUR 25 | EUR 120 | EUR 1,000 | EUR 1,500
    ---
    FI | EUR 25 | EUR 500 | EUR 1,000 | EUR 1,500
    ---
    NO, SE | NOK/SEK 250  | NOK/SEK 5,000  | NOK/SEK 10,000  | NOK/SEK 15,000 
    ---

  
  
    - Minimum: EUR 35, GBP 25, or DKK 350 

    - Maximum: EUR 1,000, GBP 1,000, or DKK 50,000
  
  
    - Minimum: AT, DE = EUR 0.1 

    - Minimum: Other countries = EUR 1 or equivalent

    - Maximum: BE = EUR 1,500 (new users), EUR 2,500 (returning users) 

    - Maximum: AT, FI, DE, NL = EUR 5,000
  
  
    - Minimum: EUR 0, SEK 0, or CHF 0

    - Maximum: EUR 15,000, SEK 150,000, or CHF 15,000
  

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Chargebacks are possible with this payment method.
>
