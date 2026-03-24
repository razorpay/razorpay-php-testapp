---
title: Control Flow of Funds for Embedded Payments for Platforms & Marketplaces
heading: Control Flow of Funds
description: Collect platform and third-party fees from your customers and route them to third-parties.
---

# Control Flow of Funds

As a platform with a multi-party business model, you can charge a fee for your platform or any third parties involved. Your sub-merchants may or may not have multiple third-parties involved for their processes. The money movement differs based on the number of parties involved. Control of Funds enables the sub-merchant to seamlessly disburse money, per order, with reports, avoiding the hassle and confusion with settlements. The examples explain the money movement in the presence and absence of a third-party.

    
### Example #1

         Assume the following:

            - _AcmeShop_ is a marketplace for clothes. - **Razorpay Technology Partner**
            - _Rani Wear_ is one of the many sellers on _AcmeShop_. - **Sub-Merchant**
            - _Deldel_ is a delivery service. - **Third-party Service**
            - _Gauri Kumari_ is a buyer.

            Scenario:

            - _Gauri_ buys a scarf from _AcmeShop_. She pays a sum of ₹ 1200 for her order.
            - The payment is processed and accepted by _Rani Wear_'s Razorpay account and then the sum is divided and credited to the following:
                - _AcmeShop_ Fee = ₹ 50
                - Delivery Fee for _Deldel_ = ₹ 200
                - Razorpay Charges = ₹ 20
                - _Rani Wear_ Bank Account = ₹ 930
        

Below image illustrates the money movement when a third-party is involved.

![money movement flow with third-party](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cof-partners-third-party-fees.jpg.md)

    
### Example #2

         Assume the following:

            - _AcmeBook_ is an accounting platform that enables payment acceptance. - **Razorpay Technology Partner**
            - _Mulchand Kirana_ is one of the users on _AcmeBook_. - **Sub-Merchant**
            - _Gauri Kumari_ is a buyer.

            Scenario:

            - _Gauri_ buys some kitchen groceries from _Mulchand Kirana_. She pays a sum of ₹ 1000 for her order.
            - The payment is processed and accepted by _Mulchand Kirana_'s Razorpay account and then the sum is divided and credited to the following:
                - _AcmeBook_ Fee = ₹ 50
                - Razorpay Charges = ₹ 20
                - _Mulchand Kirana_ Bank Account = ₹ 930
        

Below image illustrates the money movement only with partner fee, when no third-party is involved.

![money movement flow with partners](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cof-partners-partner-fee.jpg.md)

> **WARN**
>
> 
> **Watch Out!**
> 
> Razorpay deducts TDS for platform charges. Any GST implication for the sale of products/services has to be borne by the sellers and partners.
> 

## Use Cases

Below are some of the most common use cases for control of funds with embedded payments.

    
### Education

         AcmeVidya is an e-learning platform that offers certifications and diplomas to students and working professionals. It hosts a range of courses provided by different institutions and instructors.

         - AcmeVidya becomes Razorpay's Technology partner.
         - The instructors and institutes are added as sub-merchants.
         
         Assume a student pays ₹ 6000 for a diploma course provided by an instructor, _Sarah Will_.
         Sarah receives the amount on her Razorpay account. After transferring Razorpay's platform fee of ₹ 120 and any other third-party fee (maybe an exam center), of ₹ 1500, Razorpay settles the remaining amount of ₹ 4380 to Sarah's bank account.
        

    
### Hospitality & Travel

         AcmeTrips is a air-tickets and hotel booking platform. It lists the best offers along with other amenities provided by hotels and airlines.

         - AcmeTrips becomes Razorpay's Technology partner.
         - The airlines and hotel groups are added as sub-merchants.
         - Other vendors, like outsourcing cab service - are third-parties.
         
         Assume you pay ₹ 4000 for a room for one night in Mumbai's Presidency hotel. You have opted for the hotel's  pick-up and drop services. The hotel receives the amount on their Razorpay account. After transferring Razorpay's platform fee of ₹ 80 and a charge of ₹ 1000 to an out-sourced cab company, Razorpay settles the remaining amount of ₹ 2920 to the hotel's bank account.
        

## Prerequisites

To support the money movement flow:
1. Get the `platforms_marketplaces` tag enabled on your Partner account through your sales point of contact.
2. If you are charging a Platform fee, create a Linked Account for your merchant account and add your bank account details.
3. Create a Linked Account for your third-party service providers, if any (for example, logistics partners). Add their bank account details.

## Collect Platform and Third-Party Fees

After creating Linked Accounts, you can create payments on your sub-merchant accounts with your platform fees.

To collect platform and third-party fees:

1. [Set up Platform and Third-Party Accounts](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/control-of-funds/set-up-accounts.md)
2. [Process Platform and Third-Party Fees](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/control-of-funds/process-fees.md)

You can also create [refunds and reversals](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/control-of-funds/refunds-and-reversals.md) for transactions.
