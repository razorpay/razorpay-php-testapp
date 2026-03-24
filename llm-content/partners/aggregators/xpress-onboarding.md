---
title: Xpress Onboarding
description: Enable sub-merchants to start accepting payments faster with minimal KYC.
---

# Xpress Onboarding

Xpress onboarding allows partners to quickly onboard sub-merchants to accept payments on Razorpay with minimal KYC. 

## How it Works

Razorpay partially activates the account after verifying the KYC submitted.

- The sub-merchant needs to submit the following minimum KYC details along with the other business details :

  
  Business Type | Minimal KYC Details
  ---
  Individuals | - Personal PAN
- Bank Account Details (IFSC Code, A/C No., Beneficiary Name)
 
  --- 
  Proprietorship | - Personal PAN
- Bank Account Details (IFSC Code, A/C No., Beneficiary Name)
- Business PAN (Optional)

  ---
  Other Registered Business | - Personal PAN
- Bank Account Details (IFSC Code, A/C No., Beneficiary Name)
- Business PAN
- Signatory PAN

  

- Razorpay verifies the KYC details and partially activates the sub-merchant account. The account moves to `activated_kyc_pending` state. The sub-merchant can start accepting payments up to GMV (Gross Merchandise Value) limit of ₹50,000 (or ₹5,00,000 if GST verified) using Payment Links and QR Codes.

- The sub-merchant can submit the rest of the KYC documents while the account is in `activated_kyc_pending` state. 

