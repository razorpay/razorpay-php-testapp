---
title: Callback URL
description: Reuse the web integration to process the payments.
---

# Callback URL

If you reuse your web integration of Razorpay Checkout inside a web view on Android or iOS, the checkout form may not open. Issues like this are handled in our [Android SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/standard.md) and [iOS SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/standard.md), with the SDKs being the preferred method of integration.

However, if you want to reuse the web integration for some reason, you can pass the following `callback_url` along with other [checkout options](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps/#123-checkout-options.md) to process the desired payment:

```JavaScript: JavaScript
var options = {
  ... // existing options
  callback_url: 'https://your-server/callback_url',
  redirect: true
}
```

`callback_url` needs to accept incoming `POST` requests. For a successful payment, the callback URL will have `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` as the request parameters.

For failed payments, the request parameter are explained in the table below:

`error`
: `object` The error object.

  `code`
  : `string` Type of the error.

  `description`
  : `string` Descriptive text about the error.

  `field`
  : `string` Name of the parameter in the API request that caused the error.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can set query parameters with `callback_url`, to map it with entities at your side. For example, following is a valid callback URL: https://your-site.com/callback?cart_id=12345
> 

## FAQs

  
### 1. Is the handler function not supported in WebView?

       The handler function is not supported in WebView environments due to the inherent limitations of WebView in executing certain JavaScript functions. 
    

  
### 2. What are all the field names posted to the callback page, and can I add custom fields?

       Razorpay posts only three fields to the callback page: `razorpay_payment_id`, `razorpay_order_id`, and `razorpay_signature`. Custom fields cannot be added to the callback response.
