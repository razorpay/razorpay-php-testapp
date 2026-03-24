---
title: AML Integration Guide
description: Reduce settlement delays and enhance compliance for international payments with Razorpay’s AML solutions.
---

# AML Integration Guide

Razorpay offers two Anti-Money Laundering (AML) solutions—Basic AML and Smart AML—designed to help businesses reduce settlement delays and minimise compliance-related transaction flags. Our risk prediction engine analyses historical transaction data and regulatory signals to accurately identify potential risks, reducing AML flags by up to 90% while maintaining compliance standards.

    
### Advantages

        - **Reduced AML Hits**: Up to 90% reduction in flagged transactions with proper implementation.
        - **Faster Settlements**: Minimise manual reviews and accelerate fund availability.
        - **Flexible Integration**: Choose between Basic AML for simplicity or Smart AML for intelligent risk management.
        - **Improved Conversion**: Collect additional details only when necessary, reducing customer friction.
        - **Regulatory Compliance**: Automatically meet RBI requirements for high-value transactions.
        

## Basic AML Integration

Basic AML enables you to proactively provide additional customer information with every order, thereby reducing the likelihood that it will be flagged for AML review.

You need to pass a few additional parameters related to AML in the Orders API. There is no other change in the rest of the [S2S integration steps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/s2s-integration/build-integration.md).

    
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

```json: Response
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
      : `object` This contains details about the customer.

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
   
  

        
    

## Smart AML Integration

Smart AML applies real-time risk assessment to determine whether additional customer information is required. It ensures minimal friction for low-risk transactions while maintaining strong compliance standards.

### Workflow

  
Smart Screening allows you to receive risk assessments and decide whether to proceed, collect additional data or decline transactions based on your business logic.
1. Create Order with AML screening.
2. Fetch Order With Updated Risk Assessment (optional).
3. Patch Order (If High Risk).
4. Create a Payment.
  
  
Automatic Order Failure immediately declines high-risk transactions at the time of order creation, preventing any possibility of payment processing for flagged orders.
1. Create Order with AML screening.
2. If high risk detected: Order fails immediately.
3. No payment creation possible - transaction ends here.
4. Handle error and inform customer.
  

    
### Smart Screening vs Automatic Order Failure Comparison

Feature | Smart Screening | Automatic Order Failure
---
**Best For** | - Maximising conversions.
- Customer-centric businesses.
- Businesses with technical resources.
 | - Zero-tolerance compliance policy.
- Minimal integration resources.
- Simplified operations.

---
**Customer Experience** | - Can request additional information.
- Customers can complete payment after verification.
 | - Transaction declined immediately.
- No opportunity for customer to provide clarification.

---
**Integration Effort** | - Moderate complexity.
- Patch Order API integration required.
 | - Minimal effort.
- Simple binary logic.

---
**API Response** | - Success with risk assessment.
- Includes risk factors and recommendations.
 | - Error response for high-risk.
- Transaction fails at order creation.

---
**Reporting** | - Real-time risk metrics.
- Detailed risk factor analysis.
 | - T+1 failed transaction reports.
- Percentage of orders declined.

---

        

### Integrate Smart Screening

Enable real-time risk assessment in your S2S integration:

    
### Step 1: Create Order with AML Screening

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
  "reviews": {
    "screening": ["aml"]
  },
  "customer_details": {
    "name": "",
    "email": "",
    "contact": "",
    "billing_address": {
      "line1": "Mantri apartment",
      "line2": "Koramangala",
      "city": "Bengaluru",
      "country": "IND",
      "state": "Karnataka",
      "zipcode": "560032"
    },
    "shipping_address": {
      "line1": "Mantri apartment",
      "line2": "Koramangala",
      "city": "Bengaluru",
      "country": "IND",
      "state": "Karnataka",
      "zipcode": "560032"
    }
  }
}'
```

