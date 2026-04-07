---
title: Setup Direct Settlements on Route
heading: Setup and Configuration
description: Enable Route for Direct Settlement payments. Setup guide, eligibility criteria, linked account management and troubleshooting tips.
---

# Setup and Configuration

can use the Route integration to automatically split payments.

Eliminate manual calculations and reduce operational overhead with faster vendor payouts. This solution requires a new integration and the use of additional APIs for transfer creation.

## Primary Eligibility Criteria

    
### VAS Partners under Banking Organisations

        - Businesses acquired by banking partners (such as HDFC Bank).
        - Currently using Razorpay's payment stack through banking partnerships.
        - Part of programs like HDFC Collect Now or similar banking initiatives.
        

## Setup and Configuration

One of the key advantages of   is the minimal setup required:

- **New API for Transfer Creation**: A new API is used to create transfers.
- **No Code Changes (for existing Route users)**: If you already have a Route implementation, it will work seamlessly with Direct Settlement transactions. 

**Things that will remain the same for existing Route users:**

- **API endpoints and request/response formats**: If you are already using Razorpay Route, you will continue to use the same API endpoints and formats.
- **Webhook configurations and event handling**: Your existing webhook configurations and event handling processes will remain unchanged.
- **Dashboard interface and reporting**: The dashboard interface and reporting will be familiar.
- **Transfer creation and management processes**:  

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> No technical setup is required from businesses. This feature must be enabled by your banking partner or [Razorpay support team](https://razorpay.com/support/) through appropriate feature flags.
> 
> 

## Use Current Setup

Businesses who have already integrated with Razorpay Route can continue with their existing setup and patterns.

### API Compatibility

All existing Route APIs work with DS transactions:

- [`POST /payments/{id}/transfers`](https://razorpay.com/docs/api/payments/route/create-transfers-payments) 
- [`GET /payments/{id}/transfers`](https://razorpay.com/docs/api/payments/route/fetch-transfers-payment) 
- [`GET /transfers/{id}`](https://razorpay.com/docs/api/payments/route/fetch-a-transfer)

## Linked Account Setup

### Onboarding Process

Banking partners manage the linked account setup similar to parent business onboarding:

    
### Information Collection

        - Account holder details (Name, email and phone).
        - Business information (Registration type, PAN and GST).
        - Settlement details (Beneficiary name, account number and IFSC).
        

    
### Bulk Processing

        - Bank provides linked account details via operations process.
        - Accounts onboarded through bulk CSV upload.
        - Validation through batch processing system.
        

    
### Account Validation

        - Verify batch processing status.
        - Confirm accounts appear in Razorpay dashboard.
        - Test transfer creation capabilities.
        

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> For technical support during migration or troubleshooting:
> 
> - Contact your banking partner for Account-related issues.
> - Reach out to   for API and technical problems. 
> - Use your designated account manager for strategic guidance.
> 
>
