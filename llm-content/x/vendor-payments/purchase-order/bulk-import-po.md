---
title: Bulk Import of Purchase Orders
heading: Bulk Import
description: Import Purchase Orders in bulk from any of your external tools or templates into RazorpayX.
---

# Bulk Import

Managing Purchase Orders, Items and GRNs can be very tedious and time-consuming in a large scale business. The Bulk Import feature in RazorpayX helps to overcome this by enabling you to:

- Import Purchase Orders, Items and GRNs in bulk in `.xlsx` or `.csv` format.
- Seamlessly integrate with your WMS, inventory management or internal tools.

### Prerequisites
To import Purchase Orders in bulk, you must:
- Download the  [Purchase Order template](#download-purchase-order-template) from the Dashboard.
- Download the [Vendor Contact ID](#download-vendor-contact-id) file from the Dashboard.

> **WARN**
>
> 
> **Watch Out!**
> 
> Downloading the Contact ID file may take several minutes. It is recommended to download it in advance.
> 
> 

### Download Purchase Order Template

Watch this video to know how to download the Purchase Order import template.

                   
[Video content]

 

                    1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
                    2. Go to **Vendor Payments** in the left navigation and click **Purchase Orders**.
                    3. In the **Purchase Orders** window, click **Purchase Order** drop-down button on the top right and select **Bulk upload PO** from the drop-down list.
                    4. Click **Template** to download the template. You can also [click here](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/PoTemplate.xlsx.md) to download the template. The template is now available in your system.

### Download Vendor Contact ID

Vendor Contact IDs are unique IDs generated for each vendor registered with your RazorpayX. They are used to map a Purchase Order to a specific vendor and are required only for managing Purchase Orders.

    Watch this video to know how to download the Contact ID file.

                   
[Video content]

                    1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
                    2. Go to **Vendor Payments** in the left navigation and click **Purchase Orders**.
                    3. Click **Purchase Order** drop-down button and select **Bulk upload PO** from the drop-down list.
                    4. Select the preferred file format (`.xlsx` or `.csv`).
                    5. You can either click the **Download** button to download the file into your system or **Email** button to email it to yourself. Alternatively, you can also download or email the file from the **Contacts** menu by navigating to **Contacts → Vendors → Export**.
                

### Instructions for Filling the Template

- Enter all the Purchase Order details in the template as per the validations.
- Green coloured columns in the template are mandatory. If an entry in a field is not done as per format, the field turns red.
- Hover over the empty cells to see the validation criteria.
- Default values will be picked if any of the columns are left blank. Refer [Template Requirements](#template-requirements) to find out the default value for each column.
- If you are copy-pasting data using an internal tool, use these shortcuts:
    - MacOS : Cmd+Opt+V, then press V again 
    - WindowsOS : Ctrl+Alt+V then press V again
- Ensure that the file is saved as `.xlsx`.

> **WARN**
>
> 
> **Watch Out!**
> 
> - Do not use Command+V or Ctrl+V for pasting data. The validation and formatting which help to identify errors will be removed.
> 
> - If you are generating a file in a template format from an internal tool, copy-paste the validations and formatting from the 
>   template to your file.
> 
> 

### Template Requirements
           
                 
                    Column | Requirement
                    ---
                     PO Number (Mandatory)| Enter complete Purchase Order number with pre-fix. If a Purchase Order has multiple line items, then each item will be a new row in the sheet and the Purchase Order number should be common among those rows. Supports alpha-numeric (no special characters or spaces).
                    ---
                     RazorpayX Contact ID (Mandatory)| Enter the Vendor Contact ID downloaded from the Vendor Contact ID file.
                    ---
                     Order Date | Enter the order date (DD/MM/YYYY). Date of upload will be the default Order Date.
                    ---
                     Delivery Date | Enter the delivery date (DD/MM/YYYY). Date of upload will be the default Delivery Date.
                    ---
                     Payment Terms | Enter the payment terms. 0 will be the default value.
                    ---
                     Bill To| Enter the branch of your firm to which you wish to bill. The branch name needs to match exactly with the name of the branch set up in your RazorpayX.
                    ---
            
                     Ship To | Enter the branch of your firm which should receive the consignment. to ship to. The branch name needs to match exactly with the name of the branch set up in your RazorpayX.
                    ---
                     Cost Center | Enter the cost center name. The name needs to match exactly with the name of the branch set up in your RazorpayX.
                    ---
                     Item Name (Mandatory) | Enter the item name. The name needs to match exactly with the name of the item set up in your RazorpayX.
                    ---
                     Item Quantity | Enter the quantity of item. The default quantity will be 1. Supports upto two decimal places.
                    ---
                     Item Rate (Mandatory) | Enter the item rate in ₹. Supports upto two decimal places and needs to be greater than 0.
                    ---
                     Item Tax % | Values accepted are 0 / 5 / 12 / 18 / 28.
                    ---
                     Item HSN/SAC | Accepts 8 digit numeric code.
                    ---
                     Discount | Enter in ₹. Supports upto two decimal places.
                    ---
                     Round Off | Enter in ₹. Supports upto two decimal places.
                    ---
                     Address Line 1 | Enter address line 1 of the vendor address if not already present in your RazorpayX. 
                    ---
                     Address Line 2 | Continue to enter the rest of the vendor address.
                    ---
                     Pincode | Enter pincode of the vendor address. This is mandatory if you have entered the address columns P and Q.
                    ---
                     City | Enter city of the vendor. This is mandatory if you have entered the address columns P and Q.
                    ---
                     State | Enter state of the vendor. This is mandatory if you have entered the address columns P and Q.
                    ---
                     Country | Enter country of the vendor. This is mandatory if you have entered the address columns P and Q.
                    ---
                     Notes | Enter notes, if any.
                    ---
                     Terms and Conditions | Enter terms and conditions, if any.
                    ---

                

    The template throws errors in case the in-sheet validation fails. Ensure that you follow the template to avoid errors.

                        
   
### Upload Purchase Order File
            

                Watch this video to know how to upload Purchase Orders in bulk.

                   
[Video content]

                    1. Once the Purchase Order file is completed as per the template and saved in your computer, log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
                    2. Go to **Vendor Payments** in the left navigation and click **Purchase Orders**.
                    3. Click **Purchase Order** drop-down button and select **Bulk upload PO** from the drop-down list. 
                    4. The **Upload file** window opens. Here, you can select the saved file from your system or drag and drop it into the window. Alternatively, you can also upload the file by navigating to **Vendor Payments**→**Imports**→**Purchase Orders** tab→**Import Purchase Orders**→**Upload**.
                    5. If the file gets uploaded succesfully without any format errors, the system gives the preview of the top 3 line items of your file. This helps to ensure that you have uploaded the right file. 
                    6. Click **Create Purchase Order**. You can see the accepted Purchase Orders under **Accepted** and erroneous Purchase Orders under **Invalid POs**.
                    7. You can click on the error sign against the erraneous Purchase Orders to view the respective error reports.
                    8. Click on **View PO** against each accepted Purchase Order to see the generated Purchase Order. This shows the Purchase Order as a line item with status as `draft`.
                    9. Click on the line item to preview the Purchase Order.
                    10. Click on **Complete PO** to add any further details or **Save to Draft** to save without editing.

> **INFO**
>
> 
> **Handy Tips**
> 
> The Purchase Oredr file undergoes a two level validation. The first set of formatting validations take place while filling the template. Further, a dynamic checking happens while uploading the completed file. Here the system checks for errors in data (Contact ID, for example).
> 

    
### Purchase Order Life Cycle

         Given below are the different states of a Purchase Order.

         
         Purchase Order State | Description
         ---
        `Accepted` | When you upload Purchase Orders in a bulk file without errors, they are listed under **Accepted** column. 
         ---
        `Invalid` | When you upload Purchase Orders in a bulk file with errors, they are listed under **Invalid POs**.
         ---
         `Drafts` | When a succesfully uploaded Purchase Order is listed under **Accepted** column, ready for editing.
         ---
         `In Approval`/`Ready to Issue` | When you complete the Purchase Order in `drafts` and it is ready for approval (in case of approvals in the workflow) or issuance.
         ---
         `Issued` | When the completed and approved (where required) Purchase Order is issued.
         ---
         `Partially Billed` | When you pay advance to the vendor, in case of requirement
         ---
         `Billed` | When you complete the payment to the vendor.
         ---
         `Closed` | When you mark the `billed` Purchase Orders as `closed` after ensuring that all the billing transactions are completed.
         
    
        

### Related Information

   - [Bulk Import GRN](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/grn/bulk-import-grn.md)
   - [Bulk Import Items](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/items/bulk-import-items.md)
