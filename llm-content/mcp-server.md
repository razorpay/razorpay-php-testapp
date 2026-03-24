---
title: About Razorpay MCP Server
description: Set up and use the Razorpay Model Context Protocol (MCP) server to integrate Razorpay APIs with AI tools.
---

# About Razorpay MCP Server

- **Razorpay MCP Server Changelog**: Discover new releases and updates regarding Razorpay MCP Server.

The Razorpay MCP Server implements the [Model Context Protocol (MCP)](https://modelcontextprotocol.io/introduction) to provide seamless integration between Razorpay payment APIs and AI tools. This server enables AI assistants to execute Razorpay API operations, empowering developers to build AI-powered payment applications.

### About Model Context Protocol (MCP)

The Model Context Protocol (MCP) is a standard that allows AI models to interact with external tools and services. This allows AI assistants such as Claude to perform tasks on payment platforms like Razorpay using a common connection, which helps create smart, automated payment processes.

  
### Advantages

      - **Zero Infrastructure Overhead**: Use the hosted Remote MCP Server for instant setup.
      - **AI-Powered Automation**: Transform payment workflows with natural language commands.
      - **Optimised Development**: Build payment applications faster with AI assistance.
      - **Real-time Operations**: Execute Razorpay API operations directly through AI assistants.
      - **Seamless Integration**: Works with popular AI tools like Claude Desktop, Cursor, and Visual Studio Code.
    

  
### Features

     Transform your payment operations with AI-powered automation:

      - **Generate Payment Links**: Create and share Payment Links instantly with natural language commands.
      - **Access Transaction Data**: Retrieve order details, settlement information, and payment status in real-time.
      - **Analyse Payment Issues**: Get intelligent insights on failed transactions and payment trends.
      - **Optimise Development**: Build payment-enabled applications with AI assistance.
      - **Generate Standard Checkout Integration Code**: Quickly produce end-to-end Razorpay Standard Checkout integration code for supported frameworks.

      Explore [Use Cases & Examples](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/use-cases.md).
    

## Available Tools

The Razorpay MCP Server provides comprehensive access to Razorpay APIs through 35+ tools covering:

- **Payments**: Capture, fetch, and manage payment transactions
- **Orders**: Create and manage orders
- **Payment Links**: Generate and share Payment Links
- **Refunds**: Process and track refunds
- **QR Codes**: Create and manage QR code payments
- **Settlements**: Access settlement and reconciliation data
- **Payouts**: Manage payout operations
- **Standard Checkout**: Integrate Razorpay Standard Checkout for supported frameworks

View [Complete Tools Reference](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/tools-reference.md).

## Deployment Options

The Razorpay MCP Server offers two deployment models to suit different needs:

  
### Remote MCP Server (Recommended)

     - **Hosted solution** with zero infrastructure overhead.
     - **Automatic updates** and high availability.
     - **Quick setup** using `npx`.
     - **Best for** users who want instant setup and automatic maintenance.

     Get Started with [Razorpay Remote MCP Server](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/remote.md).
    

  
### Local MCP Server

     - **Self-hosted** using Docker.
     - **Complete control** over infrastructure.
     - **Access to all tools** without restrictions.
     - **Best for** users who need full control or have specific security requirements.

     Get Started with [Razorpay Local MCP Server](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/local.md).
    

## Get Started

1. **Choose Your Deployment**: Select between [Remote (recommended)](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/remote.md) or [Local MCP Server](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/local.md).
2. **Set Up Prerequisites**: Install required tools (Node.js for Remote, Docker for Local).
3. **Get API Keys**: Generate Razorpay API keys from your Razorpay Dashboard. Alternatively, use [OAuth](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/oauth.md)..
4. **Configure Your AI Tool**: Add the MCP server configuration to Claude Desktop, Cursor, or VS Code.
5. **Start Building**: Begin using AI-powered payment operations.
