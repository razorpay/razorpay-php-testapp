---
title: Validate and Test Webhooks
description: Validate and test Payments and Payout Webhooks before you start using them. Read about idempotency and the importance of the order of Webhook Events.
---

# Validate and Test Webhooks

You need to validate and test the webhook before starting using them. It is also important to understand idempotency and the importance of the order of Webhook Events.

## Test Webhooks

You can test the webhooks to verify payloads or check if your webhook integration is working. Test events get triggered on a transaction done in the **Test** mode. As the payload structure remains the same in the **Live** and **Test** modes, you can rely on your stage testing.

You can test webhooks:
- [Using request interceptor tools](#using-request-interceptor-tools)
- [On an application running on localhost](#application-running-on-localhost)
- [On an application running on your staging environment](#application-running-on-your-staging-environment)

### Using Request Interceptor Tools
There are many free webhook testing tools available online. However, please note that certain domains are blacklisted for security reasons and cannot be used for webhook URLs.

To test webhooks:
1. Choose a webhook testing service.
2. Create your endpoint.
3. Copy the endpoint created for you.
4. Proceed to set up webhooks, but with the following changes:
    1. Ensure you are using **Test** mode on the Dashboard.
    2. Paste the endpoint you copied in the previous step in the **Website URL** field.

If you have enabled the appropriate webhook event during setup, you will receive the corresponding webhook payload on your requestbin.com site.

### Blacklisted Domains

For security reasons, the following domains are blacklisted and cannot be used as webhook URLs:

    
        - `burpcollaborator.net`
        - `oast.pro`
        - `interact.sh`
        - `canarytokens.com`
        - `requestbin.com`
        - `webhook.site`
        - `hookbin.com`
        - `beeceptor.com`
        - `mockbin.org`
        - `ngrok.io`
        - `loca.lt`
    
    
        - `metadata.google.internal`
        - `metadata.google.internal.`
        - `localhost`
        - `localhost.localdomain`
        - `.onion`
        - `.local`
        - `.internal`
        - `.corp`
    

### Application Running on Localhost

You cannot use localhost directly to receive webhook events as webhook delivery requires a public URL. Due to security restrictions, many common tunneling services are blacklisted. You can handle this by creating a tunnel to your localhost using `zrok`. Know more about [zrok](https://docs.zrok.io/docs/zrok/getting-started).

### Application Running on Your Staging Environment

You can test your webhook integration in the staging environment before taking it live. You should set up webhooks in the **Test** mode. You can configure your staging host endpoint in test mode and receive test events on it.

> **INFO**
>
> 
> **Handy Tips**
> 
> Enter the default OTP `754081` when prompted, while setting up, editing or deleting a webhook in test mode.
> 
> 
> 

## Validate Webhooks

When your webhook `secret` is set, Razorpay uses it to create a hash signature with each payload. This hash signature is passed with each request under the `X-Razorpay-Signature` header that you need to validate at your end. We provide support for validating the signature in all of our [language SDKs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/server-integration.md).

If you have changed your webhook secret, remember to use the old secret for webhook signature validation while retrying older requests. Using the new secret will lead to a signature mismatch.

`X-Razorpay-Signature`
: The hash signature is calculated using HMAC with SHA256 algorithm; with your webhook secret set as the key and the webhook request body as the message.

You can also validate the webhook signature yourself using a [HMAC](https://en.wikipedia.org/wiki/Hash-based_message_authentication_code) as shown below:

```html: HMAC Hex Digest 
key                = webhook_secret
message            = webhook_body // raw webhook request body
received_signature = webhook_signature

expected_signature = hmac('sha256', message, key)

if expected_signature != received_signature
    throw SecurityError
end

```

> **WARN**
>
> 
> **Do Not Parse or Cast the Webhook Request Body**
> 
> While generating the signature at your end, ensure that the webhook body passed as an argument is the **raw webhook request body**. **Do not parse or cast the webhook request body**.
> 

## Idempotency

There could be scenarios where your endpoint might receive the same webhook event multiple times. This is an expected behaviour based on the webhook design.

To handle duplicate webhook events:
1. You can identify the duplicate webhooks using the `x-razorpay-event-id` header. The value for this header is unique per event.
2. Check the value of `x-razorpay-event-id` in the webhook request header. 
3. Verify if an event with the same header is processed at your end.

## Order of Webhooks

Ideally, you should receive a webhook in the order in which the webhook events occur. However, you may not always receive the webhooks in the order.

### Example - Payments

For example, in the case of a payment, you should receive webhooks in the following order:
1. `payment.authorized`
2. `payment.captured`

**The above order may not be followed at all times.** You should configure your webhook URL to not expect delivery of these events in this order and handle such scenarios. 

### Example - RazorpayX

Take payouts in RazorpayX as an example. For payouts, you should receive webhooks in the following order:
1. `payout.pending` (if you have [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) enabled on your account)
2. `payout.queued` (in case your [business account does not have sufficient balance to process the payout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/queued.md))
3. `payout.initiated`
4. `payout.processed` or `payout.reversed`

The above order **may not be followed at all times**. Please keep this in mind and configure your webhook URL to handle such scenarios.

The `processed` and `reversed` states are the last states for a payout. Their corresponding webhooks `payout.processed` or `payout.reversed` indicate this state change. Any webhook received after these should be ignored.

### Related Information

- [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md)

- [Set Up and Edit Payments Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

- [Set Up and Edit Payout Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payouts.md)
