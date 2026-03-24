---
title: Smart Collect APIs
description: List of Smart Collect 2.0, Smart Collect and Smart Collect with TPV APIs. Check the API integration checklist.
---

# Smart Collect APIs

Use Razorpay Smart Collect to create Customer Identifiers and accept large payments from your customers in the form of bank transfers via NEFT, RTGS and IMPS. Customer Identifiers are similar to bank accounts wherein customers can transfer payments. You can create, retrieve and close Customer Identifiers using the Smart Collect APIs.

> **INFO**
>
> 
> **Smart Collect 2.0**
> 
> Use [Smart Collect 2.0 ](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect.md)to collect payments using UPI and other banking modes.
> 

## Smart Collect 2.0 APIs

Use Smart Collect 2.0 APIs to create and manage Customer Identifiers of the type `VPA (UPI)`. You can use the Smart Collect APIs to manage Customer Identifiers of the type `Bank Account`.

    
### List of Smart Collect 2.0 APIs

         Refer to the list of Smart Collect 2.0 APIs to create and manage Customer Identifiers of the type `VPA (UPI)`. 

         
            API | Description
            ---
            [Create a Customer Identifier With VPA Receiver](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-2/create-cust-id-vpa.md) | API to create a Customer Identifier with VPA receiver.
            ---
            [Create a Customer Identifier With VPA and Bank Account Receivers](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-2/create-cust-id-bank-account-vpa.md) | API to create a Customer Identifier with VPA and bank account receivers.
            ---
            [Fetch Payments Using UPI](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-2/fetch-payments-upi.md) | API to retrieve details of a UPI payment using the Payment id.
            ---
            [Add Receiver to an Existing Customer Identifier With VPA](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-2/add-receiver-vpa.md) | API to add receiver to an existing Customer Identifier. 
            ---
            [Add Receiver to an Existing Customer Identifier With Bank Account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-2/add-receiver-bank-transfer.md) | API to add receiver to an existing Customer Identifier. 
            
        

    
### List of Smart Collect 2.0 API for TPV

         Refer to the list of Smart Collect 2.0 APIs to create and manage Customer Identifiers of the type `VPA (UPI)`with TPV.
         
         
            API | Description
            ---
            [Add VPA Receiver to an Existing Customer Identifier](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-2/tpv-add-receiver-vpa.md) | API to add receiver to an existing Customer Identifier. 
            ---
            [Add Bank Account Receiver to an Existing Customer Identifier](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-2/tpv-add-receiver-bank-transfer.md) | API to add receiver to an existing Customer Identifier. 
            ---
            
        

## Smart Collect APIs

    
### List of Smart Collect APIs

         
            API | Description
            ---
            [Create Customer Identifier With Bank Account Receiver](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect/create-cust-id-bank-account.md) | API to create a Customer Identifier with bank account receiver.
            ---
            [Fetch a Customer Identifier With ID](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect/fetch-with-id.md) | API to Fetch a Customer Identifier by ID.
            ---
            [Fetch all Customer Identifiers](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect/fetch-all.md) | API to fetch all Customer Identifiers.
            ---
            [Fetch Payments for a Customer Identifier](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect/fetch-payments-cust-id.md)| API to fetch payments made against a particular Customer Identifier.
            ---
            [Fetch Payment Details using ID and Transfer Method](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect/fetch-payments-bank-transfer.md) | API to retrieve details of a payment using the Payment ID and transfer method.
            ---
            [Fetch Payments Using Bank Transfer via UTR](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect/fetch-payments-bank-transfer-utr.md) | API to retrieve details of a payment using bank transfer method via UTR.
            ---
            [Update a Customer Identifier](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect/update.md) | API to update a Customer Identifier.
            ---
            [Close a Customer Identifier](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect/close.md) | API to close a Customer Identifier.
            
        

    
