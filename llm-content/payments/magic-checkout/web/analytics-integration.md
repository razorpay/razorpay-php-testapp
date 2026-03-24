---
title: Magic Checkout Analytics Integration
description: Capture Magic Checkout analytics events and forward them to your analytics platform using the Razorpay JS SDK.
---

# Magic Checkout Analytics Integration

Magic Checkout emits analytics events at key points in a customer's purchase journey. This guide covers how native platform businesses can listen to these events and use them to power their own analytics pipelines (for example, Google Analytics 4, Mixpanel, Clevertap and so on).

This guide is for businesses integrated with Razorpay using the native integration (that is, directly using the Razorpay JS SDK on your own website, not via Shopify or other platform plugins). If you are on Shopify, refer to the Shopify-specific analytics setup instead.

## Prerequisites

- You have a working Magic Checkout integration using the Razorpay JS SDK.
- Your analytics tool (GA4, Mixpanel and so on) is already initialised on the page before the checkout is opened.

## How It Works

Magic Checkout communicates analytics events to your page via the Razorpay SDK instance:

1. You create a Razorpay instance with your checkout options.
2. You register a listener on the `mx-analytics` event before opening the checkout.
3. As the customer progresses through checkout, events fire through the `mx-analytics` listener.
4. When payment succeeds, the `handler` callback fires (not `mx-analytics`).

> **WARN**
>
> 
> **Watch Out!**
> 
> The purchase (payment success) event is delivered via the `handler` callback in your checkout options, not through `mx-analytics`. All other events come through `mx-analytics`.
> 

## Integration Steps

Follow these steps to integrate Magic Checkout analytics into your website.

### Step 1: Create the Razorpay Instance

Create a new Razorpay instance with your checkout options. The `handler` callback is where you capture successful payment events for your analytics.

```js: New Razorpay Instance
const checkoutOptions = {
  key: 'YOUR_KEY_ID',
  order_id: 'order_XXXXXXXXXXXXXXXXX',
  name: 'Your Store Name',
  // ... rest of your checkout options
  handler: function (response) {
    // Called when payment is successfully completed.
    // Trigger your analytics purchase event here.
    console.log('Payment successful:', response.razorpay_payment_id);
  },
};

const rzpInstance = new window.Razorpay(checkoutOptions);
```

### Step 2: Register the Analytics Listener

Register the `mx-analytics` listener on your Razorpay instance before you call `rzpInstance.open()`. This listener receives all checkout analytics events except payment success.

```js: Register mx-analytics Listener
rzpInstance.on('mx-analytics', function (data) {
  if (!data || !data.event) return;

  // Handle events based on data.event and the corresponding payload.
  // See the Event Reference for the full list of events and their payloads.
  console.log('[Magic Analytics]', data.event, data);
});

rzpInstance.open();
```

## Payment Success (Purchase Event)

Payment success is not delivered via the `mx-analytics` listener. It is delivered through the `handler` callback defined in your `checkoutOptions`.

The `handler` is called immediately after a successful payment with the following payload:

`razorpay_payment_id`
: `string` Unique identifier of the successful payment (for example, `"pay_XXXXXXXXXXXXXXXXX"`).

`razorpay_order_id`
: `string` The order id associated with this payment. Always present for Magic Checkout since an order is required.

`razorpay_signature`
: `string` HMAC-SHA256 signature for server-side payment verification. Always present for Magic Checkout.

```js: Handler
handler: function (response) {
  // Use response.razorpay_payment_id for analytics
  // Use response.razorpay_order_id for analytics
  // Use response.razorpay_signature for server-side verification ONLY; do not log or send to analytics
  console.log('Purchase complete:', response.razorpay_payment_id);
}
```

> **WARN**
>
> 
> **Watch Out!**
> 
> Always verify the payment on your server using `razorpay_signature` before fulfilling the order. Do not rely solely on the client-side handler for order confirmation.
> 

## Full Integration Example

```js: Example
const checkoutOptions = {
  key: 'YOUR_KEY_ID',
  order_id: 'order_XXXXXXXXXXXXXXXXX',
  name: 'Your Store Name',
  description: 'Order #1234',
  amount: 49900, // in paise

  handler: function (response) {
    console.log('Purchase:', response.razorpay_payment_id);
  },
};

const rzpInstance = new window.Razorpay(checkoutOptions);

rzpInstance.on('mx-analytics', function (data) {
  if (!data || !data.event) return;

  // Handle events based on data.event and the corresponding payload.
  // See the Event Reference for the full list of events and their payloads.
  console.log('[Magic Analytics]', data.event, data);
});

rzpInstance.open();
```

## Forward Events to Your Analytics Platform

The `mx-analytics` listener delivers raw event data to your page. It is your responsibility to forward this data to your analytics platform of choice, using whatever event names and payload structure that platform expects.

Below is an example of how you might forward Magic Checkout events to Google Analytics 4 (GA4). This is illustrative only; the event names and parameters shown are one possible mapping. Adapt them to match your own platform and tracking requirements.

```js: Example GA4 Integration
rzpInstance.on('mx-analytics', function (data) {
  if (!data || !data.event) return;

  var currency = data.currency || 'INR';
  var value = (data.latestTotal || 0) / 100; // convert paise to rupees

  var items = (data.lineItems || []).map(function (item) {
    return {
      item_id: item.sku || item.id || '',
      item_name: item.name || item.title || '',
      item_brand: item.brand || item.vendor || '',
      item_variant: String(item.variant_id || ''),
      price: ((item.offer_price || item.price || 0) / 100).toFixed(2),
      quantity: item.quantity || 1,
    };
  });

  switch (data.event) {
    case 'initiate':
      gtag('event', 'begin_checkout', { currency: currency, value: value, items: items });
      break;
    case 'payment_initiated':
      gtag('event', 'add_payment_info', { currency: currency, value: value, items: items, payment_type: data.paymentMethod });
      break;
    case 'coupon_applied':
      gtag('event', 'select_promotion', { coupon: data.appliedCouponCode });
      break;
    case 'checkout_abandoned':
      gtag('event', 'checkout_abandoned', { currency: currency, value: value });
      break;
    // Map other events as needed for your platform
  }
});
```

> **INFO**
>
> 
> **Handy Tips**
> 
> The event names (`begin_checkout`, `add_payment_info` and so on) above are GA4's recommended e-commerce event names. Your platform may use different conventions; refer to your analytics provider's documentation for the correct event taxonomy. This example covers only a subset of events; refer to the [Event Reference](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/web/analytics-event-reference.md) for the complete list.
> 

## Next Steps

Once you get the events from Razorpay, you can further integrate and forward the data to required tracking platform (such as GA4, GTM, Meta Ads and so on) by constructing the payload in the format specified by the platform.

For the full list of events, payload schemas and field definitions, see the [Magic Checkout Analytics Event Reference](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/web/analytics-event-reference.md).
