---
title: Google Play Console - Data Safety
description: Guidelines for filling out Razorpay SDK-related data points in Google Play Data Safety form.
---

# Google Play Console - Data Safety

The Data Safety section on the Google Play store enables merchants to help people understand what user data their app collects or shares. It also provides information of their app's key privacy and security practices. This helps users make more informed choices when installing apps.

**By July 20, 2022**, all developers must declare how they collect and handle user data for the apps they publish on Google Play and provide details about how they protect this data through security practices like encryption. This includes data collected and handled through any third-party libraries or SDKs used in their apps.  

## Who is responsible for providing this data?

Merchant is responsible for making complete and accurate declarations in their app's store listing on Google Play. Google Play reviews apps across all policy requirements. 

However, Google cannot determine how we use and handle the data on behalf of the developers. Only merchants possess all the information required to complete the Data Safety form. 

## Video Tutorial 

Watch this video to know how to fill out the Data Safety form.

[Video: https://www.youtube.com/embed/pNAS_0IcHtM]

## Data Safety 

After you log in to [Google Play Console](https://play.google.com/console/u/0/developers/app/app-content/summary), navigate to **App Content** → **Data Safety** and provide the relevant answers. These questions are categorised into three sub-sections as follows:

1. [Data Collection and Security](#data-collection-and-security)
2. [Data Types](#data-types)
3. [Data Usage and Handling](#data-usage-and-handling)

#### Data Collection and Security

This section contains questions about data collection, security and handling practices.

Question | Developer Response
---
Does your app collect or share any of the required user data types? | - Yes: Answer **Yes** if you collect or share any [data types](#data-types). 
- No: Answer **No** if your app does not collect or share any user data types.

---
Is all of the user data collected by your app encrypted in transit? | - Yes: Answer **Yes** if you encrypt all the data sent to your servers and other third parties. Razorpay SDK encrypts all data in transit. 
- No: Answer **No** if your app or a third party does not encrypt the collected user data.

---
Do you provide a way for users to request that their data is deleted? | - Yes: Answer **Yes** if your app allows users to request the deletion of their data. Razorpay SDK allows users to delete data on request, provided the request meets regulatory guidelines. 
- No: Answer **No** if you do not provide your users with an option to delete their data.

#### Data Types

The following table will help you with privacy declaration for data types concerning Razorpay SDKs.

Category | Data Type | Razorpay SDK Guideline 
---
Location | Precise or Coarse location | **No**, Razorpay SDK does not collect approximate or precise location data.
---
Personal info | Name | **Yes**, if you have configured to transmit this data to Razorpay.
---
Personal info | Email Address | **Yes**, if you have configured to transmit this data to Razorpay.
---
Personal info | User IDs | **Yes**, if you have configured to transmit this data to Razorpay.
---
Personal info | Address | **Yes**, if you have configured to transmit this data to Razorpay.
---
Personal info | Phone number | **Yes**, if you have configured to transmit this data to Razorpay.
---
Personal info | Race and ethnicity | **No**, Razorpay does not collect this data.
---
Personal info | Political or religious beliefs | **No**, Razorpay does not collect this data.
---
Personal info | Sexual orientation | **No**, Razorpay does not collect this data.
---
Personal info | Other info | **No**, Razorpay does not collect this data.
---
Financial info | User payment info | **Yes**, Razorpay collects information about the user's financial accounts, such as credit card number.
---
Financial info | Purchase history | **Yes**, if you have configured to transmit this data to Razorpay.
---
Financial info | Credit score | **No**, Razorpay does not collect this data.
---
Financial info | Other financial info | **No**, Razorpay does not collect this data.
---
Health and fitness | Health info | **No**, Razorpay does not collect this data.
---
Health and fitness | Fitness info | **No**, Razorpay does not collect this data.
---
Messages | Emails | **No**, Razorpay does not collect this data.
---
Messages | SMS or MMS | **No**, Razorpay does not collect this data.
---
Messages | Other in-app messages | **No**, Razorpay does not collect this data.
---
Photos or videos | Photos | **No**, Razorpay does not collect this data.
---
Photos or videos | Videos | **No**, Razorpay does not collect this data.
---
Audio files | Voice or sound recordings | **No**, Razorpay does not collect this data.
---
Audio files | Music files | **No**, Razorpay does not collect this data.
---
Audio files | Other audio files | **No**, Razorpay does not collect this data.
---
Files and docs | Files and docs | **No**, Razorpay does not collect this data.
---
Calendar | Calendar events | **No**, Razorpay does not collect this data.
---
Contacts | Contacts | **No**, Razorpay does not collect this data.
---
App activity | App interactions | **Yes**, Razorpay SDK collects app interaction on screens rendered by SDK.
---
App activity | In-app search history | **No**, Razorpay does not collect this data.
---
App activity | Installed apps | **Yes**, only detection of installed UPI apps is done to enable [UPI intent](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/upi/upi-intent.md) functionality.
---
App activity | Other user-generated content | **Yes**, if you have configured to transmit this data to Razorpay.
---
App activity | Other actions | **No**, Razorpay does not collect this data.
---
Web browsing | Web browsing history | **No**, Razorpay does not collect this data.
---
App info and performance | Crash logs | **Yes**, if you have configured to transmit this data to Razorpay.
--- 
App info and performance | Diagnostics | **Yes**, if you have configured to transmit this data to Razorpay.
---
App info and performance | Other app performance data | **Yes**, if you have configured to transmit this data to Razorpay.
---
Device or other IDs | Device or other IDs | **Yes**, if you have configured to transmit this data to Razorpay.

#### Data Usage and Handling

#### Purpose of collecting information

Data collected by our SDK will be used only for the purpose of enabling the user to use the services provided by us, to help promote a safe service, calibrate consumer interest in our products and services, inform you about online offers and updates, troubleshoot problems, customise the user experience, detect and protect us against error, fraud and other criminal activity, collect money, enforce our terms and conditions, and as otherwise described to you or the user at the time of collection of such information.

#### Purpose of sharing information

We do not share user's Personal Information with any third party apart from financial institutions such as banks, RBI, or other regulatory agencies (as may be required) and to provide users with services that we offer through Razorpay, conduct quality assurance testing, facilitate the creation of accounts, provide technical and customer support, or provide specific services, such as synchronisation of your contacts with other software applications, following your instructions. These third parties are not required to use the user's Personal Information other than to provide the services requested by the user.

We may share users' Personal Information with our parent company, subsidiaries, joint ventures, or other companies under a common control (collectively, the "AFFILIATES") that we may have now or in the future, in which case we will require them to honour our Privacy Policy. If another company acquires our company or our assets, that company will possess your Personal Information, and will assume the rights and obligations with respect to that information as described in the Privacy Policy. We may disclose your Personal Information to third parties in a good faith belief that such disclosure is reasonably necessary to (a) take action regarding suspected illegal activities; (b) enforce or apply our terms and conditions and Privacy Policy; (c) comply with legal processes, such as a search warrant, subpoena, statute, or court order; or (d) protect our rights, reputation, and property, or that of our Users, Affiliates, or the public. Please note that we are not required to question or contest the validity of any search warrant, subpoena, or other similar governmental requests we receive.

We may disclose information in the aggregate to third parties relating to user behaviour in connection with the actual or prospective business relationship with those third parties, such as advertisers and content distributors. For example, we may disclose the number of users that have been exposed to, or clicked on, advertising banners.

## Privacy Link

For more information about privacy links, refer to [Razorpay Privacy Policy](https://razorpay.com/privacy/).

### Related Information 

[Google Play - Data Safety](https://support.google.com/googleplay/android-developer/answer/10787469?hl=en)
