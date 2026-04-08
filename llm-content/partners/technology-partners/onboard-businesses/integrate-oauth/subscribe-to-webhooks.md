---
title: Subscribe to Webhooks | Embedded Payments for Platforms & Marketplaces
heading: Subscribe to Webhooks
description: Setup and manage webhooks for your client application from the Razorpay Dashboard.
---

# Subscribe to Webhooks

Webhooks allow you to build or set up integrations that subscribe to certain Razorpay events on merchant resources. When one of those events is triggered, we send an HTTP POST payload in JSON to a specific URL.

Webhooks can be configured and managed independently for each application you create on your Dashboard, thereby giving you greater control over your notifications.

Know more about [Razorpay Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).

## Set Up Webhooks

Managing webhooks for individual applications follows the same procedure as managing account webhooks.

> **INFO**
>
> 
> **Handy Tips**
> 
> If you are just starting off and have not created an application yet, refer the [create application section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/integration-steps.md#1-create-an-application) to create an app.
> 

To set up webhooks:

1. Log in to the Dashboard.
2. Navigate to **Applications**.
3. On a created application, click **Manage Webhook**.
	![Manage Webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/oauth_test_7.jpg.md)
4. Enter the **Webhook URL** where you will receive the webhook payload when the event is triggered.
	![Edit Webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/oauth_test_8.jpg.md)
5. Create a new **Secret**. This field is optional.
	
> **INFO**
>
> 
> 	**Handy Tips**
> 
> 	The **Secret** can be used to validate that the webhook is from Razorpay, thus it should not be exposed publicly. On the UI, the **Secret** will not be shown after creation. You can leave the **Secret** blank to leave it unedited.
> 	

6. Select the event(s) you want to activate the webhook for from the list of available events.
7. Click **Save** to enable the webhook.

To validate your webhook signature, refer the [Validation section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md#validate-webhooks).

> **INFO**
>
> 
> **Handy Tips**
>  
> Use the Test mode on the Dashboard to test webhooks.
> 

## Webhook Retries

The webhook responses must return a status code in the range 2XX within a window of 5 seconds. If we receive response codes other than this or if the request times out, it is considered a failure.

On failure, a webhook is retried at progressive intervals of time.
