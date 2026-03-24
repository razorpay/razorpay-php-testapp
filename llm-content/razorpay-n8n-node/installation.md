---
title: Install Razorpay n8n Community Node
description: Install and configure the Razorpay n8n Community Node. Follow this step-by-step guide to set up API keys and start automating payments.
---

# Install Razorpay n8n Community Node

Follow the steps given below to install the Razorpay n8n Community Node.

### Prerequisites

Before installing, ensure you have:

- **n8n Instance**: Running n8n v1.104.2 or higher
- **Node.js**: Version 14.x or higher (for self-hosted)
- **Razorpay Account**: Active account at [razorpay.com](https://razorpay.com)
- **Admin Access**: Permission to install community nodes

## Step 1: Generate Razorpay API Keys

You need to generate Razorpay API keys before using the node.

### Access API Keys

1. Log in to [Razorpay Dashboard](https://dashboard.razorpay.com/).
2. Navigate to **Account & Settings** → **API Keys** under **Website and app settings**.
3. Click **Generate Key**.
4. Copy both **Key ID** and **Key Secret**.

> **WARN**
>
> 
> **Watch out!**
> 
> Save the Key id and Secret immediately - it will not be shown again.
> 

#### Understand Key Types

  
    **For Development & Testing**
    - Prefix: `rzp_test_`
    - No real money transactions
    - Free to use
    - Use [test cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md)
    
    Always start with test keys for safe development.
  
  
    **For Production**
    - Prefix: `rzp_live_`
    - Real money transactions
    - Requires completed KYC
    - Transaction fees apply
    
    Only use after thorough testing.
  

### Set Up API Keys in n8n

In n8n, create a new Razorpay API credential:
1. Enter your credentials:
    - Key id: Your Razorpay Key id (For example, `rzp_test_1234567890` or `rzp_live_1234567890`)
    - Key Secret: Your Razorpay Key Secret.
2. Test the connection to ensure your credentials are working correctly.

## Step 2: Install the Razorpay n8n Community Node

Choose your installation method based on your n8n deployment:

  
### Method 1: Install via n8n Community Nodes (Recommended)

      1. Log in to the **n8n Dashboard**.
      2. Click **Settings** in the left sidebar.
      3. Click **Community Nodes** in the settings menu.
      4. Install the Node.
            1. Click **Install a community node**.
            2. Enter the package name: `@razorpay/n8n-nodes-razorpay`.
            3. Click **Install**.
      5. Restart **n8n**. After restart, the Razorpay node will be available.
    

  
### Method 2: Install via npm (Self-hosted)

      For self-hosted n8n installations, run the following commands:

      ```bash
      # Navigate to n8n directory
      cd ~/.n8n

      # Install the Razorpay community node
      npm install @razorpay/n8n-nodes-razorpay

      # Restart n8n service
      pm2 restart n8n
      # OR
      systemctl restart n8n
      ```
    

  
### Method 3: Docker Installation

      If you are using n8n with Docker, add the package to your Docker setup:
        ```yml: Add Package
         # In your Dockerfile or docker-compose.yml
         FROM n8nio/n8n:latest
         USER root
         RUN npm install -g @razorpay/n8n-nodes-razorpay
         USER node
        ```
    

You have successfully installed the Razorpay n8n Community Node.

## Next Steps

After installation, you can proceed with the following:

- Create a new workflow or open an existing one.
- Add the **Razorpay** node by searching and dragging it from the node panel.
- Set up your Razorpay API credentials.
- Choose the [operation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/razorpay-n8n-node/operations-reference.md) you want to perform (Create Order, Fetch Payment and so on.)
- Configure the required parameters for your selected operation.
- Test your workflow to ensure everything works correctly.

> **INFO**
>
> 
> **Handy Tips**
> 
> - Start with Test Mode: Always use test credentials when setting up and testing your workflows.
> - Check API Documentation: Refer to [Razorpay API documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md) for detailed parameter information.
> - Use Webhooks: Consider setting up [Razorpay webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) for real-time payment updates in your workflows.
> 
> 

### Related Documentation

- [Explore Use Cases & Examples](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/razorpay-n8n-node/use-cases.md)
- [View Available Operations](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/razorpay-n8n-node/operations-reference.md)
- [Frequently Asked Questions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/razorpay-n8n-node/troubleshooting-faqs.md)
- [Set up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md)
