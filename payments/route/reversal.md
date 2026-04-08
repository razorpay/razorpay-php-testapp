---
title: Payment Reversals
description: Initiate a partial and full payment reversal to your business account.
---

# Payment Reversals

Initiate a reversal operation of the funds transferred to your Linked Account using your Dashboard. 

- You can initiate a full or partial reversal. 
- You can initiate a reversal even if the funds are settled to a Linked Account, as long as there is a floating balance available.
- For all refund requests made by the end customer, the fund transfer happens from the primary account or Linked Account. Hence, you need to initiate a reversal of funds from your Linked Accounts and initiate the customer's refund. You can also use the automated method of reversing funds before a refund. Upon enabling the `Reverse All` option on a payment refund request, we will automatically reverse all transfers made on the payment before refunding the payment to the customer.

In certain cases, Linked Accounts must directly refund the amount to the customers. To handle this, you can [enable customer refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/linked-account.md#enable-refunds-capability) for linked accounts from your Dashboard. The Linked Account users can [issue refund to the customer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/linked-account/initiate-refund.md) from the Linked Account Dashboard.

## Reversal Checklist

- Ensure the Linked Account has sufficient nodal balance to create a reversal.
- Pass the `reverse_all` parameter for the reversal from all the linked accounts where the transfer has been made.
- The `reverse_all` parameter cannot be applied on partial refunds.

## Create a Reversal

Watch this video to see how to create a reversal.

To initiate a reversal:

1. Log in to the Dashboard and click **Route** under **PAYMENT PRODUCTS**.
2. Click the **Transfers** tab and then click the relevant **Transfer ID**.
3. In the **Transfers details** pane, click **Create reversal**.
    1. For a full reversal, enter the total transfer amount. Add internal notes and share it with Linked Account if required. Click **Create Full Reversal**.
    2. You can also make a partial reversal. Enter the amount, add notes if required and click **Issue Partial Refund**.
4. A dialog box is displayed. Click **Yes, Reverse**.

You can view the reversal details under the **Reversals** tab.

### Related Information
- [Transfer Funds to Linked Accounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/transfer-funds-to-linked-accounts.md)
- [Transfers and Related Fees](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/transfer-fees-example.md)
- [Schedule Settlements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/schedule-settlement.md)
- [Refund to Customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/refund.md)
