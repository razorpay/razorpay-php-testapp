---
title: Transfers and Related Fees Example
description: Transfers amount and related fee calculations for payments made to Linked Accounts using Route.
---

# Transfers and Related Fees Example

Following are examples of transfers to Linked Accounts and how Payment Gateway and transfer fees apply to the transactions.

### Transfer to Single Linked Account

In this example, you are making a transfer to a single Linked Account. Following are the details:

- **Payment Amount** = ₹1,000.00
- **Payment Pricing Plan** = 2%
- **Transfer Fees** = 0.25%
- **Your Commission** = ₹100.00
- **Amount Transferred to Linked Account** = ₹900.00
- **GST Levied** = 18%

Transaction Details | Your Account Balance (₹)
---
**Payment received from Customer** | 1,000.00
---
**Gateway Fee Charged on Capture** 

 Payment Amount * Pricing Plan * GST 

 1000 * 2/100 * (1+(18/100))| -23.60

---
**The Account Balance after deduction** | **976.40**
---
**Transfer Fee Charged** 

Transfer Amount * Pricing Plan * GST  

900 * 0.25/100 * (1+(18/100)) | -2.66

---
**Amount Transferred to Linked Account** | -900.00

---
**Final Account Balance** | **73.74**

### Transfer to Two Linked Accounts

In this example, you are making transfers to two Linked Accounts. Following are the details:

- **Payment Amount** = ₹1,000.00
- **Payment Pricing Plan** = 2%
- **Transfer Fees** = 0.25%
- **Your Commission** = ₹100.00
- **Amount Transferred to Linked Account 1** = ₹300.00
- **Amount Transferred to Linked Account 2** = ₹700.00
- **GST Levied** = 18%

Transaction Details | Your Account Balance (₹)
---
**Payment received from Customer** | 1,000.00
---
**Gateway Fee Charged on Capture** 

 Payment Amount * Pricing Plan * GST 

 1000 * 2/100 * (1+(18/100))| -23.60

---
**Account Balance after Deduction** | **976.40**
---
**Linked Account 1 Transfer Fee Charged** 

Transfer Amount * Pricing Plan * GST  

300 * 0.25/100 * (1+(18/100)) | -0.89

---
**Amount Transferred to Linked Account 1** | -300.00

---
**Net Account Balance** | **675.51**
---
**Linked Account 2 Transfer Fee Charged** 

Transfer Amount * Pricing Plan * GST  

700 * 0.25/100 * (1+(18/100)) | -2.07

---
**Amount Transferred to Linked Account 2** | -700.00

---
**Final Account Balance** | **-26.56**

 

The transfer happens **only if** you have an account balance equal to or greater than ₹26.56.

### Related Information
- [Transfer Funds to Linked Accounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/transfer-funds-to-linked-accounts.md)
- [Schedule Settlements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/schedule-settlement.md)
- [Payment Reversals](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/reversal.md)
- [Refund to Customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/refund.md)
