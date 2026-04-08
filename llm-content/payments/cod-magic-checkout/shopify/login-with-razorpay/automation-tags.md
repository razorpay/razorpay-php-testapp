---
title: Automatic Customer Tagging for Retargeting | Razorpay COD & Magic Checkout
heading: Automatic Customer Tagging for Retargeting
description: Razorpay SSO automatically tags customers in Shopify to enable personalised retargeting campaigns and targeted marketing workflows.
---

# Automatic Customer Tagging for Retargeting

When customers authenticate through [Login with Razorpay (SSO)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/cod-magic-checkout/shopify/login-with-razorpay.md) on your Shopify store, specific tags are automatically assigned to their profiles. These tags provide automation capabilities that enhance your marketing efforts and improve customer engagement.

    
### Advantages

         - **Zero Additional Cost**: This feature is included with your Magic Checkout integration.
         - **Boost Revenue**: Create targeted marketing campaigns that convert more effectively.
         - **Time Saving**: Automate customer journeys that would otherwise require manual segmentation.
         - **Seamless Integration**: Works with your existing marketing tools and Shopify workflows.
        

## List of Tags

**Login with Razorpay** automatically applies the following tags to customer profiles in Shopify:

Tag | Description
---
**MAGIC_LOGIN_AUTO** | Applied when returning customers are automatically identified without additional input.
---
**MAGIC_LOGIN_MANUAL** | Applied when customers manually authenticate using an OTP.
---
**LOGIN_TIMESTAMP** | Records the exact store visit time in ISO format.
---
**MAGIC_CUSTOMER** | Identifies customers whose accounts were created through Razorpay Magic.

### Example: Customer Journey with Tags

These tags enable automation possibilities for your store. Create personalised retargeting flows based on login behaviour:

- Send WhatsApp messages to customers tagged with `MAGIC_LOGIN_AUTO` who have not completed a purchase in 7 days.
- Offer special promotions to customers with `MAGIC_LOGIN_MANUAL` tags who abandoned their carts.
- Use `LOGIN_TIMESTAMP` to trigger time-sensitive offers after login events.

#### Example Setup

This example demonstrates how to create an automated campaign to re-engage customers who have not placed orders recently.

Follow the steps given below:

1. **Customer Identification**:
    - Customer logs in (automatically/manually through Magic).
    - System automatically assigns `Magic_login` tag.
2. **Segment Creation**:
    - Create segment: Customers who have not placed an order since February.
    - This segment dynamically updates as customer behaviour changes.
3. **Campaign Rule**: If customer has **Magic_login** tag and customer belongs to **No orders since February** segment then send an **Email**.

#### Additional Campaign Possibilities

The system supports unlimited automation combinations based on your requirements. Common use cases include:

    
        - Customer identified + viewed specific items → send targeted coupon.
        - Customer identified + browsed category multiple times → send category-specific offers.
    
    
        - Customer identified + no order in 3 days → send premium re-engagement message.
        - Customer identified + high purchase frequency + recent inactivity → send personalised offers.
    
    
        - Customer identified + 4 website visits in 7 days + abandoned checkout + no order in 5 days → send discount coupon.
        - Customer identified + repeated product views + no purchase → send limited-time offer.
    

## Compatible Automation Tools

Leverage Razorpay Shopify tags with various automation platforms:

- **Shopify Flow**: Create conditional workflows using the login tags as triggers.
- **Zapier**: Connect to hundreds of apps based on tag events.
- **WhatsApp Business Solutions**: Trigger customer communications based on tag status.
- **Email Marketing Tools**: Create segments based on login behaviour.

For advanced use cases, combine multiple tags to create targeted customer segments with specific behaviours and attributes.

### Related Information

[Customer Analytics](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/cod-magic-checkout/shopify/login-with-razorpay/customer-analytics.md)
