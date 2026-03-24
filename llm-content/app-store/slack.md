---
title: Slack Integration
description: Know how to integrate Slack with Razorpay and get real-time updates regarding payment downtimes.
---

# Slack Integration

Slack is a business communication platform widely used by organisations to communicate with each other. It has multiple channels organised based on teams or topics. The participants can send messages, images, internet links, or videos in the channels.

> **WARN**
>
> 
> **Watch Out!**
> 
> - Only Owners can install this OAuth App and perform integration. 
> - If other [standard user roles](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/manage-team/#standard-user-roles.md) need to get notifications, they can be added to the Slack channel(s).
> 

You can integrate Razorpay with Slack to get real-time updates regarding payment downtimes. 

## Use Cases

Get real-time notifications whenever there is payment downtime or when the payment downtime is resolved.

## Video Tutorial

Watch this video to know how to integrate your Slack application with Razorpay.

[Video: https://www.youtube.com/embed/fCncEZiN1xc]

## Prerequisites

1. Sign up for a [Razorpay account](https://dashboard.razorpay.com/signup).
2. Sign up for a [Slack account](https://slack.com/intl/en-in/).

## Integration Steps

Follow these steps to integrate your Slack application with Razorpay:

1. Click on the **Slack App** within the Razorpay Appstore.
2. Click **Get Started**.
3. You will be taken to the Slack workspace page, where you need to select the workspace you want to install this app.
4. Select the appropriate workspace and click **Allow**.

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     To proceed further, you need admin access to your workspace. If you are not an admin, you would see a window to request your admin to allow access.
>     

5. After you click **Allow**, you will see a redirection window to your Slack desktop app.
6. Click **Open Slack**.
7. You will see that Razorpay is now officially added as an app to your workspace under Apps section.
8. Now, you need to connect your Razorpay account with your Slack account.
9. Select any of the Slack channels and enter the command `/razorpay connect`.
10. After you enter the command, you will receive a **"Hello"** message along with a **Connect** button.
11. Click **Connect**. You will be redirected to the Razorpay OAuth page.
12. If not logged in, log in to Razorpay OAuth page and click on **Authorize**.

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     To authorise this page, you need to have Owner account access to Razorpay.
>     

14. Once authorised, you will be redirected back to the Slack app where you will see a welcome message which says, "**You have successfully linked your account with Razorpay's Slack app**".
15. Your one time setup is now completed.
16. Enter the command `/razorpay subscribe payment-downtimes` in the channel from which you want to get downtime notifications.

You will now receive updates from Razorpay in the Slack channel about payment downtimes, downtimes being resolved or any other updates.
