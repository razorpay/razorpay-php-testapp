---
title: Test Cards Details to Test Payments and Subscriptions
heading: Test Card Details
description: Use test cards to test Indian, international and EMI payments, and Subscriptions.
---

# Test Card Details

You can test the payment flow using our test cards.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> - You can use these test cards to make payments in **test** mode only.
> - Test mode may include OTP verification for certain payment methods to replicate the live payment experience.
> - No real money is deducted due to the usage of test API keys. This is a simulated transaction.
> - If you use these test cards for **live** mode payments, either of the following error message will be displayed: `card issuer is invalid` or `invalid card input`.
> 

Watch this video to see how to use the test card details.

[Video: https://www.youtube.com/embed/2VR0hXpF9RA?si=-meoxCcUgdK8sQsO]

    
### To use the test card details:

         1. At the Checkout, select Card as the payment method.
         1. Enter the **OTP** to access saved cards if required.
         1. Enter the card details. This depends on the flow you are testing.
         1. Enter any random CVV.
         1. Enter any future date as the expiry date.
         1. Click **Pay**. A sample payment page is displayed.
            - Enter a random **OTP** between 4 to 10 digits to make the payment successful and click **Submit**.
            - Enter a random **OTP** below 4 digits to fail the payment and click **Submit**.
        

Use the following cards for testing. You can use any random CVV and any future date as the expiry date.

## Test Cards for Indian Payments

Use the following test cards to test various payment scenarios for Indian payments. You can save any of the test cards below. The saved card flow allows customers to store their card details for future transactions. When a customer selects the option to save their card, Razorpay handles the tokenization process internally. Know more about [Saved Cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/features/saved-cards.md).

Network | Card Number | CVV & Expiry Date
---
Visa  | 4100 2800 0000 1007 | Use a random CVV and any future date ^^^^^
---
Mastercard | 5500 6700 0000 1002 | 
---
RuPay | 6527 6589 0000 1005 | 
---
Diners | 3608 280009 1007 | 
---
Amex | 3402 560004 01007 | 

### Error Scenarios

Use these test cards to simulate and test various error conditions for the following networks. Once you initiate the payment, in success/failure screen, you must select failure to get the right error. Know more about [Cards Error Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/payments/cards.md).

   
### BAD_REQUEST_ERROR

        
        Error reason | Error description | Network | Card number | CVV & expiry date
        ---
        `payment_timed_out` ^^ | Your payment could not be completed due to a temporary issue. Try again later. ^^ | Visa | 4100 2800 0009 0000 | Use a random CVV and any future date 
        ---
         | | Mastercard | 5305 6200 0006 0000 | Use a random CVV and any future date 
        ---
        `insufficient_fund` ^^ | Your payment could not be completed due to insufficient account balance. Try another card or payment method. ^^ | Visa | 4100 2800 0008 0001 | Use a random CVV and any future date 
        ---
        | | Mastercard | 5305 6200 0005 0001 | Use a random CVV and any future date 
        ---
        `payment_cancelled` ^^ | Your payment has been cancelled. Try again or complete the payment later. ^^ | Visa | 4100 2800 0007 0002 | Use a random CVV and any future date 
        ---
         | | Mastercard | 5305 6200 0004 0002 | Use a random CVV and any future date 
        ---
        `card_declined` ^^^^^^ | Your payment did not go through as it was declined by the bank. Try another payment method or contact your bank. ^^^^^^ | Visa | 4100 2800 0006 0003 | Use a random CVV and any future date 
        ---
         | | Mastercard | 5305 6200 0003 0003 | Use a random CVV and any future date 
        ---
         | | Visa | 4100 2800 0005 0004 | Use a random CVV and any future date 
        ---
         | | Mastercard | 5305 6200 0002 0004 | Use a random CVV and any future date 
        ---
         | | Visa | 4100 2800 0004 0005 | Use a random CVV and any future date 
        ---
         | | Mastercard | 5305 6200 0001 0005 | Use a random CVV and any future date 
        ---
        `card_disabled_for_`
`online_payments` ^^ | Your card is disabled for online payments.
Please reach to your bank or try with another card. ^^ | Visa | 4100 2800 0003 0006 | Use a random CVV and any future date 
        ---
         | | Mastercard | 5305 6200 0000 0006 | Use a random CVV and any future date 
        ---
        `card_number_invalid` ^^ | You have entered an incorrect card number. Try again. ^^ | Visa | 4100 2800 0001 0008 | Use a random CVV and any future date 
        ---
         | | Mastercard | 5305 6200 0008 0008 | Use a random CVV and any future date 
        
       

   
### GATEWAY_ERROR

        
        Error reason | Error description | Network | Card number | CVV & expiry date
        ---
        `gateway_technical_error` ^^ | Your payment did not go through due to a temporary issue. Any debited amount will be refunded in 4-5 business days. ^^ | Visa | 4100 2800 0002 0007 | Use a random CVV and any future date ^^^^
        ---
         | | Mastercard | 5305 6200 0009 0007 | 
        ---
        `authentication_failed` ^^ | Your payment could not be completed due to incorrect OTP or verification details. Try another payment method or contact your bank for details. ^^ | Visa | 4100 2800 0000 0009 | 
        ---
         | | Mastercard | 5305 6200 0007 0009 | 
        
       

## Test Cards for International Payments

Card Network | Card Number | CVV & Expiry Date
---
Mastercard | 5555 5555 5555 4444
5105 1051 0510 5100
5104 0600 0000 0008 | Use a random CVV and any future date ^^
---
Visa | 4012 8888 8888 1881 |

> **INFO**
>
> 
> **Handy Tips**
> 
> You may encounter an address collection window when using the Mastercard test card number `5105 1051 0510 5100` for international payments. To complete the test payment, provide the following address details:
> - **Address Line 1**: 21 Applegate Apartment
> - **Address Line 2**: Rockledge Street
> - **City**: New York
> - **State**: New York
> - **Country**: US
> - **Zipcode**: 11561
> 

## Test Cards for Subscriptions

Type | Card Network | Card Type | Card Number | CVV & Expiry Date
---
Domestic | Visa | Credit Card | 4718 6091 0820 4366 | Use a random CVV and any future date ^^^
---
International | Mastercard | Credit Card | 5104 0155 5555 5558 | 
---
International | Mastercard | Debit Card | 5104 0600 0000 0008 | 

## Test Card for EMI Payments

Card Network | Card Number | CVV & Expiry Date
---
Mastercard | 5241 8100 0000 0000 | Use a random CVV and any future date
