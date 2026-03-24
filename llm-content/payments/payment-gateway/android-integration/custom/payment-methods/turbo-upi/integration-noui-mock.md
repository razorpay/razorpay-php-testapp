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

         1. Contact our [integrations team](mailto:integrations@razorpay.com) to get your app and GitHub account whitelisted to get access to the `https://github.com/upi-turbo/android-turbo-sample-app` - sample app repository.

             - In this repository, you will find the AAR files (libraries for Turbo) and the sample app source code to help you with the integration.
             - The AARs on the main branch are for the UAT environment, the ones on the prod branch are for the production environment, and the mock branch is for the mock environment.
            
             These are the important files in the sample app repo:

             - `app/libs`: All libraries (Bank, SecureComponent and Turbo) common for headless and UI SDK
             - `app/build.gradle`: All transitive dependencies needed to integrate Turbo SDK.

         2. Integrate with the [Razorpay Android Custom SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/build-integration.md).

         3. Import the following frameworks:

             - Razorpay Turbo Wrapper Plugin SDK (maven)
             - Razorpay Turbo Core SDK
             - Mock SDK

         4. Add the following lines to your Android project's `gradle.properties` file:

             - `android.enableJetifier=true`
             - `android.useAndroidX=true`

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          - `minSDKversion` for using Turbo UPI is currently 19 and cannot be overwritten.
>          - API Key Usage for Different Environments:
>              - Use the `rzp_test_0wFRWIZnH65uny` API key id for testing on the UAT environment.
>              - Use the `rzp_test_vacN5cmVqNIlhO` API key id for testing on the Mock environment.
>              - Use the [Razorpay live keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#live-mode-api-keys.md) for prod testing.
>          - As a compliance requirement, you need to get approval from Google for READ_SMS permission. Refer to the [Google article](https://support.google.com/googleplay/android-developer/answer/10208820?hl=en) for more details.
> 
>          

        

## 1. Integration Steps

Follow these steps to integrate with [Turbo UPI Headless](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui#1-integration-steps.md).

## 2. Test Integration

Razorpay has three environments: Mock, UAT and Prod. We recommend the following:

- Complete the integration with the Mock environment.
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
         3 | UPI ID generation | - UPI ID present
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
         8 | Prefetch and Link accounts | Fetch existing PIN set and PIN not set accounts | No account exists for that number.
        
     

### 2.3 How to Test?

Given are the various test cases and their sequential steps.

    
### 2.3.1 Device Binding Success

         In the scenario of successful device binding, follow these simple steps:
         1. Enter a mobile number that exists on the user's device.
         2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
         3. The SDK response should then transition to `UpiTurboLinkAction = ASK_FOR_PERMISSION` with `action.getError()==null` (no errors).
         4. The expected response should be `UpiTurboLinkAction = SELECT_BANK` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
        

    
### 2.3.2 SIM not found

         In the event of a SIM card not being found, follow these steps:         
         1. Remove all SIM cards from the device.
         2. Enter a mobile number that exists on the user's device.
         3. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
         4. The SDK response should then transition to `UpiTurboLinkAction = ASK_FOR_PERMISSION` with `action.getError()==null` (no errors).
         5. Grant all the required permissions as prompted.
         6. The expected response should be `UpiTurboLinkAction = SELECT_SIM` with `action.getError()!=null` (no errors).
        

    
### 2.3.3 Denied Permissions or Access Restricted

         When permissions are denied or access is restricted, follow these steps:
         1. Remove all SIM cards from the device.
         2. Enter a mobile number that exists on the user's device.
         3. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
         4. The SDK response should then trasition from `UpiTurboLinkAction = ASK_FOR_PERMISSION` with `action.getError()==null` (no errors).
         5. Deny the required permissions when prompted.
         6. The expected response should be `UpiTurboLinkAction = SHOW_PERMISSION_ERROR`.
        

    
### 2.3.4 Account Found

         In the scenario where an account is found, follow these steps:
         1. Enter a mobile number that exists on the user's device.
         2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
         3. The SDK response should then transition from `UpiTurboLinkAction = ASK_FOR_PERMISSION` with `action.getError()==null` (no errors).
         4. Grant the required permissions when prompted.
         5. After the permissions are granted, the SDK response should change to `UpiTurboLinkAction = SELECT_SIM` with `action.getError()==null` (no errors).
         6. Select Axis Bank or SBI Bank as mentioned in the [Test Data](#21-test-data).
         7. The expected response should be `UpiTurboLinkAction = SELECT_BANK_ACCOUNT` with `action.getError()==null` (no errors). 
        

    
### 2.3.5 PIN

         
            
                PIN set
                
                 When it comes to setting or managing your PIN, follow these steps:
                 1. Enter a mobile number that exists on the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
                 3. Check the response from SDK, which should switch from `UpiTurboLinkAction = ASK_FOR_PERMISSION` with `action.getError()==null` (no errors).   
                 4. Grant the necessary permissions when prompted.
                 5. The SDK response should then transition to `UpiTurboLinkAction = SELECT_BANK` with `action.getError()==null` (no errors). 
                 6. Subsequently, you will receive another SDK response of `UpiTurboLinkAction = SELECT_BANK` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                 7. Select SBI Bank as specified in the [Test Data](#21-test-data).
                 8. Following that, the SDK response should become `UpiTurboLinkAction = SELECT_BANK_ACCOUNT` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                 9. Select an account ending with xxxx0203.
                 10. Expect the final response to confirm that an account with a PIN is already set and the UPI ID is linked.
                

            
### PIN not set

                 When dealing with scenarios where a PIN is not set, follow these steps:
                 1. Enter a mobile number that exists on the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
                 3. Check the response from SDK, which should switch from `UpiTurboLinkAction = ASK_FOR_PERMISSION` with `action.getError()==null` (no errors). 
                 4. Grant the necessary permissions when prompted.
                 5. Subsequently, you will receive an SDK response of `UpiTurboLinkAction = SELECT_SIM` with `action.getError()==null` (no errors). 
                 6. Following that, you will receive another SDK response of `UpiTurboLinkAction = SELECT_BANK` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data. 
                 7. Choose SBI Bank as specified in the [Test Data](#21-test-data).
                 8. The SDK response should then become `UpiTurboLinkAction = SELECT_BANK_ACCOUNT` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data. 
                 9. Select an account ending with xxxx0001.
                 10. Expect the final response to be `UpiTurboLinkAction = SETUP_UPI_PIN` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data. 
               

            
### No Account for Specified Number

                 When there is no account associated with a particular number, follow these steps:
                 1. Enter a mobile number that exists on the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
                 3. Check the response from SDK, which should switch from `UpiTurboLinkAction = ASK_FOR_PERMISSION` with `action.getError()==null` (no errors). 
                 4. Grant the necessary permissions when prompted.
                 5. Subsequently, you will receive an SDK response of `UpiTurboLinkAction = SELECT_SIM` with `action.getError()==null` (no errors). 
                 6. Following that, you will receive another SDK response of `UpiTurboLinkAction = SELECT_BANK` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                 7. Select HDFC or Yes Bank as mentioned in the [Test Data](#21-test-data).
                 8. The expected response should be `UpiTurboLinkAction = SELECT_BANK_ACCOUNT` with `action.getError()==null` (no errors). 
                

            
### PIN set Successfully

                 For a successful PIN setup, follow these steps:
                 1. Enter a mobile number that exists on the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
                 3. Check the response from SDK, which should switch from `UpiTurboLinkAction = ASK_FOR_PERMISSION` with `action.getError()==null` (no errors). 
                 4. Grant the necessary permissions when prompted.
                 5. Subsequently, you will receive an SDK response of `UpiTurboLinkAction = SELECT_SIM` with `action.getError()==null` (no errors). 
                 6. Following that, you will receive another SDK response of `UpiTurboLinkAction = SELECT_BANK` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                 7. The SDK response should then become `UpiTurboLinkAction = SELECT_BANK_ACCOUNT` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                 8. Select an account ending with xxxx0001.
                 9. Following that, you will receive another SDK response of `UpiTurboLinkAction = SETUP_UPI_PIN` with `action.getError()==null` and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                 10. Enter the card details.
                 11. The expected final response should be `UpiTurboLinkAction = STATUS` with `action.getError()==null` and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                

            
### PIN Changed Successfully

                 When you need to change your PIN successfully, follow these steps:
                 1. Call the `razorpay.upiTurbo.changeUpiPin` method with the correct PIN.
                 2. Expect a callback `onSuccess`. Your PIN change has been successfully completed.
                

            
### Invalid PIN or PIN not Matching

                 When dealing with an invalid PIN or a PIN that does not match, follow these steps:
                 1. Call the `razorpay.upiTurbo.changeUpiPin` method with the correct PIN.
                 2. Expect a callback `onFailure`. This means the PIN provided was invalid or did not match the expected PIN.
                

            
### Incorrect OTP

                 In situations where an incorrect OTP is encountered, follow these steps:
                 1. Enter a mobile number that exists on the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
                 3. Check the response from SDK, which should switch from `UpiTurboLinkAction = ASK_FOR_PERMISSION` with `action.getError()==null` (no errors). 
                 4. Grant the necessary permissions when prompted.
                 5. Subsequently, you will receive an SDK response of `UpiTurboLinkAction = SELECT_SIM` with `action.getError()==null` (no errors). 
                 6. Following that, you will receive another SDK response of `UpiTurboLinkAction = SELECT_BANK` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                 7. Select SBI Bank as specified in the [Test Data](#21-test-data).
                 8. The SDK response should then become `UpiTurboLinkAction = SELECT_BANK_ACCOUNT` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                 8. Select an account ending with xxxx0001.
                 9. Following that, you will receive another SDK response of `UpiTurboLinkAction = SETUP_UPI_PIN` with `action.getError()==null` and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                 10. Enter the card details.
                 11. Enter any random OTP except for 123456.
                

            
### Incorrect Card Details(Reset PIN)

                 When dealing with resetting your PIN with incorrect card details, follow these steps:
                 1. Call the `razorpay.upiTurbo.resetUpiPin` method with incorrect PIN and card details that are not mentioned in the [Test Data](#21-test-data).
                 2. Expect a callback `onFailure`. This indicates that the reset attempt has failed due to incorrect card details.
                

         
        
    

            
### 2.5.6 UPI ID

                 
                    
                        UPI ID Present
                        
                         When working with scenarios involving the presence of a UPI ID, follow these steps:
                         1. Enter a mobile number that exists on the user's device.
                         2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
                         3. Check the response from SDK, which should switch from `UpiTurboLinkAction = ASK_FOR_PERMISSION` with `action.getError()==null` (no errors). 
                         4. Grant the necessary permissions when prompted.
                         5. Subsequently, you will receive an SDK response of `UpiTurboLinkAction = SELECT_SIM` with `action.getError()==null` (no errors). 
                         6. Following that, you will receive another SDK response of `UpiTurboLinkAction = SELECT_BANK` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                         7. Select SBI Bank as specified in the [Test Data](#21-test-data).
                         8. The SDK response should then become `UpiTurboLinkAction = SELECT_BANK_ACCOUNT` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                         9. Select an account ending with xxxx0203.
                         10. Expect the final response to confirm that an account with a UPI ID is linked successfully.                        
                         

                    
### New UPI ID Creation

                         When dealing with scenarios related to UPI ID, such as new UPI ID creation, follow these steps:
                         1. Enter a mobile number that exists on the user's device.
                         2. Call `razorpay.upiTurbo.linkNewUpiAccount` method.
                         3. Check the response from SDK, which should switch from `UpiTurboLinkAction = ASK_FOR_PERMISSION` with `action.getError()==null` (no errors). 
                         4. Grant the necessary permissions when prompted.
                         5. Subsequently, you will receive an SDK response of `UpiTurboLinkAction = SELECT_SIM` with `action.getError()==null` (no errors). 
                         6. Following that, you will receive another SDK response of `UpiTurboLinkAction = SELECT_BANK` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                         7. Select Axis Bank as mentioned in [Test Data](#21-test-data).
                         8. The SDK response should then become `UpiTurboLinkAction = SELECT_BANK_ACCOUNT` with `action.getError()==null`  and `action.getData != null`. This response should not have any errors, and it should contain some relevant data.
                         9. Select an account ending with xxxx0001.
                         10. Following that, you will receive another SDK response of `UpiTurboLinkAction = SETUP_UPI_PIN` with `action.getError()==null` and `action.getData != null`. This response should not have any errors, and it should contain some relevant data. 
                         11. Enter the card details.
                         12. The expected final response should be `UpiTurboLinkAction = STATUS` with `action.getError()==null` and `action.getData != null`. This response should not have any errors, and it should contain some relevant data. 
                        
  
                 
                
            

            
### 2.5.7 Transactions

                 
                    
                        Payments Successful
                        
                         When it comes to transactional scenarios, with a focus on ensuring a successful payment, follow these steps:
                         1. Begin by following the [integration steps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui#1-integration-steps.md), specifically the `submit` method.
                         2. Enter an amount that is lower than the account balance.
                         3. Enter the correct PIN.
                         4. Subsequently, you will receive a callback on `onPaymentSuccess`. This indicates that the payment has been successfully processed.  

                         
> **INFO**
>
> 
>                          **Handy Tips**
>                          
>                          The account balance remains unchanged, and the paid amount is not deducted in mock payment.
>                          

                        

                    
### Invalid PIN

                         In situations where an invalid PIN is entered, follow these steps:
                         1. Begin by following the [integration steps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui#1-integration-steps.md), specifically the `submit` method.
                         2. Enter an amount lower than the account balance mentioned in [Test Data](#21-test-data).  
                         3. Enter the incorrect PIN.
                         4. Subsequently, you will receive a callback on `onPaymentError`. This indicates that an error occurred during the payment process due to the invalid PIN.
                        

                    
### Timeout

                         When dealing with transactional scenarios, specifically focusing on handling timeouts, follow these steps:
                         1. Begin by following the [integration steps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui#1-integration-steps.md), specifically the `submit` method.
                         2. Enter the amount as 24.
                         3. Enter the correct PIN.
                         4. Subsequently, you will receive a callback on `onPaymentError`. This indicates that an error occurred during the payment process due to a timeout.
                        

                    
### Insufficient Balance

                         When it comes to transactional scenarios with a focus on handling insufficient balance, follow these steps:
                         1. Begin by following the [integration steps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui#1-integration-steps.md), specifically the `submit` method.
                         2. Enter an amount greater than the account balance as mentioned in [Test Data](#21-test-data).
                         3. Enter the correct PIN.
                         4. Subsequently, you will receive a callback on `onPaymentError`. This indicates that an error occurred during the payment process due to insufficient balance.  
                        

                    
### Show Balance

                         For scenarios related to checking your balance, follow these steps:
                         1. Call the `razorpay.upiTurbo.getBalance` method.
                         2. Enter the correct PIN.
                         3. Expect a callback on `onSuccess`. This confirms that you will receive the requested balance information.
                        

                    
### Check Balance - Invalid PIN

                         When it comes to scenarios focused on checking your balance, follow these steps:
                         1. Call the `razorpay.upiTurbo.getBalance` method.
                         2. Enter an incorrect PIN.
                         2. Expect a callback on `onFailure`. This indicates that an error occurred during the payment process due to the invalid PIN.
                        

                    
### Delink Account - Success

                         When it comes to scenarios related to delinking your account, follow these steps:
                         1. Call the `razorpay.upiTurbo.delink` method.
                         2. Expect a callback on `onSuccess`. This confirms that your account has been successfully delinked.
                        

                 
                
            

    
### 2.5.8 Prefetch

          
            
                2.5.8.1  First time onboarding
                
                 
                    
                        Onboarding Success
                        
                         Follow these simple steps for the first time onboarding:
                         1. Enter a mobile number that exists on the user's device.
                         2. Call `razorpay.upiTurbo.prefetchAndLinkUpiAccounts` method.
                         3. The SDK's initial response should shift to `UpiTurboLinkAction = ASK_FOR_PERMISSION` with `action.getError()==null` indicating no errors.
                         4. Prompt the user to grant the necessary permissions by calling `action.consents([consent]).requestPermission()`.
                         5. Upon successful device binding, the process of fetching accounts will commence.
                         6. Subsequently, expect the SDK's response to transition to `UpiTurboLinkAction = STATUS` with `action.getError()==null`, indicating no errors.
                         7. Once the account is successfully linked, you will receive a callback asynchronously in the `UpiTurboLinkAction=STATUS` with updated lists.
                        

                    
### Denied Prefetch Consent

                         Follow these simple steps for the first time onboarding:
                         1. Enter a mobile number that exists on the user's device.
                         2. Call `razorpay.upiTurbo.prefetchAndLinkUpiAccounts` method.
                         3. The SDK's initial response should shift to `UpiTurboLinkAction = ASK_FOR_PERMISSION` with `action.getError()==null` indicating no errors.
                         4. Call either `action.requestPermission()` or `action.consents([consent]).requestPermission()` with a `false` value in the consent object.
                         5. The device binding process is initiated, including SMS sending.
                         6. After successful device binding, the expected response should transition to `UpiTurboLinkAction = SELECT_BANK` with no errors `action.getError()==null` and should contain relevant data available `action.getData != null`.
                        

                    
### PIN Set

                         When it comes to setting or managing your PIN, follow these steps:
                         1. Call the `action.selectBankAccount(bankAccount, card)` method to select the desired bank account fetched during the prefetch process.
                         2. On the next screen, enter the bank OTP from the [Test Data](#21-test-data) and proceed.
                         3. Enter and confirm the PIN on the subsequent screens.
                        

                 
                
            
          
          
            
### 2.3.8.2 Accounts Already Onboarded

                 Follow these steps for accounts that are already onboarded:
                 1. Call the `razorpay.upiTurbo.prefetchAndLinkUpiAccounts` method.
                 2. The SDK response should transition to `UpiTurboLinkAction = SELECT_BANK` with `action.getError()==null` and `action.getData != null`. This response should not have any errors and should contain relevant data.
                

          
        
    

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
> 

### 2.4 Additional Cases

Businesses should have the capability to display a user-friendly message to their customers for certain special or additional error scenarios. The SDK is equipped to simulate some of these cases.

Action | Input Data | Code | Description
---
Pay | Amount = ₹24 | 91 | Timeout
---

### 2.5 TPV Cases

The following points are be considered for TPV flow:

- Only one TPV whitelisted account (ending with xxxx0203) is permitted. Payments made using any other accounts will fail with the error Payment failed because the account linked to VPA is invalid.
- Payment can be made multiple times when using Mock for any given `order_id`, which is not the case in production.
- Use the `rzp_test_V5AtnjYvupQXm1` API key id for TPV testing on the Mock environment.

## 3. Go-live Checklist

Complete this [Go-live Checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui/#3-go-live-checklist.md) to take your integration live.
