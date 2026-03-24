---
title: Zapier Integration for Ghost CMS
description: Connect your Razorpay Payment Button with Ghost CMS using Zapier to automate member management.
---

# Zapier Integration for Ghost CMS

Zapier Integration consists of 2 sets of steps - **Trigger** and **Action**. 
- A successful payment through the Razorpay Payment Button initiates the `payment.captured` webhook, which acts as the **Trigger** for Zapier. 
- **Action** is the member creation done by Zapier in Ghost, following the **Trigger**. 

Follow these steps to integrate Zapier with your Payment Button and Ghost:

### Trigger

To create the trigger:

1. Log in to your [Zapier account](https://zapier.com) and click **+ Create** button on the top-left of the Zapier Dashboard page.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     A Zap is an automated workflow that connects your apps and services together. Every Zap consists of a trigger step and one or more action steps. When you turn your Zap on, it will run the action steps every time the trigger event occurs.
>     

2. Select **Zaps** from the dropdown menu to create a new automated workflow.
    ![Create and Zap](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/create-zap.jpg.md)

3. Name your Zap as per your preference by clicking on **Untitled Zap** at the top of the editor and selecting **Rename**.
    ![Rename zap](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rename-zap.jpg.md)

4. Click **Trigger** step box to configure the trigger event.

5. In the app selection panel, search for and select **Webhooks by Zapier** under **Popular built-in tools**.
    
> **INFO**
>
> 
>     **Note**
> 
>     Webhooks by Zapier is a Premium feature. Ensure your Zapier plan supports Premium apps.
>     

    ![select webhooks by zapier](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/zap-webhook-premium.jpg.md)

6. Choose **Catch Hook** as the Trigger Event from the available options and click **Continue** to proceed with the setup.
    ![select catch hook on trigger](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/trigger-catchhook.jpg.md)

7. (Optional) Configure the **Pick off a Child Key** field if you want Zapier to extract only a specific key from the webhook payload. Leave this blank to receive the entire payload.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     By default, Zapier gives you the entire payload of the webhook. If you specify a child key, Zapier will only grab that key from the object(s) sent to Zapier. For example, given `{"contact": {"name": "Gaurav"}}`, add "contact" here to only return `{"name": "Gaurav"}`.
>     

8. Click **Continue** to proceed to the Test step.

9. Zapier generates a **Custom Webhook URL**. Copy and save this URL for later use. You will need this URL while creating the [Razorpay Webhook](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md).
    
> **INFO**
>
> 
>     **Important**
> 
>     Configure your Razorpay Dashboard to send the `payment.captured` webhook to this Zapier URL. Refer to [Razorpay Webhook Setup](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md) for detailed instructions.
>     

10. Click **Test trigger** to verify the webhook connection. Once a test payment is captured, Zapier will display the received data.
    ![Test Trigger](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/test-trigger.jpg.md)

### Action

To set up the action:

1. In your Zapier Zap, click on the **Action** step box or the **+** button to add an Action Step.

2. Search for and select **Webhooks by Zapier** again from the app selection panel.

3. Choose **Custom Request** as the **Action Event** and click **Continue**.
    ![Action select custom request](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/custom-request-action.jpg.md)

4. Configure the Custom Request to **Find Member**:

    Follow the steps in Zapier to fetch the customer email from Ghost. Here, you pass the customer email from Razorpay Webhook to check if it exists in your Ghost database.
        ![configure custom request](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/configure-custom-request.jpg.md)

    - **Method**: Select `GET` from the dropdown options (GET, PUT, POST, PATCH and DELETE).
    - **URL**: Your Ghost Admin API URL. Replace `email` with the email field from your Razorpay webhook data (for example, `payload__payment__entity__email`). 
      URL example: `https://your-ghost-site.com/ghost/api/admin/members/?search=test@example.com`
    - **Data Pass-Through?**: Select `True`.
    - **Headers**:
        - Authorisation: Ghost-Admin. Replace `your_admin_api_key` with the Ghost Admin API credentials you got while [setting up Ghost](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/ecommerce-plugins/ghost-integration/#integration-steps.md) (refer #3 under Integrations).
        - Content-Type: application/json
        - Accept-Version: v6.0 (or v5.0 depending on your Ghost version)
    - **Data**: Enter the JSON structure as shown below:
        
        ```JSON
        "members": 
        [
            {
            "email": "{{email_from_razorpay}}",
            "name": "{{optional_name_from_razorpay}}",
            "status": "paid",
            "labels": [
                { "name": "Razorpay Paid" }
            ]
            }
        ]
        ```
        

5. Click **Continue** and then **Test step** to verify the configuration.

6. Copy the member id from the response, if the array is not empty. Follow the steps in the **Update Existing Member** tab to check for existing members and update the details in Ghost.

7. **Add Path/Filter**

    Check if the customer (member) already exists using email as a filter. For this, we recommend using **Paths by Zapier**, which enables you to apply conditional logic by defining **Path A** (update member, if already exists) and **Path B** (create new member, if non-existent).

    You will use the output from the **Find Member** steps for this.

    
        
        Define **Path A** to update an existing member.
            - Conditions:
                - Select the members array output from the steps in **Find Member** tab.
                - `Does not exactly match []` (empty array). This means if the members array is not empty, the member exists.
            - Action - Update Existing Member
                - Choose App & Event: **Webhooks by Zapier** → **Custom Request**.
                - Method: `PUT`
                - URL: Your Ghost Admin API URL. Get the id from the **Find Member** step's output (for example, `members__0__id`). URL example: `https://your-ghost-site.com/ghost/api/admin/members/60f7e6f0a0b0c0d0e0f0g0h0`
                - Headers: 
                    - Authorisation: Ghost-Admin. Replace `your_admin_api_key` with the Ghost Admin API credentials you got while [setting up Ghost](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/ecommerce-plugins/ghost-integration/#integration-steps.md) (refer #3 under [Integrations](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/ecommerce-plugins/ghost-integration/#integration-steps.md)).
                - Data Pass-Through: Yes
                - Data: As given below:

                    
                    ```JSON
                    "members": 
                    [
                        { 
                        "id": "{{id_from_find_member_step}}",
                        "email": "{{email_from_razorpay}}",
                        "status": "paid",
                        "labels": [
                            { "name": "Razorpay Paid" }
                        ]
                        }
                    ]
                    ```
                    
        
            - Ensure to map `id` and `email` correctly from your Razorpay data.
            - You can add specific labels to categorise members (for example, `Razorpay Paid`).
            - Click **Continue** and **Test Action**.
        

        
        Define **Path B** to create a new member.
            - Conditions:
                - Select the members array output from the steps in **Find Member** tab.
                - `Exactly matches []` (empty array). This means if the members array is empty, the member does not exist.
            - Action - Create New Member
                - Choose App & Event: **Webhooks by Zapier** → **Custom Request**.
                - Method: `POST`
                - URL: Your Ghost Admin API URL + /members/
                - Headers:
                    - Authorisation: Ghost-Admin. Replace `your_admin_api_key` with the Ghost Admin API credentials you got while [setting up Ghost](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/ecommerce-plugins/ghost-integration/#integration-steps.md) (refer #3 under [Integrations](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/ecommerce-plugins/ghost-integration/#integration-steps.md)).
                - Data Pass-Through: Yes
                - Data: As given below:
                    
                    ```JSON
                    "members": 
                    [
                        {
                        "email": "{{email_from_razorpay}}",
                        "name": "{{optional_name_from_razorpay}}",
                        "status": "paid",
                        "labels": [
                            { "name": "Razorpay Paid" }
                        ]
                        }
                    ]
                    ```
                    

            - Map `email` from your Razorpay data.
            - You can map `name` if Razorpay provides it.
            - You can add specific labels to categorise members (for example, `Razorpay Paid`).
            - Click **Continue** and **Test Action**.
        
    

8. Once all steps are configured and tested, click **Publish** in the top-right corner to activate your Zap.

### Related Information

- [Ghost Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/ecommerce-plugins/ghost-integration.md)
- [Integrate a Payment Button with Ghost](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/ecommerce-plugins/ghost-integration/add-payment-button.md)
- [Razorpay Payment Button](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-button.md)
- [Razorpay Webhook](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md)
