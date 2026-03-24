---
title: Razorpay S2S Integration - Best Practices
description: Follow these Best practices while doing TPV integration.
---

# Razorpay S2S Integration - Best Practices

S2S integration is an API-based white label integration provided by Razorpay wherein you can capture payment details on your page and pass on the same to Razorpay via a backend API call. 

Given below are some of the best practices to be followed for a smoother integration and payment experience:

1. We recommended using [S2S JSON API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md) for S2S integration.
2. For redirect flow, you must open the HTML provided as part of the API response, as is from the customer's browser.
3. You should pass the actual `user_agent`, `customer IP` and `referrer` to avoid any failures due to risk.
4. You should integrate [webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) to get a callback via a server to server call.
5. Integrate the [Payments Rainy Day kit](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/rainy-day.md) to tackle payment exceptions such as late authorized payments, payment downtimes and errors.
