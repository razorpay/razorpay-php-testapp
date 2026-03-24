---
title: Integrate Turbo UPI Headless Mock SDK
description: Steps to integrate the Razorpay Turbo UPI Headless Mock SDK with your app.
---

# Integrate Turbo UPI Headless Mock SDK

Mock SDK is a tool designed to facilitate your integration with Turbo UPI. Unlike conventional integration methods that rely on the stability of partner banks and NPCI UAT environments, Mock SDK removes this dependency, streamlining the integration process.

    
### Advantages

         - **No Dependency on UAT Environment**: Traditional integration methods often encounter obstacles due to issues with UAT environments. Mock SDK removes this roadblock, enabling you to integrate without external dependency.
         - **Streamlines Integration**: Mock SDK is designed to create a smoother integration experience, ensuring a hassle-free process. This allows you to quickly offer Turbo UPI services to the users.
         - **Effortless Integration for Essential Flows**: Mock SDK simplifies the process of integrating Turbo for important scenarios. This enables you to expand your range of UPI services for customers without dealing with complex requirements.
         - **Seamless Transition to Production**: After testing your integration with Mock SDK, you can smoothly transition to the Production SDK for final testing. This ensures a seamless and secure transition from development to live production.
        

    
### Prerequisites

         1. Contact our [integrations team](mailto:integrations@razorpay.com) to get your app, and GitHub account whitelisted to get access to the `https://github.com/upi-turbo/ios-sample-app` - sample app repository.

             - In this repository, you will find the framework files (libraries for Turbo) and the sample app source code to help you do the entire integration.
             - Use branch `custom_ui/turbo` to access sample app and framework for Turbo UPI. The sample app workspace is divided into Prod, UAT and Mock environment targets with separate pod dependencies.

         2. Integrate with the [Razorpay iOS Custom SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/build-integration.md).

         3. Add the below line of code to your `Podfile`, to install Turbo pods:

             ```ruby:
             pod 'razorpay-customui-pod'
             pod 'razorpay-turbo-pod'
             ```

         4. Import the Turbo plugin as given below:

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
>          - Use the `rzp_test_vacN5cmVqNIlhO` API key id for testing on the Mock environment.
>          

        

## 1. Integration Steps

