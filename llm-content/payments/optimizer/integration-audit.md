---
title: Optimizer Integration Audit Tool
description: Automatically identify issues with your Optimizer payment provider integration before going live.
---

# Optimizer Integration Audit Tool

The Integration Audit Tool offers a secure and controlled setting to comprehensively test your integrations before going live with your payment provider. This thorough evaluation of all integration aspects reduces the risk of issues, ensuring a smooth deployment. By detecting and resolving these issues early, businesses can prevent potential problems before they escalate. This proactive approach helps protect revenue streams and, more importantly, maintains customer trust.

## Supported Payment Providers
Below is the list of payment providers supported for Integration Audit Tool:

    
### Supported Payment Providers

            
             | Payment Provider | Availability
            ---
            1 | Cashfree | Live
            ---
            2 | Paytm | Live
            ---
            3 | PayU | Live
            
        

## Test Integration

Follow the steps given below to add and test your payment provider integration. The integration testing consists of 5 steps:

    
###  Step 1: Credentials Testing

        Follow the steps given below to test your payment provider credentials:

        1. Log in to your Dashboard.
        2. On the left navigation, select **Optimizer** and click **Add provider**.
        3. Select the payment provider you want to add. Fill in the provider and secret key details and click **Test integration**.
            ![Integration Audit](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-select-provider.jpg.md)
        4. If the credentials are invalid, you will get an error. Re-enter the correct details and click **Test Credentials**.
            ![Integration Audit cred error](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-creds-error.jpg.md)
        5. On successful validation of credentials, a pop-up screen appears. Click **Test now**. 
            ![Integration Audit test now](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-test-now.jpg.md)
        

    
###  Step 2: Payment Testing

        On the **Payment testing** screen:
        1. Enter the amount you want to test and click Test payment.
            ![Integration Audit](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-payment-testing.jpg.md)
        
            
> **INFO**
>
> 
>             **Handy Tips**
>         
>             The **Payment type** and **Payment method** will be set as default options.
>             

        2. Scan the QR code and click **Pay Now**.
            ![Integration Audit testing qr](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-payment-testing-qr.jpg.md)

        
            
            Once the payment is successful, click **Continue**. You can click **Test another** if you want to test another payment.

            ![Integration Audit testing success](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-payment-testing-success.jpg.md)
            
            
            If the payment is unsuccessful, an error message and the corrective action will appear.

            ![Integration Audit testing failure](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-payment-test-failures.jpg.md)
            
        
        

    
###  Step 3: Refund Testing

        On the Refund testing screen, click Initiate Refund for the transaction you want to test the refund.

            ![Integration Audit refund](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-refunds-testing.jpg.md)

        
            
            Once the status of the transaction changes to **Initiated**,  click **Continue**.

            ![Integration Audit refund testing success](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-refund-testing-success.jpg.md)
            
            
             If the refund is unsuccessful, an error message and the corrective action appears.

             - Paytm:
                ![Integration Audit refund testing paytm fail](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-refund-testing-paytm-fail.jpg.md)  
             - Other Payment Gateways:
                ![Integration Audit refund testing pgs fail](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-refund-testing-pgs-fail.jpg.md)
            
              
        

    
###  Step 4: Integration Audit Summary

        The **Integration audit summary** screen displays the instrument coverage for all payment methods for the payment provider you want to add.
            ![Integration Audit summary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-summary.jpg.md)
        You can double-click on any instrument to see an expanded view comparing the availability of each payment method for your payment provider with Razorpay's.
             ![Integration Audit summary view](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-summary-view.jpg.md)
        

    
###  Step 5: Provider Settings

        On the Provider settings screen, enable or disable the payment methods you want for your payment provider and click **Go live**.
            ![Integration Audit provider settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-provider-settings.jpg.md)
        
        After completing all the steps mentioned above, you can go live with your payment provider.
        

## View and Edit Payment Provider Details
Once your payment provider is added successfully, you can [view](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/integration-audit.md#view-provider-details)  and [edit](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/integration-audit.md#edit-provider-details) the provider details.

    
### View Provider Details

         To view your provider details:
         1. Log in to your Dashboard.
         2. On the left navigation, select **Optimizer** and click on the payment provider you added. The payment provider details appear. 
            ![Integration Audit view](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-view.jpg.md)
        

    
### Edit Provider Details

         To edit your provider details:
         1. Log in to your Dashboard.
         2. On the left navigation, select **Optimizer** and click on the payment provider you want to edit. 
         3. Click **Edit Details**.
             ![Integration Audit edit](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-edit.jpg.md)
         4. For example, click **Edit production details**.
             ![Integration Audit edit production](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-edit-production.jpg.md)
         5. Make the required changes and click **Test Credentials**.
             ![Integration Audit edit production test](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-edit-production-test.jpg.md)
         6. A confirmation pop-up appears, click **Yes** to save your changes.
             ![Integration Audit edit production save](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/integration-audit-edit-production-save.jpg.md)
