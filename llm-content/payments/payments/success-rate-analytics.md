---
title: Success Rate Analytics
description: View the transaction success rate on the Razorpay Dashboard.
---

# Success Rate Analytics

Success rate is the **ratio of successful transactions to the total number of transactions.** 
**Success Rate** (SR)=Total number of successful (authorised) transactions / Total number of attempted transactions over a given period of time. 
**Example**

If you had 100 transactions in a week and 93 were successful, your success rate would be 93% for that week. 

View the success rate of all your transactions and perform the various actions:
- [All Payment Methods](#all-payment-methods)
- [UPI](#upi)
- [Cards](#cards)
- [Netbanking](#netbanking)

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

## Access Success Rate Analytics (SRA) Dashboard

To access the Success Rate Analytics (SRA) Dashboard:

1. Log in to your Dashboard.
2. Navigate to **Transactions** → **Success Rate**.
    ![navigate to core success rate on Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-dashboard-navigate.jpg.md)

    
### Using the Analytics Dashboard, you can:

         - Perform a detailed analysis of your recent transactions.
         - View the details of each payment method by clicking on the respective method options such as Cards, UPI, Netbanking and Emandate.
             ![analytics view of core success rate on Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-dashboard-overview.jpg.md)
         - View the payment volume distribution with the help of a pie diagram and understand the top reasons behind the payment failures. Know more about [failure reasons](#payment-failure-reasons).
             ![payment volume distribution on Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-dashboard-overview-two.jpg.md)
         - Correlate downtime with your success rate trends for specific methods.
        

## Date Range
Select the date and time for which you want to perform a success rate analysis. You can use a predefined range or opt for a custom range.
![core success rate graph](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-date-range.jpg.md)

> **INFO**
>
> 
> **Handy Tips** 

> - The default date range is 6 hours.
> - You can select the date range from upto the last 90 days.
> - You can also select a specific time range as per your requirement.
> 

Additionally, in the success rate line graph, you can select the time frame for an hourly, daily, weekly, and monthly basis. The table below explains the availability of each time frame:

Time Frame | Explanation
---
Hourly | Hourly data for graphical representation is available only if the selected date range is less than 1 day.
---
Daily | Daily data for graphical representation is available only if the selected date range is between 2 and 14 days.
---
Weekly | Weekly data for graphical representation is available only if the selected date range is between 14 and 90 days.
---
Monthly | Monthly data for graphical representation is available only if the selected date range is more than 2 months.

    
### Example: Hourly Data for Cards

         ![core success rate graph time frame](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-graph-timeframe.jpg.md)
        

## All Payment Methods 
**All Payment Methods** provide a high-level view of your transactions and recent performance at the method level (Cards, UPI, Netbanking and Emandate).

    
### With the **All Payment Methods** option, you can:

         - View the success rate at the **payment method** level (UPI, Cards, Netbanking and Emandate).
           ![view core success rate for all methods on Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-dashboard-all-methods.jpg.md)
         - The line graph shows the success rate distribution of all payment methods on an hourly, daily, weekly and monthly basis as per your date range selection.
           ![view core sr graph for all methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-all-methods-graphical.jpg.md)
         - View the payment volume distribution at the method level with the pie chart.
           ![core sr pie diagram all methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-pie-diagram.jpg.md)
         - View the top failure reasons along with the breakdown. Know more about [failure reasons](#payment-failure-reasons).
           ![core sr error reasons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-failure-reasons.jpg.md)
        

## UPI
The **UPI** option provides a high-level view of all UPI transactions and recent performance for the selected date range along with the payment providers details.

    
### With the **UPI** option you can:

         - View the success rate of all UPI transactions.
           ![core sr upi](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-upi-sr.jpg.md)
         - The line graph shows the success rate distribution of **Intent**, **Collect** or **All flows (Intent and Collect)** on an hourly, daily, weekly and monthly basis as per your date range selection. You can select **Intent**, **Collect** or **All flows (Intent and Collect)** to compare the success rate.
           ![core sr graph upi](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-graphical-upi.jpg.md)
         - View the payment volume distribution of **Intent** and **Collect** with the pie chart.
           ![core sr pie diagram upi](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-pie-diagram-upi.jpg.md)
         - View the top failure reasons along with the breakdown. Know more about [failure reasons](#payment-failure-reasons).
          ![core sr pie diagram](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-failure-reasons-upi.jpg.md)
        

## Cards
The **Cards** option provides a high-level view of all Cards transactions and recent performance along with various other details for the selected date range.

Filters available for Cards are as follows:

     
> **WARN**
>
> 
>      **Watch Out!** 

>      The sub-filters vary based on the top transacting **card type**, **card networks** and **banks** for the selected date range.
>      

Filters | Sub- Filters
---
Card Networks | Examples: Visa, Mastercard, RuPay and Others.
---
Banks | Examples: HDFC, ICICI, Axis and Others.

    
### With the **Cards** option you can:

         - View the success rate of all Card transactions.
           ![core sr cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-cards-sr.jpg.md)
         - Filter the transactions to view Cards payments received via **Card Type (Credit, Debit, Prepaid)**, **Card Networks**, or **Banks** as per your requirement.
           ![core sr filters cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-filters-cards.jpg.md)
         - In the success rate line chart, select different **Card Networks**, or **Banks** as per the filter selected to compare the rate between individual **Card Networks**, or **Banks**.
          ![core sr graph cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-graphical-cards.jpg.md)
         - View the payment volume distribution of all **Card Networks**, or **Banks** as per the filter selected with the pie chart.
           ![core SR Pie diagram Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-pie-diagram-cards.jpg.md)
         - View the top failure reasons along with the breakdown. Know more about [failure reasons](#payment-failure-reasons).
          ![core SR Pie diagram cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-failure-reasons-cards.jpg.md)
        

## Netbanking
The **Netbanking** option provides a high-level view of all Netbanking transactions and recent performance along with various other details for the selected date range.

    
### With the **Netbanking** option you can:

         - View the success rate of all Netbanking transactions.
         ![core sr netbanking](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-netbanking-sr.jpg.md)
         - In the success rate line chart, select different banks to compare rate between various banks.
         ![core sr graph netbanking](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-graphical-netbanking.jpg.md)

         
> **WARN**
>
> 
>          **Watch Out!** 

>          The various labels available apply only to the graphical representation.
>          

         - View the payment volume distribution of all banks with the pie chart.
           ![core sr pie diagram netbanking](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-pie-diagram-netbanking.jpg.md)
         - View the top failure reasons along with the breakdown. Know more about [failure reasons](#payment-failure-reasons).
           ![core sr pie diagram netbanking](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/core-sr-failure-reasons-netbanking.jpg.md)
        

## Payment Failure Reasons

Failure Reason | Explanation 
---
Customer Related| Customer related failures occur from the customers side. For example: customer cancellations, incorrect CVV, insufficient funds.
---
Banking Related | Banking related failures occur due to issues at customer's bank, UPI apps, and external gateways.
---
Business Related | Business related failures occur due to issues at business side like non-activation of payment methods or international payments.
---
Others | Other failures include errors due to fraud detection or internal provider issues.
