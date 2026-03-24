---
title: Block or Allow COD Orders | Razorpay Magic Checkout
heading: Allowlist & Blocklist
description: Configure COD settings on Razorpay Magic Checkout.
---

# Allowlist & Blocklist

With Magic Checkout, you can determine which cash on delivery orders you would like to allow or block based on a set of parameters to reduce RTO.

> **INFO**
>
> 
> **Handy Tips**
> 
> - Only the **Owner** and **Admin** roles have access to this feature.
> - Blocklist and Allowlist will work only if you enable COD Intelligence. To enable COD Intelligence, navigate to **Magic Checkout** → **Analytics** → **RTO** and enable **COD Intelligence**.
> 

## Blocklist 

You can create a blocklist in the case of high-risk customers who often return products on delivery resulting in damaged products during transit, high returns, refund issues, and so on.

The customers mentioned in the blocklist based on the order phone number, email ID, device IP and shipping zip code will **not** be eligible for COD. 

    
### Add Orders Under Blocklist 

         The orders that fall under this list will not be eligible for COD. Follow the steps given below:

         1. Log in to the Dashboard and navigate to **Magic Checkout**.
         2. Select the platform of your e-commerce website, enter the relevant details and click **Next**.
         3. Navigate to **RTO Reduction Setup** → **RTO Reduction**.  
         4. Toggle on **COD Intelligence** and click **Enable COD Intelligence** in the confirmation pop-up modal.
             ![Enable COD Intelligence](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/magic-enable-cod.jpg.md)
         5. Navigate to the **Block List** tab and click **Add New Blocklist**. 
             ![Add Blocklist to block COD for customers](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-new-blocklist.jpg.md)
         6. You can either upload a list or enter it manually. 
             - **To upload a list**:
                 1. Download the **sample file**.
                 2. Add the required data to the file. A maximum of 1M rows are acceptable in the file.
                 3. Upload the file in .CSV format. Maximum file size supported is 50 MB.
             - **To manually enter the list**:
                 1. Select the **Type** from the drop-down list. 
                 2. Enter the values. You can enter up to 20 values by separating them with a comma based on the **type**.

             
> **INFO**
>
> 
>              **Handy Tips**
> 
>              Enter the values in a valid format as given below: 
>              - **Phone number**: 10-digit phone number with the country code. For example, +919000090000.
>              - **Zip code**: 6-digit zip code.
>              - **Device IP**: For example, 123.123.123.123.
>              

         7. Click **Confirm**.
             ![Confirm settings on the Razorpay Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/blocklist-confirm.jpg.md)
         8. A pop-up page appears with the list of items added. Review the list and click **Add To Blocklist**.
        

## Allowlist 

You can create an allowlist in case of trusted customers who are loyal to your brand and contribute to increasing revenue. In addition to the other customers who can avail of the COD option, the customers mentioned in the allowlist based on the order phone number and email ID **will always be** eligible for COD irrespective of the RTO intelligence recommendation.

    
### Add Orders Under Allowlist 

         The orders that fall under this list will be eligible for COD. Follow the steps given below:

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          Orders under the allowlist are not eligible for RTO insurance if they result in an RTO.
>          

         1. Log in to the Dashboard and navigate to **Magic Checkout**.
         2. Select the platform of your e-commerce website, enter the relevant details and click **Next**.
         3. Navigate to **RTO Reduction Setup** → **RTO Reduction**.  
         4. Toggle on **COD Intelligence** and click **Enable COD Intelligence** in the confirmation pop-up modal.
             ![Enable COD Intelligence](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/magic-enable-cod.jpg.md)
         5. Navigate to the **Allow List** tab and click **Add New Allowlist**.
            ![Add Allowlist to allow COD for customers](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-new-allowlist.jpg.md)
         6. You can either upload a list or enter it manually. 
             - **To upload a list**:
                 1. Download the **sample file**.
                 2. Add the required data to the file. A maximum of 1M rows are acceptable in the file.
                 3. Upload the file in .CSV format. Maximum file size supported is 50 MB.
             - **To manually enter the list**:
                 1. Select the **Type** from the drop-down list. 
                 2. Enter the values. You can enter up to 20 values by separating them with a comma based on the **type**.
             
> **INFO**
>
> 
>              **Handy Tips**
> 
>              Enter the value in a valid format as given below: 
>              - **Phone number**: 10-digit phone number with the country code. For example, +919000090000.
>              

         7. Click **Confirm**.
             ![Confirm settings on the Razorpay Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/allowlist-confirm.jpg.md)
         8. A pop-up page appears with the list of items added. Review the list and click **Add To Allowlist**.
        

> **INFO**
>
> 
> **Handy Tips**
> 
> Once added, you cannot edit the items in the list. You can only delete each item in the list. 

> ![Delete each item in the list](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/delete-item.jpg.md)
>
