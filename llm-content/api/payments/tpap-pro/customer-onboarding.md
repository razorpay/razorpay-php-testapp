---
title: Customer Onboarding
description: Know about customer onboarding and list of endpoints.
---

# Customer Onboarding

Explore Razorpay's TPAP Pro - Customer Onboarding APIs, which facilitate the registration of devices and the management of payment sources, such as bank accounts, RuPay credit cards and credit lines, to enhance your UPI onboarding process. As part of this process, you need to create a unique identifier called a [fingerprint](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro/integration-guide.md#create-a-device-fingerprint) using various device attributes.

 

 
 Below are the steps to integrate TPAP Pro. You can also refer to our comprehensive [TPAP Pro integration guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro/integration-guide.md).

1. Customer Onboarding
2. [Manage Funds and Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/funds-account-management.md)  
3. [Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/payments-flow.md)  
4. [Mandates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/mandate-flow.md)  
5. [Complaints](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/complaints-flow.md)
6. [UPI Numbers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/upi-number.md)  
7. [UPI Lite](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/fundsource-lite.md)
 

### Related Guides

[About TPAP Pro](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro.md)
[Integrate With TPAP Pro](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro/integration-guide.md)

### Endpoints

- **post** `/v1/upi/tpap/mobile/verification` - Get a Mobile Number Verification Token: 
 Gets the verification token.

- **post** `/v1/upi/tpap/devices/bind` - Bind the Device: 
 Binds the device.

- **post** `/v1/upi/tpap/devices/token` - Get NPCI Token: 
 Gets the NPCI token.

- **get** `/v1/upi/tpap/fundsource_providers?skip=0&count=10&refresh=true` - Fetch Banks: 
 Retrieves the list of banks.

- **get** `/v1/upi/tpap/fundsources?refresh=true&linked=true&upi_iin=7078129&skip=0&count=10&device_ip=198.1.1.1&device_geocode=1234.1213` - Fetch Payment Sources: 
 Retrieves the list of payment sources.

- **post** `/v1/upi/tpap/vpa/available` - Check VPA Availability: 
 Checks if the VPA is available.

- **post** `/v1/upi/tpap/vpa/link?expand[]=fundsources` - Create VPA and Link to Payment Sources: 
 Creates a VPA and links to a payment source.

- **post** `/v1/upi/tpap/fundsources/:id/otp` - Generate OTP: 
 Generates an OTP.

- **post** `/v1/upi/tpap/fundsources/:id/upi_pin?expand[]=vpas` - Set or Reset UPI PIN: 
 Sets or resets UPI PIN.
