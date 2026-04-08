---
title: Create a Payment Link With Product Details
description: Create a Payment Link to store additional information about the products purchased by customers while accepting payments using Payment Links Third-Party Validation.
---

# Create a Payment Link With Product Details

### Request Parameters

     
`amount` _mandatory_
: `integer` Amount to be paid using the Payment Link. Must be in the smallest unit of the currency. For example, if you want to receive a payment of , you must enter the value `30000`.

`currency` _optional_
: `string` A three-letter ISO code for the currency in which you want to accept the payment. For example, INR. Refer to the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

`accept_partial` _optional_
: `boolean` Indicates whether customers can make [partial payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/partial-payments.md) using the Payment Link. Possible values:
  - `true`: Customer can make partial payments.
  - `false` (default): Customer cannot make partial payments.

`first_min_partial_amount` _conditionally mandatory_
: `integer` Minimum amount, in currency subunits, that must be paid by the customer as the first partial payment. Default value is `100`. Default currency is `INR`. For example, if an amount of  is to be received from the customer in two installments of #1 - , #2 - , then you can set this value as `500000`. Must be passed along with `accept_partial` parameter.
  

`description` _optional_
: `string` A brief description of the Payment Link. The maximum character limit supported is 2048.

`customer` _optional_
: `string` Customer details

  `name` _optional_
  : `string` The customer's name.

  `email` _optional_
  : `string` The customer's email address.

  `contact` _optional_
  : `string` The customer's phone number.

`notify` _optional_
: `array` Defines who handles Payment Link notification.

  `sms` _optional_
  : `boolean` Defines who handles the SMS notification. Possible values:
    - `true`: Razorpay handles the notification.
    - `false`: You handle the notification.

  `email` _optional_
  : `boolean` Defines who handles the email notification. Possible values:
    - `true`: Razorpay handles the notification.
    - `false`: You handle the notification.

`reminder_enable` _optional_
: `boolean` Used to send [reminders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/reminders.md) for the Payment Link. Possible values:
    - `true`: To send reminders.
    - `false`: To disable reminders.

`options` _mandatory_
: `string`  Contains the configurations and preferences related to the payment process.

    `order` _mandatory_
    : `string` Indicates the details related to how the payment should be processed.

        `method` _mandatory_
        : `string` Indicates the payment method being used. In this case, it is `netbanking`.

        `bank_account` _mandatory_
        : `string` Details of the bank account.

            `account_number` _mandatory_
            : `string` The bank account number.

            `name` _mandatory_
            : `string` Name of the bank account holder.

            `ifsc` _mandatory_
            : `string` The IFSC code of the bank.

`products` _mandatory_
: `array` Details of the products.

    `type` _mandatory_
    : `string` The type of product. Currently, the only supported value is `mutual_fund`.

    `plan` _if type=mutual_fund_ _optional_
    : `string` The name of the mutual fund plan selected by the customer. For example, `GD`.
    

    `folio` _if type=mutual_fund_ _optional_
    : `string` Unique identifier of the customer's account with the mutual fund. For example, `9104927822`.
    

    `amount` _if type=mutual_fund_ _mandatory_
    : `string` The amount paid by the customer for the plan. Sum of the individual cart amount must be equal to total order amount. It must be in paise. For example, `1400`.
    

    `option` _if type=mutual_fund_ _optional_
    : `string` Mutual fund plan option. For example, `G`.

    `scheme` _if type=mutual_fund_ _mandatory for RTA_
    : `string` The type of mutual fund scheme you chose. 
    For example, `LT`, `BP`.
     

    `receipt` _if type=mutual_fund_ _mandatory_
    : `string` Unique reference number (Order Number) generated at the merchant’s name. For example, `77407`.

    `mf_member_id` _mandatory_
    : `string` Unique member id as issued by the mutual fund platform. Can have a maximum length of 20 characters.

    `mf_user_id` _mandatory_
    : `string` Unique user or client id as issued by the mutual fund platform. Can have a maximum length of 10 characters.

    `mf_partner` _mandatory_
    : `string` The mutual fund platform being used to enable the purchase. Possible values are: - `cams`
 - `kfin`
 - `bse`
 - `nse`
 Can have a maximum length of 4 characters.
        
