---
title: Automated Customer Engagement
heading: Auto Engagement
description: Automatically trigger promotions and campaigns based on customer actions and behaviour.
---

# Auto Engagement

The Auto Engagement feature, also known as Journey Builder, allows brands to build powerful, personalised post-purchase marketing journeys that enhance customer loyalty, drive repeat purchases and increase overall revenue.

![Auto Engagement Campaigns List](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/auto-engagement-page.jpg.md)

## Overview

The AutoEngagement feature in BillMe enables businesses to create automated, multi-channel customer engagement journeys triggered by billing events. This powerful tool allows you to design personalised customer experiences across digital bills, emails, SMS and surveys with intelligent timing and targeting.

## Key Benefits

- **Automated Customer Journeys**: Set up once and let the system handle customer engagement automatically
- **Multi-Channel Communication**: Engage customers through digital bills, emails, SMS and WhatsApp
- **Event-Driven Triggers**: Automatically initiate campaigns based on bill generation and other events  
- **Intelligent Timing**: Control message timing with built-in delays and scheduling
- **Targeted Audience**: Segment customers by brands, stores and specific criteria
- **Real-Time Monitoring**: Track campaign performance and engagement metrics

## Journey Creation Process

The Auto Engagement feature requires you to configure customer journeys for post-purchase engagement. You can design your customer journeys based on the following steps:

### Step 1: Journey Details

Configure the basic parameters for your engagement campaign:

**Required Fields:**
- **Journey Name**: Descriptive name for your campaign (For example - "Billme Promotion")
- **Journey Description**: Detailed explanation of the campaign purpose
- **Company Selection**: Choose the company account for this journey
- **Start Date & Time**: When the journey should begin accepting triggers
- **End Date & Time**: When the journey should stop processing new triggers

**Best Practices:**
- Use clear, descriptive names that indicate the campaign purpose
- Set appropriate date ranges based on promotional periods
- Include campaign objectives in the description for team reference

### Step 2: Audience Targeting

Define who will receive your engagement messages:

**Brand Selection:**
- Choose specific brands from your account
- Multiple brand selection supported
- Brand selection enables store filtering

**Store Selection:**
- Select specific stores within chosen brands
- Store selection becomes available after brand selection
- Allows for location-specific campaigns

**Targeting Options:**
- All customers from selected brands/stores
- Specific customer segments
- Individual customer targeting

### Step 3: Journey Flow Builder

Design your automated engagement sequence using the visual workflow builder:

#### Available Components

**Start Triggers:**
- **Event Occurrence**: Triggered by specific events like bill generation
  - Event Type: Bill
  - Sub Event: Bill Generation

**Customer Targeting:**
- **All Customers**: Target entire customer base
- **Customer Segment**: Target specific customer groups
- **Specific Customer**: Target individual customers

**Digital Bill Engagement:**
- **Bill Monitor**: Display monitoring information on bills
- **Ad Below**: Show advertisements below bill content
- **Sell Below**: Display sales content below bills
- **Banner**: Add promotional banners to bills
- **Survey**: Embed surveys within digital bills
- **Pop Over**: Show overlay messages on bills

**Third-Party Engagement:**
- **Send SMS**: Automated SMS messaging
- **Send Email**: Automated email campaigns
- **Send WhatsApp**: WhatsApp message automation

**Time Controls:**
- **Wait For Some Time**: Add delays between actions
  - Configurable wait periods
  - Date-based conditions
  - Custom timing rules

#### Building Your Flow

1. **Start with a Trigger**: Drag "Event Occurrence" to begin your journey
2. **Add Customer Targeting**: Connect "All Customers" or specific segments
3. **Design Engagement Sequence**: Add engagement components in logical order
4. **Insert Timing Controls**: Use "Wait For Some Time" to space out communications
5. **Configure Components**: Set up each component with appropriate content and settings

**Flow Example:**
```
Event Occurrence (Bill Generation)
    ↓
All Customers
    ↓
Banner → Pop Over → Send Email
    ↓
Survey
    ↓
Wait For Some Time (Delay)
    ↓
Send SMS
```

### Step 4: Review & Publish

Final review and launch your journey:

**Campaign Summary:**
- Review all journey details and settings
- Verify audience targeting configuration
- Confirm engagement flow sequence

**Journey Overview:**
- Visual representation of your complete workflow
- Component status indicators
- Flow validation check

**Preview Functionality:**
- **Preview Pane**: Test your journey before going live
- Click tiles to preview individual components
- Validate message content and timing

**Publishing:**
- Click **"Publish"** to activate your journey
- Journey will start processing triggers based on your start date
- Monitor performance through the main dashboard

## Component Configuration

You can configure various components of the journey based on your selections.

### Event Occurrence Setup
- **Event Type**: Select "Bill" for billing-related triggers
- **Sub Event**: Choose "Bill Generation" for new bill triggers
- **Conditions**: Set additional trigger conditions if needed

### Digital Bill Components

**Banner Configuration:**
- Upload banner images or create text-based banners
- Set display duration and positioning
- Configure click-through actions

**Pop Over Setup:**
- Design overlay content and messaging
- Set display timing and triggers
- Configure user interaction options

**Survey Integration:**
- Create or select existing surveys
- Set survey display conditions
- Configure response handling

### Third-Party Messaging

**SMS Configuration:**
- Ensure DLT compliance for SMS campaigns
- Link Telemarketer ID with DLT account
- Create message templates with personalisation
- Set delivery timing and frequency limits

**Email Setup:**
- Design email templates with rich formatting
- Configure sender information and reply-to addresses
- Set up email tracking and analytics
- Include unsubscribe options

### Time Regulator
- **Wait Duration**: Set specific time delays (minutes, hours, days)
- **Conditional Waits**: Wait until specific dates or conditions
- **Business Hours**: Respect customer communication preferences

## Best Practices

These are the recommended best practices while creating a customer journey:

### Journey Design
- **Start Simple**: Begin with basic flows and gradually add complexity
- **Customer Experience**: Consider the entire customer journey from their perspective
- **Timing Matters**: Space out communications to avoid overwhelming customers
- **Test Thoroughly**: Use preview functionality before publishing

### Content Creation
- **Personalisation**: Use customer data to personalise messages
- **Brand Consistency**: Maintain consistent branding across all touchpoints
- **Clear CTAs**: Include clear calls-to-action in all communications
- **Mobile Optimisation**: Ensure content displays well on mobile devices

### Compliance
- **SMS Regulations**: Follow TRAI guidelines for SMS marketing
- **Email Standards**: Include proper unsubscribe mechanisms
- **Data Privacy**: Respect customer data privacy and preferences
- **Opt-out Options**: Provide easy ways for customers to opt out

### Performance Optimsation
- **Monitor Metrics**: Track engagement rates and conversion metrics
- **A/B Testing**: Test different content versions and timing
- **Continuous Improvement**: Regularly review and optimise journey performance
- **Customer Feedback**: Incorporate survey responses and feedback
