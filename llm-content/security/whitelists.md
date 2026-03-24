---
title: Razorpay IPs and Certificates
description: Download Razorpay SSL certificates and whitelist our API and Webhooks IP addresses.
---

# Razorpay IPs and Certificates

You can whitelist Razorpay-issued SSL certificates and IP addresses to communicate with Razorpay APIs and Webhooks. By downloading Razorpay SSL certificates and whitelisting our IPs, you can verify that you are securely communicating with our servers.

## SSL Certificates

SSL certificates for `api.razorpay.com` with valid date ranges are listed below.

Certificate File | Valid From | Expiry
---
[X10.pem](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x10.pem.md) & [Chain](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x10-chain.pem.md) | Oct 9th, 2025 | Nov 10th, 2026
---
[X9.pem](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x9.pem.md) & [Chain](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x9-chain.pem.md) | Nov 11th, 2024 | Dec 12th, 2025
---
[X8.pem](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x8.pem.md) & [Chain](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x8-chain.pem.md) | Jan 5th, 2024 | Jan 4th, 2025
---
[X7.pem](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x7.pem.md) & [Chain](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x7-chain.pem.md) | Feb 3rd, 2023 | Feb 2nd, 2024
---
[X6.pem](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x6.pem.md) & [Chain](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x6-chain.pem.md) | May 19th, 2022 | May 19th, 2023
---
[X4.pem](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x4.pem.md) & [Chain](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x4-chain.pem.md) | July 7th, 2021 | June 7th, 2022
---
[X3.pem](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x3.pem.md) & [Chain](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x3-chain.pem.md) | March 13th, 2020 | July 28th, 2021
---
[X2.pem](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x2.pem.md) & [Chain](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x2-chain.pem.md) | April 10th, 2019 | April 15th, 2020
---
[X1.pem](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x1.pem.md) & [Chain](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/certs-x1-chain.pem.md) | Feb 7th, 2016 | April 12th, 2019

As we roll out our infrastructure changes gradually, we recommend whitelisting our certificate as per **Valid From/Expiry** timelines. You should whitelist all the certificates in that range if they overlap.

> **WARN**
>
> 
> **Watch Out!**
> 
> 
> We highly discourage pinning our SSL certificate to your applications. Use the certificates provided in the table above **only** if you are mandated by internal policies to whitelist Razorpay's SSL certificates. Instead, use the [latest CA Bundle](https://curl.haxx.se/docs/caextract.html) provided by your OS.
> 

## API IPs

Requests to Razorpay APIs should be routed to `api.razorpay.com`. This will be resolved to various IPs controlled by our load balancers. However, if the IPs to which the requests should be sent are restricted, all your API requests can be routed to `prod-api-static.razorpay.com`. This will be resolved to any of the following IPs:

```js: API Ingress IPs
52.66.140.48
52.66.140.61
13.235.207.57
13.232.63.19
13.234.135.6
13.234.83.3 
13.235.208.84
13.235.96.132
15.206.46.184
18.99.160.48/29
```

> **INFO**
>
> 
> **Handy Tips**
> 
> - `18.99.160.0/29` is a CIDR range. All the IPs in the range `18.99.160.48 - 18.99.160.55` are utilised.
> 
> - All our SDKs use proper DNS caching and honour the TTLs that we set. However, if you are not using our SDKs, ensure that DNS TTLs set by Razorpay are honoured and are not cached aggressively.
> 

## Webhook IPs

Below is the list of IPs from which Webhooks are sent from our servers.

```js: Egress IPs
52.66.75.174    
52.66.76.63 
52.66.151.218
35.154.217.40
35.154.22.73
35.154.143.15
13.126.199.247
13.126.238.192
13.232.194.134
18.96.225.0/26
18.99.161.0/26
```

> **INFO**
>
> 
> **Handy Tips**
> 
> 
> `18.96.225.0/26` and `18.99.161.0/26` are CIDR ranges. All the IPs in the range `18.96.225.0 - 18.96.225.63` and `18.99.161.0 - 18.99.161.63` are utilised for sending the webhooks.
> 

We highly recommend using [Webhook Signature](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/#validation.md) to validate the integrity of the webhooks, even if you have whitelisted our Webhook IPs.

## UAT Static IPs

Below is the list of UAT egress IPs.

```js: UAT Egress IPs
52.66.76.68
52.66.95.207
13.127.201.109
```

### Related Information

[Razorpay Security](@/Applications/MAMP/htdocs/new-docs/llm-content/security.md)
