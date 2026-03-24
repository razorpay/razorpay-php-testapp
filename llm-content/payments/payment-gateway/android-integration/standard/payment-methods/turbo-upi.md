---
title: Integrate with Turbo UPI
description: Steps to integrate Razorpay Turbo UPI with your app.
---

# Integrate with Turbo UPI

- **Turbo UPI Android Standard SDK**: Discover new features, updates and deprecations related to Turbo UPI on Android Standard Checkout (since Jan 2024).

With Razorpay Turbo UPI, businesses experience faster and simpler payments. It condenses the payment process from 5 steps to just 1, eliminating app redirections. Enjoy a seamless in-app payment experience, reduce dependencies on third-party UPI apps, and gain complete visibility of the payment journey.

You can seamlessly integrate Turbo UPI with Razorpay Android Standard SDK. Explore the full potential of [Razorpay Turbo UPI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/upi/turbo-upi.md) and know How it Works.

![Turbo UPI Standard Checkout Flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/turbo-upi-flow.jpg.md)

    
### Prerequisites

         Before you start integrating Turbo UPI with Razorpay Android Standard SDK, ensure that you follow these guidelines for a smooth integration process:

         1. **SDK Version Compatibility:**
             - Integrate with [Razorpay Android Standard SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/standard.md). Ensure that you integrate with SDK version 1.6.37 or higher.

         2. **Import the following frameworks:**
             - In the root settings.gradle file, use:
            ```kotlin: Kotlin
                dependencyResolutionManagement {
                    repositories {
                        // ... other repositories ...
                        maven {
                            url = uri("https://maven.pkg.github.com/upi-turbo/android-turbo-sample-app")
                            credentials {
                                username = "upi-turbo"
                                password = ""
                            }
                        }
                    }
                }
            ```

            - In the library module's build.gradle, use:
            
            ```kotlin: Kotlin
                dependencies {
                    // UAT
                    debugImplementation "com.razorpay:checkout-uat:$CHECKOUT_VERSION"
                    debugImplementation "com.razorpay:razorpay-turbo-uat:$TURBO_VERSION"
                    debugImplementation "com.razorpay:turbo-ui-uat:$TURBO_VERSION"

                    // Production
                    releaseImplementation "com.razorpay:checkout:$CHECKOUT_VERSION"
                    releaseImplementation "com.razorpay:razorpay-turbo:$TURBO_VERSION"
                    releaseImplementation "com.razorpay:turbo-ui:$TURBO_VERSION"
                }
            ```

         3. **Gradle Properties:**
             - Add the following lines to your Android project's `gradle.properties` file:
                 - `android.enableJetifier=true`
                 - `android.useAndroidX=true`

         4. **Minimum SDK Version:**
             - Keep in check that the `minSDKversion` for using Turbo UPI is currently 23 and cannot be overwritten.

         5. **Contact Prefill in Standard Checkout:**
             - Standard Checkout should load with the contact prefilled. This contact information is crucial for setting up UPI accounts.
             - Make sure your Checkout options include [**prefill contact**](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/standard/integration-steps/#14-initiate-payment-and-display-checkout-form.md).
        

## Onboarding Flow

Ensure your customers [onboard with Razorpay Turbo UPI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/upi/turbo-upi/#onboarding-flow.md) to get started.

### Turbo UI SDK Integration

Follow these steps to integrate with Razorpay Turbo UPI:

1. Initialise the Checkout object with the `activity` parameter to enable Turbo UPI functionality.

    ```kotlin: Kotlin 
        val checkout = Checkout()
            .upiTurbo(activity) // mandatory
            .setColor("/*color*/ #000000") // optional

    ```kotlin: Java 
    Checkout checkout = new Checkout()
        .upiTurbo(activity)//mandatory
        .setColor("/*color*/ #000000" );//optional

    ```

2. Use the following code to link the newly created UPI account with your app. This function can be called from any application section, offering multiple entry points for customers to link their UPI account with your app. Linking it in advance allows customers to pay directly with the linked `UpiAccount` without repeating the linking process.

    ```kotlin: Kotlin
    checkout.upiTurbo?.linkNewUpiAccount("","#000000"/*color - in hex format*/,
         object: GeneralPluginCallback{

            override fun onSuccess(upiAccount: UpiAccount){
                // use upiAccount to display data to the User
            }

            override fun onError(error: JSONObject){
                // error regarding linking of UpiAccount
            }       

    })
    // color parameter in the function can be used to customize the screens in
    // linking process 

    ```kotlin: Java
    checkout.upiTurbo.linkNewUpiAccount("", "#000000"/*color - in hex format*/,
        new GeneralPluginCallback(){

        @Override
        public void onSuccess(UpiAccount upiAccount){

        }

        @Override
        public void onError(JSONObject error){
        }

    });

    ```

> **INFO**
>
> 
> 
> **Payment Flow**
> 
> Razorpay SDK will handle all the changes related to `UpiTurbo` internally. To integrate with the payment flow, [initiate payment and display the checkout form](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/standard/integration-steps/#14-initiate-payment-and-display-checkout-form.md).
> 

### Non-Transactional Flow

Razorpay provides a single exposed function that allows you to manage linked UPI accounts and access all non-transactional flows seamlessly. 

![View the non-transactional flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/turbo-upi-non-transactional.jpg.md)

    
### Manage UPI Accounts

         The SDK manages the linked `UpiAccounts` on the application by triggering `manageUpiAccounts()`, which follows the following internal non-transaction flows for `UpiAccounts`:

         - **Fetch balance**: Check the customer's account balance. 
         - **Change UPI PIN**: Provide the customer the ability to change their UPI PIN. 
         - **Reset UPI PIN**: Let your customers reset the PIN for their account.
         - **Delete the account from the application**: Let your customers delink, that is, remove a selected UPI account from your application.

         ```kotlin: Kotlin
         checkout.upiTurbo?.manageUpiAccounts("9000090000", "#000000"/*color - in hex format(nullable)*/, object : GenericPluginCallback {
             override fun onError(error: JSONObject) {
                 /* Throws error if Turbo UPI cannot be initialized or throws error */
             }

             override fun onSuccess(data: Any) {
                 /* Can be safely ignored */
             }
         })

         ```kotlin: Java
         if (checkout.upiTurbo != null) {
             checkout.upiTurbo.manageUpiAccounts("9000090000","#000000"/*color - in hex format(nullable)*/, new GenericPluginCallback() {
                 @Override
                 public void onSuccess(@NonNull Object data) {
                     /* can be safely ignored */
                 }

                 @Override
                 public void onError(@NonNull JSONObject error) {
                     /* Throws error if Turbo UPI cannot be initialized or throws error */
                 }
             });
         }
         
         ``` 
        

### Models Exposed from the SDKs

The SDKs given below provide access to exposed models for seamless integration.

    
### Error

         

         Error | Description
         ---
         `errorCode` | Types of error codes - `BAD_REQUEST_ERROR`: Failure from the client's end (SDK).
- `GATEWAY_ERROR`: Failure either from the Secure Component or the Bank.
- `SERVER_ERROR`: Failure at PSP.

         ---
         `errorDescription` | Brief description of the error.
         ---
         `errorReason` | Specifies the specific reason for the error.
         ---
         `errorSource` | Indicates the origin of the error.
         ---
         `errorStep` |  Highlights the stage where the error occurred.

         

         [Refer to the list of possible error reasons](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/standard/payment-methods/turbo-upi/error-codes.md).
