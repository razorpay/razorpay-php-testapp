---
title: UPI Intent in WebView - Android
description: Enable UPI Intent in WebView on your Android app.
---

# UPI Intent in WebView - Android

Follow the steps given below to enable UPI intent in WebView on your android application:

**1.1** [Add WebView to Android App](#11-add-webview-to-android-app) 

**1.2** [Setup WebViewClient](#12-setup-webviewclient)

**1.3** [Handle Deep Links in shouldOverrideUrlLoading()](#13-handle-deep-links-in-shouldoverrideurlloading-)

**1.4** [Enable UPI Intent Support](#14-enable-upi-intent-support)

## 1.1 Add WebView to Android App

Add a WebView to the layout of your Android app. You can add the code given below to the layout XML file of your app: 

```xml

```

## 1.2 Setup WebViewClient

To setup a `WebViewClient` that handles URL requests, create a new class using the code given below extending the `MyWebViewClient` and overriding the `shouldOverrideUrlLoading()` method.

```java: Java
class MyWebViewClient extends WebViewClient {

    private Activity activity;

    public MyWebViewClient(Activity activity) {
        this.activity = activity;
    }

    /** This function is used to handle deeplink in webview */
    @Override
    public Boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
        return true;
    }

}

// Use CustomWebviewClient created above in the webview object.
class MainActivity extends Activity {

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        WebView webView = findViewById(R.id.webview);
        webView.setWebViewClient(new MyWebViewClient(MainActivity.this));
    }

}

```kotlin: Kotlin
class MyWebViewClient(private val activity: Activity) : WebViewClient() {
    override fun onPageFinished(view: WebView?, url: String?) {
        super.onPageFinished(view, url)
    }

    /** This function is used to handle deeplink in webview */
    override fun shouldOverrideUrlLoading(view: WebView?, request: WebResourceRequest?): Boolean {
        return true
    }
}

// Use CustomWebviewClient created above in the WebView object.
class MainActivity : Activity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val webView = findViewById(R.id.webview)
        webView.setWebViewClient(MyWebViewClient(this@MainActivity))
    }
}
```

## 1.3 Handle Deep Links in shouldOverrideUrlLoading()

To handle deep links in the `shouldOverrideUrlLoading()` method, check if the URL is a deep link and then launch the corresponding activity using the intent class. In this example, we are checking if the URL starts with `http://` or `https://`. If not, then we create a new intent with `ACTION_VIEW` and URL as the data and start the activity with this intent.

```java: Java
import android.app.Activity;
import android.content.ActivityNotFoundException;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.webkit.WebResourceRequest;
import android.webkit.WebView;
import android.webkit.WebViewClient;

class MyWebViewClient extends WebViewClient {

    @Override
    public void onPageFinished(WebView view, String url) {
        super.onPageFinished(view, url);
    }

    /** This function is used to handle deeplink in webview */
    @Override
    public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
        String url = request.getUrl().toString();
        if (!url.startsWith("https") || !url.startsWith("http")) {
            try {
                Intent i = new Intent(Intent.ACTION_VIEW);
                i.setData(Uri.parse(request.getUrl().toString()));
                activity.startActivityForResult(i, 2001);
            } catch (ActivityNotFoundException ignored) {

            }
        }
        return true;
    }
}

```kotlin: Kotlin
import android.app.Activity
import android.content.ActivityNotFoundException
import android.content.Intent
import android.graphics.Bitmap
import android.net.Uri
import android.webkit.WebResourceRequest
import android.webkit.WebView
import android.webkit.WebViewClient

class MyWebViewClient(private val activity: Activity): WebViewClient() {

   override fun onPageFinished(view: WebView?, url: String?) {
       super.onPageFinished(view, url)

   }

    /** This function is used to handle deeplink in webview */
    override fun shouldOverrideUrlLoading(view: WebView?, request: WebResourceRequest?): Boolean {
       val url = request!!.url.toString()
       if (!url.startsWith("https") || !url.startsWith("http")){
           try {
               val i = Intent(Intent.ACTION_VIEW)
               i.setData(Uri.parse(request.url.toString()))
               activity.startActivityForResult(i, 2001)
           } catch (e: ActivityNotFoundException) {

           }
       }
       return true

   }

}
```

## 1.4 Enable UPI Intent Support

To enable and test UPI intent in WebView-based Checkout:
1. Open your website integrated with custom checkout.
2. Pass `webview_intent: true` parameter in the [payload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration.md#132-instantiate-custom-checkout) sent to checkout to enable UPI intent support.
3. Ensure that UPI intent is triggered when the payment request is made.

> **WARN**
>
> 
> **Watch Out!**
> 
> By default, the top PSP apps appear on the customer's mobile irrespective of the installation status of the UPI apps.
> 

## List of Supported UPI Intent Apps

Given below is the list of supported UPI apps for Mobile Web.

- `gpay` 
- `phonepe`
- `paytm`
- `any`

The `any` option triggers the other UPI payment apps installed on your customer's mobile.