Follow these steps to integrate with [Turbo UPI Headless](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-noui.md#turbo-headless-integration-and-payment-flow).

## 2. Test Integration

Razorpay has three environments: Mock, UAT and Prod. We recommend the following:

- Complete the integration with the Mock environment.
- Complete the developer testing using the [Test Data](#21-test-data) to cover all the [Test Cases](#22-test-case-coverage).
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
         4 | Yes | YES00000001
         
        

    
### Bank Accounts

         
         Bank id | Bank Name | Account Number | Beneficiary Name | Account Balance | UPI PIN | ATM PIN | Card Number | Expiry Date | CVV | OTP | Type
         ---
         1 | Axis Bank | xxxx0001 | Pratheek | ₹100 | Not Set | 1234 | 8000110001 | Any Future Date | Random CVV | 123456 | Savings
         ---
         1 | Axis Bank | 8888 88xx xxxx 0002 | Pratheek | ₹9,000 | 123456 | 1234 | 8888 8888 8811 0002 | Any Future Date | Random CVV | 123456 | Credit Card
         ---
         2 | SBI Bank | xxxx0001 | Kushaal Singla | ₹9,000 | Not Set | 1234 | 9000110001 | Any Future Date | Random CVV | 123456 | Savings
         ---
         2 | SBI Bank | 8888 88xx xxxx 0003 | Kushaal Singla | ₹9,000 | Not Set | 1234 |  8888 8888 8811 0003 | Any Future Date | Random CVV | 123456 | Credit Card
         ---
         2 | SBI Bank | xxxx0203 | Kushaal Singla | ₹99,999 | 123456 | 1234 | 9599110203 | Any Future Date | Random CVV | 123456 | Savings
         
        

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
- Incorrect card details(Reset PIN)

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
         2. Call the `razorpay.upiTurbo.linkNewUpiAccount` method.
         3. The expected response should be `LinkUpiAction = .selectBank` with `action.error==null` (no errors) and `action.data != null` indicating a list of available banks for selection.
        

    
### 2.3.2 SIM not found

         In the event of a SIM card not being found, follow these steps:         
         1. Remove all SIM cards from the device.
         2. Enter a mobile number which exists in the user's device.
         3. Call the `razorpay.upiTurbo.linkNewUpiAccount` method.
         4. The expected response should be `LinkUpiAction = .linkAccountResponse` with `action.error!=null` including an error message sim not found.
        

    
### 2.3.3 Account Found

         In the scenario where an account is found, follow these steps:
         1. Enter a mobile number which exists in the user's device.
         2. Call the `razorpay.upiTurbo.linkNewUpiAccount` method.
         3. The SDK response should change to `LinkUpiAction = .sendSms` with `action.error==null` (no errors).
         4. Call `action.registerDevice()`, send the SMS when prompted on the screen.
         5. The SDK response should change to `LinkUpiAction = SELECT_BANK` with `action.error==null` (no errors) and `action.data != null` indicating a list of available banks for selection.
         6. Call `action.selectedBank()` with the Axis Bank or SBI Bank object from `action.data` as mentioned in the [Test Data](#21-test-data).
         7. The expected response should be `LinkUpiAction = .selectBankAccount` with no errors `action.error==null` and a list of available bank accounts for selection `action.data != null`, with at least one object.
        

    
### 2.3.4 PIN

         
            
                PIN set
                
                 When it comes to setting or managing your PIN, follow these steps:
                 1. Enter a mobile number which exists in the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
                 3. The SDK response changes to `LinkUpiAction = .sendSms` with no errors `action.error==null`.
                 4. Call `action.registerDevice()` and send the SMS when prompted on the screen.
                 5. The SDK response changes to `LinkUpiAction = .selectBank` with no errors `action.error==null` and a list of available banks for selection `action.data != null`.
                 6. Call `action.selectedBank()` with the SBI Bank object from `action.data` as mentioned in the [Test Data](#21-test-data).
                 7. The expected response should be `LinkUpiAction = .selectBankAccount` with no errors `action.error==null` and a list of available bank accounts for selection `action.data != null`.
                 8. Select the bank account ending with xxxx0203, as mentioned in the [Test Data](#21-test-data).
                 9. The expected response should be `LinkUpiAction = .linkAccountResponse` with no errors `action.error==null` and UpiAccounts data available `action.data != null`. `action.data` will have a list of UpiAccounts for which PIN is already set and UPI ID linked, including the newly linked account as the first object.
                

            
### PIN not set

                 When dealing with scenarios where a PIN is not set, follow these steps:
                 1. Enter a mobile number which exists in the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
                 3. The SDK response changes to `LinkUpiAction = .sendSms` with no errors `action.error==null`.
                 4. Call `action.registerDevice()` and send the SMS when prompted on the screen.
                 5. The SDK response changes to `LinkUpiAction = .selectBank` with no errors `action.error==null` and a list of available banks for selection `action.data != null`.
                 6. Call action.selectedBank() with Axis Bank or SBI Bank object from action.data as mentioned in the [Test Data](#21-test-data).
                 7. The expected response should be `LinkUpiAction = .selectBankAccount` with no errors `action.error==null` and a list of available bank accounts for selection `action.data != null`.
                 8. Call `action.selectedBankAccount()` with bank account ending with xxxx0001 object from `action.data` as mentioned in the [Test Data](#21-test-data).
                 9. The expected response should be `LinkUpiAction = .setUpiPin` with no errors `action.error==null` and bank account data available `action.data != null`. 
               

            
### No Account for Specified Number

                 When there is no account associated with a particular number, follow these steps:
                 1. Enter a mobile number which exists in the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
                 3. The SDK response changes to `LinkUpiAction = .sendSms` with no errors `action.error==null`.
                 4. Call `action.registerDevice()` and send the SMS when prompted on the screen.
                 5. The SDK response changes to `LinkUpiAction = .selectBank` with no errors `action.error==null` and a list of available banks for selection `action.data != null`.
                 6. Call `action.selectedBank()` with HDFC object from `action.data` as mentioned in the [Test Data](#21-test-data).
                 7. The expected response should be `LinkUpiAction = .selectBankAccount` with no errors `action.error==null` and an empty array for `action.data`.
                

            
### PIN set Successfully

                 For a successful PIN setup, follow these steps:
                 1. Enter a mobile number which exists in the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
                 3. The SDK response changes to `LinkUpiAction = .sendSms` with no errors `action.error==null`.
                 4. Call `action.registerDevice()` and send the SMS when prompted on the screen.
                 5. The SDK response changes to `LinkUpiAction = .selectBank` with no errors `action.error==null` and a list of available banks for selection `action.data != null`.
                 6. Call `action.selectedBank()` with Axis Bank or SBI Bank object from `action.data` as mentioned in the [Test Data](#21-test-data).
                 7. The expected response should be `LinkUpiAction = .selectBankAccount` with no errors `action.error==null` and a list of available bank accounts for selection `action.data != null`.
                 8. Call `action.selectedBankAccount()` with the bank account ending with xxxx0001 object from `action.data` as mentioned in the [Test Data](#21-test-data).
                 9. The expected response should be `LinkUpiAction = .setUpiPin` with no errors `action.error==null` and data available `action.data != null`.
                 10. Call `action.setUpiPin()` with bank account and card details data as mentioned in the [Test Data](#21-test-data).
                 11. Submit OTP (as mentioned in the Test Data) and New PIN on Mock NPCI screen.
                 12. The expected final response should be `LinkUpiAction = .linkAccountResponse` with no errors `action.error==null` and data available `action.data != null`. `action.data` will have a list of UPI Accounts for which PIN is already set and UPI ID linked. The list will include the newly linked account as the first object.
                

            
### PIN Changed Successfully

 
                 When you need to change your PIN successfully, follow these steps:
                 1. Call `razorpay.upiTurbo.changeUpiPin` with the specified upiAccount.
                 2. Submit the old and new PIN on the Mock NPCI screen.
                 3. Expect a callback with `onSuccess`. Your PIN change has been successfully completed.
                

            
### Invalid PIN or PIN not Matching

                 When dealing with an invalid PIN or a PIN that does not match, follow these steps:
                 1. Call `razorpay.upiTurbo.changeUpiPin` with the specified upiAccount.
                 2. Submit incorrect old and new PIN on the Mock NPCI screen.
                 3. Expect a callback with an error that is not null. This indicates that the provided PIN was either invalid or did not match the expected PIN.
                

            
### Incorrect OTP

                 In situations where an incorrect OTP is encountered, follow these steps:
                 1. Enter a mobile number which exists in the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
                 3. The SDK response should change to `LinkUpiAction = .sendSms` with `action.error==null` no errors.
                 4. Call `action.registerDevice()`, and send the SMS when prompted on the screen.
                 5. The SDK response should change to `LinkUpiAction = .selectBank` with `action.error==null` (no errors) and a list of available banks for selection  `action.data != null`.
                 6. Call `action.selectedBank()` with the Axis Bank or SBI Bank object from `action.data` as mentioned in the [Test Data](#21-test-data).
                 7. The expected response should be `LinkUpiAction = .selectBankAccount` with `action.error==null` (no errors) and a list of available bank accounts for selection `action.data != null`.
                 8. Call `action.selectedBankAccount()` with the bank account ending with xxxx0001 object from action.data as mentioned in the [Test Data](#21-test-data).
                 9. The expected response should be `LinkUpiAction = .setUpiPin` with `action.error==null` and action.`data != null`.
                 10. Call `action.setUpiPin()` with bank account and card details data as mentioned in the [Test Data](#21-test-data).
                 11. Submit any random incorrect OTP except for 123456 as mentioned in the [Test Data](#21-test-data) and the new PIN on the Mock NPCI screen.
                 12. The expected final response should be `LinkUpiAction = .linkAccountResponse` with `action.error!=null`.
                

            
### Incorrect Card Details (Reset PIN)

                 When dealing with resetting your PIN with incorrect card details, follow these steps:
                 1. Call the `razorpay.upiTurbo.resetUpiPin` method, providing an incorrect PIN and card details not mentioned in the [Test Data](#21-test-data).
                 2. Expect a callback, and if the response includes an error `error != nil`, it signifies that the reset attempt has failed due to incorrect card details.
                

         
        
    

            
### 2.3.5 UPI ID

                 
                    
                        UPI ID Present (Roaming Profile)
                        
                         When working with scenarios involving the presence of a UPI ID (Roaming Profile), follow these steps:
                         1. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
                         2. The SDK response should change to `LinkUpiAction = .sendSms` with `action.error==null` no errors.
                         3. Call `action.registerDevice()` and send the SMS when prompted on the screen.
                         4. The expected final response should be `LinkUpiAction = .linkAccountResponse` with `action.error==null` and `action.data != null`. `action.data` will contain a list of UPI Accounts for which the PIN is already set, and the UPI ID is linked.                       
                         

                    
### New UPI ID Creation

                         When dealing with scenarios related to UPI ID, such as new UPI ID creation, follow these steps:
                         1. Enter a mobile number which exists in the user's device.
                         2. Call the `razorpay.upiTurbo.linkNewUpiAccount` method.
                         3. The SDK response should change to `LinkUpiAction = .sendSms` with action.`error==null` no errors.
                         4. Call `action.registerDevice()` and send the SMS when prompted on the screen.
                         5. The SDK response should change to `LinkUpiAction = .selectBank` with `action.error==null` no errors and a list of available banks for selection `action.data != null`.
                         6. Call `action.selectedBank()` with Axis Bank or SBI Bank object from `action.data` as mentioned in the [Test Data](#21-test-data).
                         7. The expected response should be `LinkUpiAction = .selectBankAccount` with `action.error==null` no errors and a list of available bank accounts for selection `action.data != null`.
                         8. Call `action.selectedBankAccount()` with the bank account ending with xxxx0001 object from `action.data` as mentioned in the [Test Data](#21-test-data).
                         9. The expected final response should be `LinkUpiAction = .linkAccountResponse` with `action.error==null` and a`ction.data != null`. `action.data` will contain a list of UPI Accounts for which the PIN is already set, and the UPI ID is linked. The list will include the newly linked account as the first object. 
                        
  
                 
                
            

            
### 2.3.6 Transactions

                 
                    
                        Payments Successful
                        
                         When it comes to transactional scenarios, with a focus on ensuring a successful payment, follow these steps:
                         1. Begin by following the [integration steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui.md#1-integration-steps), specifically the `submit` method.
                         2. Enter an amount that is lower than the account balance.
                         3. Enter the correct PIN on the Mock NPCI screen.
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
                         1. Begin by following the [integration steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui.md#1-integration-steps), specifically the `submit` method.
                         2. Enter an amount lower than the account balance mentioned in [Test Data](#21-test-data).  
                         3. Enter the incorrect PIN on the Mock NPCI screen.
                         4. Subsequently, you will receive a callback on `onPaymentError`. This indicates that an error occurred during the payment process due to the invalid PIN.
                        

                    
### Timeout

                         When dealing with transactional scenarios, specifically focusing on handling timeouts, follow these steps:
                         1. Begin by following the [integration steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui.md#1-integration-steps), specifically the `submit` method.
                         2. Enter the amount as 24.
                         3. Enter the correct PIN on the Mock NPCI screen.
                         4. Subsequently, you will receive a callback on `onPaymentError`. This indicates that an error occurred during the payment process due to a timeout.
                        

                    
### Insufficient Balance

                         When it comes to transactional scenarios with a focus on handling insufficient balance, follow these steps:
                         1. Begin by following the [integration steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui.md#1-integration-steps), specifically the `submit` method.
                         2. Enter an amount greater than the account balance as mentioned in [Test Data](#21-test-data).
                         3. Enter the correct PIN on the Mock NPCI screen.
                         4. Subsequently, you will receive a callback on `onPaymentError`. This indicates that an error occurred during the payment process due to insufficient balance.  
                        

                    
### Show Balance

                         For scenarios related to checking your balance, follow these steps:
                         1. Call the `razorpay.upiTurbo.getBalance` method.
                         2. Enter the correct PIN on the Mock NPCI screen.
                         3. Expect a callback with `AccountBalance` and `error != nil`. This confirms that you will receive the requested balance information.
                        

                    
### Check Balance - Invalid PIN

                         When it comes to scenarios focused on checking your balance, follow these steps:
                         1. Call the `razorpay.upiTurbo.getBalance` method.
                         2. Enter an incorrect PIN on the Mock NPCI screen.
                         3. Expect a callback with `error != nil`. This indicates that an error occurred during the payment process due to the invalid PIN.
                        

                    
### Delink Account - Success

                         When it comes to scenarios related to delinking your account, follow these steps:
                         1. Call the `razorpay.upiTurbo.delink` method.
                         2. Expect a callback with `error != nil`. This confirms that your account has been successfully delinked.
                        

                 
                
             

    
### 2.3.7 Prefetch

         
            
                2.3.7.1 First Time Onboarding
                
                 
                    
                        Onboarding Success
                        
                         Follow these simple steps for the first time onboarding:
                         1. Enter a mobile number that exists on the user's device.
                         2. Call `razorpay.upiTurbo.prefetchAndLinkUpiAccounts` method.
                         3. The SDK's initial response should shift to `LinkUpiAction = .consent` with `action.error==null` indicating no errors and `action.data != null` showing a list of prefetch banks.
                         4. Prompt the user to grant the necessary consent by calling `action.consents([consent])`.
                         5. The SDK response should change to `LinkUpiAction = .sendSms` with `action.error==null` no errors.
                         6. Use `action.registerDevice()` to send the SMS when prompted on the screen.
                         7. After successful device binding, account fetching will commence automatically.
                         8. Expect the final response to be `LinkUpiAction = .linkAccountResponse` with `action.error==null` no errors and `action.data != null`. The `action.data` will contain `UpiAllAccounts` as a response, which includes `accountsWithPinSet` and `accountsWithPinNotSet`.
                         9. Once the account is successfully linked, you will receive a callback asynchronously in the `LinkUpiAction = .linkAccountResponse` with updated lists.
                        

                    
### Denied Prefetch Consent

                         For the first time onboarding, follow these steps:

                         1. Enter a mobile number that exists on the user's device.
                         2. Initiate the onboarding process by calling `razorpay.upiTurbo.prefetchAndLinkUpiAccounts` method.
                         3. Verify the SDK response, which should transition to `LinkUpiAction = .consent` with `action.error==null` indicating no errors and `action.data != null`, providing a list of prefetchBanks.
                         4. Proceed by calling `action.consents([consent])` with acknowledge set to false.
                         5. Check the SDK response, which should change to `LinkUpiAction = .sendSms` with `action.error==null` indicating no errors.
                         6. Use `action.registerDevice()` to send the SMS when prompted on the screen.
                         7. After successful device binding, expect the response to transition to `LinkUpiAction = .selectBank` with `action.error==null` indicating no errors and `action.data != null`, indicating a list of available banks for selection.
                        

                    
### PIN Set

                         Follow the below steps to set or manage your PIN:
                         1. Call the `action.setUpiPin(bankAccount, card)` method to select the desired bank account fetched during the prefetch process.
                         2. On the next screen, enter the bank OTP from the [Test Data](#21-test-data) and proceed.
                         3. Enter and confirm the PIN on the subsequent screens.
                        

                 
                
            
         
         
            
### 2.3.7.2 Accounts Already Onboarded

                 Follow these steps for accounts that are already onboarded:
                 1. Call the `razorpay.upiTurbo.prefetchAndLinkUpiAccounts` method.
                 2. After successful device binding, the expected SDK response should be `LinkUpiAction = .selectBank` with `action.error==null` and `action.data != null`. This response should not have any errors and should contain relevant data.
                

         
        
    

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

Complete this [Go-live Checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-noui.md#3-go-live-checklist) to take your integration live.
