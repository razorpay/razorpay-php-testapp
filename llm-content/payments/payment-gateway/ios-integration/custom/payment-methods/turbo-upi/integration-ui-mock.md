---
title: Integrate Turbo UPI UI Mock SDK
description: Steps to integrate the Razorpay Turbo UPI UI Mock SDK with your app.
---

# Integrate Turbo UPI UI Mock SDK

Mock SDK is a tool designed to facilitate your integration with Turbo UPI. Unlike conventional integration methods that rely on the stability of partner banks and NPCI UAT environments, Mock SDK removes this dependency, streamlining the integration process.

    
### Advantages

         - **No Dependency on UAT Environment**: Traditional integration methods often encounter obstacles due to issues with UAT environments. Mock SDK removes this roadblock, enabling you to integrate without external dependency.
         - **Streamlines Integration**: Mock SDK is designed to create a smoother integration experience, ensuring a hassle-free process. This allows you to quickly offer Turbo UPI services to the users.
         - **Effortless Integration for Essential Flows**: Mock SDK simplifies the process of integrating Turbo for important scenarios. This enables you to expand your range of UPI services for customers without dealing with complex requirements.
         - **Seamless Transition to Production**: After testing your integration with Mock SDK, you can smoothly transition to the Production SDK for final testing. This ensures a seamless and secure transition from development to live production.
        

    
### Prerequisites

         1. Contact our [integrations team](mailto:integrations@razorpay.com)  to get your app, and GitHub account whitelisted to get access to the `https://github.com/upi-turbo/ios-sample-app` - sample app repository.

             - In this repository, you will find the framework files (libraries for Turbo) and the sample app source code to help you with the integration.
             - Use branch `custom_ui/turbo_ui` to access the sample app and frameworks for Turbo UPI. The sample app workspace is divided into Prod, UAT and Mock environment targets with separate pod dependencies.

         2. Integrate with the [Razorpay iOS Custom SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/build-integration.md).

         3. Add the below line of code to your the `Podfile`, to install Turbo pods:

             ```ruby:
             pod 'razorpay-customui-pod'
             pod 'razorpay-turbo-pod'
             ```

         4. Import the Turbo plugins as given below:

             ```swift:
             import Razorpay
             import TurboUpiPlugin
             ```

         
> **WARN**
>
> 
> 
>          **Watch Out!**
> 
>          - The minimum supported iOS version for using Turbo UPI is currently 11.0.
>          - API Key Usage for Different Environments:
>              - Use the `rzp_test_0wFRWIZnH65uny` API key id for testing on the UAT environment.
>              - Use the `rzp_test_vacN5cmVqNIlhO` API key id for testing on the Mock environment.
>              - Use the [Razorpay live keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys) for prod testing.
>          

       

## 1. Integration Steps