### API-wise Integration Checklist for Smart Collect

         
            
            - Use [Create a Customer API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers/#create-a-customer.md) if a Customer Identifier/UPI ID will be mapped to a unique customer.
            - You can use the **fail_existing** (set to `"1"`) API parameter to create a customer. This helps you avoid `customer_id` being created multiple times for the same customer and will help in your reconciliation process.
            - We request you to create a single `customer_id` rather than making multiple IDs for the same customer. If their details change, you can use the [Edit Customer Details](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers/#edit-customer-details.md) API. Duplicate validation is done based on the combination of email ID and phone number.
            
            
            - UPI Customer Identifiers are supported only in Live mode.
            - The combination of merchant prefix and descriptor must be 20 characters. The length of the merchant prefix can vary between 4-10 characters and the length of the descriptor from 10-16 characters.
            - Payments made to the Customer Identifiers must be within the [transaction limits](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/transaction-limits.md).
            - We recommend that you use [Fetch APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect/#fetch-a-virtual-account-by-id.md) to make a GET call for any downstream dependencies. Webhooks are just a recommended layer on top of this.
            - We recommend you [Close the Customer Identifier](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect/#close-a-customer-identifier.md) once the payment is received.
            
            
        

    
### List of APIs for Smart Collect TPV

         To know more about Third Party Validation (TPV), click [here](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/third-party-validation.md).
            
            API | Description
            ---
            [Create Customer Identifier](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-tpv/create.md) | API to create a Customer Identifier.
            ---
            [Add an Allowed Payer Account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-tpv/add-allowed-payer.md) | API to add allowed payers account details to a Customer Identifier.
            ---
            [Fetch a Customer Identifier by ID](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-tpv/fetch-with-id.md) | API to Fetch a Customer Identifier by ID.
            ---
            [Fetch all Customer Identifiers](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-tpv/fetch-all.md) | API to fetch all Customer Identifiers.
            ---
            [Fetch Payments for a Customer Identifier](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-tpv/fetch-payments.md)| API to fetch payments made against a particular Customer Identifier.
            ---
            [Fetch Payment Details using ID and Transfer Method](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-tpv/fetch-payment-id-transfer.md) | API to retrieve details of a payment using the Payment ID and transfer method.
            ---
            [Delete an Allowed Payer Account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-tpv/delete-allowed-payer.md) | API to delete allowed payers account details added to a Customer Identifier.
            ---
            [Close a Customer Identifier](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-tpv/#close-a-virtual-account.md) | API to close a Customer Identifier.
            
        

    
### API-wise Integration Checklist for Smart Collect TPV

         
            
            - Use [Create a Customer API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers/#create-a-customer.md) if a Customer Identifier is mapped to a unique customer.
            - You can use the **fail_existing** (set to `"1"`) API parameter to create a customer. This helps you avoid `customer_id` being created multiple times for the same customer and will help in your reconciliation process.
            - We request you to create a single `customer_id` rather than making multiple IDs for the same customer. If their details change, you can use the [Edit Customer Details](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers/#edit-customer-details.md) API. Duplicate validation is done based on the combination of email ID and phone number.
            
            
            - Smart Collect with TPV is supported only for Netbanking.
            - The combination of merchant prefix and descriptor must be 20 characters. The length of the merchant prefix can vary between 4-10 characters and the length of the descriptor from 10-16 characters.
            - Avoid ambiguous account numbers. Consider the following:
                - When displaying a bank account number to a customer, the font may cause the customer to misread the alphanumeric characters (if any) in the number. Customers can commit typos while entering the beneficiary account number. Misreading the letter `O` in an account number as the numeral `0`, for example, is extremely common.
                - Payments made to such mistyped accounts are considered invalid. They are refunded to the customer's account within 1 working day. However, this is still a massive inconvenience for the customer, who now has to wait 24 hours to receive a refund for what is often a rather large payment.
                - We strongly advise against using the following characters in your descriptor for alphanumeric accounts, as they may appear ambiguous in specific fonts.
                    - `0` or `O`
                    - `1` or `I`
                    - `5` or `S`
                    - `8` or `B`
                    - `2` or `Z`
            - You can add up to 10 allowed payers while creating the Customer Identifier.
            - The allowed payer can be deleted or added later using the [Add an Allowed Payer](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-tpv/#add-an-allowed-payer-account.md) and the [Delete an Allowed Payer](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-tpv/#delete-an-allowed-payer-account.md) APIs.
            
        
        

    
### List of Banks Supporting TPV for Smart Collect

         Given below is the list of banks supporting TPV for Smart Collect. 
         
         @include tpv/bank-list-smart-collect

        

### Related Information
- [Smart Collect](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect.md)
- [How Smart Collect Works](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/how-it-works.md)