> **WARN**
>
> 
>         **Watch Out!**
> 
>         Do not use values apart from the ones given above. It will not be accepted.
>         

    `mf_investment_type` _mandatory_
    : `string` The type of investment. Possible values are: - `L`: Lump sum
 - `S`: SIP
 Can have a maximum length of 7 characters.

    `mf_amc_code` _mandatory for RTA_
    : `string` The AMC code for the mutual fund. Can have a maximum length of 5 characters. [List of possible values](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/products/appendix.md)

    

  
### Response Parameters

`accept_partial` 
: `boolean` Indicates whether customers can make [partial payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/partial-payments.md) using the Payment Link. Possible values:
  - `true`: Customer can make partial payments.
  - `false` (default): Customer cannot make partial payments.

`amount`
: `integer` Amount to be paid using the Payment Link. Must be in the smallest unit of the currency. For example, if you want to receive a payment of , you must enter the value `30000`.

`amount_paid`
: `integer` Amount paid by the customer.

`cancelled_at`
: `integer` Timestamp, in Unix, at which the Payment Link was cancelled by you.

`created_at`
: `integer` Timestamp, in Unix, indicating when the Payment Link was created.

`currency`
: `string` Defaults to INR. We accept payments in [international currencies.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies)

`customer`
: `string` Customer details

  `name`
  : `string` The customer's name.

  `email`
  : `string` The customer's email address.

  `contact`
  : `string` The customer's phone number.

`description`
: `string` A brief description of the Payment Link.

`expire_by`
: `integer` Timestamp, in Unix, when the Payment Link will expire. By default, a Payment Link will be valid for six months from the date of creation. Please note that the expire by date cannot exceed more than six months from the date of creation.

`expired_at`
: `integer` Timestamp, in Unix, at which the Payment Link expired.

`first_min_partial_amount`
: `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of  is to be received from the customer in two installments of #1 - , #2 - , then you can set this value as `500000`.

`id`
: `string` Unique identifier of the Payment Link. For example, `plink_ERgihyaAAC0VNW`.

`upi_link`
: `boolean` Indicates whether the Payment Link is a UPI Payment Link.
  - `true`: A UPI Payment Link has been created.
  - `false`: It is a Standard Payment Link.

`notes`
: `object` Set of key-value pairs that you can use to store additional information. You (Businesses) can enter a maximum of 15 key-value pairs, with each value having a maximum limit of 256 characters.

`notify`
: `array` Defines who handles Payment Link notification.

  `sms`
  : `boolean` Defines who handles the SMS notification.
    - `true`: Razorpay handles the notification.
    - `false`: Businesses handle the notification.

  `email`
  : `boolean` Defines who handles the email notification.
    - `true`: Razorpay handles the notification.
    - `false`: Businesses handle the notification.

`payments`
: `array` Payment details such as amount, payment id, Payment Link id and more. This array gets populated only after the customer makes a payment. Until then, the value is `null`.

`updated_at`
: `integer` Timestamp, in Unix, indicating when the payment was updated.

`reference_id`
: `string` Reference number tagged to a Payment Link. Must be a unique number for each Payment Link. The maximum character limit supported is 40.

`short_url`
: `string` The unique short URL generated for the Payment Link.

`status`
: `string` Displays the current state of the Payment Link. Possible values:
  - `created`
  - `partially_paid`
  - `expired`
  - `cancelled`
  - `paid`

`updated_at`
: `integer` Timestamp, in Unix, indicating when the Payment Link was updated.

`reminder_enable`
: `boolean` Used to send [reminders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/reminders.md) for the Payment Link. Possible values:
    - `true`: To send reminders.
    - `false`: To disable reminders.

`user_id`
: `string` A unique identifier for the user role through which the Payment Link was created. For example, `HD1JAKCCPGDfRx`.
