---
title: Prepaid Wallets on UPI
description: Offer Prepaid Wallets on UPI as a payment method to your customers.
---

# Prepaid Wallets on UPI

Leverage the full potential of UPI Payments by integrating Prepaid Payment Instruments.
     
    Watch this video to know more about Prepaid Wallets on UPI.

[Video: https://www.youtube.com/embed/2z5vI3SL7uY?si=EPw3-M2404o34YNy]

    

### Advantages

    
     - Increased touch points to make payments via their prepaid wallets irrespective of the wallets integrated with your business.
     - Ease of completing wallet payments with better reach on UPI.
     - Store money in their wallet without worrying about the amount being stuck in the wallet.
    
    
     - Accept prepaid digital wallet payments without the costs of integration with a wallet issuer.
     - Experience a high success rate of one-step wallet transactions on UPI.
     - Enhance the payment experience for customers, ensuring a smoother process.
    

## Frequently Asked Questions (FAQs)

    
### 1. How can customers link their digital wallets to UPI?

         To link a wallet to UPI, customers need to:
         1. Head over to the wallet issuer app (Amazon Pay, PhonePe) on their smartphone. 
         2. Secure a VPA address issued by the wallet issuer through mobile number verification.
         3. Once the VPA address is assigned, the registration of the wallet on UPI is complete.

         
> **INFO**
>
> 
>          **Handy Tips**
>         
>          Only those who have completed the KYC verification process can link their wallets with UPI.
>          

        

    
### 2. How will the customer make a UPI payment with wallets?

         To make a payment via digital wallets on UPI:
         1. The customer can scan the UPI QR through their wallet app and make wallet payments on UPI. No UPI PIN is required while making a wallet transaction on UPI.
         2. The customer can also enter the VPA address or the phone number linked to their registered wallet on the checkout page to make UPI payments.

         
> **WARN**
>
> 
>          **Watch Out!**
>     
>          The mobile number linked to UPI should be in use on the smartphone and should be the same number linked to the wallet.
>          

        

    
### 3. How can I identify UPI payments made using prepaid wallets?

         You can retrieve the details of the account type (bank account or credit card) used for UPI payments through the Payment Webhook, Fetch Payment API, and the Dashboard.
         
         - **Payment Webhook**: The payment entity will now include the payer account type details. Refer to the [Payment Authorized Payload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md#payment-authorized).
         - **Fetch Payment API**: The payment entity will now include the payer account type details. Refer to the [Fetch API sample code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#expanded-upi). 
         - **On the Dashboard** :  
            1. Click on a UPI payment to look at the payment details.
            2. The payment drawer will display the following information for wallet payments on UPI:
                1. Payment Method: UPI
                2. Paid from: Wallet
                ![Image shows Wallet payment via UPI on Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/wallet-upi-dashboard.jpg.md)
         
         
        

    
### 4. What is the coverage of wallet acceptance via UPI?

         The following wallet issuers support linking wallets to UPI:
         - Amazon Pay
         - PhonePe 
         - Fampay
         - OneCard 

         In terms of bank coverage, the following banks will identify wallet transactions on UPI from **30th August 2023**:
         - Axis Bank
         - HDFC Bank
         - Yes Bank 
         - ICICI Bank
        

    
### 5. How do I enable wallet transactions via UPI for my business?

         Razorpay will take care of enabling this feature for you.
        

    
### 6. Will I be charged for wallet transactions via UPI?

         A Platform fee of 2% is levied for all wallet transactions via UPI. This pricing is determined by rates shared by banks and a wallet issuer service charge.
         
        

    
### 7. Which businesses are currently not supported from accepting wallet payments on UPI?

         You will not be able to accept wallet payments on UPI if you fall under the [**businesses on Customer fee bearer (CFB)**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/configuration/convenience-fees.md) category.
