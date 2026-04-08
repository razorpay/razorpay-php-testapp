---
title: Integrate Tally with RazorpayX | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Tally integration with RazorpayX.
---

# Frequently Asked Questions (FAQs)

### 1. How are bills and payments synced to Tally?

         Bills or invoices you upload on RazorpayX can be synced to Tally as purchase vouchers. Similarly, any bill payments or advances made on RazorpayX are synced to Tally as payment voucher.
        

    
### 2. Are bill payments and advances automatically reconciled against the respective bills?

         Yes, when we sync the advances or bill payments to Tally, we also update the reference of the bill against which the advance or payment is made. For example, you make an advance of ₹5,000 to a vendor. You can sync that to Tally and a payment voucher of ₹5,000 is created against that vendor. Later when a bill comes in and an advance is attached to the bill, the purchase voucher is created and the earlier synced payment voucher is automatically linked to this new purchase voucher.
        

    
### 3. Can I import bills from Tally to RazorpayX?

         No, on Source to Pay with Tally you can upload bills on RazorpayX and they are synced to Tally, the vice-versa is not possible.
        

    
### 4. What information is synced along with the bill in Tally?

         The purchase voucher is created with the right vendor ledger, items, purchase/expense account and GST & TDS details. In the narration we share the description added in RazorpayX along with an audit link, which includes the entire RazorpayX audit log of the bill.
        

    
### 5. Can I import vendors and items created in Tally to RazorpayX?

         You can import Vendors and Items from Tally once, during the integration.
        

    
### 6. If I create a new vendor/item in Tally, how can I import that to RazorpayX post integration?

         You cannot import vendors or items from Tally to RazorpayX post integration. You can create new vendor/item on RazorpayX and map it to the new one is Tally.
        

    
### 7. How can I ensure that the right ledgers are debited and credited in Tally?

         During the Tally integration, you can map your RazorpayX entities to Tally ledgers to ensure accurate book-keeping. Your RazorpayX bank accounts are mapped to the bank ledgers, GST components are mapped to the GST ledgers and TDS components to the TDS ledgers. You can also choose your Tally purchase/expense ledgers while creating a bill in RazorpayX.
        

    
### 8. How can I ensure duplicate vendors or items are not created in Tally?

         Whenever a new vendor/item is created in RazorpayX you can choose to map it to an existing vendor or item in Tally or create a new one from RazorpayX itself. 
        

    
### 9. I don’t want to sync some bills to Tally, is that possible?

         You can choose which bills you want to sync. This control can also be given to specific people in your team. You can exclude the bills that you do not want to sync to Tally.
        

    
### 10. Are items synced to Tally and is inventory updated?

         Yes, you can choose to sync bills as an item voucher in which case the inventory is updated in Tally with the right quantity, rate, GST slab and purchase account.
        

    
### 11. I don’t maintain inventory in Tally, can I still use the integration?

         Yes, you can choose to sync bills as accounting voucher type, in which case the purchase/expense ledgers is updated and inventory is not affected. 
        

    
### 12. How is the Tally plugin installed?

         Share your Tally license number with us and we enable the plugin for you, via cloud. Post that, you can enable the plugin in the company settings. Enter your RazorpayX merchant ID and your RazorpayX registered email. An OTP is sent to the email once a week to secure the connection.
        

    
### 13. I have multiple companies in Tally, how will the integration work with it?

         One RazorpayX account can be integrated with one Tally company only. You can opt for a Sub-Account setup in RazorpayX where each sub account can be integrated with a Tally company.
        

    
### 14. I have state wise GST ledgers, is that supported with the integration?

         Yes, you can map all the state wise GST ledgers, these ledgers will be updated based on the GSTIN you choose while creating a bill. 
        

    
### 15. Are the bills synced in real time?

         Yes, click **RazorpayX Sync** Tally on post integration to sync bills and payments data RazorpayX and Tally. You can also schedule the sync between RazorpayX and Tally everyday on a particular time. 
        

    
### 16. How are failures or edge cases handled?

         Any bills or payments which fail to sync, are shown in a separate section along with the failure reason. You can retry syncing or exclude them and account for them manually.
        

    
### 17. Are updates to bills synced to Tally?

         Payment updates are synced to Tally, however details like vendor change, item change are not automatically updated in Tally once the bill is synced. However, you can choose to sync the bill only once all the details are finalised.
