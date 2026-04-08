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
> 
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
data.put("email", "gaurav.kumar@example.com");
data.put("contact", "+919876543210");
data.put("method", "card");
data.put("card[name]", "Gaurav Kumar");
data.put("card[number]", "4628 9499 7226 2986");
data.put("card[expiry_month]", "12");
data.put("card[expiry_year]", "30");
data.put("card[cvv]", "100");
```kotlin: Kotlin
val data = JSONObject()
data.put("amount", 29935)
data.put("amount", "")
data.put("order_id", "order_DgZ26rHjbzLLY2") //sample order_id. Generate orders using Orders API
data.put("email", "gaurav.kumar@example.com")
data.put("contact", "+919876543210")
data.put("method", "card")
data.put("card[name]", "Gaurav Kumar")
data.put("card[number]", "4628 9499 7226 2986")
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
data.put("email", "gaurav.kumar@example.com");
data.put("contact", "+919876543210");
data.put("method", "emi");
data.put("emi_duration", 2); //defines the number of months for the EMI.
data.put("card[name]", "Gaurav Kumar");
data.put("card[number]", "4628 9499 7226 2986");
data.put("card[expiry_month]", "12");
data.put("card[expiry_year]", "30");
data.put("card[cvv]", "100");
```kotlin: Kotlin
val data = JSONObject()
data.put("amount", 399935)
data.put("order_id", "order_DgZ26rHjbzLLY2") //sample order_id. Generate orders using Orders API
data.put("email", "gaurav.kumar@example.com")
data.put("contact", "+919876543210")
data.put("method", "emi")
data.put("emi_duration", 2) //defines the number of months for the EMI.
data.put("card[name]", "Gaurav Kumar")
data.put("card[number]", "4628 9499 7226 2986")
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
> 
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
payload.put("contact", "+919876543210");
payload.put("order_id", "order_9A33XWu170gUtm");
payload.put("email", "gaurav.kumar@example.com");
payload.put("method", "cardless_emi");
payload.put("provider", "walnut369");
```kotlin: Kotlin
val payload = JSONObject("{\"currency\":\"\"}")
payload.put("amount", 599935)
payload.put("contact", "+919876543210")
payload.put("order_id", "order_9A33XWu170gUtm")
payload.put("email", "gaurav.kumar@example.com")
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
data.put("email", "gaurav.kumar@example.com");
data.put("contact", "+919876543210");
data.put("method", "netbanking");
data.put("bank", "SBIN");
```kotlin: Kotlin
val data = JSONObject()
data.put("amount", 29935)
data.put("order_id", "order_DgZ26rHjbzLLY2") //sample order_id. Generate orders using Orders API
data.put("email", "gaurav.kumar@example.com")
data.put("contact", "+919876543210")
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
payload.put("contact","+919876543210");
payload.put("order_id","order_9A33XWu170gUtm");
payload.put("email", "gaurav.kumar@example.com");
payload.put("method", "paylater");
payload.put("provider", "lazypay");
```kotlin: Kotlin
val payload = JSONObject("{\"currency\":\"\"}")
payload.put("amount", 5000)
payload.put("contact", "+919876543210")
payload.put("order_id", "order_9A33XWu170gUtm")
payload.put("email", "gaurav.kumar@example.com")
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
data.put("email", "gaurav.kumar@example.com");
data.put("contact", "+919876543210");
data.put("method", "wallet");
data.put("wallet", "mobikwik");
```kotlin: Kotlin
val data = JSONObject()
data.put("amount", 29935)
data.put("order_id", "order_DgZ26rHjbzLLY2") //sample order_id. Generate orders using Orders API
data.put("email", "gaurav.kumar@example.com")
data.put("contact", "+919876543210")
data.put("method", "wallet")
data.put("wallet", "mobikwik")
```

Check the list [Wallets supported by Razorpay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md#supported-wallets).

## UPI

For UPI payments, `method` should be specified as `upi`. The SDK supports two flows:

1. Intent
2. Collect

> **WARN**
>
> 
> **UPI Collect Flow Deprecated**
> 
> According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026. Customers can no longer make payments or register UPI mandates by manually entering VPA/UPI id/mobile numbers.
> 
> **Exemptions:** UPI Collect will continue to be supported for:
> - MCC 6012 & 6211 (IPO and secondary market transactions).
> - iOS mobile app and mobile web transactions.
> - UPI Mandates (execute/modify/revoke operations only)
> - eRupi vouchers.
> - PACB businesses (cross-border/international payments).
> 
> **Action Required:**
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md#intent-flow). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/custom-integration.md).
> 

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
        data.put("email", "gaurav.kumar@example.com");
        data.put("contact", "+919876543210");
        data.put("method", "upi");
        data.put("_[flow]", "intent");
        data.put("upi_app_package_name", "in.org.npci.upiapp"); //For BHIM app
        ```kotlin: Kotlin
        val data = JSONObject()
        data.put("amount", 29935)
        data.put("order_id", "order_DgZ26rHjbzLLY2") //sample order_id. Generate orders using Orders API
        data.put("email", "gaurav.kumar@example.com")
        data.put("contact", "+919876543210")
        data.put("method", "upi")
        data.put("_[flow]", "intent")
        data.put("upi_app_package_name", "in.org.npci.upiapp") //For BHIM app
        ```

    - Invoke UPI Autopay Intent (Default)

        ```java: Java
        JSONObject data = new JSONObject("{currency: ''}");
        data.put("amount", "10000");
        data.put("contact", "+919876543210");
        data.put("email", "gaurav.kumar@example.com");
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
        data.put("contact", "+919876543210")
        data.put("email", "gaurav.kumar@example.com")
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
        data.put("contact", "+919876543210");
        data.put("email", "gaurav.kumar@example.com");
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
        data.put("contact", "+919876543210")
        data.put("email", "gaurav.kumar@example.com")
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
data.put("email", "gaurav.kumar@example.com");
data.put("contact", "+919876543210");
data.put("method", "upi");
data.put("vpa", "gaurav.kumar@exampleupi");
```kotlin: Kotlin
val data = JSONObject()
data.put("amount", 29935)
data.put("order_id", "order_DgZ26rHjbzLLY2") //sample order_id. Generate orders using Orders API
data.put("email", "gaurav.kumar@example.com")
data.put("contact", "+919876543210")
data.put("method", "upi")
data.put("vpa", "gaurav.kumar@exampleupi")
```

  
### UPI Payments Using Phone Number

     You can accept UPI payments using phone number for the collect flow. Follow the steps given below: 

     1. You must collect the customer's phone number from your end.
     2. Check if any `vpa` is associated with the given number and get the `vpa_token` for that number using the sample code given below:
        ```java: Java
        razorpay.isValidVpa("+919876543210", new ValidateVpaCallback() {
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
        razorpay.isValidVpa("+919876543210", object : ValidateVpaCallback {
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
        data.put("email", "gaurav.kumar@example.com");
        data.put("contact", "+919876543210");
        data.put("method", "upi");
        data.put("vpa_token", "f731951149df8903d374b117f921ab41");
        ```kotlin: Kotlin
        val data = JSONObject()
        data.put("amount", 29935)
        data.put("order_id", "order_DgZ26rHjbzXXXX") //sample order_id. Generate orders using Orders API
        data.put("email", "gaurav.kumar@example.com")
        data.put("contact", "+919876543210")
        data.put("method", "upi")
        data.put("vpa_token", "f731951149df8903d374b117f921ab41")
        ```
    

#### Turbo UPI

Make UPI payments a faster, 2-step experience for your customers with Razorpay's Turbo UPI SDK.

1. [Turbo UPI Headless Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui.md)
2. [Turbo UPI UI Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-ui.md)

Know more about the [Customer Onboarding](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi.md).

## CRED

Customers can make payments on your Android app using their CRED Coins as well as the credit cards saved on CRED. The SDK supports two flows:
1. [Intent](#intent-flow-1)
2. [Collect](#collect-flow-1)

> **INFO**
>
> 
> **Handy Tips**
> 
> Ensure you have integrated with Razorpay Android SDK version 3.9.0 or higher.
> 

#### Prerequisites

You need to pass the `app_offer` parameter in the Orders API.

 /orders 

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "content-type: application/json" \
-d '{
  "amount": 1000,
  "currency": "INR",
  "receipt": "receipt#1",
  "app_offer": true
}'
```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 1000,
  "currency": "INR",
  "receipt": "receipt#1",
  "app_offer": true
 })
