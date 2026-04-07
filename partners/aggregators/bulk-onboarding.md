---
title: Bulk Submerchant Upload
description: Create sub-merchants (Razorpay Partnership) in bulk using the upload feature successfully. You can format data and avoid failures using this checklist.
---

# Bulk Submerchant Upload

With our Bulk Submerchant Upload feature, sub-merchants can be created with all details by uploading a CSV file. It is essential to provide the sub-merchant data in the correct format to upload the CSV file successfully.

You will need to download a Text Editor - [Sublime Text](https://www.sublimetext.com/), to identify and fix any formatting issues in the CSV file.

## CSV File Format

The table provides the data format to be followed for each sub-merchant:

Attribute | Description
---
reference1 |
---
merchant_name | Merchant Name. Example: Acme Corp
---
merchant_email | Merchant Email. Example: gaurav.kumar@example.com
---
contact_name | Contact Name. Example: Acme Corp Pvt Ltd
---
contact_email | Contact email. Example: gaurav.kumar@example.com
---
transaction_report_email | Email for Transaction Reports. Example: support@acmecorp.com
---
contact_mobile | Contact phone number. Example: 9000090000
---
organization_type | Choose **Business Type** from the list in Appendix. For example: `3`.
---
business_name | Business Name. Example: Crowdera
---
billing_label | Billing Label. Example: Crowdera Ventures Private Limited
---
international | International Payments. Following are the options:
- `1` - Enabled
- `0` - Disabled.
---
payments_for | Payments For. Example: Non-Profit Organisation
---
business_model | Choose **Business Model** from amongst the 3 values - 'B2B', 'B2C' or 'B2B+B2C'. This field is optional if `business_category` is `others`.
---
business_category | Choose **Business Category** from the list in Appendix. Example: not_for_profit
---
business_sub_category | Choose **Business Sub Category** from the list in Appendix. Example: charity
---
registered_address | Registered Address Details. Example: 78 Cuddalore Road Vriddhachalam Cuddalore District
---
registered_city | City. Example: Vriddhachalam
---
registered_state | State. Example: Tamil Nadu
---
registered_pincode | Postal Code. Example: 606001
---
operational_address | Operational Address Details. Example: 78 Cuddalore Road Vriddhachalam Cuddalore District
---
operational_city | City. Example: Vriddhachalam
---
operational_state | State. Example: Tamil Nadu
---
operational_pincode | Postal Code. Example: 606001
---
doe | Business date of Establishment. This is an optional field. Example: 2005-10-23
---
gstin | GST Number. This is an optional field. Example: 12AAAAA0000A1Z5
---
promoter_pan | PAN Number of Promoter. Example: ADIPI5352E
---
promoter_pan_name | PAN Name of Promoter. Example: Saurav Kumar
---
website | Business Website. Example: https://acmecorp.com
---
bank_account_name | Bank Account Name. Example: Acme
---
bank_branch_ifsc | IFSC Code of Bank. Example: KVBL0001210
---
bank_account_number | Bank Account Number. Example: 12101245623456
---
company_cin | Corporate Identity Number or Limited Liability Partnership Identification Number (LLPIN). CIN required if `organization_type` is not Public, Private or LLP. Example: U12345DL2020PLC098765
---
company_pan | PAN Number of the Business. For `proprietorship` business type, this is an optional field. Example: AARCA5484G

---
company_pan_name | PAN Name of Business. Example: Acme

## Bulk Submerchant Onboard Data Checklist

Use this checklist and avoid data format issues to upload the CSV file successfully:

- Each row of the CSV file must contain one sub-merchant record.
- All email fields must have unique entries. This is applicable even if partner email is used.
- Correct header row must be present in the CSV file.
- Date should be in YYYY-MM-DD format.
- Use lower case wherever applicable. As the business category and sub-category are case-sensitive, use given values' list. For example, the value for the business category should be 'others' and not 'Others'.
- Do not use commas anywhere in the data.
- Business category `others` must have no entry for Business sub_category.
- All the Promoter PAN numbers must have P as the fourth letter and the Company PAN numbers must have either of these letters - C,H,F,A,T,B,L,J,G.
- Remove any additional comments from the file before uploading.
- Numeric fields must not be truncated or expressed in the exponential format (Pincode, Bank Account Number, and more).

## Formatting Errors

Ensure that there are no formatting errors present on the CSV file. To check the file for these errors, open the file using the [Sublime Text Editor](https://www.sublimetext.com/). Given below is the checklist you must run through:

- Check whether each line contains one record and no record is split across two lines
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     You must disable the Word Wrap under View → Word Wrap to view one record in one line.
>     

- Check for unrequired new line character inside a record.
- Remove blank rows.
- Remove the rows with invalid or unrequired data.
- Remove any default data apart from the merchant data.

## Appendix

Please refer the following table for **Business Type** and **Business Category** values:

Attribute | Values
---
Business Type | 1 = `proprietorship`;
2 = `individual`;
3 = `partnership`;?
4 = `private_limited`;
5 = `public_limited`;
6 = `llp`;
7 = `ngo`;
8 = `educational_institutes`;
9 = `trust`;
10 = `society`;
11 = `not_yet_registered`;
12 = `other`
---
Business Category | `financial_services`; `education`; `healthcare`; `utilities`; `government`; `logistics`; `tours_and_travel`; `transport`; `ecommerce`; `food`; `it_and_software`; `gaming`; `media_and_entertainment`; `services`; `housing`; `not_for_profit`; `social`; `others`

Please refer the following table for **Business Sub Category** values:

Attribute | Values
---
FINANCIAL_SERVICES | mutual_fund, lending, cryptocurrency, insurance, nbfc, cooperatives, pension_fund, forex, securities, commodities, accounting, financial_advisor, crowdfunding, trading, betting, get_rich_schemes, moneysend_funding, wire_transfers_and_money_orders, tax_preparation_services, tax_payments, digital_goods, atms
---
EDUCATION | college, schools, university, professional_courses, distance_learning, day_care, coaching, elearning, vocational_and_trade_schools, sporting_clubs, dance_halls_studios_and_schools, correspondence_schools,
---
HEALTHCARE | pharmacy, clinic, hospital, lab, dietician, fitness, health_coaching, health_products, drug_stores, healthcare_marketplace, osteopaths, medical_equipment_and_supply_stores, podiatrists_and_chiropodists, dentists_and_orthodontists, hardware_stores, ophthalmologists, orthopedic_goods_stores, testing_laboratories, doctors, health_practitioners_medical_services, testing_laboratories
---
ECOMMERCE | ecommerce_marketplace, agriculture, books, electronics_and_furniture, coupons, rental, fashion_and_lifestyle, gifting, grocery, baby_products, office_supplies, wholesale, religious_products, pet_products, sports_products, arts_and_collectibles, sexual_wellness_products, drop_shipping, crypto_machinery, tobacco, weapons_and_ammunitions, stamps_and_coins_stores, office_equipment, automobile_parts_and_equipements, garden_supply_stores, household_appliance_stores, non_durable_goods, pawn_shops, electrical_parts_and_equipment, wig_and_toupee_shops, gift_novelty_and_souvenir_shops, duty_free_stores, office_and_commercial_furniture, dry_goods, books_and_publications, camera_and_photographic_stores, record_shops, meat_supply_stores, leather_goods_and_luggage, snowmobile_dealers, men_and_boys_clothing_stores, paint_supply_stores, automotive_parts, jewellery_and_watch_stores, auto_store_home_supply_stores, tent_stores, shoe_stores_retail,petroleum_and_petroleum_products, department_stores, automotive_tire_stores, sport_apparel_stores, variety_stores, chemicals_and_allied_products, commercial_equipments,fireplace_parts_and_accessories, family_clothing_stores, fabric_and_sewing_stores, home_supply_warehouse, art_supply_stores, camper_recreational_and_utility_trailer_dealers, clocks_and_silverware_stores, discount_stores,school_supplies_and_stationery, second_hand_stores, watch_and_jewellery_repair_stores, liquor_stores, boat_dealers, opticians_optical_goods_and_eyeglasse_stores, wholesale_footwear_stores, cosmetic_stores, home_furnishing_stores, antique_stores, plumbing_and_heating_equipment, telecommunication_equipment_stores, women_clothing, florists, computer_software_stores, building_matrial_stores, candy_nut_confectionery_shops, glass_and_wallpaper_stores,commercial_photography_and_graphic_design_services, video_game_supply_stores, fuel_dealers,drapery_and_window_coverings_stores, hearing_aids_stores, automotive_paint_shops, durable_goods_stores,uniforms_and_commercial_clothing_stores, fur_shops, industrial_supplies, bicycle_stores, second_hand_stores,
motorcycle_shops_and_dealers, children_and_infants_wear_stores, women_accessory_stores, construction_materials,
books_periodicals_and_newspaper, floor_covering_stores, crystal_and_glassware_stores, accessory_and_apparel_stores,hardware_equipment_and_supply_stores, computers_peripheral_equipment_software, automobile_and_truck_dealers, aircraft_and_farm_equipment_dealers, antique_shops_sales_and_repairs, hearing_aids_stores, music_stores, furniture_and_home_furnishing_store
---
SERVICES | repair_and_cleaning, interior_design_and_architect, movers_and_packers, legal, event_planning, service_centre, consulting, ad_and_marketing, services_classifieds, multi_level_marketing, construction_services, architectural_services, car_washes, motor_home_rentals, stenographic_and_secretarial_support_services, chiropractors, automotive_service_shops, shoe_repair_shops, telecommunication_service, fines, security_agencies, tailors,type_setting_and_engraving_services, small_appliance_repair_shops, photography_labs, dry_cleaners, massage_parlors,electronic_repair_shops, cleaning_and_sanitation_services, nursing_care_facilities, direct_marketing, lottery,veterinary_services, affliated_auto_rental, alimony_and_child_support, airport_flying_fields, golf_courses, tire_retreading_and_repair_shops, television_cable_services, recreational_and_sporting_camps, barber_and_beauty_shops, agricultural_cooperatives, carpentry_contractors, wrecking_and_salvaging_services, automobile_towing_services, video_tape_rental_stores, miscellaneous_repair_shops, motor_homes_and_parts, horse_or_dog_racing, laundry_services,electrical_contractors, debt_marriage_personal_counseling_service, air_conditioning_and_refrigeration_repair_shops, credit_reporting_agencies, heating_and_plumbing_contractors, carpet_and_upholstery_cleaning_services, swimming_pools, roofing_and_metal_work_contractors, internet_service_providers, recreational_camps, masonry_contractors,
exterminating_and_disinfecting_services, ambulance_services, funeral_services_and_crematories, metal_service_centres,
copying_and_blueprinting_services, fuel_dispensers, welding_repair, mobile_home_dealers, concrete_work_contractors,
boat_rentals, personal_shoppers_and_shopping_clubs, door_to_door_sales, travel_related_direct_marketing, lottery_and_betting, bands_orchestras_and_miscellaneous_entertainers, furniture_repair_and_refinishing, contractors,
direct_marketing_and_subscription_merchants, typewriter_stores_sales_service_and_rentals, recreation_services, direct_marketing_insurance_services, business_services, inbound_telemarketing_merchants, public_warehousing, outbound_telemarketing_merchants, clothing_rental_stores, transportation_services, electric_razor_stores, service_stations, photographic_studio, professional_services
---
HOUSING | developer, facility_management, rwa, coworking, realestate_classifieds, space_rental,
---
NOT_FOR_PROFIT | charity, educational, religious, personal
---
SOCIAL | matchmaking, social_network, messaging, professional_network, neighbourhood_network, political_organizations, automobile_associations_and_clubs, country_and_athletic_clubs, associations_and_membership,
---
MEDIA_AND_ENTERTAINMENT | video_on_demand, music_streaming, multiplex, content_and_publishing, ticketing, news, video_game_arcades, video_tape_production_and_distribution, bowling_alleys, billiard_and_pool_establishments, amusement_parks_and_circuses, ticket_agencies
---
GAMING | game_developer, esports, online_casino, fantasy_sports, gaming_marketplace
---
IT_AND_SOFTWARE | saas, paas, iaas, consulting_and_outsourcing, web_development, technical_support, data_processing
---
FOOD | online_food_ordering, restaurant, food_court, catering, alcohol, restaurant_search_and_booking, dairy_products, bakeries
---
UTILITIES | electricity, gas, telecom, water, cable, broadband, dth, internet_provider, bill_and_recharge_aggregators
---
GOVERNMENT | central, state, intra_government_purchases, goverment_postal_services,
---
LOGISTICS | freight, courier, warehousing, distribution, end_to_end_logistics, courier_services
---
TOURS_AND_TRAVEL | aviation, accommodation, ota, travel_agency, tourist_attractions_and_exhibits, timeshares, aquariums_dolphinariums_and_seaquariums
---
TRANSPORT | cab_hailing, bus, train_and_metro, automobile_rentals, cruise_lines, parking_lots_and_garages, transportation, bridge_and_road_tolls, freight_transport, truck_and_utility_trailer_rentals
