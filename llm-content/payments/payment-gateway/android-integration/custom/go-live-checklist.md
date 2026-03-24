---
title: 3. Go-live Checklist
description: Check the go-live checklist for Razorpay Custom Android integration.
---

# 3. Go-live Checklist

Consider these steps before taking the integration live.

## Accept Live Payments

You can perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the integration is working as expected, switch to the Live Mode and start accepting payments from customers. However, make sure that you **swap the Test API Key with the Live Key**.

Watch this video to generate an API Key in Live Mode.

[Video: https://www.youtube.com/embed/30REpNtYSak]

To generate an API Key in Live Mode:

1. Log in to the Dashboard and switch to **Live Mode** on the menu.
2. Navigate to **Account & Settings** → **API Keys** → **Generate Key** to generate the API Key for Live Mode.
3. Download the keys and save them securely.
4. Replace the Test API Key with the Live Key in the Checkout code and start accepting actual payments.

## Payment Capture

@include integration-steps/capture-settings

## Set Up Webhooks

         @include integration-steps/set-up-webhooks
