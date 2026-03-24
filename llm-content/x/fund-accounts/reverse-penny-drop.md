---
title: Reverse Penny Drop
description: Validate a bank account or VPA (UPI id) and retrieve bank account details instantly.
---

# Reverse Penny Drop

Reverse Penny Drop is a way to verify a bank account or VPA (UPI id). In this method, the end user — the person whose account needs to be verified — makes a ₹1 payment from their UPI app to a Razorpay-designated account. Once Razorpay receives this payment, it automatically pulls the payer's verified account details directly from their bank. This includes their full name, bank account number, IFSC code, account type and VPA.

**Reverse Penny Drop vs Standard Penny Drop**

In standard Penny Drop, Razorpay credits ₹1 to the user's account to verify it exists. This method can just verify if the account to which payment is made exists or not. But it can not verify the details of the account holder. Reverse Penny Drop requires the user to actively take an action — pulling the complete bank account details, thus verifying the identity of the account holder as well.

**When To Use**

Reverse Penny Drop is ideal for situations where ownership verification matters, such as:

- KYC onboarding
- Loan disbursement pre-checks
- Beneficiary registration flows

> **INFO**
>
> 
> **Feature Request**
> 
> This feature is enabled on demand. Raise a request with our [Support team](https://razorpay.com/support/#request) or your Razorpay point-of-contact to get this feature activated.
> 

## How it Works

- **Initiate Validation**: User is presented with a ₹1 payment request via QR Code.
- **Make Payment**: The user completes the payment using any UPI app. Works with 99% of Indian bank accounts.
- **Instant Validation**: RazorpayX validates the bank account and returns complete bank details including account number, IFSC, account holder name, account type and bank name.
- **Automatic Refund**: The ₹1 is automatically refunded to the user in real time. No manual intervention needed.

## Advantages

- **Zero Fund Leakage**: No deposits to unverified accounts. The ₹1 is always refunded automatically.
- **Real-Time Results**: Validation and refund happen instantly.
- **NPCI Compliant**: User-initiated transactions with complete audit trail meeting all regulatory requirements.

### Related Information

- [Fund Account Validation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/fund-account-validation.md)
- [Reverse Penny Drop FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/fund-accounts/faqs.md#reverse-penny-drop)
- [Fund Account APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/fund-accounts/api.md)
