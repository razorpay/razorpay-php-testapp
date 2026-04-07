---
title: Submit Evidence
description: Check the details required by the Issuing Bank for Dispute Representment.
---

# Submit Evidence

The process of submitting various evidence documents to banks and gateways for contesting a payment dispute is known as **Dispute Representment**. If you want to successfully contest the chargeback and show the transaction was legitimate, you must submit supporting **chargeback evidence documents**. Know more about [dispute process flow.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes.md#disputes-process-flow)

## Chargeback Reason Codes & Evidence Documents for Dispute Resolution

Every major payment processing network uses multiple dispute reason codes (also called chargeback reason codes). These codes indicate why customers initiated payment disputes and are assigned by the issuing bank.

The chargeback reason codes are segregated based on the network and are further categorised into common types:

Category | Description
---
**Customer Disputes** | Customer claims goods/services are not received, defective or the transaction was not recognised.
---
**Fraud** | Customer claims an unauthorised transaction occurred or the card was used without their knowledge.
---
**Authorisation Error** | Transaction processed without proper authorisation or with declined/expired approval.
---
**Processing Error** | Technical mistakes, such as a wrong amount, duplicate charge or incorrect details.

Here is a list of the required evidence documents to submit against each specific chargeback reason code to help you win the dispute.

### UPI

    
    
    
### 1061 - Credit Not Processed

        - **Reason Description**: The business failed to process the credit after the customer cancelled or returned the goods or services.
        - **Suggested Documents**: 
            - Proof of refund generation
            - Bank statement showing refund amount which should match the payment amount
            - Customer communication showing refund confirmation
            - Refund policies
        

    
### 1062 - Goods/Services Not As Described

        - **Reason Description**: The business delivered a product or service that significantly differed from what they advertised or described.
        - **Suggested Documents**: 
            - Product description/image screenshots
            - Proof of product/service delivery
            - Customer communication showcasing dissatisfaction
            - Return policies
        

    
### 1064 - Goods/Services Not Received

        - **Reason Description**: The business failed to deliver the product or service to the customer despite receiving payment for the purchase.
        - **Suggested Documents**: 
            - Proof of service/product delivery
            - Customer interaction showcasing product/service related enquiries
            - Terms & Conditions showcasing refund & fulfillment policies
        

    
    
    
    
    
### 128 - Fraudulent Transaction

        - **Reason Description**: The business debited the customer's account fraudulently.
        - **Suggested Documents**: 
            - Internal logs to show authorisation was obtained
            - Invoicing details along with detailed price breakdown for the debited amount
            - Proof of service/goods delivery clearly mentioning customer name and address details
        

    
    
    
    
    
### 108 - Remiter Debited but Beneficiary Not Credited

        - **Reason Description**: The customer's account was debited the authorised amount, but the beneficiary did not receive the credit.
        - **Suggested Documents**: 
            - Proof of service/product delivery
            - Customer interaction showcasing product/service related enquiries
            - Customer Withdrawn letter
            - Terms & Conditions showcasing refund & fulfillment policies
        

    
### 1065 - Debit on Failed Transaction

        - **Reason Description**: The system debited the account, yet the business did not receive confirmation of the payment.
        - **Suggested Documents**: 
            - Proof of service/product delivery
            - Customer interaction showcasing product/service related enquiries
            - Customer Withdrawn letter
            - Terms & Conditions showcasing refund & fulfillment policies
        

    
### 121 - TCC Raised but Beneficiary is Not Credited

        - **Reason Description**: The customer raised a dispute because the TCC was issued, but the beneficiary's account has not been credited.
        - **Suggested Documents**: 
            - Proof of service/product delivery
            - Customer interaction showcasing product/service related enquiries
            - Customer Withdrawn letter
            - Terms & Conditions showcasing refund & fulfillment policies
        

    
    
    
    
    
### 1063 - Paid by Other Means

        - **Reason Description**: The customer paid via cash or another method, yet the business still charged this card in error.
        - **Suggested Documents**: 
            - Proof showing payment was not received using any other method
            - Refund proof if amount was refunded for duplicate charge
            - Proof to show the claimed transaction was for a different product/service
        

    
### 1084 - Duplicate Processing

        - **Reason Description**: The business processed the same transaction multiple times, incorrectly charging the customer twice or more for a single purchase.
        - **Suggested Documents**: 
            - System logs to prove only one transaction was processed for single authorisation
            - Invoicing to prove each transaction was for separate service/product
        

    
### 1085 - Charge Amount Exceeds Authorisation Amount

        - **Reason Description**: The business processed a charge that exceeded the amount the customer authorised.
        - **Suggested Documents**: 
            - Invoice with detailed price breakdown (price, taxes, fee, discount and so on) prove amount charged was correct
            - Screenshot of product/service along with the price details
            - Authorisation proof showing final amount was authorised by cardholder
            - System logs to show correct amount was charged
        

    
### 1081 - Not Settled Within Timeline

        - **Reason Description**: The payment failed because the business did not process the transaction within the stipulated time limit.
        - **Suggested Documents**: 
            - Internal logs to prove that charge was submitted within allowed time frame
            - Time stamp of transaction and processing of the payment showing debit amount
            - In case of re-auth, please provide proof of same
            - Customer authorisation proof
            - Masked card details and invoice of the transaction
        

    
    

### Visa

    
    
    
### 13.1 - Merchandise/Services Not Received

        - **Reason Description**: The customer paid for the order but did not receive the product/service because the business failed to deliver the goods/service.
        - **Suggested Documents**: 
            - Delivery confirmation with signature
            - Tracking information
            - Service completion records
            - Digital delivery logs
            - Customer acknowledgement
        

    
### 13.2 - Cancelled Recurring Transaction

        - **Reason Description**: The business charged the customer for the subscription in a subsequent billing cycle, despite the customer having already cancelled the recurring billing.
        - **Suggested Documents**: 
            - Cancellation policy
            - No cancellation request received
            - Continued usage logs
            - Terms of service 
            - Cancellation window proof
        

    
### 13.3 - Not as Described or Defective

        - **Reason Description**: The customer received a damaged or defective item (or a service of poor quality), as the product significantly differed from the description.
        - **Suggested Documents**: 
            - Product description/images
            - Quality control records
            - No return received 
            - Customer did not contact for resolution
            - Terms and conditions
        

    
### 13.4 - Counterfeit Merchandise

        - **Reason Description**: The business delivered fake or counterfeit goods to the customer; the product was an imitation or unauthorised reproduction of a branded item.
        - **Suggested Documents**: 
            - Authenticity certificates
            - Supplier verification
            - Brand authorisation 
            - Product source documentation
            - Quality guarantees
        

    
### 13.5 - Misrepresentation

        - **Reason Description**: The business misrepresented the terms of the sale by making false claims about the product's features or the sales conditions.
        - **Suggested Documents**: 
            - Accurate marketing materials
            - Clear terms display 
            - Customer acknowledgement 
            - No misleading claims proof 
            - Contract terms
        

    
### 13.6 - Credit Not Processed

        - **Reason Description**: The business failed to process the promised refund or credit to the customer's account.
        - **Suggested Documents**: 
            - Refund processing proof 
            - Credit timestamp
            - Return not received 
            - Refund policy compliance 
            - Transaction reversal records
        

    
### 13.7 - Cancelled Merchandise/Services

        - **Reason Description**: The business charged the customer for the order even though the customer had cancelled it before shipment or service delivery.
        - **Suggested Documents**: 
            - No cancellation received
            - Cancellation policy terms
            - Order already processed/shipped 
            - Cancellation window missed 
            - Terms agreement
        

    
### 13.8 - Original Credit Transaction Not Accepted

        - **Reason Description**: The card network rejected the Original Credit Transaction (OCT) that the business submitted for the refund or payout.
        - **Suggested Documents**: 
            - Valid account verification
            - Compliance with OCT rules 
            - Alternative refund method 
            - Transaction approval records
        

    
    
    
    
    
### 10.1 - EMV Liability Shift – Counterfeit Fraud

        - **Reason Description**: A counterfeit card was used at a terminal that did not support chip technology, so the business takes the liability.
        - **Suggested Documents**: 
            - EMV compliance certificate 
            - Terminal capability proof
            - Transaction receipt showing chip read
            - Authorisation approval 
            - Card-present evidence
        

    
### 10.2 - EMV Liability Shift – Non-Counterfeit Fraud

        - **Reason Description**: A legitimate card was used fraudulently at a terminal that did not support chip technology, meaning the business takes the liability.
        - **Suggested Documents**: 
            - EMV compliance documentation 
            - Terminal logs 
            - Chip transaction data 
            - Authorisation records 
            - PIN verification (if applicable)
        

    
### 10.3 - Other Fraud – Card-Present Environment

        - **Reason Description**: The cardholder denies authorising this in-person transaction; these claims usually involve stolen or cloned cards used at a physical shop or business.
        - **Suggested Documents**: 
            - Signed receipt 
            - EMV/chip data 
            - Security footage timestamp 
            - PIN verification 
            - Authorisation approval 
            - Card imprint (if manual)
        

    
### 10.4 - Other Fraud – Card-Absent Environment

        - **Reason Description**: An unauthorised online, phone or mail transaction has occurred, which the cardholder denies authorising. This frequently causes e-commerce chargebacks.
        - **Suggested Documents**: 
            - AVS match results 
            - CVV2/CVC2 verification 
            - IP address & device fingerprint
            - Order history 
            - Shipping proof to billing address
            - 3D Secure authentication
        

    
### 10.5 - Visa Fraud Monitoring Program

        - **Reason Description**: Visa's fraud detection system flagged the transaction. Visa issues this when the business exceeds the fraud thresholds set in their monitoring program.
        - **Suggested Documents**: 
            - Fraud prevention measures documentation
            - Transaction authentication records 
            - Compliance improvements 
            - Risk assessment protocols
        

    
    
    
    
    
### 11.1 - Card Recovery Bulletin

        - **Reason Description**: The business failed to decline or retain the card, allowing the transaction to proceed despite the card appearing on Visa's restricted card bulletin.
        - **Suggested Documents**: 
            - Confirmation that the authorisation was not flagged on a bulletin/warning list
            - Proof card was valid at transaction time
            - Terminal records
            - CRB check documentation
        

    
### 11.2 - Declined Authorisation

        - **Reason Description**: The business violated authorisation rules by overriding the decline response and forcing the transaction through.
        - **Suggested Documents**: 
            - Valid authorisation approval code
            - Proof of subsequent approval
            - Terminal logs showing approved status
            - Authorisation reversal records
        
    
    
    
    
    
    
### 12.2 - Incorrect Transaction Code

        - **Reason Description**: The business used the wrong code, processing the transaction type differently than intended (for example, a refund captured/processed wrongly as a sale).
        - **Suggested Documents**: 
            - Correct transaction records
            - Processing logs
            - Customer agreement for transaction type
            - System configuration proof
        

    
### 12.3 - Incorrect Currency Code

        - **Reason Description**: The customer was charged in an incorrect currency because the business processed the transaction using the wrong one.
        - **Suggested Documents**: 
            - Original currency agreement
            - Display screenshots 
            - Exchange rate disclosure
            - Customer consent for currency
        

    
### 12.4 - Incorrect Account Number

        - **Reason Description**: A data entry error caused the business to post the transaction to the incorrect cardholder account.
        - **Suggested Documents**: 
            - Correct account verification
            - Customer confirmation
            - Order records matching account
            - Payment method selection proof
        

    
### 12.5 - Incorrect Amount

        - **Reason Description**: The business charged the customer an amount that differed from the original purchase price they had authorised.
        - **Suggested Documents**: 
            - Original receipt/invoice
            - Authorisation for exact amount
            - Price agreement documentation 
            - Shopping cart screenshot
        

    
### 12.6.1 - Duplicate Processing – Single Authorisation

        - **Reason Description**: The business incorrectly processed multiple transactions by using the same authorisation code from a single original authorisation.
        - **Suggested Documents**: 
            - Authorisation logs
            - Processing records
            - Transaction IDs
            - Batch reports showing unique transactions.
        

    
### 12.6.2 - Paid by Other Means

        - **Reason Description**: The business incorrectly charged this card after the customer had already paid using a different method, such as cash, cheque or another card.
        - **Suggested Documents**: 
            - Proof of single payment method
            - No alternative payment records 
            - Customer communication 
            - Payment reconciliation
        

    
### 12.7 - Invalid Data

        - **Reason Description**: The system failed to capture valid transaction data, rendering critical information unreadable or missing.
        - **Suggested Documents**: 
            - Corrected transaction data
            - Valid processing records
            - Resubmission documentation 
            - Data integrity proof
        

    
    

### Mastercard

    
    
    
### 4841 - Cancelled Recurring or Digital Goods Transaction

        - **Reason Description**: The business charged the customer for the subscription or digital goods despite the customer having already cancelled the recurring billing or service.
        - **Suggested Documents**: 
            - Cancellation policy
            - No cancellation received 
            - Service usage after date 
            - Terms of service 
            - Digital access logs
        

    
### 4850 - Installment Billing Dispute

        - **Reason Description**: The business violated the agreed terms or payment schedule of the instalment plan.
        - **Suggested Documents**: 
            - Installment agreement 
            - Payment schedule
            - Terms compliance 
            - Customer consent 
            - Billing records
        

    
### 4853 - Cardholder Dispute

        - **Reason Description**: This general dispute covers quality issues where the customer did not receive the goods or service, or the product was defective or misrepresented.
        - **Suggested Documents**: 
            - Depends on specific dispute - delivery proof, quality records, product description, return policy, customer communication
        

    
### 4854 - Cardholder Dispute - Not Elsewhere Classified (NEC)

        - **Reason Description**: The dispute is valid, but the details do not fit any of the specific reason code categories.
        - **Suggested Documents**: 
            - Varies by dispute type - general proof of valid transaction/delivery/service/authorisation/customer agreement
        

    
    
    
    
    
### 4837 - No Cardholder Authorisation

        - **Reason Description**: The cardholder claims they did not authorise or participate in the transaction.
        - **Suggested Documents**: 
            - Cardholder verification
            - AVS/CVV match 
            - 3D Secure 
            - Delivery proof
            - IP geolocation 
            - Purchase history
        

    
### 4840 - Fraudulent Processing of Transactions

        - **Reason Description**: The business knowingly processed a fraudulent transaction despite the presence of clear fraud indicators.
        - **Suggested Documents**: 
            - Fraud screening results 
            - Legitimate transaction proof 
            - Authentication records 
            - Risk assessment 
            - Customer verification
        

    
### 4849 - Questionable Business Activity

        - **Reason Description**: The transaction appears fraudulent, indicating that the business is engaged in suspicious or deceptive practices.
        - **Suggested Documents**: 
            - Business legitimacy proof 
            - Clear terms 
            - Customer agreement 
            - Delivery confirmation 
            - Service completion
        

    
### 4870 - Chip Liability Shift

        - **Reason Description**: The business failed to use EMV chip technology, making it liable for the fraud when the chip card was processed on a magnetic stripe terminal.
        - **Suggested Documents**: 
            - EMV terminal capability
            - Chip transaction data 
            - Fallback reason 
            - Terminal certification 
            - Authorisation records
        

    
### 4871 - Chip/PIN Liability Shift

        - **Reason Description**: A Chip and PIN card was processed without proper verification, thus shifting the fraud liability to the business.
        - **Suggested Documents**: 
            - PIN verification records 
            - Chip + PIN terminal proof
            - Transaction authentication
            - Terminal compliance 
            - Fallback documentation
        

    
    
    
    
    
### 4808 - Authorisation-Related Chargeback

        - **Reason Description**: The business encountered multiple authorisation issues, which includes both failing to secure necessary approval and exceeding the authorised transaction amount.
        - **Suggested Documents**: 
            - Valid authorisation code 
            - Correct amount authorisation 
            - Multiple auth prevention 
            - Terminal records 
            - Approval documentation
        

    
    
    
    
    
### 4834 - Duplicate Processing

        - **Reason Description**: The business processed the transaction repeatedly, which resulted in the customer being charged multiple times for the same purchase or service.
        - **Suggested Documents**: 
            - Single transaction proof
            - Void/refund for duplicates
            - Transaction logs 
            - Unique reference numbers 
            - System timestamps
        

    
    

### Rupay

    
    
    
### 1061 - Credit Not Processed 

        - **Reason Description**: The business failed to process the credit after the customer cancelled or returned the goods and services.
        - **Suggested Documents**: 
            - Proof of refund generation
            - Bank statement showing refund amount which should match the payment amount
            - Customer communication showing refund confirmation
            - Refund policies
        

    
### 1062 - Goods/Services Not As Described

        - **Reason Description**: The business delivered goods or services that significantly differed from the description or were defective.
        - **Suggested Documents**: 
            - Product description/image screenshots
            - Proof of product delivery
            - Customer communication showcasing dissatisfaction
            - Return policies
        

    
### 1064 - Goods/Services Not Received

        - **Reason Description**: The business failed to provide or deliver the goods or services that the customer purchased.
        - **Suggested Documents**: 
            - Proof of service/product delivery
            - Customer interaction showcasing product/service related enquiries
            - Terms & Conditions showcasing refund & fulfillment policies
        

    
### 1101 - Illegible Fulfilment

        - **Reason Description**: The business submitted illegible documents in response to the retrieval request.
        - **Suggested Documents**: 
            - Proof of service/product delivery
            - Customer interaction showcasing product/service related enquiries
            - Terms & Conditions showcasing refund & fulfillment policies
        

    
### 1102 - Retrieval Request Not Fulfilled

        - **Reason Description**: The acquiring partner failed to fulfil the retrieval request within the timeframe or responded with a non-fulfillment message.
        - **Suggested Documents**: 
            - Proof of service/product delivery
            - Customer interaction showcasing product/service related enquiries
            - Terms & Conditions showcasing refund & fulfillment policies
        

    
### 1103 - Invalid Fulfilment

        - **Reason Description**: The business submitted invalid documents in response to the retrieval request.
        - **Suggested Documents**: 
            - Proof of service/product delivery
            - Customer interaction showcasing product/service related enquiries
            - Terms & Conditions showcasing refund & fulfillment policies
        

    
    
    
    
    
### 1104 - Cardholder Does Not Recognise the Transaction

        - **Reason Description**: The cardholder does not recognise the transaction appearing on their statement.
        - **Suggested Documents**: 
            - Invoice with masked card details to prove correct account was charged
            - Authorisation logs to support the above
            - Invoice with detailed price breakdown (price, taxes, fee, discount and so on) prove amount charged was correct
            - Screenshot of product/service along with the price details
            - System logs to show correct amount was charged
        

    
### 1141 - Fraudulent Card-Present Transaction

        - **Reason Description**: The cardholder asserts they did not make the in-person payment at the business's premises.
        - **Suggested Documents**: 
            - Transaction details of at least 2 payments by the same customer which were not reported for fraud (if available)
            - Invoices confirming customer details such as name, phone number, address and so on
            - Delivery proof showing product/service was delivered as per T&C
        

    
### 1142 - Fraudulent Card-Not-Present Transaction

        - **Reason Description**: The cardholder denies authorising the remote transaction, asserting they did not make the purchase without the card present (a Card-Not-Present or CNP transaction).
        - **Suggested Documents**: 
            - Transaction details of at least 2 payments by the same customer which were not reported for fraud
            - At least 2 parameters (device ID, fingerprint, IP address) of above payments should match for the disputed payment
            - Invoices confirming customer details such as name, phone number, address and so on
            - Delivery proof showing product was delivered as per T&C
        

    
### 1143 - Fraudulent Multiple Transactions

        - **Reason Description**: The same card was subjected to multiple fraudulent transactions.
        - **Suggested Documents**: 
            - Transaction details of at least 2 payments by the same customer which were not reported for fraud
            - At least 2 parameters (device ID, fingerprint, IP address) of above payments should match for the disputed payment
            - Invoices confirming customer details such as name, phone number, address and so on
            - Delivery proof showing product was delivered as per T&C
        

    
    
    
    
    
### 1065 - Debit on Failed Transaction

        - **Reason Description**: The system debited the account, but the transaction failed to confirm at the business's premises.
        - **Suggested Documents**: 
            - Proof of service/product delivery
            - Customer interaction showcasing product/service related enquiries
            - Customer Withdrawn letter
            - Terms & Conditions showcasing refund & fulfillment policies
        

    
### 1121 - Transaction Received Declined Authorisation Response

        - **Reason Description**: The business violated authorisation rules by overriding the decline response and forcing the transaction through.
        - **Suggested Documents**: 
            - Documents to show cardholder authorised the transaction
            - Internal logs to show the correct amount was debited along with invoices
            - Timestamp of auth creation and approval from customer
            - Proof of delivery for goods/services
        

    
### 1122 - Transaction Not Authorised

        - **Reason Description**: The customer claims the transaction was unauthorised, as it occurred when they were not present.
        - **Suggested Documents**: 
            - Internal logs to prove cardholder authorisation of the transaction along with the final debit amount
            - Invoicing with price breakdown and customer details
            - Masked card information
        

    
### 1123 - Invalid Card Number

        - **Reason Description**: The business processed the transaction using an invalid card number and either failed to obtain authorisation or processed the credit using the incorrect number.
        - **Suggested Documents**: 
            - Invoice with masked card details, customer name and contact details
            - Authorisation logs to support the above
        

    
    
    
    
    
### 1063 - Paid by Other Means

        - **Reason Description**: The business incorrectly charged this card despite the customer having already settled the transaction using a different method, such as cash, cheque or another card.
        - **Suggested Documents**: 
            - Proof showing payment was not received using any other method
            - Refund proof if amount was refunded for duplicate charge
            - Proof to show the claimed transaction was for a different product/service
        

    
### 1081 - Not Settled Within Timeline

        - **Reason Description**: The business failed to settle the transaction within the specified timeframes.
        - **Suggested Documents**: 
            - Internal logs to prove that charge was submitted within allowed time frame
            - Time stamp of transaction and processing of the payment showing debit amount
            - In case of re-auth, please provide proof of same
            - Customer authorisation proof
            - Masked card details and invoice of the transaction
        

    
### 1082 - Credit Posted as Debit

        - **Reason Description**: The business incorrectly processed the credit as a debit on the customer's account.
        - **Suggested Documents**: 
            - Internal transaction logs proving correct debit was done
            - Refund/Invoice details in case there was attempt to correct the wrong debit
            - Invoice for the debit that was done on the cardholder
        

    
### 1083 - Incorrect Transaction Details

        - **Reason Description**: The business incorrectly entered either the account number or the transaction amount used in the payment.
        - **Suggested Documents**: 
            - Invoice with masked card details to prove correct account was charged
            - Authorisation logs to support the above
            - Invoice with detailed price breakdown (price, taxes, fee, discount and so on) prove amount charged was correct
            - Screenshot of product/service along with the price details
            - System logs to show correct amount was charged
        

    
### 1084 - Duplicate Processing

        - **Reason Description**: The business processed the same transaction multiple times, incorrectly charging the customer twice or more for a single purchase.
        - **Suggested Documents**: 
            - System logs to prove only one transaction was processed for single auth
            - Invoicing to prove each transaction was for separate service/product
        

    
    

### American Express

    
    
    
### C02 - Credit Not Processed

        - **Reason Description**: The business failed to process the promised credit or refund to the customer's account.
        - **Suggested Documents**: 
            - Credit issuance proof 
            - Refund date/amount 
            - Return not received 
            - Policy compliance 
            - Processing confirmation
        

    
### C04 - Goods/Services Returned or Refused

        - **Reason Description**: Customer returned product or refused service. Goods were sent back or service was rejected but no refund issued.
        - **Suggested Documents**: 
            - Return not received 
            - Refusal not documented 
            - Restocking completed 
            - Return policy terms 
            - Delivery confirmation
        

    
### C05 - Goods/Services Cancelled

        - **Reason Description**: The customer returned the product or refused the service, but the business failed to issue the corresponding refund.
        - **Suggested Documents**: 
            - No cancellation received 
            - Cancellation policy 
            - Already shipped/provided 
            - Cancellation deadline passed 
            - Terms proof
        

    
### C08 - Goods/Services Not Received

        - **Reason Description**: The business failed to deliver the product or service to the customer, despite having already received payment for the purchase.
        - **Suggested Documents**: 
            - Delivery confirmation 
            - Tracking proof 
            - Service completion 
            - Digital delivery logs 
            - Customer signature
        

    
### C14 - Paid by Other Means

        - **Reason Description**: The business charged the American Express card despite the customer having already settled the transaction using a different payment method.
        - **Suggested Documents**: 
            - Single payment proof
            - No alternative payment 
            - Payment reconciliation 
            - Customer communication 
            - Order records
        

    
### C18 - No Show

        - **Reason Description**: The business charged the customer a no-show fee after the customer failed to appear for the hotel or rental car reservation.
        - **Suggested Documents**: 
            - No-show policy disclosure 
            - Cancellation window 
            - Policy agreement 
            - Reservation confirmation 
            - Terms acceptance
        

    
### C28 - Cancellation of Recurring Goods/Services

        - **Reason Description**: The business continued the recurring billing and charged the customer for the subscription, despite the customer having cancelled the service.
        - **Suggested Documents**: 
            - No cancellation received 
            - Cancellation policy 
            - Continued usage 
            - Service access logs 
            - Terms of service
        

    
### C31 - Goods/Services Not As Described

        - **Reason Description**: Quality/description issues. Product or service significantly different from what was advertised or described.
        - **Suggested Documents**: 
            - Accurate description 
            - Photos/specifications 
            - Quality standards met
            - No complaint received 
            - Terms compliance
        

    
### C32 - Goods/Services Damaged or Defective

        - **Reason Description**: The business delivered a product or service that significantly differed from what they advertised or described.
        - **Suggested Documents**: 
            - Quality control records 
            - No damage claim 
            - Shipping insurance 
            - Packaging adequacy 
            - No return received
        

    
### M01 - Chargeback Authorisation

        - **Reason Description**: The business previously agreed to the chargeback and authorised the reversal of this transaction.
        - **Suggested Documents**: 
            - No prior agreement 
            - Chargeback authorisation invalid 
            - Documentation of dispute 
            - No consent given
        

    
### M10 - Vehicle Rental – Capital Damages

        - **Reason Description**: The customer is disputing the damage charges that the rental company applied to the vehicle.
        - **Suggested Documents**: 
            - Damage documentation 
            - Pre-rental inspection 
            - Photos with timestamp 
            - Rental agreement 
            - Insurance coverage
        

    
### M49 - Vehicle Rental – Theft or Loss of Use

        - **Reason Description**: The rental company charged the customer for the theft or loss of use of the hired vehicle.
        - **Suggested Documents**: 
            - Police report 
            - Theft documentation 
            - Contract terms 
            - Insurance claims 
            - Loss mitigation efforts
        

    
    
    
    
    
### F10 - Missing Imprint

        - **Reason Description**: The business failed to provide the required manual imprint for the key-entered transaction.
        - **Suggested Documents**: 
            - Card imprint 
            - Electronic authorisation 
            - Card-present proof 
            - Terminal records 
            - Manual processing logs
        

    
### F14 - Missing Signature

        - **Reason Description**: The business failed to obtain the required signature on the transaction receipt for this card-present sale.
        - **Suggested Documents**: 
            - Signed receipt 
            - Signature on file 
            - PIN verification 
            - Contactless approval
            - Customer verification
        

    
### F24 - No Card Member Authorisation

        - **Reason Description**: The cardholder denies authorising or participating in this transaction.
        - **Suggested Documents**: 
            - Authorisation proof 
            - Cardholder verification
            - AVS/CVV match 
            - 3D Secure 
            - Purchase history
        

    
### F29 - Card Not Present

        - **Reason Description**: The cardholder disputes the card-not-present (CNP) transaction, claiming they did not authorise it.
        - **Suggested Documents**: 
            - AVS/CVV verification 
            - IP address 
            - Device fingerprint 
            - Shipping to billing address 
            - Purchase patterns
        

    
### F30 - EMV Counterfeit

        - **Reason Description**: A counterfeit chip card was used to complete a fraudulent transaction at a terminal that did not support EMV technology.
        - **Suggested Documents**: 
            - EMV terminal proof 
            - Chip data 
            - Authentication records 
            - Terminal capability 
            - Fallback documentation
        

    
### F31 - EMV Lost/Stolen/Never Received

        - **Reason Description**: The business accepted a transaction from an EMV card reported as lost or stolen because they used a non-chip terminal.
        - **Suggested Documents**: 
            - EMV compliance 
            - Terminal capability 
            - Chip transaction attempt 
            - Authorisation records 
            - PIN verification
        

    
    
    
    
    
### A01 - Charge Amount Exceeds Authorisation Amount

        - **Reason Description**: The business processed the transaction for an amount that exceeded the approved authorisation.
        - **Suggested Documents**: 
            - Authorisation for full amount 
            - Incremental auth records 
            - Customer agreement for additional charges
            - Receipt showing total
        

    
### A02 - No Valid Authorisation

        - **Reason Description**: The business processed the transaction without obtaining the required authorisation from American Express.
        - **Suggested Documents**: 
            - Valid authorisation code 
            - Approval records 
            - Emergency authorisation 
            - Manual approval documentation
        

    
### A03 - Authorisation Approval Expired

        - **Reason Description**: The business used an expired authorisation when they submitted the transaction for settlement.
        - **Suggested Documents**: 
            - Current authorisation 
            - Reauthorisation records 
            - Timeline documentation 
            - Settlement timing proof
        

    
    
    
    
    
### P01 - Unassigned Card Number

        - **Reason Description**: The transaction failed because the business used a card number that American Express does not recognise.
        - **Suggested Documents**: 
            - Valid card verification 
            - Account confirmation 
            - Authorisation approval 
            - Card authenticity 
            - Number validation
        

    
### P03 - Credit Processed as Charge

        - **Reason Description**: The business incorrectly processed the refund transaction as a new charge on the customer's statement.
        - **Suggested Documents**: 
            - Transaction type proof 
            - System records 
            - Processing logs 
            - Refund intention 
            - Correction documentation
        

    
### P04 - Charge Processed as Credit

        - **Reason Description**: The business incorrectly processed the sale transaction as a refund, causing the charge to appear as a credit on the customer's statement.
        - **Suggested Documents**: 
            - Correct transaction type 
            - Processing records 
            - Sale documentation 
            - System logs 
            - Authorisation type
        

    
### P05 - Incorrect Charge Amount

        - **Reason Description**: The business processed the transaction for an amount that differed from what the customer agreed to pay.
        - **Suggested Documents**: 
            - Correct amount proof 
            - Receipt/invoice 
            - Customer agreement 
            - Authorisation for amount 
            - Pricing documentation
        

    
### P07 - Late Submission

        - **Reason Description**: The business submitted the transaction late, having exceeded the time limit for processing.
        - **Suggested Documents**: 
            - Timely submission proof 
            - System delays 
            - Original date documentation 
            - Processing timeline 
            - Batch records
        

    
### P08 - Duplicate Charge

        - **Reason Description**: The business processed the same transaction multiple times, incorrectly charging the customer's account repeatedly.
        - **Suggested Documents**: 
            - Single charge proof 
            - Transaction logs 
            - Void/refund records 
            - Unique identifiers 
            - System timestamps
        

    
### P22 - Non-Matching Card Number

        - **Reason Description**: The business processed the transaction using a card number that does not match the cardholder's account on file.
        - **Suggested Documents**: 
            - Card number verification 
            - Account match proof 
            - Customer confirmation 
            - Order records 
            - Authorisation match
        

    
### P23 - Currency Discrepancy

        - **Reason Description**: The business processed the transaction using an incorrect currency, which was different from the currency the customer agreed to.
        - **Suggested Documents**: 
            - Currency agreement 
            - Exchange rate disclosure 
            - Original pricing 
            - Customer consent 
            - Display proof
        

    
    

### Razorpay

    
    
    
### RZP06 - Business Not Responding

        - **Reason Description**: The business has failed to respond to the customer's queries following the transaction.
        - **Suggested Documents**: 
            - Proof of service/goods delivery to the customer's address in committed timeline
            - Invoicing details showing transaction amount and date-time
            - Customer communications over email (not WhatsApp)
        

    
### RZP05 - Account Debited but No Confirmation 

        - **Reason Description**: The customer's account was debited, but the system failed to send confirmation of the transaction.
        - **Suggested Documents**: 
            - Service/Product invoice in case payment was captured successfully
            - Internal logs to prove the payment failed and no money was credited hence no service/goods were provided
            - Customer interaction showcasing product/service related enquiries
            - Terms & Conditions showcasing refund & fulfillment policies
        

    
### RZP01 - Goods/Services not Provided 

        - **Reason Description**: The customer paid for the order, but the business never provided the goods or services.
        - **Suggested Documents**: 
            - Proof of service/product delivery
            - Customer interaction showcasing product/service related enquiries
            - Terms & Conditions showcasing refund & fulfillment policies
        

    
### RZP04 - Refund not Processed

        - **Reason Description**: The business promised a refund but did not process the credit to the customer's account.
        - **Suggested Documents**: 
            - Proof of refund generation
            - Bank statement showing refund amount which should match the payment amount
            - Customer communication showing refund confirmation
            - Refund policies
        

    
### RZP00 - Not Available

        - **Reason Description**: This dispute does not fit into any of the existing, specific categories.
        - **Suggested Documents**: 
            - Proof of service/goods delivery to the customer's address in committed timeline
            - Invoicing details showing transaction amount and date-time
            - Customer communications over email (not WhatsApp)
            - Refund details in case you have already generated a successful refund to the customer
        

    
    
    
    
    
### RZP03 - Potential Fraud

        - **Reason Description**: The business has potentially committed fraud.
        - **Suggested Documents**: 
            - System logs to prove the payment was authorised
            - Invoicing details of the product/services
            - Additionally in case of card not present scenario, you will have to submit compelling evidence; details of at least 2 prior transactions done by the same customer (with at least 2 parameters matching out of IP/device fingerprint/device ID) which are not reported as fraud
            - Additionally in case of card present scenario, present EMV transaction data proving customer participation
        

    
    
    
    
    
### RZP02 - Unauthorised Transaction

        - **Reason Description**: The cardholder denies authorising the transaction, claiming it occurred in their absence.
        - **Suggested Documents**: 
            - System logs to prove the payment was authorised
            - Invoicing details of the product/services along with delivery proof
            - Additionally in case of card not present scenario, you will have to submit compelling evidence; details of at least 2 prior transactions done by the same customer (with at least 2 parameters matching out of IP/device fingerprint/device ID) which are not reported as fraud
            - Additionally in case of card present scenario, submit EMV transaction data proving customer participation
        

    
    
    
    
    
### RZP07 - Invalid Data

        - **Reason Description**: The system failed to process the transaction because the business's data was invalid.
        - **Suggested Documents**: 
            - Data showing the transaction was authorised by processor using valid data
            - Valid data includes masked card details, 2FA details for domestic transactions, customer name and date-time
        

    
    

## Next Steps in Dispute Representment

If you contest the chargeback using the required evidence documents, those documents are sent to the issuing bank for review. The issuing bank reviews the dispute representment case and provides a verdict within **15 to 30 days**. 

If you lose the payment dispute, the amount of the chargeback is deducted from your account and is credited back to the customer's account.

If you win the dispute, no amount will be deducted from your balance, successfully resolving the chargeback.

### Related Information

- [About Disputes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes.md)
- [Disputes - Dashboard Actions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/dashboard.md)
- [Dispute FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/faqs.md)
- [Contact Support](https://razorpay.com/support/#request) for additional help with disputes.
