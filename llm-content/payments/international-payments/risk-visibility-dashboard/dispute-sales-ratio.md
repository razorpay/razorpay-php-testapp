---
title: Dispute-To-Sales Ratio
description: Know how to calculate dispute-to-sales ratio. Learn how the Risk Analytics Dashboard can help reduce your dispute-to-sales ratio effectively.
---

# Dispute-To-Sales Ratio

A dispute is a situation where a customer or the issuing bank questions the validity of payments. It may arise due to unauthorised charges, failure to deliver the promised merchandise, or excessive charges levied by the business. Know more about the [disputes](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/disputes.md).

The dispute-to-sales ratio is a metric used in financial analysis to measure the proportion of disputed transactions related to total sales or transactions processed by a business within a specific period. It helps understand disputes relative to the overall sales volume.

Dispute-to-sales ratio is a dynamic indicator of financial health, customer satisfaction, operational efficiency, and risk management. Proactively monitoring and managing this ratio enables you to respond promptly to challenges, fostering a resilient and successful operation.

## Calculating Dispute-To-Sales Ratio

You can calculate the dispute-to-sales ratio by dividing the total number of disputed transactions within the selected period (as specified in the drop-down menu) by the total number of captured transactions for the current month. Then, multiply it by 100 to express it as a percentage. 
     ![How to calculate DTS](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/calculate-dts.jpg.md)

#### Example 1

Consider you have an e-commerce business. In a given month, you processed 10,000 transactions, and 50 of these transactions were disputed by customers.

**Dispute-to-sales ratio** = 50/10000 x 100 = 0.5%

The e-commerce business's dispute-to-sales ratio is 0.5%. This low ratio suggests that most transactions are completed without disputes, indicating high customer satisfaction and effective dispute resolution mechanisms.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> The dispute-to-sales ratio will be calculated based on your value selection (INR) versus absolute count. Depending on this selection, either the INR value ratio will be taken or the transaction count ratio will be considered.
>     ![Dispute to sales ratio value](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dts-value-count.jpg.md)
> 
> 

It is crucial to note that disputes may not be immediately reported and can take some time to be processed. Therefore, the dispute-to-sales ratio calculation is based on disputes reported within the given period divided by captured sales within the same period. However, the disputed transactions may have occurred before or outside the selected period.

#### Example 2

Consider you have an e-commerce business and processed 10,000 transactions in April. In May, you received 50 dispute reports related to transactions in April. For calculating the dispute-to-sales ratio for May, you would consider these 50 disputes against the transactions processed in May, even though the disputed transactions occurred in April. This approach helps understand the ratio of disputes reported to sales within the same reporting period despite the actual timing of the transactions.

## Dashboard Actions

You can use the Dashboard to perform a detailed analysis of **Total sales value**, **Value of reported disputes**, **Disputes-to-sales** ratio, and **Number of reported disputes** over a selected period of time. 
    ![FTS graph](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dts-total-count.jpg.md)

Let us explore how the Risk Analytics Dashboard can help you effectively reduce your Dispute-to-sales (DTS) ratio:

**Identifying High-Risk Transaction/Customer Cohorts:** Using the Dashboard's array of custom charts and analytical tools, you can quickly identify transaction or customer cohorts that significantly contribute to dispute occurrences. 

For example, you may notice a spike in disputes from a particular country or Card BIN associated with specific product categories or IP addresses. Visualising this data through custom charts or analysing the parameters in the [downloadable list of disputes](#download-the-list-of-disputes) allows you to gain valuable insights into potential risk factors contributing to the DTS ratio.

**Identifying Risky Cohorts:** Once you have identified a risky cohort, such as a group of transactions originating from a specific IP address, you can take targeted action to mitigate the risk. For example, suppose you observe many disputes linked to a single IP address. In that case, you can raise a request to blacklist transactions from this IP address to decline any future transactions coming from this IP address.

**Taking Proactive Measures:** Using the Dashboard, you can request our risk team to [block future transactions](#block-highest-dispute-contributors) from this high-risk IP address. This proactive measure helps prevent further fraudulent activities associated with the identified cohort, reducing the likelihood of future fraud incidents.

### Download List of Disputes

You can download the list of disputes with parameters such as IP address, email, and phone number. To download the list, follow the steps given below:

    1. Log in to your Dashboard.
    2. Navigate to **Risk and Fraud** and click **Download list**.
        ![Disputes list download](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dts-download-list.jpg.md)
    3. On the **Download disputes transaction list** page, select the **duration** and add the **Recipient's Details**. Click **Send Request**.
        ![Disputes list download send request](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dts-send-request.jpg.md)
    4. After the request is sent, you will receive an email with the file containing the list of disputes for the selected duration.

### Block Highest Dispute Contributors

You can block the fraud contributors by requesting a blacklist which helps lower the number of frauds. To block the fraud contributors, follow the steps given below:

    1. Log in to your Dashboard.
    2. Navigate to **Risk and Fraud** and click **Request blacklist**.
        ![Disputes blacklist request](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dts-request-blacklist.jpg.md)
    3. On the **Request blacklist** page. 
        - Select **Parameter**, add **Comments** about why you want to blacklist, enter the email id to which you want to get the updates.
        - Upload an **XLS or XLSV** file of the list items. Click **Send request**.
        ![Send request blacklist](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dts-blacklist-send-request1.jpg.md)
    4. After the request is sent successfully, you can track your request on the Dashboard. Navigate to **Account & Settings** → **Support tickets** (under **Business settings**).
