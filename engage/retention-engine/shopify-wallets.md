---
title: Set Wallet Campaigns for Shopify Merchants
heading: Shopify Wallets
description: Set up Wallet Campaigns for yours customers in your Shopify Dashboard.
---

# Shopify Wallets

You can create branded Digital Wallets for your customers to enhance payment experience, streamline refunds and transforming one-time buyers into loyal customers.

Wallets are created when the customer makes the first purchase. Post purchase, if the customer wants to return the product and claim refund, wallets help in making refunds quicker and seamless. It also helps recapture lost revenue by parking funds in a wallet which the customer can use for subsequent purchases. 

In addition to this, you can also create campaigns and set rules to credit customer wallets with loyalty points.

> **WARN**
>
> 
> **Watch Out!**
> 
> This feature is currently enabled for Shopify merchants only.
> 

## Set Up Campaigns
Set up loyalty rewards campaigns, add loyalty points and set rules for earning and using points in your Shopify Dashboard.

1. Log in to the Dashboard.
2. Go to the Payments tab and click **Wallets** under **Loyalty Products**.
4. Click **+ New Campaign** in the **Campaigns** tab.
5. Enter the campaign name of your choice. For example, `Freedom Sale`.
    
6. Choose **Trigger Based Campaign**. **Trigger Based Campaign** adds points whenever a particular event is triggered. For example, if you want to credit your customer with points based on the order value and set redemption rules, you can set it up using the **Trigger Based Campaign** feature.
    
6. Click **Create Campaign** to go to the **Trigger Based** campaign home page and set up the rules for the campaign.

### Trigger Based Campaign
    Set up a Trigger-Based campaign by performing the following steps:
        
         
            
### 1. Trigger & Action

                Follow the steps below to set up an event which triggers an action. All fields in **Trigger** and **Action** are mandatory. Check the example tab for detailed illustration. 
              
                
                    1. Under **If this happens**, choose one of the events (`order_placed`, `order_fulfilled` or `wallet_credited`) from the dropdown list.
                    2. Click **+ Add Attributes**, if required, to create additional attributes (conditions) to the selected event to ensure that points get added only if all the conditions are fulfilled. 
                        - You can add one or more attributes for a particular event.
                        - You can also have nil attributes.
                    3. After setting up the trigger event, you can now set up the action to follow under **Do this**.
                
                
                    1. Click **+ Action** under **Do this**.
                    2. Select the default container and program combination `Credit_Wallet` and `Container_PPI_Program`. The other fields are displayed.
                    3. Select `Flat` or `Percentage` in **Credit Type** depending on your choice.
                        - Select **Flat** to credit a fixed amount to the customer wallet for every trigger event (and attributes, if any)
                        - Select **Percentage** if you wish to credit the wallet with a percentage of the trigger event value.
                    4. Enter the flat/percentage value of your choice in the **Credit Amount** field. Event is auto-populated. Select the required attribute from the adjacent dropdown list.
                    5.  Enter a value of your choice in the  **Max credit** field if you wish to cap the maximum points that can be credited to the customer wallet per transaction to control your wallet budget. Select **No Max Limit** checkbox if you do not wish to keep a limit. The **Max credit** field will be disabled automatically.
                    6. Click **Next** to go to **Burn Rules**.
                
                
                    Consider you want to ensure that all orders above ₹1,000 qualify for reward points. You also want 1% of all order values of the customer to be credited to the wallet, with a maximum cap of 100 points per order. Here placing of the order acts as the event which triggers the action of crediting the customer wallet.
                        1. In the **Trigger Event**, under **If this happens**, select `order_placed` event and click **+ Add Attributes** to add `order.amount`, `is greater than` and `1000` as attributes.
                        2. In **Action**, under **Do this**, select the default options `Credit_Wallet` and `Container_PPI_Program`.
                        3. Select **Credit type** as **Percentage**.
                        4. In the **Credit amount** field, enter 1. The next field automatically populates the event you had set up, that is, `order_placed`.
                        5. Select the attribute `order_amount` from the next dropdown and click **Next**.
                        You have now succesfully set up a trigger event and action where the customer wallet will be credited with 1% of order amount, wherever the order value exceeds  ₹1000, upto a maximum of 100 points per order transaction.
                
              
            

            
