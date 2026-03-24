---
title: Payment Methods
description: Integrate different payment methods in Razorpay Android Custom SDK Checkout.
---

# Payment Methods

The Razorpay Android Custom SDK lets you integrate the supported payment methods on your Android app's Checkout form.

## Fetch Payment Methods

Use the [Fetch Payment Methods API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/build-integration.md#14-fetch-payment-methods) to fetch the payment methods available for your account.

Below are the sample payloads for each payment method.

## Bank Transfer

This payment method allows you to display your Customer Identifier details on checkout. Your customers can make online bank transfers to this account.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

There are no specific request parameters to be passed. Instead, you must pass the `fetchVirtualAccount` method for your Customer Identifier to get created and the details to appear on the checkout. Know more about [integrating bank transfer with Custom Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer/custom-integration.md).

## Debit and Credit Card

For Card payments, `method` should be specified as `card`. Other required fields:

- `card[name]`
- `card[number]`
- `card[cvv]`
- `card[expiry_month]`
- `card[expiry_year]`

#### Sample Code

The sample code shown below allows the checkout to accept a card payment of .

```java: Java
JSONObject data = new JSONObject();
data.put("amount", 29935);
data.put("currency", "");
data.put("order_id", "order_DgZ26rHjbzLLY2");//sample order_id. Generate orders using Orders API
data.put("email", "");
data.put("contact", "");
data.put("method", "card");
data.put("card[name]", "");
data.put("card[number]", "");
data.put("card[expiry_month]", "12");
data.put("card[expiry_year]", "30");
data.put("card[cvv]", "100");
```kotlin: Kotlin
val data = JSONObject()
data.put("amount", 29935)
data.put("amount", "")
data.put("order_id", "order_DgZ26rHjbzLLY2") //sample order_id. Generate orders using Orders API
data.put("email", "")
data.put("contact", "")
data.put("method", "card")
data.put("card[name]", "")
data.put("card[number]", "")
data.put("card[expiry_month]", "12")
data.put("card[expiry_year]", "30")
data.put("card[cvv]", "100")
```

Check the [list of supported cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-cards).

If you want to securely store customer's card details as network tokens, know about [Saved Cards feature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-cards.md).

## EMI on Debit and Credit Cards

For EMI, `method` should be specified as `emi`. Add an additional field, `emi_duration`, corresponding to the number of months for EMI. After a customer selects the desired plan, pass the corresponding value in the `emi_duration` field.

#### Sample Code

The sample code below allows checkout to accept a card payment of ₹3999.35:

```java: Java
JSONObject data = new JSONObject();
data.put("amount", 399935);
data.put("order_id", "order_DgZ26rHjbzLLY2");//sample order_id. Generate orders using Orders API
data.put("email", "");
data.put("contact", "");
data.put("method", "emi");
data.put("emi_duration", 2); //defines the number of months for the EMI.
data.put("card[name]", "");
data.put("card[number]", "");
data.put("card[expiry_month]", "12");
data.put("card[expiry_year]", "30");
data.put("card[cvv]", "100");
```kotlin: Kotlin
val data = JSONObject()
data.put("amount", 399935)
data.put("order_id", "order_DgZ26rHjbzLLY2") //sample order_id. Generate orders using Orders API
data.put("email", "")
data.put("contact", "")
data.put("method", "emi")
data.put("emi_duration", 2) //defines the number of months for the EMI.
data.put("card[name]", "")
data.put("card[number]", "")
data.put("card[expiry_month]", "12")
data.put("card[expiry_year]", "30")
data.put("card[cvv]", "100")
```

Check the list of supported [debit card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/debit-card-emi.md#supported-banks-for-debit-card-emis) and [credit card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/credit-card-emi.md#supported-payment-partners) EMI providers.

## Cardless EMI

Cardless EMI is a payment method that allows customers to convert their payment amount to EMIs. The customer does not require a debit or credit card. They can make payments via credits approved by the supported Cardless EMI payment provider.
For Cardless EMI, `method` should be specified as `cardless_emi` and an additional field `provider` must specify the provider with its respective provider code.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> The customer should be registered with the cardless EMI payment provider before making the payment.
> 

#### Sample Code

The sample code below allows checkout to accept a card payment of ₹5999.35:

```java: Java
JSONObject payload = new JSONObject("{\"currency\":\"\"}");
payload.put("amount", 599935);
payload.put("contact", "");
payload.put("order_id", "order_9A33XWu170gUtm");
payload.put("email", "");
payload.put("method", "cardless_emi");
payload.put("provider", "walnut369");
```kotlin: Kotlin
val payload = JSONObject("{\"currency\":\"\"}")
payload.put("amount", 599935)
payload.put("contact", "")
payload.put("order_id", "order_9A33XWu170gUtm")
payload.put("email", "")
payload.put("method", "cardless_emi")
payload.put("provider", "walnut369")
```

Check the [list of supported Cardless EMI providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/cardless-emi.md#supported-payment-partners).

## Netbanking

For Netbanking, `method` should be specified as `netbanking` and an additional field `bank` must specify the bank with its respective bank code.
#### Sample Code

The sample code shown below allows the checkout to perform a netbanking transaction for a payment of ₹299.35:

```java: Java
JSONObject data = new JSONObject();
data.put("amount", 29935);
data.put("order_id", "order_DgZ26rHjbzLLY2");//sample order_id. Generate orders using Orders API
data.put("email", "");
data.put("contact", "");
data.put("method", "netbanking");
data.put("bank", "SBIN");
```kotlin: Kotlin
val data = JSONObject()
data.put("amount", 29935)
data.put("order_id", "order_DgZ26rHjbzLLY2") //sample order_id. Generate orders using Orders API
data.put("email", "")
data.put("contact", "")
data.put("method", "netbanking")
data.put("bank", "SBIN")
```

Check the [list of supported banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md#supported-banks).

## Pay Later

You can enable your customers to make payments using the **Pay Later** service offered by various third-party providers.
For pay later, `method` should be specified as `paylater` and an additional field `provider` must specify the provider with its respective provider code.

#### Sample Code

Use the sample code given below:

```java: Java
JSONObject payload = new JSONObject("{\"currency\":\"\"}");
payload.put("amount",5000);
payload.put("contact","");
payload.put("order_id","order_9A33XWu170gUtm");
payload.put("email", "");
payload.put("method", "paylater");
payload.put("provider", "lazypay");
```kotlin: Kotlin
val payload = JSONObject("{\"currency\":\"\"}")
payload.put("amount", 5000)
payload.put("contact", "")
payload.put("order_id", "order_9A33XWu170gUtm")
payload.put("email", "")
payload.put("method", "paylater")
payload.put("provider", "lazypay")
```

Check the [list of Pay Later providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md#providers).

## Wallet

For Wallet payments, `method` should be specified as `wallet`.

#### Sample Code

The sample code shown below allows the checkout to perform a wallet transaction for a payment of  :

```java: Java
JSONObject data = new JSONObject();
data.put("amount", 29935);
data.put("order_id", "order_DgZ26rHjbzLLY2");//sample order_id. Generate orders using Orders API
data.put("email", "");
data.put("contact", "");
data.put("method", "wallet");
data.put("wallet", "mobikwik");
```kotlin: Kotlin
val data = JSONObject()
data.put("amount", 29935)
data.put("order_id", "order_DgZ26rHjbzLLY2") //sample order_id. Generate orders using Orders API
data.put("email", "")
data.put("contact", "")
data.put("method", "wallet")
data.put("wallet", "mobikwik")
```

Check the list [Wallets supported by Razorpay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md#supported-wallets).

## UPI

For UPI payments, `method` should be specified as `upi`. The SDK supports two flows:

1. Intent
2. Collect

@include payment-methods/upi-collect-deprecated/custom

#### Intent Flow

> **INFO**
>
> 
> **Handy Tips**
> 
> If your application targetSdkVersion is 30 or above, add the following code in your app's manifest file to support the UPI Intent flow.
> 
> ```xml: AndroidManifest.xml
> 
>     
>     
>     
> 
>               Specific intents you query for,
>          eg: for a custom share UI
>     -->
>     
>         
>     
> 
> ```
> 

In Intent Flow, the SDK invokes a UPI intent, which is handled by the UPI apps installed on the Android device.

To implement this flow:

1. Fetch a list of apps on the customer's device that support UPI payments and Autopay using the sample codes given below:

    - Fetch list of UPI Supported Apps

        ```java: Java
        Razorpay.getAppsWhichSupportUpi(this, new RzpUpiSupportedAppsCallback() {
            @Override
            public void onReceiveUpiSupportedApps(List list) {
                // List of upi supported app
            }
        });
        ```kotlin: Kotlin
        Razorpay.getAppsWhichSupportUpi(this) { appList->{ // List of upi supported app
            }
        }
        ```

    - Fetch list of UPI Autopay Supported Apps

        ```java: Java
        Razorpay.getAppsWhichSupportAutopayIntent(this, new RzpUpiSupportedAppsCallback() {
            @Override
            public void onReceiveUpiSupportedApps(List applicationDetailsList) {
            }
        });
        ```kotlin: Kotlin
        Razorpay.getAppsWhichSupportAutopayIntent(this) { appList->{
            //List of autopay supported Apps
            }
        }
        ```

2. Override the `onActivityResult()` of your activity and pass the same to our SDK:

    ```java: Java
    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data){
    super.onActivityResult(requestCode, resultCode, data);
        if(razorpay!=null){
        razorpay.onActivityResult(requestCode,resultCode,data);
        }
    }
    ```kotlin: Kotlin
    override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
        super.onActivityResult(requestCode, resultCode, data)
        if (razorpay != null) {
            razorpay.onActivityResult(requestCode, resultCode, data)
        }
    }
    ```

3. Invoke the UPI and UPI Autopay Intent with the sample codes given below. This will enable the customer to select the desired application.

    - Invoke UPI Intent

        ```java: Java
        JSONObject data = new JSONObject();
        data.put("amount", 29935);
        data.put("order_id", "order_DgZ26rHjbzLLY2");//sample order_id. Generate orders using Orders API
        data.put("email", "");
        data.put("contact", "");
        data.put("method", "upi");
        data.put("_[flow]", "intent");
        data.put("upi_app_package_name", "in.org.npci.upiapp"); //For BHIM app
        ```kotlin: Kotlin
        val data = JSONObject()
        data.put("amount", 29935)
        data.put("order_id", "order_DgZ26rHjbzLLY2") //sample order_id. Generate orders using Orders API
        data.put("email", "")
        data.put("contact", "")
        data.put("method", "upi")
        data.put("_[flow]", "intent")
        data.put("upi_app_package_name", "in.org.npci.upiapp") //For BHIM app
        ```

    - Invoke UPI Autopay Intent (Default)

        ```java: Java
        JSONObject data = new JSONObject("{currency: ''}");
        data.put("amount", "10000");
        data.put("contact", "");
        data.put("email", "");
        data.put("order_id", "order_DgZ26rHjbzLLY2");// mandatory for UPI Autopay payments
        data.put("customer_id", "cust_805c8oBQdBGPwS");// mandatory for UPI Autopay payments
        data.put("recurring", "1");
        data.put("description","Credits towards consultation");
        data.put("method", "upi");
        data.put("_[flow]", "intent");
        data.put("upi_app_package_name","com.google.android.apps.nbu.paisa.user"); // pass package name that is returned in getAppsWhichSupportUpi and/or getAppsWhichSupportUpiAutopay
        ```kotlin: Kotlin
        val data = JSONObject("{currency: ''}")
        data.put("amount", "10000")
        data.put("contact", "")
        data.put("email", "")
        data.put("order_id", "order_DgZ26rHjbzLLY2") // mandatory for UPI Autopay payments
        data.put("customer_id", "cust_805c8oBQdBGPwS") // mandatory for UPI Autopay payments
        data.put("recurring", "1")
        data.put("description", "Credits towards consultation")
        data.put("method", "upi")
        data.put("_[flow]", "intent")
        data.put("upi_app_package_name", "com.google.android.apps.nbu.paisa.user") // pass package name that is returned in getAppsWhichSupportUpi and/or getAppsWhichSupportUpiAutopay
        ```

    - Preferred Payload for Recurring: In the sample code below, `recurring` is passed as `preferred`. It initiates a flow in SDK where, if a selected app supports Autopay payments, the payment passes via the Autopay payment route. If it does not, then it passes via the one-time payment route.

        ```java: Java 
        JSONObject data = new JSONObject("{currency: ''}");
        data.put("amount", "10000");
        data.put("contact", "");
        data.put("email", "");
        data.put("order_id", "order_DgZ26rHjbzLLY2");// mandatory for UPI Autopay payments
        data.put("customer_id", "cust_805c8oBQdBGPwS");// mandatory for UPI Autopay payments
        data.put("recurring", "preferred");
        data.put("description","Credits towards consultation");
        data.put("method", "upi");
        data.put("_[flow]", "intent");
        data.put("upi_app_package_name","com.google.android.apps.nbu.paisa.user"); // pass package name that is returned in getAppsWhichSupportUpi and/or getAppsWhichSupportUpiAutopay
        ```kotlin: Kotlin
        val data = JSONObject("{currency: ''}")
        data.put("amount", "10000")
        data.put("contact", "")
        data.put("email", "")
        data.put("order_id", "order_DgZ26rHjbzLLY2") // mandatory for UPI Autopay payments
        data.put("customer_id", "cust_805c8oBQdBGPwS") // mandatory for UPI Autopay payments
        data.put("recurring", "preferred")
        data.put("description", "Credits towards consultation")
        data.put("method", "upi")
        data.put("_[flow]", "intent")
        data.put("upi_app_package_name", "com.google.android.apps.nbu.paisa.user") // pass package name that is returned in getAppsWhichSupportUpi and/or getAppsWhichSupportUpiAutopay
        ```

Check the complete list of [UPI supported apps and their package names](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/supported-apps.md).

#### Customise Order of Apps

In the Intent Flow, you can customise the order in which UPI apps appear at the Checkout. There are two sections within the app: **Preferred Apps** and **Other Apps**.

To define the order in which apps appear under these sections of the app chooser, two lists that contain the application package names must be passed to the SDK within `options`.

1. Preferred apps list
2. Other apps list

**PREFERRED APPS Section**

This section displays the list of applications specified using the key `preferred_apps_order` within options. If no application exists for this key, this section is not displayed.

**OTHER APPS Section**

The list of applications specified using the key `other_apps_order` within options is displayed under this section. Any unspecified app (which supports UPI intent) appears subsequent to the list passed in the options.

#### Sample Code

In the sample code below, **BHIM** (in.org.npci.upiapp) is passed in the **preferred apps list** and **Google Pay**(com.google.android.apps.nbu.paisa.user) in *other apps list*. As a result, *BHIM* is shown in the **PREFERRED APPS SECTION**. **Google Pay** is shown at the top in the **OTHER APPS SECTION** followed by other apps present in the device:

```java: Java
JSONArray prefAppsJArray = new JSONArray();
prefAppsJArray.put("in.org.npci.upiapp");

JSONArray otherAppsJArray = new JSONArray();
otherAppsJArray.put("com.google.android.apps.nbu.paisa.user");

payload.put("method", "upi");
payload.put("_[flow]", "intent");
payload.put("preferred_apps_order", prefAppsJArray);
payload.put("other_apps_order", jArray);
```

#### Collect Flow

Customers enter their `vpa` or [phone number](#upi-payments-using-phone-number) on your UI and complete the payments on their respective UPI apps in collect flow. 

You can now pass the `vpa` parameter in the `upi` array as shown below.

#### Sample Code

The sample code below sends a collect request to `gaurav.kumar@exampleupi` handle.

```java: Java
JSONObject data = new JSONObject();
data.put("amount", 29935);
data.put("order_id", "order_DgZ26rHjbzLLY2");//sample order_id. Generate orders using Orders API
data.put("email", "");
data.put("contact", "");
data.put("method", "upi");
data.put("vpa", "gaurav.kumar@exampleupi");
```kotlin: Kotlin
val data = JSONObject()
data.put("amount", 29935)
data.put("order_id", "order_DgZ26rHjbzLLY2") //sample order_id. Generate orders using Orders API
data.put("email", "")
data.put("contact", "")
data.put("method", "upi")
data.put("vpa", "gaurav.kumar@exampleupi")
```

  
### UPI Payments Using Phone Number

     You can accept UPI payments using phone number for the collect flow. Follow the steps given below: 

     1. You must collect the customer's phone number from your end.
     2. Check if any `vpa` is associated with the given number and get the `vpa_token` for that number using the sample code given below:
        ```java: Java
        razorpay.isValidVpa("", new ValidateVpaCallback() {
            @Override
            public void onResponse(JSONObject response) {
                if (response.has("error")) {
                    // Error: no VPA associated with the given number
                } else if (response.has("success")) {
                    // VPA Validation Successful
                    // Get and store response.vpa_token for initiating payment
                    // You will get response.masked_vpa in this response which you can show to the end user
                }
            }

            @Override
            public void onFailure() {
                // Called in cases where the number is empty or when the device is not connected to data to make the validation
            }
        });
        ```kotlin: Kotlin
        razorpay.isValidVpa("", object : ValidateVpaCallback {
            override fun onResponse(response: JSONObject?) {
                response?.let {
                    if (it.has("error")) {
                        // Error: no VPA associated with the given number
                    } else if (it.has("success")) {
                        // VPA Validation Successful
                        // Get and store response.vpa_token for initiating payment
                        // You will get response.masked_vpa in this response which you can show to the end user
                    }
                }
            }

            override fun onFailure() {
                // Called in cases where the number is empty or when the device is not connected to data to make the validation
            }
        })
        ```
     3. Pass the `vpa_token` parameter in the `upi` array as shown below:
        ```java: Java
        JSONObject data = new JSONObject();
        data.put("amount", 29935);
        data.put("order_id", "order_DgZ26rHjbzXXXX");//sample order_id. Generate orders using Orders API
        data.put("email", "");
        data.put("contact", "");
        data.put("method", "upi");
        data.put("vpa_token", "f731951149df8903d374b117f921ab41");
        ```kotlin: Kotlin
        val data = JSONObject()
        data.put("amount", 29935)
        data.put("order_id", "order_DgZ26rHjbzXXXX") //sample order_id. Generate orders using Orders API
        data.put("email", "")
        data.put("contact", "")
        data.put("method", "upi")
        data.put("vpa_token", "f731951149df8903d374b117f921ab41")
        ```
    

#### Turbo UPI

Make UPI payments a faster, 2-step experience for your customers with Razorpay's Turbo UPI SDK.

1. [Turbo UPI Headless Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui.md)
2. [Turbo UPI UI Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-ui.md)

Know more about the [Customer Onboarding](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi.md).

## CRED

@include payment-methods/cred/android-custom

@include payment-methods/upi-collect-deprecated/custom
