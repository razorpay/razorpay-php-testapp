---
title: Configure EMI² Methods
description: Configure the EMI² methods or instruments of your choice to perform the eligibility check.
---

# Configure EMI² Methods

You can check eligibility for specific EMI² methods or instruments by passing the `instruments` array. If you do not pass the `instruments` array, the eligibility check is performed on all applicable EMI² instruments by **default**. 

## Sample Code

Use the sample codes below to specify the methods or instruments of your choice: 

### Check Eligibility on HDFC EMI

Use the code given below to check eligibility for HDFC EMI:

```java: Code
{
  "instruments": [  // optional
    {
      "method": "emi",
      "issuers": [
        "HDFC"
      ],
      "types": [
        "debit" // only supports debit
      ]
    }
  ]
}
```

### Check Eligibility on a Specific Cardless EMI

Use the code given below to check eligibility on a specific Cardless EMI:

```java: Code
{
  "instruments": [  // optional
    {
      "method": "cardless_emi",
      "providers": [
        "zestmoney"
      ]
    }
  ]
}
```

### Check Eligibility on Specific Cardless EMI and Pay Later Options

Use the code given below to check eligibility on specific Cardless EMI and Pay Later options:

```java: Code
{
  "instruments": [ //optional
    {
      "method": "cardless_emi",
      "providers": [
        "walnut369"
      ]
    },
    {
      "method": "paylater",
      "providers": [
        "rzpx_postpaid",
        "getsimpl",
        "icic"
      ]
    }
  ]
}
```
