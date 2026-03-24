---
title: AML Integration Guide
description: Reduce settlement delays and enhance compliance for international payments with Razorpay’s AML solutions.
---

# AML Integration Guide

Razorpay offers an Anti-Money Laundering (AML) solution, such as Basic AML, designed to help businesses reduce settlement delays and minimize compliance-related transaction flags. Our risk prediction engine analyses historical transaction data and regulatory signals to accurately identify potential risks, reducing AML flags by up to 90% while maintaining compliance standards.

    
### Advantages

        - **Reduced AML Hits**: Up to 90% reduction in flagged transactions with proper implementation.
        - **Faster Settlements**: Minimise manual reviews and accelerate fund availability.
        - **Improved Conversion**: Collect additional details only when necessary, reducing customer friction.
        - **Regulatory Compliance**: Automatically meet RBI requirements for high-value transactions.
        

## Basic AML Integration

Basic AML enables you to proactively provide additional customer information with every order, thereby reducing the likelihood that it will be flagged for AML review.

You need to pass a few additional parameters related to AML in the Orders API. There is no other change in the rest of the [Standard Checkout integration steps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/build-integration.md).

    
### Sample Code

/orders

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 10000,
  "currency": "",
  "receipt": "receipt#1",
  "customer_id": "cust_OwZZseNBf9Uqsi",
  "customer_details": {
    "business_type": "individual",
    "name": "",
    "email": "",
    "contact": "",
    "individual": {
      "date_of_birth": {
        "day": 27,
        "month": 11,
        "year": 1993
      },
      "place_of_birth": "Bengaluru",
      "tax_identity": [
        {
          "name": "PAN",
          "value": "ABCDE1234F"
        }
      ]
    }
  }
}'
```

```json: Success Response
{
  "amount": 10000,
  "amount_due": 10000,
  "amount_paid": 0,
  "attempts": 0,
  "created_at": 1703569876,
  "currency": "INR",
  "entity": "order",
  "id": "order_NGrgEcmYJsfUyl",
  "notes": {
    "key1": "value3",
    "key2": "value2"
  },
  "offer_id": null,
  "receipt": "receipt#1",
  "status": "created"
}
```

  
      Request Parameters
      
      `amount` _mandatory_
      : `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`. Payment can only be made for this amount against the Order.

      `currency` _mandatory_
      : `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters. For example, `INR`.

      `receipt` _optional_
      : `string` Receipt number that corresponds to this order, set for your internal reference. Can have a maximum length of 40 characters and has to be unique.

      `customer_id` _mandatory_
      : `string` Unique identifier of the customer. For example, `cust_1Aa00000000004`.

      `customer_details` _mandatory_
      : `string` This contains details about the customer details of the order.

         `business_type` _optional_
         : `string` Indicates whether the customer is an individual or business entity. Possible values:
         - `company`
         - `individual`

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             For transactions exceeding ₹2,50,000:
>             - **Individual customers**: PAN is mandatory.
>             - **Business customers**: GSTIN is mandatory.
>             

         `name` _mandatory_
         : `string` Customer's name.
           - Character length: Between 5 and 50 characters.
           - Allowed characters: Uppercase letters (A-Z), lowercase letters (a-z), and spaces (not at the beginning).
           - Not allowed characters: Numbers, special characters (For example, @, ", ,, ., and so on.), Unicode characters, emojis, and non-Latin scripts or regional languages.
           - Prohibited names: Names must be meaningful and contextually appropriate.
              - Avoid using repetitive patterns (For example, aaa, xyz, kkk kk).
              - Names like litri litri, Hfg Gh, or husi husi are not permitted.
              - Curse words or offensive names are not prohibited.
           - Example: `Gaurav Kumar`.

         `email` _optional_
         : `string` The customer's email address. A maximum length of 64 characters for the username. For example, in "gaurav.kumar@example.com", "gaurav.kumar" must not exceed 64 characters.

         `contact` _optional_
         : `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919123456780`.

         `individual`
         : `object` Required when `business_type` is `individual`.

            `date_of_birth`
            : `object` Customer's date of birth (individuals) or date of incorporation (businesses).

                `day`
                : `integer` Day of birth/incorporation (1-31).

                `month`
                : `integer` Month of birth/incorporation (1-12).

                `year`
                : `integer` Year of birth/incorporation (4-digit format).

            `place_of_birth`
            : `string` Place where the customer was born or place of incorporation for businesses.

            `tax_identity`
            : `array` List of tax identifiers.

                `name`
                : `string` Type of tax identifier.

                `value`
                : `string` The identifier value matching the expected format.
       

  
### Response Parameters

      `amount`
      : `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`.

      `amount_due`
      : `integer` The amount pending against the order.

      `amount_paid`
      : `integer` The amount paid against the order.

      `attempts`
      : `integer` The number of payment attempts, successful and failed, that have been made against this order.

      `created_at`
      : `integer` Indicates the Unix timestamp when this order was created.

      `currency`
      : `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters.

      `entity`
      : `string` Name of the entity. Here, it is `order`.

      `id`
      : `string` The unique identifier of the order.

      `notes`
      : `object` Key-value pair used to store additional information about the entity. Holds 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

      `offer_id`
      : `string` The unique identifier of the offer. For example, `offer_JHD834hjbxzhd38d`.

      `receipt`
      : `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

      `status`
      : `string` The status of the order. Possible values:
         - `created`: When you create an order, it is in the `created` state. It stays in this state till a payment is attempted on it.
         - `attempted`: An order changes to the `attempted` state following the first payment attempt and remains in this state until at least one payment is successfully processed and captured.
         - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. 
 The order stays in the `paid` state even if the payment associated with the order is refunded.
      

  
### Error Response Parameters

   
   Error | Cause | Solution
   ---
   The API `` provided is invalid. | The API credentials passed in the API call differ from the ones generated on the Dashboard. Possible reasons: - Different keys for test mode and live modes.
- Expired API key.
 | The API keys must be active and entered correctly with no whitespace before or after the keys.
   ---
   The amount must be at least INR 1.00. | The amount specified is less than the minimum amount. Currency subunits, such as paise (in the case of INR), should always be greater than 100. | Enter an amount equal to or greater than the minimum amount, that is 100.
   ---
   The **field name** is required. | A mandatory field is missing. | Ensure all mandatory fields and values are present.
   ---
   Only english alphabets are allowed in customer name. | The customer name provided in the request contains characters other than English alphabets, such as numbers, special characters, regional language characters, or emojis. | Ensure that the name field in the request contains only English letters (A-Z, a-z) and meets the validation criteria: - Verify that the name does not include numerical characters, special characters (For example, @, #, $ and so on.), or non-Latin scripts.
- Confirm that there are no extra spaces at the beginning or end of the name.

   ---
   Customer name should be between 5 and 50 characters. | The `name` field provided in the request does not meet the required character length. It is either shorter than 5 characters or exceeds 50 characters. | - Ensure that the `name` field in the request is between 5 and 50 characters long.
- Check that no extra spaces are included at the beginning or end of the name, which might affect the character count.

   ---
   Customer name is invalid. | The `name` field provided in the request does not meet the validation requirements. This could be due to the presence of disallowed characters, such as special characters, numbers, regional language characters, or the use of non-Latin scripts. | - Ensure that the `name` field only contains English letters (A-Z, a-z) and spaces (not at the beginning).
- Verify that the name does not include special characters, numerical digits, emojis, or regional language characters.
- Check for unintended characters that may have been included by mistake (For example, trailing spaces or special symbols).

   ---
   
  

        
    

### Standard Checkout

Here is how AML works:
1. Razorpay screens each transaction in real-time.
2. Additional customer details are requested only for high-risk orders.
3. Low-risk orders proceed without extra fields.

To enable Basic AML feature, contact your Key Account Manager or email us at `import-mission@razorpay.com`.

  
### Payment Flow For Customers

When a transaction is flagged as high-risk, customers will see an additional screen on Razorpay Checkout:
  
  1. Customer proceeds to payment. If flagged, **Submit PAN details** screen appears.
  2. Enter **PAN** and **Date of birth** details.
     - Mobile
       ![Submit PAN details screen](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/submit-pan-details.jpg.md)
     - Web
       ![Submit PAN details screen web](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/submit-pan-details-web.jpg.md)
  3. Click **Continue** to proceed with payment.

  
> **WARN**
>
> 
>   **Watch Out!**
>   
>   This screen appears only for transactions identified as high-risk, ensuring minimal friction for the majority of customers.
>   

  

## Support

For further assistance, reach out to our [Support team](https://razorpay.com/support) or email us at `import-mission@razorpay.com`.
