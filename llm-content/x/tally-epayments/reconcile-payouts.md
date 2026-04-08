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
   ![Download MIS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-tally-epayments-download-tally-mis.jpg.md)

2. Now shift to TallyPrime. Go to **TallyPrime** → **Import** → **Intermediate File**.
   ![Import Intermediate file](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-tally-epayments-rzpx-reconciliation-step1.jpg.md)

3. Upload the MIS file downloaded from RazorpayX in the **File to import (CSV)** field.
   ![Uploading the File to CSV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-tally-epayments-rzpx-reconciliation-step2.jpg.md)

4. TallyPrime automatically reconciles all transactions and updates the bank date.
   ![Reconciliation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-tally-epayments-rzpx-reconciliation-step3.jpg.md)

### Related Information

-  [About Tally e-Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments.md)
- [Create RazorpayX Ledger in TallyPrime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/set-up.md)
- [Export and Approve Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/export-approve-payouts.md)
