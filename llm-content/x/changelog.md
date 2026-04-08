---
title: RazorpayX Changelog
description: List of updates in RazorpayX products, including new feature releases and improvements.
---

# RazorpayX Changelog

- **API Changelog**: Discover new releases and updates regarding Razorpay APIs.

  - **Payments Changelog**: Discover new releases and updates regarding Razorpay Payments.

The following table records changes made to RazorpayX since Jan 2024:

Month-Year | Feature | Description
---
Mar 2026 | Account Validation enabled via Reverse Penny Drop | Validate bank accounts using the [Reverse Penny Drop](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/fund-accounts/reverse-penny-drop.md) method, verifying the authenticity of both the account as well as the account holder. 
---
Nov 2025 | Introduced RazorpayX Corporate Cards. | You can now avail [RazorpayX Corporate Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/corporate-cards.md) powered by RBL and Yes Bank to manage and segregate your business expenses in a controlled way.
---
Nov 2025 | Cashflow Insights enabled in RazorpayX Dashboard | You can now view the cashflow summary of your account(s) on your RazorpayX Dashboard using [Insights](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/cashflow-insights.md).
---
Sept 2025 | Light Theme enabled in RazorpayX Dashboard.| You can now switch between [Dark and Light themes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard.md) for your Dashboard as per your choice.
---
June 2025 | Allowlisting IPs for Payout Links APIs | Allowlisting IP addresses is made mandatory for using the [Payout Links APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/api.md).
---
Mar 2025 | Smart Settlements | Introduced [Smart Settlement](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements/instant.md#initiate-smart-settlements), a sub-feature of Instant Settlements, which enables you to settle amounts upto ₹50 Cr instantly, as a single entry, using the RTGS channel.
---
Mar 2025 | Idempotency Key Made Mandatory | [Idempotency Key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency.md) has been made mandatory for all payouts, starting March 15, 2025.
---
Dec 2024 | Disengagement of ICICI as Partner Bank | The Partnership with ICICI for Current Account services has been closed. Existing RazorpayX customers maintaining Current Accounts with ICICI Bank will continue to receive services and support.
---
Dec 2024 | IDFC First Onboarded as Partner Bank | RazorpayX has partnered with IDFC First Bank to offer Current Account services to customers. You now have the option to open a Current Account with IDFC First through RazorpayX.
--- 
Dec 2024 | Payout Purpose Limit Increased | The maximum number of [Payout Purposes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md#create-payout-purpose)  that can be added has been increased from 200 to 400.
---
Oct 2024 | Petty Cash Removal | Petty Cash Budgeting feature in RazorpayX has been deprecated.
---
Aug 2024 | Bulk Import of Items | You can now [import Items in bulk](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/items/bulk-import-items.md)  from your external tools or templates.
---
Aug 2024 | Bulk Import of Purchase Orders | You can now [import Purchase Orders in bulk](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/purchase-order/bulk-import-po.md) from your external tools or templates.
---
Aug 2024 | Create or Import Purchase Orders | You can now [create or import Purchase orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/purchase-order.md) and link them to vendors and payments.
---
Aug 2024 | Payouts Pro Self-Serve | You can now improve the success rates of transactions by setting multiple accounts for payouts using the dynamic [Payouts Pro Multi-Bank Routing](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/multi-bank-routing.md) feature of RazorpayX.
---
Jul 2024 | Capital | B2B Checkout Financing is no longer available as a Razorpay offering. 
---
Jul 2024 | Idempotency Header for Payouts API | [Idempotency header is now mandatory for all Payouts APIs.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/best-practices.md#handling-5xx-errors-and-idempotency)
---
Jul 2024 | Payouts Downtime Alerts | You can now [receive partner and beneficiary bank downtime alerts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/downtimes.md) via email, SMS and webhooks.
---
Jun 2024 | Payouts Pro Widget | [Payouts Pro Widget](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/multi-bank-routing.md#widget) is now publicly available to users. Get AI-powered insights into Payout performance for previous 30 days.
---
May 2024 | Cost Centers | You can [create cost centers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/cost-centers.md) to streamline your expenses by mapping them to individual functions or activities in your organisation.
---
May 2024 | Current Accounts on Axis Bank | RazorpayX is now offering [Current Accounts in partnership with Axis Bank](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/axis-current-account.md).
---
May 2024 | User Groups | You can [create teams, departments or groups](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/user-groups.md) based on location and other custom categories.
---
Mar 2024 | Deprecation of GST | The [GST](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tax-payments/gst.md) feature on the RazorpayX Dashboard has been deprecated.
---
Feb 2024 | Multi-Branch Management | You can [manage multiple business branches/locations](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/multi-branch-management.md) and track the respective vendor payments from one RazorpayX account.
---
Feb 2024 | Composite Account Validation API | [Introduced Composite Account Validation API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/composite-account-validation.md) to create contact, fund account and validate the bank account (using penny-drop/penniless) and VPA IDs of your customers, in a single API call.
