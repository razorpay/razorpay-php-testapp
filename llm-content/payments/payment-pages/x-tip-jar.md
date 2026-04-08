---
title: Accept Payments Using X Tip Jar
description: Accept payments using X's Tip Jar feature on Payment Pages.
---

# Accept Payments Using X Tip Jar

Use X's Tip Jar (available to select users) to receive money from other X users using third-party service providers. X users in India can use Razorpay to accept payments via the Tip Jar feature.

> **INFO**
>
> 
> **Feature Availability**
> 
> X Tip Jar to accept payments is available only for iOS and Android users.
> 

If Tip Jar is enabled for you, you can easily accept payments using a Razorpay Payment Page. All you need to do is create a new Payment Page or use an existing one and link it to your Tip Jar account. 

## Prerequisites

- [Set up](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md) your Razorpay account and complete the KYC process.
- Create a [Payment Page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/create.md) and copy the page URL. If you already have a Payment Page, follow the steps given below.

## Steps to Accept Payments Using X Tip Jar

    
    Add a custom suffix to make your Payment Page URL unique and easy to share.
    

    
    Connect your Payment Page to your X profile's Tip Jar feature.
    

    
    Let your followers support you by sending money via Razorpay.
    

    
    Track and view all payments received from X users on your Dashboard.
    

### 1. Customise Payment Page URL

Customise the Payment Page URL by adding a suffix. For example, if your page is called Living Arts Exhibition 2021, you can customise the URL to `https://pages.razorpay.com/livingarts2021` by adding the suffix `livingarts2021`. You should customise your Payment Page URL and add the suffix to Tip Jar.

> **INFO**
>
> 
> **Unique Custom URLs**
> 
> If another business that uses Razorpay Payment Pages has already created a custom URL with `livingarts` as the suffix, you will not be able to use `livingarts`. Your Payment Page suffix must be unique as two Payment Pages cannot have the same suffix.
> 

You can customise URLs:

    
### While Creating a New Payment Page

         To customise URL while creating a new Payment Page:
         1. Log in to the Dashboard.
         2. Navigate to **Payment Pages**.
         3. Click **Create Payment Page**.
         4. Fill in the necessary details and click **Page Settings**.
         5. In the **Choose custom URL for this page** field, enter the suffix. For example, if your page is called Living Arts Exhibition 2021, enter the phrase `livingarts2021`. The custom URL appears as `https://pages.razorpay.com/livingarts2021`.
         6. Save and publish the page.
         7. Copy the URL suffix. This suffix should be added to X Tip Jar.
        

    
### By Editing an Existing Payment Page

         To customise URL by editing an existing Payment Page:

         1. Log in to the Dashboard.
         2. Navigate to **Payment Pages**.
         3. Click the payment page title and click **Edit**.
         4. Click **Page Settings**.
         5. In the **Choose custom URL for this page** field, edit the suffix. For example, if your page is called Living Arts Exhibition 2021, enter the phrase `livingarts2021`. The custom URL appears as `https://pages.razorpay.com/livingarts2021`. If you had previously added a suffix, you can modify it in this step.
         6. Save and publish the page.
         7. Copy the URL suffix. This suffix should be added to X Tip Jar.
        

### 2. Link Payment Page to Tip Jar

Link the Payment Page to your X profile. When X users tap the Tip Jar feature on your profile and select **Razorpay**, this Payment Page is displayed to make payments.

To link the Payment Page with the Tip Jar:

1. Log in to X.
2. Open X profile and tap on **Edit Profile**.
3. Set the **Tip Jar** feature to **On**.
4. Enable **Allow tips** and tap **Razorpay**.
5. Paste the Payment Page URL suffix copied from the Dashboard. For example, `livingarts2021`.
6. Save the changes.

### 3. Receive Payments from Followers

Your followers can support you by sending money via any of the payment partners. 

Steps for followers to send money:
1. Log in to X.
2. Open the profile of the user to whom they want to send money.
3. Tap the tips icon and select the payment service provider.
4. Select **Razorpay** and tap **Continue**.
5. The Payment Page opens. Enter the details, select a payment method and complete the payment.

You can check the payments under **Transactions** on the Dashboard.

### 4. View Settlements on Dashboard

The payments received from the X users appear on the Razorpay Dashboard.

To view the payments:

1. Navigate to **Payment Pages** on the Dashboard.
2. Click the required page id. The page details view appears.
3. Scroll down to the transaction details section. A list of the payments made to the Payment Page is displayed.
4. Click on the payment_id for more details.

## Support

In case of any issues, reach out to the .
