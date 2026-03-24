---
title: Save Customer Card Details at Standard Checkout
description: Store customer's card details securely as tokens to repeat transactions made by the customer. Manage saved cards.
---

# Save Customer Card Details at Standard Checkout

Save your customers' card details with Razorpay using tokens. The next time the customer makes any transaction, they only need to enter the CVV of the previously saved card. This saves the customer the hassle of entering the card details multiple times for each transaction.

Know [ how to integrate saved cards at Standard Checkout.](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/features/integrate-saved-cards.md)

As per the RBI guidelines, we save the cards in a tokenised form. Razorpay does not save sensitive card details and only saves the tokens.

    
### On Demand Feature - Raise a Request

         
> **INFO**
>
> 
> 
>             - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
>             - It takes approximately 5-7 working days to enable tokenisation for Visa, MasterCard and other networks.
>             - Watch this video to know how to raise a feature enablement request on the Dashboard.
>             ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
>          

        

 to get this feature activated on your account.
- It takes approximately 5-7 working days to enable tokenisation for Visa, MasterCard and other networks.

 to get this feature activated on your account.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> For a safer and secure payment experience, please advise your customers to log out of the Saved Cards feature after completing the payment. Doing so avoids any misuse of the card information.
> 

## Save Card Details

To save card details, the customer:

1. Opens Razorpay Checkout and selects **Card** as the payment method.
2. Provides the card details.
3. While making a card payment, the customer can choose to:
    - Save their card details.
    - Not save their card details.

    ![Saved cards checkout flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/pm-saved-cards.gif.md)

## Make Payments Using Saved Cards

To make payment using saved cards:
1. The customers log in to the Razorpay Checkout.
2. They select **Card** as the payment method.
3. They enter the OTP sent to their phone or use their fingerprint if [Biometric Authentication](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/features.md) biometric authentication is set up, then click **Verify**.
4. They select the saved card, enter the CVV and click **Pay**.
5. We recommend that customers log out of Checkout after they complete the transaction. To do this, they must:
   1. Open Razorpay Checkout.
   2. Select **Card** as the payment method.
   3. Click the drop-down list and select **Log out from all devices**.

Your customers gain a faster and enhanced checkout experience with Razorpay OTP auto-submit. The system automatically reads the OTP received, with your customer’s consent, and submits it. It prevents errors and the users do not need to navigate or interact with additional elements to complete verification, making the process seamless. This is available by default on Android SDK and not available on iOS SDK.

## Manage Saved Cards

According to RBI Guidelines, all customers should have a way to delete their card details stored as tokens. Customers can manage saved tokens using our portal.

Customers can manage their saved card details stored as tokens using our portal.

To manage saved cards:
1. Log in to the [Portal](https://razorpay.com/flashcheckout/manage/) using their **Mobile Number** and enter your **Email**. Click **Send OTP**.
2. Enter the **OTP** sent to their mobile number for verification and click **Verify**.
3. They can choose to select a card and delete the website/app on that particular card, or they can also select a website/app and delete the card on that particular website/app.

   ![Delete/Edit a card on a particular website/app.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/delete-saved-card-choose.jpg.md)

   
       
### To delete website/app on a particular card:

           1. Select **Cards**. View a list of saved cards.
                ![View list of Saved cards](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/delete-saved-card-choose-card.jpg.md)
           2. Select a card. For example, a customer selects a card from Paytm Payments Bank. They can now view a list of websites/apps they saved the card on earlier.
           3. Either click **Select All** or select the relevant **check box** against each website/app.
                
> **INFO**
>
> 
>                 **Handy Tips**
>                 
>                 If they cannot find a website/app, their card might be saved directly on Razorpay. They can select the **check box** to delete all the cards saved on Razorpay.
>                 

           4. Click **Delete**. A pop-up appears to confirm the action, click **Yes, Delete**.
           

       
### To delete card on a particular Website/App:

           1. Select **Websites/Apps**. They view a list of websites/apps they have saved their cards on earlier.
                ![View list of saved Websites/Apps](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/delete-saved-card-website.jpg.md)
          2. Select a website/app. For example, a customer selects Zomato. They can now view the cards saved on Zomato.
          3. Either click **Select All** or select the relevant **check box** against each card.
          4. Click **Delete**. A pop-up appears to confirm the action, click **Yes, Delete**.
                ![Delete confirmation.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/delete-saved-card-confirm.jpg.md) 
           

   

> **WARN**
>
> 
> **Watch Out!**
> 
> For a safer experience, please advise your customers to log out of the **Manage saved cards portal** after deleting their cards. To logout, click **Logout** on the right below Contact Us.
> 

## Frequently Asked Questions (FAQs)

   
### 1. Why are my customers unable to access the saved cards?

         If your customers are using Google Chrome and not able to access saved cards, it may be due to their browser configurations. Go to Chrome **Settings**, select **Privacy and security** → **Cookies and other site data** → **Allow all cookies** and restart the browser. If they still cannot access them, contact our [Support team](https://razorpay.com/support/).
      
        ![Allow Cookies](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/saved-cards-chrome-settings-3.jpg.md)
       

   
### 2. My customers have accessed their saved cards on the Razorpay Checkout by providing OTP. How do they now log out?

       For a safer and secured payment experience, your customer must log out from the Razorpay Checkout by following these steps:

       1. Open Razorpay Checkout.
       2. Select **Card** as the payment method.
       3. Click the drop-down and select **Log out from all devices**.

       This logs the customers out from the saved card feature on Checkout.
