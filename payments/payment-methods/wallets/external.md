---
title: List of External Wallets
description: Accept payments through external wallets at Razorpay Checkout.
---

# List of External Wallets

You can list external wallets (wallets not supported by Razorpay) on our Checkout form. Razorpay does not process payments for external wallets but hands over the control to you along with any other customer data entered in the checkout form.

> **INFO**
>
> 
> **Handy Tips**
> 
> You must have a separate integration with the external wallet of choice. Razorpay passes the customer data, such as contact and email, entered in the Checkout to the handler object. You must pass this data to the external wallet integration.
> 

If you are using any of the following external wallets, you can make them appear in your checkout form. You must pass the required string value as an array against `external wallets`:

Wallet Names | String Values
---
Paytm | paytm
---
Citrus Wallet | citrus
---
Amazon Pay | amazonpay

You can list these wallets on any of the following platforms:

- **Web application**
- **Android**
- **iOS**

> **INFO**
>
> 
> **Handy Tips**
> 
> The wallet payment method can be used for a purchase amount of up to ₹20000 (2000000 in paise).
> 

## Web Application

To list external wallet on your web application, you need to first integrate our [checkout form](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#checkout-options). After you integrate, follow the steps given below:

1. Add a key `external` to `checkout.js` options.

2. Set `wallets` with wallet name array in `external` as the first parameter.

    ```javascript: JavaScript
    external: {
      wallets: ['paytm']
    }
    ```
3. Set `handler` with a callback function in `external` as second parameter. This is where you receive a callback from which you can handle external wallets based on the parameters:

  ```javascript: JavaScript
  external: {
    wallets: ['paytm'],
    handler: function (data) {
      console.log(data)
    }
  }
  ```

The external wallet sent in options will be shown in the wallets section.

If the customer selects external wallet and clicks **Submit**, our `checkout.js` library will return the control to you in the `external.handler` method. You will get the selected wallet name as an argument. You will now have to handle the external payment method.

## Android

To list external wallets on your Android app, you need to first integrate our [Android checkout SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/standard.md). After you integrate our Android checkout, follow the steps given below:

1. Implement `ExternalWalletListener` in your activity.

    ```
    public class PaymentActivity extends Activity implements PaymentResultListener, ExternalWalletListener {
        //..

        @Override
    	public void onExternalWalletSelected(String walletName, PaymentData paymentData){
			// add your logic here to handle external wallet payments like
			if(walletName.equals("paytm"){
			    //handle paytm payment
			}

    	}

    }
    ```

2. Send external wallet information to checkout in options. You can send it in the following way:

    ```
    JSONArray wallets = new JSONArray();
    wallets.put("paytm");
    JSONObject externals = new JSONObject();
    externals.put("wallets", wallets);
    options.put("external", externals);
    ```
The external wallet sent in options will be shown in the wallets section. If the customer selects an external wallet and submits it, our SDK will return control to you in the `onExternalWalletSelected` method. You will get the selected wallet name as an argument. You will now have to handle your payment.

## iOS

To list external wallet on your iOS app, you need to first set up your framework. Know more about[Razorpay iOS Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/standard.md). Perform the following steps:

1. Implement `ExternalWalletSelectionProtocol` in your view controller.

    ```ObjC
    @interface ViewController ()  {
    ```

2. Set `ExternalWalletSelectionDelegate` to get callback in delegate method.

    ```ObjC
    [razorpay setExternalWalletSelectionDelegate:self];
    ```

3. Send external wallet information to Checkout in options. You can send it in the following way:

    ```ObjC
    NSDictionary *options = @{
    @"amount" : @"20000",
    @"currency" : @"INR",
    @"description" : @"A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami",
    @"image" : http://example.com/your_logo.jpg,
    @"name" : @"Gaurav Kumar",
    @"external" : @{@"wallets" : @[ @"paytm" ]},
    @"prefill" :
        @{@"email" : @"gaurav.kumar@example.com", @"contact" : @"9000090000"},
    @"theme" : @{@"color" : @"#3594E2"}
    };
    ```

4. Implement `onExternalWalletSelected:WithPaymentData:` delegate method to receive callback and get control back.

The external wallet sent in options will be shown in the wallets section. If the customer selects an external wallet and clicks **Submit**, our SDK will return control to you in the `onExternalWalletSelected` method. You will get the selected wallet name as an argument. You will now have to handle the external payment method.
