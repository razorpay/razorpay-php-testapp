---
title: Accounts Management
description: Know about funds and accounts management and list of endpoints.
---

# Accounts Management

Razorpay's TPAP Pro - Funds and Accounts Management APIs let you add more accounts, delete existing accounts, and change PINs for accounts for hassle-free transactions.
 

 
 Below are the steps to integrate TPAP Pro. You can also refer to our comprehensive [TPAP Pro integration guide](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/tpap-pro/integration-guide.md).

1. [Customer Onboarding](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/tpap-pro/customer-onboarding.md)  
2. Manage Funds and Account
3. [Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/tpap-pro/payments-flow.md)  
4. [Mandates](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/tpap-pro/mandate-flow.md)  
5. [Complaints](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/tpap-pro/complaints-flow.md)
6. [UPI Numbers](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/tpap-pro/upi-number.md)  
7. [UPI Lite](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/tpap-pro/fundsource-lite.md)

### Related Guides

[About TPAP Pro](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/tpap-pro.md)
[Integrate With TPAP Pro](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/tpap-pro/integration-guide.md)

### Endpoints

- **patch** `/v1/upi/tpap/fundsources/:id/upi_pin?expand[]=vpas` - Change UPI PIN: 
 Changes the UPI PIN.

- **patch** `/v1/upi/tpap/vpa` - Set the Primary Payment Source: 
 Sets the primary payment source.

- **post** `/v1/upi/tpap/fundsources/:fundsource_id/balance` - Check Balance of a Payment Source: 
 Checks the balance of the payment source.

- **post** `/v1/upi/tpap/devices/deregister` - De-register Devices: 
 De-registers the device.

- **get** `/v1/upi/tpap/vpas?status=”active”&skip=0&count=10` - Fetch VPAs: 
 Retrieves the list of VPAs.

- **delete** `/v1/upi/tpap/vpa?vpa=anitha@okhdfcbank` - Delete VPAs: 
 Checks if the VPA is available.
