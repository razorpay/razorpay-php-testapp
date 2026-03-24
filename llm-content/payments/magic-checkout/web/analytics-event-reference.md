---
title: Magic Checkout Analytics Event Reference
description: Complete reference for Magic Checkout analytics events, payload schemas and field definitions.
---

# Magic Checkout Analytics Event Reference

This page is a technical reference for all Magic Checkout analytics events. For setup instructions, see the [Magic Checkout Analytics Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/web/analytics-integration.md) guide.

## Common Payload Fields

Every `mx-analytics` event payload contains the following base fields. Event-specific additional fields are documented under each event in the [Event Reference](#event-reference).

    
### List of fields

`event`
: `string` The event name (for example, `"initiate"`, `"payment_initiated"`).

`paymentMode`
: `string` Payment mode. Currently it is always `"online"`.

`lineItems`
: `LineItem[]` Cart items at the time the event fired. See [LineItem Schema](#lineitem-schema).

`totalAmount`
: `number` Original cart total in paise (before shipping or discounts).

`latestTotal`
: `number` Current order total in paise, reflecting any applied discounts and shipping.

`shippingAmount` _optional_
: `number` Shipping cost in paise. Undefined if not yet calculated.

`couponDiscountValue`
: `number` Discount applied by an active coupon in paise. 0 if no coupon is active.

`isScriptCouponApplied`
: `boolean` Whether an automatic/script-based discount is applied.

`currency`
: `string` Transaction currency code (for example, `"INR"`).

`phone`
: `string` Customer's phone number. Empty string if not yet available.

`email`
: `string` Customer's email address. Empty string if not yet available.

`first_name`
: `string` Customer's first name. Empty string if not yet available.

`last_name`
: `string` Customer's last name. Empty string if not yet available.

`state`
: `string` Customer's state. Empty string if address not yet selected.

`city`
: `string` Customer's city. Empty string if address not yet selected.
        

> **INFO**
>
> 
> **Important Payload Information**
> 
> - **Field Naming Conventions**: Payloads use mixed casing based on their source. Amount and mode fields (for example, `latestTotal`, `paymentMode`) use **camelCase** as they originate from JavaScript. Customer identity and address fields (for example, `first_name`, `state_code`) use **snake_case** as they originate from backend API responses.
> 
> - **Currency Format**: All amounts are represented in paise (integers). To get the value in Rupees, divide by 100 (for example, 49900 = ₹499.00).
> 
> - **Progressive Data Population**: Customer fields are populated in stages. `phone` and `email` appear after contact entry. However, `first_name`, `last_name`, `state` and `city` remain empty strings until the `address_info_submitted` event fires.
> 
>     - After `address_info_submitted` fires, additional fields —`state_code`, `country_name`, `zipcode`, `line1` and `line2`— become available in all subsequent payloads.
> 
>     - The `country_name` field actually contains a 2-letter country code (for example, "in") rather than the full name of the country.
> 

## LineItem Schema

Each object in the `lineItems` array reflects what was passed in `line_items` when creating the order. All fields are optional as not every integration populates every field.

    
### List of Fields

`name` _optional_
: `string` Product name.

`description` _optional_
: `string` Product description. May be an empty string.

`image_url` _optional_
: `string | null` Product image URL.

`price` _optional_
: `number` Original price in paise.

`offer_price` _optional_
: `number` Effective/offer price in paise.

`quantity` _optional_
: `number` Quantity in cart.

`tax_amount` _optional_
: `number` Tax amount in paise.

`variant_id` _optional_
: `string` Product variant identifier.

`sku` _optional_
: `string` Product SKU.

`title` _optional_
: `string` Alternate product name (used by some integrations).

`id` _optional_
: `string | number` Generic product/item identifier.

`product_id` _optional_
: `string | number` Product identifier.

`discount` _optional_
: `number` Discount amount in paise.

`product_url` _optional_
: `string` Relative URL to the product page.

`brand` _optional_
: `string` Product brand.

`vendor` _optional_
: `string` Product vendor.
        

## Address Schema

The `address` object is present in `address_selected` and `address_added` events.

    
### Fields for address_selected (saved address)

`id`
: `string` Unique address identifier.

`entity_id`
: `string` Internal Razorpay identifier.

`entity_type`
: `string` Internal Razorpay identifier.

`type`
: `string` Address type, for example, `"shipping_address"`.

`primary`
: `boolean` Indicates whether this is the customer's primary address.

`name`
: `string` Full name on the address.

`line1`
: `string` Address line 1.

`line2`
: `string` Address line 2. May be empty.

`zipcode`
: `string` Postal or ZIP code.

`city`
: `string` City.

`state`
: `string` State name.

`country`
: `string` 2-letter country code, for example, `"in"` for India.

`contact`
: `string` Phone number associated with this address.

`tag`
: `string` Address label, for example, `"Home"` or `"Work"`.

`landmark`
: `string` Landmark. Empty string if not provided.
        

    
### Fields for address_added (new address from form)

Server-assigned fields (`id`, `entity_id`, `entity_type`, `primary`, `type`) are absent because the address is not yet saved. Two additional form-specific fields are present:

`name`
: `string` Full name on the address.

`line1`
: `string` Address line 1.

`line2`
: `string` Address line 2. May be empty.

`zipcode`
: `string` Postal or ZIP code.

`city`
: `string` City.

`state`
: `string` State name.

`country`
: `string` 2-letter country code, for example, `"in"` for India.

`contact`
: `string` Phone number associated with this address.

`tag`
: `string` Address label, for example, `"Home"` or `"Work"`.

`landmark`
: `string` Landmark. Empty string if not provided.

`save_my_address`
: `boolean` Indicates whether the customer opted to save this address.

`new_shipping_address_cta`
: `any` Internal form field.
        

## Event Reference

Events are listed in the order they typically occur during a customer journey.

    

    
### initiate

**When it fires:** The Magic Checkout modal opens.

**Additional fields:** None beyond common fields.

```json: Example Payload
{
  "event": "initiate",
  "paymentMode": "online",
  "lineItems": [
    {
      "name": "Product Name",
      "description": "Product description",
      "image_url": "https://example.com/image.jpg",
      "price": 49900,
      "offer_price": 49900,
      "quantity": 1,
      "tax_amount": 0,
      "variant_id": "123456789",
      "sku": "SKU-001"
    }
  ],
  "totalAmount": 49900,
  "latestTotal": 49900,
  "couponDiscountValue": 0,
  "isScriptCouponApplied": false,
  "currency": "INR",
  "phone": "+91XXXXXXXXXX",
  "email": "customer@example.com",
  "state": "",
  "city": "",
  "first_name": "",
  "last_name": ""
}
```

        

    
### contact_input_entered

**When it fires:** The customer enters their phone number or email address in the contact input field.

**Additional fields:** None beyond common fields. The `phone` or `email` fields in the common payload reflect what the customer entered.

        

    
### otp_initiated

**When it fires:** An OTP is sent to the customer's phone number.

**Additional fields:**

`otp_verified`
: `boolean` Always `false`. The OTP is sent but not yet verified.

```json: Example Payload
{
  "event": "otp_initiated",
  "otp_verified": false,
  "paymentMode": "online",
  "phone": "+91XXXXXXXXXX",
  "email": "customer@example.com",
  "state": "",
  "city": "",
  "first_name": "",
  "last_name": "",
  "totalAmount": 49900,
  "latestTotal": 49900,
  "couponDiscountValue": 0,
  "isScriptCouponApplied": false,
  "currency": "INR"
}
```

        

    
### otp_submitted

**When it fires:** The customer submits an OTP and it is accepted. This event does not fire on a failed OTP attempt.

**Additional fields:**

`otp_verified`
: `boolean` Always `true`. This event fires only on successful verification.

```json: Example Payload
{
  "event": "otp_submitted",
  "otp_verified": true,
  "paymentMode": "online",
  "phone": "+91XXXXXXXXXX",
  "email": "customer@example.com",
  "state": "",
  "city": "",
  "first_name": "",
  "last_name": "",
  "totalAmount": 49900,
  "latestTotal": 49900,
  "couponDiscountValue": 0,
  "isScriptCouponApplied": false,
  "currency": "INR"
}
```

        

    
### otp_skipped

**When it fires:** The customer skips the OTP verification step when the skip option is available.

**Additional fields:** None beyond common fields.

        

    
### user_data

**When it fires:** The customer's identity is confirmed and their profile data is available. This is the earliest event where `phone`, `email`, `first_name` and `last_name` are reliably populated.

This event fires multiple times in a session: at login completion, when the customer proceeds from the address step and when payment is initiated. Each emission reflects the most current customer data.

**Additional fields:** None beyond common fields.

```json: Example Payload
{
  "event": "user_data",
  "paymentMode": "online",
  "phone": "+91XXXXXXXXXX",
  "email": "customer@example.com",
  "state": "West Bengal",
  "city": "Kolkata",
  "first_name": "Jane",
  "last_name": "Doe",
  "totalAmount": 49900,
  "latestTotal": 49900,
  "couponDiscountValue": 0,
  "isScriptCouponApplied": false,
  "currency": "INR"
}
```

        

    
    

    
### address_selected

**When it fires:** The customer selects a saved address from their address book and serviceability for that address is confirmed.

This event fires only when the selected address changes. Selecting the same address again does not re-fire the event.

**Additional fields:**

`address`
: `Address` The selected address. See [Address Schema](#address-schema).

        

    
### address_added

**When it fires:** The customer submits a new address through the address form.

**Additional fields:**

`address`
: `Address` The newly added address. See [Address Schema](#address-schema).

        

    
### pincode_entered

**When it fires:** The customer enters a pincode in the address form. This event fires on blur of the pincode field.

**Additional fields:**

`pinCode`
: `string` The pincode value entered by the customer.

        

    
### address_info_submitted

**When it fires:** Address information is finalised. This event fires in three scenarios:

1. The customer submits a new address form.
2. The customer confirms an existing saved address.
3. On checkout open, if the customer is already logged in and has a saved address on file.

After this event fires, subsequent event payloads include `state_code`, `country_name`, `zipcode`, `line1` and `line2` at the top level, in addition to `state` and `city`.

**Additional fields:** None beyond common fields.

        

    
### shipping_selected

**When it fires:** The customer confirms their address and the checkout proceeds to the payment screen.

**Additional fields:**

`name` _optional_
: `string` Shipping method name.

`shipping_fee` _optional_
: `number` Shipping cost in paise.

`cod` _optional_
: `boolean` Indicates whether COD is available for this shipping method.

`cod_fee` _optional_
: `number` COD fee in paise.

`id` _optional_
: `string` Shipping method identifier.

These fields (`name`, `shipping_fee`, `cod`, `cod_fee`, `id`) are present only in the standard checkout flow. In a quick-buy flow where payment occurs without an address step, this event fires without these fields.

```json: Example Payload - Standard Flow
{
  "event": "shipping_selected",
  "name": "Standard Delivery",
  "shipping_fee": 0,
  "cod": false,
  "cod_fee": 0,
  "id": "standard",
  "paymentMode": "online",
  "phone": "+91XXXXXXXXXX",
  "email": "customer@example.com",
  "state": "",
  "city": "",
  "first_name": "",
  "last_name": "",
  "totalAmount": 49900,
  "latestTotal": 49900,
  "shippingAmount": 0,
  "couponDiscountValue": 0,
  "isScriptCouponApplied": false,
  "currency": "INR"
}
```

        

    
    

    
### payment_page_reached

**When it fires:** The customer arrives at the payment method selection screen.

**Additional fields:** None beyond common fields.

        

    
### coupon_applied

**When it fires:** The customer applies a coupon code and it is accepted.

**Additional fields:**

`appliedCouponCode`
: `string` The coupon code that was successfully applied.

`amountBeforeDisc`
: `number` Cart total before the discount, in paise.

`amountAfterDisc`
: `number` Cart total after the discount, in paise. Same as `latestTotal`.

The `couponDiscountValue` field in the common payload also reflects the discount amount in paise.

```json: Example Payload
{
  "event": "coupon_applied",
  "appliedCouponCode": "SAVE10",
  "amountBeforeDisc": 49900,
  "amountAfterDisc": 39900,
  "paymentMode": "online",
  "couponDiscountValue": 10000,
  "latestTotal": 39900,
  "totalAmount": 49900,
  "isScriptCouponApplied": false,
  "currency": "INR",
  "phone": "+91XXXXXXXXXX",
  "email": "customer@example.com",
  "state": "West Bengal",
  "city": "Kolkata",
  "first_name": "Jane",
  "last_name": "Doe"
}
```

        

    
### coupon_failed

**When it fires:** The customer attempts to apply a coupon code and it is rejected.

**Additional fields:**

`couponCode`
: `string` The coupon code the customer attempted to use.

`errorMsg`
: `string` The reason the coupon was rejected.

```json: Example Payload
{
  "event": "coupon_failed",
  "couponCode": "SAVE10",
  "errorMsg": "coupon not applicable for this order",
  "paymentMode": "online",
  "couponDiscountValue": 0,
  "latestTotal": 49900,
  "totalAmount": 49900,
  "isScriptCouponApplied": false,
  "currency": "INR",
  "phone": "+91XXXXXXXXXX",
  "email": "customer@example.com",
  "state": "West Bengal",
  "city": "Kolkata",
  "first_name": "Jane",
  "last_name": "Doe"
}
```

        

    
    

> **WARN**
>
> 
> **Important**
> 
> Do not use `mx-analytics` events to confirm payment. Always verify payments server-side using `razorpay_signature`. These events are for analytics instrumentation only.
> 

    
### payment_initiated

**When it fires:** The customer selects a payment method and taps pay, initiating a payment attempt.

**Additional fields:**

`paymentMethod`
: `string` The payment method selected. Possible values: `"upi"`, `"card"`, `"netbanking"`, `"wallet"`, `"emi"`, `"cod"`.

```json: Example Payload
{
  "event": "payment_initiated",
  "paymentMethod": "upi",
  "paymentMode": "online",
  "phone": "+91XXXXXXXXXX",
  "email": "customer@example.com",
  "state": "West Bengal",
  "city": "Kolkata",
  "first_name": "Jane",
  "last_name": "Doe",
  "totalAmount": 49900,
  "latestTotal": 49900,
  "shippingAmount": 0,
  "couponDiscountValue": 0,
  "isScriptCouponApplied": false,
  "currency": "INR"
}
```

        

    
### payment_failed

**When it fires:** A payment attempt fails due to reasons such as bank decline, UPI timeout, or insufficient funds.

**Additional fields:**

`failureReason`
: `string` Description of why the payment failed.

```json: Example Payload
{
  "event": "payment_failed",
  "failureReason": "Payment failed due to insufficient funds",
  "paymentMode": "online",
  "phone": "+91XXXXXXXXXX",
  "email": "customer@example.com",
  "state": "West Bengal",
  "city": "Kolkata",
  "first_name": "Jane",
  "last_name": "Doe",
  "totalAmount": 49900,
  "latestTotal": 49900,
  "shippingAmount": 0,
  "couponDiscountValue": 0,
  "isScriptCouponApplied": false,
  "currency": "INR"
}
```

        

    
### checkout_abandoned

**When it fires:** The customer closes the Magic Checkout modal without completing payment.

**Additional fields:**

`time_since_open`
: `number` Milliseconds elapsed between checkout open and the moment of abandonment.

        

    

## Event Behavior Notes

    
### When do mx-analytics events fire?

         These events only fire for Magic Checkout. If Magic Checkout features are not enabled on your account, `mx-analytics` events will not be emitted.
        

    
### When are customer fields populated?

         Customer fields start as empty strings and are populated progressively as the customer advances through the flow. `user_data` is the earliest event where all identity fields are reliably complete.
        

    
### How often does user_data fire?

         `user_data` fires multiple times per session: at login confirmation, after address is confirmed and when payment is initiated.
        

    
### Can payment events fire multiple times?

         `payment_initiated` and `payment_failed` can fire multiple times in one session if the customer retries after a failure.
        

    
### Is there an event for failed OTP attempts?

         `otp_submitted` only fires on a successful OTP. There is no event for a failed OTP attempt.
        

    
### Does address_selected fire on every selection?

         `address_selected` will not fire if the same address is selected twice. It only fires when the selection changes.
        

    
### When does address_info_submitted fire?

         `address_info_submitted` fires in three scenarios: new address submitted, existing address confirmed and automatically on checkout open for an already-logged-in customer with a saved address.
        

    
### Are shipping_selected fields always present?

         `shipping_selected` fields (`name`, `shipping_fee`, `cod`, `cod_fee`, `id`) are absent in the quick-buy flow where the customer pays without going through an address step.
        

    
### When does checkout_abandoned fire?

         `checkout_abandoned` fires only when checkout closes without a successful payment. If payment succeeds, the handler callback fires instead.
