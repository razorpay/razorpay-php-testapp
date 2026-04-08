---
title: PayPal
description: Integrate PayPal with Razorpay to accept international payments. Check how Razorpay handles currency conversions for you.
---

# PayPal

PayPal is a payment method that you can integrate with your [Razorpay Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md#integration-types) to accept payments in [international currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

You can accept payments based on the transaction limit of your PayPal account. Know more about the other [payment methods and the transaction limits](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/transaction-limits.md).

### Advantages

Integrating PayPal as a payment method on Checkout offers you the following advantages:

- **Better Success Rates**: Enjoy up to 20% higher success rates.
- **Faster Settlement time**: Get paid on a T+1 settlement schedule.
- **Wide user base**: Reach Over 300 million PayPal users around the world.
- **No additional charges**: PayPal defines the rates for transactions.
- **Currency Conversion**: Handle currency conversions from INR to your customer's native currency.

## Onboarding Process to Enable PayPal

Watch this video to see the onboarding process to enable PayPal on your checkout form.

> **INFO**
>
> 
> **Handy Tips**
> 
> - The PayPal section is visible only in the **Live** mode on the Dashboard.
> - PayPal now supports the Pay Later feature. You should enable both [PayPal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/paypal.md#to-enable-paypal) and the Pay Later options under Account & Settings → Pay Later (under Payment methods) on the Dashboard to enable the Pay Later feature.
> 
> 

    
### To enable PayPal:

         1. Log in to the Dashboard.
         2. Navigate to **Account & Settings** → **International payments** (under Payment methods). Scroll to the **PayPal** section and click **Link Account**.
                
         3. Upon redirection to PayPal:
                - If you do not have a PayPal account, you need to complete the verification process and KYC. This will include confirming your email address by clicking on the link sent to you by PayPal.
                - If you already have a PayPal account, you need to authorise Razorpay to accept payments.

            You should now be able to see your PayPal enablement status set to `Pending` on your Dashboard. PayPal will activate your account within 48 hours if all of the previous steps are successfully completed.

            You can now proceed with the integration. This depends on how you have integrated Razorpay on your website or application.

            By default, your PayPal account is configured to receive USD payments. You can enable more currencies on your account from your PayPal Dashboard.

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             - You should not use the same email ID for multiple MIDs.
>             - Each business should set up a separate PayPal account for each MID.
>             

        

## Standard Checkout Integration

If you are using Razorpay Standard Checkout, you just need to enable PayPal from your dashboard and complete the [onboarding procedure](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/paypal.md#onboarding-process-to-enable-paypal). After the onboarding is completed and PayPal is enabled for you, it appears on your checkout form for all supported currencies.

## Currency Conversion

Customers can use PayPal Currency Conversion to convert international payments in INR (or other currency) to a currency of their choice. This enables businesses to continue accepting payments via PayPal.

   
### Watch how currency conversion works at Razorpay checkout in this video

       
      

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

## Settlements

You receive the payments made using PayPal directly to your PayPal wallet. PayPal makes the settlements in INR.

## Refunds

> **INFO**
>
> 
> **Refunds - PayPal Balance Required**
> 
> Ensure you have sufficient balance in your PayPal account before you initiate a refund.
> 

1. Refunds can be initiated by you either from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#issue-refunds) .
2. The refund amount is deducted from your PayPal account and credited to your customer's PayPal account.

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
