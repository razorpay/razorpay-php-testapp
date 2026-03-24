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

         1. Contact our [integrations team](mailto:integrations@razorpay.com) to get your mobile number, app, and GitHub account whitelisted to get access to the `https://github.com/upi-turbo/android-turbo-sample-app` - sample app repository.

            - `app/src/turboUI`: Sample app code for UI SDK
            - `app/libs`: All libraries (Bank, SecureComponent, and Turbo).
            - `app/uiLibrary`: Library for UI SDK. 
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

        

## 1. Integration Steps

Follow these steps to integrate with [Turbo UPI with UI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-ui#1-integration-steps.md).

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
         1 | Prefetch and Link Accounts | Fetch existing PIN set and PIN not set accounts | No account exists for that number.
         ---
         2 | Device Binding | Device Binding | - SIM not found
- SMS Sending failed
- Permissions not given

         ---
         3 | Account Linking | - Account found
- PIN set
- PIN not set
 | No account exists for that number.
         ---
         4 | UPI ID generation | - UPI ID present(roaming profile)
- New UPI ID creation
 | NA 
         ---
         5 | - UPI PIN Management
- Change PIN
- Reset PIN
 | PIN Changed/Set Successfully | - Invalid PIN
- PIN not matching
- Incorrect OTP
- Incorrect Card details(Reset PIN)

         ---
         6 | P2M Transaction - In-App Payments | Payment Successful | - Invalid PIN
- Timeout
- Insufficient Balance

         ---
         7 | Check Balance | Show Balance | Invalid PIN 
         ---
         8 | Delink Account | Success Only | NA
        
     

### 2.3 How to Test?

Given are the various test cases and their sequential steps.

    
### 2.3.1 Device Binding Success

         In the scenario of successful device binding, follow these simple steps:
         1. Enter a mobile number that exists on the user's device.
         2. Call `razorpay.upiTurbo.linkNewUpiAccountWithUI` method.
         3. Grant all the required permissions as prompted.
         4. The device binding process will initiate, including SMS sending.
         5. After successful device binding, a list of banks for selection will appear.
        

    
### 2.3.2 SIM not found

         In the event of a SIM card not being found, follow these steps:         
         1. Remove all SIM cards from the device.
         2. Call `razorpay.upiTurbo.linkNewUpiAccountWithUI` method.
         3. Grant all the required permissions as prompted.
         4. A screen will be displayed with the error message No SIM found.
        

    
### 2.3.3 Denied Permissions or Access Restricted

         When permissions are denied or access is restricted, follow these steps:
         1. Enter a mobile number that exists on the user's device.
         2. Call `razorpay.upiTurbo.linkNewUpiAccountWithUI` method.
         3. Deny the required permissions when prompted.
         4. A screen will be displayed, asking to allow the denied permissions.
        

    
### 2.3.4 Account Found

         In the scenario where an account is found, follow these steps:
         1. Enter a mobile number that exists on the user's device.
         2. Call `razorpay.upiTurbo.linkNewUpiAccountWithUI` method.
         3. Grant the required permissions when prompted.
         4. The device binding process will initiate, including SMS sending.
         5. After successful device binding, a list of banks for selection will appear.
         6. Select Axis Bank or SBI Bank as mentioned in the [Test Data](#21-test-data).
         7. The accounts based on the bank selection will be shown.
        

    
### 2.3.5 PIN

         
            
                PIN set
                
                 When it comes to setting or managing your PIN, follow these steps:
                 1. Enter a mobile number that exists on the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccountWithUI` method.
                 3. Grant the necessary permissions when prompted.
                 4. The device binding process will initiate, including SMS sending.
                 5. After successful device binding, a list of banks for selection will appear.
                 6. Select Axis Bank or SBI Bank as mentioned in the [Test Data](#21-test-data).
                 7. The accounts based on the bank selection will be shown.
                 8. Select the account ending with xxxx0203, as mentioned in the [Test Data](#21-test-data).
                 9. The account will be linked, and the PIN will be set successfully.
                

            
### PIN not set

                 When dealing with scenarios where a PIN is not set, follow these steps:
                 1. Enter a mobile number that exists on the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccountWithUI` method. 
                 3. Grant the necessary permissions when prompted.
                 4. The device binding process will initiate, including SMS sending.
                 5. After successful device binding, a list of banks for selection will appear.
                 6. Select Axis Bank or SBI Bank as mentioned in the [Test Data](#21-test-data).
                 7. The accounts based on the bank selection will be shown.
                 8. Select an account ending with xxxx0001, as mentioned in the [Test Data](#21-test-data).
                 9. A card details screen will be displayed.
               

            
### No Account for Specified Number

                 When there is no account associated with a particular number, follow these steps:
                 1. Enter a mobile number that exists on the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccountWithUI` method. 
                 3. Grant the necessary permissions when prompted.
                 4. The device binding process will initiate, including SMS sending.
                 5. After successful device binding, a list of banks for selection will appear.
                 6. Select HDFC or Yes Bank as mentioned in the [Test Data](#21-test-data).
                 7. A screen will appear with the error message No bank account found.
                

            
### PIN set Successfully

                 For a successful PIN setup, follow these steps:
                 1. Enter a mobile number that exists on the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccountWithUI` method.
                 3. Grant the necessary permissions when prompted.
                 4. The device binding process will initiate, including SMS sending.
                 5. After successful device binding, a list of banks for selection will appear.
                 6. Select Axis Bank or SBI Bank as mentioned in the [Test Data](#21-test-data).
                 7. The accounts based on the bank selection will be shown.
                 8. Select an account ending with xxxx0001, as mentioned in the [Test Data](#21-test-data).
                 9. A card details screen will be displayed. Enter the details from [Test Data](#21-test-data).
                 10. Enter bank OTP from [Test Data](#21-test-data) on the next screen then proceed.
                 11. Enter and confirm the PIN on the subsequent screens.
                

            
### Incorrect OTP

                 In situations where an incorrect OTP is encountered, follow these steps:
                 1. Enter a mobile number that exists on the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccountWithUI` method.
                 3. Grant the necessary permissions when prompted.
                 4. The device binding process will initiate, including SMS sending.
                 5. After successful device binding, a list of banks for selection will appear.
                 6. Select Axis Bank or SBI Bank as mentioned in the [Test Data](#21-test-data).
                 7. The accounts based on the bank selection will be shown.
                 8. Select an account ending with xxxx0001, as mentioned in the [Test Data](#21-test-data).
                 9. A card details screen will be displayed. Enter the details form [Test Data](#21-test-data)
                 12. Enter any random OTP except for 123456.
                

            
### Incorrect Card Details(Reset PIN)

                 When dealing with resetting your PIN with incorrect card details, follow these steps:
                 1. Enter a mobile number that exists on the user's device.
                 2. Call `razorpay.upiTurbo.linkNewUpiAccountWithUI` method.
                 3. Grant the necessary permissions when prompted.
                 4. The device binding process will initiate, including SMS sending.
                 5. After successful device binding, a list of banks for selection will appear.
                 6. Select Axis Bank or SBI Bank as mentioned in the [Test Data](#21-test-data).
                 7. The accounts based on the bank selection will be shown.
                 8. Select an account ending with xxxx0001, as mentioned in the [Test Data](#21-test-data).
                 9. Enter incorrect card details.
                                
                

         
        
    

 

    
### 2.3.6 UPI ID

            
                
                    New UPI ID Creation (PIN already set)
                    
                    For the scenario of creating a new UPI ID with an already set PIN, follow these steps:
                    1. Enter a mobile number that exists on the user's device.
                    2. Call the `razorpay.upiTurbo.linkNewUpiAccountWithUI` method.
                    3. Grant all the required permissions as prompted.
                    4. The device binding process will initiate, including SMS sending.
                    5. After successful device binding, a screen with a list of Banks will be displayed for Bank selection.
                    6. Select Axis Bank or SBI Bank as mentioned in the [Test Data](#21-test-data).
                    7. The accounts based on bank selection will be shown.
                    8. Select an account ending with xxxx0203, as mentioned in the [Test Data](#21-test-data).
                    9. Expect the final response to confirm that an account with a UPI ID is linked successfully.
                    

                
### New UPI ID Creation (PIN not set)

                    For the scenario of creating a new UPI ID without a set PIN, follow these steps:
                    1. Enter a mobile number that exists on the user's device.
                    2. Call the `razorpay.upiTurbo.linkNewUpiAccountWithUI` method.
                    3. Grant all the required permissions as prompted.
                    4. The device binding process will initiate, including SMS sending.
                    5. After successful device binding, a screen with a list of Banks will be displayed for Bank selection.
                    6. Select Axis Bank or SBI Bank as mentioned in the [Test Data](#21-test-data).
                    7. The accounts based on bank selection will be shown.
                    8. Select an account ending with xxxx0001, as mentioned in the [Test Data](#21-test-data).
                    9. A card detail screen will be displayed. Enter the details from [Test Data](#21-test-data).
                    10. Enter the bank OTP from [Test Data](#21-test-data) on the next screen, then proceed.
                    11. Enter and confirm the PIN on the subsequent screens.
                    

            
        
    

    
### 2.3.7 Transactions

                
                    
                        Payments Successful
                        
                         When it comes to transactional scenarios, with a focus on ensuring a successful payment, follow these steps:
                         1. Begin by following the [integration steps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-ui#1-integration-steps.md), specifically the `submit` method.
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
                         1. Begin by following the [integration steps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-ui#1-integration-steps.md), specifically the `submit` method.
                         2. Enter an amount lower than the account balance mentioned in [Test Data](#21-test-data).  
                         3. Enter the incorrect PIN.
                         4. Subsequently, you will receive a callback on `onPaymentError`. This indicates an error occurred during the payment process due to the invalid PIN.
                        

                    
### Timeout

                         When dealing with transactional scenarios, specifically focusing on handling timeouts, follow these steps:
                         1. Begin by following the [integration steps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-ui#1-integration-steps.md), specifically the `submit` method.
                         2. Enter the amount as 24.
                         3. Enter the correct PIN.
                         4. Subsequently, you will receive a callback on `onPaymentError`. This indicates that an error occurred during the payment process due to a timeout.
                        

                    
### Insufficient Balance

                         When it comes to transactional scenarios with a focus on handling insufficient balance, follow these steps:
                         1. Begin by following the [integration steps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-ui#1-integration-steps.md), specifically the `submit` method.
                         2. Enter an amount greater than the account balance as mentioned in [Test Data](#21-test-data).
                         3. Enter the correct PIN.
                         4. Subsequently, you will receive a callback on `onPaymentError`. This indicates an error occurred during the payment process due to insufficient balance.  
                        

                
            
    

    
### 2.3.8 Manage Accounts

         
            
                Show Balance
                
                  For scenarios related to checking your balance, follow these steps:

                 1. Enter a mobile number that is already registered on the device.
                 2. Call `razorpay.upiTurbo.manageUpiAccounts` method.
                 3. A list of linked accounts will be displayed.
                 4. Select the account for which you want to check the balance.
                 5. Click on Check Balance, then enter the correct PIN when prompted.
                 6. The balance for the selected account will be displayed.
                

            
### Check Balance - Invalid PIN

                  When it comes to scenarios focused on checking your balance, follow these steps:

                 1. Enter a mobile number that exists on the user's device.
                 2. Call the `razorpay.upiTurbo.manageUpiAccounts` method.
                 3. A list of linked accounts will be displayed.
                 4. Select the account for which you want to check the balance.
                 5. Click on Check Balance.
                 6. Enter an incorrect PIN when prompted.
                 7. An error message will be displayed indicating that the provided PIN is invalid or does not match the expected PIN.
                

            
### Delink Account - Success

                  When it comes to scenarios related to delinking your account, follow these steps:
                
                 1. Enter a mobile number that is already registered on the device.
                 2. Call `razorpay.upiTurbo.manageUpiAccounts` method.
                 3. A list of linked accounts will be displayed.
                 4. Select the account you wish to delink.
                 5. Click on the option to delink or remove the account.
                 6. A confirmation alert will be displayed, confirming that your account has been successfully delinked.
                

            
### Change PIN - Success

                 When it comes to successfully changing your PIN, follow these steps:

                 1. Enter a mobile number that is registered on the device.
                 2. Call `razorpay.upiTurbo.manageUpiAccounts` method.
                 3. A list of linked accounts will be presented.
                 4. Select the specific account for which you intend to change the PIN.
                 5. Click on Change PIN, and proceed to enter the current PIN, along with the new PIN, and confirm the new PIN on the subsequent screens.
                

            
### Change PIN - Failure

                 When attempting to change your PIN but encountering a failure, follow these steps:

                 1. Enter a mobile number that is registered on the device.
                 2. Call `razorpay.upiTurbo.manageUpiAccounts` method.
                 3. A list of linked accounts will be displayed.
                 4. Select the specific account for which you wish to change the PIN.
                 5. Click on Change PIN and proceed to enter an incorrect PIN, or enter a new PIN and a different PIN while confirming it.
                

            
### Reset PIN - Success

                 To successfully reset your PIN, proceed with the following steps:

                 1. Enter a mobile number that is registered on the device.
                 2. Call the `razorpay.upiTurbo.manageUpiAccounts` method.
                 3. View the list of linked accounts.
                 4. Select the specific account for which you wish to reset the PIN.
                 5. Click on Reset PIN and follow the prompts to input the bank OTP from the [Test Data](#21-test-data).
                 6. Enter the new PIN and confirm it on the subsequent screens.
                

         
        
    

    
### 2.3.9 Prefetch

         
            
                2.3.9.1 First Time Onboarding
                
                 
                    
                        Onboarding Success
                        
                         Follow these simple steps for the first time onboarding:
                            1. Enter a mobile number that exists on the user's device.
                            2. Call `razorpay.upiTurbo.prefetchAndLinkUpiAccountsWithUI` method.
                            3. Grant all the required permissions as prompted.
                            4. The device binding process is initiated, including SMS sending.
                            5. After the successful binding, a screen with a title **Fetching accounts** is displayed.
                            6. Expect a callback on `onResponse`. This callback contains 2 lists with PIN set and PIN not set accounts.
                            7. After an account is linked, the callback `onResponse` is received again asynchronously with updated lists.
                        

                    
### Denied Prefetch Consent

                            Follow these simple steps for the first time onboarding:
                            1. Enter a mobile number that exists on the user's device.
                            2. Call `razorpay.upiTurbo.prefetchAndLinkUpiAccountsWithUI` method.
                            3. Grant all the required permissions as prompted.
                            4. The device binding process is initiated, including SMS sending.
                            5. After the successful binding, a list of banks appear for selection.
                        

                    
### PIN Set

                            When it comes to setting or managing your PIN, follow these steps:
                            1. Call the `razorpay.upiTurbo.setUpiPinWithUI` method.
                            2. A card details screen is displayed. Enter the details from the [Test Data](#21-test-data) section.
                            3. Enter bank OTP from the [Test Data](#21-test-data) on the next screen and then proceed.
                            4. Enter and confirm the PIN on the subsequent screens.
                        

                 
                
            
            
### 2.3.9.2 Accounts Already Onboarded

                    Follow these steps for accounts that are already onboarded:
                    1. Call the `razorpay.upiTurbo.prefetchAndLinkUpiAccountsWithUI` method.
                    2. A list of banks appear for selection.
                    3. Select the bank you want to link the account to.
                

         
        
    

> **WARN**
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

Complete this [Go-live Checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-ui/#3-go-live-checklist.md) to take your integration live.
