---
title: Subscriptions | About Offers
heading: About Offers
description: Check the Razorpay Subscription Offers available for your customers.
---

# About Offers

You can use Subscription Offers to provide discounts or cashback on Subscriptions. This attracts more customers, retains existing customers and increases sales. You have complete control over the offers you provide to your customers, such as the payment methods on which the Offer should be applied, maximum number of customers who can avail the offers and define the time of offers.

## How it Works

You can create and apply offers for Subscriptions in 3 easy steps:
1. [Create an Offer from the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers/create.md).
1. [Create a Plan for the Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-plans.md#create-a-plan).
1. [Link the Offer to a Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers/link.md).

After you create a Subscription with an Offer, customers can select the offer when making the payment, and it is applied immediately.

## How are Discounts Calculated

There are 2 types of discount calculations:
- [Percentage Discount Calculations](#percentage-discount-calculations)
- [Flat Discount Calculations](#flat-discount-calculations)

### Percentage Discount Calculations

Let us say you sell keto meals.

- Plan amount = ₹1,000/month
- Quantity = 2 units
- Upfront amount (delivery fee) = ₹250/month
- Add-on (keto chips) = ₹250/month
- You offer a 10% discount up to ₹300.

```
Total amount = (Plan amount x Quantity) + Upfront Amount
Total amount = (₹1,000 x 2) + ₹250
Total amount = 2,250
Discount amount = Total amount x Discount percentage
Discount amount = ₹2,250 x 10%
Discount amount = ₹225
```

### Flat Discount Calculations

Let us say you sell keto meals.

- Plan amount = ₹1,000/month
- Quantity = 2 units
- Upfront amount (delivery fee) = ₹250/month
- You offer a flat discount of ₹150.

```
Total amount = (Plan amount x Quantity) + Upfront Amount
Total amount = (₹1,000 x 2) + ₹250 
Total amount = 2,250
Discount amount = ₹150
```

## Subscription Offers States

A Subscription Offer has 2 states:
- **Enabled**: The Offer is active and available to your customers.
- **Disabled**: The Offer is disabled and no longer available to your customers.

## Customise Subscription Offers

There are 3 main parameters that you can use to customise and control Offers: **Subscription Offer Type**, **Discount Type** and **Payment Method**. You can also use **Other Parameters** to configure attributes, such as the start and end dates and the number of times the Offer can be used.

    
### Subscription Offer Types

         Following are the 3 types of offers you can create for Subscriptions:

            
            Subscription Offer Type | Description
            ---
            Single Use | This is a one-time discount offered to the customer.
            ---
            Limited number of cycles | You can specify the number of cycles the Offer should be applied.
 For example, you can apply an Offer for the first 3 cycles of a 12-month Subscription.
            ---
            Forever | The Offer is applied for the entire duration of the Subscription.
            
        

    
### Discount Type

         Following are the 2 types of discounts you can provide on Subscription Offers:

            
            Discount Type | Description
            ---
            Flat | A flat discount is offered to the customer.
            ---
            Percentage | The discount offered is a percentage of the Subscription amount.
            

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             Offers can only be applied if the chargeable amount after applying the Offer is greater than ₹1.
>             

        

    
### Payment Methods

         Following are the 2 payment methods available for Offers on Subscriptions:

            
            Payment Method | Description
            ---
            Card | Offers will be applied to Subscriptions paid using cards. The options available for cards are listed below: -  **Card type**: Credit card, debit card or both.
-  **Bank**: Card issuing bank. For example, HDFC Bank, Axis Bank. You can select 1 bank or all available banks. You cannot select multiple banks.
-  **Network**: Card network. For example, Visa, RuPay. You can select 1 network or all available networks. You cannot select multiple networks.
-  **Max Usage Per Card**: How many times a particular card be used to avail the Offer.
-  **IINs**: The card IINs on which the Offer should be applied. You can enter multiple IINs separated by commas.

            ---
            UPI | Offers will be applied to Subscriptions paid using UPI apps.
            ---
            
        

    
### Other Parameters

         Following are the other parameters available to you when creating an Offer:

            
            Parameter | Description
            ---
            Offer Name | A name for the Offer. This appears on the checkout. For example, **Monsoon Offer**.
            ---
            Display Text | A description of the Offer. This appears on the checkout. For example, **10% discount on all card payments**.
            ---
            Terms | Terms and conditions of the Offer.
            ---
            Starting On | The date and time from which the Offer will appear on the checkout.
            ---
            Expires On | The date and time at which the Offer will no longer appear on the checkout.
            ---
            On Payment Failure | What happens when an Offer validation (such as payment method) fails. You can:-  Allow the customer to complete the payment without the Offer.
-  Do not allow the payment to go through.

            ---
            Max Usage | The number of time the Offer can be used.
For example, you can use this parameter to limit the Offer to the first 100 customers.
            
        

### Related Information

- [Create Subscription Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers/create.md)
- [Link an Offer to a Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers/link.md)
- [Update an Offer Linked to a Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers/update.md)
- [Delete an Offer Linked to a Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers/delete.md)
