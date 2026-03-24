---
title: Razorpay MCP Server Configuration
description: Detailed configuration options and advanced setup for the Razorpay MCP Server.
---

# Razorpay MCP Server Configuration

The Razorpay MCP Server requires the following environment variables for configuration:

Variable | Type | Required | Description
---
`RAZORPAY_KEY_ID` | string | Yes | Your Razorpay API key ID 
---
`RAZORPAY_KEY_SECRET` | string | Yes | Your Razorpay API key secret 
---
`LOG_FILE` | string | No | Path to log file for server logs
---
`TOOLSETS` | string | No | Comma-separated list of toolsets to enable (default: `all`)
---
`READ_ONLY` | boolean | No | Run server in read-only mode (default: `false`)

## Command Line Flags

When running the Local MCP Server binary directly, you can use the following command line flags:

Flag (Short) | Description
---
`--key` (`-k`) | Your Razorpay API key ID
---
`--secret` (`-s`) | Your Razorpay API key secret
---
`--log-file` (`-l`) | Path to log file
---
`--toolsets` (`-t`) | Comma-separated list of toolsets to enable
---
`--read-only` | Enable read-only mode

## Related Information

- [Use Cases](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/mcp-server/use-cases.md)
- [Tools Reference](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/mcp-server/tools-reference.md)
- [FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/mcp-server/faqs.md)