```json: Success
{
  "id": "order_EKwxwAgItmmXdp",
  "entity": "order",
  "amount": 10000,
  "amount_paid": 0,
  "amount_due": 10000,
  "currency": "",
  "receipt": "receipt#1",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1582628071,
  "reviews": {
    "entity": "collection",
    "count": 1,
    "items": [
      {
        "screening": "aml",
        "risk_tier": "high",
        "risk_factors_count": 1,
        "risk_factors": [
          {
            "reason": "name_match_sanction_list",
            "description": "Please share date of birth for better AML precision",
            "source": "customer_details.name"
          }
        ]
      }
    ]
  }
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

      `reviews` _optional_
      : `object` Contains risk assessment features.

        `screening` _optional_
        : `array` Types of risk screening to perform. For example `aml`.

      `customer_details` _mandatory_
      : `object` This contains details about the customer.

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

         `billing_address` _mandatory_
         : `object` This contains the billing address of the order.
      
           `line1` _mandatory_
           : `string` Address Line 1 of the address.
            - Character length: Must be between 3 and 100 characters.
            - Allowed characters: Uppercase letters (A-Z), lowercase letters (a-z), numbers (0-9), spaces, and special characters (*&/-()#_+{}[]:'".,.).
            - Not allowed characters: Regional languages.

           `line2` _mandatory_
           : `string` Address Line 2 of the address.
            - Character length: Must be between 3 and 100 characters.
            - Allowed characters: Uppercase letters (A-Z), lowercase letters (a-z), numbers (0-9), spaces, and special characters (*&/-()#_+{}[]:'".,.).
            - Not allowed characters: Regional languages.

           `city` _mandatory_
           : `string` Name of the city. Must be between 3 and 50 characters in length and can only include uppercase (A-Z) and lowercase (a-z) English letters, and spaces.

           `country` _mandatory_
           : `string` ISO3 country code of the billing address. Only `IND` is allowed.

           `state` _mandatory_
           : `string` Name of the state. It must be between 3 and 50 characters extended and can only include uppercase (A-Z) and lowercase (a-z) English letters and spaces. Please send the full name of the state, for example, Madhya Pradesh.

           `zipcode` _mandatory_
           : `string` The ZIP code must consist of 6-digit numeric characters. Only valid Indian ZIP codes will be accepted. Refer to the list of supported ZIP codes.

           `latitude` _optional_
           : `float` Latitude of the position expressed in decimal degrees (WSG 84), for example, 6.244203. A positive value denotes the northern hemisphere or the equator, and a negative value denotes the southern hemisphere. The number of digits to represent the precision of the coordinate.

           `longitude` _optional_
           : `float` Longitude of the position expressed in decimal degrees (WSG 84), for example, -75.581211. A positive value denotes east longitude or the prime meridian, and a negative value denotes west longitude. The number of digits to represent the precision of the coordinate.

         `shipping_address` _mandatory_
         : `object` This contains the shipping address of the order.
      
           `line1` _mandatory_
           : `string` Address Line 1 of the address.
            - Character length: Must be between 3 and 100 characters.
            - Allowed characters: Uppercase letters (A-Z), lowercase letters (a-z), numbers (0-9), spaces, and special characters (*&/-()#_+{}[]:'".,.).
            - Not allowed characters: Regional languages.

           `line2` _mandatory_
           : `string` Address Line 2 of the address.
            - Character length: Must be between 3 and 100 characters.
            - Allowed characters: Uppercase letters (A-Z), lowercase letters (a-z), numbers (0-9), spaces, and special characters (*&/-()#_+{}[]:'".,.).
            - Not allowed characters: Regional languages.

           `city` _mandatory_
           : `string` Name of the city. Must be between 3 and 50 characters in length and can only include uppercase (A-Z) and lowercase (a-z) English letters, and spaces.

           `country` _mandatory_
           : `string` ISO3 country code of the billing address. Only `IND` is allowed.

           `state` _mandatory_
           : `string` Name of the state. It must be between 3 and 50 characters extended and can only include uppercase (A-Z) and lowercase (a-z) English letters and spaces. Please send the full name of the state, for example, Madhya Pradesh.

           `zipcode` _mandatory_
           : `string` The ZIP code must consist of 6-digit numeric characters. Only valid Indian ZIP codes will be accepted. Refer to the list of supported ZIP codes.

           `latitude` _optional_
           : `float` Latitude of the position expressed in decimal degrees (WSG 84), for example, 6.244203. A positive value denotes the northern hemisphere or the equator, and a negative value denotes the southern hemisphere. The number of digits to represent the precision of the coordinate.

           `longitude` _optional_
           : `float` Longitude of the position expressed in decimal degrees (WSG 84), for example, -75.581211. A positive value denotes east longitude or the prime meridian, and a negative value denotes west longitude. The number of digits to represent the precision of the coordinate.
      

  
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

      `reviews`
      : `object` Contains all risk assessment results.

         `entity`
         : `string` Type of object. Here it is `collection`.

         `count`
         : `integer` Number of risk assessments performed.

         `items`
         : `array` List of risk assessment results.

            `screening`
            : `string` Type of screening performed. Here it is `aml`.

            `risk_tier`
            : `string` Overall risk level of the transaction. Possible values:
              - `high`
              - `medium`
              - `low`
              - `pending`

            `risk_factors_count`
            : `integer` Number of risk factors identified.

            `risk_factors`
            : `array` Detailed risk factor information.

               `reason`
               : `string` Identifier for the specific risk factor. For example `name_match_sanction_list`.

               `description`
               : `string` Description of the risk factor.

               `source`
               : `string` Field or data point that triggered the risk factor. For example, `customer_details.name`.
      

  
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
   Only english alphabets are allowed in customer name. | The customer name provided in the request contains characters other than English alphabets, such as numbers, special characters, regional language characters, or emojis. | Ensure that the name field in the request contains only English letters (A-Z, a-z) and meets the validation criteria: - Verify that the name does not include numerical characters, special characters (For example, @, #, $, and so on.), or non-Latin scripts.
- Confirm that there are no extra spaces at the beginning or end of the name.

   ---
   Customer name should be between 5 and 50 characters. | The `name` field provided in the request does not meet the required character length. It is either shorter than 5 characters or exceeds 50 characters. | - Ensure that the `name` field in the request is between 5 and 50 characters long.
- Check that no extra spaces are included at the beginning or end of the name, which might affect the character count.

   ---
   Customer name is invalid. | The `name` field provided in the request does not meet the validation requirements. This could be due to the presence of disallowed characters, such as special characters, numbers, regional language characters, or the use of non-Latin scripts. | - Ensure that the `name` field only contains English letters (A-Z, a-z) and spaces (not at the beginning).
- Verify that the name does not include special characters, numerical digits, emojis, or regional language characters.
- Check for unintended characters that may have been included by mistake (For example, trailing spaces or special symbols).

   ---
   Only English alphabet is allowed in City and State. | The `city` or `state` field in the request contains invalid characters such as numbers, special characters, or regional language text. | - Ensure that the `city` and `state` fields only contain English letters (A-Z, a-z) and spaces.
- Verify that these fields do not include numerical characters, special characters, or regional language scripts.

   ---
   Address line 1 and line 2 can only contain alphanumeric characters and limited special characters. | The `Address line1` or `Address line2` field in the request contains invalid characters that are not allowed, such as unsupported symbols or regional language characters. | - Ensure that `Address line1` and `Address line2` only include alphanumeric characters (A-Z, a-z, 0-9) and allowed special characters (For example, *&/-()#_+{}[]:'".,).
- Verify that no unsupported symbols or regional language scripts are included.

   
  

        
    
    
### Step 2: Fetch Order With Updated Risk Assessment (optional)

After creating an order, retrieve the updated risk assessment.

/orders/:order_id?expand[]=order.reviews

```cURL: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET "https://api.razorpay.com/v1/orders/order_EKwxwAgItmmXdp?expands[]=order.reviews"
```

```json: Success
{
  "id": "order_EKwxwAgItmmXdp",
  "entity": "order",
  "amount": 50000,
  "amount_paid": 0,
  "amount_due": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1582628071,
  "reviews": {
    "entity": "collection",
    "count": 1,
    "items": [
      {
        "screening": "aml",
        "risk_tier": "high",
        "risk_factors_count": 1,
        "risk_factors": [
          {
            "reason": "name_match_sanction_list",
            "description": "please share date of birth for better aml precision",
            "source": "customer_details.name"
          }
        ]
      }
    ]
  }
}
```

  
      Query Parameters
      
      `expands[]=order.reviews`
      : `string` Use to expand the AML risk assessment details for an order. Returns the `reviews` object containing risk tier, risk factors count, and detailed risk factors with reasons, descriptions and sources.
       

  
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

      `reviews`
      : `object` Contains all risk assessment results.

         `entity`
         : `string` Type of object. Here it is `collection`.

         `count`
         : `integer` Number of risk assessments performed.

         `items`
         : `array` List of risk assessment results.

            `screening`
            : `string` Type of screening performed. Here it is `aml`.

            `risk_tier`
            : `string` Overall risk level of the transaction. Possible values:
              - `high`
              - `medium`
              - `low`
              - `pending`

            `risk_factors_count`
            : `integer` Number of risk factors identified.

            `risk_factors`
            : `array` Detailed risk factor information.

               `reason`
               : `string` Identifier for the specific risk factor. For example `name_match_sanction_list`.

               `description`
               : `string` Description of the risk factor.

               `source`
               : `string` Field or data point that triggered the risk factor. For example, `customer_details.name`.
      

        
    
    
### Step 3: Patch Order (If High Risk)

Reduce the risk score by providing additional customer compliance information to the flagged order.

/orders/:order_id

```cURL: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X PATCH https://api.razorpay.com/v1/orders/order_EKwxwAgItmmXdp \
-H "Content-Type: application/json" \
-d '{
  "customer_details": {
    "type": "individual",
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

```json: Success
{
  "id": "order_EKwxwAgItmmXdp",
  "entity": "order",
  "amount": 2200,
  "amount_paid": 0,
  "amount_due": 2200,
  "currency": "",
  "receipt": "Receipt#211",
  "offer_id": null,
  "status": "attempted",
  "attempts": 1,
  "customer_details": {
    "name": "",
    "email": "",
    "contact": "",
    "business_type": "individual",
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
  },
  "notes": {
    "key1": "value3",
    "key2": "value2"
  },
  "created_at": 1572505143,
  "updated_at": 1723283456
}
```

  
      Request Parameters
      
      `customer_details` _mandatory_
      : `object` This contains details about the customer.

         `type` _optional_
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

      `customer_details` _mandatory_
      : `object` This contains details about the customer.

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
   Only English alphabet is allowed in City and State. | The `city` or `state` field in the request contains invalid characters such as numbers, special characters, or regional language text. | - Ensure that the `city` and `state` fields only contain English letters (A-Z, a-z) and spaces.
- Verify that these fields do not include numerical characters, special characters, or regional language scripts.

   ---
   Address line 1 and line 2 can only contain alphanumeric characters and limited special characters. | The `Address line1` or `Address line2` field in the request contains invalid characters that are not allowed, such as unsupported symbols or regional language characters. | - Ensure that `Address line1` and `Address line2` only include alphanumeric characters (A-Z, a-z, 0-9) and allowed special characters (For example, *&/-()#_+{}[]:'".,).
- Verify that no unsupported symbols or regional language scripts are included.

   
  

        
    
    
### Step 4: Create a Payment

Once the order is created, pass the order_id from the Orders API response to the [Create a Payment API](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/s2s-integration/build-integration/#13-create-a-payment.md).
        

### S2S API Integration with Automatic Order Failure

  
### Automatic Failure Implementation

**How it works:**
  - Razorpay automatically fails transactions predicted to be AML-positive at the Create Order step.
  - Orders identified as high-risk are declined before payment processing.
  - No additional data collection required from customers.
  - Receive T+1 reports showing failed order statistics.
  
**Best for:**
  - Businesses prioritising zero AML risk.
  - Use cases where declining high-risk transactions is acceptable.
  - Businesses unable to implement additional data collection.

**Reporting:**
  - Daily T+1 reports showing:
    - Number of orders failed due to AML.
    - Percentage of total orders affected.
  

## Support

For further assistance, reach out to our [Support team](https://razorpay.com/support) or email us at `import-mission@razorpay.com`.

### Related Information

[Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/s2s-integration/test-integration.md)
