---
title: Bulk Import GRN
heading: GRN
description: Upload GRNs in bulk from any of your external MIS or template into RazorpayX.
---

# GRN

You can import GRNs in bulk from your external MIS or template into RazorpayX and manage all your POs, Items and GRNs in one dashboard.

### Prerequisites

To import GRNs in bulk, you must download the [GRN template](#download-grn-template) from your dashboard.

> **WARN**
>
> 
> **Watch Out!**
> 
> Only those GRNs can be imported whose linked Purchase Orders are in `issued` status in your dashboard.
> 

### Download GRN Template
          
                 To generate GRNs, the file you upload should follow the format of the template. 
                 
                 Watch this video to know how to download the template for your GRN file.

                 
[Video content]

                    1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
                    2. Go to **Vendor Payments** in the left navigation and click **GRN**.
                    3. In the **GRN** window, click **+ GRN** drop-down button on the top right and select **Bulk upload GRN** from the drop-down list. 
                    4. Click **Template** to download the template. You can also [click here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/GRNtemplate.xlsx.md) to download the template.
                

            

### Instructions for Filling the Template

- Enter all the required details in the template as per the validations.
- Green coloured columns in the template are mandatory. If the entry in a field is not done as per format, the field turns red.
- Hover over the empty cells to see the validation criteria.
- Default values will be picked if any of the columns are left blank. Refer [GRN Template Requirements](#grn-template-requirements) to find out the default value for each column.
- If you are copy-pasting data using an internal tool, use these shortcuts:
    - MacOS : Cmd+Opt+V, then press V again 
    - WindowsOS : Ctrl+Alt+V then press V again

> **WARN**
>
> 
> **Watch Out!**
> 
> - Do not use Command+V or Ctrl+V for pasting data. The validation and formatting which help to identify errors will be removed.
> 
> - If you are generating a file in a template format from an internal tool, copy-paste the validations and formatting from the template to your file.
> 

### GRN Template Requirements
            
                    Column | Requirement
                    ---
                     GRN Number (Mandatory) | Enter complete GRN number with pre-fix. Supports alpha-numeric.
                    ---
                     PO Number (Mandatory)| Add the PO number to be linked with the GRN. The PO must be be issued on the RazorpayX dashboard.
                    ---
                     Received Date | Enter the goods/services received date in DD/MM/YYYY format. Date of upload will be the default date.
                    ---
                     Item Name (Mandatory) | The name needs to match exactly with the name of the item set up in your RazorpayX.
                    ---
                     Item Rate (Mandatory) | Enter the item rate in ₹. Supports upto two decimal places and needs to be greater than 0.
                    ---
                     Received Quantity | Enter the quantity of item received. The default quantity will be 1. Supports upto two decimal places.
                    

        
### Upload File
           
                 
                Watch this video to know how to upload your GRN file. 

                 
[Video content]

                    1. Once the file is completed as per the template and saved in your computer, log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
                    2. Go to **Vendor Payments** in the left navigation and click **GRN**.
                    3. Click **+ GRN** drop-down button and select **Bulk upload GRN** from the drop-down list. 
                    4. The **Upload file** window opens. Here, you can select the saved file from your system or drag and drop it into the window. Alternatively, you can also upload the file by navigating to **Vendor Payments**→**Import**→**GRNs** tab→**Import GRNs**→**Upload**.
                    5. If the file gets uploaded succesfully without any format errors, the system gives the preview of the top 3 line items of your file. This helps to ensure that you have uploaded the right file. 
                    6. Click **Create GRN**. You can see the accepted GRNs under **Accepted** and erroneous GRNs under **Invalid GRNs**.
                    7. Click on the error sign on the rows to view the error report of the respective GRNs.
                    8. Click **View GRN** against each accepted GRN to view it. This shows the GRN as a line item.
                    9. Click on the line item to preview the generated GRN.

### Related Information

- [Import Purchase Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/purchase-order/bulk-import-po.md)
- [Bulk Import Items](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/items/bulk-import-items.md)
