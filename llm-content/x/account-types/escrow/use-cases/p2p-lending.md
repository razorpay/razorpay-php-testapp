---
title: P2P Lending with RazorpayX Escrow Accounts
heading: Instant Disbursals for P2P lenders
description: Instantly disburse payouts for licensed P2P Lending NBFCs and their Loan Service Provider (LSP)/Fintech partners with RazorpayX Escrow Accounts.
---

# Instant Disbursals for P2P lenders

Typically, payout disbursals for P2P NBFCs can take upto 4 calendar days as these transactions have to be approved by a Trustee. Businesses can reduce this by signing up for a RazorpayX Escrow Account.

With RazorpayX Escrow Account, in partnership with Axis Trustee supports instant disbursals for P2P Escrow. This solution works 24x7x365 where the Trustee automatically approves a payout in under 2 seconds. Together with instant trustee approvals and IMPS payouts, borrowers and investors of the P2P platform can receive the credit in their bank accounts instantly.

LSP partners are onboarded as [sub-accounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/sub-accounts.md) with P2P Escrow as the master account.

![How P2P lending works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-escrow-p2p-lending.jpg.md)

## Onboarding for NBFCs

You can raise a request with your point of contact (POC) at Razorpay for a P2P Escrow+ Account or share your details on our [website](https://razorpay.com/x/escrow-accounts/). 

1. Your POC at Razorpay introduces you to the Escrow Trustee and Escrow Bank for opening the P2P escrow account.
2. Sign the Escrow agreement with the Escrow Bank and Escrow Trustee.
3. The escrow trustee creates two RazorpayX accounts to link the collection and disbursement of escrow accounts. Parallelly, we facilitate the account opening process with the partner bank.

Raise a request to the trustee for allowing Dashboard access to the relevant team members.

## Required Documents

Connect with your RazorpayX POC or [contact support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/support.md) for document templates, letters and other supporting material.

    
### Documents required by Trustee

         
         S. No | Document | Source | When to Obtain
         ---
         1 | Memorandum & Articles of Association; Certificate of Incorporation; Certificate of Commencement of Business | Axis Trustee | Before execution
         ---
         2 | List of Directors including KMP if any | Axis Trustee | Before execution
         ---
         3 | Shareholding Pattern | Axis Trustee | Before execution
         ---
         4 | Latest quarterly results/Annual Report | Axis Trustee | Before execution
         ---
         5 | CTC of the board resolution / duly accepted letter/email of offer/appointment / consent letter appointing ATSL as Escrow Agent. | NBFC | Before execution
         ---
         6 | Specimen signatures of the signatories of all the parties to the escrow as authorised by the resolution with photo identity proof. | NBFC | Before execution
         ---
         7 | CTC of the approval(s) received from RBI and RBI NBFC Licence | NBFC | Before execution
         ---
         8 | CTC of the Resolution/Authority Letter/Power of Attorney authorising the employees to operate on the platform | NBFC | Before execution
         ---
         9 | Name, number & email address of the employees who are authorised to operate the platform as per above point, in the format of a letter | NBFC | Before execution
         ---
         10 | Confirmation from the Platform that no Breach of Any RBI Regulation during the Quarter | NBFC | Within 15 days from the end of quarter.
         ---
         11 | Confirmation from the Platform that no Investor/Lender is onboarded to the Platform who has exceeded overall investment limit across platform during the quarter | NBFC | Within 15 days from the end of quarter.
         ---
         12 | The Lender/Investor to Borrwer exposure limit is not breached in any transaction during the quarter | NBFC | Within 15 days from the end of quarter.
         ---
         13 | Observations if any raised by the Regulator have been sufficiently addressed and there are no adverse remarks. If there are any adverse remarks details of the same and action taken report | NBFC | Within 15 days from the end of quarter.
         ---
         14 | Details of NPA/Delinquency during the quarter | NBFC | Within 15 days from the end of quarter.
         ---
         15 | Details of any Showcause Notice/Warning/Penalties/Orders issued by a regulator during the quarter | NBFC | Within 15 days from the end of quarter.
         ---
         16 | The Platform/Company is in compliance with PMLA and KYC guidelines | NBFC | Within 15 days from the end of quarter.
         
        

#### Documents required by Bank

The bank Relationship Manager will reach out to the authorised signatories with the list of relevant documents and the account opening process.

## Onboarding for LSPs

S. No | Document | Source | When to Obtain
---
1 | Authority Letter/Confirmation Letter from the P2P Platform for onboarding the LSP/Fintech | P2P NBFC | Before Onboarding the Partner
---
2 | CTC of the Resolution/Authority Letter/Power of Attorney authorising the Employees to operate on the platform from the LSP/Fintech and Name, Number & email ID of the Employees who are authorised to operate the Platform | Partner Platform | Before On-Boarding the Partner
---
3 | Copy the underlying agreement between the P2P Platform & the LSP/Fintech | P2P NBFC | Before On-Boarding the Partner

## API Integration

You can make payouts via your Escrow Account using our [Payout APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/api.md).

Points to remember:

- Ensure to follow all the payout [best practices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/best-practices.md).
- Contact type must be `borrower` or `investor`. Know more about [Contact APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/contacts/api.md).
- Payout purpose must be `Loan disbursement` or `Investor withdrawal`. Know more about [Payout purpose](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md#payout-purpose).
- [Allowlist your IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md).
