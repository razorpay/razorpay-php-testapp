---
title: QR Codes Webhook Events
description: List of QR Codes webhook events along with sample payloads.
---

# QR Codes Webhook Events

**QR Codes** are scannable two-dimensional barcodes that store payment details, enabling businesses to accept UPI payments seamlessly through customer scans.

## List of QR Codes Webhook Events

The table below lists the webhook events available for QR Codes.

Webhook Events | Description
---
`qr_code.created` | Triggered when a QR code is created.
---
`qr_code.credited` | Triggered when a payment is made using a QR code.
---
`qr_code.closed` | Triggered when a QR code is closed.

## Sample Payloads

Given below are the sample payloads for QR Codes webhook events.

### QR Code Created

```json: qr_code.created
{
  "entity": "event",
  "account_id": "acc_CJoeHMNpi0nC7k",
  "event": "qr_code.created",
  "contains": [
    "qr_code"
  ],
  "payload": {
    "qr_code": {
      "entity": {
        "id": "qr_HO2e0813YlchUn",
        "entity": "qr_code",
        "created_at": 1623914349,
        "name": "Acme Groceries",
        "usage": "multiple_use",
        "type": "upi_qr",
        "image_url": "https://rzp.io/i/X6QM7LL",
        "payment_amount": null,
        "status": "active",
        "description": "Buy fresh groceries",
        "fixed_amount": false,
        "payments_amount_received": 0,
        "payments_count_received": 0,
        "notes": {
          "Branch": "Bangalore - Rajaji Nagar"
        },
        "customer_id": "cust_HKsR5se84c5LTO",
        "close_by": "1625077799"
      }
    }
  },
  "created_at": 1623914349
}
```json: qr_code.created (GST)
{
  "entity": "event",
  "account_id": "acc_CJoeHMNpi0nC7k",
  "event": "qr_code.created",
  "contains": [
    "qr_code"
  ],
  "payload": {
    "qr_code": {
      "entity": {
        "id": "qr_HO2e0813YlchUn",
        "entity": "qr_code",
        "created_at": 1623914349,
        "name": "Acme Groceries",
        "usage": "multiple_use",
        "type": "upi_qr",
        "image_url": "https://rzp.io/i/X6QM7LL",
        "payment_amount": null,
        "status": "active",
        "description": "Buy fresh groceries",
        "fixed_amount": false,
        "payments_amount_received": 0,
        "payments_count_received": 0,
        "notes": {
          "Branch": "Bangalore - Rajaji Nagar"
        },
        "customer_id": "cust_HKsR5se84c5LTO",
        "close_by": "1625077799",
        "tax_invoice": {
          "number": "INV001",
          "date": 1589994898,
          "customer_name": "Gaurav Kumar",
          "business_gstin": "06AABCU9605R1ZR",
          "gst_amount": 4000,
          "cess_amount": 0,
          "supply_type": "interstate"
        }
      }
    }
  },
  "created_at": 1623914349
}
```

### QR Code Credited

```json: qr_code.credited
{
  "entity": "event",
  "account_id": "acc_CJoeHMNpi0nC7k",
  "event": "qr_code.credited",
  "contains": [
    "payment",
    "qr_code"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_HO2fEpc9JeOQU5",
        "entity": "payment",
        "amount": 200,
        "currency": "INR",
        "status": "captured",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "upi",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": true,
        "description": "QRv2 Payment",
        "card_id": null,
        "bank": null,
        "wallet": null,
        "vpa": "gauri.kumar@okhdfcbank",
        "email": "gauri.kumari@example.com",
        "contact": "+919000090000",
        "customer_id": "cust_HKsR5se84c5LTO",
        "notes": {
          "Branch": "Bangalore - Rajaji Nagar"
        },
        "fee": 0,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "rrn": "116812981837"
        },
        "created_at": 1623914419
      }
    },
    "qr_code": {
      "entity": {
        "id": "qr_HO2e0813YlchUn",
        "entity": "qr_code",
        "created_at": 1623914349,
        "name": "Acme Groceries",
        "usage": "multiple_use",
        "type": "upi_qr",
        "image_url": "https://rzp.io/i/X6QM7LL",
        "payment_amount": null,
        "status": "active",
        "description": "Buy fresh groceries",
        "fixed_amount": false,
        "payments_amount_received": 0,
        "payments_count_received": 0,
        "notes": {
          "Branch": "Bangalore - Rajaji Nagar"
        },
        "customer_id": "cust_HKsR5se84c5LTO",
        "close_by": 1625077799,
        "closed_at": null,
        "close_reason": null
      }
    }
  },
  "created_at": 1623914419
}
```json: qr_code.credited (GST)
{
  "entity": "event",
  "account_id": "acc_CJoeHMNpi0nC7k",
  "event": "qr_code.credited",
  "contains": [
    "payment",
    "qr_code"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_HO2fEpc9JeOQU5",
        "entity": "payment",
        "amount": 200,
        "currency": "INR",
        "status": "captured",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "upi",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": true,
        "description": "QRv2 Payment",
        "card_id": null,
        "bank": null,
        "wallet": null,
        "vpa": "gauri.kumar@okhdfcbank",
        "email": "gauri.kumari@example.com",
        "contact": "+919000090000",
        "customer_id": "cust_HKsR5se84c5LTO",
        "notes": {
          "Branch": "Bangalore - Rajaji Nagar"
        },
        "fee": 0,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "rrn": "116812981837"
        },
        "created_at": 1623914419
      }
    },
    "qr_code": {
      "entity": {
        "id": "qr_HO2e0813YlchUn",
        "entity": "qr_code",
        "created_at": 1623914349,
        "name": "Acme Groceries",
        "usage": "multiple_use",
        "type": "upi_qr",
        "image_url": "https://rzp.io/i/X6QM7LL",
        "payment_amount": null,
        "status": "active",
        "description": "Buy fresh groceries",
        "fixed_amount": false,
        "payments_amount_received": 0,
        "payments_count_received": 0,
        "notes": {
          "Branch": "Bangalore - Rajaji Nagar"
        },
        "customer_id": "cust_HKsR5se84c5LTO",
        "close_by": 1625077799,
        "closed_at": null,
        "close_reason": null,
        "tax_invoice": {
          "number": "INV001",
          "date": 1589994898,
          "customer_name": "Gauri Kumar",
          "business_gstin": "06AABCU9605R1ZR",
          "gst_amount": 4000,
          "cess_amount": 0,
          "supply_type": "interstate"
        }
      }
    }
  },
  "created_at": 1623914419
}
```

