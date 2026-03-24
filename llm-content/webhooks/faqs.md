---
title: Webhooks | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Razorpay webhooks.
---

# Frequently Asked Questions (FAQs)

### 1. How many webhooks are allowed per Merchant id?

       
         - For Payments, you can create up to 30 different webhook URLs.
         - For RazorpayX, currently, only one webhook is allowed per Merchant ID.
       
       
      

   
### 2. Why am I getting an error message as "private ip found for host"?

       Webhooks can only be delivered to public URLs. If you attempt to save a localhost endpoint as part of a webhook setup, you will notice this error. Know more about the [ alternatives to localhost](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md#application-running-on-localhost).
      

   
### 3. How to resolve webhook signature validation errors?

       -  **Secret mismatch**

         Signature validation errors happen when the secret configured during webhook setup does not match the secret used during signature generation. Ensure the secret you pass while generating the signature matches the secret configured in the webhook setup.

      
            
> **WARN**
>
> 
>             **Watch Out!**
>             
>             The webhook secret does not need to be the merchant secret key provided by Razorpay.
>             

            If you do not remember the secret used during setup, change the secret by editing the webhook. Know more about [editing Payments webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md) and [Editing Payouts Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payouts.md).

       -  **Issue with the signature generation logic**

         While generating the signature at your end, you must ensure that the webhook body passed as an argument is the raw webhook request body. This is not recommended as your method of JSON encoding can be different from ours. Instead, you should be taking the raw body and using that directly. This should always result in the same signature.

         
       -  **Secret changed recently on the Dashboard**

         If you have changed your webhook secret, remember to use the old secret for webhook signature validation while retrying older requests. The new secret can only be used for all events generated after the secret is updated. 
      

   
### 4. What will happen if the webhook event is not received?

       Every event that receives a non-2xx response is considered an event delivery failure by Razorpay's system. If there is a delivery failure, we retry the delivery in exponential backoff policy 24 hours after event creation timestamp.
      

      
### 5. Can a webhook event be replayed from Razorpay's side?

       You can request a replay of a webhook event from Razorpay's side if it meets the following criteria:
         - The webhook should be enabled on the dashboard during the occurrence of this event.
         - The webhook event should not be older than 15 days.
         - The webhook event's signature validation should be done using the same signature during the occurrence of this event.
         - The webhook event should be specific to payments, orders and so on. 

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             Currently, bulk replaying of webhook events is not possible. 
>             

         
         
         ![Webhooks Replay Request.gif](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/webhook-replay-request.gif.md)
      

   
### 6. Why is my webhook disabled?

         A webhook is retried at progressive intervals of time on failure, defined in the exponential backoff policy, for 24 hours. If the webhooks continue to fail for 24 hours, the webhook is disabled. You need to enable the webhook from the Dashboard after fixing the errors at your end.

         Whenever a webhook is disabled, you are notified on your **Alert Email Address** as configured during webhook setup. If no Alert Email Address was provided during webhook setup, an email is sent to the email address configured under **Settings** on the Dashboard.

         
> **WARN**
>
>  
>          **Watch Out!**
> 
>          Please note that Razorpay considers any non-2xx response as an event delivery failure. Please make sure the API responds with 2xx when you successfully consume the event at your end.

>          

      

   
### 7. Why am I receiving the same event multiple times?

       To avoid an event being missed, Razorpay follows at-least-once delivery semantics. In this approach, if we do not receive a successful response from your server, we resend the webhook. 
   
       There could be situations where your server accepts the event but fails to respond in 5 seconds. In such cases, the session is marked timeout. It is assumed that the webhook was not processed and is sent again.

       1.  Ensure your server is configured to handle or receive the same event details multiple times.
       2. Check the value of `x-razorpay-event-id` in the webhook request header. The value for this header is unique per event and can help you determine the duplicity of a webhook event.
      

   
### 8. Why am I not able to consume webhooks in the production environment, whereas I can consume in the test environment?

       Razorpay Production environment does not support the older versions of TLS 1.0 and 1.1 due to security concerns around these protocols.

       1. The TLS protocol is used to encrypt your servers' communications with Razorpay, so it is important that your integration uses the latest version (TLS 1.2 is much more secure than its predecessors.).

       2. As an integration checklist, please whitelist all the [ Webhook IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/security/whitelists.md#webhook-ips).
      

   
### 9. Where can I find the webhooks log history?

    To view the webhooks log history:
     1. Log in to your Dashboard.
     2. On the left navigation, click **Developers** → **Webhooks**.
         ![webhooks logs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/webhook-logs.jpg.md)
     3. Select the webhook for which you want to view the log history.
         ![webhooks logs details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/webhook-log-details.jpg.md)
   

   
### 10. Is there a standard webhook response structure for all payment methods?

       No, there is no standard webhook response structure across all payment methods. However, core parameters remain consistent while method-specific fields vary. Refer to [webhook events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md#sample-payloads) for payload examples for each payment method.
      

   
### 11. How do I handle payment cancellation or timeout scenarios?

       For scenarios where users close payment windows, switch tabs, or abandon payments, use these webhook events:
          - `payment.failed`: Triggered when payment fails or times out.
          - `payment.authorized`: Monitor for late authorisations after apparent failures.

       Payment window closure does not always trigger immediate events. Use timeout handling and payment status verification for reliable payment flow management.
