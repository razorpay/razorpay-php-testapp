---
title: Create a Recurring Payment
description: Know how to create a recurring payments using the Razorpay Dashboard.
---

# Create a Recurring Payment

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

To create a recurring payment:

1. [Create a registration link](#1-create-a-registration-link)
2. [View the payment status](#2-view-the-payment-status)
3. [Search for the token](#3-search-for-the-token)
4. [Charge the token](#4-charge-the-token)

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Unlike integrating recurring payments from APIs, you do not have to create the order or the customer separately while integrating from the Dashboard. The customer will be added when creating a registration link and an order will be created when the customer makes the authentication payment.
> 

## 1. Create a Registration Link

To create a registration link:
1. Log in to the Dashboard.
1. Under **PAYMENT PRODUCTS**, navigate to **Subscription** → **Registration Links**.
1. Click **+Create New Link** and follow the on-screen instructions.

The registration link is sent to the customer. Once a customer successfully makes the authorisation payment, you need to wait for the payment to reach the `captured` state.

> **INFO**
>
> 
> 
> **Create Registration Links via APIs**
> 
> You can create registration links using APIs. Refer to the [API section](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments.md) for more details.
> 

### Registration Link Fields

The below table lists and gives a brief description of the various fields available when creating a registration link from the Dashboard.

`Description` _mandatory_
: A brief description of the registration link.

`Customer Name` _optional_
: Name of the customer. If you have already created a customer via APIs, you must enter the same Customer Name here.

`Customer Contact` _mandatory_
: Phone number and email address of the customer. If you have already created a customer via APIs, you must enter the same email address and phone number here.

`Notify` _optional_
: There are two ways in which you can send notifications:
  - **SMS**
  - **Email**

`Receipt No.` _optional_
: A user-entered unique identifier for the order. For example, `Receipt No. 1`. This parameter should be mapped to the `order_id` sent by Razorpay.

`Registration Link Expiry` _optional_
: The expiry date of the link. Defaults to **No Expire**.

`Payment Method` _mandatory_
: The payment method to make the authentication payment. Available options:
    - Card
    - Emandate
    - UPI
    - NACH

  `Card`
  : Details to be filled when you select **Card** as the payment method.

    `Authorisation Amount` _mandatory_
    : The payment amount. For **Card**, the minimum amount is ₹1.

    `Billing Frequency` _mandatory_
    : The frequency at which the amount should be charged. Possible values:
      - `Weekly`
      - `Monthly`
      - `Yearly`

    `Expiry of Token` _optional_
    : Specifies the expiry date for the token. That is, the duration for which you can charge the customer using the authorised payment method. The maximum value you can set is 30 years from the current date. Any value beyond this will throw an error.

    `Maximum Auto-debit Amount`_mandatory_
    : The maximum amount that has to be auto-debited. This is applicable only for domestic cards.
    
      
> **WARN**
>
> 
>       **Watch Out!**
>       
>       You can automatically charge the customer up to ₹15,000 for each recurring payment. Any amount greater than this requires an OTP verification from the customer.
>       

  `Emandate`
  : Details to be filled when you select **Emandate** as the payment method.

    `Skip Bank Details` _optional_
    : Select this option if you do not want to pre-fill bank details in the registration link.

    `Bank Details`
    : The customer's bank details.

      `Select Bank` _mandatory_
      : Select the customer's bank.

      `IFSC` _mandatory_
      : Enter the customer's bank IFSC.

    `Account Details`
    : Customer's account details.

      `Beneficiary Name` _mandatory_
      : Customer's name.

      `Account Number` _mandatory_
      : Customer's account number.

      `Select Account Type` _mandatory_
      : Customer's bank account type.

    `Expiry of Token` _optional_
    : Specifies the expiry date for the token. That is, the duration for which you can charge the customer using the authorised payment method. The maximum value you can set is 30 years from the current date. Any value beyond this will throw an error.

    `Maximum Billing Amount` _optional_
    : The maximum amount you can charge the customer once the authorisation transaction is completed.
        - Defaults to ₹1 lakh.
        - Maximum amount is ₹1 crore.

    `First Charge Amount` _optional_
    : The payment amount. For **Emandate**, the authorisation amount is ₹0. However, you can choose to auto-charge the customer an initial payment immediately after authorisation by entering any amount greater than ₹0. For example, if you enter ₹1,000, the customer is auto-charged ₹1,000 as soon as the token is confirmed.

  `UPI`
  : Details to be filled when you select **Card** as the payment method.

    `Authorisation Amount` _optional_
    : The payment amount. For **Card**, the minimum amount is ₹1.

    `Billing Frequency` _mandatory_
    : The frequency at which the amount should be charged. Possible values:
      - `Daily`
      - `Weekly`
      - `Fortnightly`
      - `Bimonthly`
      - `Monthly`
      - `Quarterly`
      - `Half Yearly`
      - `Yearly`
      - `As and when presented`

    `Expiry of Token` _optional_
    : Specifies the expiry date for the token. That is, the duration for which you can charge the customer using the authorised payment method. Defaults to 10 years.

    `Maximum Billing Amount` _optional_
    : The maximum amount you can charge the customer once the authorisation transaction is completed.
        - Defaults to ₹2,00,000.
        - Maximum amount is ₹2,00,000.

  `NACH`
  : Details to be filled when you select Nach as the payment method.

    `Bank Details`_mandatory_
    : The customer's bank IFSC.

    `Account Details`
    : Customer's account details.

      `Beneficiary Name` _mandatory_
      : Customer's name.

      `Account Number` _mandatory_
      : Customer's account number.

      `Bank Account Type` _mandatory_
      : The customer's bank account type. Available options:
        - savings
        - current

      `Reference 1` _optional_
      : A user-entered reference for the NACH form.

      `Reference 2` _optional_
      : A user-entered reference for the NACH form.

    `Expiry of Token` _optional_
    : Specifies the expiry date for the token. That is, the duration for which you can charge the customer using the authorised payment method. The maximum value you can set is 30 years from the current date.

    `Maximum Billing Amount` _optional_
    : The maximum amount you can charge the customer once the authorisation transaction is completed.
        - Defaults to ₹1 lac.
        - Maximum amount is ₹1cr.

    `First Charge Amount` _mandatory_
    : The payment amount. For **NACH**, the authorisation amount is ₹0. However, you can choose to auto-charge the customer an initial payment immediately after authorisation by entering any amount greater than ₹0. For example, if you enter ₹1,000, the customer is auto-charged ₹1,000 as soon as the token is confirmed.

  `Internal Notes` _optional_
  : User-entered notes for internal reference.

## 2. View the Payment Status

When an authorisation payment is `created`, the corresponding `payment_id` appears on the list of created payments along with an `order_id`.

Watch the below video to know how to check the payment status from the Dashboard.

[Video: https://www.youtube.com/embed/-jw7xjpJakU]

To view the status of a recurring payment:
1. Log in to the Dashboard.
1. Under **PAYMENT PRODUCTS**, navigate to **Subscription** → **Payments**. You can view the payment status on the screen. Click a `payment_id` to view details of the payment.

## 3. Search for the Token

Tokens are not returned as part of the checkout response. However, you can view them on the Dashboard. You can also view the details of the token using APIs or Webhooks.

Watch the below video to know how to search for a token from the Dashboard.

[Video: https://www.youtube.com/embed/5UfdqUEKNvk]

To search for a token:
1. Log in to the Dashboard.
1. Under **PAYMENT PRODUCTS**, navigate to **Subscriptions** → **Tokens**.
1. Search for the Token using the `token_id`.

## 4. Charge the Token

After your customer successfully makes an authorisation transaction, a payment is created and moved to the `authorized` state. A token is generated and is in the `initiated` state. After the payment moves to the `captured` state, the token next moves to the `confirmed` state. Once the token is `confirmed`, you can charge the token.

Watch the below video to know how to charge a token from the Dashboard.

[Video: https://www.youtube.com/embed/jGQS9QQ8wjw]

To charge a Token:
1. Log in to the Dashboard.
1. Under **PAYMENT PRODUCTS**, navigate to **Subscriptions** → **Tokens**.
1. Search for the token using the `token_id`.
1. Click on the `token_id` to open the details page.
1. Click **Charge Now** to create a recurring payment.

## Delete the Token

You can delete a token from the Dashboard.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> Once a token is deleted, no further action can be performed on it. You will need to complete the authorisation process again to create a new token.
> 

Watch the below video to know how to delete tokens from the Dashboard.

[Video: https://www.youtube.com/embed/RMiudQEq0Uk]

To delete a token:
1. Log in to the Dashboard.
1. Under **PAYMENT PRODUCTS**, navigate to **Subscriptions** → **Tokens**.
1. Search for the token using the `token_id`.
1. Click on the `token_id` to open the details page.
1. Click **Delete Token**.

### Related Information
- [Paper NACH Form](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/upload-paper-nach-form.md)
- [Batch Operations](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/batch-operations.md)
