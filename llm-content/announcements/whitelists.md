---
title: Announcements from Razorpay Infra Group
description: List of changes that need to be done at your end for whitelisting Razorpay SSL certificates and IP addresses of Razorpay APIs and Webhooks.
---

# Announcements from Razorpay Infra Group

Know about the changes that need to be done in your environment related to whitelisting of Razorpay-issued SSL certificates and IP addresses used to communicate with Razorpay APIs and Webhooks.

## Razorpay SSL Certificates

SSL certificates for `api.razorpay.com` with valid date ranges are tabulated below:

 Certificate File | Valid From | Expiry
 ---
 [X3.pem](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x3.pem.md) & [Chain](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x3-chain.pem.md) | March 13th, 2020 | July 28th, 2021
 ---
 [X2.pem](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x2.pem.md) & [Chain](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x2-chain.pem.md) | April 10th, 2019 | April 15th, 2020
 ---
 [X1.pem](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x1.pem.md) & [Chain](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x1-chain.pem.md) | Feb 7th, 2016 | April 12th, 2019

As we roll out our infrastructure changes on a gradual basis, we recommend whitelisting our certificate as per Valid From/Expiry timelines. If they overlap, you should whitelist all of the certificates in that range.

> **WARN**
>
> 
> **Note**
> 
> We highly discourage pinning our SSL Certificate to your applications. The certificates provided, in the table above, should be used **only** if you are mandated by internal policies to whitelist Razorpay's SSL Certificates. Instead, you should use the [latest CA Bundle](https://curl.haxx.se/docs/caextract.html) provided by your OS.
> 

## Razorpay API IPs

Requests to Razorpay APIs should be routed to `api.razorpay.com`. This will be resolved to various IPs controlled by our load balancers. However, in your environment, if there is a restriction of IPs to which the requests should be sent, all your API requests can be routed to `prod-api-static.razorpay.com`. This will be resolved to any of the following IPs:

```js: List of API IPs
13.232.63.19
13.234.135.6
13.234.83.3
13.235.207.57
52.66.140.48
52.66.140.61
```
## Razorpay Webhook IPs

List of Razorpay IPs from which Webhooks are sent from our servers:

```js: List of Webhook IPs
35.154.217.40
35.154.22.73
13.126.238.192
13.127.201.109
13.232.194.134
35.154.143.15
52.66.151.218
52.66.75.174
52.66.76.63
```

It is highly recommended to use [Webhook Signature](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/#validation.md) to validate the integrity of the webhooks, even though you have whitelisted our Webhook IPs.
