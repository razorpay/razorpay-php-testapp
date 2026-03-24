---
title: Business Security Checklist
description: List of security measures and best practices to ensure secure transactions using Razorpay.
---

# Business Security Checklist

Information security is critical for businesses handling financial transactions online. Being a technology-first online finance company, we ensure that every transaction made using Razorpay products is secure.

The security of your business's online transactions and data is a shared responsibility between you and Razorpay. As a Razorpay user, ensure you use the security measures below to secure your online transactions.

## General

Following are the general security best practices:

- Implement [Two-Factor Authentication (2FA)](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/manage-team#2-step-verification-team-level.md) across your team for additional security.
- Use TLS and HTTPS, as they significantly decrease the risk of a man-in-the-middle attack on you or your customers.
- Use a password manager and set strong passwords.
- Maintain a checklist for timely onboarding and off-boarding of users.
- Do not share user accounts among employees.
- Back up your data regularly, and test the restoration periodically.

## APIs

It is essential to store your API keys safely. For the utmost security, follow the best practices listed below when integrating with Razorpay APIs.

### Applications

While integrating Razorpay APIs with your application, ensure that:

- The API key secret is not included in version control (GitHub, Gitlab).
- You only provide access to the API secret to employees on a need-to-know basis.
- You store all secrets, such as the API secret, customer ID, and card tokens in a secure vault.
- All websites and APIs are accessed only using HTTPS, and they follow basic security best practices.

### Mobile Application

To secure your mobile application when integrating with Razorpay APIs, ensure that:

- The [Razorpay API secret](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) is not included in the final Android or iOS build.
- The final build is scanned for security defects using a mobile application security scanner, such as [MobSF](https://github.com/MobSF/Mobile-Security-Framework-MobSF).

### Payments API

While integrating with our [Payments API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments.md), ensure that you:
- Use the [Capture a Payment API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#capture-a-payment.md) to assert the payment status.
- Fetch the amounts of captured payments only from the backend or a trusted source.

### Orders API

While integrating with our [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md), ensure that:

- [Payments are auto-captured](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/capture-settings#auto-capture-all-payments.md) from the Dashboard.
- Signatures are validated in the callback request when using the Orders API to confirm payment status.
- Order ids are retrieved only from a trusted source, such as your database for the HMAC generation.

## Webhooks

To use our webhooks securely, ensure that:

- All webhook requests are validated using Hash-based Message Authentication Code (HMAC).

- [Razorpay IPs](@/Applications/MAMP/htdocs/new-docs/llm-content/security/whitelists/#webhook-ips.md) are added to all the whitelisted webhook requests.

## Accounts and Dashboard

Following are the best practices for Dashboard usage:

- Grant access to the Dashboard only for necessary users.
- Define [user roles](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/manage-team#standard-user-roles.md) for team members based on their usage of the Dashboard.
- Implement [Two-Factor Authentication (2FA)](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/manage-team#2-step-verification-team-level.md) on all your Razorpay accounts.
- Never share Razorpay Two-Factor Authentication OTPs among employees.

### Related Information

- [ Razorpay Security](@/Applications/MAMP/htdocs/new-docs/llm-content/security.md)
- [Shared Responsibility Model](@/Applications/MAMP/htdocs/new-docs/llm-content/security/shared-responsibility-model.md)
