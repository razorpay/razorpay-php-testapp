---
title: Pay TDS on Vendor Advance Payments | RazorpayX
heading: Pay TDS on Vendor Advances
description: Make advance payments to vendors with TDS and knock off advances against invoices on the RazorpayX Dashboard.
---

# Pay TDS on Vendor Advances

On the RazorpayX Dashboard, you can make advance payments to a vendor and simultaneously deduct the Tax Deducted at Source (TDS), in compliance with the TDS law.

When you knock off the advance payment against an invoice, the invoice payable amount is reduced by the advance payment previously made. In those cases, we automatically adjust the TDS amount.

## How it Works 

1. Create an Advance, deduct TDS and pay the advance to the vendor on the Dashboard. 
1. Knock off applicable advance payments against the received invoice. RazorpayX automatically adjusts the TDS and the amount payable. 
1. Make the invoice payment to the vendor on RazorpayX. 

## Deduct TDS with Advance Payments

To deduct TDS with advance payments: 

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
1. Navigate to **Vendor Payments** → **Advances** in the left menu and click **+ Advance**. Follow the steps to [create an advance payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/advances.md#create-vendor-advance) using the applicable POs and vendor details.
1. On the **New Advance** page: 
    1. Select the PO applicable. 
    1. Enter the **Advance Amount** details.
        - In case there is no existing PO, enter the total amount payable in advance.
        - For an existing PO, enter the percentage of the PO you want to pay as an advance. This calculates the advance payment amount. 
        
            For example, if the PO's value is ₹1,00,000 and the percentage is 30, the advance payment amount calculated is ₹30,000.
    1. We automatically add the **TDS** category. 
        - Select the relevant category from the **TDS Amount** drop-down menu to change the TDS category.
        - You can also edit the **TDS amount**. Click the edit icon and make changes. 
    
        This automatically calculates the **Total Payable** amount. The total payable amount is the difference of the Advance amount and the TDS amount. 
    1. Add up to five reference files/attachments and notes, if necessary.

     
1. Click **Next**.  
1. [Create a payout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md#create-a-payout) after selecting the [Payout purpose](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md#payout-purpose), debit account, mode of payment and more. You can also add attachments and additional details, and [schedule the payout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/scheduled.md#individual-payout). 
1. Authorise the payout with OTP. If [approval workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/approvals-on-invoices.md) is applicable, the payout is sent to the approver. 

This successfully creates an advance payment to the vendor. The advance payment details are available on the **Advances** tab. Here you can:
- View when you created the advance payment, the **UTR** number, **Advance IDs**, **Payout IDs**, the TDS deducted, and the TDS category details. 
- View all TDS payment adjustments in the right pane of the selected advance payment.
    

> **WARN**
>
> 
> **Watch Out!**
> 
> We notify you on the RazorpayX Dashboard if excess TDS is deducted. In such cases, you must handle the refund process with the Income Tax department.
> 

## Adjust Advances Against Invoice

When you receive invoices from the vendor with a future date, you can link your paid advances and adjust them with the invoices. Linking paid advances with an invoice reduces the invoice payable amount. This auto-adjusts the TDS, given the invoice and advance's TDS category are the same.

For any remaining TDS deducted with the advance payment after adjustments, you can claim a refund from the Income Tax department.  

To adjust an advance against an invoice, initiate an invoice payment. 

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
1. Go to **Vendor Payments** and select the invoice to pay. You can view the vendor, invoice, and advance details in the right pane. Click **Apply them →** to review the advance payments detected against the vendor and knock off the advance payments.
    
1. On the **Edit Invoice** page, review and select the advances matched with the vendor and invoice. 

    Click **Apply advance →** If no advance is applicable, click **Don't apply**.

    
1. Authorise the payout with OTP to pay the invoice fully or partially, or you can schedule the payout.

You have successfully paid the vendor's invoice after knocking the advance already paid. The TDS is automatically adjusted.

## Related Information 

- [About Vendor Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments.md)
- [About Vendor Portal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/portal/business.md)
