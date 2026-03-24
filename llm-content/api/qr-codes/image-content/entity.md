---
title: QR Codes (Image Content) Entity
description: Know about QR Codes (Image Content) entity parameters and their description.
---

# QR Codes (Image Content) Entity

## QR Codes (Image Content) Entity

The QR Codes (Image Content) entity has the following parameters:

### Response

```json: Entity
{
  "id":"qr_I39xhFWWLO4wjM",
  "entity":"qr_code",
  "created_at":1632892063,
  "name":"Store_3",
  "usage":"single_use",
  "type":"upi_qr",
  "image_url":"https://rzp.io/i/67FsPSHWvw",
  "payment_amount":300,
  "status":"active",
  "description":"For Store 4",
  "fixed_amount":true,
  "payments_amount_received":0,
  "payments_count_received":0,
  "notes":{
    "purpose":"Test UPI QR Code notes"
  },
  "customer_id":"cust_HjSs5QuKahsnng",
  "close_by":1632922955,
  "image_content":"upi://pay?pa=rzr.qrfoodapp54462255833@icic&pn=FoodApp&tr=RZPI39xhFWWLO4wjMqrv2&tn=PaymenttoFoodApp&cu=INR&mc=5811&am=3&invoiceNo=INV001&invoiceDate=2021-09-29T13:42:35+05:30&invoiceName=GauravKumar&gstIn=22AAAAA0000A1Z5&gstBrkUp=GST:40%7CSGST:20%7CCGST:20%7CCESS:0",
  "tax_invoice":{
    "number":"INV001",
    "date":1632922955,
    "customer_name":"Gaurav Kumar",
    "business_gstin":"22AAAAA0000A1Z5",
    "gst_amount":4000,
    "cess_amount":0,
    "supply_type":"intrastate"
  }
}
```

### Parameters

@include qr-codes-flipkart-intent-url/api/entity
