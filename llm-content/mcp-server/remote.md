---
title: Razorpay Remote MCP Server Setup
description: Step-by-step guide to set up the Razorpay Remote MCP Server with zero infrastructure overhead.
---

# Razorpay Remote MCP Server Setup

The Razorpay Remote MCP Server is a hosted solution that provides zero infrastructure overhead with automatic updates and high availability. This is the **recommended deployment option** for most users.

## Prerequisites

Before installing the Razorpay Remote MCP Server, ensure you have:

- **AI Assistant**: Claude Desktop, Cursor, Visual Studio Code, or similar AI-assisted application.
- **Razorpay Account**: Active Razorpay account with API access.
- **Authentication**: Generate [Razorpay API keys](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/api-keys/#generate-api-keys.md) from the Dashboard. Alternatively, you can use [OAuth](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/oauth.md).

## Step 1: Install Node.js

The Remote MCP Server requires Node.js and `npm`. Choose the installation method for your operating system:

### For Mac

  
    1. Go to [nodejs.org](http://nodejs.org/).
    2. Download the LTS (Long Term Support) version.
    3. Run the installer (.pkg file).
    4. Follow the installation prompts.
  
  
   Run the following command on terminal:
    ```bash: Install Node.js
    brew install node
    ```
  

### For Windows

  
    1. Go to [nodejs.org](http://nodejs.org/).
    2. Download the LTS version for Windows.
    3. Run the installer (.msi file).
    4. Follow the installation wizard.
    5. Make sure to check **Add to PATH** during installation.
  
  
    Run the following command:
      ```bash: Install Node.js
      choco install nodejs
      ```
  
  
    Run the following command:
    ```bash: Install Node.js
    winget install OpenJS.NodeJS
    ```
  

## Step 2: Verify Installation

After installing Node.js, open your terminal/command prompt and verify the installation:

```bash: Verify Installation
node --version
npm --version
npx --version
```

You should see version numbers for all three commands.

## Step 3: Authenticate Razorpay Account

Generate API keys and create a merchant token.

### Generate API Keys

Follow these steps to generate the API keys:

1. Log in to your [Razorpay Dashboard](https://dashboard.razorpay.com/).
2. Navigate to **Account & Settings** → **API Keys**.
3. Generate your API keys (Key ID and Key Secret).
4. Copy both the Key ID and Key Secret.

### Encode Merchant Token
Encode your merchant token by running the following command in your terminal:

```bash: Encode Merchant Token
echo : | base64
# Output: cnpwX3Rlc3RfYWJjMTIzOnNlY3JldF9kZWY0NTY=
```

> **WARN**
>
> 
> **Watch Out!**
> 
> Replace `` and `` with your actual credentials.
> 

Save this base64-encoded token as you will need it for configuration.

## Step 4: Configure Your AI-assisted Application

Choose your AI-assisted application and follow the corresponding configuration steps.

> **WARN**
>
> 
> **Deprecation Notice**
> 
> Effective **August 13, 2025**, the endpoint `https://mcp.razorpay.com/sse` is deprecated and replaced by `https://mcp.razorpay.com/mcp`, which supports streamable HTTP responses for improved performance. Update your integrations immediately to avoid service disruptions. Refer to the [changelog](@/Applications/MAMP/htdocs/new-docs/llm-content/api/changelog.md).
> 

  
### Claude Desktop Configuration

      1. Open **Claude Desktop**.
      2. Navigate to **Settings** → **Developer** → **Edit Config**.
      3. Paste the following configuration and save the file:

      ```json: Claude Desktop Configuration
      {
        "mcpServers": {
          "rzp-mcp-server": {
            "command": "npx",
            "args": [
              "mcp-remote",
              "https://mcp.razorpay.com/mcp",
              "--header",
              "Authorization: Basic "
            ]
          }
        }
      }
      ```

      **Replace** `` with the base64 token generated in Step 3.

    

  
### Cursor Configuration

      1. Open **Cursor**.
      2. Navigate to **Settings** → **Cursor Settings**.
      3. Go to **MCP tools** and click **Add Custom MCP** (or edit existing MCP.json file).
      4. Paste the following configuration:

      ```json: Cursor Configuration
      {
        "mcpServers": {
          "rzp-mcp-server": {
            "command": "npx",
            "args": [
              "mcp-remote",
              "https://mcp.razorpay.com/mcp",
              "--header",
              "Authorization:${AUTH_HEADER}"
            ],
            "env": {
              "AUTH_HEADER": "Basic "
            }
          }
        }
      }
      ```

      **Replace** `` with your base64-encoded token.

    

  
### Visual Studio Code Configuration

      1. Open **Visual Studio Code**
      2. Open Command Palette and type **Preferences: Open User Settings (JSON)**
      3. Select it from the dropdown to open the settings file
      4. Paste the following configuration:

      ```json: Visual Studio Code Configuration
      {
        "mcp": {
          "inputs": [
            {
              "type": "promptString",
              "id": "merchant_token",
              "description": "Razorpay Merchant Token",
              "password": true
            }
          ],
          "servers": {
            "razorpay-remote": {
              "command": "npx",
              "args": [
                "mcp-remote",
                "https://mcp.razorpay.com/mcp",
                "--header",
                "Authorization: Basic ${input:merchant_token}"
              ]
            }
          }
        }
      }
      ```

      Learn about MCP servers in VS Code's [agent mode documentation](https://code.visualstudio.com/docs/copilot/chat/mcp-servers).

    

## Step 5: Restart Application

Restart your AI assistant application after adding the configuration. You should see Razorpay MCP tools become available. Test the connection by asking: **Show me available Razorpay tools**.

If successful, you should see a list of available Razorpay MCP tools.

## Next Steps

Once your Remote MCP Server is set up:

1. **Explore Use Cases**: Review [practical examples](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/use-cases.md) of AI-powered payment operations.
2. **Learn Available Tools**: Check the [Tools Reference](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/tools-reference.md) for complete capabilities.
3. **Advanced Configuration**: See [Configuration Guide](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/configuration.md) for additional options.
4. **Start Building**: Begin using natural language commands to interact with Razorpay APIs
