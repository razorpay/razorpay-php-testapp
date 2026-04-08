---
title: Onboard Businesses for Embedded Payments
heading: Onboard Businesses
description: Use Razorpay's Co-branded Onboarding UI and seamlessly onboard businesses to your Platform or Marketplace.
---

# Onboard Businesses

Co-branded onboarding is a pre-built UI for Razorpay Partners that assists in building a native business onboarding flow. It enables Partners to onboard clients to Razorpay right from their platform.

Co-branded Onboarding UI offers customisation for Partners to configure colour, theme, logo and brand name to mimic your platform environment. 

You can integrate with:
- [Standard Co-Branded Onboarding](#standard-co-branded-onboarding)
- [Custom Onboarding SDK](#custom-onboarding-sdk)

> **INFO**
>
> 
> **Feature Request**
> 
> This feature is enabled on demand. Raise a request with our [Partnerships team](mailto:partners@razorpay.com) or your Razorpay point-of-contact to get this feature activated.
> 

![Custom onboarding experiences - Embedded Payments for Platforms & Marketplaces](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/platforms-and-market-places-custom-onboarding-exp.jpg.md)

## Prerequisites

- [Sign up as Partner](https://razorpay.com/partners/) and complete KYC to activate your account. Request for a partner type [switch to Technology Partner](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/become-technology-partner.md).
- Get the Co-branded UI capability enabled for your account by contacting our [Partnerships team](mailto:partners@razorpay.com).
- [Register your application](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/integration-steps.md#1-create-an-application) on Razorpay.
- Embed a button redirecting the user to the Razorpay OAuth page on the front-end interface for your app. 
- Keep a redirect URL ready. Razorpay will redirect users to this URL after they complete the onboarding process.

## Standard Co-Branded Onboarding

Standard co-branded onboarding is the simplest and quickest way to onboard customers using Razorpay embedded onboarding. 

You need to embed a Razorpay hosted co-branded onboarding URL within your platform. The user uses this URL to initiate the onboarding process. 

### How it Works

The onboarding starts and ends within your platform while taking the user through a Razorpay-hosted onboarding journey that you can customise per your needs.

Watch the video below to see how the co-branded onboarding journey looks for your client.

[Video: https://www.youtube.com/embed/-232gU8kB9Q?si=bq8eV1xj5MCFnayj]

    
### Workflow for Standard Co-Branded Onboarding

1. As a Partner, you create an application on your Dashboard and download your client credentials. 
2. The client visits the section of your platform with the embedded Razorpay Payments setup.
3. They click **Connect with Razorpay** and visit the Razorpay authorisation URL you initiated with the client credentials downloaded in Step 1.
4. The user can log in or sign up.
    1. **Log in**: If the user is an existing Razorpay customer, they can log in and connect thieir account without additional KYC details.
    2. **Sign up**: If the user is new to Razorpay, they can create an account using the **Create Account** option. They need to submit KYC details to proceed.
5. After the necessary details are submitted, the user is prompted to authorise your platform to access data and create payments and refunds.
6. The client gives authorisation, which allows Razorpay to connect their client account to your Partner account.
7. On successful authorisation, Razorpay redirects the user back to the URL configured by you in your application settings. Razorpay shares an authentication code while redirecting. You need to use this Auth code in the token API request to generate an Auth token.

![Sample Authorisation Interface](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/oauth-authorize.jpg.md)

This completes the connection setup. Use this token to start accepting payments on behalf of the client.
        

#### Integration Steps

To integrate with Standard Co-branded UI:

1. [Integrate with Razorpay OAuth](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth.md)
2. [Customise client Onboarding](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/settings.md)

## Custom Onboarding SDK

Custom Onboarding SDK enables you to onboard customers to Razorpay Payments within your platform. You can create a customer account using APIs and pre-fill KYC details, or have your client sign up and complete KYC verification. 

All the KYC details and documents except the Terms and Conditions can be pre-filled using the Onboarding SDK. You have two options:
- Collect end-to-end KYC details and redirect users to the Razorpay co-branded flow to accept terms and conditions.
- Collect and submit KYC partially (for example, contact details and business details), and let the user complete KYC on the Razorpay Co-branded Onboarding page.

> **INFO**
>
> 
> **Feature Request**
> 
> Ensure that **Onboarding APIs** are enabled for your account. This feature is enabled on demand. Raise a request with our [Support team](https://razorpay.com/support/#request) or your Razorpay point-of-contact to get this feature activated.
> 

#### Integration Steps

[Integrate with Custom Onboarding SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/onboarding-sdk.md) to create a customer account using APIs and pre-fill KYC details.

### Related Information 

- [Track Onboarding Status](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/status.md)