### QR Code Closed

> **WARN**
>
> 
> **Watch Out!**
> 
> The webhook is activated only when the QR Code is closed manually. It is not triggered when the QR Code auto-expires.
> 

```json: qr_code.closed
{
  "entity": "event",
  "account_id": "acc_CJoeHMNpi0nC7k",
  "event": "qr_code.closed",
  "contains": [
    "qr_code"
  ],
  "payload": {
    "qr_code": {
      "entity": {
        "id": "qr_HO2e0813YlchUn",
        "entity": "qr_code",
        "created_at": 1623914349,
        "name": "Acme Groceries",
        "usage": "multiple_use",
        "type": "upi_qr",
        "image_url": "https://rzp.io/i/X6QM7LL",
        "payment_amount": null,
        "status": "closed",
        "description": "Buy fresh groceries",
        "fixed_amount": false,
        "payments_amount_received": 200,
        "payments_count_received": 1,
        "notes": {
          "Branch": "Bangalore - Rajaji Nagar"
        },
        "customer_id": "cust_HKsR5se84c5LTO",
        "close_by": 1625077799,
        "closed_at": 1623914515,
        "close_reason": "on_demand"
      }
    }
  },
  "created_at": 1623914515
}
```json: qr_code.closed (GST)
{
  "entity": "event",
  "account_id": "acc_CJoeHMNpi0nC7k",
  "event": "qr_code.closed",
  "contains": [
    "qr_code"
  ],
  "payload": {
    "qr_code": {
      "entity": {
        "id": "qr_HO2e0813YlchUn",
        "entity": "qr_code",
        "created_at": 1623914349,
        "name": "Acme Groceries",
        "usage": "multiple_use",
        "type": "upi_qr",
        "image_url": "https://rzp.io/i/X6QM7LL",
        "payment_amount": null,
        "status": "closed",
        "description": "Buy fresh groceries",
        "fixed_amount": false,
        "payments_amount_received": 200,
        "payments_count_received": 1,
        "notes": {
          "Branch": "Bangalore - Rajaji Nagar"
        },
        "customer_id": "cust_HKsR5se84c5LTO",
        "close_by": 1625077799,
        "closed_at": 1623914515,
        "close_reason": "on_demand",
        "tax_invoice": {
          "number": "INV001",
          "date": 1589994898,
          "customer_name": "Gaurav Kumar",
          "business_gstin": "06AABCU9605R1ZR",
          "gst_amount": 4000,
          "cess_amount": 0,
          "supply_type": "interstate"
        }
      }
    }
  },
  "created_at": 1623914515
}
```
