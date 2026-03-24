---
title: CVV-less Flow for Card Payments
description: Save customer card details as tokens and enable CVV-less payment flows for customers via Razorpay.
---

# CVV-less Flow for Card Payments

You can offer CVV-less payments for saved cards and let your customers complete a payment without the card CVV. CVV-less card payments are simple, fast and secure, and do not require the customers to remember the CVV. *Offering CVV-less saved card flows to your customers can increase the conversion rate by 4%.*

We encourage the businesses to remove the CVV box on the checkout page. If you are live on Razorpay Standard Checkout, the UI changes reflect automatically. The customer can choose their saved cards as their preferred payment option and experience a faster transaction.

![CVV Less Card Payment Flow GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pm-cvv-otp-less.gif.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> CVV-less payments on RuPay is an on-demand feature. 
> 

## Frequently Asked Questions (FAQs)

  
### 1. How can I handle the CVV field for Razorpay payments with saved cards?

      The CVV field is optional by default for saved card payments on all networks. To implement this change, you can skip passing the CVV field in the payment request to this field to Razorpay.
    

  
### 2. Does this mean I no longer need to accept CVV from customers?

     Yes. You need to make the necessary UI changes to stop accepting CVV from your customers on saved card payments only.
    

  
### 3. Do all networks support CVV-less flow?

     CVV-less flow is supported for tokenised payments on all networks: Visa, Mastercard, RuPay, Amex and Diners. 
    

  
### 4. Which card issuers support CVV-less payments?

     Besides Rupay cards, all issuers support CVV-less payments on other networks. For Rupay, given below is the list of supported issuers:

     
      S No. | Issuing Bank Name
      ---
      1 | AXIS BANK
      ---
      2 | ICICI BANK
      ---
      3 | KOTAK MAHINDRA BANK
      ---
      4 | STATE BANK OF INDIA
      ---
      5 | UNION BANK OF INDIA
      ---
      6 | BANK OF BARODA
      ---
      7 | HDFC BANK
      ---
      8 | CANARA BANK
      ---
      9 | IDBI BANK
      ---
      10 | THE FEDERAL BANK
      ---
      11 | UCO BANK
      ---
      12 | CENTRAL BANK OF INDIA
      ---
      13 | IDFC Bank
      ---
      14 | BANDHAN BANK
      ---
      15 | KARNATAKA BANK
      ---
      16 | YES BANK LIMITED
      ---
      17 | THE BHARAT COOP BANK
      ---
      18 | INDIA POST PAYMENTS BANK
      ---
      19 | UTKARSH SMALL FINANCE BANK
      ---
      20 | CITIZEN CREDIT COOPERATIVE BANK
      ---
      21 | SARASWAT COOPERATIVE BANK
      ---
      22 | BARODA UP BANK
      ---
      23 | TAMILNAD MERCANTILE BANK
      ---
      24 | THE TAMILNADU STATE APEX COOP BANK
      ---
      25 | THE KALUPUR COMMERCIAL CO OP BANK
      ---
      26 | THE JAMMU AND KASHMIR BANK
      ---
      27 | J AND K GRAMEEN BANK
      ---
      28 | THE MUNICIPAL CO OP BANK
      ---
      29 | PAYTM PAYMENTS BANK
      ---
      30 | KERALA GRAMIN BANK
      ---
      31 | MAHARASHTRA GRAMIN BANK
      ---
      32 | MIZORAM RURAL BANK
      ---
      33 | CHHATTISGARH RAJYA GRAMIN BANK
      ---
      34 | THE CITIZENS URBAN CO OP BANK LTD JALANDHAR
      ---
      35 | RAJASTHAN MARUDHARA GRAMIN BANK
      ---
      36 | SARVA HARYANA GRAMIN BANK
      ---
      37 | ELLAQUAI DEHATI BANK
      ---
      38 | MADHYANCHAL GRAMIN BANK
      ---
      39 | ANDHRA PRAGATHI GRAMEENA BANK
      ---
      40 | ASSAM GRAMIN VIKAS BANK
      ---
      41 | ODISHA GRAMYA BANK
      ---
      42 | BARODA GUJARAT GRAMIN BANK
      ---
      43 | BARODA RAJASTHAN KSHETRIYA GRAMIN BANK
      ---
      44 | KARNATAKA GRAMIN BANK
      ---
      45 | JHARKHAND RAJYA GRAMIN BANK
      ---
      46 | SAURASHTRA GRAMIN BANK
      ---
      47 | THE KARNATAKA STATE COOPERATIVE APEX BANK
      ---
      48 | THE DISTRICT CO OP BANK LTD DEHRADUN
      ---
      49 | KOOKMIN BANK
      ---
      50 | AMBARNATH JAIHIND COOP BANK
      ---
      51 | KARNATAKA VIKAS GRAMEENA BANK
      ---
      52 | RAIGANJ CENTRAL COOP BANK
      ---
      53 | SANGLI URBAN COOP BANK
      ---
      54 | THE KURMANCHAL NAGAR SAHAKARI BANK
      ---
      55 | UTKAL GRAMEEN BANK
      ---
      56 | CHAITANYA GODAVARI GRAMEENA BANK
      ---
      57 | FINCARE SMALL FINANCE BANK
      ---
      58 | JANA SMALL FINANCE BANK LTD
      ---
      59 | THE MEGHALAYA COOPERATIVE APEX BANK
      ---
      60 | ARUNACHAL PRADESH RURAL BANK
      ---
      61 | INDUSIND BANK
      ---
      62 | MEGHALAYA RURAL BANK
      ---
      63 | TELENGANA GRAMEENA BANK
      ---
      64 | ANDHRA PRADESH GRAMEENA VIKAS BANK
      ---
      65 | BHOPAL COOPERATIVE CENTRAL BANK
      ---
      66 | FINGROWTH COOP BANK 
      ---
      67 | IRINJALAKUDA TOWN CO OPERATIVE BANK
      ---
      68 | JILA SAHAKARI KENDRIYA BANK MARYADIT DURG
      ---
      69 | KOLAR AND CHIKBALLAPURA DISTRICT CENTRAL COOPERATI
      ---
      70 | KRISHNA BHIMA SAMRUDDHI AREA  BANK
      ---
      71 | UTTARAKHAND GRAMIN BANK
      ---
      72 | CHIKMAGALUR PATTANA SAHAKARA BANK NIYAMITHA
      ---
      73 | COASTAL LOCAL AREA BANK
      ---
      74 | COL RD NIKAM SAINIK SAHAKARI BANK
      ---
      75 | JILA SAHAKARI KENDRIYA BANK MARYADIT DHAR
      ---
      76 | JILA SAHAKARI KENDRIYA BANK MYDT AMBIKAPUR AS ISSU
      ---
      77 | MALDA DISTRICT CENTRAL COOP BANK
      ---
      78 | MUGBERIA CENTRAL COOP BANK
      ---
      79 | THE BELLARY DISTRICT COOP CENTRAL BANK
      ---
      80 | THE DAKSHIN DINAJPUR DISTRICT CENTRAL COOP BANK
      ---
      81 | THE HASSAN DISTRICT COOP CENTRAL BANK
      ---
      82 | THE JAIPUR CENTRAL COOP BANK
      ---
      83 | THE JUNAGADH JILLA SAHAKARI BANK
      ---
      84 | THE SABARKANTHA DIST CENTRAL COOP BANK
      ---
      85 | THE WEST BENGAL STATE COOP BANK
      ---
      86 | UTTARAKHAND STATE COOP BANK
     
    

  
### 5. I have integrated with Standard Checkout on Razorpay. How does this feature impact me?

     CVV-less flow will be automatically enabled for Visa, Mastercard and American Express cards on Razorpay Standard Checkout.
    

  
### 6. I have integrated with Custom Checkout/S2S on Razorpay. How does this feature impact me?

     If you are integrated with Razorpay’s Custom Checkout/S2S APIs, you need not pass CVV to Razorpay for tokenised payments mandatorily. Update your integration as follows:
       - Modify the UI to stop collecting CVV from customers.
       - For tokenised payments, the CVV field in the cards object can either be:
          - null
          - empty
          - removed entirely.

      
> **WARN**
>
> 
>       **Watch Out!**
>       
>       Do not pass dummy CVV values.
>       

    

  
### 7. I use Juspay to route card payments to Razorpay. Can I stop sending the CVV to Juspay?

    
     In this case, Juspay must send CVV-less card payments via Razorpay. We recommend you reach out to your Juspay POC.
    

  
### 8. CVV validation was a mandatory step until now. Does this feature compromise my customer’s security?

     The new RBI guidelines for the **Card on File Tokenization (CoFT)** process ensure enhanced card security. Your customer’s card details are securely encrypted and stored, with access to only card networks and issuing banks. Considering this, Visa and Amex have made CVV validation optional for tokenised cards. This change is 100% compliant with all RBI regulations about card security. 
    

  
### 9. What is Tokenisation?

     Tokenisation is the process by which the original card number / Primary Account Number (PAN) is replaced with a surrogate value called a **token**. Razorpay’s RBI-compliant TokenHQ solution allows cardholders to tokenise their cards and securely process transactions through the tokenised cards. To know more about TokenHQ, 
    

  
### 10. Is this change applicable only to specific transactions, for example, less than INR 2000?

     CVV-less flows are applicable to all tokenised transactions for all networks, irrespective of the payment amount.
    

  
### 11. Why is this introduced only on saved cards? Why not all cards?

     One of the ways cardholder authenticity and security are maintained for CVV-less transactions is via their consent and authorisation at the time of saving their card. Plain card payments still need to maintain cardholder security by mandating the CVV.
