---
title: Add Payment Button to Ghost CMS
description: Add Razorpay Payment Button to your Ghost CMS theme for seamless payment collection.
---

# Add Payment Button to Ghost CMS

Given below are the steps to add Razorpay Payment Button in your website and integrate it with Ghost CMS.

> **INFO**
>
> 
> **Handy Tips**
> 
> Ghost CMS themes use a templating language called Handlebars (`.hbs files`). Content is dynamically inserted. 
> 

    
### 1. Accessing Your Ghost Theme Files

         1. Log in to your Ghost Admin Panel.
         2. On the left navigation, go to **Settings** → **Design**.
         3. Click on the three dots `...` next to your active theme and select **Download** to download a `.zip` file of your theme.
        

    
### 2. Unzipping and Editing Your Theme File

         Locate the downloaded `.zip` file in your system, right-click on it and choose **Extract All** (Windows) or double-click (Mac) to unzip its contents into a new folder.
        

    
### 3. Identify Where to Place the Button

         - If you want the button on every page (for example, in the footer or header), you may need to edit the `default.hbs` file in the **Theme** files folder. This file acts as the main template for your Ghost site.
         - If you want the button on a specific type of page (for example, only on posts), you have to edit the `post.hbs` file.
         - If you want it within a specific section that is reused (like a call-to-action that appears on multiple pages), you have to look for files in the partials folder (for example, `partials/footer.hbs`).
         - Say, you want to place it on every page to appear prominently. Open the `.hbs` file with a Text Editor.
            -  Windows: Right-click on `default.hbs` (or your chosen file), select **Open with** and choose **Notepad** or a more advanced text editor like **Notepad++** or **VS Code** (highly recommended for coding).
            - Mac: Right-click (or Control-click) on `default.hbs`, select **Open with** and choose **TextEdit** or **VS Code**.
        

    
### 4. Inserting the Payment Button Code

         - Scroll through the `default.hbs`file. If you want it in the footer, look for a `footer` tag. If you want it in the main content area, find a suitable place of your choice within the content. A recommended good spot is just before the `body` tag (if you want it to load at the end). 
                - Once you have found your spot, paste the following code:
                    ```html: Insert Payment Button
                     
                      
                     
                    ```
         - Ensure to replace `pl_XXxXX6XxXXXXxx` with your actual Razorpay Payment Button id which you get when you create a Payment Button in your Razorpay Dashboard.
        

    
### 5. Re-uploading Your Theme

         1. Go back to the folder containing your edited theme files and select all the files and subfolders inside your theme folder (not the outer folder itself).
         2. Right-click and choose **Send to** → **Compressed (zipped) folder** (Windows) or **Compress X items** (Mac). This will create a new `.zip` file.
         3. Make sure the `.zip` file contains the root of your theme files (like `default.hbs`, `package.json`, `index.hbs`, assets folder, and so on) directly inside it.
        

    
### 6. Go Back to Ghost Admin

         1. In your browser, navigate to **Settings** → **Design** in your Ghost admin panel.
         2. Scroll down to the **Themes** section and click **Upload a theme**.
         3. Browse your system and select the `.zip` file you just created. Click **Open**. Ghost will upload and install your modified theme. Once uploaded, you will see a message. 
         4. Click **Activate now** to apply your changes.
        

You have now successfully added a Payment Button to your website. To verify, check the page(s) where you expect the button to appear. You should now see your Razorpay Payment Button.

### Related Information

- [Ghost Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/ecommerce-plugins/ghost-integration.md)
- [Zapier Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/ecommerce-plugins/ghost-integration/zapier-integration.md)
- [Payment Button](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-button.md)
- [Razorpay Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md)
