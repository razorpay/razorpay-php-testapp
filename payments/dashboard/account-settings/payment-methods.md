---
title: Dashboard | Payment Methods
heading: Payment Methods
description: Enable and disable different Payment Methods from the Razorpay Dashboard. Check how to respond to Action Required statuses.
---

# Payment Methods

Check the available payment methods, enable and disable payment methods or request for new payment methods.

## View Available Payment Methods

You can view the payment methods enabled for your account from the **Account & Settings → Payment Methods** tab. You can raise requests for additional payment methods. The requests initiated from this panel are raised with our partner banks and the onboarding process for the payment method is started.

> **INFO**
>
> 
> **Handy Tips**
> 
> - This feature is available only on the Live mode of the Dashboard.
- Users with the following User Roles can configure the payment methods: Owner, Admin and Manager.
- You can also accept [international payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#get-started).

> 

## Enable Payment Methods

Activation of each of the payment methods involves onboarding with our partner banks. The average activation time is 10 working days, which can vary based on the payment method and banks.

## Request Payment Methods

    
### To raise a request for a payment method:

         1. Log in to the Dashboard and select **Account & Settings** on the left navigation.  
         2. Click the payment method you want to request under the **Payment Methods** tab, for example, **Cards**.
         3. Click the drop-down on the **Additional details required** tab and click **Add now** to update the business website or GSTIN details.
             

             
> **WARN**
>
> 
>              **Watch Out!**
> 
>              The **Additional details required** tab must be updated to request any payment method.
>              

         4. Fill in the business website/app details and click **Proceed to update website/app**. Know more about [how to add website details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/business-website-details.md).
         5. Fill in the GSTIN details and click **Submit**. Know more about [how to add GSTIN details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/gst-details.md).

             
> **INFO**
>
> 
>              **Handy Tips**
> 
>              The **Additional details** are requested by our banking partners and are specific to the payment method.
>              

         6. Once you submit all the required information, the status of the information provided changes to **Under Review**.
             
        7. Once the required information is reviewed and updated, click **Request**.
        8. Fill in the required details and click **Next**.
        9. Click **Submit Request**.
        10. The status of the payment method changes to **Requested**.
        

## Payment Method Request States

To view the status of your payment method request:

1. Log in to the Dashboard and navigate to **Account & Settings**.
2. Click any payment method under **Payment methods**.
3. You can view the list of payment methods and providers and their status.

Some payment methods are enabled by default, while you need to raise a request for others. Below are the various statuses your request can go through.

Status | Description
---
**Under Review** | Our team is validating the information provided.
---
**Updated** | The provided information is verified successfully.
---
**Requested** | A request has been raised, but no action has been taken yet.
---
**Cancelled** | A request was initially raised but was later cancelled by you or your team member.
---
**Pending** | The request has been taken up for onboarding by our partner banks.
---
**Action Required** | In some cases, we may not be able to fulfil a request as our banking partners seek certain clarifications. For example, there may be some missing information in the activation form. In such cases, the request is placed in the `Action Required` state, along with a comment indicating the actions required from your end. You can [respond to the Action Required](#respond-to-action-required) status.
---
**Rejected** | The request is rejected for your account. This generally happens due to category restrictions. See the Comments for more information.
---
**Re-initiated** | The previous request in the `Action Required` state has now been re-initiated after the action is complete.
---
**Activated** | This indicates that the method is now live and available on standard checkout.

## Respond to Action Required

You can respond to any discrepancies or clarifications raised for payment method requests with comments, attachments, or both.

Our Banking Ops team validates your payment method request. If they find any discrepancies or need further clarification regarding the website or documents, we change the request status from **Pending** to **Action Required**. You can provide these details from the Dashboard.

To respond to the discrepancies or clarifications requested:
1. On the Dashboard, navigate to **Account & Settings → Payment Methods**.
2. Look for the payment method you requested and click **Update Request Form**.
3. Provide the requested clarifications.
4. Fill in the required details, add attachments if requested, and click **Submit Form**.
5. The status of your request changes from **Action Required** to **Reinitiated**.

Razorpay re-reviews requests and responds within 7 days.

## Disable Payment Methods

## Coverage
The **Payment Methods** tab shows most payment instruments that can be enabled for your account. Keep an eye on this page as we continue to add more payment methods. If you have questions about specific payment methods,  please reach out to our 
[Support team](https://razorpay.com/support/#request)

.

## Pricing

All methods requested via the Payment Methods tab will be enabled for your account using [Standard Pricing](https://razorpay.com/pricing/) or the default pricing configured for the payment method for your account.

 Sales SPOC for all pricing-related queries.
