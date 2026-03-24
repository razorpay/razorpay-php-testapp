---
title: Payment Gateway | EMI² Suite - FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Razorpay EMI² Suite.
---

# Frequently Asked Questions (FAQs)

## Common

    
### 1. What are the issuers that Razorpay supports for each EMI² method?

         
         Method | Partners
         ---
         Credit Card EMI | 12+ leading issuers including, Amex, HDFC, ICICI and SBI. Find the complete list of [banks supporting Credit Card EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/faqs.md#credit-card-emi).
         ---
         Debit Card EMI | HDFC, IndusInd, and ICICI Bank.
         ---
         Cardless EMI | ZestMoney, axio, InstaCred, HDFC Bank, Fibe and more. Find the complete list of [banks supporting Cardless EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/faqs.md#cardless-emi).
         ---
         Pay Later | LazyPay and PayPal.
         
        

    
### 2. What is the difference between Cardless EMI & Pay Later?

         
            
                [Cardless EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/cardless-emi.md) is a digital EMI option that allows your customer to pay in installments without access to a credit or debit card. Usually, customers prefer this method for making high-value payments.
            
            
                [Pay Later](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md) is a virtual credit card that lets your customer shop now and pay later. It provides zero-interest digital credit for 14-45 days (varies by provider). Our partners for Pay Later are - FlexiPay by HDFC Bank, ICICI Pay Later, Simpl and LazyPay.
            
         
        

    
### 3. Is Instant Refund supported on any EMI² Payment Method?

         No, instant refunds are not supported on EMI, Cardless EMI and Pay Later.
        

    
### 4. How can I disable Payment methods?

         Raise a request with our [Support team](https://razorpay.com/support/) to disable payment methods.
        

## Pay Later

    
### 1. How can my customer pay using Pay Later?

         Pay Later is available as a payment option at Razorpay checkout. To make a payment, customers must be registered with Razorpay's Pay Later partners - LazyPay and PayPal.
        

    
### 2. What are the standard interest rates charged by Pay Later providers?

         The standard interest rates charged by the providers for Pay Later are given below:

         
         Pay Later | Provider Code | Minimum Transaction | 15 days | 30 days | 45 days | 60 days | 90 days
         ---
         LazyPay | `lazypay` | ₹1 | Interest free | NA | NA | NA | NA
         ---
         PayPal | `paypal` | ₹100 | Interest free | NA | NA | NA | NA
         
         
         * Interest rates are determined on a case-to-case basis. [Contact support](https://razorpay.com/support/#request) for more information.

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          All interest rates mentioned above are per annum.
>          

        

## EMI

### Common

    
### 1. Can my customers avail Offers for EMI payments at Checkout?

         Yes, they can avail offers for EMI payments at checkout. Know more about [ creating EMI Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers.md).
        

    
### 2. If a customer chooses EMI as the payment method, do I get the full amount upfront?

         Yes, you receive the full amount at once and the provider/bank converts it into EMI for the customer.
        

    
### 3. What happens when the customer fails to pay the EMI?

         The loss is borne by the provider/bank. You would have already gotten the full amount.
        

### Debit Card EMI

@include payment-methods/emi/emi-plans-debit

### Credit Card EMI

@include payment-methods/emi/emi-plans-credit

### Cardless EMI

@include payment-methods/emi/emi-plans-cardless

## Eligibility Check

    
### 1. How does eligibility check work?

         Razorpay has partnered with various Debit Card EMI, Cardless EMI, and Pay Later providers. The providers determine customer eligibility for payment instruments based on their respective pre-defined criteria. Razorpay aggregates the information and presents customers with eligible payment options on checkout.

         The customer proceeds with the selected payment option on Razorpay checkout if eligible. If ineligible, alternate options are presented.
        

    
### 2. What is the pre-defined criteria to determine customer eligibility?

         The pre-defined criteria are specific factors each provider uses, such as repayment history, digital footprint, and bureau score, to assess a customer's creditworthiness.
        

    
### 3. What parameters are required during the eligibility check process?

         The providers determine customer eligibility based on their mobile number and order amount for the requested transaction.
        

    
### 4. If a customer is ineligible for payment, what should they do next?

         The customer can view the reason for ineligibility and choose to:
         - Use a different mobile number for the chosen payment instrument and try again. 
         - Opt for a different payment instrument/method.
        

    
### 5. What are the reasons for ineligibility?

         You can view the [list of reasons for ineligibility](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/eligibility-check/standard.md#reasons-for-ineligibility) and their descriptions.
        

    
### 6. Where can I find the minimum and maximum order amount eligible for a specific payment method/instrument?

         You can view the minimum and maximum order amount for the following payment methods. However, ensure you [check the providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/eligibility-check/standard.md#list-of-payment-methods) on which eligibility check is performed.
         - [Debit Card EMI](#5-can-you-provide-a-list-of-the)
         - [Cardless EMI](#1-what-are-the-standard-interest-rates-charged)
         - [Pay Later](#2-what-are-the-standard-interest-rates-charged)

         Please note that not all the providers listed under the above methods are applicable for an eligibility check.
