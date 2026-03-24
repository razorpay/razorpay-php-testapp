---
title: Prerequisites | Razorpay Java SDK
heading: Prerequisites
description: Check the prerequisites before you integrate with Razorpay Java server-side SDK.
---

# Prerequisites

- **Java Changelog**: Discover new features, updates and deprecations related to the Razorpay Java SDK (since Jan 2024).

Install the Razorpay Java SDK and integrate it with your Java-based website to accept payments, initiate refunds and much more.

## Dependencies

- You must use Java v15 or higher. Know more about the [latest java versions](https://www.java.com/releases/).

- Import the following packages before your get started: 

  ```json: Import Package
  import org.json.JSONObject;
  import com.razorpay.*;
  ```

## Installation

You can install Razorpay using Maven or Gradle.

    
        1. Download  and install [Maven](https://maven.apache.org/download.cgi)  on your system.
        2. Download the [latest Source code](https://github.com/razorpay/razorpay-java/releases) zip file from the Releases section of GitHub.
        3. Unzip the file and add this dependency to the project object model (POM) of your project.
        
        ```java: Java
        
        com.razorpay
        razorpay-java
        x.y.z //x.y.z = the version you want to install
        
        ```
        
    
    
        1. [Download](https://gradle.org/releases) and [install](https://docs.gradle.org/current/userguide/installation.html) Gradle on your system.
        2. Download the [latest Source code](https://github.com/razorpay/razorpay-java/releases) zip file from the Releases section of GitHub.
        3. Unzip the file and add this dependency to the build file of the project:
        
        ```java: Java
        implementation 'com.razorpay:razorpay-java:x.y.z" //x.y.z = the version you want to install
        ```
        
    

  - **Payment Gateway**: Integrate with Razorpay Payment Gateway.

  - **API Sample Codes**: Integrate using API sample codes.

  - **Other Razorpay Products**: Integrate with other Razorpay products.

## Support

- **Queries**: If you have queries, [contact support](https://razorpay.com/support/).

- **Feature Request:** If you have a feature request, raise an issue on [GitHub](https://github.com/razorpay/razorpay-java/issues/new).

### Related Information

[Address Verification System](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/address-verification-system.md)
