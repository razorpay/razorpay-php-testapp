---
title: Frequently Asked Questions (FAQs)
description: Common issues, debugging techniques, and solutions for the Razorpay MCP Server.
---

# Frequently Asked Questions (FAQs)

### 1. What is MCP (Model Context Protocol)?

         The Model Context Protocol (MCP) is an open standard that allows AI models to interact with external tools and services. It enables AI assistants like Claude to execute operations on platforms like Razorpay through a standardised interface, allowing for seamless integration and natural language interactions with payment systems.
        

    
### 2. Can I use the Razorpay MCP Server in production?

         Yes, the Razorpay MCP Server is an official integration designed for production use. Make sure to use appropriate API keys based on your environment (test keys for development, live keys for production) and follow security best practices for API key management.
        

    
### 3. How do I switch between test and live modes?

         Use the corresponding [Razorpay API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) for your desired environment. For test mode, use test environment API keys (starting with rzp_test_). For live mode, use production API keys (starting with rzp_live_). The MCP Server automatically detects the environment based on your API keys.
        

    
### 4. What is the difference between Remote and Local MCP Server?

         Remote MCP Server is hosted by Razorpay with zero infrastructure management, automatic updates, and quick setup using npx. Local MCP Server is self-hosted using Docker, providing complete control over infrastructure and access to all tools without restrictions. We recommend Remote MCP Server for most use cases.
        

    
### 5. Which AI-assisted applications are supported?

         The Razorpay MCP Server works with Claude Desktop, Cursor, Visual Studio Code (with MCP extension), and other MCP-compatible tools. Each application has slightly different configuration requirements, but all follow the same MCP standard.
