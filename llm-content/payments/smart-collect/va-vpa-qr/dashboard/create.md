---
title: Create Customer Identifiers
description: Learn how to create and view Virtual Bank Accounts and UPI IDs using the Razorpay Dashboard.
---

# Create Customer Identifiers

Reconciling payments received from customers through bank transfers is a time consuming and cumbersome process. With Razorpay Smart Collect, you can create virtual bank accounts for specific customers and share the details with them. As these Customer Identifiers are tagged to specific customers, reconciliation is easy and automatic.

You can create virtual UPI IDs for each of your customers, who can then add these IDs to their UPI PSP(Payment Service Provider) apps and make UPI payments.

You can create virtual bank accounts and UPI IDs using the Dashboard.

> **INFO**
>
> 
> **Note**
> 
> Currently, we support creation of virtual UPI IDs in the live mode only. However, virtual bank accounts can be created in the test and live modes.
> 

To create a Customer Identifier from the Dashboard:
1. Log in to the **Dashboard** and click **Smart Collect**.
1. Click **+ Create Customer Identifier**.

    
2. Select the type of receiver in **Accept Payments Via** field.

    By default, both **Bank Transfer (NEFT, RTGS, IMPS)** and **UPI Transfer** are enabled. This means that both virtual bank account and UPI ID can be created for the customer. You can choose to disable either as per your needs.
    - Enable **Bank Transfer (NEFT, RTGS, IMPS)** to create a virtual bank account.
    - Enable **UPI Transfer** to create a virtual UPI ID.
        - Create custom UPI ID - You can enter the descriptor, that is, the unique identifier of the customer, in the **UPI ID** field. It can be a combination of letters and numbers. For example, `gauravkumar1`. If left blank, the UPI ID will be auto-generated.
3. Select the **Customer** from the drop-down list. You can also create a new customer on-the-fly. You may skip this step and proceed with creation, if you do not wish to tag it to a specific customer. However, you cannot modify the Customer Identifier and tag it to the customer later.
4. Add an **Account Description** for your internal reference.
5. You can set a closure date for the Customer Identifier using the **Close By** option. **Disable Auto Close** option and select the date and time at which the account must be automatically closed. Ensure that the time specified is at least 15 minutes after the creation time.
6. Click **Add Internal Note** to enter any notes for internal reference.
7. Click **Create Customer Identifier**.

Once the Customer Identifier has been created, you can copy the details and share them with your customer.

> **INFO**
>
> 
> **Note**
> 
> While sharing the details of VAs (created using RBL bank) with the customers, ensure that the fifth character in the IFSC is number `0` and not the letter O. For example, valid IFSC is `RATN0VAAPIS` and not `RATNOVAAPIS`.
> 

The Customer Identifier appears in the list as shown below:

## Search

You can search for Customer Identifiers in the list using these parameters:
- Customer Identifier ID
- Notes

## View Payments

You can view the payments made to your Customer Identifiers on the Dashboard.

To do this:
1. Log in to the Dashboard.
2. Navigate to **Smart Collect** → **Payments**.

List of payments made by customers is displayed here:
