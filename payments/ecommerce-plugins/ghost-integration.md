---
title: Integrate Razorpay Payment Button with Ghost CMS using Zapier
heading: Integrate Razorpay Payment Button with Ghost CMS
description: Integrate Razorpay Payment Buttons with Ghost CMS for automated member creation using Zapier.
---

# Integrate Razorpay Payment Button with Ghost CMS

Integrate Razorpay Payment Buttons with Ghost CMS for automated member creation using [Zapier](https://zapier.com/). Zapier is a tool that connects your apps without requiring any code.

    
### Advantages

         - **Automated Member Management**: Automatically creates and updates members in Ghost upon successful payments, avoiding duplication of customer records.
         - **Multiple Payment Methods**: Supports UPI, cards, netbanking and other payment modes available on Razorpay.
         - **Location-based Pricing**: Displays pricing tailored for Indian and international customers.
         - **Instant Customer Engagement**: Sends automated welcome emails to new members immediately after purchase.
        

    
### How It Works

         1. Customer visits the site, enters name, email, phone and completes the payment using Razorpay Payment Button.
         2. Razorpay detects a `payment.captured` [webhook event](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md).
         3. Razorpay makes an `HTTP POST` request to the Zapier `Catch Hook` URL. The request body contains payment and customer details.
         4. Zapier receives the webhook data (containing the customer payment and contact details) which triggers the workflow.
         5. Zapier performs a `GET` request to the Ghost Admin API by passing the customer email id and checks if the customer already exists.
         6. If the email id already exists, Zapier performs a `PUT` request to the Ghost Admin API to update the customer details.
         7. If the email id does not exist already, Zapier performs a `POST` request to the Ghost Admin API to create a new customer record. Here, the inputs for the Ghost API are name, email, phone and labels (for example, `lifetime access`).
         8. Zapier uses the email extracted from the webhook to send a welcome mail to the newly created/updated customer with the chosen email service (Gmail/Outlook) via its Email Service API.
         

        

### Prerequisites

1. Sign up for a [Razorpay account](https://dashboard.razorpay.com/signup) (with Payment Links or Subscriptions set up).
2. Sign up for a [Zapier](https://zapier.com/sign-up) account (Pro plan recommended for webhook features).
3. Ensure you have a Ghost CMS account (self-hosted or Ghost Pro).

### Integration Steps

1. Set up your [Razorpay Webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md). 
    - You will need the [Zapier **Catch Hook** URL](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/ecommerce-plugins/ghost-integration/zapier-integration.md)to complete the webhook set up. 
    -  Ensure to select at least  `payment.captured` (for one-time payments) and `subscription.charged` (if you are using Razorpay Subscriptions) under **Active Events**.

2. Create a [Razorpay Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/ecommerce-plugins/ghost-integration/add-payment-button.md).
You will get a Payment Button code as below. Save this code to add the Payment Button to your webpage(s).

    
    ```json: Payment Button Code
          
     ```
     
3. Get your Ghost Admin API credentials:
    1. Go to your Ghost Admin Dashboard.
    2. Navigate to **Settings → Integrations → + Custom integration**.
    3. Give it a name (for example, Zapier Razorpay Integration).
    4. Ghost will generate an Admin API Key and an Admin API URL. Ensure to save these securely as these are required for Zapier integration.

4. Create a [Zapier Zap](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/ecommerce-plugins/ghost-integration/zapier-integration.md).

### Best Practices

- **Secure Storage of Credentials**: Store all your API keys (your Razorpay API Key, Ghost Admin API Key) and webhook secrets securely as environment variables. **Never hardcode any of these.**
- **Mandatory HTTPS Communication**: Use HTTPS for all data transmissions (Razorpay to Zapier or your backend, backend to Ghost, frontend to backend) to ensure data encryption in transit.
- **IP/Port Allowlisting (Whitelisting)**: For environments requiring high security, it is best to implement IP address allowlisting (also known as whitelisting). Configure your firewall or webhook endpoint to only accept incoming webhook requests from approved Razorpay IP ranges. This limits exposure by preventing malicious parties from sending forged data to your Zapier or backend webhook URL.
- **Ensure Certificate Verification**: Always configure your application to enable [SSL/TLS certificate verification](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/security/whitelists.md) for all outgoing API calls. This prevents Man-in-the-Middle (MITM) attacks by ensuring you are communicating with the legitimate server.

### Related Information

- [Zapier Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/ecommerce-plugins/ghost-integration/zapier-integration.md)
- [Integrate a Payment Button with Ghost](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/ecommerce-plugins/ghost-integration/add-payment-button.md)
- [Razorpay Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button.md)
- [Razorpay Webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)