Follow these steps to integrate with [Turbo UPI with UI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-ui.md#1-integration-steps).

## 2. Test Integration

Razorpay has three environments: Mock, UAT and Prod. We recommend the following:

- Complete the integration with the Mock environment.
- Complete developer testing using [Test Data](#21-test-data) to cover all the [Test Case](#22-test-case-coverage)
- Perform the UAT using the Razorpay-provided API keys.

### 2.1 Test Data

Use the following data to test the integration.

    
### Bank List

         
         Bank id | Bank Name | IFSC 
         ---
         1 | Axis | AXIS0000001
         ---
         2 | SBI | SBI00000001
         ---
         3 | HDFC | HDFC0000001
         ---
         4 | YES | YES00000001
         
        

    
### Bank Accounts

         
         Bank id | Bank Name | Account Number | Beneficiary Name | Account Balance | UPI PIN | ATM PIN | Card Number | Expiry Date | CVV | OTP | Type
         ---
         1 | Axis | xxxx0001 | Pratheek | ₹100 | Not Set | 1234 | 8000110001 | 01/25 | Random CVV | 123456 | Savings
         ---
         1 | Axis Bank | 8888 88xx xxxx 0002 | Pratheek | ₹9,000 | 123456 | 1234 | 8888 8888 8811 0002 | Any Future Date | Random CVV | 123456 | Credit Card
         ---
         2 | SBI | xxxx0001 | Kushaal Singla | ₹9,000 | Not Set | 1234 | 9000110001 | 01/25 | Random CVV | 123456 | Savings
         ---
         2 | SBI Bank | 8888 88xx xxxx 0003 | Kushaal Singla | ₹9,000 | Not Set | 1234 |  8888 8888 8811 0003 | Any Future Date | Random CVV | 123456 | Credit Card
         ---
         2 | SBI | xxxx0203 | Kushaal Singla | ₹99,999 | 123456 | 1234 | 9599110203 | 01/25 | Random CVV | 123456 | Savings
         ---
         
        

### 2.2 Test Case Coverage

Following are the various scenarios based on the dependencies.

    
### Dependencies and Scenarios

         
         S.No | Dependency | Positive Scenarios | Negative Scenarios
         ---
         1 | Device Binding | Device Binding | - SIM not found
- SMS sending failed
- Permissions not given

         ---
         2 | Account Linking | - Account found
- PIN set
- PIN not set
 | No account for that number
         ---
         3 | UPI ID generation | - UPI ID present (roaming profile)
- New UPI ID creation
 | NA 
         ---
         4 | - UPI PIN Management
- Change PIN
- Reset PIN
 | PIN Changed/Set Successfully | - Invalid PIN
- PIN not matching
- Incorrect OTP
- Incorrect card details (Reset PIN)

         ---
         5 | P2M Transaction - In-App Payments | Payment Successful | - Invalid PIN
- Timeout
- Insufficient Balance

         ---
         6 | Check Balance | Show Balance | Invalid PIN 
         ---
         7 | Delink Account | Success Only | NA
         ---
         8 | Prefetch and Link accounts | Fetch existing PIN set and PIN not set accounts | No account exists for that number

        
     

### 2.3 How to Test?

Given are the various test cases and their sequential steps.

    
### 2.3.1 Device Binding Success

         In the scenario of successful device binding, follow these simple steps:
         1. Enter a mobile number which exists in the user's device.
         2. Call `razorpay.upiTurboUI.linkNewUpiAccount` method.
         3. A screen with the Send SMS button will be displayed.
         4. Select Send SMS and send the SMS when prompted on the screen.
         5. A screen with a list of banks will appear for bank selection.
        

    
### 2.3.2 SIM not found

         In the event of a SIM card not being found, follow these steps:         
         1. Remove all SIM cards from the device.
         2. Enter a mobile number which exists in the user's device.
         3. Call `razorpay.upiTurboUI.linkNewUpiAccount` method.
         4. Expect the `completionHandler` function to be triggered with an error indicating SIM not found `error!=null`.
        

    
### 2.3.3 Account Found

         In the scenario where an account is found, follow these steps:
         1. Enter a mobile number which exists in the user's device.
         2. Call `razorpay.upiTurboUI.linkNewUpiAccount` method.
         3. A screen with the Send SMS button will appear.
         4. Select Send SMS and send the SMS when prompted on the screen.
         5. A screen with a list of banks will be displayed for bank selection.
         6. Select either Axis Bank or SBI Bank, as mentioned in the [Test Data](#21-test-data).
         7. A screen with a list of bank accounts will appear for bank account selection.
        

    
### 2.3.4 PIN

         
            
                PIN set
                
                 Follow these steps to set or manage your PIN:
                 1. Enter a mobile number which exists in the user's device.
                 2. Call `razorpay.upiTurboUI.linkNewUpiAccount` method.
                 3. A screen with the Send SMS button will appear.
                 4. Select Send SMS and send the SMS when prompted on the screen.
                 5. A screen with a list of banks will be displayed for bank selection.
                 6. Select SBI Bank, as mentioned in the [Test Data](#21-test-data).
                 7. A screen with a list of bank accounts will appear for bank account selection.
                 8. Select the account ending with xxxx0203, as mentioned in the [Test Data](#21-test-data).
                 9. Expect the `completionHandler` function to be triggered with no errors `error==null` and `upiAccounts != null`. The newly linked account will be the first object in the list.
                

            
### PIN not set

                 Follow these steps when a PIN is not set:
                 1. Enter a mobile number which exists in the user's device.
                 2. Call `razorpay.upiTurboUI.linkNewUpiAccount` method.
                 3. A screen with the Send SMS button will appear.
                 4. Select Send SMS and send the SMS when prompted on the screen.
                 5. A screen with a list of banks will be displayed for bank selection.
                 6. Select SBI Bank, as mentioned in the [Test Data](#21-test-data).
                 7. A screen with a list of bank accounts will appear for bank account selection.
                 8. Select an account ending with xxxx0001, as mentioned in the [Test Data](#21-test-data).
                 9. A screen to enter card details will be displayed for this final step, allowing you to set your UPI PIN.
               

            
### No Account for Specified Number

                 When there is no account associated with a particular number, follow these steps:
                 1. Enter a mobile number which exists in the user's device.
                 2. Call the `razorpay.upiTurboUI.linkNewUpiAccount` method.
                 3. A screen with the Send SMS button will appear.
                 4. Select Send SMS and send the SMS when prompted on the screen.
                 5. A screen with a list of banks will be displayed for bank selection.
                 6. Select HDFC Bank, as mentioned in the [Test Data](#21-test-data).
                 7. An empty screen for the list of bank accounts will be displayed.
                

            
### PIN set Successfully

                 For a successful PIN setup, follow these steps:
                 1. Enter a mobile number which exists in the user's device.
                 2. Call `razorpay.upiTurboUI.linkNewUpiAccount` method.
                 3. A screen with the Send SMS button will appear.
                 4. Select Send SMS and send the SMS when prompted on the screen.
                 5. A screen with a list of banks will be displayed for bank selection.
                 6. Select Axis Bank, as mentioned in the [Test Data](#21-test-data).
                 7. A screen with a list of bank accounts will appear for bank account selection.
                 8. Select the account ending with xxxx0001, as mentioned in the [Test Data](#21-test-data).
                 9. A screen to enter card details will be displayed to set your UPI PIN.
                 10. Enter card details as mentioned in the [Test Data](#21-test-data) and select Next.
                 11. Submit the OTP as mentioned in the [Test Data](#21-test-data) and the new PIN on the Mock NPCI screen.
                 12. Expect the `completionHandler` function to be triggered with no errors `error==null` and `upiAccounts != null`. The newly linked account will be the first object in the list.
                

            
### PIN Changed Successfully

                 When you need to change your PIN successfully, follow these steps:
                 1. Call the `razorpay.upiTurboUI.manageUpiAccount` method.
                 2. A screen with a list of UPI accounts and their options will be displayed.
                 3. Select Change PIN on any UPI account.
                 4. Submit the old and new PIN on the Mock NPCI screen.
                 5. An alert will be displayed confirming your PIN change was successful.
                

            
### Invalid PIN or PIN not Matching

                 When dealing with an invalid PIN or a PIN that does not match, follow these steps:
                 1. Call the `razorpay.upiTurboUI.manageUpiAccount` method.
                 2. A screen with a list of UPI accounts and their options will be displayed.
                 3. Select Change Pin on any UPI account.
                 4. Submit an incorrect old and new PIN on the Mock NPCI screen.
                 5. An alert will be displayed, indicating that the provided PIN was invalid or did not match the expected PIN.
                

            
### Incorrect OTP

                 In situations where an incorrect OTP is encountered, follow these steps:
                 1. Enter a mobile number which exists in the user's device.
                 2. Call the `razorpay.upiTurboUI.linkNewUpiAccount` method.
                 3. A screen with the Send SMS button will appear.
                 4. Select Send SMS and send the SMS when prompted on the screen.
                 5. A screen with a list of banks will be displayed for bank selection.
                 6. Select Axis Bank, as mentioned in the [Test Data](#21-test-data).
                 7. A screen with a list of bank accounts will appear for bank account selection.
                 8. Select the account ending with xxxx0001, as mentioned in the [Test Data](#21-test-data).
                 9. A screen to enter card details will be displayed to set your UPI PIN.
                 10. Enter card details as mentioned in the [Test Data](#21-test-data) and select Next.
                 11. Submit any random incorrect OTP except for 123456 as mentioned in the [Test Data](#21-test-data) and the new PIN on the Mock NPCI screen.
                 12. Expect the `completionHandler` function to be triggered with an error `error!=null`.
                

            
### Incorrect Card Details (Reset PIN)

                 When dealing with resetting your PIN with incorrect card details, follow these steps:
                 1. Call the `razorpay.upiTurboUI.resetUpiPin` method.
                 2. A screen to enter card details will be displayed to set your UPI PIN.
                 3. Enter incorrect card details that are not mentioned in the [Test Data](#21-test-data) and select Next.
                 4. Submit the OTP as mentioned in the [Test Data](#21-test-data) and the new PIN on the Mock NPCI screen.
                 5. An alert will be displayed, indicating that the reset attempt has failed due to incorrect card details.
                

         
        
    

            
### 2.3.5 UPI ID

                 
                    
                        UPI ID Present (Roaming Profile)
                        
                         When working with scenarios involving the presence of a UPI ID (Roaming Profile), follow these steps:
                         1. Enter a mobile number which exists in the user's device.
                         2. Call the `razorpay.upiTurboUI.linkNewUpiAccount` method.
                         3. A screen with the Send SMS button will appear.
                         4. Select Send SMS and send the SMS when prompted on the screen.
                         5. Expect the `completionHandler` function to be triggered with no errors `error==null` and `upiAccounts != null`.                      
                         

                    
### New UPI ID Creation(PIN already set)

                         When dealing with scenarios related to UPI ID, such as new UPI ID creation, follow these steps:
                         1. Enter a mobile number which exists in the user's device.
                         2. Call the `razorpay.upiTurboUI.linkNewUpiAccount` method.
                         3. A screen with the Send SMS button will appear.
                         4. Select Send SMS and send the SMS when prompted on the screen.
                         5. A screen with a list of banks will be displayed for bank selection.
                         6. Select SBI Bank, as mentioned in the [Test Data](#21-test-data).
                         7. A screen with a list of bank accounts will appear for bank account selection.
                         8. Select the account ending with xxxx0203, as mentioned in the [Test Data](#21-test-data).
                         9. Expect the `completionHandler` function to be triggered with no errors `error==null` and `upiAccounts != null`. The newly linked account will be the first object in the list.
                        
  
                 
                
            

            
### 2.3.6 Transactions

                 
                    
                        Payments Successful
                        
                         When it comes to transactional scenarios, with a focus on ensuring a successful payment, follow these steps:
                         1. Begin by following the [integration steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-ui.md#1-integration-steps), specifically the `submit` method.
                         2. Enter an amount that is lower than the account balance.
                         3. Enter the correct PIN, on the Mock NPCI screen.
                         4. Subsequently, you will receive a callback on `onPaymentSuccess`. This indicates that the payment has been successfully processed.  

                         
> **INFO**
>
> 
>                          **Handy Tips**
>                          
>                          The account balance remains unchanged, and the paid amount is not deducted.
>                          

                        

                    
### Invalid PIN

                         In situations where an invalid PIN is entered, follow these steps:
                         1. Begin by following the [integration steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-ui.md#1-integration-steps), specifically the `submit` method.
                         2. Enter an amount lower than the account balance mentioned in [Test Data](#21-test-data).  
                         3. Enter the incorrect PIN, on the Mock NPCI screen.
                         4. Subsequently, you will receive a callback on `onPaymentError`. This indicates that an error occurred during the payment process due to the invalid PIN.
                        

                    
### Timeout

                         When dealing with transactional scenarios, specifically focusing on handling timeouts, follow these steps:
                         1. Begin by following the [integration steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-ui.md#1-integration-steps), specifically the `submit` method.
                         2. Enter the amount as 24.
                         3. Enter the correct PIN, on the Mock NPCI screen.
                         4. Subsequently, you will receive a callback on `onPaymentError`. This indicates that an error occurred during the payment process due to a timeout.
                        

                    
### Insufficient Balance

                         When it comes to transactional scenarios with a focus on handling insufficient balance, follow these steps:
                         1. Begin by following the [integration steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-ui.md#1-integration-steps), specifically the `submit` method.
                         2. Enter an amount greater than the account balance as mentioned in [Test Data](#21-test-data).
                         3. Enter the correct PIN, on the Mock NPCI screen.
                         4. Subsequently, you will receive a callback on `onPaymentError`. This indicates that an error occurred during the payment process due to insufficient balance.  
                        

                    
### Show Balance

                         For scenarios related to checking your balance, follow these steps:
                         1. Call the `razorpay.upiTurboUI.manageUpiAccount` method.
                         2. A screen with a list of UPI accounts and their options will be displayed.
                         3. Select Check Balance on any UPI account.
                         4. Enter the correct PIN on the Mock NPCI screen.
                         5. The requested balance information will be displayed for the selected UPI account.
                        

                    
### Check Balance - Invalid PIN

                         When it comes to scenarios focused on checking your balance, follow these steps:
                         1. Call the `razorpay.upiTurboUI.manageUpiAccount` method.
                         2. A screen with a list of UPI accounts and their options will be displayed.
                         3. Select Check Balance on any UPI account.
                         4. Enter an incorrect PIN, on the Mock NPCI screen.
                         5. An alert will be displayed, indicating that the provided PIN was invalid or did not match the expected PIN.
                        

                    
### Delink Account - Success

                         When it comes to scenarios related to delinking your account, follow these steps:
                         1. Call the `razorpay.upiTurboUI.manageUpiAccount` method.
                         2. A screen with a list of UPI accounts and their options will be displayed.
                         3. Select the delete icon on any UPI account.
                         4. An alert will be displayed, confirming that your account has been successfully delinked.
                        

                 
                
             
         
        

    
### 2.3.7 Prefetch

         
            
                2.3.7.1 First Time Onboarding
                
                 
                    
                        Onboarding Success
                        
                         Follow these simple steps for the first time onboarding:

                         1. Enter a mobile number that exists on the user's device.
                         2. Call `razorpay.upiTurboUI.prefetchAndLinkUpiAccountsWithUI` method.
                         3. Grant the necessary permissions for prefetching and linking the account.
                         4. The device binding process will then commence, which includes sending an SMS for verification.
                         5. After successful device binding, a screen titled **Fetching Accounts** will be displayed, indicating that the system is retrieving bank account details.
                         6. You will receive a callback `onResponse` containing two lists: accounts with PINs set and accounts without PINs set, helping you identify which accounts require further actions.
                         7. Once an account is linked, you will receive another callback `onResponse` asynchronously with updated lists of accounts. This callback indicates that the accounts are now fully linked and updated in the system.
                        

                    
### Denied Prefetch Consent

                         For the first time onboarding, follow these steps:

                         1. Enter a mobile number that exists on the user's device.
                         2. Begin the onboarding process by calling the `razorpay.upiTurboUI.prefetchAndLinkUpiAccountsWithUI` method.
                         3. Deny the permissions for prefetching and linking when prompted.
                         4. Despite denying permissions, the device binding process will initiate, including the sending of an SMS for verification.
                         5. After successful device binding, a screen will appear displaying a list of banks available for selection. This step allows you to proceed with selecting a bank even after the initial permission denial.
                        

                    
### PIN Set

                         Follow the below steps to set or manage your PIN:
                         1. Initiate the UPI PIN setup by calling the `razorpay.upiTurboUI.setUpiPinWithUI` method.
                         2. A screen requesting card details will be displayed. Enter the necessary information from the [Test Data](#21-test-data) provided.
                         3. After submitting the card details, you will be prompted to enter an OTP. Use the OTP from the Test Data to proceed.
                         4. Next, you will be directed to a screen to enter and confirm your new UPI PIN. Make sure the PIN entered matches the confirmation PIN to ensure successful setup.
                        

                 
                
            
         
         
            
### 2.3.7.2 Accounts Already Onboarded

                 1. Call the `razorpay.upiTurboUI.prefetchAndLinkUpiAccountsWithUI` method. This action initiates the process for users who have previously completed the onboarding process.
                 2. After the method is called, a screen displaying a list of banks will be shown. This list allows the selection of a new or different bank for which the user wants to link an additional account.
                 3. Select the bank for which you want to link the account. 
                

         
        
    

### 2.4 Additional Cases

Businesses should have the capability to display a user-friendly message to their customers for certain special or additional error scenarios. The SDK is equipped to simulate some of these cases.

Action | Input Data | Code | Description
---
Pay | Amount = ₹24 | 91 | Timeout
---

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> - Device Binding will only work if the user has at least one SIM card in their mobile device.
> - Users can set/reset the UPI PIN. The configured PIN will be used to validate the transaction.
> - Based on the [Test Data](#21-test-data) for bank accounts, choose a bank for a single, multiple or no bank account.
> - Use the same ATM PIN and card Number mentioned in the [Test Data](#21-test-data).
> - The UPI PIN will revert to its default setting or be removed when you uninstall or clear storage.
> - Amount ₹24 is blocked for special cases. Please refer to [Additional Cases](#24-additional-cases).
> - Only one TPV whitelisted account (ending with xxxx0203) is permitted. Payments made using any other accounts will fail with the error Payment failed because the account linked to VPA is invalid.
> - In the Mock environment, multiple payments can be made for a given `order_id`, which differs from the production environment where this is not allowed.
> 

## 3. Go-live Checklist

Complete this [Go-live Checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-ui.md#3-go-live-checklist) to take your integration live.
