---
title: Refunds and Reversals | Technology Partners
heading: Refunds and Reversals
description: Process refunds and reversals using APIs. Refund the base transaction amount and reverse platform and third-party fees.
---

# Refunds and Reversals

You can create refunds and reversals in 2 cases:
- **The base transaction amount is refunded** 

    You can refund the base transaction amount with or without reversing the platform and third-party fees.

- **The platform and third-party fees are reversed** 

    You can reverse the platform and third-party fees with or without refunding the base transaction amount.

### Create Refund Without Reversals

To create refunds without reversals, you can process [Normal Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds.md#create-a-normal-refund) or [Instant Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds.md#create-an-instant-refund ) using our APIs. Know more about [Instant Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds/instant.md).

### Create Refund With Reversals

Sub-merchants can process refunds from their Dashboards. Alternatively, you (the Platform) can process refunds on behalf of sub-merchants. If you are processing the refund, you can specify whether the platform fees should also be refunded or not using the [Refund Payments and Reverse Transfer from a Linked Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route.md) API.

### Create Reversals Only for Platform or Third-Party Fees

Every platform fee or third-party fee is linked with a Transfer. To reverse the platform or third-party fees, use the [Reverse a Transfer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route/reverse-a-transfer.md).

## Related Information 

- [Set up Platform and Third-Party Accounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/control-of-funds/set-up-accounts.md)
- [Process Platform and Third-Party Fees](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/control-of-funds/process-fees.md)
