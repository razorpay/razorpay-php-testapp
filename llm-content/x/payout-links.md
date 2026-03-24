---
title: RazorpayX Payout Links
heading: About Payout Links
description: Explore RazorpayX Payout Links, customise branding and see how you can use them.
---

# About Payout Links

RazorpayX Payout Links is an easy way to send funds to anyone, especially when you do not have their bank account details. You just need to enter the recipient's name, phone number or email, and the amount to be paid to create a Payout Link.

RazorpayX then sends them a link where the [Contact](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts.md) can then enter their account details (bank account or UPI ID). Once we get their verified account details, we transfer the amount. 

Know more about [how Payout Links work](#how-it-works) and their [use cases](#use-cases).

> **WARN**
>
> 
> **Watch Out!**
> 
> - Allowlisting your IP is mandatory for using the Payout Link APIs. Know how to [allowlist your IP](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/allowlist-ip.md).
> - Allowlisting is not required for creating Payout Links from the Dashboard.
> 
> 

## How it Works

To make a payout using a Payout Link:

1. [Create a Payout Link](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/create.md) by entering:
        - Contact details such as name, phone number, email and type
        - Amount
        - Currency
1. The Payout Link is then sent to the Contact. Contact opens the link and completes OTP verification.
1. The Contact provides their account details where they want to receive the payout. This creates a Fund account for the Contact.
1. The Payout amount is transferred to the Fund account created via the details provided by your Contact. The Contact receives the payout amount. 

![Creating Payout Links process, describing the above process](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/RZPX-payout_links_flow.jpg.md)

## Supported Payout Modes

You can set the Payout Links to debit the necessary amount from your RazorpayX account using any of the following payout modes:

- `NEFT`
- `IMPS`
- `UPI`

By default, all the 3 modes are enabled for Payout Links. However, after a certain limit, RazorpayX uses a specific mode to create a successful Payout Link. If the amount is:

Amount Value | Mode of Payout
---
Less than ₹2,00,000/- | You can use `IMPS` as the mode of transfer.
---
More than ₹2,00,000/- | You can use `NEFT` as the mode of transfer.

The end recipients can add any bank account details to receive the funds; there is no restriction there. 

## Use Single Payout Mode

You can choose to process Payout Links from your account using only **one particular mode**. For example, you can choose your Payout Links to debit the amount for your account balance using `NEFT` only. 

To do this, [contact support](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support.md) and request the feature. The configured mode will be used to process all payouts made via links from your account. 

> **WARN**
>
> 
> **Watch Out!**
> 
> This is an account-level setting. You cannot choose a single mode for every individual Payout Link.
> 

## Use Cases

Payout Links help you send money to anyone whose fund account or bank details you do not have. 

### Improve Customer Experience

Usually you would talk to the recipient via email or phone to get their bank account details. Then you or your finance team upload the details to the bank portal, after which you process the payout.

This is a time-consuming process with the Contact receiving the money 7-10 days after you contact them. This heavily impacts the customer experience.

You can instead:
1. Create and send a Payout Link via SMS and email to your Contact.
1. Customer opens the link and enters their bank account details. This creates a Fund Account for the Contact.
1. Payout is processed the instant the customer has entered their account details.  

This boosts your customer's experience and creates a positive impact on your business image. 

### Cash on Delivery Refunds for Ecommerce Businesses

For any ecommerce business, Cash on Delivery (CoD) is one of the major modes of payment. 

Whenever a CoD order is returned, businesses typically have to reach out to the customer to get their bank account details to refund the order.

With Payout Links, you just send a Payout Link to your Contact and they can use it to get their refund in their preferred fund account. You can set up the [Shopify Payout Links](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/shopify.md) integration and simplify refunds for your business. 

### Security Deposit Refunds for Rental Businesses

You can use Payout Links to collect security deposits when providing rentals. 

When you rent houses, furniture, appliances, clothing, cars and bikes and more, you ask your recipient for the upfront deposit, in exchange for the goods. After the usage period ends, the deposit amount is returned.

To refund the money, send the Payout Link to your Contact via SMS or email. The Contact enters their account details and gets the security deposit refunded to their preferred account.

### Cashbacks, Winnings and Incentives

- **Winnings** 

    For Gaming companies, getting fund account information to payout winnings can be a cumbersome process. With Payout Links, you can send them a Payout Link and their winnings can be are processed instantly.
- **Referrals and Cashbacks** 

    Any business which wants to offer Cashbacks and other Referral payouts can do so instantly using Payout Links.
- **Incentives** 

    Payout Links also work when businesses want to process incentive payouts to partners, customers and so on.

## Customise Branding 

You can edit how your Payout Link looks when the recipient/Contact clicks and opens the Payout Link. You can:
- Change the background/theme colour. 
- Upload your business/company logo.
- Provide support details like phone number, email id, and your official website. 

You can customise your branding in two ways: 
- From the Payout Links page. 
- From RazorpayX Account Settings menu. 

    
            1. On your Dashboard, go to the More Options menu (⋮) next to **+PAYOUT LINK**. 
            1. Click **User Guide** to open the **Get Started** section at the top.
            1. Select the **Set Up Payout Links** option and click **EDIT BRANDING**. 
        ![Payout Links Dashboard on RazorpayX to customise branding](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payout-links-customise-process.jpg.md)
        It opens the RazorpayX settings page where you can edit your account and organisation's branding, as shown.
    

    
        You can directly edit it from the Account Settings menu. To do so:
            1. Navigate to the user profile icon to the top right of your RazorpayX Dashboard.
            1. Click **My Account & Settings** → **Public Profile**, and edit your appearance.
    

Here is how your Payout Link appears after customising.

![Customise the look and feel of the Payout Link](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payout-link-customise.jpg.md)

### Related Information

- [Create Payout Links](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/create.md) 
- [Payout Links API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-links.md)
- [Payout Link Life Cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/life-cycle.md)
