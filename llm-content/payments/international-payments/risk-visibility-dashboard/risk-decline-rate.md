---
title: Risk Decline Rate
description: Know how to calculate and manage the Risk Decline rate.
---

# Risk Decline Rate

The risk decline rate refers to the percentage of transactions a payment system or processor declines due to perceived risks, including the perceived risk of fraudulent behaviour. It is a metric used to measure the proportion of transactions that are considered potentially risky and subsequently denied approval.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> It is important to note that transactions can be declined by the Razorpay risk engine and downstream layers, such as issuing banks, contributing to the overall risk decline rate.
> 
> 

## Calculating Risk Decline Rate

The risk decline rate can be calculated by dividing the declined transactions due to perceived risks by the total attempted transactions in the same period and multiplying by a hundred. It is important to note that this calculation has no lag, unlike the fraud-to-sales (FTS) and dispute-to-sales (DTS) ratios. Therefore, no caveats, such as delay in reporting, apply here.
     ![How to calculate risk decline rate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/calculate-risk-decline.jpg.md)

#### Example

Consider that you are an online retailer and process transactions on your e-commerce platform. In a given month, you processed 1,00,000 transactions, and 2,000 were declined due to risk factors.

**Risk decline rate** = 2000/100000 x 100 = 2%

The online retailer's risk decline rate is 2% in this example. This rate indicates that 2% of transactions were declined due to perceived risk factors. It suggests that the retailer has implemented risk management measures to scrutinise transactions effectively while minimising the impact on genuine transactions.

## Dashboard Actions

You can use the Dashboard to perform a detailed analysis of **Total sales value**, **Value of risk declines**, **Risk decline rate**, and **Number of risk declines** over a selected period of time. 
     ![Risk decline rate graph](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/risk-decline-count.jpg.md)

### Download List of Transactions Declined due to Risk

You can download the list of transactions declined due to risk using parameters such as IP address, email, and phone number. To download the list, follow the steps given below:

     1. Log in to your Dashboard.
     2. Navigate to **Risk and Fraud** and click **Download list**. 
          ![Risk decline list download](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/risk-decline-download-list.jpg.md)
     3. On the **Download risk declined list** page, select the **duration** and add the **Recipient's Details**. Click **Send Request**.
        ![Risk decline list download send request](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/risk-decline-send-request.jpg.md)
     4. After the request is sent, you will receive an email with the file containing the list of risks declined for the selected duration.
