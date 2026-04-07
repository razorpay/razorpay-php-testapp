---
title: Reconcile Payouts with RazorpayX
heading: Reconcile Payouts
description: Check how payouts are reconciled in TallyPrime after approval in RazorpayX.
---

# Reconcile Payouts

After you [approve the payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/export-approve-payouts.md#approve-payouts) on the RazorpayX Dashboard, reconcile them on TallyPrime using the **Instrument Number** and **Bank Date**. 

## Reconcile Payouts

To reconcile the payouts:

1. After the payouts are approved, hover on the batch of payouts on the Tally Payouts page and click the **DOWNLOAD MIS** option.
   

2. Now shift to TallyPrime. Go to **TallyPrime** → **Import** → **Intermediate File**.
   

3. Upload the MIS file downloaded from RazorpayX in the **File to import (CSV)** field.
   

4. TallyPrime automatically reconciles all transactions and updates the bank date.
   

### Related Information

-  [About Tally e-Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments.md)
- [Create RazorpayX Ledger in TallyPrime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/set-up.md)
- [Export and Approve Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/export-approve-payouts.md)
