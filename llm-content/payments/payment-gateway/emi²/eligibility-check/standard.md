---
title: Razorpay EMI² Suite | Standard - Eligibility Check
heading: Eligibility Check on Standard Checkout
description: Boost success rate with Eligibility Check on Razorpay Checkout for Debit Card EMI, Cardless EMI and Pay Later payment options.
---

# Eligibility Check on Standard Checkout

Razorpay offers a pre-eligibility check on Debit Card EMI, Cardless EMI, and Pay Later instruments. By assessing eligibility upfront, your customers can effortlessly choose the most relevant emi² option and complete the purchase quickly.

> **INFO**
>
> 
> **Handy Tips**
> 
> - This feature is available by default. 
> - The eligibility check is performed only for [ Debit Card EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/debit-card-emi.md), [Cardless EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/credit-card-emi.md), and [Pay Later](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/pay-later.md). 
> - Eligibility check is not applicable for Credit Card EMI as it is a pre-eligible form of credit.
> 

## Advantages 

- **Higher Success Rate**

Increase the success rate of transactions with EMI² instruments by displaying only eligible payment options, thereby reducing failed transactions due to ineligibility.

- **Enhance Customer Experience**: Deliver a seamless customer experience through an intuitive UI that enables customers to discover and choose the most relevant affordable options.

## How it Works

A customer selects the products on your website or app and proceeds to Checkout. After choosing EMI or Pay Later as the payment method, the customer can differentiate between the eligible and ineligible payment options. They can opt for an eligible payment option to complete the payment.

![View eligible payment options](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/eligible-payment-options.jpg.md)

- **Eligible**: The customer selects an eligible payment instrument and completes the payment successfully.

- **Ineligible**: The customer can view the reason for ineligibility as highlighted below.
    ![Highlight ineligible payment instruments](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ineligibility-highlight.jpg.md)
    
    To proceed with the payment in case of ineligibility, the customer can choose to:
    - Use a different mobile number for the chosen payment method and try again. 
    - Opt for a different payment instrument/method. 

    ![Demo for ineligible flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/emi-ineligibility.gif.md)

## Reasons for Ineligibility

The table below provides a list of reasons for customer ineligibility with payment methods/instruments and their descriptions:

Reason | Description 
---
Account does not exist | You are not registered with the provider. You may either update the mobile number below or try another payment option.
---
User is not approved | You have not been approved for credit by the provider. You may either update the mobile number below or try another payment option.
---
Expired credit limit | The credit limit has expired. You may either update the mobile number below or try another payment option. 
---
Exhausted credit limit | The credit limit has been exhausted. You may either update the mobile number below or try another payment option.
---
Inactive credit limit | The credit limit is inactive. You may either update the mobile number below or try another payment option.
---
Minimum amount required | The order amount is less than the minimum transaction amount for this EMI provider. You may try using a higher order amount or another payment option.
---
Maximum amount limit | The order amount is above the maximum transaction amount for this EMI provider. You may try using a lower order amount or another payment option.

## List of Payment Methods

View the list of payment methods/instruments and providers on which eligibility check is performed:

  
  HDFC Bank 
  
  
  - axio
  - Fibe
  - HDFC Bank 
  - ICICI Bank 
  - IDFC Bank 
  - Kotak Bank
  
  
  - LazyPay 
  - GetSimpl 
  - ICICI Bank 
  

### Related Information 

- [FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/faqs#eligibility-check.md)
- [EMI² Suite](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi².md)
