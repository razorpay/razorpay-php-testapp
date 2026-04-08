---
title: Update Default Rule
description: Know how to update the default rule for Optimizer.
---

# Update Default Rule

The default rule applies to transactions that do not satisfy any of the custom rules.
For example, you can ensure that 100% of all transactions is routed through payment gateway A.

## View Default Rule
To view the default rule:
1. Log in to the Dashboard.
2. Select **Optimizer**.
3. Click **View Default Rule**. By default, 100% of transactions are routed through Razorpay. You can choose to retain it or edit it as per your requirements.

![View Default Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-view-default-rule.jpg.md)

## Edit Default Rule
To edit the default rule:
1. Click **View Default Rule**.
2. In the side pane, click **Edit Rule**.
    ![Edit Default Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-edit-default-rule.jpg.md)
3. The rule details appear. Click **Edit Target Provider**.
4. Update the priority. Let us assume you want to ensure that 80% of transactions are routed through Razorpay and 20% through payment gateway ABC. To do this:
    1. Enter `80` in the **Route** field and select `Razorpay` against the **payment via** field.
    2. Click **Add Another Provider**.
    3. In the new row, enter `20` in the **Route** field and select `ABC` against the **payment via** field.
        ![Edit Default Rule Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-edit-default-rule-details.jpg.md)
    4. Click **Next**.
    5. Click **Publish Edits**.
    6. Click **Yes, Publish** to confirm the change.

### Related Information

- [Add Payment Providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/add-payment-providers.md)
- [Manage Rules](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/manage-rules.md)
