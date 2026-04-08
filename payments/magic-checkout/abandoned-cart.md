---
title: Abandoned Cart Webhook | Razorpay Magic Checkout
heading: Abandoned Cart Webhook
description: Enable the abandoned cart webhook to track drop-offs and retarget customers who leave without completing their purchase.
---

# Abandoned Cart Webhook

An abandoned cart occurs when a customer adds items to their cart and initiates checkout but does not complete the purchase. For example, a customer might enter their shipping details but leave the site before making the payment.

By enabling the abandoned cart webhook, you can track when a customer drops off during the checkout journey. This helps you retarget them using their contact information and recover potentially lost sales.

## Enable Abandoned Cart Webhook

1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.
2. Select **Shopify**, **WooCommerce** or **Custom E-Commerce Platform** from the **Platform** drop-down list. Enter the required information based on your selection.
3. Navigate to **Checkout Setup** and toggle on **Enable the Abandoned webhook to track**.
4. Enter the URL where you want to receive the abandoned checkout data.
5. Click **Save** → **Save settings**.

 

### Sample Payload

Given below is a sample payload: 

```json: Abandoned Cart Webhook Payload
{
    "utm_parameters": {
        "fbclid": "test_fbclid",
        "utm_campaign": "campaign_value",
        "utm_content": "content_value",
        "utm_medium": "medium_value",
        "utm_source": "fb"
    },
    "shop_id": "magic-checkout-test-store-1",
    "platform": "shopify",
    "token": "a9de14647f2c1e7b58cafeac93c4712c",
    "cart_token": "c1-68be3bdc331cfec1e79d05d8c4caa7d7",
    "email": "gaurav.kumar@example.com",
    "phone": "+919999999999",
    "abandoned_checkout_url": "https://magic-checkout-test-store-url",
    "currency": "",
    "line_items": [
        {
        "image_url": "https://image_url",
        "name": "test product 2",
        "price": 5000,
        "product_id": "7652090314919",
        "quantity": 1,
        "sku": "123-A",
        "tax_amount": 0,
        "taxable": true,
        "variant_price": 5000,
        "variant_id": "43306810998951",
        "variant_title": "Default Title",
        "store_name": "",
        "gram": "212",
        "title": ""
        }
    ],
    "tax_details": {
        "taxes_included": true,
        "total_tax": 314
    },
    "line_items_total": "5000",
    "promotions": [
        {
        "code": "off12",
        "value": 1200
        },
        {
        "code": "nector_coins",
        "value": 300
        }
    ],
    "customer": {
        "email": "gaurav.kumar@example.com",
        "first_name": "Gaurav",
        "last_name": "Kumar",
        "Shipping_address": {
        "First_name": "Gaurav",
        "Last_name": "Kumar",
        "Address1": "Near Nehru Road",
        "Address2": "Ram Krishna Colony",
        "City": "Bengaluru",
        "Province": "Karnataka",
        "Country": "India",
        "Zip": "829122",
        "Phone": "+919999999999",
        "Name": "Gaurav Kumar",
        "Province_code": "KA",
        "Country_code": "IN",
        "Country_name": "India"
        },
        "created_at": ""
    }
}
```
