---
title: Integrate With Route
description: Step-by-step guide on how to integrate Razorpay Route.
---

# Integrate With Route

Razorpay Route can split payments between third parties, sellers or bank accounts.

## Prerequisites

- Create a Razorpay account.

- Log in to the Dashboard and [generate the API keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md). You need to use these keys while using our APIs and Checkout.

## Integration Steps

Follow these steps to integrate Razorpay Route:

  - **1. Build Integration**: Integrate Route.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

## 1. Build Integration

Follow these steps to create Linked Accounts and transfer funds to them.

    
### Step 1.1 Create Linked Accounts

         To transfer funds to various third parties, sellers, bank accounts or vendors, you should add them as Linked Accounts. When you add a Linked Account, you gain complete visibility and control of all the fund movements, such as transfers, reversals and refunds for each of your Linked Accounts.

         You can create Linked Accounts using [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/linked-account#add-and-manage-linked-accounts.md) and APIs. Follow these steps to create Linked Accounts using APIs:

         
          
            1.1.1 Create a Linked Account
            
             [Create a Linked Account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/create-linked-account.md) using the API. A unique `account_id` will be assigned to the created account.
            

          
### 1.1.2. Create a Stakeholder

             You should now [create a stakeholder](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/create-stakeholder.md) using the `account_id`. A unique `stakeholder_id` will be assigned to the created stakeholder account.
            

          
### 1.1.3. Request a Product Configuration

             Now that both Linked Account and stakeholder are created, you should [request a Route product configuration](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/request-product-config.md).
            

          
### 1.1.4. Update a Product Configuration

             You should now trigger the [update product configuration](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/update-product-config.md) API with the bank account details of the Linked Account. The configuration will be activated if the information review is successful.

             If the `activation_status` moves to the `needs_clarification` state, you can check the `requirements` array in the response for `needs_clarification` reasons. The array will contain the following information:

             
             Requirements | Description
             ---
             `field_reference` | The field reference which has an issue.
             ---
             `resolution_url` | The URL to address the requirement. You should use the API endpoint to update the missing field.
             ---
             `reason_code` | The reason code for showing in the requirement.
             ---
             `status` | The status of the requirement.
             

             You should use the endpoint in the `resolution_url` to update the details and get the configuration activated.
            

         
        
    

    
### Step 1.2 Transfer Funds to Linked Accounts

         After you create Linked Accounts, you can start transferring funds to them. You can transfer funds using the following methods:
         - [Orders](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/transfer-funds-to-linked-accounts/#transfer-via-orders.md): You can set up transfers at the time of order creation. The transfer is automatically created and settled to the respective Linked Accounts after the payment is captured and the order is paid.
         - [Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/transfer-funds-to-linked-accounts/#transfers-via-payments.md): You can initiate a transfer from the received payments.
         - [Direct Transfer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/transfer-funds-to-linked-accounts/#direct-transfers.md): You can transfer funds to Linked Accounts directly from your account balance using Direct Transfers.
       
         
> **INFO**
>
> 
>          **Requirements to Initiate a Transfer**
>        
>          - Maintain sufficient funds to successfully process the transfer to the Linked Account.
>          - You can only transfer the `captured` payments.
>          - You can create more than one transfer on a `payment_id`. However, the total transfer amount (payment amount + fee) should not exceed the captured payment amount.
>          - You cannot request a transfer on payment once a refund has been initiated.
>          

       
        

## 2. Test Integration

After completing the integration, you can simulate a test transfer in the test mode using the [Transfer via Payment](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/transfer-funds-to-linked-accounts/#transfers-via-payments.md) or [Direct Transfer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/transfer-funds-to-linked-accounts/#direct-transfers.md) methods from the Dashboard.

> **WARN**
>
> 
> **Watch Out!**
> 
> Transfers via orders can only be done using [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/create-transfers-orders.md).
> 

## 3. Go-live Checklist

Consider the following steps before taking your integration live.

    
### 3.1 Switch Test API Keys With Live API Keys

         - After confirming your integration is working successfully, you can take the integration live by switching the Test Mode API Keys with the Live Mode Keys.

            Watch this video to learn how to generate Live API keys:

            
[Video: https://www.youtube.com/embed/30REpNtYSak?si=j9Lm_y-D4bwTspv6]

         - You can create live Transfers to Linked Accounts created in the Test Mode.  
        

    
### 3.2 Subscribe to Webhooks

     [Set up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md) to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. You can subscribe to these [Route webhook events](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/route/#route.md).
    

## Appendix

This section provides information about business type, category, sub-category, KYC requirements and their possible values.

  
### Business Type

     The following table lists the supported Business Types:

     
     Values
     ---
     - `llp`
 - `ngo`
 - `other`
 - `individual`
 - `partnership`
 - `proprietorship`
 - `public_limited`
 - `private_limited`
 - `trust`, `society`
 - `not_yet_registered`
 - `educational_institutes`

    
    

  
### Business Category

     The following table lists the possible values for Business Category:

     
     Values
     ---
     `financial_services`; `education`; `healthcare`; `utilities`; `government`; `logistics`; `tours_and_travel`; `transport`; `ecommerce`; `food`; `it_and_software`; `gaming`; `media_and_entertainment`; `services`; `housing`; `not_for_profit`; `social`; `others`
     
    

  
### Business Sub-Category

     The following table lists the possible values for Business Sub-Category:

     
     Attribute | Values
     ---
     FINANCIAL_SERVICES | mutual_fund, lending, cryptocurrency, insurance, nbfc, cooperatives, pension_fund, forex, securities, commodities, accounting, financial_advisor, crowdfunding, trading, betting, get_rich_schemes, moneysend_funding, wire_transfers_and_money_orders, tax_preparation_services, tax_payments, digital_goods, atms
     ---
     EDUCATION | college, schools, university, professional_courses, distance_learning, day_care, coaching, elearning, vocational_and_trade_schools, sporting_clubs, dance_halls_studios_and_schools, correspondence_schools
     ---
     HEALTHCARE | pharmacy, clinic, hospital, lab, dietician, fitness, health_coaching, health_products, drug_stores, healthcare_marketplace, osteopaths, medical_equipment_and_supply_stores, podiatrists_and_chiropodists, dentists_and_orthodontists, hardware_stores, ophthalmologists, orthopedic_goods_stores, testing_laboratories, doctors, health_practitioners_medical_services, testing_laboratories
     ---
     ECOMMERCE | ecommerce_marketplace, agriculture, books, electronics_and_furniture, coupons, rental, fashion_and_lifestyle, gifting, grocery, baby_products, office_supplies, wholesale, religious_products, pet_products, sports_products, arts_and_collectibles, sexual_wellness_products, drop_shipping, crypto_machinery, tobacco, weapons_and_ammunitions, stamps_and_coins_stores, office_equipment, automobile_parts_and_equipements, garden_supply_stores, household_appliance_stores, non_durable_goods, pawn_shops, electrical_parts_and_equipment, wig_and_toupee_shops, gift_novelty_and_souvenir_shops, duty_free_stores, office_and_commercial_furniture, dry_goods, books_and_publications, camera_and_photographic_stores, record_shops, meat_supply_stores, leather_goods_and_luggage, snowmobile_dealers, men_and_boys_clothing_stores, paint_supply_stores, automotive_parts, jewellery_and_watch_stores, auto_store_home_supply_stores, tent_stores, shoe_stores_retail,petroleum_and_petroleum_products, department_stores, automotive_tire_stores, sport_apparel_stores, variety_stores, chemicals_and_allied_products, commercial_equipments,fireplace_parts_and_accessories, family_clothing_stores, fabric_and_sewing_stores, home_supply_warehouse, art_supply_stores, camper_recreational_and_utility_trailer_dealers, clocks_and_silverware_stores, discount_stores,school_supplies_and_stationery, second_hand_stores, watch_and_jewellery_repair_stores, liquor_stores, boat_dealers, opticians_optical_goods_and_eyeglasse_stores, wholesale_footwear_stores, cosmetic_stores, home_furnishing_stores, antique_stores, plumbing_and_heating_equipment, telecommunication_equipment_stores, women_clothing, florists, computer_software_stores, building_matrial_stores, candy_nut_confectionery_shops, glass_and_wallpaper_stores,commercial_photography_and_graphic_design_services, video_game_supply_stores, fuel_dealers,drapery_and_window_coverings_stores, hearing_aids_stores, automotive_paint_shops, durable_goods_stores,uniforms_and_commercial_clothing_stores, fur_shops, industrial_supplies, bicycle_stores, second_hand_stores, motorcycle_shops_and_dealers, children_and_infants_wear_stores, women_accessory_stores, construction_materials, books_periodicals_and_newspaper, floor_covering_stores, crystal_and_glassware_stores, accessory_and_apparel_stores,hardware_equipment_and_supply_stores, computers_peripheral_equipment_software, automobile_and_truck_dealers, aircraft_and_farm_equipment_dealers, antique_shops_sales_and_repairs, hearing_aids_stores, music_stores, furniture_and_home_furnishing_store
     ---
     SERVICES | repair_and_cleaning, interior_design_and_architect, movers_and_packers, legal, event_planning, service_centre, consulting, ad_and_marketing, services_classifieds, multi_level_marketing, construction_services, architectural_services, car_washes, motor_home_rentals, stenographic_and_secretarial_support_services, chiropractors, automotive_service_shops, shoe_repair_shops, telecommunication_service, fines, security_agencies, tailors,type_setting_and_engraving_services, small_appliance_repair_shops, photography_labs, dry_cleaners, massage_parlors,electronic_repair_shops, cleaning_and_sanitation_services, nursing_care_facilities, direct_marketing, lottery,veterinary_services, affliated_auto_rental, alimony_and_child_support, airport_flying_fields, golf_courses, tire_retreading_and_repair_shops, television_cable_services, recreational_and_sporting_camps, barber_and_beauty_shops, agricultural_cooperatives, carpentry_contractors, wrecking_and_salvaging_services, automobile_towing_services, video_tape_rental_stores, miscellaneous_repair_shops, motor_homes_and_parts, horse_or_dog_racing, laundry_services,electrical_contractors, debt_marriage_personal_counseling_service, air_conditioning_and_refrigeration_repair_shops, credit_reporting_agencies, heating_and_plumbing_contractors, carpet_and_upholstery_cleaning_services, swimming_pools, roofing_and_metal_work_contractors, internet_service_providers, recreational_camps, masonry_contractors, exterminating_and_disinfecting_services, ambulance_services, funeral_services_and_crematories, metal_service_centres, copying_and_blueprinting_services, fuel_dispensers, welding_repair, mobile_home_dealers, concrete_work_contractors, boat_rentals, personal_shoppers_and_shopping_clubs, door_to_door_sales, travel_related_direct_marketing, lottery_and_betting, bands_orchestras_and_miscellaneous_entertainers, furniture_repair_and_refinishing, contractors, direct_marketing_and_subscription_merchants, typewriter_stores_sales_service_and_rentals, recreation_services, direct_marketing_insurance_services, business_services, inbound_telemarketing_merchants, public_warehousing, outbound_telemarketing_merchants, clothing_rental_stores, transportation_services, electric_razor_stores, service_stations, photographic_studio, professional_services
     ---
     HOUSING | developer, facility_management, rwa, coworking, realestate_classifieds, space_rental
     ---
     NOT_FOR_PROFIT | charity, educational, religious, personal
     ---
     SOCIAL | matchmaking, social_network, messaging, professional_network, neighbourhood_network, political_organizations, automobile_associations_and_clubs, country_and_athletic_clubs, associations_and_membership
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
     GOVERNMENT | central, state, intra_government_purchases, goverment_postal_services
     ---
     LOGISTICS | freight, courier, warehousing, distribution, end_to_end_logistics, courier_services
     ---
     TOURS_AND_TRAVEL | aviation, accommodation, ota, travel_agency, tourist_attractions_and_exhibits, timeshares, aquariums_dolphinariums_and_seaquariums
     ---
     TRANSPORT | cab_hailing, bus, train_and_metro, automobile_rentals, cruise_lines, parking_lots_and_garages, transportation, bridge_and_road_tolls, freight_transport, truck_and_utility_trailer_rentals
     
    

  
### KYC Requirements

     Given below are the KYC Requirements.

     

     KYC Requirements | Number | API Name | Not Yet Registered | Individual | Proprietorship | Public Limited | Private Limited | LLP | Partnership | Trust | NGO | Society | Educational Institutes
     ---
     Owner PAN/Signatory PAN | Number | Stakeholder | Yes | Yes | Conditional | No | No | No | No | No | No | No | No
     ---
     Business PAN | Number | Linked Account Onboarding | NA | NA | Optional | Yes | Yes | Yes | Yes | Yes | Yes | Yes | Yes
     ---
     Bank Account | Number | Product Configuration | Yes | Yes | Yes | Yes | Yes | Yes | Yes | Yes | Yes | Yes | Yes
     ---
     GST | Number | Linked Account Onboarding | NA | NA | Optional | Yes | Yes | Yes | Yes | Yes | Yes | Yes | Yes
     
    

### Related Information

- [Route API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route.md)
- [Route Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/subscribe-to-webhooks.md)
