---
title: Payments
description: Know about TPAP Pro payments flow and list of endpoints.
---

# Payments

Razorpay's TPAP Pro - Payments APIs lets you manage different transactions such as make and collect payments, approve and reject collect requests. You can also fetch the list of transactions using the API.

 

 
 Below are the steps to integrate TPAP Pro. You can also refer to our comprehensive [TPAP Pro integration guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro/integration-guide.md).

1. [Customer Onboarding](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/customer-onboarding.md)  
2. [Manage Funds and Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/funds-account-management.md)  
3. Payments
4. [Mandates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/mandate-flow.md)  
5. [Complaints](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/complaints-flow.md)
6. [UPI Numbers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/upi-number.md)  
7. [UPI Lite](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/fundsource-lite.md)
 

### Related Guides

[About TPAP Pro](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro.md)
[Integrate With TPAP Pro](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro/integration-guide.md)

### Endpoints

- **post** `/v1/upi/tpap/vpa/resolve` - Resolve VPAs: 
 Resolves a VPA.

- **post** `/v1/payments/pay` - Make a Payment: 
 Makes a payment.

- **post** `/v1/payments/collect` - Collect a Payment: 
 Collects a payment.

- **post** `/v1/payments/:upi_transaction_id/approve` - Approve a Collect Request: 
 Approves a collect request.

- **post** `/v1/payments/:upi_transaction_id/reject` - Reject a Collect Request: 
 Rejects a collect request.

- **get** `/v1/upi/tpap/paymentsrefresh=true&upi_transaction_id=RZPkbnkb98scbkhbnj89b&reference_id=RSKwpINfSkdEvtdxf&type=collect&status=deemed` - Fetch Payments: 
 Fetch a list of payments.
