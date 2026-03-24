---
title: Bulk Import Items
description: Upload Items in bulk from any of your external MIS or template into RazorpayX.
---

# Bulk Import Items

You can import Items in bulk from your external MIS or template into RazorpayX and manage all your POs, Items and GRNs in one Dashboard.

### Prerequisites

To upload Items in bulk, you must download the [Items template](#download-items-template) from your dashboard.

### Download Items Template
            
                 To import Items, the Items file you upload should follow the format of the template. Watch this video to know how to download the Items template.

                 
[Video content]

                    1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
                    2. Go to **Vendor Payments** in the left navigation and click **Items**.
                    3. In the **Items** window, click **+ Items** drop-down button on the top right and select **Bulk upload Items** from the drop-down list. 
                    4. Click **Template** to download the template. You can also [click here](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ItemsTemplate.xlsx.md) to download the template.
                    5. Fill the Items details in the file as per the validations in the template.

### Instructions for Filling the Template

- Enter all the required details in the template as per the validations.
- Green coloured columns in the template are mandatory. If the entry in a field is not done as per format, the field turns red.
- Hover over the empty cells to see the validation criteria.
- Default values will be picked if any of the columns are left blank. Refer [Items Template Requirements](#items-template-requirements) to find out the default value for each column.
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

### Items Template Requirements
                 
                    Column | Requirement
                    ---
                     Item Name (Mandatory) | Enter the item name. The name needs to match exactly with the name of the item set up in your RazorpayX.
                    ---
                     Description| Add item description.
                    ---
                     Product Type | Enter type of product. Can be either Goods or Services. The default type is Goods.
                    ---
                     Rate Per Unit (Mandatory) | Enter the item rate in ₹. Supports upto two decimal places and needs to be greater than 0.
                    ---
                     HSN / SAC Code | Enter the 8 digit HSN code. Only numeric values accepted.
                    ---
                     Unit | Enter the number of units to be purchased. Default number of units is 1.
                    ---
                     Tax Preference | Accepted options are Taxable / Non-Taxable / Out of Scope / Non GST Supply. Taxable is the default option.
                    ---
                     CGST + SGST | Enter the total GST value. Accepted options are 0 / 5 / 12 / 18 / 28.
                    ---
                     IGST | Accepted options are 0 / 5 / 12 / 18 / 28. Default value is 0.
                    ---
                     Discount Type | Accepted values are Percentage or Flat. Flat will be the default value.
                    ---
                     Discount (in % or ₹) | Cannot be more than 100 if discount type entered is percentage. Cannot be more than the rate of item if discount type is mentioned flat. Default value is 0.
                    
    
### Upload File
            
        Watch this video to know how to upload your Items file .

        
[Video content]

                    1. Once the file is completed as per the template and saved in your computer, log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
                    2. Go to **Vendor Payments** in the left navigation and click **Items**.
                    3. In the **Items** window, click **+ Items** drop-down button on the top right and select **Bulk upload Items** from the drop-down list. 
                    4. The **Upload file** window opens. Here, you can select the saved file from your system or drag and drop it into the window. Alternatively, you can also upload the file by navigating to **Vendor Payments**→**Import**→**Items** tab→**Import Items**→**Upload**.
                    5. If the file gets uploaded succesfully without any format errors, the system gives the preview of the top 3 line items of your file. This helps to ensure that you have uploaded the right file. 
                    6. After preview, the system will display the uploaded Items as rows.
                    7. Click on each row to view the Item.

### Related Information

- [Import Purchase Orders](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/purchase-order/bulk-import-po.md)
- [Bulk Import GRN](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/grn/bulk-import-grn.md)
