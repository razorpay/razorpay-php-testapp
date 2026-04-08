---
title: RuPay Credit Card on UPI
description: Offer RuPay Credit Cards on UPI as a payment method to your customers.
---

# RuPay Credit Card on UPI

Leverage the full potential of UPI Payments by integrating RuPay Credit Cards. 

Watch this video to know more about RuPay credit card on UPI.

### Advantages

    
        - More touch points to make payments via their RuPay credit cards.
        - Easy to make credit card payments without the need to enter the card details and OTP for every transaction.
        - Carry out all RuPay credit card and bank account transactions without the need to carry a wallet.
    
    
        - Reduce costs associated with maintaining a POS device by efficiently managing RuPay credit card payment.
        - Increase in average spends per customer on UPI as customers tend to spend higher with credit cards. 
        - Enhance the payment experience for customers, ensuring a smoother process.
    

## Customer Fee Bearer

Customer Fee Bearer (CFB) on Credit Card on UPI is a payment feature that allows you to pass on processing fees to customers when they make UPI payments using their linked credit cards. This feature enables you to maintain your profit margins while offering customers the convenience of using credit cards through UPI for everyday transactions. The checkout will:

- Automatically detect when a customer selects UPI as the payment method.
- Display fee breakdown transparently before payment, showing the convenience fee separately from the order amount.
- Process payment seamlessly after customer confirmation.

> **INFO**
>
> 
> **Feature Enablement**
> 
> This is an on-demand feature. Contact your account manager or raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature enabled.
> 

    
### Advantages

         - **Cost Optimisation**: Pass processing fees directly to customers, protecting your margins while accepting premium payment methods.
         - **Expanded Customer Base**: Tap into the growing UPI credit card user segment who prefer credit over debit for rewards and cash flow benefits.
         - **Seamless Experience**: Customers enjoy the familiar UPI interface while accessing their credit lines.
         - **Higher Transaction Values**: Credit card users typically have higher spending capacity compared to debit card users.
        

### Prerequisites

- This feature is available on the Axis Switch gateway only.
- Integrate with [Razorpay Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md#integrate-payment-gateway-web-mobile-ecommerce-plugins).
- This feature is **not** available on UPI Collect method (NPCI restriction).
- Certain business categories are restricted as per NPCI guidelines. The following MCC codes cannot accept credit card payments on UPI:

  
### Restricted MCC codes

     
     MCC Code | Category
     ---
     6012 | Lending, NBFC, Cooperatives, Pension Fund
     ---
     4829 | Wire Transfers and Money Orders
     ---
     7322 | Debt Collection Agencies
     ---
     6010 | Forex
     ---
     6011 | ATMs
     ---
     6051 | Cryptocurrency
     ---
     6211 | Mutual Fund, Securities, Commodities, Trading
     ---
     7800 | Lottery
     ---
     7802 | Horse or Dog Racing
     ---
     7995 | Lottery and Betting
     
    

## Frequently Asked Questions (FAQs)

    
### 1. How can my customers link their RuPay Credit Cards to UPI?

         Linking a RuPay credit card to the UPI is similar to linking a savings bank account or debit card to UPI.

         To link a RuPay credit card to UPI, customers need to:
         1. Head over to the PSP app (BHIM, PhonePe, Paytm) on their smartphone. 
         2. Tap the **Add credit card** option and select the bank that has issued the RuPay credit card. 
         3. Enter the last six digits and validity details of their RuPay credit card. 
         4. To verify, they need to enter the OTP received via SMS on the registered mobile number. Once the verification is complete, they can set up the PIN.

         Their registration of RuPay credit cards on UPI will then be complete.
        

    
### 2. How will the customers make a UPI payment with RuPay Credit cards?

         To make a payment using RuPay credit card on UPI, the user must follow these steps:
         1. Select RuPay credit card as the payment option during the UPI payment process.
         2. Enter the UPI PIN set during the earlier process of linking the RuPay credit card.

         
> **WARN**
>
> 
>          **Watch Out!**
>     
>          To ensure a successful transaction, it is essential that the mobile number linked to the customer's UPI account is active on their smartphone and matches the mobile number linked to the credit card issued by their bank.
>          

        

    
    
    
### 3. How can I identify UPI payments made using RuPay credit cards?

         You can retrieve the details of the account type (bank account or credit card) used for UPI payments through the Payment Webhook, Fetch Payment API, and the Dashboard.

         1. **Payment Webhook**: The payment entity will now include the payer account type details. Refer to the [Payment Authorized Payload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md#payment-authorized).
         2. **Fetch Payment API**: The payment entity will now include the payer account type details. Refer to the [Fetch API sample code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#expanded-upi). 
            1. Click on a UPI payment to look at the details of the payment.
            2. The payment drawer will display the following information for Credit Card payments on UPI:
                1. Payment Method: UPI
                2. Payer Account Type: Credit card
                
        

    
    
### 4. What is the coverage of Credit Card acceptance via UPI?

         The following UPI apps support linking of RuPay credit cards to UPI:
         - BHIM
         - PhonePe 
         - Paytm

         In terms of bank coverage, RuPay card holders from the following issuing banks can link their credit cards to the UPI apps to make payments via RuPay credit cards on UPI:
         - Axis Bank
         - Bank of Baroda
         - Canara Bank
         - HDFC Bank
         - Indian Bank
         - Kotak Mahindra Bank 
         - Punjab National Bank
         - Union Bank
        

    
### 5. How do I enable Credit Card transactions via UPI for my business?

         Razorpay will take care of enabling this feature for you.
        

    
### 6. Will I be charged for Credit Cards transactions via UPI?

         We charge a small fee for all credit card transactions via UPI. Refer to our [pricing policy](https://razorpay.com/pricing/). 
         
        

    
### 7. Which businesses are currently not supported from accepting credit card payments on UPI?

         You will not be able to accept credit card payments on UPI if you fall under the following category:
         1. **Businesses on Customer fee bearer**
         2. **Restricted MCC codes** - NPCI will not support credit card payments on the following MCC codes. Businesses with these MCC codes will not be able to accept credit card payments on UPI.

         
         MCC | Category
         ---
         6010 | Financial institutions manual cash disbursements
         ---
         6012 | Financial institutions merchandise and services
         --- 
         6013 | Cash Withdrawal ICCW
         --- 
         7407 | P2PM CHANGES
         --- 
         7408 | Lending Platform
         --- 
         7409 | Digital account openings
         --- 
         6011 | Financial institutions automated cash disbursements
         ---
         6051 | Non-financial institutions foreign currency, money orders(not wire transfer), scrip and travellers checks
         --- 
         6211 | Securities brokers and dealers
         --- 
         7322 | Debt collection agencies
         --- 
         7800 | Government-Owned Lotteries
         --- 
         7801 | Government-Licensed On-Line Casinos (On-LineGambling)
         --- 
         7995 | Betting, including lottery tickets, casino gaming chips, off-track betting and wagers at race tracks
         --- 
         7802 | Government-Licensed Horse/Dog Racing
         --- 
         9406 | Government-Owned Lotteries (Specific Countries)
         ---
         4829 | Wire transfers and money orders
