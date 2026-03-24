---
title: Complaints
description: Know about raising and tracking complaints in TPAP Pro using APIs.
---

# Complaints

Razorpay TPAP Pro - Complaints APIs allow you to raise, track, and receive resolution updates for disputes related to UPI transactions.

Below are the steps to integrate and manage complaints with TPAP Pro. You can also refer to our comprehensive [TPAP Pro integration guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro/integration-guide.md).

1. [Customer Onboarding](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/customer-onboarding.md)  
2. [Manage Funds and Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/funds-account-management.md)  
3. [Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/payments-flow.md)  
4. [Mandates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/mandate-flow.md)  
5. Complaints
6. [UPI Numbers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/upi-number.md)  
7. [UPI Lite](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/fundsource-lite.md)

### Related Guides

[About TPAP Pro](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro.md)
[Integrate With TPAP Pro](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro/integration-guide.md)

### Endpoints

- **post** `/v1/complaints/raise` - Raise a Complaint: 
Registers a complaint related to a UPI payment transaction.

- **get** `/v1/complaints` - Fetch Complaints: 
Fetches the status of a specific complaint or lists all complaints for a customer.
