---
title: Create Customer Identifiers with TPV
description: Create and view Customer Identifiers and UPI IDs using the Razorpay Dashboard.
---

# Create Customer Identifiers with TPV

Smart Collect makes reconciling payments received through bank transfers easy by allowing you to create Customer Identifiers for specific customers and reconciling payments automatically.

You can create virtual UPI IDs for each of your customers, who can then add these IDs to their UPI PSP (Payment Service Provider) apps and make UPI payments.

## Create Customer Identifiers with TPV

> **INFO**
>
> 
> **Handy Tips**
> 
> Currently, we support creation of virtual UPI IDs in the live mode only. However, Customer Identifiers can be created in the test and live modes.
> 

To create a Customer Identifier from the Dashboard:
1. Log in to the Dashboard and click **Smart Collect**.
2. Click **+ Create Customer Identifier**.

3. Select the type of receiver in **Methods to accept payments in this account** field.
    Both **Bank Transfers (NEFT, RTGS, IMPS)** and **UPI Transfer** are enabled by default. You can choose to disable either as needed.
    - Enable **Bank Transfer (NEFT, RTGS, IMPS)** to create a Customer Identifier.
    - Enable **UPI Transfer** to create a virtual UPI ID.
        - Create custom UPI ID - Enter a custom identifier for the customer in the UPI ID field (12 characters of letters and numbers, for example, `gauravkumar1`). If left blank, the UPI ID will be auto-generated.
            ![Create Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/smart-collect-create_ci.jpg.md)
        - The prefix, `acmecorp` can be modified using the **click here** link. This opens a small modal where you can enter a new prefix.

        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         An individual cannot modify the structure (prefix and descriptor) of the UPI ID.
>         
   
4. Select **Customer** from the drop-down list. You can also create a new customer instantly. You may skip this step and proceed with creation, if you do not wish to tag it to a specific customer. However, you cannot modify the Customer Identifier and tag it to the customer later.
5. Click **View Advance Options**.
6. Complete these steps to add account details for the **Third Party Validation**:

    1. Select the **Bank Transfers (NEFT, RTGS, IMPS)** checkbox to create Customer Identifier details with TPV for bank transfers.

        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         Refer to the [Third Party Validation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/third-party-validation.md) document for more details.
>         

    2. Click **Configure** to add details of **Authorised Accounts**.
    ![Smart Collect TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/smart-collect-tpv.jpg.md)
    3. Enter **IFSC Code** and **Account Number**.
    ![TPV - Add Bank Account no and IFSC](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/smart-collect-authorised_accounts.jpg.md)
    4. Click **+ Add Another Account** to add accounts. You can add up to 10 **Authorised Accounts**.
    5. Click **Save**.

Complete the other steps mentioned on screen and click **Create Customer Identifier**.

Once the Customer Identifier has been created, you can copy the details and share them with your customer.

> **INFO**
>
> 
> **Handy Tips**
> 
> While sharing the details of CIs (created using RBL bank) with the customers, ensure that the fifth character in the IFSC is number `0` and not the letter O. For example, valid IFSC is `RATN0VAAPIS` and not `RATNOVAAPIS`.
> 

![Customer Identifier Created](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/smart-collect-va_list.jpg.md)

The Customer Identifier appears in the list as shown below:

![Created CI list](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/smart-collect-va-created-list.jpg.md)

## View Payments

You can view the payments made to your Customer Identifiers on the Dashboard.

To do this:
1. Log in to the Dashboard.
2. Navigate to **Smart Collect** → **Payments**.
