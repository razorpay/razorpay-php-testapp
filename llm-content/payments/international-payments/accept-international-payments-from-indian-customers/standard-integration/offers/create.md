---
title: Create Offers
description: Create and manage Offers for customers from the Razorpay Dashboard.
---

# Create Offers

You can create offers from the Dashboard to promote your business. Some of the ways you can control offers at a granular level are:
- Configuring the payment methods permitted for the offer.
- Limiting the number of times the offer can be availed.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - You cannot edit an offer. To make changes, disable the previous offer and create a new one.
> - Only the owner and admin roles can create offers.
> - As per the RBI guidelines, the original card number is replaced with a surrogate value called a token. However, we will continue to support BIN-based offers post tokenisation, except BIN-based offers will not work on saved American Express (AMEX) cards.
> 

## Design Offers

You should consider the following while creating offers:

- Availability of the offer at Checkout.
- A maximum number of times an offer should be applied.
- Whether customers should be allowed to complete payments if validations are not met in the offers.
- Maximum discount that can be availed using the offer.
- The number of times a payment method, specifically cards, should be used to avail of an offer.

You can review the offer configurations at the end under the **Overview** tab.

### Offer Description

In the **Description** section, enter the following details. All the fields are mandatory.

1. **Offer Name**: Enter the name of the offer. For example, **Monsoon Offer**. This appears at Checkout.
2. **Display Text**: Enter a meaningful description for the offer. For example, **10% discount on netbanking payments**. This appears at Checkout.
3. **Terms**: Enter the terms and conditions for the offer.
4. **Offer Type**: Select the type of offer that you want to create. The possible values are:
    - **Instant**: The offer is applied instantly. That is, the customer pays only the discounted amount while making the payment.
    - **Cashback**: The customer pays the entire bill amount and receives the cashback to their account from the bank or the wallet provider later. Cashbacks need to be processed by the provider. Create Cashback Offers only if you have an agreement with them.
    - **Already Discounted**: You can enforce discounts on customers. This one-time offer is applied to all the customers by default before Checkout. Since the offer has already been used, the amount will not change at checkout. For example, if you provide a 10% discount to all customers on the website, the discounted value will appear on the website and the amount will not change further at Checkout.
5. Click **Next**.
![Enter the offer details to proceed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/offers-offers-description.jpg.md)

### Discount Type

There are three types of discounts that can be offered: 

