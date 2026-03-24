---
title: PayPal
description: Integrate PayPal with Razorpay to accept international payments. Check how Razorpay handles currency conversions for you.
---

# PayPal

@include payment-methods/paypal-onboarding

## Standard Checkout Integration

If you are using Razorpay Standard Checkout, you just need to enable PayPal from your dashboard and complete the [onboarding procedure](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/wallets/paypal#onboarding-process-to-enable-paypal.md). After the onboarding is completed and PayPal is enabled for you, it appears on your checkout form for all supported currencies.

## Currency Conversion

Customers can use PayPal Currency Conversion to convert international payments in INR (or other currency) to a currency of their choice. This enables businesses to continue accepting payments via PayPal.

   
### Watch how currency conversion works at Razorpay checkout in this video

       
[Video content]

      

- You will have your PayPal account configured to receive payments in all currencies. 
- You can pass the currency in INR to Razorpay or enable more currencies on your account from your PayPal dashboard.
- Razorpay applies [open exchange rates](https://openexchangerates.org/) for currency conversion on an hourly basis. 
- When converting currencies on a payment or transfer, the standard PayPal charges are applicable.

> **INFO**
>
> 
> **Handy Tips**
> 
> - PayPal does not accept payment requests in INR. Razorpay facilitates currency conversions from INR to your customer's home currency.
> - By default, the PayPal conversion feature is enabled on Standard Checkout for all merchants with PayPal account linked with the Razorpay account.
> - This is currently supported only on Razorpay standard checkout integration.
> 

@include payment-methods/paypal-settlements-refunds

## Frequently Asked Questions (FAQs)

.
      
   
   
### 3. I have already registered for PayPal. How do I change the PayPal account which I had added to Razorpay?

       You can log in to your PayPal Dashboard, go to **Settings** and update your email address to your new account.

       If you want to keep both your accounts active, please raise a request with our [Support team](https://razorpay.com/support/).
      

   
### 4. I have enabled PayPal and the status shows activated on my Dashboard. However, why is there no option to pay with PayPal on my checkout?

       PayPal will be shown on your checkout only if the purchasing currency is other than Indian Rupee (INR), for example, if the currency is USD or EUR. PayPal will not appear on your checkout otherwise.
      

   
### 5. What is the pricing for PayPal?

       To know more about the pricing for PayPal check out the [documentation](https://www.paypal.com/in/webapps/mpp/paypal-seller-fees).
      

   
### 6. By when will PayPal be activated on my Razorpay account?

       - **Existing PayPal Account**: Razorpay enables PayPal on your checkout in 2 days.
       - **New PayPal Account**: After you complete all the onboarding steps on PayPal's website, Razorpay enables PayPal on your checkout within 5 working days.
      

   
### 1. I am an existing Razorpay customer, are there any integration changes to be done to support international payments via Razorpay?

       There are no integration changes required for you to accept payments via an international debit or credit card.
       However, if you want to display a foreign currency on your checkout, you need to pass the relevant code in the **currency** parameter in the Checkout code.
      

   
### 2. How do I disable the PayPal payment method activated on my account?

       Please raise a support ticket with Razorpay over [here](https://razorpay.com/support/).
      

   
### 3. I have already registered for PayPal. How do I change the PayPal account which I had added to Razorpay?

       You can log in to your PayPal Dashboard, go to **Settings** and update your email address to your new account.

       If you want to keep both your accounts active, please raise a request with our [Support team](https://razorpay.com/support/).
      

   
### 4. I have completed my registration on PayPal. Why does my status on the Dashboard still say pending?

       Ensure you have uploaded your bank account and company details on the PayPal Dashboard before PayPal can complete your registration. 

       Please log in to to your PayPal account and check if you have completed the 3 steps: 

         a. Verify your email with PayPal. 

         b. Upload and verify your PAN Card. 

         c. Update your Bank Account details. 

      

   
### 5. I have enabled PayPal and the status shows activated on my Dashboard. However, why is there no option to pay with PayPal on my checkout?

       PayPal will be shown on your checkout only if the purchasing currency is other than Indian Rupee (INR), for example, if the currency is USD or EUR. PayPal will not appear on your checkout otherwise.
      

   
### 6. What is the pricing for PayPal?

       To know more about the pricing for PayPal check out the [documentation](https://www.paypal.com/in/webapps/mpp/paypal-seller-fees).
      

   
### 7. By when will PayPal be activated on my Razorpay account?

       - **Existing PayPal Account**: Razorpay enables PayPal on your checkout in 2 days.
       - **New PayPal Account**: After you complete all the onboarding steps on PayPal's website, Razorpay enables PayPal on your checkout within 5 working days.
