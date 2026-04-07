---
title: Update a Bill
description: Update Bills with this endpoint.
---

# Update a Bill

## Update a Bill

Use this endpoint to update a Bill.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X PATCH https://api.razorpay.com/v1/bills/bill_4a5e9ulyzk1mk2
-d '{
  "store_code": "",
  "customer": {
    "contact": "9000090001",
    "email": "saurav.kumar@example.com"
  },
  "receipt_type": "tax_invoice",
  "receipt_timestamp": 1907416999,
  "receipt_delivery": "digital",
  "line_items": [
    {
      "name": "T-Shirt",
      "quantity": 1,
      "employee_id": "1234",
      "total_amount": 100000
    }
  ],
  "receipt_summary": {
    "total_quantity": 1,
    "sub_total_amount": 100000,
    "currency": "INR",
    "net_payable_amount": 124000,
    "additional_charges": [
      {
        "description": "alteration charge",
        "amount": 2000
      },
      {
        "description": "cash on delivery",
        "amount": 2000
      },
    ],
    "payment_status": "paid"
  },
  "taxes": [
    {
      "name": "cgst",
      "percentage": 1200,
      "amount": 12000
    },
    {
      "name": "sgst",
      "percentage": 1200,
      "amount": 12000
    }
  ],
  "payments": [
    {
      "method": "Bank Transfer",
      "amount": 124000,
      "currency": "INR"
    }
  ]
}'
```

### Response

```json: Success
{
  "id": "bill_PYy4RWJWiNcPyE",
  "business_type": "retail",
  "business_category": "events",
  "customer": {
    "contact": "9000090001",
    "name": "d",
    "email": "saurav.kumar@example.com",
    "customer_id": "",
    "age": 2,
    "date_of_birth": "",
    "profession": "",
    "company_name": "",
    "marital_status": "",
    "spouse_name": "",
    "anniversary_date": "",
    "gender": "",
    "gstin": "",
    "billing_address": {
      "address_line_1": "",
      "address_line_2": "",
      "landmark": "",
      "city": "",
      "province": "",
      "pin_code": "",
      "country": ""
    },
    "shipping_address": {
      "address_line_1": "",
      "address_line_2": "",
      "landmark": "",
      "city": "",
      "province": "",
      "pin_code": "",
      "country": ""
    }
  },
  "loyalty": {
    "type": "",
    "card_num": "",
    "card_holder_name": "",
    "points_redeemed": 1
  },
  "store_code": "JK-001",
  "receipt_timestamp": 1907416999,
  "receipt_number": "INV00124992",
  "receipt_type": "tax_invoice",
  "receipt_delivery": "digital",
  "bar_code_number": "",
  "qr_code_number": "T2322 00000009291",
  "billing_pos_number": "bn",
  "pos_category": "traditional_pos",
  "order_number": "",
  "order_service_type": "",
  "delivery_status_url": "",
  "line_items": [
    {
      "name": "T-Shirt",
      "quantity": 1,
      "unit": "",
      "employee_id": "1234",
      "description": "",
      "hsn_code": "",
      "product_code": "",
      "product_uid": "",
      "image_url": "",
      "total_amount": 100000,
      "brand": "",
      "style": "",
      "colour": "",
      "size": "",
      "financier_data": null,
      "taxes": [],
      "tags": [],
      "sub_items": []
    }
  ],
  "receipt_summary": {
    "total_quantity": 1,
    "sub_total_amount": 100000,
    "currency": "INR",
    "net_payable_amount": 124000,
    "additional_charges": [
      {
        "description": "alteration charge",
        "amount": 2000
      },
      {
        "description": "cash on delivery",
        "amount": 2000
      },
    ],
    "payment_status": "paid",
    "discounts": []
  },
  "taxes": [
    {
      "name": "cgst",
      "percentage": 1200,
      "amount": 120
    },
    {
      "name": "sgst",
      "percentage": 1200,
      "amount": 120
    }
  ],
  "payments": [
    {
      "method": "Bank Transfer",
      "currency": "INR",
      "amount": 124000,
      "payment_reference_id": "",
      "financier_data": null
    }
  ],
  "event": {
    "name": "My Party",
    "start_timestamp": 1722911400,
    "end_timestamp": 1722924000,
    "location": "B-wing",
    "room": "Auditorium 1",
    "seats": [
      "gold b1",
      "gold b2",
      "gold b3"
    ]
  },
  "receipt_url": "yourbill.me/PYy4RWJWiNcPyE",
  "created_at": 1907416999,
  "tags": [
    "party1",
    "graduation"
  ]
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the Bill.

### Parameters

`store_code` _conditionally mandatory_
: `string` Associated store code for the receipt. Required if you have a multi-store setup where you have a single integration and have multiple stores under you.

`customer`  _conditionally mandatory_
: `object` Details of the customer. Required if receipt mode is `digital` or `digital_and_print`.

  `contact` _conditionally mandatory_
  : `string` The customer's phone number. Required if receipt mode is `digital` or `digital_and_print` and `email` is not present.

  `name` _optional_
  : `string` The customer's name.

  `email` _conditionally mandatory_
  : `string` The customer's email address. Required if receipt mode is `digital` or `digital_and_print` and `contact` is not present.

  `customer_id` _optional_
  : `string` The customer's customer_id. Required if receipt mode is `digital` or `digital_and_print` and neither `contact` nor `email` is present.

  `age` _optional_
  : `integer` Age of the customer.

  `date_of_birth` _optional_
  : `string` Customer's date of birth.

  `pan` _optional_
  : `string` PAN number of the billed customer.

  `profession` _optional_
  : `string` Customer's current job profile name.

  `company_name` _optional_
  : `string` Customer current employer.

  `marital_status` _optional_
  : `string` Customer's marital status. Possible values:
    - `married`
    - `unmarried`

  `spouse_name` _optional_
  : `string` Name of customer's spouse.

  `anniversary_date` _optional_
  : `string` Customer's date of anniversary.

  `gender` _optional_
  : `string` Customer gender. Possible values:
    - `male`
    - `female`
    - `other`

  `gstin` _optional_
  : `string` Customer's GST number.

  `billing_address` _mandatory_
  : `object` Customer's billing address. Required if your `business_type` is `ecommerce`.

    `address_line_1` _optional_
    : `string` Customer billing address line 1.

    `address_line_2` _optional_
    : `string` Customer billing address line 2.

    `landmark` _optional_
    : `string` Customer billing address landmark.

    `city` _optional_
    : `string` Customer billing address city.

    `province` _optional_
    : `string` Customer billing address province.

    `pin_code` _optional_
    : `string` Customer billing address PIN code.

    `country` _optional_
    : `string` Customer billing address country.

  `shipping_address` _mandatory_
  : `object` Customer's billing address. Required if your `business_type` is `ecommerce`.

    `customer_name` _optional_
    : `string` Name of the recipient.

    `contact` _optional_
    : `string` The mobile number of the recipient.

    `gstin` _optional_
    : `string` GST number of the recipient.

    `pan` _optional_
    : `string` PAN number of the recipient.
    
    `address_line_1` _optional_
    : `string` Customer shipping address line 1.

    `address_line_2` _optional_
    : `string` Customer shipping address line 2.

    `landmark` _optional_
    : `string` Customer shipping address landmark.

    `city` _optional_
    : `string` Customer shipping address city.

    `province` _optional_
    : `string` Customer shipping address province.

    `pin_code` _optional_
    : `string` Customer shipping address PIN code.

    `country` _optional_
    : `string` Customer shipping address country.

`employee` _optional_
: `object` This is an array of objects containing details of the employees associated with the receipt.

  `id` _optional_
  : `string` Employee ID/code. Unique identifier of the employee.

  `name` _optional_
  : `string` Name of the employee.

  `role` _optional_
  : `string` Employee designation/role.

`loyalty` _conditionally mandatory_
: `object` Customer loyalty details.

  `type` _optional_
  : `string` Customer loyalty type.

  `card_num` _optional_
  : `string` Hashed debit/credit card number provided by the customer.

  `card_holder_name` _optional_
  : `string` Name of the card holder.

  `wallet_amount` _optional_
  : `integer` Wallet amount after used rewards of the customer.

  `amount_saved` _optional_
  : `integer` Amount saved by the customer.

  `points_earned` _optional_
  : `integer` Points earned by the customer after a transaction.

  `points_redeemed` _optional_
  : `integer` Points redeemed by the customer on a transaction.

  `points_available` _optional_
  : `integer` Points available to the customer at the beginning of the transaction.

  `points_balance` _optional_
  : `integer` Points available to the customer at the end of the transaction.

`receipt_type` _mandatory_
: `string` The type of receipt. Possible values:
  - `tax_invoice`
  - `sales_invoice`
  - `sales_return_invoice`
  - `proforma_invoice`
  - `credit_invoice`
  - `purchase_invoice`
  - `debit_invoice`

`receipt_timestamp` _mandatory_
: `integer` UNIX timestamp of the date and time when the receipt was generated.

`receipt_delivery` _mandatory_
: `string` Indicates the delivery type of the receipt. Possible values:
  - `digital`
  - `print`
  - `digital_and_print`

`tags` _optional_
: `string` An array of strings representing relevant tags associated with the invoice.

`pos_category` _optional_
: `string` The type of POS machine. This is applicable if `business_type` is `retail`. Possible values:
  - `traditional_pos`
  - `kiosk_pos`

`line_items` _conditionally mandatory_
: `object` This is an array of objects containing the product data of the bill. Required if `receipt_type` is not `credit_invoice` or `debit_invoice`.

  `name` _mandatory_
  : `string` Name of the product.

  `quantity` _mandatory_
  : `float` Quantity of the product.

  `unit_amount` _optional_
  : `integer` Price of the product.

  `unit` _optional_
  : `string` Type of unit. Possible values:
    - `kg`
    - `g`
    - `mg`
    - `lt`
    - `ml`
    - `pc`
    - `cm`
    - `m`
    - `in`
    - `ft`
    - `set`

  `gross_weight` _optional_
  : `float` The total weight of the item, including all materials such as metal, stones, diamonds, and other embellishments.

  `net_weight` _optional_
  : `float` The weight of only the metal used in the item, excluding the weight of any diamonds, stones, or other materials.
  
  `description` _optional_
  : `string` Product/Item description.

  `hsn_code` _optional_
  : `string` HSN code of the product.

  `product_code` _optional_
  : `string` Product/Item code.

  `product_uid` _optional_
  : `string` Product/Item UID/SKU Code.

  `image_url` _optional_
  : `string` Image URL of the product.

  `total_amount` _mandatory_
  : `integer` Total amount of the product.

  `brand` _optional_
  : `string` Brand name of the product.

  `style` _optional_
  : `string` Product style.

  `colour` _optional_
  : `string` Colour of the product.

  `size` _optional_
  : `string` Size of the product in `cm`.

  `tags` _optional_
  : `string` An array of strings representing relevant tags associated with the item.

  `employee_id` _optional_
  : `string` Unique ID of the employee who sold the product.

  `additional_charges` _optional_
  : `object` This is an array of objects containing details of the additional charges of the item.

    `description` _optional_
    : `string` Description of the additional charge.

    `amount` _optional_
    : `integer` Amount of additional charge.

    `percent` _optional_
    : `float` Percent calculated on total amount.
  
  `sub_items` _conditionally mandatory_
  : `object` An array of objects containing the sub-item details of the item.
  
    `name` _mandatory_
    : `string` Name of the sub-item.

    `quantity` _mandatory_
    : `integer` Sub-item quantity.

    `unit_amount` _optional_
    : `integer` Price of the sub-item.

    `unit` _optional_
    : `string` Type of unit. Possible values:
    - `kg`
    - `g`
    - `mg`
    - `lt`
    - `ml`
    - `pc`
    - `cm`
    - `m`
    - `in`
    - `ft`
    - `set`

    `gross_weight` _optional_
    : `float` The total weight of the item, including all materials such as metal, stones, diamonds, and other embellishments.

    `net_weight` _optional_
    : `float` The weight of only the metal used in the item, excluding the weight of any diamonds, stones, or other materials.
    
    `description` _optional_
    : `string` Sub-item description.

    `hsn_code` _optional_
    : `string` HSN code of the product.

    `product_code` _optional_
    : `string` Sub-item code.

    `product_uid` _optional_
    : `string` Sub-item UID/SKU Code.

    `image_url` _optional_
    : `string` Image URL of the sub-item.

    `total_amount` _mandatory_
    : `integer` Total amount of the sub-item.

    `brand` _optional_
    : `string` Brand name of the sub-item.

    `style` _optional_
    : `string` Sub-item style.

    `colour` _optional_
    : `string` Colour of the sub-item.

    `size` _optional_
    : `string` Size of the sub-item in `cm`.

    `tags` _optional_
    : `string` An array of strings representing relevant tags associated with the sub-item.

    `employee_id` _optional_
    : `string` Unique ID of the employee who sold the product.

    `additional_charges` _optional_
    : `object` This is an array of objects containing details of the additional charges of the item.

      `description` _optional_
      : `string` Description of the additional charge.

      `amount` _optional_
      : `integer` Amount of additional charge.

      `percent` _optional_
      : `float` Percent calculated on total amount.

    `taxes` _optional_
    : `object` This is an array of objects containing the details of the taxes incurred.

      `name` _mandatory_
      : `string` Name of the tax. For example, CGST, SGST and so on.

      `percentage` _optional_
      : `float` Percentage of tax.

      `amount` _mandatory_
      : `integer` Applicable tax calculated on total amount.

  `financier_data` _optional_
  : `object` Data of the financier. This is applicable if the product is financed. For example, if the product is purchased on EMI.

    `reference` _optional_
    : `string` Unique id of the financier.

    `name` _optional_
    : `string` Name of the financier.

  `taxes` _optional_
  : `object` This is an array of objects containing the details of the taxes incurred.

    `name` _mandatory_
    : `string` Name of the tax. For example, CGST, SGST and so on.

    `percentage` _optional_
    : `float` Percentage of tax.

    `amount` _mandatory_
    : `integer` Applicable tax calculated on total amount.

`receipt_summary` _mandatory_
: `object` Details of the receipt.

  `total_quantity` _mandatory_
  : `integer` Total product quantity sold in the invoice.

  `sub_total_amount` _optional_
  : `integer` The total amount before taxes, discounts and additional fees are added to the invoice.

  `currency` _mandatory_
  : `string` The currency of the invoice. Refer to this sheet for the list of supported currencies.

  `total_tax_amount` _optional_
  : `integer` Total tax amount in paise.

  `total_tax_percent` _optional_
  : `float` Total tax percentage applied on the receipt. 

  `net_payable_amount` _mandatory_
  : `integer` The total amount payable after adding taxes, discounts and additional fees to the invoice.

  `additional_charges` _optional_
  : `object` This is an array of objects containing the details of any additional charges applied on the invoice. If `additional_charges` is present, then `description` and `amount` are required.

    `description` _optional_
    : `string` Description of the additional charge.

    `amount` _optional_
    : `integer` Amount of the additional charge.

    `percent` _optional_ 
    : `float` Percent calculated on total amount.

  `payment_status` _optional_
  : `string` Status of the payment. Possible values:
    - `pending`
    - `authorized`
    - `failed`
    - `declined`
    - `refunded`
    - `cancelled`
    - `processed`
    - `settled`
    - `voided`
    - `success`
    - `paid`
    - `unpaid`

  `change_amount` _optional_
  : `integer` Change amount to be returned to the customer if the payment was made in cash.

  `roundup_amount` _optional_
  : `integer` Change amount to be returned to the customer if the payment was made in cash.

  `total_discount_percent` _optional_
  : `float` Total percentage of the discount on the sub-total amount without the taxes.

  `total_discount_amount` _optional_
  : `integer` Total value of the discount on the invoice.

  `discounts` _optional_
  : `object` This is an array of objects containing the details of the discount. If product reference (`product_code`, `product_uid`, or `hsn_code`) is present in the object, then the discount will be on the item. If not, the discount will be on the invoice.

    `name` _optional_
    : `string` Name of the discount.

    `amount` _optional_
    : `string` Amount of the applied discount.

    `percent` _optional_ 
    : `integer` Percentile value of the discounted amount.

    `product_code` _optional_
    : `string` Product/Item code.

    `product_uid` _optional_
    : `string` Product/Item UID/SKU Code.

    `hsn_code` _optional_
    : `string` HSN code of the product.

    `reference_id` _optional_
    : `string` Reference ID of the discount.

  `used_wallet_amount` _optional_
  : `string` Amount used from the customer's wallet for this transaction.

`taxes` _optional_
  : `object` This is an array of objects containing the details of the taxes incurred.

    `name` _mandatory_
    : `string` Name of the tax. For example, CGST, SGST and so on.

    `percentage` _optional_
    : `float` Percentage of tax.

    `amount` _mandatory_
    : `integer` Applicable tax calculated on total amount.

`payments` _mandatory_
: `object` This is an array of objects containing the details of the payment.

  `method` _mandatory_
  : `string` The mode of payment.

  `currency` _mandatory_
  : `string` The currency in which the payment was made.

  `amount` _mandatory_
  : `integer` The amount of the payment in paise. For example, if the amount is `1200`. The unit will be `120000`.

`irn` _optional_
: `object` This object contains IRN ( Invoice Reference Number ) related details. If `irn` is present,
qr_code and irn_number are required.

  `acknowledgement_number` _optional_
  : `string` Acknowledgement number of the generated IRN.

  `acknowledgement_date` _optional_
  : `integer` Acknowledgement date of the generated IRN.

  `qr_code` _conditionally mandatory_
  : `string` QR code associated with the IRN. Required if `irn` is present.

  `irn_number` _conditionally mandatory_
  : `string` E-invoice IRN. Required if IRN is present.

### Parameters

`id` _mandatory_
: `string` Unique id of the bill generated.

`business_type` _mandatory_
: `string` The type of business. Possible values:
  - `ecommerce`
  - `retail`

`business_category` _mandatory_
: `string` The category the business falls under. Possible values:
  - `events`
  - `food_and_beverages`
  - `retail_and_consumer_goods`
  - `other_services`

`customer`  _conditionally mandatory_
: `object` Details of the customer. Required if receipt mode is `digital` or `digital_and_print`.

  `contact` _conditionally mandatory_
  : `string` The customer's phone number. Required if receipt mode is `digital` or `digital_and_print` and `email` is not present.

  `name` _optional_
  : `string` The customer's name.

  `email` _conditionally mandatory_
  : `string` The customer's email address. Required if receipt mode is `digital` or `digital_and_print` & `contact` not present.

  `customer_id` _optional_
  : `string` The customer's customer_id. Required if receipt mode is `digital` or `digital_and_print` and neither `contact` nor `email` is present.

  `age` _optional_
  : `integer` Age of the customer.

  `date_of_birth` _optional_
  : `string` Customer's date of birth.

  `profession` _optional_
  : `string` Customer's current job profile name.

  `company_name` _optional_
  : `string` Customer current employer.

  `date_of_birth` _optional_
  : `string` Customer's date of birth.

  `marital_status` _optional_
  : `string` Customer's marital status. Possible values:
    - `married`
    - `unmarried`

  `spouse_name` _optional_
  : `string` Name of customer's spouse.

  `anniversary_date` _optional_
  : `string` Customer's date of anniversary.

  `gender` _optional_
  : `string` Customer gender. Possible values:
    - `male`
    - `female`
    - `other`

  `gstin` _optional_
  : `string` Customer's GST number.

  `billing_address` _mandatory_
  : `object` Customer's billing address. Required if your `business_type` is `ecommerce`.

    `address_line_1` _optional_
    : `string` Customer billing address line 1.

    `address_line_2` _optional_
    : `string` Customer billing address line 2.

    `landmark` _optional_
    : `string` Customer billing address landmark.

    `city` _optional_
    : `string` Customer billing address city.

    `province` _optional_
    : `string` Customer billing address province.

    `pin_code` _optional_
    : `string` Customer billing address PIN code.

    `country` _optional_
    : `string` Customer billing address country.

  `shipping_address` _mandatory_
  : `object` Customer's billing address. Required if your `business_type` is `ecommerce`.

    `address_line_1` _optional_
    : `string` Customer shipping address line 1.

    `address_line_2` _optional_
    : `string` Customer shipping address line 2.

    `landmark` _optional_
    : `string` Customer shipping address landmark.

    `city` _optional_
    : `string` Customer shipping address city.

    `province` _optional_
    : `string` Customer shipping address province.

    `pin_code` _optional_
    : `string` Customer shipping address PIN code.

    `country` _optional_
    : `string` Customer shipping address country.

`loyalty` _conditionally mandatory_
: `object` Customer loyalty details.

  `type` _optional_
  : `string` Customer loyalty type.

  `card_num` _optional_
  : `string` Hashed debit/credit card number provided by the customer.

  `card_holder_name` _optional_
  : `string` Name of the card holder.

  `wallet_amount` _optional_
  : `integer` Wallet amount after used rewards of the customer.

  `amount_saved` _optional_
  : `integer` Amount saved by the customer.

  `points_earned` _optional_
  : `integer` Points earned by the customer after a transaction.

  `points_redeemed` _optional_
  : `integer` Points redeemed by the customer on a transaction.

  `points_available` _optional_
  : `integer` Points available to the customer at the beginning of the transaction.

  `points_balance` _optional_
  : `integer` Points available to the customer at the end of the transaction.

`store_code` _conditionally mandatory_
: `string` Associated store code for the receipt. Required if you have a multi-store setup where you have a single integration and have multiple stores under you.

`receipt_timestamp` _mandatory_
: `integer` UNIX timestamp of the date and time when the receipt was generated.

`receipt_number` _mandatory_
: `string` Unique receipt number generated for the bill.

`receipt_type` _mandatory_
: `string` The type of receipt. Possible values:
  - `tax_invoice`
  - `sales_invoice`
  - `sales_return_invoice`
  - `proforma_invoice`
  - `credit_invoice`
  - `purchase_invoice`
  - `debit_invoice`

`receipt_delivery` _mandatory_
: `string` Indicates the delivery type of the receipt. Possible values:
  - `digital`
  - `print`
  - `digital_and_print`

`tags` _optional_
: `string` An array of strings representing relevant tags associated with the invoice.

`bar_code_number` _optional_
: `integer` Bar code generated after the transaction. This will be displayed on the digital bill only.

`qr_code_number` _optional_
: `integer` QR code generated after the transaction. This will be displayed on the digital bill only.

`billing_pos_number` _optional_
: `string` POS number of the machine that generated the bill. This is applicable if `business_type` is `retail`.

`pos_category` _optional_
: `string` The type of POS machine. This is applicable if `business_type` is `retail`. Possible values:
  - `traditional_pos`
  - `kiosk_pos`

`order_number` _optional_
: `string` Incremental order number of the generated bill.

`order_service_type` _optional_
: `string` Order service type of the generated bill. This is applicable if `business_category` is `food_and_beverages`. Possible values:
  - `dine_in`
  - `take_away`

`delivery_status_url` _optional_
: `string` Order delivery status. This is applicable if `business_type` is `ecommerce`.

`line_items` _conditionally mandatory_
: `object` This is an array of objects containing the product data of the bill. Required if `receipt_type` is not `credit_invoice` or `debit_invoice`.

  `name` _mandatory_
  : `string` Name of the product.

  `quantity` _mandatory_
  : `float` Quantity of the product.

  `unit_amount` _optional_
  : `integer` Price of the product.

  `employee_id` _optional_
  : `string` Unique ID of the employee who sold the product.

  `unit` _optional_
  : `string` Type of unit. Possible values:
    - `kg`
    - `g`
    - `mg`
    - `lt`
    - `ml`
    - `pc`
    - `cm`
    - `m`
    - `in`
    - `ft`
    - `set`

  `description` _optional_
  : `string` Product/Item description.

  `hsn_code` _optional_
  : `string` HSN code of the product.

  `product_code` _optional_
  : `string` Product/Item code.

  `product_uid` _optional_
  : `string` Product/Item UID/SKU Code.

  `image_url` _optional_
  : `string` Image URL of the product.

  `total_amount` _mandatory_
  : `integer` Total amount of the product.

  `brand` _optional_
  : `string` Brand name of the product.

  `style` _optional_
  : `string` Product style.

  `colour` _optional_
  : `string` Colour of the product.

  `size` _optional_
  : `string` Size of the product in `cm`.

  `tags` _optional_
  : `string` An array of strings representing relevant tags associated with the item.

  `sub_items` _conditionally mandatory_
  : `object` An array of objects containing the sub-item details of the item.
  
    `name` _mandatory_
    : `string` Name of the sub-item.

    `quantity` _mandatory_
    : `integer` Sub-item quantity.

    `unit_amount` _optional_
    : `integer` Price of the sub-item.

    `employee_id` _optional_
    : `string` Unique ID of the employee who sold the product.

    `unit` _optional_
    : `string` Type of unit. Possible values:
    - `kg`
    - `g`
    - `mg`
    - `lt`
    - `ml`
    - `pc`
    - `cm`
    - `m`
    - `in`
    - `ft`
    - `set`

    `description` _optional_
    : `string` Sub-item description.

    `hsn_code` _optional_
    : `string` HSN code of the product.

    `product_code` _optional_
    : `string` Sub-item code.

    `product_uid` _optional_
    : `string` Sub-item UID/SKU Code.

    `image_url` _optional_
    : `string` Image URL of the sub-item.

    `total_amount` _mandatory_
    : `integer` Total amount of the sub-item.

    `brand` _optional_
    : `string` Brand name of the sub-item.

    `style` _optional_
    : `string` Sub-item style.

    `colour` _optional_
    : `string` Colour of the sub-item.

    `size` _optional_
    : `string` Size of the sub-item in `cm`.

    `tags` _optional_
    : `string` An array of strings representing relevant tags associated with the sub-item.

    `taxes` _optional_
    : `object` This is an array of objects containing the details of the taxes incurred.

      `name` _mandatory_
      : `string` Name of the tax. For example, CGST, SGST and so on.

      `percentage` _optional_
      : `float` Percentage of tax.

      `amount` _mandatory_
      : `integer` Applicable tax calculated on total amount.

  `taxes` _optional_
  : `object` This is an array of objects containing the details of the taxes incurred.

    `name` _mandatory_
    : `string` Name of the tax. For example, CGST, SGST and so on.

    `percentage` _optional_
    : `float` Percentage of tax.

    `amount` _mandatory_
    : `integer` Applicable tax calculated on total amount.

`receipt_summary` _mandatory_
: `object` Details of the receipt.

  `total_quantity` _mandatory_
  : `integer` Total product quantity sold in the invoice.

  `sub_total_amount` _optional_
  : `integer` The total amount before taxes, discounts and additional fees are added to the invoice.

  `currency` _mandatory_
  : `string` The currency of the invoice. Refer to this sheet for the list of supported currencies.

  `total_tax_amount` _optional_
  : `integer` Total tax amount in paise.

  `total_tax_percent` _optional_
  : `float` Total tax percentage applied on the receipt. 

  `net_payable_amount` _mandatory_
  : `integer` The total amount payable after adding taxes, discounts and additional fees to the invoice.

  `additional_charges` _optional_
  : `object` This is an array of objects containing the details of any additional charges applied on the invoice. If `additional_charges` is present, then `description` and `amount` are required.

    `description` _optional_
    : `string` Description of the additional charge.

    `amount` _optional_
    : `integer` Amount of the additional charge.

    `percent` _optional_ 
    : `float` Percent calculated on total amount.

  `payment_status` _optional_
  : `string` Status of the payment. Possible values:
    - `pending`
    - `authorized`
    - `failed`
    - `declined`
    - `refunded`
    - `cancelled`
    - `processed`
    - `settled`
    - `voided`
    - `success`
    - `paid`
    - `unpaid`

  `change_amount` _optional_
  : `integer` Change amount to be returned to the customer if the payment was made in cash.

  `roundup_amount` _optional_
  : `integer` Change amount to be returned to the customer if the payment was made in cash.

  `total_discount_percent` _optional_
  : `float` Total percentage of the discount on the sub-total amount without the taxes.

  `total_discount_amount` _optional_
  : `integer` Total value of the discount on the invoice.

  `discounts` _optional_
  : `object` This is an array of objects containing the details of the discount.

    `name` _optional_
    : `string` Name of the discount.

    `amount` _optional_
    : `string` Amount of the applied discount.

    `percent` _optional_ 
    : `integer` Percentile value of the discounted amount.

  `used_wallet_amount` _optional_
  : `string` Amount used from the customer's wallet for this transaction.

`taxes` _conditionally mandatory_
: `object` This is an array of objects containing the details of the taxes applied. Required if `receipt_type` is `tax_inovice`, `purchase_invoice` or `sales_invoice`.

  `name` _mandatory_
  : `string` Name of the tax. For example, CGST, SGST and so on.

  `percentage` _optional_
  : `float` Percentage of tax.

  `amount` _mandatory_
  : `integer` Applicable tax calculated on total amount.

`payments` _mandatory_
: `object` Details of the payment.

  `method` _mandatory_
  : `string` The mode of payment.

  `currency` _mandatory_
  : `string` The currency in which the payment was made.

  `amount` _mandatory_
  : `integer` The amount of the payment in paise. For example, if the amount is `1200`. The unit will be `120000`.

  `payment_reference_id` _optional_
  : `string` The Unique id of the payment method.

  `financier_data` _optional_
  : `object` Details of the financier.

    `reference` _optional_
    : `string` Unique id of the financier.

    `name` _optional_
    : `string` Name of the financier.

`event` _conditionally mandatory_
: `object` Details of the event booking. Required if `business_category` is `events`.

  `name` _mandatory_
  : `string` Name of the event.

  `start_timestamp` _optional_
  : `integer` The exact time in seconds when the event starts.

  `end_timestamp` _optional_
  : `integer` The exact time in seconds when the event ends.

  `location` _optional_
  : `string` The location/venue of the event.

  `room` _optional_
  : `string` The specific room where the event was held.

  `seats` _optional_
  : `string` The number of seats booked for the event.

`receipt_url`
: `string` The link to the receipt.

`created_at`
: `integer` UNIX timestamp of the date when the bill was generated.

### Errors

client not authorised to update
* code: 401
* description: The client credentials are unauthorised to make changes to this bill.
* solution: Use authorised credentials to make changes to the bill.

The quantity must be an integer
* code: 400
* description: The quantity of the product was not written in integer format.
* solution: Write the quantity in integer format.

Operation failed
* code: 400
* description: There is an internal server error.
* solution: There is a server issue. Raise a support ticket with us to get this resolved.

Bill not found for given receipt_number
* code: 400
* description: The bill id is incorrect or deleted.
* solution: Add the correct bill id.
