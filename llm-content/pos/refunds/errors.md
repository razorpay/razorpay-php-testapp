---
title: Handle Refund Errors for Razorpay POS
heading: Handle Refund Errors
description: Check the errors that may occur while processing Refunds and how to handle these errors.
---

# Handle Refund Errors

Sometimes when you try to process a refund request, it fails to get processed and you may encounter `BAD_REQUEST_ERROR` messages stating refunds are not supported. This happens because most of the banks do not support refunds for payments that are more than 6 months old.

## List of Possible Refund Errors

```json: Error Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Refund is not supported by the bank because the payment is more than 6 months old",
    "source": null,
    "step": null,
    "reason": null,
    "metadata": {}
  }
}
```

```json: Error Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Payment is more than 6 months old, only instant refund is supported",
    "source": null,
    "step": null,
    "reason": null,
    "metadata": {}
  }
}
```

To check the refund status, navigate to the **Refund Details** pop-up by clicking on the specific **Refund Id** under the **Transactions** → **Refunds** tab.

You can get the ARN/RRN for successfully processed refunds under the [ Dashboard Refunds tab](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds/view.md) or using the [Fetch Refund API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds.md#fetch-refund-by-id). This is a unique reference number that can be used by customers to track refunds.

### Related Information
- [About Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/pos/refunds.md)
- [Normal Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/pos/refunds/normal.md)
- [Refunds FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/pos/refunds/faqs.md)
