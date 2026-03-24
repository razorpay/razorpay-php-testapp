---
title: RazorpayX | Payouts to Cards
heading: Payouts to Cards
description: Make payouts directly to a debit or a credit card using RazorpayX Lite.
---

# Payouts to Cards

With RazorpayX, you can make payouts directly to a credit card, debit card, or prepaid card. The process of making a payout to a card is the same as other payouts.

Payouts via IMPS, NEFT, and UPI are supported on both RazorpayX Lite and Current Account. Payouts via `card` mode is supported **RazorpayX Lite**. According to the RBI guidelines, merchants cannot save their customer’s card credentials (card number & other card data) on their own servers. You can either:

- Make a payout via RazorpayX payouts to cards APIs **without saving the card number**. You have to collect the card number from the customer each time a payout is made.
- Save a card number with a tokenisation service like [Razorpay TokenHQ](https://razorpay.com/card-tokenisation/). Payouts to these tokenised cards can be made using the ‘card’ mode on RazorpayX. 

  
### Payouts to Tokenised Cards

     [Tokenisation](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/token-hq/razorpay-requestor-with-network-tokens.md) is the process by which the original card number / Primary Account Number is replaced with a surrogate value called a `token`. According to the recent RBI guidelines, Payment Aggregators (PA)/ Payment Gateway (PG) and businesses cannot save their customers' card numbers and other card data on their servers. Hence, you can save card numbers and make payouts to it only by creating tokens. 

     You can create tokens using:

     - [External Tokenization Providers](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts-cards/create/save-card/external-token/payout.md)
     - [Razorpay TokenHQ](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts-cards/create/save-card/razorpay-tokenhq/payout.md)

     
> **WARN**
>
> 
>      **Watch Out!**
> 
>      - Payouts via IMPS, NEFT and UPI are not supported via tokenised cards.
>      - Token expiry month and year are mandatory in case of external service provider.
>      - Payouts to tokenised cards is supported only for limited issuers on Visa and Mastercard. They are not supported via bank rails. Its only supported for the mode `card`.
>      - Bank issuers/networks for payouts to tokenised and non-tokenised is different.
>      - Bank issuers/networks for payouts via bank modes and `card` mode (Payouts via network rails).
>      

    

 

> **INFO**
>
> 
> **Handy Tips**
> 
> This feature is not enabled by default. Raise a request using the support form on the RazorpayX Dashboard to enable this feature for your account.
> 

## Actions
The table below lists the various Payout to Card actions you can perform using the Dashboard, API and Bulk Upload:

Action | API | Dashboard | Bulk Upload
---
Create a payout to a card | ✓ | x | x
---
View payout details | ✓ | ✓ | x
---

Know more about [creating payouts to cards using APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts-cards.md).

## Supported Networks and Banks

If the payouts are made via cards that are not mentioned in the list, the payout creation request will fail. You can use payouts to cards without a compliance certificate in Test mode upon [request](https://razorpay.com/support/).

### Card Networks

Card payouts are supported on the below card networks:
- Diners Club
- Mastercard
- Visa
- Amex

> **WARN**
>
> 
> **Watch Out!**
> 
> Payouts via **Visa Direct** and **MasterCard Send** are temporarily unavailable. Please watch this space for further updates. 
> 
> *This is the latest version of the bank list and was last updated on April 24, 2023*.
> 

    
### Payouts via Bank Transfer

         You can make payouts via bank transfers using this traditional bank transfers such as NEFT, IMPS, and UPI. This method of making payouts via bank transfers is possible only for non-tokenised cards. Payment is supported on all card networks, but only for credit cards. Here is a list of banks and the supported payout mode:

         

         Issuer Bank Name | Issuer Bank Code | Supported Method
         ---
         RBL | RATN | NEFT
         ---
         State Bank of India | SBIN | NEFT
         ---
         Axis Bank | UTIB | NEFT
IMPS
         ---
         HDFC Bank | HDFC | IMPS
NEFT
         ---
         ICICI Bank | ICICI | NEFT
UPI
         ---
         Andhra Bank | ANDB | IMPS
NEFT
         ---
         Bank of America | BOFA | NEFT
         ---
         Bank of Baroda | BARB | NEFT
         ---
         Bank of India | BKID | NEFT
         ---
         Canara Bank | CNRB | NEFT
         ---
         Citibank | CITI | NEFT
         ---
         Corporation Bank | CORP | NEFT
         ---
         HSBC Bank | HSBC | NEFT
         ---
         IDBI Bank | IBKL | NEFT
         ---
         Indian Overseas Bank | IOBA | NEFT
         ---
         IndusInd Bank | INDB | IMPS
NEFT
         ---
         Kotak Mahindra Bank | KKBK | IMPS
NEFT
         ---
         Punjab National Bank | PUNB | NEFT
         ---
         Syndicate Bank | SYNB | NEFT
         ---
         Union Bank of India | UBIN | NEFT
         ---
         Yes Bank | YESB | NEFT
         ---
         American Express | AMEX | IMPS
NEFT
UPI
         
        

    
### Payout via Card Networks

         The list of banks that support payouts to cards are as follows:

         
         Issuer Bank Name | Issuer Bank Code | Network | Card Type
         ---
         Airtel Payments Bank | AIRP | Mastercard Send | Debit
         ---
         Axis Bank | UTIB | Visa Direct
Mastercard Send | Debit
         ---
         Bank of India | BKID | Visa Direct | Debit
         ---
         Bank of Maharashtra | MAHB | Visa Direct | Debit
         ---
         Canara Bank | CNRB | Visa Direct
Mastercard Send | Debit
         ---
         Central Bank of India | CBIN | Mastercard Send | Debit
         ---
         Corporation Bank | CORP | Visa Direct | Debit
         ---
         Development Credit Bank Ltd | DCBL | Visa Direct | Debit
         ---
         Federal Bank | FDRL | Visa Direct
Mastercard Send | Debit
         ---
         ICICI Bank | ICIC | Visa Direct | Debit
         ---
         IDBI Bank | IBKL | Visa Direct
Mastercard Send | Debit
         ---
         IDFC Bank | IDFB | Visa Direct | Debit
         ---
         Indian Bank | IDIB | Mastercard Send | Debit
         ---
         IndusInd Bank | INDB | Visa Direct
Mastercard Send | Debit
Credit
         ---
         J & K Bank | JAKA | Mastercard Send | Debit
         ---
         Kotak Bank | KKBK | Visa Direct | Debit
         ---
         Oriental Bank of Commerce | ORBC | Visa Direct | Debit
         ---
         RBL Bank | RATN | Mastercard Send | Debit
         ---
         State Bank of India | SBIN | Visa Direct
Mastercard Send | Debit
Credit
         ---
         Standard Chartered Bank | SCBL | Visa Direct
Mastercard Send | Debit
Credit
         ---
         Syndicate Bank | SYNB | Mastercard Send | Debit
         ---
         The Federal Bank Ltd | FDRL | Visa Direct | Debit
         ---
         The South Indian Bank Ltd | SIBL | Visa Direct | Debit
         ---
         Yes Bank | YESB | Mastercard Send | Debit
Credit
         ---
         
        

### Related Information

- [About Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts.md)
- [Payout Status Details](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md)
- [Payout Best Practices](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/best-practices.md)
