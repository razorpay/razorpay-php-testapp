---
title: RazorpayX | Subscribe to Webhooks
heading: Subscribe to Webhooks
description: Subscribe to various Webhook events related to RazorpayX to receive instant notifications.
---

# Subscribe to Webhooks

Webhooks (Web Callback, HTTP Push API or Reverse API) are one of the ways in which one web application can send information to another application in real-time when a specific event happens. Know more about [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).

## Set Up and Edit Payout Webhooks
You must first [set up and edit Payout Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payouts.md) as per your requirement.

## Validate and Test Webhooks
Then you must [validate and test webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md) as a best practice. 

## Webhook Events and Descriptions

Listed below are the various webhook events available in RazorpayX. The payload remains the same irrespective of the `fund_account_type`, that is, a bank account, VPA or card, to which the payout is made.

The table below lists the webhook events available for RazorpayX Payouts.

Webhook Event | Applicable For | Description
---
`payout.pending` |_all payouts_ | Triggered whenever a payout moves to the `pending` state. The payout remains in this state till you approve or reject it.
---
`payout.rejected` |_all payouts_ | Triggered whenever a payout moves to the `rejected` state. The payout was rejected by someone from your team.
---
`payout.queued` |_all payouts_ | -  Triggered whenever a payout moves to the queued state. Payout goes to queued state when you do not have sufficient funds to process it or when the beneficiary bank/NPCI/partner bank is down. This event is applicable only for RazorpayX Lite.
- You will receive the reason for the payout to be in the queued state as part of the status_details object.

---
`payout.initiated` |_all payouts_ | Triggered when the payout moves to the `processing` state when the payout is created or from the `queued` state when sufficient funds are available to process the payout.
---
`payout.processed` |_all payouts_ | Triggered when a payout moves to the `processed` state. This happens when the payout is processed by the contact's bank.
---
`payout.updated`|_all payouts_ | Triggered whenever there is a change in the payout entity. For example, when we receive the UTR for the payout from the bank. - For NEFT transactions, this webhook is fired within 90 seconds.
- For IMPS and UPI transactions, this webhook is generally fired immediately.

---
`payout.reversed` |_all payouts_ | Triggered whenever a payout fails and the amount is returned to your business account.
---
`payout.failed` |_all payouts_ | Triggered when a payout is failed because the beneficiary bank OR NPCI OR processing partner bank is down. If the beneficiary bank/partner bank/NPCI does not recover within the stipulated SLA, a FAILED event will be sent with the respective reason. 
> **INFO**
>
> **Handy Tips** It is mandatory to subscribe to the `payout.failed` event if you are using Payout APIs. 

---
`payout.downtime.started` | _all payouts_ | Triggered when a payout downtime starts. Do not initiate a payout if this is triggered since the beneficiary bank is down and the payout will fail. 
> **WARN**
>
> **Watch Out!** UPI mode is not supported by `payout.downtime` webhooks. 
 
---
`payout.downtime.resolved` | _all payouts_ | Triggered when a payout downtime is resolved. Make payouts once this webhook is triggered as it indicates that the beneficiary bank downtime is resolved.

The table below lists the webhook events available for RazorpayX transactions.

Webhook Events | Description
---
`transaction.created`| Triggered whenever you: -  Make a Payout (RazorpayX Lite). 
-  Add funds to your RazorpayX account (RazorpayX Lite). 

When your webhook `secret` is set, Razorpay uses it to create a hash signature with each payload. This hash signature is passed with each request under the `X-Razorpay-Signature` header that you need to validate at your end. Support for validating the signature is provided in all our  [language SDKs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/server-integration.md).

> **WARN**
>
> 
> **Do Not Parse or Cast the Webhook Request Body**
> 
> While generating the signature at your end, ensure that the webhook body passed as an argument is the **raw webhook request body**. **Do not parse or cast the webhook request body**.
> 

```PHP:PHP
// PHP SDK: https://github.com/razorpay/razorpay-php
use Razorpay\Api\Api;
$api = new Api("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

$api->utility->verifyWebhookSignature($webhookBody, $webhookSignature, $webhookSecret);
// $webhookBody should be raw webhook request body

```PYTHON:Python
# Python SDK: https://github.com/razorpay/razorpay-python
import razorpay
client = razorpay.Client(auth=("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]"))

client.utility.verify_webhook_signature(webhook_body, webhook_signature, webhook_secret)
# webhook_body should be raw webhook request body

```RUBY:Ruby
# Ruby SDK: https://github.com/razorpay/razorpay-ruby
require razorpay

Razorpay::Utility.verify_webhook_signature(webhook_body, webhook_signature, webhook_secret)
# webhook_body should be raw webhook request body

```C:C#
// C# SDK: https://github.com/razorpay/razorpay-dot-net

Utils.verifyWebhookSignature(webhookBody, webhookSignature, webhookSecret);
// webhookBody should be raw webhook request body

```Java:Java
// Java SDK: https://github.com/razorpay/razorpay-java

Utils.verifyWebhookSignature(webhookBody, webhookSignature, webhookSecret);
// webhookBody should be raw webhook request body
```

`X-Razorpay-Signature`
: The hash signature is calculated using HMAC with SHA256 algorithm, your webhook secret set as the key and the webhook request body as the message.

You can also validate the webhook signature yourself using an [HMAC](https://en.wikipedia.org/wiki/Hash-based_message_authentication_code) as shown below:

```
key                = webhook_secret
message            = webhook_body // raw webhook request body
received_signature = webhook_signature

expected_signature = hmac('sha256', message, key)

if expected_signature != received_signature
    throw SecurityError
end
```

## Sample Payloads and Events

See [Payout Sample Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md#payout-payloads).

For transaction webhook events, check the [Transaction Sample Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md#transaction-payloads).

### Related Information

- [Set Up Webhooks for Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payouts.md)
- [Payout APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payouts.md)
