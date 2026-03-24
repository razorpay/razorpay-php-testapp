---
title: Paytm
description: Accept payments through Paytm wallet at Razorpay Checkout.
---

# Paytm

Let your customers pay using their Paytm wallet on your website by integrating the wallet at the Razorpay Checkout. Once integrated, Paytm wallet appears under the Wallets section at the Razorpay Checkout:

![Paytm Wallet on Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/paytm-paytm-checkout.jpg.md)

## Prerequisites

- [Sign up](https://dashboard.razorpay.com/signup) for a Razorpay account.

- Create a [Paytm account](https://dashboard.paytm.com/).

## Enable Paytm Wallet on Razorpay Checkout

1. [Get integration details from the Paytm Dashboard](#step-1-get-integration-details-from-the-paytm).
2. [Request access to Paytm as a payment method on the Razorpay Dashboard](#step-2-request-access-for-paytm-as-a).

### Step 1: Get Integration Details from the Paytm Dashboard

To get the integration details:
1. Log in to the [Paytm Merchant Dashboard](https://dashboard.paytm.com/).
2. Navigate to Developers → API Keys on the side menu. 
    
    ![Developers API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/paytm-paytm-dashboard-api-key.jpg.md)
3. On the **API Keys** page, select **Production API Details**. 
    
    ![Production API Details](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/paytm-api-details.jpg.md)
4. Click **Get integration key**. The following details are displayed:
    
 • Merchant ID
    
 • Merchant Key
    
 • Website Name
    
 • Industry Type 
    
    ![Copy the details](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/paytm-integration-key.jpg.md)
5. Copy the Merchant ID, Merchant Key, Website Name and Industry Type details from the **Production API Details** tab.

#### Handle Non-availability of Paytm Production API details

If Paytm Production API details are not available:

1. Share the test API credentials with Razorpay. We will map the test account.
2. On receiving confirmation that the test account has been mapped, make three payments with Paytm on Razorpay `Test Mode`. A Payment ID will be generated for each payment.
3. Share these three Razorpay Payment IDs with Paytm. Paytm will acknowledge the test payments and enable Prod APIs on Paytm Dashboard.
4. Copy the Merchant ID, Merchant Key, Website Name and Industry Type details from the Production API Details tab.

### Step 2: Request Access for Paytm as a Payment Method on Razorpay  Dashboard

To raise a request for Paytm as a Payment Method:
1. Log in to the Razorpay Dashboard.
2. Navigate to **Account & Settings** → **Payment Methods**.
    
    ![Go to Payment Methods](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dashboard-guide-payment-methods-setting_1.jpg.md)
3. Go to **Wallets** → **Paytm**.
    
    ![Select Paytm](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dashboard-guide-settings-paytm-link-paytm-account.jpg.md)
4. Click **Link Account**.
5. On the pop-up page, select **I have a Registered Paytm Business Account** and click **Next**.
    
    ![Registered Paytm Business Accounts](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dashboard-guide-settings-paytm-registered-paytm-account.jpg.md)
6. Enter the details copied from the Paytm Dashboard and click **Submit**.
    
    ![Add Paytm Dashboard Details](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dashboard-guide-settings-paytm-paytm-production-details.jpg.md)

Our team will activate the Razorpay Paytm Wallet within your Checkout flow.

> **WARN**
>
> 
> **Watch Out!**
> 
> Do not make any changes to the details copied from the Production API Details tab. Entering incorrect details can lead to payment failures.
> 

You can now accept payments made by customers using Paytm.

![Paytm Enabled](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dashboard-guide-settings-paytm-paytm-enabled.jpg.md)

### Settlements

Paytm payments are directly settled to your Razorpay account. Therefore, all Paytm payments will be automatically captured irrespective of the Capture Settings configured on the Razorpay Dashboard.
