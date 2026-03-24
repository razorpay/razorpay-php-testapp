---
title: Generate TPV QR Codes Using UPI Intent Deep Links
description: Create TPV-enabled QR codes for securities businesses using UPI intent deep links and Third-Party QR code generation libraries.
---

# Generate TPV QR Codes Using UPI Intent Deep Links

Generate TPV QR codes for your securities business using UPI intent deep links. Since TPV-enabled QR codes are not available as a direct product feature, create a deep link via S2S APIs and convert it to a QR code using third-party libraries.

## Prerequisites

- Create a [Razorpay account](https://dashboard.razorpay.com/signup).
- Generate the [API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/api-keys/#generate-api-keys.md) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.
- Ensure the [Third-Party Validation](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/third-party-validation.md) feature is activated on your account.

## Sample Code

After creating an order using the [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/create.md), use the following API call to generate a UPI intent deep link and convert the returned link into a QR code:

```curl: Request
curl -X POST https://api.razorpay.com/v1/payments/create/upi \
-U [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H 'content-type:application/json' \
-d '{
    "amount": 200,
    "currency": "INR",
    "order_id": "order_OJsi0LlycSkGhn",
    "email": "gaurav.kumar@example.com",
    "contact": "9090909090",
    "method": "upi",
    "ip": "192.168.0.103",
    "referer": "http",
    "user_agent": "Mozilla/5.0",
    "description": "Test flow",
    "notes": {
        "purpose": "UPI test payment"
    },
    "upi": {
        "flow": "intent"
    }
}'
```json: Response
{
    "razorpay_payment_id": "pay_OJsij8Hf9lkUMD",
    "link": "upi://pay?mc=5817&pa=merchant@axisbank&pn=MerchantName&tr=OJsij8Hf9lkUMD&tn=Testflow&am=2.00&cu=INR"
}
```

    
### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency subunit. For example, if the amount to be charged is ₹2.00, enter `200` in this field.

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. For TPV QR codes, this should be `INR`.

`order_id` _mandatory_
: `string` Order ID generated via [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/create.md).

`email` _mandatory_
: `string` Email address of the customer.

`contact` _mandatory_
: `string` Phone number of the customer. The expected format is without country code for Indian numbers. Example: `9090909090`.

`method` _mandatory_
: `string` Payment method. For this integration, set this to `upi`.

`ip` _optional_
: `string` IP address of the customer.

`referer` _optional_
: `string` Referer header value.

`user_agent` _optional_
: `string` User agent of the customer's browser.

`description` _optional_
: `string` Description of the payment.

`notes` _optional_
: `object` Set of key-value pairs that can be used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

`upi` _mandatory_
: `object` UPI specific parameters.

   `flow` _mandatory_
   : `string` UPI flow type. Set this to `intent` to generate a deep link for QR code creation.
        

    
### Response Parameters

`razorpay_payment_id`
: `string` Unique identifier for the payment.

`link`
: `string` UPI intent deep link that can be converted to a QR code using third-party libraries.
        

## Implementation Steps

Follow these steps to implement TPV QR code payments:

1. Call the UPI payment creation API with `"flow": "intent"`.
2. Extract the `link` from the response.
3. Use any QR code generation library to [convert this link into a QR code](#convert-upi-intent-deep-link-to-qr-code).
4. Display the QR code to your customers.
5. [Poll Payment APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/fetch-with-id.md) to check the payment status.

> **WARN**
>
> 
> **Watch Out!**
> 
> - **Expiry Management**: QR codes generated through this method require expiry handling on your application side.
> - **Payment Monitoring**: Continue monitoring payment status even after your intended QR expiry time, as users may complete payments later.
> - **Reconciliation**: Implement appropriate reconciliation processes to handle payments completed after your QR display period
> 

### Convert UPI Intent/Deep Link to QR Code

Use widely available open-source libraries across all major programming languages to generate QR codes from any UPI Intent URL or Deep Link.

    
### Node.js

        Use the [qrcode library](https://github.com/soldair/node-qrcode):

        ```json:
        npm install qrcode
        ```
        
        Given below is a sample code to generate QR code:

        ```javascript: Node.js
        const QRCode = require("qrcode");
        
        QRCode.toFile("upi_qr.png", "upi://pay?pa=merchant@upi&am=100");
        ```
        
        **Supports:** PNG, SVG, Terminal output.
        

    
### Python

        Use the [qrcode library](https://github.com/lincolnloop/python-qrcode):
        
        ```json:
        pip install qrcode[pil]
        ```
        
        Given below is a sample code to generate QR code:

        ```python: Python
        import qrcode
        
        img = qrcode.make("upi://pay?pa=merchant@upi&am=100")
        img.save("upi_qr.png")
        ```
        

    
### Java

        Use the [ZXing (Zebra Crossing) library](https://github.com/zxing/zxing), the most widely used QR generator in Java-based applications. Given below is a sample code to generate QR code:

        ```java: Java
        QRCodeWriter writer = new QRCodeWriter();
        BitMatrix matrix = writer.encode(intentUrl, BarcodeFormat.QR_CODE, 300, 300);
        ```
        

    
### Go

        Use the [skip2/go-qrcode library](https://github.com/skip2/go-qrcode):

        ```json:
        go get github.com/skip2/go-qrcode
        ```
        
        Given below is a sample code to generate QR code:

        ```go: Go
        qrcode.WriteFile(intentUrl, qrcode.Medium, 256, "upi_qr.png")
        ```
        

    
### PHP

        Use the [endroid/qr-code library](https://github.com/endroid/qr-code): 

        ```json:
        composer require endroid/qr-code
        ```
        
        Given below is a sample code to generate QR code:

        ```php: PHP
        use Endroid\QrCode\QrCode;
        
        $qr = QrCode::create($intentUrl)->writeFile('upi_qr.png');
        ```
        

    
### Android/iOS

        
            
                Use the [ZXing Android embedded](https://github.com/journeyapps/zxing-android-embedded) library.
            
            
                Use Native CoreImage (no external dependency required). Given below is a sample code to generate QR code:

                ```swift: iOS Swift
                let data = intentUrl.data(using: .ascii)
                let filter = CIFilter.qrCodeGenerator()
                filter.setValue(data, forKey: "inputMessage")
                ```
            
        
        

> **INFO**
>
> 
> **Handy Tips**
> 
> Any UPI Intent URL (for example, `upi://pay?...`) can be passed as a string to any of the above libraries to generate a QR code. These are public, open-source, stable and suitable for your integrations across web, backend and mobile applications.
>
