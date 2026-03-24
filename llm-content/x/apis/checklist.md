---
title: API Integration Checklist for RazorpayX
heading: API Integration Checklist
description: Ensure you follow all the best practices listed here to use our APIs efficiently.
---

# API Integration Checklist

The following table lists the recommended practices for a successful API Integration with RazorpayX.

Checklist | Description
---
Ensure you have a Live Account | You can access both, Live and Test mode. [Generate Key ID and Secret](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/#generate-api-key.md) in Live mode for real-time transactions.
---
Select the Type of Account | -  [Current Account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/current-account.md) :  A direct Integration with the bank is more economical. The beneficiary gets the registered company name in the narration field.
-  [RazorpayX Lite](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/razorpayx-lite.md) : A backup channel in case of primary channel failure.

---
Select the Type of API integration | While using standalone API's, the fund account can be re-used, which reduces the response time, which in turn, reduces the load on the data base.
---
Choose a Payout Method | Bank accounts and UPI are available by default. [Cards](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts-cards.md) require PCI-DSS compliance.
---
Make a [Penny Drop](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-account-validation.md) | Improved efficiency as fund accounts are validated before actual payout.
---
Check for Additional Integration | You have the provision to include multiple solutions other than payouts to enhance end-user experience.
---
Use [Source Account Validation](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/source-account-validation.md) | Fund inflow from only trusted sources.
---
Use [Payouts Pro](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/intelligent-payouts.md) | Increase success rate of payouts when the beneficiary bank is down.
---
Check [Idempotency](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency/make-request.md) Header ([Handling 5XX error](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/#handling-5xx-errors.md)) | Eliminate duplicate payouts due to human or network error.
---
Check if Feature Enablement is required | [Contact support](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support.md) and enable the feature in case the required is not available on your dashboard.
---
[Set up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payouts.md) | Receive realtime status update. There is less load on the Dashboard due to reduced fetch calls.
---
[Fetch Transactions API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/transactions/fetch-all.md) | Combined with webhook reconciliation, the fetch API's provide an optimal/reliable reconciliation process.
---
[Allowlist IPs](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/allowlist-ip.md) | Non-allowlisted IP API calls are rejected, hence, improves security.
---
Get [Custom Reports](@/Applications/MAMP/htdocs/new-docs/llm-content/x/reports.md) | Efficiently collate data that is required to ease reconciliation.
---
Enable [Downtime webhook events](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/#payout-downtime-started.md) | Provides proactive alerts in case of scheduled downtimes.
---
[Contact support team](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support.md) or your RazorpayX POC for Custom Integration | Custom builds are available for specific use cases.

### Related Information

- [Payouts Best Practices](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/best-practices.md)