- Razorpay team reviews the submitted details. Based on the evaluation, the account can move to either of these states:
  - `needs_clarification` and `under_review`: Your sub-merchant can accept payments and receive settlements, upto the GMV limit. If limits are breached, the payments and settlements are put on hold.

  - `activated`: If account is successfully activated, the breach limits are removed for payments and settlements.

  - `suspended`: Payments and settlements are put on hold. Please reach out to [Razorpay support](https://razorpay.com/support/) for the next steps.

> **WARN**
>
> 
> **Watch Out!**
> 
> - If the documents are not submitted and the limit is breached, the account moves to `needs_clarification` state, with the requirements array showing the documents that need to be submitted. The settlements and payments are put on hold.
> - In some scenarios, the sub-merchant's account is not partially activated. The sub-merchant should submit all the other KYC documents and go through the standard onboarding flow:
> - **Duplicate Primary Details**: If the sub-merchant's primary details, such as phone number, PAN (business PAN or company PAN) already exist in the system, Razorpay provides one retry to update the field value and changes the status to `needs_clarification`.
- **Verification Failure**: Given below are two types of verification failure situations: If the PAN or Bank Account verification fails, the account moves to `needs_clarification` state. The sub-merchant cannot proceed with Xpress Onboarding. Razorpay provides one retry to update the field value before the merchant is moved to the standard onboarding flow.
 - If the GSTIN exists for a sub-merchant and the verification fails, then the status changes to `needs_clarification`.

> 

Given below is a diagram which explains the different states the account moves to during its lifecycle:

![Account States in Xpress Onboarding](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/partners-xpress-onboarding-flow.jpg.md)

### Example 

ABC Inc. is an ERP software company, that wants to onboard their customer Acme Corp (an ecommerce business that sells books) as a sub-merchant to accept payments. ABC Inc. should sign up as a Razorpay partner and then use our onboarding APIs to create Acme Corp's sub-merchant account by providing the relevant details and documents.

Our team will review the submitted details and change the account state as applicable.

## Prerequisites

1. [Sign up as Partner](https://razorpay.com/partners/) and complete KYC to activate your account.
2. Generate `client_id` and `client_secret` to authenticate APIs calls for both test mode or live mode.

Watch this video to see how to generate the API keys.

[Video: https://www.youtube.com/embed/AwooCt4ezQ4]

## Workflow

Given below is a diagram that illustrates the various steps in the workflow. The document requirements are visible in the array.

![Xpress Onboarding Flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/partners-aggregators-xpress-onboarding-flow.png.md)

> **WARN**
>
> 
> **Watch Out!**
> 
> - Currently, we do not support making concurrent requests to the following Onboarding APIs including their combination on the same `account_id`:
>   - [Update Account API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/account-onboarding/update.md)
>   - [Update Stakeholder API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/stakeholder/update.md)
>   - [Update Product Configuration API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration-xpress-onboarding/#update-a-product-configuration.md)
> 
> Please wait for the response of these APIs before making subsequent requests.
> 

### 1. Create an Account

Create an account for the sub-merchant using the [Create an Account API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/account-onboarding/create.md) by passing the `no_doc_onboarding=true` parameter. This triggers the Xpress Onboarding flow.

  
### Available Account APIs

API | Description
---
[Create an account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/account-onboarding/create.md) | API to create a sub-merchant account.
---
[Fetch an account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/account-onboarding/fetch.md) | API to view sub-merchant account details.
---
[Update an account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/account-onboarding/update.md) | API to update the sub-merchant account details.
---
[Delete an account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/account-onboarding/delete.md) | API to delete a sub-merchant account.

    

### 2. Create a Stakeholder

Use the [Create a Stakeholder API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/stakeholder/create.md) to add a stakeholder for an account. Each stakeholder needs to update the KYC. 

  
### Available Stakeholder APIs

API | Description
---
[Create a stakeholder](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/stakeholder/create.md) | API to create a stakeholder.
---
[Fetch a stakeholder ](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/stakeholder/fetch-with-id.md) | API to retrieve and view the stakeholder account details.
---
[Fetch all stakeholders ](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/stakeholder/fetch-all.md) | API to retrieve all stakeholders for a given account.
---
[Update a Stakeholder](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/stakeholder/update.md) | API to update the stakeholder account details.
 
    

### 3. View and Accept Terms and Conditions

Before activating the sub-merchant and requesting for relevant product configurations, the sub-merchant needs to view and accept the Terms and Conditions. You can fetch these Terms and Conditions links using the [Fetch Terms and Conditions API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/terms-conditions/fetch.md) to share them with the sub-merchant.

You can also accept Terms and Conditions for the sub-merchant using the [Request a Product Configuration API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration-xpress-onboarding/#request-a-product-configuration.md). 

  
### Available Terms and Conditions APIs

API | Description
---
[Accept Terms and Conditions](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration-xpress-onboarding/#request-a-product-configuration.md) | API to accept terms and conditions.
---
[Fetch Terms and Conditions ](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/terms-conditions/fetch.md) | API to retrieve terms and conditions.

    

### 4. Configure Products to Accept Payments

You can use the [Product Configuration APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration-xpress-onboarding.md) to configure and activate Razorpay products for a sub-merchant account according to their requirements.

  
### Available Product Configuration APIs

API | Description
---
[Request a Product Configuration](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration-xpress-onboarding#request-a-product-configuration.md) | API to request a product configuration.   
---
[Update a product configuration](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration-xpress-onboarding#update-a-product-configuration.md) | API to update a configured product.
---
[Fetch a Product](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration-xpress-onboarding#fetch-a-product.md) | API to fetch a configured product.

    

### 5. Upload Supporting Documents

You can submit the required documents for sub-merchant onboarding using the [Documents APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/upload-document.md) listed in the table below.

  
### Available Documents APIs

API | Description
---
[Upload account documents](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/upload-document/upload-account-documents.md) | API to upload sub-merchant's business documents.
---
[Upload stakeholder documents](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/upload-document/upload-stakeholder-documents.md) | API to upload stakeholder's signatory documents.
---
[Fetch account documents](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/upload-document/fetch-account-documents.md) | API to fetch account documents.
---
[Fetch stakeholder documents](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/upload-document/fetch-stakeholder-documents.md) | API to fetch stakeholder documents.

    

### 6. Subscribe to Webhooks

Subscribe to relevant webhook events to receive notifications (in the form of a webhook payload) when these events occur.

There are 2 types of events:

- **Transaction Events**: These are events related to payment transactions performed by the sub-merchants. You can configure these events at a sub-merchant level.  View [webhook events](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/webhooks#transaction-events.md) and [payload details](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md).

- **Sub-Merchant Onboarding Events**: These events are related to the onboarding status of the sub-merchant. You should configure these at your end. Subscribing to these events will enable you to get the onboarding status of all sub-merchants. 

  
### Available Webhook Events and Descriptions

  
  Event Name | Description
  ---
  product.payment_link.under_review | Triggered when the status for a Payment Link product is `under_review`.
  ---
  product.payment_link.needs_clarification | Triggered when the status for a Payment Link product is `needs_clarification`.
  ---
  product.payment_link.activated | Triggered when the status for a Payment Link product is `activated`.
  ---
  product.payment_link.rejected | Triggered when the status for a Payment Link product is `rejected`.
  

  View [payload details](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners/#onboarded-using-apis.md).
    

Watch this video to see how you can subscribe to Partner Webhooks.

[Video content]

  
### To subscribe to webhook events:

        1. Log in to the Dashboard.
        2. Navigate to **Partner's Dashboard** → **Settings** → **Webhooks** to subscribe to any of the events mentioned in the following section.
        3. Click **Manage**.
        4. In the **Webhook Setup** pop-up page:
            1. Enter the **URL** where you want to receive the webhook payload when an event is triggered. We recommended using an HTTPS URL.
            1. Enter a **Secret** for the webhook endpoint. The secret is used to validate that the webhook is from Razorpay.
            1. In the **Alert Email** field, enter the email address to which the notifications should be sent in case of webhook failure.
            1. Select the required events from the list of **Active Events**.
        5. Click **Create Webhook**.
    

### Alerts

Razorpay sends alerts once the sub-merchant GMV is breached. The first webhook event will be triggered when 90% of the GMV is breached. After that, at an increment of 1% a webhook event will be triggered.

Given below is the event name and description:

Event Name | Description
---
account.no_doc_onboarding_gmv_limit_warning | Triggered when the sub-merchant breaches the GMV.

```json: Sample Payload
{
  "acc_id": "xxxx",
  "gmv_limit": "500000",
  "current_gmv": "xxxx",
  "message": "You can accept payments upto INR X (remaining GMV limit). In order to remove this limit, kindly submit the KYC documents."
}
```

### Webhooks APIs

You can use the [Webhooks APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/webhooks.md) to receive event notifications or subscribe to events happening in a sub-merchant's account, such as payments, orders, invoices and so on.

  
### Available Webhooks APIs

API | Description
---
[Create a Webhook](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/webhooks/create.md) | API to create a webhook.
---
[Fetch a Webhook](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/webhooks/fetch-with-id.md) | API to retrieve and view the webhook details.
---
[Fetch all Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/webhooks/fetch-all.md) | API to retrieve all webhooks.
---
[Update a Webhook](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/webhooks/update.md) | API to update the webhook details.
---
[Delete a Webhook](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/webhooks/delete.md) | API to delete a webhook.
