---
title: Shared Responsibility Model
description: Know about the security responsibilities shared between businesses and Razorpay.
---

# Shared Responsibility Model

Razorpay is a shared payment service provider. You bear some responsibility for the security of your payment ecosystem.

Razorpay is responsible for all the backend systems and payment data we process and share with banks. Our security and compliance programme ensures that we are always compliant against PCI-DSS, ISO 27001 and SOC 2 global compliance standards.

We also provide you with a facility to [generate API keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) and connect to our systems via automated computer programmes. Know how Razorpay does [Secret Management](https://razorpay.com/blog/secret-management-razorpay/).

## While Using Our Payment Gateway

You can integrate with the Razorpay Payment Gateway in 2 ways:
- [Standard Checkout](#standard-checkout)
- [Server To Server Checkout](#server-to-server-checkout) (PCI Compliant)

### Standard Checkout

It is critical to ensure the security of your **API keys** and **Dashboard credentials**. Ensure that you store these details in safe places and only share them with trusted team members.

Additionally, ensure that a customer's payment information only reaches your servers if you are [PCI DSS](https://www.pcisecuritystandards.org/about_us/) certified.

> **INFO**
>
> 
> **Sensitive Data**
> 
> On the Razorpay Payment Gateway, all the details entered by a user, like their name, address, and credit/debit card information, are used only to process and complete the order. Razorpay never stores sensitive information like CVV numbers, PINs and so on.
> 

### Server To Server Checkout

> **INFO**
>
> 
> 
> **Feature Request**
> 
> This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> 

All the security obligations for [Standard Checkout](#standard-checkout) also apply to Server To Server. Additionally, you must: 
- Be compliant with [PCI DSS](https://www.pcisecuritystandards.org/about_us/) standards at all times. 
- Share your PCI AOC (Attestation of Compliance) before every year's expiration date for continued access to this integration method.

You would be responsible for any misuse by not handling keys or the Dashboard credentials securely. We have an intuitive [security checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/security/checklist.md) to review the security posture and help you interact with us securely.

## While Using RazorpayX

It is critical to ensure the security of your RazorpayX Dashboard credentials and API keys.

### Payouts

Follow the below security measures while making Payouts.

- Ensure that no two fund accounts have the same `fund_account_id`.
- If you are not PCI-DSS compliant, you should **not** process your contact's card details at your backend. 
- Use the public [Fund Account API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts-cards.md) to create a Fund account with type card. The public Fund Account API only needs your ``. DO NOT send your `` when making this API call, as you will expose this on your website. Know more about [Payouts to Cards](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts-cards.md).

#### Allowlisting IPs

To protect your API payouts from malicious attacks, it is mandatory to allowlist the IPs you use for all payout-related API requests (such as create a contact, fund account, payout, fund account validation, and so on). Know how to [allowlist your IPs](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/allowlist-ip.md).

### Related Information

- [Razorpay Security](@/Applications/MAMP/htdocs/new-docs/llm-content/security.md)
- [Security Checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/security/checklist.md)
