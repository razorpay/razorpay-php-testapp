---
title: 2FA on RazorpayX
heading: Two-Factor Authentication
description: Enhance account security and ensure only authorised users log in to your account using 2-factor authentication(2FA).
---

# Two-Factor Authentication

RazorpayX provides enhanced security and protection through Two-Factor Authentication (2FA) for all users of the Dashboard.

Usually, to log in to the [RazorpayX Dashboard](https://x.razorpay.com/), users enter their email address and password. When you enable 2FA on an account, users are prompted to enter a one-time password (OTP) when logging in. They receive an OTP on their registered mobile number. 

By setting this additional layer of security, you can ensure that only the intended user has access to your Dashboard, thus preventing malicious attacks or misuse of your sensitive business data.

## Enabling 2FA for Users on Dashboard 

To add this additional layer of security, you must enable 2FA. You can enable it 
- [**All team members**](#2fa-for-all-team-members): As the account owner, you can enforce 2FA for all users (team members) linked to your account.
- [**Your account only**](#2fa-for-your-account-only): As a user, you can set up 2FA for your account only.

### 2FA for All Team Members

As an owner, you can enforce 2FA for all users (team members) linked to your account. To enable 2FA for all your team members:

1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
2. Navigate to **My Account & Settings** → **Manage Team**.
3. In the **Team Members** tab, enable the **Two-Factor Authentication for the team** option by toggling it to **ENABLED**.
    
4. Enter the OTP sent to your registered mobile device.
5. Enter your account password and confirm.

You have now set up 2FA as a mandatory step for all team members on your account. If a user did not provide their mobile number during sign up, they are prompted to do so on their next login.

### 2FA for Your Account Only

You can enable 2FA for your account only. To enable 2FA for your account only:

1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
2. Navigate to **My Account & Settings** → **User Profile**.
3. Enable the **Two-Factor Authentication** option in the section under **User Role**.
    
4. Enter the OTP sent to your registered mobile device.
5. Enter your account password and confirm.

You have now set up 2FA for your account only.

If your users are locked out of their accounts, the Owner/person with Owner privileges, can reset 2FA for that user.

### Related Information

- [Manage Teams](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams.md)
- [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md)
- [Chartered Accountant Portal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/ca-portal.md)
