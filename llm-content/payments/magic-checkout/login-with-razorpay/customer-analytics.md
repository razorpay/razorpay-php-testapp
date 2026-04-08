---
title: Login with Razorpay Analytics | Razorpay Magic Checkout
heading: Customer Analytics
description: Track customer login activity, account creation, and checkout behaviour with the Customer Analytics Dashboard. Export detailed user data to drive targeted marketing and engagement campaigns.
---

# Customer Analytics

When customers authenticate through [Login with Razorpay (SSO)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/login-with-razorpay.md), their activity is captured in the **Customer Analytics** dashboard. It displays login metrics, account creation data, and customer-level insights to help you track engagement, understand user behaviour, and retarget high-intent customers across marketing channels.

    
### Advantages

         - **Understand customer behaviour**: View detailed metrics on login patterns, account creation, and last order placed.
         - **Enable targeted outreach**: Identify users who dropped off during checkout and re-engage them via custom campaigns.
         - **Drive marketing automation**: Export data seamlessly into third-party tools for automated messaging and performance ads.
         - **Consolidate key metrics**: Access all customer login and engagement data in a single, streamlined dashboard view.
        

## Get Started

Follow the steps given below to view insights about the various activities:

1. Log in to the Dashboard.
2. Navigate to **Magic Checkout** → **Reports & Analytics** → **Customer Analytics**.

![SSO Customer Analytics](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-sso-analytics.jpg.md)

## Dashboard Overview

The **Customer Analytics** dashboard provides the following widgets:

- **Total Logged-in Users**: Displays the cumulative number of users who have logged in using [Login with Razorpay (SSO)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/login-with-razorpay.md). This gives you a glipmse of how many unique users have engaged with your store through SSO.
- **New Account Creations**: Displays the number of new customer accounts created via SSO during the selected date range. This helps track how many users are converting from guest visitors to registered customers.
- **Login Trends - Total Login vs New Users**: Displays daily login activity, comparing total logins to new users. This helps identify patterns in user engagement and determine whether returning customers or new visitors are driving traffic.
- **Customer Login Data**: A detailed table of all users who have logged in via SSO. You can view key attributes for each user and use this data to build segments or trigger marketing actions. It includes the following fields: 
  - **Customer Details**: Customer id.
  - **Phone**: Phone number associated with the customer's SSO profile.
  - **Email**: Email address used during login or account creation.
  - **First Login**: Date when the customer first logged in using **Login with Razorpay**.
  - **Last Login**: Most recent date the customer logged in in the selected time range.
  - **Frequency**: Total number of times the customer has logged in in the selected time range. This helps identify highly engaged users.
  - **UTM Source**: Captures the marketing source (like a campaign or referral link) that led to the user login.
  - **Last order**: Date of the customer's most recent successful order.
  - **Abandoned Checkout**: Indicates whether the customer initiated checkout but did not complete the payment. This helps in identifying high-intent users who may be open to retargeting.
  ![Customer details for retargeting](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-sso-analytics-customer-details.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> - Select a customer id to view a detailed breakdown of their login activity, contact information, order history, and checkout behaviour.
>   ![Customer detail view in Login with Razorpay dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-sso-analytics-customer-details-view.jpg.md)
> - Click **Export** to download customer data. You can then upload the file to platforms like Google Ads, Facebook, or a WhatsApp solution to automate retargeting or run manual campaigns.
> 

### Related Information

[Automatic Customer Tagging for Retargeting](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/login-with-razorpay/automation-tags.md)
