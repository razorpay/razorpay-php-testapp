---
title: Integration Steps
description: Steps to integrate with Razorpay WebView for Mobile Apps.
---

# Integration Steps

## Create a WebView on Mobile App

#### Code Sample

```JavaScript: JavaScript
var options = {
  ... // existing options
  callback_url: 'https://your-server/callback_url',
  redirect: true
}
```

The script that `callback_url` points to should to handle incoming `POST` requests. 

For a successful payment, the callback URL will have **razorpay_payment_id**. In addition, **razorpay_order_id** and **razorpay_signature** will be returned in the request body, provided your server-side has been integrated with Orders API. Know more about [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> You can set query parameters with `callback_url` to map it with entities at your end. For example, following is a valid callback URL: `https://your-site.com/callback?cart_id=12345`
> 

#### Failed Payment

Parameter | Present? | Example
---
`error` | `Array` Always present |
---
`error [code]` | Always present | BAD_REQUEST_ERROR
---
`error [description]` | Always present | Payment failed due to incorrect card number
---
`error [field]`| Present if payment fails due to basic validation error | card [number]

## Hand Over Payment Result to Native App

If you are loading the checkout form to WebView on your native mobile app without using the Razorpay SDK, provide a `callback_url` in the Razorpay Checkout parameters. After a successful payment, a redirect is made to the specified URL. You can enable the handover control from the page loaded at **callback_url** to your native app code.

## Payment Callbacks to Android Native Code

The webpage will be loaded into a WebView class. To communicate anything from the webpage loaded into WebView to native code, you would need to add a JavaScriptInterface to the WebView.

#### Add JavascriptInterface to WebView

```java:
webView.addJavascriptInterface("PaymentInterface", new PaymentInterface());
```

```java:
class PaymentInterface{
  @JavascriptInterface
  public void success(String data){
  }

  @JavascriptInterface
  public void error(String data){
  }
}
```

The JavaScript code loaded into WebView calls the native methods of **PaymentInterface** class, **PaymentInterface.success()** and **PaymentInterface.error()**.

## Enable Cookies

You should enable cookies on your app to access features such as **saved cards**. Know more about [saved cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-features.md#flash-checkout). 

## Code to Enable Cookies

Add the following code to your WebView to enable cookies.

```java: Enable Cookies
if (android.os.Build.VERSION.SDK_INT >= 21) {   
     CookieManager.getInstance().setAcceptThirdPartyCookies(mWebView, true);
} else {
     CookieManager.getInstance().setAcceptCookie(true);
}
```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Use `setAcceptThirdPartyCookies` for API level 21 and above.
> 

## Payment Callbacks to iOS Native Code

**WKWebView** framework is used to implement a bridge between JavaScript and the native code as **UIWebView** does not provide this functionality. The bridge is added by passing an instance of **WKScriptMessageHandler** and a string (which is the name of the bridge).

```Swift: swift
webView.configuration.userContentController.add(self, name: "PaymentJSBridge")
```
The instance of WKScriptMessageHandler which is passed needs to implement a function userContentController(WKUserContentController, WKScriptMessage). Once the function is implemented, the data is sent by JavaScript and can be retrieved inside the function.

```Swift: swift
public func userContentController(_ userContentController: WKUserContentController, didReceive message: WKScriptMessage) {
  if let messageBody = message.body as? [AnyHashable:Any]{

  }
}
```

At the JavaScript end, data is sent to the iOS native code by evaluating the following JavaScript.

```JavaScript: JavaScript
window.webkit.messageHandlers.PaymentJSBridge.postMessage(messageBody)
```

**Handy Tips**

Only the function `userContentController` can be called from the JavaScript by evaluating the above-mentioned script. The `messageBody` passed by the script must contain the appropriate data to control the flow of the native code.
