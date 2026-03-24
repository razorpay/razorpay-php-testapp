---
title: About Razorpay Security
description: Know about Razorpay's compliance certifications, firewalls, and authentication methods.
---

# About Razorpay Security

As a financial service provider, we take utmost care of your data. We are continuously working to keep our environment safe and secure for everyone to use.

## Compliance

We follow the most stringent data security practices in the payment industry. As a payment service provider dealing with card data, we have the following certifications:

Certifications | Seal
---
PCI-DSS Level 1 | View Certificate
---
ISO 27001:2022 IEC | ![ISO Seal](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/iso-seal.jpg.md)
---
System and Organization Controls (SOC) 2 Type 2 | ![SOC Seal](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/soc-seal.jpg.md)

We can provide you with copies of our certifications. Please reach out to us via your Key Account Manager.

### TLS Encryption

At Razorpay, we employ the best encryption practices on our website and possess the highest assurance SSL certificate, the EV SSL (Extended Validity SSL) certificate.

- All Razorpay services are served over HTTPS using TLS and configured with industry-standard cyphers.

- You can download a copy of our [TLS certificate](@/Applications/MAMP/htdocs/new-docs/llm-content/security/whitelists/#ssl-certificates.md).

- We follow industry-standard AES-128-bit encryption for all user data.

- Sensitive data, such as PII (Personal Identifiable Information) utilises field-level encryption.

## Authentication

Requests to Razorpay APIs are authenticated using Basic Authentication. 
Know more about [API authentication](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication.md).

Please ensure the security of your Dashboard credentials and API keys.

## Fraud and Risk

We are constantly building new processes to minimise the risk of online payment fraud. We actively monitor payment patterns and behaviour.
- Our robust fraud detection process identifies and flags fraudulent chargebacks for review. 
- We check and flag hotlisted cards for every payment. (Hotlisting means that the card has been blocked temporarily or permanently for use.)
- We also use geographical and pattern-based transaction monitoring to identify fraudulent transactions.

Know more about [fraud protection for customers](@/Applications/MAMP/htdocs/new-docs/llm-content/security/customers/#fraud-and-risk.md).

## Firewall

If you want to limit or authenticate ingress/egress to Razorpay, we provide a list of IP addresses for APIs and Webhooks.

- Razorpay API requests are resolved to these [IP addresses](@/Applications/MAMP/htdocs/new-docs/llm-content/security/whitelists/#api-ips.md).
- Razorpay webhooks use these [IP addresses](@/Applications/MAMP/htdocs/new-docs/llm-content/security/whitelists/#webhook-ips.md).

## Vulnerability Disclosure Policy

Razorpay looks forward to working with the security community to find vulnerabilities and protect our businesses and customers. We are dedicated to responsibly resolving any security concerns.

If you have discovered any security vulnerabilities associated with our services, we appreciate your help in disclosing them to us responsibly. We encourage you to report any bugs on our [HackerOne page](https://hackerone.com/razorpay). Please provide a detailed description of the vulnerability found and the steps to replicate it.

For more details on our bug bounty programme and to submit reports, visit our [HackerOne page](https://hackerone.com/razorpay).

### Related Information

- [Business Security Checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/security/checklist.md)
- [Shared Responsibility Model](@/Applications/MAMP/htdocs/new-docs/llm-content/security/shared-responsibility-model.md)
- [Security For Customers](@/Applications/MAMP/htdocs/new-docs/llm-content/security/customers.md)
