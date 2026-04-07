---
title: Payment Gateway | Web Integration - Troubleshooting & FAQs
heading: Troubleshooting & FAQs
description: Troubleshoot common errors and find answers to frequently asked questions related to Razorpay Web Standard Checkout Integration.
---

# Troubleshooting & FAQs

### 1. Why are my customer payments being automatically refunded?

         Payments made without an `order_id` cannot be captured and are automatically refunded. Create an order using the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#11-create-an-order-in-server) before initiating payments.
         ```
        

    
### 2. What can cause an overflow issue on an HTML page, and how can I resolve it?

         Overflow issue can occur if the viewport meta tag is not present in your code. Check if the meta tag is added. If not, add the following line.

         ```html: View Port Meta Tag
         
         ```
        

    
### 3. Is a timeout applicable on transactions?

         Transaction timeout is applicable only when your customer attempts the payment. It times outs between 3 to 15 minutes. 

         The customer is redirected to the checkout if a payment fails due to timeout.
        

    
### 4. Can I track the status of the checkout modal?

         Yes, you can track the status of the checkout modal. You can do this by passing a modal object with `ondismiss: function(){}` as `options`. The `ondismiss` function is called when the modal is closed by the user.

         ```javascript: Javascript
         var options = {
             "key": "", // Enter the Key ID generated from the Dashboard
             "amount": "29935",
             "name": "Acme Corp",
             "description": "A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami",
             "image": "http://example.com/your_logo.jpg",
             "handler": function (response){
                 alert(response.razorpay_payment_id);
             },
             /**
               * You can track the modal lifecycle by * adding the below code in your options
               */
             "modal": {
                 "ondismiss": function(){
                     console.log('Checkout form closed');
                 }
             }
         };
         var rzp1 = new Razorpay(options);
         ```
         You can utilise the `handler` function called on every successful transaction for tracking payment completion.
        

    
### 5. What is the difference between webhooks and callback URL?

         You can use Callback URL and webhook to get the status of the transaction for a payment source. 

         
         Particulars | Webhooks | Callback URL
         ---
         About | Webhooks allow you to build or set up integrations that subscribe to certain events on Razorpay APIs. When one of those events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. 
 Know more about [webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md). | A callback URL is an address that a server provides, and any computer in the Internet/private network can POST data to it. For Razorpay integrations, callback URL is the address at which Razorpay should send the transaction response. You can pass the URL in the `https://` format in the `callback_url` request parameter. Know more about [callback URL](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/callback-url.md).
         ---
         When to use | Use webhooks to receive real-time notifications when specific events occur. For example, receive notifications upon payment failure.| Use callback URL to redirect your customers to a particular page. For example: 
 - You can send customers to a payment success page after successful payment. This page will receive payment details such as the payment id.
- The Razorpay Checkout pop-up page does not appear in certain browsers, for example, on Facebook and Instagram browsers. In such cases, you can use the callback URL to redirect customers from your Facebook/Instagram page to another page where the Razorpay Checkout appears. Customers can complete the payments on this redirected page.

         
        

    
### 6. How do I resolve a 500 internal server error?

         Multiple factors can cause a 500 internal server error. Ensure that the required features are enabled on your account. Additionally, verify that you are calling the API correctly. If the issue is still not resolved, contact our [Support team](https://razorpay.com/support/#request).
        

    
### 7. Is Razorpay Checkout supported on Internet Explorer?

         No, Razorpay Checkout is not supported on the Internet Explorer browser.
        

    
### 8. How can I enable customer information autofill at checkout?

         Customer information autofill is enabled by default for all businesses using Razorpay Standard Checkout. It prefills details like contact information, addresses and more, making the checkout process faster and smoother for your customers.
        

    
### 9. Can customers edit pre-filled information on checkout?

         Yes, customers can edit all pre-filled information based on their requirement.
        

    
### 10. Is the autofill feature supported on all platforms? 

         No, autofill is supported only on Instagram, Facebook and iOS browsers.
        

    
### 11. Can I accept payments through my Instagram page even if I do not have a website?

         Yes, you can accept payments without a website using Razorpay's no-code products such as [Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md), [Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages.md) or [Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button.md), as Razorpay does not offer a direct Instagram integration.
        

    
### 12. Are language-based SDKs available?

         Yes, language-based SDKs are available [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/server-integration.md).
        

    
### 13. The  netbanking    bank page is not opening on the Firefox browser. How to resolve this?

         Mozilla Firefox users may not be able to open the bank page while making a netbanking payment on your checkout. This issue may be due to a browser setting that blocks the webpage from opening a pop-up page.

         Your customers can follow these steps to unblock the pop-up page:
         - At **page level**: Modify settings on the bank page.
         - At **browser level**: Modify Firefox browser's settings.
         
         ### Page Level

         Modify the settings on your bank page. Follow these steps:
         1. Open Mozilla Firefox.
         2. Navigate to **Tools** → **Page Info** → **Permissions**  
         3. Set **Open Pop-up Windows** to Allow.
    
         ### Browser Level

         Modify the settings of your Firefox browser. Follow these steps:
         1. Open Mozilla Firefox.
         2. Navigate to **Preferences** → **Privacy & Security** → **Permissions**.
         3. Disable the **Block pop-up windows** option.
        

    
### 14. Which payment methods appear on Instagram/Facebook browsers?

         Payment methods like [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/upi-intent.md) and [Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) will appear on Instagram/Facebook browsers. These browsers do not support any other payment method that opens on a pop-up page.
        

    
### 15. Can I enable UPI Intent in WebView on my app?

         Yes, you can enable UPI Intent in WebView on your:
         - [Android app](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/upi-intent-android.md)  
         - [iOS app](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/upi-intent-ios.md)
        

    
### 16. While using Razorpay UPI Intent, my customers are encountering this error, "Safari cannot open the page because the address is invalid." How can I resolve this?

         To resolve the error, request your customers to refresh the page and clear the browser cache.
        

    
### 17. How can I accept payments on my Android or iOS apps without integrating with the native SDKs?

         If you want to accept payments on your Android or iOS apps without integrating with our native SDKs, you can reuse your Standard Integration code. This approach opens the checkout form in a WebView within your mobile app. Know more about [Webview for Mobile Apps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/webview.md).
        

    
### 18. How do I accept international payments on checkout?

         You need to enable the international payments feature on your Razorpay account. Refer to [international payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md).
        

    
### 19. What languages are supported on Razorpay checkout?

         Razorpay checkout fields support multiple languages, with English as the default. Customers can also choose Hindi, Marathi, Gujarati, Telugu, Tamil, Bengali and Kannada. Know more about [checkout in local languages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/features.md).
        

    
### 20. Can I switch between Standard Integration and Quick Integration?

         Yes, it is possible to easily switch from one integration method to another. If you were earlier using Standard Integration, you can switch to using [Quick Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/quick-integration.md).

         - This is possible because the Standard Integration searches for the `data-key` field inside the `` tag, that when found, switches to automatic mode. 
         - It also creates a button alongside the `` tag and attaches its 'onclick event handler' (created internally) to the `.open` method of the Razorpay object.
