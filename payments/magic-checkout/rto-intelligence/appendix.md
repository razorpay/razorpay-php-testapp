---
title: Appendix | Magic Checkout - RTO Intelligence
heading: Appendix
description: Additional information required to use RTO Intelligence.
---

# Appendix

Following is supplementary information required to use RTO Intelligence.

### Reasons for Risky Orders

Given below is the list of possible reasons for risky orders.

Key to be exposed via API | Detailed copy | Internal short key
---
rto_prone_phone | High RTOs detected by phone number | high_phone_rto_merchant
---
rto_prone_email | High RTOs detected by email | high_email_rto_merchant
---
rto_prone_ip | High RTOs detected by IP address | high_ip_rto_merchant
---
rto_prone_device | High RTOs detected by device | high_device_rto_merchant
---
rto_prone_phone | High RTOs detected by phone number | high_phone_rto_global
---
rto_prone_email | High RTOs detected by email | high_email_rto_global
---
rto_prone_ip | High RTOs detected by IP address | high_ip_rto_global
---
rto_prone_device | High RTOs detected by device | high_device_rto_global
---
rto_prone_pincode | High RTOs detected by pincode | high_zipcode_rto_merchant
---
rto_prone_pincode | High RTOs detected by pincode | high_zipcode_rto_global
---
short_shipping_address | Short shipping address | short_shipping _address
---
gibberish_detected_in_address | Gibberish detected in address | address_monkey_typed
---
invalid_email_domain | Invalid email domain | email_temp_domain
---
incomplete_pincode | Incomplete pincode | short_zipcode
---
dummy_address_detected | Dummy address detected | test_in_address
---
dummy_name_detected | Dummy name detected | test_in_name
---
invalid_email_address | Invalid email address | invalid_email
---
gibberish_detected_in_email | Gibberish detected in email | monkey_typed_email
---
invalid_phone | Invalid phone number | invalid_phone
---
invalid_pincode | Invalid pincode | invalid_zipcode
---
address_pincode_state_mismatch | Incorrect pincode state entered | zipcode_address_state_mismatch
---
incomplete_shipping_address | Incomplete shipping address | incomplete_shipping_address
---
customer_phone_blocklisted | Customer phone blocklisted by merchant | phone_blocklisted
---
customer_ip_blocklisted | IP blocklisted by merchant | ip_blocklisted
---
customer_pincode_blocklisted | Customer pincode blocklisted by merchant | zipcode_blocklisted
---
customer_email_blocklisted | Customer email blocklisted by merchant | email_blocklisted
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_hasdigits
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_countdigits
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_lengthtodigitsratio
---
address_line_2_missing | Address Line 2 missing | addressstaticfeatures_hassecondfield
---
address_contains_invalid_characters | Address contains too many symbols | addressstaticfeatures_countsymbols
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_countwords
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_countcommas
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_hashousefield
---
address_building_name_absent | Address does not contain building name | addressstaticfeatures_hasbuildingfield
---
address_locality_name_absent | Address does not contain locality name | addressstaticfeatures_haslocalityfield
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_isdigitinshipaddress
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_counttokens
---
address_incorrect_pincode | Incorrect pincode entered | addressstaticfeatures_iszipcodenotgood
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_isunitnumericinsociety
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_isinformative
---
address_pincode_city_mismatch | Incorrect pincode city entered | addressstaticfeatures_iscorrect
---
rto_prone_area | Order placed for high RTO area | citystaticfeatures_citytier
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_iscomplete
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_maxwordratio
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_maxwordsuccess
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_maxseqbiwordcount
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_maxseqbiwordratio
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_maxbiwordcount
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_maxbiwordratio
---
address_is_less_detailed | Address is less detailed | addressstaticfeatures_mergescore
---
short_email | Email is too short | emailstaticfeatures_length
---
potential_fraud_email | Email has too many digits | emailstaticfeatures_countdigits
---
order_placed_during_high_rto_period | Order placed during start/end of the month | generic_dayofmonth
---
cod_prone_email | High COD orders from this email | emailmerchantfeatures_countcodorders
---
cod_prone_email | Few prepaid orders from this email | emailmerchantfeatures_countprepaidorders
---
cod_prone_email | Few prepaid orders from this email | emailglobalfeatures_countprepaidorders
---
cod_prone_email | High COD orders from this email | emailglobalfeatures_countcodorders
---
rto_prone_email | High RTOs from this email | emailglobalfeatures_rtopercent
---
cod_prone_phone | High COD orders from this phone | phoneglobalfeatures_countcodorders
---
rto_prone_phone | High RTO orders from this phone | phoneglobalfeatures_rtopercent
---
rto_prone_phone | Less delivered orders from this phone | phoneglobalfeatures_deliveredpercent
---
cod_prone_device | High COD orders from this device | deviceidglobalfeatures_countcodorders
---
rto_prone_device | Less delivered orders from this device | deviceidglobalfeatures_deliveredpercent
---
rto_prone_pincode | High RTOs from this pincode | zipcodeglobalfeatures_rtopercent
---
rto_prone_pincode | Less delivered orders from this pincode | zipcodeglobalfeatures_deliveredpercent
---
return_prone_pincode | High return orders from this pincode | zipcodeglobalfeatures_returnpercent
---
rto_prone_pincode | Less delivered orders from this pincode | zipcodemerchantfeatures_deliveredpercent
---
rto_prone_pincode | High RTOs from this pincode | zipcodemerchantfeatures_rtopercent
---
rto_prone_pincode | High RTOs from this pincode | zipcodeglobalfeatures_countrtoitems
---
return_prone_pincode | High return orders from this pincode | zipcodeglobalfeatures_countreturnitems
---
rto_prone_pincode | Less delivered orders from this pincode | zipcodemerchantfeatures_countdelivereditems
---
rto_prone_pincode | High RTOs from this pincode | zipcodemerchantfeatures_countrtoitems
---
cod_prone_pincode | Less prepaid orders from this pincode | zipcodeglobalfeatures_countprepaidorders
---
cod_prone_pincode | High COD orders from this pincode | zipcodeglobalfeatures_countcodorders
---
cod_prone_city | Less delivered orders from this city | citymerchantfeatures_deliveredpercent
---
rto_prone_city | High RTOs from this city | citymerchantfeatures_rtopercent
---
rto_prone_city | High RTOs from this city | cityglobalfeatures_countrtoitems
---
rto_prone_city | High return orders from this city | cityglobalfeatures_countreturnitems
---
rto_prone_city | Less delivered orders from this city | citymerchantfeatures_countdelivereditems
---
rto_prone_city | High RTOs from this city | citymerchantfeatures_countrtoitems
---
cod_prone_city | High COD orders from this city | cityglobalfeatures_countcodorders
---
rto_prone_city | High RTOs from this city | cityglobalfeatures_rtopercent
---
rto_prone_city | Less delivered orders from this city | cityglobalfeatures_deliveredpercent
---
returns_prone_city | High return orders from this city | cityglobalfeatures_returnpercent
---
returns_prone_state | High return orders from this state | statemerchantfeatures_countreturnitems
---
high_purchase_amount_in_an_hour | High purchase amount in one hour | emailmerchantfeatures_sumpurchaseamountinonehour
---
high_purchase_amount_in_a_day | High purchase amount in one day | emailmerchantfeatures_sumpurchaseamountinoneday
---
new_customer_on_your_store | First time customer on your store | generic_createaccounttimebucket
---
high_purchase_amount_in_a_day | High purchase amount in one day | phonemerchantfeatures_sumpurchaseamountinoneday
