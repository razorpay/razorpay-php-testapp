---
title: Payment Method Error Parameters
description: List of values for Source and Step parameters for each payment method supported by Razorpay.
---

# Payment Method Error Parameters

There are certain error codes specific for each payment method supported by Razorpay. To understand the errors and their `reasons`, it is recommended to know the `source` (stakeholders) and the `steps` involved in the payment flows:

-   [Cards](#cards)
-   [UPI](#upi)
-   [Netbanking](#netbanking)
-   [Wallet](#wallet)
-   [Cardless EMI](#cardless-emi)
-   [Emandate](#emandate)

## Cards

The payment flow for **Card** payments is illustrated below.

    
        The possible values for the `source` parameter for cards are listed below:

         -   `customer`
         -   `business`
         -   `internal`
         -   `gateway`
         -   `issuer_bank`
    
    
         The possible values for the `step` parameter, along with the description, are listed below:

         1. `payment_initiation`

             Your system initiates and sends the payment request to our server. Our server validates your request, creates the payment flow and forwards the request to the Gateway.

         1. `card_enrollment_check`

             Upon receiving a request from Razorpay, Gateway sends the enrollment check request to the bank for the enrollment of the card check.

         1. `payment_authentication`

             The bank verifies the enrollment of the card, and then requests the authentication of the customer by sending 3DS URL and OTP to the customer.

             -   3DS URL

                 Bank sends the Authentication (3DS URL), which is routed through Gateway > Razorpay > Customer.

             -   OTP

                 The bank sends the OTP to the customer’s mobile directly. The customer enters the valid OTP within the time on the bank's OTP page.

         1. `payment_authorization`

             Once the customer has completed the authentication, the bank authorises the release of the funds. The authorisation status is communicated to the Gateway which in turn communicates the same to Razorpay.

         1. `payment_capture`

             Once the payment is successfully authorised, Razorpay sends the capture request to the Gateway which in turn sends the same to the bank to capture the authorised payment.
    

## UPI

**UPI** payments can be made using the following:

    
### Intent Flow

         The payment flow for UPI Intent payments is illustrated below.

         

         
         

          The possible values for the `source` parameter for both collect and intent flows in UPI are as follows:

          -   `customer`
          -   `business`
          -   `internal`
          -   `customer_psp`
          -   `gateway`
          -   `network`
          -   `issuer_bank`
          -   `beneficiary_bank`
         
         
          The possible values for the `step` parameter for UPI Intent flow, along with the description, are listed below:

          1. `mandate_creation`

              Request to create a new UPI mandate.
     
          1. `payment_initiation`

              Your system initiates and sends the payment request to our server.

          1. `payment_creation`

              Razorpay creates an intent URL and passes it back to you.

          1. `payment_authentication`

              Payer clicks on the pay button (pointing to the intent url), which prompts the payer to open the PSP App. After the App opens, the payer enters the M-PIN on the PSP App, and then authenticates the transaction.

          1. `payment_request`

              Payer PSP sends the payment request to the UPI network.

          1.  `payment_request_beneficiary_details`

              The UPI network requests the beneficiary details from the Payee PSP.

          1.  `payment_response_beneficiary_details`

              Payee PSP  sends the beneficiary details to the UPI network.

          1.  `payment_debit_request`

              The UPI network requests a debit of the given payment amount from the customer's bank.

          1.  `payment_debit_response`

              Customer’s bank sends the debit response to the NPCI.

          1.  `payment_credit_request`

              The UPI network sends the payment credit request to your account maintained with Razorpay.

          1.  `payment_credit_response`

              The beneficiary bank sends the credit response to the UPI network.

          1.  `payment_status_request`

              UPI network requests the transaction confirmation status from Payee PSP which acts as the gateway in UPI transactions.

          1.  `payment_status_response`

              Payee PSP sends the transaction confirmation response to the UPI Network.

          1.  `payment_response`

              Payee PSP sends the callback to our server. This will contain the final transaction status.

          1.  `refund_request`

              Request to initiate a refund.
         
         
        

    
### Collect Flow

         The payment flow for UPI Collect payments is illustrated below.

         
         
          
           The possible values for the `source` parameter for both collect and intent flows in UPI are as follows:
           -   `customer`
           -   `business`
           -   `internal`
           -   `customer_psp`
           -   `gateway`
           -   `network`
           -   `issuer_bank`
           -   `beneficiary_bank`
          
          
           The possible values for the `step` parameter for the UPI Collect flow, along with the description, are listed below:

           1. `mandate_creation`

               Request to create a new UPI mandate.

           1.  `payment_initiation`

               Your system initiates and sends the payment request to our server.

           1.  `payment_creation`

               Razorpay creates the payment and sends the collect request via Payee PSP (Gateway).

           1.  `payment_request`

               Payee PSP sends the payment request to the UPI network.

           1.  `payment_authentication_request`

               The UPI network sends an authentication request for the given payment amount to the Payer PSP.

           1.  `payment_authentication`

               Customer clicks on the payment notification received on mobile which opens the PSP App. After the App opens, the customer enters the M-PIN on the PSP App, and then authenticates the transaction.

           1.  `payment_authentication_response`

               Payer PSP  sends the authentication details to the UPI network.

           1.  `payment_debit_request`

               Upon successful authentication, the UPI network requests a debit of the given payment amount from the customer's bank.

           1.  `payment_debit_response`

               Customer’s bank sends the debit response to the UPI Network.

           1.  `payment_credit_request`

               The UPI network sends the payment credit request to your account maintained with Razorpay.

           1.  `payment_credit_response`

               The beneficiary bank sends the credit response to the UPI network.

           1.  `payment_status_request`

               UPI network sends the transaction confirmation request to payer PSP (Google Pay).

           1.  `payment_status_response`

               Payer PSP (Google Pay) sends acknowledge, informs the customer and sends the response to NPCI.

           1.  `payment_response`

               Payee PSP sends the callback to our server. This will contain the final transaction status.

           1.  `refund_request`

               Request to initiate a refund.
          
         
        

> **WARN**
>
> 
> **UPI Collect Flow Deprecated**
> 
> According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026. Customers can no longer make payments or register UPI mandates by manually entering VPA/UPI id/mobile numbers.
> 
> **Exemptions:** UPI Collect will continue to be supported for:
> - MCC 6012 & 6211 (IPO and secondary market transactions).
> - iOS mobile app and mobile web transactions.
> - UPI Mandates (execute/modify/revoke operations only)
> - eRupi vouchers.
> - PACB businesses (cross-border/international payments).
> 
> **Action Required:**
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/upi-intent.md). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/standard-integration.md).
> 

## Netbanking

The payment flow for **Netbanking** payments is illustrated below:

    
     The possible values for the `source` parameter for netbanking are listed below:

      -   `customer`
      -   `business`
      -   `internal`
      -   `issuer_bank`
    
    
     The possible values for the `step` parameter, along with the description, are listed below:

        1. `payment_initiation`

             Your system initiates and sends the payment request to our server. Razorpay sends the bank URL back to you.

        1.  `payment_authentication`

             The customer logs into his netbanking account and completes the transaction.

        1.  `payment_authorization`

             Upon successful authentication, bank authorises the release of funds and notifies Razorpay. Razorpay in turn, notifies the business.
 
    

## Wallet

The payment flow for **Wallet** payments is illustrated below:

The payment flow for **Wallet** payments is illustrated below:

    
     The possible values for the `source` parameter for wallet are listed below:

     -   `customer`
     -   `business`
     -   `internal`
     -   `issuer`
    
    
     The possible values for the `step` parameter, along with the description, are listed below:

         1. `payment_initiation`

             Your system initiates and sends the payment request to our server. Our server sends the same request to the Bank/Gateway.

         2. `payment_eligibility_check`

             Razorpay sends the eligibility check request to the issuer to determine if the entered customer information is correct.

         3. `payment_authentication`

             Customer authenticates the payment using OTP provided by the issuer.

         4. `payment_authorization`

             Issuer authorises the release of funds and sends confirmation to Razorpay.
    

## Cardless EMI

The payment flow for **Cardless EMI** payments is illustrated below:

    
     The possible values for the `source` parameter for Cardless EMI flow are:

      -   `customer`
      -   `business`
      -   `internal`
      -   `network`
      -   `issuer`
    
    
     The possible values for the `step` parameter, along with the description, are listed below:

         1. `payment_initiation`

             Your system initiates and sends the payment request to our server. Our server sends the same request to the Bank/Gateway.

         1. `payment_eligibility_check`

             Razorpay sends the eligibility check request to the issuer to determine if the entered customer information is correct and to determine the credit eligibility of the customer.

         1. `payment_authentication`

             Customer authenticates the payment using OTP provided by the issuer.

         1. `payment_authorization`

             Issuer authorizes the release of funds and sends confirmation to Razorpay.
    

## Emandate

    
     The possible values for the `source` parameter for Emandate are listed below:

     -   `customer`
     -   `bank`
     -   `business`
     -   `internal`
     -   `gateway`
     -   `issuer_bank`
    
    
        The possible values for the `step` parameter, along with the description, are listed below:

        1. `payment_initiation`

            Your system initiates and sends the payment request to our server. Our server validates your request, creates the payment flow and forwards the request to the Gateway.

        1. `payment_authentication`

            The bank verifies the enrollment of the Emandate by asking customers to authenticate themselves.

        1. `payment_authorization`

            Once the customer has completed the authentication, the bank authorizes the release of the funds. The authorization status is communicated to the Gateway which in turn communicates the same to Razorpay.
