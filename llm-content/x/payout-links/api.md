---
title: RazorpayX | Payout Link APIs
heading: Payout Link APIs
description: List of RazorpayX Payout Links API available to perform various actions.
---

# Payout Link APIs

You can use our APIs to perform various actions required to make payouts. You can perform most of these actions from the [RazorpayX Dashboard](https://x.razorpay.com/auth) as well.

## List of APIs

The table below lists the various APIs and gives a brief description of each API:

API Endpoint | Description
---
[Create Payout Links Using Contact Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-links/create/use-contact-details.md) | Creates a Payout Link using customer's contact details like email id/mobile number. 
---
[Create Payout Links Using Contact ID](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-links/create/use-contact-id.md) | Creates a Payout Link using the Contact id of the customer. [Create a Contact](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/contacts.md#list-of-endpoints) to generate the Contact id. 
---
[Fetch All Payout Links](/api/x/payout-links/fetch-all) | Retrieves the details of all Payout Links created. Use the query parameters to customise Payout Links retrieval. 
---
[Fetch a Payout Link with ID](/api/x/payout-links/fetch-with-id) | Retrieves the details of a particular Payout Link. 
---
[Cancel a Payout Link](/api/x/payout-links/cancel/) | API to cancel an active Payout Link.
---

> **WARN**
>
> 
> **Watch Out!**
> 
> Allowlisting your IP is mandatory for using the Payout Link APIs. Know how to [allowlist your IP](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md).
> 
> 

### Related Information

- [About Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md)
- [About Payout Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links.md)
- [Subscribe to Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/apis/subscribe.md)