### 2. Burn Rules

                Follow the steps below to set rules for burning (using) the points acquired by your customer. The unused points/amount accumulated in the customer wallet expire after the validity period you set here. You can also set a minimum order value above which the wallet amount can be used.
                    1. Under **Points expire after**, enter the number of days/months/years in the first field and select one of `Days/Months/Years` from the dropdown list.
                    2. Enter a value of your choice in the **Minimum order value** field (>= ). This ensures that the customer can use the points only for a minimum order value set by you. Click **Next**.
                    
                

            
### 3. Campaign Settings

                Set campaign start and end time, campaign amount limits and user limits by following the steps below. There are 3 sections here, namely, **Campaign Schedule**, **Campaign Limits** and **User Limits**. 
            
                
                    
                    Set the preferred schedule of your campaign. All wallet credit actions will take place only within the schedule set here.
                    1. Select a date of your choice in the **Starts From** field, click **Apply**, and select a time from the **At** dropdown list. 
                    2. Select the **Start Immediately** checkbox if you want to start the campaign immediately. Selecting this option disables the  **Starts From** and **At** fields. 
                    3. Select a date of your choice in the **Ends On** field, click **Apply**, and select a time from the **At** dropdown list.
                    4. Select the **No End Date** checkbox if you want the campaign to continue throughout. Selecting this option disables the **Ends On** and **At** fields. 
                    
                    
                    
                    **These limits are applicable for the consolidated amount and actions for all the customer wallets, and not for individual ones.** Once set, these limits apply to the entire campaign. The campaign will pause if one of these limits are breached and no further rewards will be credited. Setting limits helps to keep your wallet budget in check and also put a check on large number of small value transactions customers may do to avail campaign benefits.
                    5. Click the **Limit total amount credited** checkbox to if you wish to cap the total wallet amount. The **Max amount** and **Applies** fields gets enabled.
                    6. Enter an amount of your choice in the **Max amount** field, limiting the maximum amount that can be accumulated in all the wallets put together. 
                    7. Select one from `Daily/Weekly/Monthly/Yearly/Till Campaign Ends` in the **Applies** dropdown list to set this limit for a period.
                    8. Click the **Limit no.of actions performed** checkbox if you wish to cap the number of total wallet credit transactions. The **Max actions** and **Applies** fields gets enabled. 
                    9. Enter a figure of your choice in the **Max actions** field, limiting the maximum number of transactions.
                    10. Select one from `Daily/Weekly/Monthly/Yearly/Till Campaign Ends` in the **Applies** dropdown list to set the limit for a period.
                    
                    
                    
                    These limits apply to individual users. When breached, the campaign will stop crediting rewards to that user.
                    1. Select the **Limit total amount credited per user** checkbox if you wish to cap wallet points accumulation per customer. The **Max amount** and **Applies** fields gets enabled. 
                    2. Enter an amount of your choice in the **Max amount**. The customer wallet will not be credited beyond this limit even if eligible otherwise.
                    3. Select one from `Daily/Weekly/Monthly/Yearly/Till Campaign Ends` in the **Applies** dropdown list to set this limit per period.
                    4. Click the **Limit no.of actions per user** checkbox if you wish to cap the number of wallet credits for a customer and put a check on large number of small value transactions customers may do to avail campaign benefits. The **Max actions** and **Applies** fields gets enabled. 
                    5. Enter a figure of your choice in the **Max actions** field, limiting the maximum number of transactions per user.
                    6. Select one from `Daily/Weekly/Monthly/Yearly/Till Campaign Ends` in the **Applies** dropdown list to set this limit per period and Click **Next**.
                    
                    
                    
                
                

            
### 4. Review & Publish

                Review the set campaign rules and publish the campaign.
                    1. Check the **Trigger & Action** section to review the trigger events and actions you set for the campaign.
                    2. Review the rules set for burning the points under the **Burn Rules** section. 
                    3. Review the campaign schedule, campaign limits and user wise limits under the **Campaign Settings** section.
                    4. Click **Publish Campaign** once you verify all of the above and confirm on the pop-up modal.
                

         
### Pause or Stop Campaign

         Once you have published the campaign, it is listed in your Wallets home page.
         Use the pause or stop button against the campaign to either pause your campaign temporarily or stop it permanently.
         
         
         
> **WARN**
>
> 
>          **Watch Out!**
>          - Paused campaigns can be restarted anytime by clicking the resume button against them.
>          - Campaigns once stopped cannot be restarted.
>          

### Related Information

- [Razorpay Engage](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/engage.md)
- [Engage Retention Engine](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/engage/retention-engine.md)
