---
title: Bank Gateways
description: Add various banks as payment providers on Optimizer.
---

# Bank Gateways

You can add banks as payment providers on the Razorpay Dashboard.  Check the banks supported by Optimizer and the steps to add them as payment providers.

## Cards
Given below are the banks that support **Card** as a payment method on Optimizer, along with the steps and requirements to add them as a payment provider:

    
### Axis MIGS 

         To add Axis MIGS (Card) as a payment provider:
            1. Log in to your Dashboard.
            2. In the left navigation, under **PAYMENT PRODUCTS**, click **Optimizer**.
            3. Click **Add Provider**, select **Axis MIGS (Card)** and click **Next**.
            4. Enter the **Provider Name** and **Description**, and click **Next**.
            5. Enter the following details:
                - AMA Password
                - AMA Username
                - Access Code
                - Merchant Id
                - Select Payment Methods
                - Secure Secret
            6. Click **Submit**. 

            Axis MIGS (Card) will be added as a payment provider.
        

    
### CyberSource Axis

         
> **WARN**
>
> 
>             **Rupay not Supprted!**
> 
>             CyberSource Axis does not support **Rupay** as a card network.
>             

            To add CyberSource Axis (Card) as a payment provider:
            1. Log in to your Dashboard.
            2. In the left navigation, under **PAYMENT PRODUCTS**, click **Optimizer**.
            3. Click **Add Provider**, select **CyberSource Axis (Card)** and click **Next**.
            4. Enter the **Provider Name** and **Description**, and click **Next**.
            5. Enter the following details:
                - AMA Password
                - Access Code
                - AMA Username
                - Merchant ID
                - Select Payment Methods
                - Secret Hash
            6. Click **Submit**. 

            CyberSource Axis (Card) will be added as a payment provider.
        

    
### CyberSource HDFC 

         
> **WARN**
>
> 
>         **Rupay not Supported!**
> 
>         CyberSource HDFC does not support **Rupay** as a card network.
>         

        To add CyberSource HDFC (Card) as a payment provider:
        1. Log in to your Dashboard.
        2. In the left navigation, under **PAYMENT PRODUCTS**, click **Optimizer**.
        3. Click **Add Provider**, select **CyberSource HDFC (Card)** and click **Next**.
        4. Enter the **Provider Name** and **Description**, and click **Next**.
        5. Enter the following details:
            - Access Code
            - Organization ID
            - SOAP key
            - Secret Key
            - Select Payment Methods
        6. Click **Submit**. 

        CyberSource HDFC (Card) will be added as a payment provider.
        

    
### HDFC

         To add HDFC (Card) as a payment provider:
            1. Log in to your Dashboard.
            2. In the left navigation, under **PAYMENT PRODUCTS**, click **Optimizer**.
            3. Click **Add Provider**, select **HDFC (Card)** and click **Next**.
            4. Enter the **Provider Name** and **Description**, and click **Next**.
            5. Enter the following details:
                - Bank MID
                - Bank TID
                - ME Code
                - Select Payment Methods
                - TranPortal Password
            6. Click **Submit**. 

            HDFC (Card) will be added as a payment provider.
        

## UPI
Given below are the banks that support **UPI** as a payment method on Optimizer, along with the steps and requirements to add them as a payment provider:

    
### Axis

         To add Axis (UPI) as a payment provider:
         1. Log in to your Dashboard.
         2. In the left navigation, under **PAYMENT PRODUCTS**, click **Optimizer**.
         3. Click **Add Provider**, select **Axis (UPI)** and click **Next**.
         4. Enter the **Provider Name** and **Description**, and click **Next**.
         5. Enter the following details:
            - Merchant Channel Id
            - Merchant ID
            - Payee VPA
            - Select Payment Methods
            - Select TPV options (Non TPV/ TPV Only/ Both TPV and Non TPV)
         6. Click **Submit**. 

         Axis (UPI) will be added as a payment provider.
        

    
### HDFC Mindgate 

         To add HDFC Mindgate (UPI) as a payment provider:

         1. Log in to your Dashboard.
         2. In the left navigation, under **PAYMENT PRODUCTS**, click **Optimizer**.
         3. Click **Add Provider**, select **HDFC Mindgate (UPI)** and click **Next**.
         4. Enter the **Provider Name** and **Description**, and click **Next**.
         5. Enter the following details:
             - Response Hash Key
             - Store PG Merchant ID
             - Select Payment Methods
             - Select TPV options (Non TPV/ TPV Only/ Both TPV and Non TPV)
             - VPA Assigned
         6. Click **Submit**. 

         HDFC Mindgate (UPI) will be added as a payment provider.
        

    
### ICICI

         To add ICICI (UPI) as a payment provider:
         1. Log in to your Dashboard.
         2. In the left navigation, under **PAYMENT PRODUCTS**, click **Optimizer**.
         3. Click **Add Provider**, select **ICICI (UPI)** and click **Next**.
         4. Enter the **Provider Name** and **Description**, and click **Next**.
         5. Enter the following details:
             - Merchant ID
             - Payee VPA
             - Select Payment Methods
             - Select TPV options (Non TPV/ TPV Only/ Both TPV and Non TPV)
         6. Click **Submit**. 

         ICICI (UPI) will be added as a payment provider.
        

## Netbanking
Given below are the banks that support **Netbanking** as a payment method on Optimizer and the requirements to add them as a payment provider:

    
### Axis

         The following details are required to add Axis (Netbanking) as a payment provider:
            - Gateway merchant id - Payee id
        

    
### Federal Bank

         The following details are required to add Federal Bank (Netbanking) as a payment provider:
            - Gateway Merchant ID - API Key
            - Gateway Terminal Password - Salt Key
            - Gateway Secure Secret - Request Encryption Key
            - Gateway Secure Secret2 - Response Encryption Key
        

     
### HDFC

         The following details are required to add HDFC (Netbanking) as a payment provider:
            - Gateway merchant ID - SPID
        

     
### ICICI

         The following details are required to add ICICI (Netbanking) as a payment provider:
            - Gateway merchant ID - SPID
        

     
### Kotak

         The following details are required to add Kotak (Netbanking) as a payment provider:
            - Gateway Merchant ID - Entity CD
            - Gateway Merchant ID2 - ENTITY_SUB_CD
        

    
### SBI

         The following details are required to add SBI (Netbanking) as a payment provider:
            - Gateway MID
