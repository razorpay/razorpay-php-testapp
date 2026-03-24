---
title: Postman Collection
description: Download the Postman collection for Razorpay Recurring Payments.
---

# Postman Collection

We have a Postman collection to make the integration quicker and easier. Click the **Download Postman Collection** button below to get started.

Download Postman Collection

## Instructions to Use Postman Collection

- All Razorpay APIs are authenticated using Basic Authentication.
  - [Generate API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) from the Dashboard.
  - Add your API Keys in Postman. Select the required API → Auth → Type = Basic Auth → Username = [Your_Key_ID]; Password = [Your_Key_secret]
  ![](/docs/assets/images/api-postman_basic_auth.gif)
- Some APIs in the collection require data specific to your account such as `order_id`, `cust_id` and `token_id` either in the request body or as a path parameter.
  - For example, the create order API requires you to add the `cust_id` (Customer ID) in the request body.
  - These parameters are enclosed in \{\} in the collection. For example, \{cust_id\}.
  - The API throws an error if these are incorrect or do not exist in your system.
