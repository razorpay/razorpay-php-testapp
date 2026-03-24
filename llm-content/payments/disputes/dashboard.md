---
title: Disputes - Dashboard Actions
description: View, accept, contest Disputes and download Disputes reports from the Razorpay Dashboard. Subscribe to webhook events for realtime updates on your disputes.
---

# Disputes - Dashboard Actions

You can use the Dashboard to perform the following actions:
- [View Disputes](#view-disputes-using-dashboard)
- [Accept Disputes](#accept-disputes-using-dashboard)
- [Contest Disputes](#contest-disputes)
- [Download Disputes Report](#download-disputes-report)
- [Subscribe to Webhook Events](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/disputes/subscribe-to-webhooks.md)

## View Disputes

Follow the steps given below to view dispute details from the Dashboard.

    
### To view disputes:

        1. Log in to the Dashboard.
        2. Select **Transactions** from the left menu and click **Disputes**.
            ![select disputes](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/select-disputes.jpg.md)
        3. A list of all the disputes is displayed. Click **Details** to view the details of the dispute.
            ![List of disputes under dispute tab](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/listed-disputes.jpg.md)
            ![dispute-description](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dispute-description.jpg.md)
        

### View Disputes Using APIs

- View all the disputes raised by your customer using [Fetch All Disputes API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/disputes/fetch-all.md)
- View the details of a dispute by providing the dispute id using [Fetch a Dispute API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/disputes/fetch.md)

## Accept Disputes

In case the customer's dispute is valid, you can accept the dispute.

When you accept a dispute:

1. The corresponding amount will be deducted from your Razorpay account balance.
2. The dispute's status will be changed to **lost**.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can accept only those disputes that are in `open` state and fall within the respond by date.
> 

Follow the steps given below to accept disputes from the Dashboard.

    
### To accept disputes:

        1. Log in to the Dashboard.
        2. Select **Transactions** from the left menu and click **Disputes**.
        3. A list of all the disputes is displayed. Click **Details** for the required Dispute id.
        4. Click **Accept Dispute** on the right pane.
        
        5. Click **Yes, Accept** to confirm. The amount will be deducted from your Razorpay account balance.
        

### Accept Disputes Using API

Accept a dispute using the [Accept a Dispute API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/disputes/accept.md).

## Contest Disputes

In case the goods or services have been provided to the customer, you can contest the dispute and submit the proof of deliveries, invoices or any other authorised proof of product/service delivery as evidence.

Follow the steps given below to contest disputes and submit evidence from the Dashboard.

    
### To contest disputes:

        1. Log in to the Dashboard.
        2. Select **Transactions** from the left menu and click **Disputes**.
            ![select disputes](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/select-disputes.jpg.md)
        3. A list of all disputes is displayed. Click **Details** for any dispute ID to open the right-side pane.
            ![List of disputes under dispute tab](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/listed-disputes.jpg.md)
        4. Click **Contest & upload evidence**.
            ![contest and upload dispute](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/disputes_contest_upload.jpg.md) 
        5. You can choose to contest the dispute for the full payment amount or a partial amount. To contest for partial amount, click **Edit** and enter the amount you want to contest. 
            ![edit amount dispute](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/disputes_edit.jpg.md) 
        6. In the **Explanation** field, provide the reason why the dispute is invalid. 
            ![add explanation for amount change](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/disputes_edit_amount.jpg.md) 
        7. In the **Supporting Evidence** section, select the evidence type in the **Add Document** field and upload the document. You can upload multiple documents to support your claim. The supported document types are, PDF, PNG and JPG.
            ![submit evidence](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/disputes_submit_evidence.jpg.md) 
        8. Click **Submit Evidence**.
        9. Click **Yes Contest** to confirm.
            ![confirm contest evidence](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/disputes_confirm_contest.jpg.md) 
        

### Contest Disputes Using API

- Contest a dispute using [Contest a Dispute API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/disputes/contest.md)
- Upload supporting documents using [Documents API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/documents.md)

## Download Disputes Report

You can download disputes as a file from the Dashboard. To download disputes report:

1. Log in to the Dashboard.
2. Select **Transactions** from the left menu and click **Disputes**.
3. A list of all the disputes is displayed. Apply the required filters for disputes and click the download icon on the right.

    ![filter and download disputes](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/filter-download-disputes.jpg.md)

### Related Information

- [About Disputes](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/disputes.md)
- [Submit Evidence](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/disputes/submit-evidence.md)
- [Dispute FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/disputes/faqs.md)
- [Contact Support](https://razorpay.com/support/#request) for additional help with disputes.
