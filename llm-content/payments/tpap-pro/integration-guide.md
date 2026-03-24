---
title: Integrate With TPAP Pro
description: Step-by-step guide on how to integrate with TPAP Pro.
---

# Integrate With TPAP Pro

Integrate TPAP Pro by following these steps:

1. [Integrate TPAP Pro Flows](#1-tpap-pro-flows)
2. [Follow Go-live checklist](#2-follow-go-live-checklist)

## 1. TPAP Pro Flows

Following are the flows available on our TPAP stack:

   
### Customer Onboarding

		 Customer onboarding is a process of binding and registering the customer device by validating the mobile number. The customer's payment sources are linked to ensure seamless and hassle-free transactions. Additionally, You must create a fingerprint that acts as a unique identifier generated based on various attributes of the device. Know more about [customer onboarding](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/customer-onboarding.md).

         
            
                Create a Device Fingerprint
                
                 Create an unique identifier using various attributes of the device. This identifier is used to recognise the specific device during subsequent transactions.
                 
                 To generate a device fingerprint for the customer:
                 1. Create a string with the following fields separated by a pipe (|).

                    
                    Attributes | Description
                    ---
                    SSID | A sim subscriber id from the native sim module.
                    ---
                    APP.ID | The package name of the app.
                    ---
                    device.UUID | The advertisement id on Android.
                    ---
                    mobile_number | Customer’s phone number present on the device.
                    ---
                    customer_reference | The customer reference.
                    ---
                    timestamp | The current time in the UNIX timestamp. Ensure to pass the same timestamp in the request header for `x-device-fingerprint-timestamp`.
                    

                    ```html: Code
                    SSID|APP.ID|device.UUID|mobile_number|merchantCustomerId|timestamp
                    ```
                 2. Hash this string using the SHA-256 algorithm.

                    ```java: Java
                    deviceFingerprintPayload =      
                    ""MessageDigest digest = MessageDigest.getInstance("SHA-256");
                    byte[] deviceFingerprint = digest.digest(deviceFingerprintPayload.getBytes(StandardCharsets.UTF_8));
                    ```
                 3. Send the timestamp within the headers.
                

            
### Device Binding Status

                The following table lists the different device binding status and their description. Know more about [device binding](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/customer-onboarding/bind-device.md).
                
                Status | Step | Description
                ---
                `mobile_verification_pending` | mobile_verification | The mobile number verification is still pending by the receiver. This means the PSP is yet to receive a callback from the entity that is supposed to verify the number. You must poll the API again.
                ---
                `mobile_verification_expired` | mobile_verification | PSP did not receive a callback from the entity that is supposed to verify the number within the expiry time. Hence, the device binding has expired. This is a terminal failure status, and you must stop polling.
                ---
                `mobile_verification_mismatch` | mobile_verification | The customer mobile number received from the entity that is supposed to verify the number differs from the one you passed. This is a terminal failure status, and you can stop polling.
                ---
                `verified` | mobile_verification | The verification is successful.
                ---
                `mobile_verification_failed` | mobile_verification | The mobile verification is failed due to the invalid device details.
                ---
                `device_already_verified` | device_binding | The device is already verified.
                
              

         
		
	
   
### Funds and Accounts Management

		 Funds and accounts management helps you manage payment sources and providers. The Razorpay APIs let you add more accounts, delete existing accounts and change PINs for accounts for hassle-free transactions. Know more about [managing funds and accounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/funds-account-management.md).
		

   
### Payments

       The Payment module enables you to make various transactions using payment APIs. Below are the supported transaction types:
       - [Make Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/payments-flow/make-payments.md): Facilitate P2P (peer-to-peer) or P2M (peer-to-merchant) payments. The supported payment transfer types are:
         - Pay from a VPA to VPA.
         - Pay from a VPA to a payment source.
         - Pay from a payment source to a VPA.
         - Pay from one payment source to another.
       
         This API lets you enable the following payment options for customers:
         - **Scan and Pay (UPI QR & Bharat QR):** Customers can QR codes and make payments.
         - **Intent Payment:** Customers can make payment through an intent link.
         - **Payment to a PSP merchant:** Customers can make a payment using the merchant VPA.
         - **P2P Pay (VPA and Account+IFSC):** A person can pay to another person using a TPAP.
         - **Self Pay:** Customers can make transactions between their own accounts.
       - [Collect Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/payments-flow/collect-payments.md): This API lets you collect payments from others.
       - [Approve Collect Requests](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/payments-flow/approve-collect-requests.md): This API lets you approve payment collect requests.
       - [Reject Collect Requests](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/payments-flow/reject-collect-requests.md): This API lets you reject payment collect requests.
		

   
### Mandates

       You can create and manage mandates using the Razorpay APIs. Know more about [managing mandates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/mandate-flow.md).
		

   
### Complaints API

       The Complaints API enables efficient handling of transaction-related issues.
       
         
            Raise Complaint
            
             Submit complaints about transactions to ensure prompt resolution.
            

         
### Check Complaint Status

             Track the progress and status of submitted complaints.
            

       
      
   
   
### UPI Mapper

       UPI Mapper provides a 1:1 mapping between VPAs and mobile or UPI numbers, enabling efficient and streamlined identification.
      

   
### Credit Card on UPI

       Enable credit card payments via UPI for enhanced flexibility. All features of account management apply to credit cards as well.
      

   
### UPI One-time Mandate

       Authorise one-time payments for specific transactions, offering greater flexibility and control.
      

   
### Credit Lines on UPI

       Enable transactions using pre-approved credit lines, helping users manage finances more effectively.
      

   
### UPI Lite

       Support low-value transactions with a simplified process, ensuring quick and seamless payments.

       
         
            Activation of Lite Service
            
             The user enables UPI Lite through their UPI app, and the request is processed via PSP, NPCI, and the bank, ensuring activation.
             ![TPAP Pro UPI Lite Activation Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/tpap-upilite-activation.jpg.md)
            

         
### Payment via UPI Lite

             The user makes a low-value transaction using UPI Lite, where the amount is deducted instantly from their Lite balance without requiring bank authentication.
             ![Payment VIA UPI Lite](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-via-upilite.jpg.md)
            

         
### Disabling UPI Lite Service with Non-Zero Balance

             If the user disables UPI Lite with a remaining balance, the amount is credited back to their linked bank account before deactivation.
             ![Disabling UPI Lite Service with Non-Zero Balance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/disabling-upilite-services.jpg.md)
            

       
      
   
   
### Global UPI

       Enable international UPI payments, making cross-border transactions smooth and hassle-free.
      

## 2. Follow Go-live Checklist

Consider the following steps before taking your integration live.

	
### Switch Test API Keys With Live API Keys

		 After confirming if your integration is working successfully, you can take the integration live by switching the Test Mode API Keys with the Live Mode Keys.

		 Watch this video to know how to generate Live API keys:

		 
[Video: https://www.youtube.com/embed/30REpNtYSak?si=j9Lm_y-D4bwTspv6]

		

	
### Subscribe to Webhooks

	 [Set up Razorpay Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md) to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL.
	

## Header Information

Below are the headers you should pass while polling different APIs.

Header Name | Data Type | Mandatory/Optional | Description
---
Authorisation | string | Mandatory | The standard authorisation.
---
Content Type | string | Mandatory | The content type. Supported value: `application/json`.
---
x-device-fingerprint | string | Mandatory | The device fingerprint used to validate the request coming from the expected device.
---
x-device-fingerprint-timestamp | string | Mandatory | The UNIX timestamp to generate the device fingerprint.
---
x-customer-reference | string | Mandatory | The unique identifier of the customer created by TPAP.
