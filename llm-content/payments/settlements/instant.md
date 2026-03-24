---
title: Instant Settlements
description: Use the Instant Settlement feature to settle funds instantly to your bank account.
---

# Instant Settlements

You can use the **Instant Settlement** feature in Razorpay to settle your available balance to your bank account instantly, 24x7, for a small fee. 
- Settle your available balance to your bank account in full, or choose to settle a portion of it. Note that there is a **maximum daily withdrawable limit**. 
- The **maximum daily withdrawable limit** is a limit set for every Razorpay merchant for instant settlements that resets automatically at the beginning of each business day.

- By default, the settlement cycle is **T+2 days for domestic payments** and for **international payments it is as per applicable law(s)**. **T** refers to the captured payment date. With Instant Settlements, you receive funds on a T+0 basis. 
- You can use [Instant Settlements](#initiate-instant-settlements) to settle amounts  ₹5 Cr and 

> **INFO**
>
> 
> 
> **Feature Request**
> 
> This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> 

 
## How it Works
1. Amounts up to ₹5 Lakhs are settled instantly through Instant Settlements. Instant Settlements are routed through the IMPS channel.
2. Smart Settlements option also is enabled when the entered amount is between ₹5 Lakhs to ₹5 Crores. You can choose between Instant or Smart Settlements here.
    1. With Smart Settlements, the settlement amount will reflect as a single credit in your bank statement since it uses the RTGS channel.
    1. With Instant Settlement, the amount will show as multiple credits in your bank statement as IMPS channel has an upper limit of ₹5 Lakhs per transaction.
3. Amounts between ₹5 Crores to ₹50 Crores are settled only through Smart Settlements.

## Instant Vs Smart Settlements

    
    Benefits of Instant Settlement are:
        - Easy and instant access to your money.
        - Increased cash flows enabling better payment cycles.
        - Better management of inventory and stock.
    
    
    Benefits of Smart Settlements are:
        - Settle large sums (between ₹5 Lakhs to up to ₹50 Crores) to your Current Account in one shot and access it within an hour.
        - View the settlement as a single entry in your account statement.
        - Manage cash flows and payments in a better way.
    
    
    
        Feature| Instant Settlement | Smart Settlements |
         ---
        Minimum amount per settlement | ₹100 | ₹5 Lakhs |
         ---
        Maximum amount per settlement | ₹5 Crores | ₹50 Crores |
        ---
        **Timings** | **24*7** | **02:00 AM to 9:30 PM** |
        ---
        **Holidays** | **None** |  **Jan 26, August 15 and April 1** |
        ---
        Settlement channel | IMPS | RTGS |
        ---
        Dashboard support | Yes | Yes |
        ---
        **API support** | **Yes** | **No** |
        ---
        **Settlement TAT** | **Instant** | **0-60 min** |
        ---
        **No. of credits in bank statement** | **Multiple** | **Single** |
        ---
        Example | Settlement amount: ₹5 Crores No. of credits in bank account: ₹5 Lakhs * 100 | Settlement amount: ₹5 Crores No. of credits in bank account: ₹5 Crores * 1 |
        ---
        
        

## Initiate Instant Settlements 

Settle amounts **up to ₹5 Crores** through **Instant Settlement** feature via Dashboard and API: 

    
         Create Instant Settlements from the Dashboard.

        1. Log in to the Dashboard.
        2. Navigate to **Settlements**.
        3. Click **Settle Now** to go to the **Instant Settlements** window.
        4. Your current balance, maximum daily withdrawal limit and the current withdrawable amount are displayed. Enter the amount you want to settle to your bank account.

            ![Instant Settlement](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/IS1.jpg.md)

        4. Click **Next**. A pop-up showing **Instant Settlement** opens. 
         The fees + tax for the Instant Settlement and the net amount that will be credited to your account will be displayed in the pop up.
        
        5. Click **Settle Now** to settle instantly.

        
    
    
            Create and retrieve Instant Settlements requests using APIs. Refer to the [list of Instant Settlements APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements/apis.md#list-of-settlements-api).
    

## Initiate Smart Settlements

Use the **Smart Settlements** feature to settle amounts **between ₹5 Lakhs to ₹50 Crores** in a single shot within a time span of 1 hour.

        1. Log in to the Dashboard.
        2. Navigate to **Settlements**.
        3. Click **Settle Now** to go to the **Instant Settlements** window.
        4. Your current balance, maximum daily withdrawal limit and the current withdrawable amount are displayed. Enter the amount you want to settle to your bank account.
        4. Click **Next**. A pop-up showing Instant Settlement and Smart Settlements opens. 
        The pop-up displays the total fees plus tax for the Instant Settlement, along with the exact net amount that will be credited to your account.
        4. For amounts more than ₹5 Lakhs, the recommended option is Smart Settlements. 

            ![Smart Settlements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/SS1.jpg.md)

        5. Click **Settle Now** after selecting **Smart Settlements**.
        
        The Smart Settlements request is created. The requested amount will be settled to your bank account within 1 hour.
    
    
> **WARN**
>
> 
>     **Watch Out!**
>     
>      - Smart Settlements can be used via Dashboard only.
>      - For amounts more than ₹5 Crores, only the Smart Settlements option is enabled in the pop-up.
>     

You can check the Dashboard for latest updates on the limits and availability of instant settlements.
