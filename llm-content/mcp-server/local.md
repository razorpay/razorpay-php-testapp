---
title: Razorpay Local MCP Server Setup
description: Complete guide to set up and run the Razorpay MCP Server locally using Docker.
---

# Razorpay Local MCP Server Setup

The Razorpay Local MCP Server is a self-hosted solution that provides complete control over your infrastructure and access to all available tools without restrictions. Choose this option if you need full functionality or have specific security requirements.

## Setup Options

Refer to the [Prerequisites](#prerequisites) section and then choose a setup method to proceed. You can use [Docker (recommended)](#docker-setup-instructions-recommended) or [build from source](#build-from-source-instructions).

  
### Prerequisites

     Before setting up the Razorpay Local MCP Server, ensure you have:
      - **Docker**: Container platform for running the MCP server.
      - **Git**: Version control system for cloning repositories (if building from source).
      - **Golang (Go)**: Programming language runtime (if building from source).
      - **Razorpay API Keys**: Generate [API keys](https://razorpay.com/docs/payments/dashboard/account-settings/api-keys/#generate-api-keys) from your Dashboard.
      - **AI-assisted Application**: Claude Desktop, VS Code, or similar AI-assisted application.
    

  
### Docker Setup Instructions (Recommended)

      1. Clone the repository:
          ```bash: Clone Repo
          git clone https://github.com/razorpay/razorpay-mcp-server.git
          cd razorpay-mcp-server
          ```
      2. Build the Docker image:
          ```bash: Build Docker Image
            docker build -t razorpay-mcp-server:latest
          ```
     The resulting image `razorpay-mcp-server:latest` will be available in your local Docker registry.
    

  
### Build From Source Instructions

      1. Clone the repository:    
          ```bash: Clone Repo
            git clone https://github.com/razorpay/razorpay-mcp-server.git
            cd razorpay-mcp-server
          ```
      2. Build the Go binary:
          ```bash: Build Go Binary
            go build -o razorpay-mcp-server ./cmd/razorpay-mcp-server
          ```

     The resulting binary `razorpay-mcp-server` will be created in your current directory.
    

## Integration Steps

### Step 1: Configure Application

Follow the integration steps given below:

  
     To use the Razorpay MCP Server with Claude Desktop:
      1. Install [Claude Desktop](https://claude.ai/download).
      2. Go to **Settings** → **Developer** → **Edit Config**.
      3. Add the following to your `claude_desktop_config.json` file:

      ```json
       {
        "mcpServers": {
            "razorpay-mcp-server": {
                "command": "docker",
                "args": [
                    "run",
                    "--rm",
                    "-i",
                    "-e",
                    "RAZORPAY_KEY_ID",
                    "-e",
                    "RAZORPAY_KEY_SECRET",
                    "razorpay-mcp-server:latest"
                ],
                "env": {
                    "RAZORPAY_KEY_ID": "your_razorpay_key_id",
                    "RAZORPAY_KEY_SECRET": "your_razorpay_key_secret"
                }
            }
          }
        }
      ```
      
      
> **INFO**
>
> 
>       **Handy Tips**
>       
>       - **Replace** `your_razorpay_key_id` and `your_razorpay_key_secret` with your actual Razorpay API credentials.
>       - [Configure MCP servers in Claude Desktop](https://modelcontextprotocol.io/quickstart/user)
>       

  
  
        1. Open **Visual Studio Code**.
        2. Open Command Palette and type **Preferences: Open User Settings (JSON)**.
        3. Select it from the dropdown to open the settings file.
        4. Paste the following configuration:

        ```json
        {
          "mcp": {
            "inputs": [
              {
                "type": "promptString",
                "id": "razorpay_key_id",
                "description": "Razorpay Key ID",
                "password": false
              },
              {
                "type": "promptString",
                "id": "razorpay_key_secret",
                "description": "Razorpay Key Secret",
                "password": true
              }
            ],
            "servers": {
              "razorpay": {
                "command": "docker",
                "args": [
                  "run",
                  "-i",
                  "--rm",
                  "-e",
                  "RAZORPAY_KEY_ID",
                  "-e",
                  "RAZORPAY_KEY_SECRET",
                  "razorpay-mcp-server:latest"
                ],
                "env": {
                  "RAZORPAY_KEY_ID": "${input:razorpay_key_id}",
                  "RAZORPAY_KEY_SECRET": "${input:razorpay_key_secret}"
                }
              }
            }
          }
        }
        ```

        Learn more about MCP servers in VS Code's [agent mode documentation](https://code.visualstudio.com/docs/copilot/chat/mcp-servers).
  

## Step 2: Restart Application

Restart your AI assistant application after configuration. You should see [Razorpay MCP tools](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/mcp-server/tools-reference.md) become available. Test the connection by asking: **Show me available Razorpay tools**.

If successful, you should see the complete list of Razorpay MCP tools, including tools that are restricted in the Remote MCP Server.

## Next Steps

Once your Local MCP Server is running:

1. **Explore Advanced Features**: Access all tools including refunds and settlements.
2. **Configure Advanced Options**: See [Configuration Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/mcp-server/configuration.md) for detailed settings.
3. **Review Use Cases**: Check [practical examples](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/mcp-server/use-cases.md) that leverage local-only tools.
