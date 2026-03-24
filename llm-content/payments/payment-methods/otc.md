---
title: Payment Methods | OTC (Cash & Cheque)
heading: OTC (Cash & Cheque)
description: Provide OTC (Over The Counter) payment method to customers on Checkout. Find integration steps.
---

# OTC (Cash & Cheque)

To set up webhooks:

1. Log in to the Dashboard and navigate to **Accounts & Settings**.
2. Click **Webhooks** under **Website and app settings**.
3. Click the **+ Add New Webhook** button.

   ![Add a new webhooks button on the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/webhooks-webhook-creation-1.jpg.md)
4. In the **Webhook Setup** pop-up page:
    - Enter the **URL** where you want to receive the webhook payload when an event is triggered. We recommend using an HTTPS URL.
      
        
> **INFO**
>
> 
>         **Handy Tips**
>       
>         - You can set up to **30 URLs** to receive Webhook notifications. Webhooks can only be delivered to public URLs. 
>         - If your URL contains `razorpay` as a domain, you will not be able to add the URL and will receive an error. 
>         - If you attempt to save a localhost endpoint as part of a webhook setup, you will notice an error. Know more about [testing Webhooks on an application running on localhost](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md#application-running-on-localhost).
>         

       
    - Enter a **Secret** for the webhook endpoint. The secret is used to validate that the webhook is from Razorpay. Do not expose the secret publicly. Know more about [how to validate webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md).
 
        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         - When setting up the webhook, specify a secret. Use this secret to validate that the webhook is from Razorpay. Entering the secret is optional but recommended. The secret should never be exposed publicly.
>         - The webhook secret does not need to be the Razorpay API key secret.
>         

     
    
    - In the **Alert Email** field, enter the email address to which the notifications should be sent in case of webhook failure. You will receive webhook related notifications like failures, deactivation and so on.
    - Select the required events from the list of **Active Events**.
    ![List of active webhook events on Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/webhooks-webhook-creation-2.jpg.md) 

5. Click **Create Webhook**. After you set up a webhook, it appears on the list of webhooks.
    ![List of webhooks on Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/webhooks-webhooks-list.jpg.md)
6.  You can select the webhook and click **Edit** to make more changes.
