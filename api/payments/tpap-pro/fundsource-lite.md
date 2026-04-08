---
title: UPI Lite
description: Know how to activate, top-up, pay, deregister, and manage UPI Lite accounts using APIs.
---

# UPI Lite

Razorpay TPAP Pro UPI Lite APIs let you create and manage UPI Lite accounts for low-value transactions. You can register, top up, make payments, deregister, and fetch details for UPI Lite accounts via APIs.

Below are the steps to integrate and manage complaints with TPAP Pro. You can also refer to our comprehensive [TPAP Pro integration guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro/integration-guide.md).

1. [Customer Onboarding](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/customer-onboarding.md)  
2. [Manage Funds and Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/funds-account-management.md)  
3. [Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/payments-flow.md)  
4. [Mandates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/mandate-flow.md)  
5. [Complaints](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/complaints-flow.md)
6. [UPI Numbers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/upi-number.md)  
7. UPI Lite

### Related Guides

[About TPAP Pro](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro.md)
[Integrate With TPAP Pro](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro/integration-guide.md)

### Endpoints

- **post** `/v1/upi/tpap/fundsource_lite` - Register Fundsource Lite: 
Activates a UPI Lite account for a fundsource.

- **post** `/v1/upi/tpap/payments/pay` - Top-Up Fundsource Lite: 
Adds money to the Lite account using a fundsource.

- **post** `/v1/upi/tpap/payments/pay` - Make Payment via Fundsource Lite: 
Initiates a payment from a Fundsource Lite account to a VPA.

- **post** `/v1/upi/tpap/fundsource_lite/:liteId/deregister` - Deregister Fundsource Lite (With Balance): 
Moves the balance back to the user’s account and deregisters the Lite account.

- **delete** `/v1/upi/tpap/fundsource_lite/:liteId/deregister` - Deregister Fundsource Lite (No Balance): 
Deregisters an active Fundsource Lite account with zero balance.

- **get** `/v1/upi/tpap/fundsource_lite/:liteId` - Fetch Fundsource Lite: 
Fetches details of the Fundsource Lite account.
