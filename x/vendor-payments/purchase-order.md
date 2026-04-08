---
title: Purchase Orders on RazorpayX
heading: Purchase Orders
description: Create or upload Purchase Orders on the RazorpayX Dashboard.
---

# Purchase Orders

A Purchase Order (PO) is a crucial document in the world of business and commerce. It serves as a formal request made by a buyer to a supplier or vendor to acquire goods or services. 

    
### Advantages of Purchase Order

         Purchase orders play a vital role in the procurement process by helping both parties, the buyer and the seller to:
         - Ensure your planned expenditure does not exceed.
         - Maintain clarity and accountability.
         - Provide as a legal record of the agreement.
         - Facilitate efficient inventory management.
         - Track expenses and provide resolution for any potential disputes.

         It is a fundamental tool in ensuring smooth and organized business transactions.
        

    
### Purchase Order Life Cycle

         Given below are the different states of a Purchase Order.

         
         PO State | Description
         ---
         `Created` | When you create a PO on the Dashboard but do not send it to the vendor.
         ---
         `Issued` | When you share the PO with the respective vendor. You can send it directly from the RazorpayX dashboard or you can manually **MARK AS ISSUED** if you choose to send it separately.
         ---
         `Partially Billed` | When you **PAY ADVANCE** to the vendor, if required.
         ---
         `Billed` | When you complete the payment to the vendor.
         ---
         `Closed` | After the transaction is complete and goods/services are received, click **MARK AS CLOSED**.
         
    
         
        

### How it Works

You can initiate a Purchase Order, share it, link it to the payments, all from the RazorpayX Dashboard.

1. [Create a Purchase Order](#create-purchase-order).
2. [Send the Purchase Order](#send-purchase-orders-to-vendors-via-email) to the Vendor.
3. Link the Purchase Order to the respective invoice and advance payments.
4. [Close the Purchase Order](#mark-as-closed).

## Add Purchase Order

To add a Purchase Order:

1. Log in to the [RazorpayX Dashboard](http://x.razorpay.com/auth).
2. Navigate to **Vendor Payments** → **Purchase Orders**.
3. **Create new PO** or **Upload existing PO**.

### Create Purchase Order

Before creating your first Purchase Order, set your **Billing Address** via [Branches](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/multi-branch-management.md) that will appear on the header of the Purchase Order. You can add only 1 billing address.

**Shipping Address** is the same as billing address by default. De-select the **Same as billing address** check box if you want to add a different shipping address. Enter the required details and click **Save**.

Once the addresses are saved click **Done**.

1. **SELECT** a vendor or add **NEW VENDOR**. It is optional to **+ Add Address** of the vendor. Enter the required details and click **Save**.
2. Select or deselect the **GST applicable vendor**, as required. Enter the GSTIN. 
3. Review the address, you can **Edit** or click **Next**.
4. Enter the **PO Details** as given below. Select the relevant **Cost Center** and click **Next**.
    
5. Enter and verify the **Amount details** and click **Next**.
    
6. Review the Purchase Order. You can **Edit details**, **Save & close** or **Save & Send** the Purchase Order.

If you choose to **Save & Send** the PO, enter or verify the **Vendor Email** and add other email ids for carbon copy (**CC**) if required. Click **Send PO** to `Issue` the PO to the vendor.

### Upload Purchase Order

Click **Upload PO**. Select the file from your computer and click **open** or drag and drop the file.
RazorpayX reads the uploaded file and you can review the PO. 

You can **Edit details**, **Save & close** or **Save & Send** the PO if required.

## Send Purchase Orders to Vendors via Email

1. Log in to the [RazorpayX Dashboard](http://x.razorpay.com/auth).
2. Navigate to **Vendor Payments** → **Purchase Orders**.
3. Select the Purchase Order that you want to share with your vendor. In the right pane, click **SEND TO VENDOR**.
4. Enter the email id and click **Send PO**.

The Purchase Order is sent to the vendor and is marked `Issued`.

## Mark as Issued

If you choose to **Save & close** the Purchase Order and decide to share it through another platform, you can manually mark the Purchase Order issued. You cannot edit a Purchase Order after issuing it. You can pay advances or link the Purchase Order to an invoice only after it is `issued`.

1. Log in to the [RazorpayX Dashboard](http://x.razorpay.com/auth).
2. Navigate to **Vendor Payments** → **Purchase Orders**.
3. Select the Purchase Order that you want to issue. In the right pane, click **MARK AS ISSUED**.

## Mark as Closed

You can choose to close the Purchase Order at any state. It is advised to close the Purchase Order after the transactions are settled.

To close the Purchase Order:

1. Log in to the [RazorpayX Dashboard](http://x.razorpay.com/auth).
2. Navigate to **Vendor Payments** → **Purchase Orders**.
3. Select the Purchase Order that you want to close. In the right pane, click **MARK AS CLOSED**.

The Purchase Order is closed.

## Cancel Purchase Order

To cancel a Purchase Order:

1. Log in to the [RazorpayX Dashboard](http://x.razorpay.com/auth).
2. Navigate to **Vendor Payments** → **Purchase Orders**.
3. Select the Purchase Order that you want to cancel. In the right pane, select the three-dot menu and click **Cancel PO**.

The Purchase Order is cancelled.

## Purchase Order Approval Workflow

This approval workflow is based on the [cost center](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/cost-centers.md) that you have linked to your PO. You can [contact support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/support.md) to setup this approval workflow and assign it to relevant team members.

    
### Approving a Purchase Order

         To approve or reject a Purchase Order:

         1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
            
> **INFO**
>
> 
>             **Handy Tips**
>             
>             You can either find the Purchase Orders waiting for your approval on the Dashboard or follow the steps below.
>             

         2. Navigate to **Vendor Payments** → **Purchase Orders**.
         3. Hover over the required Purchase Order `In Approval` and click **APPROVE** or **REJECT** or select it to view more details and click **APPROVE** or **REJECT** on the right-pane.
            1. If you click **APPROVE**, the following screen is displayed. Enter comments and click **Approve**.
                
            2. If you click **REJECT**, enter the reason for rejection and click **Reject**.
        

### View the Purchase Order Workflow

To view the approval workflow after it is setup:

1. Log in to the [RazorpayX Dashboard](http://x.razorpay.com/auth).
2. Navigate to the profile icon → **My Accounts & Settings** → **Workflow** → **Purchase Orders**.
3. Click **View Workflows** and select the cost center for which you want to view the workflow.