- [Instant](#instant) 
- [Cashback](#cashback)
- [Already Discounted](#already-discounted)

Choose one of these three and create the offer.

The following sections explain their configuration in detail.

#### Instant

In the **Discount Type** section, enter the discount details that should be applied to the offer.

1. In the **Discount Type** field, select the type of discount that should be applied to the offer: **Percentage** or **Flat**
    - **Flat**: In this type, a fixed amount is deducted from the original amount.
        1. **Minimum Order amount**: Enter the minimum bill amount for which the offer can be applied.
        2. **Discount worth**: Enter an amount by which the original price should be reduced. For example, if **₹30** is the **Flat** discount applied, then an amount of **30** is deducted from the original price.

    - **Percentage**: In this type, the offer is calculated in terms of percentage.
        1. **Minimum Order amount**: Enter the minimum bill amount for which the offer can be applied.
        2. **Discount Worth**: The percentage by which the original price should be reduced. For example, if **10** is the **Percentage** discount to be applied, on an order amount of **300**, **30** will be deducted.
        3. **Maximum Discount**: The maximum amount that can be deducted from the bill amount. For example, you can ensure that the customer cannot avail a discount higher than **500**, irrespective of the order amount.
2. Click **Next**.
![Enter the discount details to proceed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/offers-offers-discount-type.jpg.md)

#### Cashback

In the **Discount Type** section, enter the details of the cashback that should be applied.

**Cashback Offers**

Cashbacks need to be processed by the provider (wallet providers, banks and so on). Create Cashback Offers only if you have an agreement with them.

1. In the **Discount Type** field, select the type of cashback that should be applied to the offer: **Percentage** or **Flat**
    - **Flat**: In this type, a fixed amount is paid out to the customer.
        1. **Minimum Order amount**: Enter the minimum bill amount for which the offer can be applied.
        2. **Discount worth**: Enter the amount to be paid out to the customer.

    - **Percentage**: In this type, the offer is calculated in terms of percentage.
        1. **Minimum Order amount**: Enter the minimum bill amount for which the offer can be applied.
        2. **Discount Worth**: The percentage of the order amount that must be paid out as cashback to the customer. For example, if 10% of the order amount is to be paid out to the customer and the amount is 100, the cashback amount will be ₹10.
        3. **Maximum Discount**: The maximum amount that can be offered as cashback. For example, you can ensure that the customer will not be paid more than **100**, irrespective of the order amount.
2. Click **Next**.
    ![Create Cashback Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/offers-cashback-1.jpg.md)

#### Already Discounted

This is a one-time offer applied to all customers by default before Checkout. Since the offer has already been applied, there will be no change in the amount at Checkout. For example, if you provide a 10% discount to all customers on the website, the discounted value will appear on the website and the amount will not change further at Checkout.

In the **Discount Type** section, enter the details of the discount:

1. In the **Discount Type** field, select the type of discount that should be applied to the offer: **Percentage** or **Flat**
    - **Flat**: In this type, a fixed amount is deducted from the original amount.
        1. **Minimum Order amount**: Enter the minimum bill amount for which the offer can be applied.
        2. **Discount worth**: Enter an amount by which the original price should be reduced. For example, if **₹30** is the **Flat** discount applied, an amount of **30** is deducted from the original price.

    - **Percentage**: In this type, the offer is calculated in terms of percentage.
        1. **Minimum Order amount**: Enter the minimum bill amount for which the offer can be applied.
        2. **Discount Worth**: The percentage by which the original price should be reduced. For example, if **10** is the **Percentage** discount to be applied, on an order amount of **300**, **30** will be deducted.
        3. **Maximum Discount**: The maximum amount that can be deducted from the bill amount. For example, you can ensure that the customer cannot avail a discount higher than **500**, irrespective of the order amount.
2. Click **Next**.

![Enter the already discounted details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/offers-already-discounted.jpg.md)

> **INFO**
>
> 
> **Display Already Discounted Offer at Checkout**
> 
> If you create an offer with the `Already Discounted` discount type, you must pass the Offer_id parameter while creating the order. This is mandatory for the offer to be available at Checkout.
> 

### Applicable On 

Under the **Applicable On** tab, enter details of the payment method you want to enable the offers. The fields depend upon the selected payment method.
1. Select the **Payment Method** and **Issuer**.
    - **Payment Method**: The payment method for which the created offer can be applied. Select from the available options, which are configured for your account:
        - **Card**
        - **Netbanking**
        - **Wallet**
        - **UPI**
        - **EMI**
        - **Cardless EMI**
        - **Pay Later**
    - **Card or EMI**: If you choose the payment method as **Card** or **EMI**, enter the card-related details as described below:
        - **Card Type**: Select the type of the card. The possible values are:
            - **Debit Card**
            - **Credit Card**
            - **Both Debit and Credit Cards** (This is applicable only if you choose **Card** as the payment method)
        - **Bank**: Select the bank that issued the card.
        - **Network**: Select the network of the card.
        - **Maximum Usage Per Card**: Enter the number of times the selected card can be used to avail the offer.
            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             Max usage offers will only work on Visa, MasterCard and Rupay cards post tokenisation.
>             

        - **IINs**: Enter the first six digits of the card (that is printed on the front of the card). In the case of Rupay cards, enter the tokenised IIN only.
            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             We will use the network par(payment account reference) API to identify the max usage per card post tokenisation. In some cases, the offer may be invalid depending on the network of the card. 
>             

    - **Netbanking**: The bank for which the offer is applicable.
        - **Issuer**: Select the required bank.

    - **Wallet**: Select the wallet provider that supports the offer.
        - **Issuer**: Select the appropriate wallet provider.

2. Click **Next**.

![Enter the payment method details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/offers-offers-applicable-on.jpg.md)

### Offer Validity 

Under the **Offer Validity** tab, set how long the offer should be valid and how you want to handle the payment failure situations:

1. **Starting On**: Select the **Starts Immediately** check box for the offer to come into effect immediately. Alternatively, you can select the date and the time from which the created offer should become active.
2. **Expires On**: Select the date and time at which the offer should end. For example, **31 Oct 2020** at **11:59pm**.
3. **On Payment Failure**: Define how to handle payment failure.
    - **Do not allow payment to go through**: The payment is failed.
    - **Allow customer to pay without availing offer**: The payment is allowed even though the set validations are not met. However, the offer is not applied to the bill amount. The customer will be charged the entire order amount.
    For this example, we will allow payments to go through.
4. **Max Usage**: Set the number of times the offer should be applied across all transactions. For example, **100**.
5. **Show Offer on Checkout**: Select this check box for the offer to be displayed for all Standard Checkout payments including [Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md). Know more about the different ways to [display offers on Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/standard-integration.md).

    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     If you are not using products and plugins like Razorpay Magento, Shopify, WooCommerce, Payment Links, Payment Buttons, Payment Pages and Invoices to accept payments, you **should** integrate offers with the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md) for the feature to work.
>     

    
6. Click **Next**.

![Enter the offer validity details to proceed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/offers-offers-offer-validity.jpg.md)

### Offer Overview

Click the **Overview** tab to view the summary of the offer that you just created.

1. **Terms and Conditions**: Select the check box after you have read the disclaimer.
2. Click **Create Offer**.

    ![Check the terms and conditions and create an offer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/offers-offers-overview.jpg.md)

By default, all the created offers will be in the **enabled** state.

## Test the Offer

You can test the created offer for all Standard Checkout payments, including [Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md), [Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button.md), [Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages.md) and so on.

> **INFO**
>
> 
> **Handy Tips**
> 
> - You can toggle between Live and Test Modes on your **Dashboard**. Navigate to the top menu ribbon and click the drop-down icon against **Live Mode**. Toggle to **Test Mode** and test the offers enabled.
> 
> - You can make test payments using one of the payment methods at the Checkout. No money is deducted from your account as this is a simulated transaction.
> 

For this example, we will test the offer on a valid Payment Link. Follow the steps given below: 

1. Select the **Payment Link Id** you wish to test the created offer from the Dashboard.
2. Copy the **Payment Link** URL and open it in your browser.
    ![Payment Link Test Offer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/offer-dashboard-test.jpg.md)
3. Enter your contact details and click **Proceed**. The relevant offers appear upfront on checkout.
4. Select the offer you created from the Dashboard and click **Apply Offer**.
5. Select the payment option you created the offer on from the Dashboard. Enter the required [test details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md) and click **PAY**. 
6. Select Success or Failure, depending on which flow you wish to test.
7. You should see a confirmation message depending on the flow you have selected.

On successful payment, you should have received a discount on your payment. You can verify this by navigating to the Transactions → Payments tab and viewing the payment details.

![Verifying transaction](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/offer-details.jpg.md)

## Integrate Offer with Standard Checkout

Now that an Offer is created, you should integrate Offers with Checkout for customers to avail the discounts and make payments.

Know how to [integrate Offers with Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/standard-integration.md).

## Next Steps

After you create an offer, it needs to be integrated with Checkout for the customers to view and avail the offers while making payments. Know more about [integrating offers with Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/standard-integration.md).

### Related Information

- [Tutorial - How to Create Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/tutorial.md)
- [Integrate offers with Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/standard-integration.md)
- [Offers FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/faqs.md)
