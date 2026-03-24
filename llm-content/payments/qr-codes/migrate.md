---
title: Migrate from BharatQR APIs to QR Codes APIs
description: Migrate from our BharatQR APIs to QR Code APIs. Compare features, API Parameters and Webhook events.
---

# Migrate from BharatQR APIs to QR Codes APIs

Given below is the high-level migration process.
1. Explore the QR Codes APIs using the Postman collection.
2. Understand the QR Code API Request and Response structure and the webhook payloads.
3. Integrate with QR Code APIs. You can refer to the provided sample codes.

    
### Feature Comparison

The table below lists the features availability on BharatQR API and QR Codes API:

Feature | BharatQR API | QR Codes API
---
Dynamic BharatQR | x | ✓
---
Static BharatQR | ✓ | ✓
---
Dynamic UPI QR | ✓ | ✓
---
Static UPI QR | x | ✓
---
Get count of payments collected on QR Code | x | ✓
---
Dashboard access | x | ✓
---
Your business branding on QR image | x | ✓
---
Dedicated VPA for your business | x | ✓

        

    
### Comparison of API Parameters

Compare BharatQR and QR Code API parameters.

    
        
        BharatQR Parameter | QR Codes Parameter | Description
        ---
        receivers.types | type | The type of QR Code. Possible values: - `upi_qr`: Create a QR Code that accepts only UPI payments.
- `bharat_qr`: Create a QR Code that accepts UPI and card payments.
 
 For `receivers.types`, the only possible value was `qr_code`.
        ---
        description | description | A brief description of the QR Code.
        ---
        customer_id | customer_id | Unique identifier of the customer the QR Code is linked with. 
        ---
        close_by | close_by | UNIX timestamp at which the QR Code is scheduled to be automatically closed. The time must be at least 15 minutes after the current time. 
        ---
        notes | notes | Key-value pair that can be used to store additional information about the QR Code. Maximum 15 key-value pairs, 256 characters (maximum) each.
        ---
        amount_expected | NA | The maximum amount you expect to receive in this virtual account.
        ---
        NA | name | Label entered to identify the QR Code. For example, `Store Front Display`.
        ---
        NA | usage | Indicates if the QR Code should be allowed to accept single payment or multiple payments. Possible values: - `single_use`: QR Code will accept only one payment and then close automatically.
- `multiple_use` (default): QR Code will accept multiple payments.

        ---
        NA | fixed_amount | Indicates if the QR should accept payments of specific amounts or any amount. Possible values: - `true`: QR Code accepts only a specific amount. 
- `false` (default): QR Code will accept any amount.

        ---
        NA | payment_amount | This parameter is mandatory if fixed_amount parameter is in use. The amount allowed for a transaction. If this is specified, then any transaction of amount less than or more than this value will not be allowed. For example, if this amount is set as `500000`, the customer cannot pay an amount less than or more than ₹5000.
        

        **API Reference Links**
        - BharatQR: [Create a virtual account](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/bharatqr/api/#create.md)
        - QR Code: [Create a QR Code](@/Applications/MAMP/htdocs/new-docs/llm-content/api/qr-codes/#create-a-qr-code.md)

    
    
        For this action, only one path parameter needs to be passed, the QR Code id.

        
        BharatQR Parameter | QR Codes Parameter | Description
        ---
        Virtual Account ID | QR Code ID | The unique identifier of the virtual account/QR Code that is to be closed.
        

        **API Reference Links**
        - BharatQR: [Close a virtual account](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/bharatqr/api/#close.md)
        - QR Code: [Close a QR Code](@/Applications/MAMP/htdocs/new-docs/llm-content/api/qr-codes/close.md)
    
    
        The fetch query parameters remain the same across the APIs as given below:

        
        BharatQR Parameter | QR Codes Parameter | Description
        ---
        from | from | Timestamp, in seconds, from when QR Codes are to be fetched.
        ---
        to | to | Timestamp, in seconds, till when QR Codes are to be fetched.
        ---
        count | count | Number of QR Codes to be fetched. The default value is 10 and the maximum value is 100. This can be used for pagination, in combination with skip.
        ---
        skip | skip | Number of records to be skipped while fetching the QR Codes. This can be used for pagination, in combination with count.
        

        **API Reference Links**
        - BharatQR: [Fetch all virtual accounts](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/bharatqr/api/#fetch-all-payments.md)
        - QR Code: [Fetch all QR Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/api/qr-codes/fetch-all.md)
    
    
        
        For this action, only one path parameter needs to be passed, the QR Code id.

        
        BharatQR Parameter | QR Codes Parameter | Description
        ---
        Virtual Account ID | QR Code ID | The unique identifier of the virtual account/QR Code whose details are to be fetched.
        

        **API Reference Links**
        - BharatQR: [Fetch a virtual account](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/bharatqr/api/#fetch-a-payment.md)
        - QR Code: [Fetch a QR Code](@/Applications/MAMP/htdocs/new-docs/llm-content/api/qr-codes/fetch-with-id.md)
    
    
        For this action, only one path parameter needs to be passed, the QR Code identifier.

        
        BharatQR Parameter | QR Codes Parameter | Description
        ---
        Virtual Account ID | QR Code ID | The unique identifier of the virtual account/QR Code whose payment details are to be fetched.
        

        **API Reference Links**
        - BharatQR: [Fetch payments by id](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/bharatqr/api/#fetch-a-payment.md)
        - QR Code: [Fetch payments made to a QR Code](@/Applications/MAMP/htdocs/new-docs/llm-content/api/qr-codes/fetch-payments.md)
    

        

    
### Comparison of Webhook Events

Given below is a comparison of BharatQR and QR Codes webhook events:

Webhook Events | BharatQR | QR Codes
---
QR Code created | [virtual_account.created](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/smart-collect/#virtual-account-created.md) | [qr_code.created](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/subscribe-to-webhooks/#qr-code-created.md)
---
QR Code credited | [virtual_account.credited](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/bharatqr/notification/#webhooks.md) | [qr_code.credited](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/subscribe-to-webhooks/#qr-code-credited.md)
---
QR Code closed | [virtual_account.closed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/smart-collect/#virtual-account-closed.md) | [qr_code.closed](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/subscribe-to-webhooks/#qr-code-closed.md)