```php: PHP 
$api = new Api($key_id, $secret);

$api->order->create(array('receipt' => 'receipt#1', 'amount' => 1000, 'currency' => 'INR', 'app_offer'=> true));

```csharp: .NET 
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 1000); // amount in the smallest currency unit
options.Add("receipt", "receipt#1");
options.Add("currency", "INR");
options.Add("app_offer", true);
Order order = client.Order.Create(options);

```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 1000,
  currency: "INR",
  receipt: "receipt#1",
  app_offer: true
})

```go: go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 1000,
  "currency": "INR",
  "receipt": "receipt#1",
  "app_offer": true
}
body, err := client.Order.Create(data, nil)

```ruby: Ruby 
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 1000, currency: 'INR', receipt: 'receipt#1', app_offer: true

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 1000); // amount in the smallest currency unit
orderRequest.put("currency", "INR");
orderRequest.put("receipt", "receipt#1");
orderRequest.put("app_offer", true);

Order order = razorpay.orders.create(orderRequest);

```json: Response
{
  "id": "order_FNPoKwCtPyhJOt",
  "entity": "order",
  "amount": 1000,
  "amount_paid": 0,
  "amount_due": 1000,
  "currency": "INR",
  "receipt": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1596703420
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunit, such as paise (in case of INR). For example, for an actual amount of ₹299.35, the value of this field should be `29935`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Default is `INR`.

`app_offer` _optional_
: `boolean` Allow/do not allow customers to use CRED coins to make payments. This is used to prevent double discounting scenarios where customers have already availed discounts using voucher/coupon, and you do not want them to redeem Coins as well. Possible values:
    - `true`: Customer not allowed to use CRED coins to make payment.
    - `false` (default): Customer can use CRED coins to make payment.

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### Intent Flow

The Android SDK performs the following functions to invoke the intent on the Android device:
- Handles the intent response from CRED
- Opens the CRED app
- Process the payment
- Send success or failure response back to your app

To use this flow:
1. [Detect presence of CRED app on customer's Android device](#1-detect-presence-of-cred-app).
2. [Create a payment](#2-create-payment).
3. [Implement PaymentResultWithDataListener Method](#3-implement-paymentresultwithdatalistener-method).

#### 1. Detect Presence of CRED App

Use the below code to check if the CRED app is present in the customer's Android device. `Razorpay.isCredAppInstalled(activity)` returns a boolean value, disclosing whether the app is present on the device or not.

```java: Java
if (Razorpay.isCredAppInstalled(PaymentOptions.this)) {
  payWithCredBtn.setText("CRED Pay (Intent Flow)");
} else {
    payWithCredBtn.setText("CRED Pay (Collect Flow)");
}
```kotlin: Kotlin
if (Razorpay.isCredAppInstalled(this@PaymentOptions)) {
    payWithCredBtn.setText("CRED Pay (Intent Flow)");
} else {
    payWithCredBtn.setText("CRED Pay (Collect Flow)");
}
```

#### 2. Create Payment

After you receive the customer's app information, send it to the Razorpay API to complete the creation step of the payment flow. Below is the payload(JSON Object) to be sent:

```java: Java
razorpay.submit(payload,activityObject)

JSONObject data = new JSONObject("{currency:'INR'}");
data.put("amount", 29935);
data.put("order_id", "order_DgZ26rHjbzLLY2");
data.put("email", "gaurav.kumar@example.com");
data.put("contact", "9000090000");
data.put("method", "app");
data.put("provider", "cred");
data.put("app_present", true);
```kotlin: Kotlin
val data = JSONObject("{currency:'INR'}")
data.put("amount", 29935)
data.put("order_id", "order_DgZ26rHjbzLLY2")
data.put("email", "gaurav.kumar@example.com")
data.put("contact", "9000090000")
data.put("method", "app")
data.put("provider", "cred")
data.put("app_present", true)
```

#### Request Parameters

`method` _mandatory_
: `string` The method used to make the payment. Here, it must be `app`.

`provider` _mandatory if method=app_
: `string` Name of the PSP app. Here, it must be `cred`.

`app_present` _mandatory if app=cred_
: `boolean` Based upon response from the app present function, pass the value in this field. Possible values:
    - `true`: Opens the CRED app on customer's device.
    - `false` (default): Sends a push notification to customer's device.

#### 3. Implement PaymentResultWithDataListener Method

The `PaymentResultListener` or `PaymentResultWithDataListener` methods can be implemented the way shown in the above function or directly globally to the activity class. The functions will be implemented based on the method chosen. 

#### Sample Code for `PaymentResultListener`

Below are the sample codes for `PaymentResultListener` method.

```java: Java
razorpay.submit(data, new PaymentResultListener() {
		@Override
		public void onPaymentSuccess(String razorpayPaymentId) {
			// Razorpay payment ID is passed here after a successful payment
		}

		@Override
		public void onPaymentError(int code, String description) {
			// Error code and description is passed here
		}
	});

} catch (Exception e) {
	Log.e(TAG, "Error in submitting payment details", e);
}
```kotlin: Kotlin
razorpay.submit(payload, object : PaymntResultListener {
    override fun onPaymentSuccess(razorpayPaymentId: String?) {
        // razorpay payment ID and PaymentData passed here after a successful payment
    }

    override fun onPaymentError(p0: Int, p1: String?) {
        // Error code and description is passed here
    }
})
```

#### Sample Code for `PaymentResultWithDataListener`

Below are the sample codes for `PaymentResultWithDataListener` method.

```java: Java
razorpay.submit(data, new PaymentResultWithDataListener() {
      @Override
      public void onPaymentSuccess(String razorpayPaymentId, PaymentData paymentData) {
          // razorpay payment ID and PaymentData passed here after a successful payment
      }

      @Override
      public void onPaymentError(int code, String description) {
          // Error code and description is passed here
      }
  });

} catch (Exception e) {
    Log.e(TAG, "Error in submitting payment details", e);
}
```kotlin: Kotlin
razorpay.submit(payload, object : PaymentResultWithDataListener {
    override fun onPaymentSuccess(p0: String?, p1: PaymentData?) {
        // Razorpay payment ID and PaymentData passed here after a successful payment
    }

    override fun onPaymentError(p0: Int, p1: String?, p2: PaymentData?) {
        // Error code and description is passed here
    }
})
```

#### Collect Flow

In Collect Flow, the SDK sends a push notification to the `contact` number passed in the create request. Pass the following parameters to initiate a collect payment.

```java:
JSONObject data = new JSONObject();
data.put("amount", 29935);
data.put("order_id", "order_DgZ26rHjbzLLY2");
data.put("email", "gaurav.kumar@example.com");
data.put("contact", "9000090000");
data.put("method", "app");
data.put("provider", "cred ");
data.put("app_present", "false")
```kotlin: Kotlin
val data = JSONObject()
data.put("amount", 29935)
data.put("order_id", "order_DgZ26rHjbzLLY2")
data.put("email", "gaurav.kumar@example.com")
data.put("contact", "9000090000")
data.put("method", "app")
data.put("provider", "cred ")
data.put("app_present", "false")
```

#### Request Parameters

`method` _mandatory_
: `string` The method used to make the payment. Here, it must be `app`.

`provider` _mandatory if method=app_
: `string` Name of the PSP app. Here, it must be `cred`.

`app_present` _mandatory if app=cred_
: `boolean` Sets the payment flow as collect. Possible values:
    - `true`: Opens the Cred app on customer's device.
    - `false` (default): Sends a push notification to customer's device.

> **WARN**
>
> 
> **UPI Collect Flow Deprecated**
> 
> According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026. Customers can no longer make payments or register UPI mandates by manually entering VPA/UPI id/mobile numbers.
> 
> **Exemptions:** UPI Collect will continue to be supported for:
> - MCC 6012 & 6211 (IPO and secondary market transactions).
> - iOS mobile app and mobile web transactions.
> - UPI Mandates (execute/modify/revoke operations only)
> - eRupi vouchers.
> - PACB businesses (cross-border/international payments).
> 
> **Action Required:**
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md#intent-flow). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/custom-integration.md).
>
