---
title: Check CRED Eligibility
description: Check if the user is eligible for CRED Pay using the Check CRED Eligibility API.
---

# Check CRED Eligibility

You can use the API given below to determine if the user is eligible for CRED Pay transactions on Custom Checkout.

> **WARN**
>
> 
> **Watch Out!**
> 
> You should provide the user's contact number with the country code to check the eligibility.
> 

Following is the sample code for request and response.

```js: Request
var razorpay = new Razorpay({
  key: '',
});
razorpay.checkCREDEligibility("+918888888888")
  .then((response) => {

    // Contact is CRED Eligible 

  })
  .catch((error) => {
    // Contact is  CRED Ineligible 
  });
```js: Response
{
  "success": true,
  "data": {
      "state": "ELIGIBLE",
      "tracking_id": ,
      "offer": {
          "description": 
      }
  },
  "status_code": 200
}
```
