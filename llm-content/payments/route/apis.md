---
title: Route APIs
description: List of Route APIs available to perform various actions.
---

# Route APIs

You can use the Route APIs to perform various actions. You can perform all of these actions from the Dashboard as well.

## API-wise Integration Checklist for Route

- Ensure the currency is in INR when creating an `order_id`.
- Ensure orders created have the `partial_payment` parameter set to `false`. Transfers will only occur if the orders are paid and the payments move to the `captured` state.
- Ensure to pass the Linked Account id while creating an order.
- Ensure the amount passed in the `transfers` object is not greater than the order amount.
- If the amount passed in the `transfers` object is less than the main amount, the balance will automatically move to the Razorpay nodal account.

**Example:**

Amount Type | Amount INR
---
Base amount | 10,000
---
Amount in `transfers` object | 7,500
---
Balance amount (Automatically added to the main Razorpay nodal account) | 2,500

- Once the payment has been successfully made, verify the [Payment Signature](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/third-party-validation/#step-6-verify-signature.md) at your backend.
- You can use [Fetch Transfer for an Order](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route.md) API for reconciliation.
- You can also [subscribe to Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md) and set up the `transfer.processed` Webhook event.

- Use [Fetch a Payment by ID](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/fetch-with-id.md) API to confirm the payment status before running the [Transfers](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route.md) API.
- Ensure the payment is in the `captured` state.
- Ensure the amount does not exceed the initial payment amount.
- Ensure the amount you want to transfer to a Linked Account is less than the initial amount.
    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     You must subtract fees and tax to calculate the amount allowed to be transferred.
>     

- Ensure the nodal account has sufficient balance for the amount to be transferred.
- Ensure the amount that needs to be transferred is correct as there is no `maker-checker` facility after creating the transfer.
- Ensure the currency is in INR.

  
### List of Transfers APIs

        The table below provides the list of various Transfers APIs and their brief description:

        

        API | Description
        ---
        [Create Transfers from Orders](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/create-transfers-orders.md) | API to create Transfers from the received Orders
        ---
        [Create Transfers from Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/create-transfers-payments.md) | API to create Transfers to linked accounts once the payments are captured.
        ---
        [Direct Transfers](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/direct-transfers.md) | API to transfer funds directly from your account balance to the linked accounts
        ---
        [Fetch Transfers for a Payment](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/fetch-transfers-payment.md) | API to fetch transfers created for a specific payment
        ---
        [Fetch Transfer for an Order](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/fetch-transfer-order.md) | API to fetch transfers created for a specific Order ID
        ---
        [Fetch a Transfer](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/fetch-a-transfer.md) | API to view specific transfer details
        ---
        [Fetch Transfers for a Settlement](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/fetch-transfers-for-a-settlement.md) | API to retrieve the collection of transfers created for a particular Settlement ID
        ---
        [Fetch Settlement Details](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/fetch-settlement-details.md) | API to view the details of settlements made to linked accounts
        ---
        [Fetch Payments of a Linked Account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/fetch-payments-linked-account.md) | API to view all the payments received by a linked account
        ---
        [Refund Payments and Reverse Transfer from a Linked Account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/refund-payments-and-reverse-transfer.md) | API to initiate a payment refund to a customer
        ---
        [Reverse a Transfer](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/reverse-a-transfer.md) | API to initiate a reversal of funds from the linked account to your account
        ---
        [API to modify Settlement Hold for Transfers](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/modify-settlement-hold.md) | API to modify the settlement configuration for a particular `transfer_id`
        

  

  
### List of Linked Account APIs

    The table below provides the list of various Linked Account APIs and their brief description:

    

    API | Description
    ---
    [Create a Linked Account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/create-linked-account.md) | API to create a Linked Account. 
    ---
    [Update Linked Accounts](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/update-linked-accounts.md) | API to update Linked Accounts.
    ---
    [Fetch a Linked Account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/fetch-with-id.md) | API to retrieve details of a Linked Account.
    ---
    [Create a Stakeholder](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/create-stakeholder.md) | API to create a Stakeholder account.
    ---
    [Update a Stakeholder Account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/update-stakeholder.md) | API to update a Stakeholder account.
    ---
    [Request a Product Configuration](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/request-product-config.md) | API to request a product configuration.
    ---
    [Update a Product Configuration](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/update-product-config.md) | API to update a product configuration.
    ---
    [Fetch a Product Configuration](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/fetch-product-config.md) | API to fetch a product configuration.
    

   

### Related Information
- [Route](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route.md)
- [Linked Accounts](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/linked-account.md)
- [Reports](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/view-reports.md)
