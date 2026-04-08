---
title: Set Refund Speed
description: Set the default refund speed at which to process refunds. You can also override the default refund speed.
---

# Set Refund Speed

You can configure the speed at which all the refunds should be processed for your customers.

## Set Default Speed of Refunds

Depending on your business needs, you can select from the following:

- **Normal Refund**

In this mode, the speed attribute is set to `normal`. The customers will receive their refunds within 5-7 business days.

- **Instant Refund**

In this mode, the speed attribute is set to `optimum`. Razorpay attempts to initiate fund transfer using IMPS, NEFT or UPI. The customer will receive the refunds instantly. If unsuccessful, Razorpay processes the refund via the `normal` speed.

The selected speed is set as the **default speed** and all the refunds, thereafter, will be processed at the chosen speed.

To set the default speed for all the refunds:

1. Log in to the Dashboard.
2. Navigate to **Account & Settings** and click **Capture and refund settings** under the **Payments and refunds** section.
3. In the **Default Refund Speed** section, choose between **Normal Refund** and **Instant Refund**.

    
    **Handy Tips**

    The chosen value is also applied as the default speed in the [Refund API request](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds.md).
    

## Override Default Refund Speed

You can override the default refund speed while refunding a payment from the **Transactions** → **Payments** tab of the Dashboard.

Watch this video to see how to override the default refund speed while issuing a refund.

[Video: https://www.youtube.com/embed/hOhr1x_xAls]

The possible ways in which you can switch between Normal and Instant Refunds are listed below:

**Default Speed setting** | **All Refunds** | **Refund Payment option** | **Processed speed of the Refund**
---
**Normal Refund** | All the refunds are processed at the `normal` speed. | **Refund Instantly** option is selected. | The refund is processed at the `optimum` speed. If an instant refund is not possible, Razorpay initiates a normal refund.
---
**Instant Refund** | All the refunds are processed at an `optimum` speed.
 If an instant refund is not possible, Razorpay initiates a normal refund. | **Refund Instantly** option is unselected. | The refund is processed at the `normal` speed.

To set the default speed for all the refunds:

1. Log in to the Dashboard.
2. Navigate to **Account & Settings** and select **Capture and refund settings**.
3. In the **Default Refund Speed** section, choose between **Normal Refund** and **Instant Refund**.

    
    **Handy Tips**

    The chosen value is also applied as the default speed in the [Refund API request](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds.md).
    

### Related Information
- [About Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md)
- [Normal Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds/normal.md)
- [Batch Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds/batch.md)
- [Issue Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds/issue.md)
- [View Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds/view.md)
- [Refunds FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds/faqs.md)
