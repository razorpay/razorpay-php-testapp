---
title: Payment Gateway | EMI² Suite - FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Razorpay EMI² Suite.
---

# Frequently Asked Questions (FAQs)

## Common

    
### 1. What are the issuers that Razorpay supports for each EMI² method?

         
         Method | Partners
         ---
         Credit Card EMI | 12+ leading issuers including, Amex, HDFC, ICICI and SBI. Find the complete list of [banks supporting Credit Card EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/faqs.md#credit-card-emi).
         ---
         Debit Card EMI | HDFC, IndusInd, and ICICI Bank.
         ---
         Cardless EMI | ZestMoney, axio, InstaCred, HDFC Bank, Fibe and more. Find the complete list of [banks supporting Cardless EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/faqs.md#cardless-emi).
         ---
         Pay Later | LazyPay and PayPal.
         
        

    
### 2. What is the difference between Cardless EMI & Pay Later?

         
            
                [Cardless EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/cardless-emi.md) is a digital EMI option that allows your customer to pay in installments without access to a credit or debit card. Usually, customers prefer this method for making high-value payments.
            
            
                [Pay Later](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md) is a virtual credit card that lets your customer shop now and pay later. It provides zero-interest digital credit for 14-45 days (varies by provider). Our partners for Pay Later are - FlexiPay by HDFC Bank, ICICI Pay Later, Simpl and LazyPay.
            
         
        

    
### 3. Is Instant Refund supported on any EMI² Payment Method?

         No, instant refunds are not supported on EMI, Cardless EMI and Pay Later.
        

    
### 4. How can I disable Payment methods?

         Raise a request with our [Support team](https://razorpay.com/support/) to disable payment methods.
        

## Pay Later

    
### 1. How can my customer pay using Pay Later?

         Pay Later is available as a payment option at Razorpay checkout. To make a payment, customers must be registered with Razorpay's Pay Later partners - LazyPay and PayPal.
        

    
### 2. What are the standard interest rates charged by Pay Later providers?

         The standard interest rates charged by the providers for Pay Later are given below:

         
         Pay Later | Provider Code | Minimum Transaction | 15 days | 30 days | 45 days | 60 days | 90 days
         ---
         LazyPay | `lazypay` | ₹1 | Interest free | NA | NA | NA | NA
         ---
         PayPal | `paypal` | ₹100 | Interest free | NA | NA | NA | NA
         
         
         * Interest rates are determined on a case-to-case basis. [Contact support](https://razorpay.com/support/#request) for more information.

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          All interest rates mentioned above are per annum.
>          

        

## EMI

### Common

    
### 1. Can my customers avail Offers for EMI payments at Checkout?

         Yes, they can avail offers for EMI payments at checkout. Know more about [creating EMI Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers.md).
        

    
### 2. If a customer chooses EMI as the payment method, do I get the full amount upfront?

         Yes, you receive the full amount at once and the provider/bank converts it into EMI for the customer.
        

    
### 3. What happens when the customer fails to pay the EMI?

         The loss is borne by the provider/bank. You would have already gotten the full amount.
        

### Debit Card EMI

    
### 1. How do banks perform the EMI eligibility check during the transaction flow?

         Eligibility is checked using the card number and registered phone number. Therefore, customers should always use the phone number registered with the bank while making a payment.
        

    
### 2. What is the minimum balance required in the customer's account to avail Debit Card EMI?

         None. Customers need not have any minimum balance in their accounts while placing the order. However, they need to ensure that their accounts have sufficient funds to pay the EMI due every month.
        

    
### 3. How will the customers know that they are eligible for Debit Card EMI?

         Customers can check their eligibility by sending the SMS 
         
         `DCEMI last 4 digits of Debit Card number` to `56767`, from their registered mobile number.
        

    
### 4. What is the criteria to avail Debit Card EMI?

         To avail [Debit Card EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/debit-card-emi.md), your customers should pass the eligibility criteria set by their banks. The minimum order amount on the Checkout should be ₹5000 (for HDFC and IndusInd debit cards).
        

    
### 5. Can you provide a list of the EMI plans and interest rates of different banks that support Debit card EMI?

         The interest rates applied by each bank for Debit Card EMIs is provided below. 
         - The minimum transaction amount for which EMIs can be availed on debit cards can vary for each bank. 
         - The maximum transaction amount depends upon the available pre-approved limit for the customer.
         
        
           
              For **HDFC Bank (HDFC)**:
              
                  

                  Tenures in Months | Minimum Amount (in INR) | Interest rates | Maximum Amount
                  ---
                  3 months | 3000 | 16% | NA
                  ---
                  6 months | 5000 | 16% | NA
                  ---
                  9 months | 5000 | 16% | NA
                  ---
                  12 months | 5000 | 16% | NA
                  ---
                  18 months | 5000 | 16% | NA
                  ---
                  24 months | NA | NA | NA
                  
              

         
    
         
           
### For **ICICI Bank (ICIC)**:

                  

                    Tenures in Months | Minimum Amount (in INR) | Interest rates | Maximum Amount
                    ---
                    3 months | 5000 | 16% | 100000
                    ---
                    6 months | 5000 | 16% | 100000
                    ---
                    9 months | 5000 | 16% | 100000
                    ---
                    12 months | 5000 | 16% | 100000
                    ---
                    18 months | 5000 | 16% | 100000
                    ---
                    24 months | 5000 | 16% | 100000
                    
              

         
    
        
    
    
### 6. Can the customers change the EMI plan after placing the order?

         No, EMI plans cannot be changed after an order is placed.
        

    
### 7. Do customers need to pay any down-payment to avail Debit Card EMI?

         No, the customers need not pay any down-payment amount to avail the Debit Card EMI option.
        

    
### 8. Is there a possibility to foreclose EMIs availed on Debit Cards?

         Yes, Debit Card EMIs can be foreclosed after clearing the first three EMIs.
        

    
### 9. Which are the business categories for which Debit Card EMI is not allowed?

         The Debit Card EMI payment method is not allowed for certain business categories. Check the relevant Category section below for the list of sub-categories and support status. Debit Card EMI is not allowed for categories with **N** as the status.

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          Due to our partner bank restrictions, the Debit Card EMI payment methods may not be available to all the Merchant Categories and Subcategories.
>          

          
              
                  Financial Services
                  
                   
                   Sub Category | Description | Status
                   ---
                   mutual_fund | Mutual Fund | N
                   ---
                   lending | Lending | N
                   ---
                   cryptocurrency | Cryptocurrency | N
                   ---
                   insurance | Insurance | Y
                   ---
                   nbfc | NBFC | N
                   ---
                   cooperatives | Cooperatives | Y
                   ---
                   pension_fund | Pension Fund | Y
                   ---
                   forex | Forex | N
                   ---
                   securities | Securities | N
                   ---
                   commodities | Commodities | N
                   ---
                   accounting | Accounting and Taxes | Y
                   ---
                   financial_advisor | Financial and Investment Advisors/Financial Advisor | Y
                   ---
                   crowdfunding | Crowdfunding Platform | N
                   ---
                   trading | Stock Brokerage and Trading | N
                   ---
                   betting | Betting | N
                   ---
                   get_rich_schemes | Get Rich Schemes | N
                   ---
                   moneysend_funding | MoneySend Funding | Y
                   ---
                   wire_transfers_and_money_orders | WIRE TRANSFER MONEY ORDER | N
                   ---
                   tax_preparation_services | Tax Preparation Service | Y
                   ---
                   tax_payments | Tax Payments | Y
                   ---
                   digital_goods | Digital Goods-Multi-Category | Y
                   ---
                   atms | Financial Institutions-Automated Cash Disbursements | N
                 
                  

              
### Education

                   
                   college | College
                   ---
                   schools | Schools
                   ---
                   university | University
                   ---
                   professional_courses | Professional Courses
                   ---
                   distance_learning | Distance Learning
                   ---
                   day_care | Pre-School/Day Care
                   ---
                   coaching | Coaching Institute
                   ---
                   elearning | E-Learning
                   ---
                   vocational_and_trade_schools | SCHOOLS, TRADE AND VOCATIONAL
                   ---
                   sporting_clubs | ATHLETIC FEES
                   ---
                   dance_halls_studios_and_schools | Dance Halls, Studios and Schools
                   ---
                   correspondence_schools | Schools, Correspondence
                   
                  

              
### Healthcare

                   
                   Category Code | Category Name | Status
                   ---
                   pharmacy | Pharmacy | N
                   ---
                   clinic | Clinic | Y
                   ---
                   hospital | Hospital | Y
                   ---
                   lab | Lab | Y
                   ---
                   dietician | Dietician/Diet Services | Y
                   ---
                   fitness | Gym and Fitness | Y
                   ---
                   health_coaching | Health and Lifestyle Coaching | Y
                   ---
                   health_products | Health Products | Y
                   ---
                   healthcare_marketplace | Marketplace/Aggregator | N
                   ---
                   osteopaths | Osteopaths | Y
                   ---
                   medical_equipment_and_supply_stores | Dental/Laboratory/Medical/Ophthalmic Hospital Equipment and Supplies | Y
                   ---
                   drug_stores | DRUGS, DRUG PROPRIETARIES | N
                   ---
                   podiatrists_and_chiropodists | Podiatrists and Chiropodists | Y
                   ---
                   dentists_and_orthodontists | Dentists, Orthodontists | Y
                   ---
                   hardware_stores | Hardware Stores | Y
                   ---
                   ophthalmologists | Optometrists, Ophthalmologists | Y
                   ---
                   orthopedic_goods_stores | Orthopedic Goods-Artificial Limb Stores | Y
                   ---
                   health_practitioners_medical_services | Health Practitioners, Medical Services-not elsewhere classified | Y
                   ---
                   testing_laboratories | Testing Laboratories-Non medical | Y
                   ---
                   doctors | Doctors-not elsewhere classified | Y
                 
                  

              
### Utilities

                   
                   Sub Category | Description | Status
                   ---
                   electricity	| Electricity	| Y
                   ---
                   gas	| Gas	| Y
                   ---
                   telecom	| Telecom Service Provider	| Y
                   ---
                   water	| Water	| Y
                   ---
                   cable	| Cable operator	| Y
                   ---
                   broadband	| Broadband	| Y
                   ---
                   dth	| DTH	| Y
                   ---
                   internet_provider	| Internet service provider	| Y
                   ---
                   bill_and_recharge_aggregators	| Bill Payment and Recharge Aggregators	| Y
                   ---
                   central	| Central Department	| Y
                   
                  

                  
### Government

                   
                   Sub Category | Description | Status
                   ---
                   central	| Central Department	| Y
                   ---
                   state	| State Department	| Y
                   ---
                   intra_government_purchases	| Intra-Government Purchases -Government Only	| Y
                   ---
                   goverment_postal_services	| Postal Services -Government Only	| Y
                   
                  

              
### Logistics

                   
                   Sub Category | Description | Status
                   ---
                   freight	| Freight Consolidation/Management |	Y
                   ---
                   courier | 	Courier Shipping	| Y
                   ---
                   warehousing	| Public/Contract Warehousing	| Y
                   ---
                   distribution	| Distribution Management |	Y
                   ---
                   end_to_end_logistics	| End-to-end logistics	 | Y
                   ---
                   courier_services	| Courier Services-Air &amp, Ground, Freight Forwarders	| Y
                   
                  

              
### Tours and Travel

                   
                   Sub Category | Description | Status
                   ---
                   aviation | Aviation | Y
                   ---
                   accommodation | Lodging and Accommodation | Y
                   ---
                   ota | OTA | Y
                   ---
                   travel_agency | Tours and Travel Agency | Y
                   ---
                   tourist_attractions_and_exhibits | Tourist Attractions and Exhibits | Y
                   ---
                   aquariums_dolphinariums_and_seaquariums | Aquariums, Dolphinariums, and Seaquariums | Y
                   ---
                   timeshares | Timeshares | Y
                   
                  

              
### Transport

                   
                   Sub Category | Description | Status
                   ---
                   cab_hailing | Cab/auto hailing | Y
                   ---
                   bus | Bus ticketing | Y
                   ---
                   train_and_metro | Train and metro ticketing | Y
                   ---
                   automobile_rentals | National Car Rental | Y
                   ---
                   cruise_lines | CRUISE LINES | Y
                   ---
                   parking_lots_and_garages | Automobile Parking Lots and Garages | Y
                   ---
                   bridge_and_road_tolls | BRIDGE & ROAD FEES, TOLLS | Y
                   ---
                   freight_transport | Railroads and Freight | Y
                   ---
                   truck_and_utility_trailer_rentals | Truck and Utility Trailer Rentals | Y
                   ---
                   transportation | Transportation—Suburban and Local Commuter Passenger, including Ferries | Y
                   
                  

                  
### Ecommerce

                    
                    Sub Category | Description | Status
                    ---
                    ecommerce_marketplace | Horizontal Commerce/Marketplace | N
                    ---
                    agriculture | Agricultural products | Y
                    ---
                    books | Books and Publications | Y
                    ---
                    electronics_and_furniture | Electronics and Furniture | Y
                    ---
                    coupons | Coupons and deals | Y
                    ---
                    rental | Product Rental | Y
                    ---
                    fashion_and_lifestyle | Fashion and Lifestyle | Y
                    ---
                    gifting | Flowers and Gifts | Y
                    ---
                    grocery | Grocery | Y
                    ---
                    baby_products | Baby Care and Toys | Y
                    ---
                    office_supplies | Office Supplies | Y
                    ---
                    wholesale | Wholesale/Bulk trade | Y
                    ---
                    religious_products | Religious products | Y
                    ---
                    pet_products | Pet Care and Supplies | Y
                    ---
                    sports_products | Sports goods | Y
                    ---
                    arts_and_collectibles | Arts, crafts and collectibles | Y
                    ---
                    sexual_wellness_products | Sexual Wellness Products | Y
                    ---
                    drop_shipping | Dropshipping | N
                    ---
                    crypto_machinery | Crypto Machinery | Y
                    ---
                    tobacco | Tobacco | Y
                    ---
                    weapons_and_ammunitions | Weapons and Ammunitions | Y
                    ---
                    stamps_and_coins_stores | Stamps & Coins Stores | Y
                    ---
                    automobile_parts_and_equipements | MOTOR VEHICLE SUPPLIES | Y
                    ---
                    office_equipment | Office, Photographic, Photocopy, and Microfilm Equipment | Y
                    ---
                    garden_supply_stores | Lawn and Garden Supply Stores | Y
                    ---
                    household_appliance_stores | Household Appliance Stores | Y
                    ---
                    non_durable_goods | NONDURABLE GOODS | Y
                    ---
                    electrical_parts_and_equipment | Electrical Parts and Equipment | Y
                    ---
                    wig_and_toupee_shops | Wig and Toupee Shops | Y
                    ---
                    gift_novelty_and_souvenir_shops | Card, Gift, Novelty, and Souvenir Shops | Y
                    ---
                    duty_free_stores | Duty Free Stores | Y
                    ---
                    office_and_commercial_furniture | Office and Commercial Furniture | Y
                    ---
                    dry_goods | Piece Goods, Notions, and Other Dry Goods | Y
                    ---
                    books_and_publications | Book Stores | Y
                    ---
                    camera_and_photographic_stores | Camera and Photographic Supply Stores | Y
                    ---
                    meat_supply_stores | Freezer, Locker Meat Provisioners | Y
                    ---
                    leather_goods_and_luggage | Leather Goods and Luggage Stores | Y
                    ---
                    snowmobile_dealers | Snowmobile Dealers | Y
                    ---
                    men_and_boys_clothing_stores | Men’s and Boy’s Clothing and Furnishings Store | Y
                    ---
                    paint_supply_stores | Varnishes, Paints, Supplies | Y
                    ---
                    automotive_parts | Automotive Parts, Accessories Stores | Y
                    ---
                    jewellery_and_watch_stores | Precious Stones and Metals, Watches and Jewelry | Y
                    ---
                    auto_store_home_supply_stores | Auto Store, Home Supply Stores | Y
                    ---
                    tent_stores | Tent and Awning Shops | Y
                    ---
                    petroleum_and_petroleum_products | Petroleum and Petroleum Products | N
                    ---
                    department_stores | Department Stores | Y
                    ---
                    shoe_stores_retail | Shoe Stores | Y
                    ---
                    automotive_tire_stores | Automotive Tire Stores | Y
                    ---
                    sport_apparel_stores | Sports Apparel, Riding Apparel Stores | Y
                    ---
                    chemicals_and_allied_products | Chemicals and Allied Products | Y
                    ---
                    fireplace_parts_and_accessories | FIREPLACE FIREPLACE SCREENS AND ACCESSORIES STORES | Y
                    ---
                    commercial_equipments | COMMERCIAL EQUIPMENTS | Y
                    ---
                    family_clothing_stores | Family Clothing Stores | Y
                    ---
                    fabric_and_sewing_stores | Fabric, Needlework, Piece Goods, and Sewing Stores | Y
                    ---
                    camper_recreational_and_utility_trailer_dealers | Camper, Recreational and utility trailer dealers | Y
                    ---
                    record_shops | Record Shops | Y
                    ---
                    home_supply_warehouse | Home Supply Warehouse | Y
                    ---
                    clocks_and_silverware_stores | Clock, Jewelry, Watch, and Silverware Store | N
                    ---
                    art_supply_stores | Artist Supply Stores, Craft Shops | Y
                    ---
                    pawn_shops | Pawn Shops | Y
                    ---
                    school_supplies_and_stationery | Office, School Supply, and Stationery Stores | Y
                    ---
                    opticians_optical_goods_and_eyeglasse_stores | Opticians, Optical Goods, and Eyeglasses | Y
                    ---
                    watch_and_jewellery_repair_stores | Clock, Jewelry, and Watch Repair Shops | N
                    ---
                    wholesale_footwear_stores | Commercial Footwear | Y
                    ---
                    antique_stores | Antique Reproduction Stores | Y
                    ---
                    plumbing_and_heating_equipment | Plumbing and Heating Equipment | Y
                    ---
                    variety_stores | Variety Stores | Y
                    ---
                    liquor_stores | Package Stores, Beer, Wine, Liquor | N
                    ---
                    boat_dealers | Boat Dealers | Y
                    ---
                    cosmetic_stores | Cosmetic Stores | Y
                    ---
                    home_furnishing_stores | Miscellaneous House Furnishing Specialty Shops | Y
                    ---
                    telecommunication_equipment_stores | Telecommunication Equipment Including Telephone Sales | Y
                    ---
                    women_clothing | Womens Ready to Wear Stores | Y
                    ---
                    florists | Florists | Y
                    ---
                    commercial_photography_and_graphic_design_services | Commercial Art, Graphics, Photography | Y
                    ---
                    building_matrial_stores | Building Materials, Lumber Stores | Y
                    ---
                    candy_nut_confectionery_shops | Candy, Nut, Confectionery Stores | Y
                    ---
                    glass_and_wallpaper_stores | Glass, Paint, Wallpaper Stores | Y
                    ---
                    video_game_supply_stores | Video Amusement Game Supplies | Y
                    ---
                    drapery_and_window_coverings_stores | Drapery, Upholstery, and Window Coverings Stores | Y
                    ---
                    uniforms_and_commercial_clothing_stores | Men’s, Women’s, and Children’s Uniforms and Commercial Clothing | Y
                    ---
                    automotive_paint_shops | Automotive Paint Shops | Y
                    ---
                    durable_goods_stores | Durable Goods not elsewhere classified | Y
                    ---
                    fur_shops | Furriers and Fur Shops | Y
                    ---
                    industrial_supplies | Industrial Supplies | Y
                    ---
                    motorcycle_shops_and_dealers | Motorcycle Shops and Dealers | Y
                    ---
                    children_and_infants_wear_stores | Children’s and Infants’ Wear Stores | Y
                    ---
                    computer_software_stores | Computer Software Stores | Y
                    ---
                    women_accessory_stores | Women Accessory and Specialty Stores | Y
                    ---
                    books_periodicals_and_newspaper | Books, Periodicals and Newspapers | Y
                    ---
                    floor_covering_stores | Floor Covering Stores | Y
                    ---
                    crystal_and_glassware_stores | Crystal and Glassware Stores | Y
                    ---
                    hardware_equipment_and_supply_stores | Hardware Equipment and Supplies | Y
                    ---
                    discount_stores | Discount stores | Y
                    ---
                    computers_peripheral_equipment_software | Computers, Computer Peripheral Equipment, Software | Y
                    ---
                    automobile_and_truck_dealers | Automobile and Truck Dealers-Used Only-Sales | Y
                    ---
                    aircraft_and_farm_equipment_dealers | Miscellaneous Automotive, Aircraft, and Farm Equipment Dealers-not elsewhere classified | Y
                    ---
                    antique_shops_sales_and_repairs | Antique Shops-Sales, Repairs, and Restoration Services | Y
                    ---
                    bicycle_stores | Bicycle Shops-Sales and Service | Y
                    ---
                    hearing_aids_stores | Hearing Aids-Sales, Service, Supply Stores | Y
                    ---
                    music_stores | Music Stores-Musical Instruments, Pianos, Sheet Music | Y
                    ---
                    construction_materials | Construction Materials-not elsewhere classified | Y
                    ---
                    accessory_and_apparel_stores | Accessory and Apparel Stores-Miscellaneous | Y
                    ---
                    second_hand_stores | SECOND HAND STORES-USED MERCHANDISE STORES | Y
                    ---
                    fuel_dealers | Fuel Dealers-Coal, Fuel Oil, Liquefied Petroleum, Wood | N
                    ---
                    furniture_and_home_furnishing_store | Furniture and Home Furnishing store | Y
                  
                

              
### Food and Beverages

                   
                   Sub Category | Description | Status
                   ---
                   online_food_ordering	| Online Food Ordering |	Y
                   ---
                   restaurant	| Restaurants	| Y
                   ---
                   food_court	| Food Courts/Corporate Cafeteria	| Y
                   ---
                   catering	| Catering Services	| Y
                   ---
                   alcohol	| Alcoholic Beverages |	Y
                   ---
                   restaurant_search_and_booking	| Restaurant search and reservations	| Y
                   ---
                   dairy_products	| Dairy Products Stores	| Y
                   ---
                   bakeries	| Bakeries	| Y
                   
                  

                  
### IT and Software

                   
                    Sub Category | Description | Status
                    ---
                    saas	| SaaS (Software as a service)	| N
                    ---
                    paas	| Platform as a service	| N
                    ---
                    iaas	| Infrastructure as a service	| N
                    ---
                    consulting_and_outsourcing	| Consulting and Outsourcing	| N
                    ---
                    web_development	| Web designing, development and hosting	| Y
                    ---
                    technical_support	| Technical Support | 	Y
                    ---
                    data_processing	| Data processing	| Y
                   
                  

              
### Gaming

                   
                    Sub Category | Description | Status
                    ---
                    game_developer	| Game developer and publisher	| N
                    ---
                    esports	| E-sports	| N
                    ---
                    online_casino	| Online Casino	| N
                    ---
                    fantasy_sports	| Fantasy Sports	| N
                    ---
                    gaming_marketplace	| Game distributor/Marketplace | N
                   
                  

                  
### Media and Entertainment

                    
                    Sub Category | Description | Status
                    ---
                    video_on_demand | Video on demand | Y
                    ---
                    music_streaming | Music streaming services | Y
                    ---
                    multiplex | Multiplexes | Y
                    ---
                    content_and_publishing | Content and Publishing | Y
                    ---
                    ticketing | Events and movie ticketing | Y
                    ---
                    news | News | Y
                    ---
                    video_game_arcades | Video Game Arcades/Establishments | N
                    ---
                    video_tape_production_and_distribution | Motion Pictures and Video Tape Production and Distribution | Y
                    ---
                    bowling_alleys | Bowling Alleys | Y
                    ---
                    billiard_and_pool_establishments | Billiard and Pool Establishments | Y
                    ---
                    amusement_parks_and_circuses | Amusement Parks, Carnivals, Circuses, Fortune Tellers | Y
                    ---
                    ticket_agencies | Theatrical Producers-except Motion Pictures, Ticket Agencies | Y
                    
                  

              
### Services

                   
                    Sub Category | Description | Status
                    ---
                    repair_and_cleaning | Repair and cleaning services | Y
                    ---
                    interior_design_and_architect | Interior Designing and Architect | Y
                    ---
                    movers_and_packers | Movers and Packers | Y
                    ---
                    legal | Legal Services | Y
                    ---
                    event_planning | Event planning services | Y
                    ---
                    service_centre | Service Centre | Y
                    ---
                    consulting | Consulting Services | N
                    ---
                    ad_and_marketing | Ad and marketing agencies | Y
                    ---
                    services_classifieds | Services Classifieds | Y
                    ---
                    multi_level_marketing | Multi-level Marketing | Y
                    ---
                    construction_services | GENERAL CONTRACTORS | Y
                    ---
                    architectural_services | Horticultural and Landscaping Services | Y
                    ---
                    car_washes | CAR WASHES | Y
                    ---
                    motor_home_rentals | A MOTOR HOME AND RECREATIONAL | Y
                    ---
                    stenographic_and_secretarial_support_services | Stenographic and Secretarial Support Services | Y
                    ---
                    chiropractors | Chiropractors | Y
                    ---
                    automotive_service_shops | Automotive Service Shops | Y
                    ---
                    shoe_repair_shops | Hat Cleaning Shops, Shoe Repair Shops, Shoe Shine Parlors | Y
                    ---
                    telecommunication_service | Telecom Servc including but not ltd to prepaid phone serv | Y
                    ---
                    fines | FINES | N
                    ---
                    security_agencies | Agencies – Security Services | Y
                    ---
                    type_setting_and_engraving_services | Typesetting, Plate Making, Related Services | Y
                    ---
                    small_appliance_repair_shops | Appliance Repair Shops, Electrical and Small | Y
                    ---
                    photography_labs | Photo Developing, Photofinishing Laboratories | Y
                    ---
                    dry_cleaners | Dry Cleaners | Y
                    ---
                    electronic_repair_shops | Electronic Repair Shops | Y
                    ---
                    cleaning_and_sanitation_services | Specialty Cleaning, Polishing, and Sanitation Preparations | Y
                    ---
                    nursing_care_facilities | Nursing and Personal Care Facilities | Y
                    ---
                    direct_marketing | Direct Marketing Other Direct Marketers not elsewhere classified | Y
                    ---
                    veterinary_services | Veterinary Services | Y
                    ---
                    affliated_auto_rental | AFFILIATED AUTO RENTAL | Y
                    ---
                    alimony_and_child_support | COURT COST INCLUDING ALIMONY AND CHILD SUPPORT | Y
                    ---
                    airport_flying_fields | AIRPORT FLYING FIELDS | Y
                    ---
                    tire_retreading_and_repair_shops | Tire Retreading and Repair Shops | Y
                    ---
                    television_cable_services | Cable and other Pay Television Services | Y
                    ---
                    recreational_and_sporting_camps | Recreational and Sporting Camps | Y
                    ---
                    agricultural_cooperatives | AGRICULTURAL COOPERATIVES | Y
                    ---
                    carpentry_contractors | Carpentry Contractors | Y
                    ---
                    wrecking_and_salvaging_services | Wrecking and Salvage Yards | Y
                    ---
                    automobile_towing_services | Towing Services | Y
                    ---
                    barber_and_beauty_shops | Barber and Beauty Shops | Y
                    ---
                    video_tape_rental_stores | Video Tape Rental Stores | Y
                    ---
                    golf_courses | Golf Courses, Public | Y
                    ---
                    miscellaneous_repair_shops | Miscellaneous Repair Shops and Related Services | Y
                    ---
                    motor_homes_and_parts | MOTOR HOME DEALERS | Y
                    ---
                    debt_marriage_personal_counseling_service | Debt, Marriage, Personal Counseling Service | Y
                    ---
                    air_conditioning_and_refrigeration_repair_shops | Air Conditioning and Refrigeration Repair Shops | Y
                    ---
                    tailors | Alterations, Mending, Seamstresses, Tailors | Y
                    ---
                    massage_parlors | Massage Parlors | Y
                    ---
                    horse_or_dog_racing | Government Licensed Horse/Dog Racing | N
                    ---
                    credit_reporting_agencies | Consumer Credit Reporting Agencies | Y
                    ---
                    heating_and_plumbing_contractors | Air Conditioning, Heating, and Plumbing Contractors | Y
                    ---
                    electrical_contractors | ELECTRICAL CONTRACTORS | Y
                    ---
                    carpet_and_upholstery_cleaning_services | Carpet and Upholstery Cleaning | Y
                    ---
                    roofing_and_metal_work_contractors | Roofing and Siding, Sheet Metal Work Contractors | Y
                    ---
                    internet_service_providers | Computer Network/Information Services | Y
                    ---
                    laundry_services | Cleaning, Garment, and Laundry Services | Y
                    ---
                    recreational_camps | Trailer Parks and Campgrounds | Y
                    ---
                    masonry_contractors | Insulation, Masonry, Plastering, Stonework, and Tile Setting Contractors | Y
                    ---
                    exterminating_and_disinfecting_services | Exterminating and Disinfecting Services | Y
                    ---
                    ambulance_services | Ambulance Services | Y
                    ---
                    funeral_services_and_crematories | Funeral Services and Crematories | Y
                    ---
                    metal_service_centres | Metal Service Centers and Offices | Y
                    ---
                    copying_and_blueprinting_services | Quick Copy, Reproduction, and Blueprinting Services | Y
                    ---
                    fuel_dispensers | Fuel Dispenser, Automated | N
                    ---
                    lottery | Government Owned Lottery,Government Owned Lottery | N
                    ---
                    welding_repair | WELDING REPAIR | Y
                    ---
                    mobile_home_dealers | Mobile Home Dealers | Y
                    ---
                    concrete_work_contractors | CONCRETE WORK CONTRACTORS | Y
                    ---
                    boat_rentals | Boat Leases and Boat Rentals | Y
                    ---
                    personal_shoppers_and_shopping_clubs | Buying/Shopping Clubs, Services | Y
                    ---
                    door_to_door_sales | DOOR-TO-DOOR SALES | Y
                    ---
                    travel_related_direct_marketing | Direct Marketing-Travel-Related Arrangement Services | Y
                    ---
                    lottery_and_betting | Betting -including Lottery Tickets, Chips at Gaming Casinos, Off-Track Betting and Wagers at Race Tracks | N
                    ---
                    bands_orchestras_and_miscellaneous_entertainers | Bands, Orchestras, and Miscellaneous Entertainers-not elsewhere classified | Y
                    ---
                    furniture_repair_and_refinishing | Furniture-Reupholstery and Repair, Refinishing | Y
                    ---
                    direct_marketing_and_subscription_merchants | Direct Marketing-Continuity/Subscription Merchants | N
                    ---
                    typewriter_stores_sales_service_and_rentals | Typewriter Stores-Sales, Service, and Rentals | Y
                    ---
                    direct_marketing_insurance_services | Direct Marketing-Insurance Services | Y
                    ---
                    business_services | Business Services-not elsewhere classified | Y
                    ---
                    inbound_telemarketing_merchants | Direct Marketing-Inbound Telemarketing Merchants | N
                    ---
                    recreation_services | Recreation Services-not elsewhere classified | Y
                    ---
                    swimming_pools | Swimming Pools-Sales and Supplies | Y
                    ---
                    outbound_telemarketing_merchants | Direct Marketing-Outbound Telemarketing Merchants | N
                    ---
                    public_warehousing | Public Warehousing-Farm Products, Refrigerated Goods, | Y
                    ---
                    clothing_rental_stores | Clothing Rental-Costumes, Uniforms, and Formal Wear | Y
                    ---
                    contractors | Contractors, Special Trade-not elsewhere classified | Y
                    ---
                    transportation_services | Transportation Services-not elsewhere classified | Y
                    ---
                    electric_razor_stores | Electric Razor Stores-Sales and Service | Y
                    ---
                    service_stations | Service Stations with or without Ancillary Services | N
                    ---
                    photographic_studio | Photographic studios | Y
                    ---
                    professional_services | Professional services | Y
                    ---
                    
                  

                  
### Housing and Real Estate

                   
                   Sub Category | Description | Status
                   ---
                   developer |	Developer	| N
                   ---
                   facility_management | Facility Management Company | Y
                   ---
                   rwa	| RWA	| Y
                   ---
                   coworking	| Co-working spaces	| N
                   ---
                   realestate_classifieds	| Real estate classifieds	| N
                   ---
                   space_rental |	Home or office rentals	| N
                   
                  

                  
### Not-for-Profit

                   
                   Sub Category | Description | Status
                   ---
                   charity | Charity | Y
                   ---
                   educational | Educational | Y
                   ---
                   religious | Religious | Y
                   ---
                   personal	| Personal	| Y
                   
                  

                  
### Social

                   
                    Sub Category | Description | Status
                    ---
                    matchmaking | Dating and Matrimony platforms | N
                    ---
                    social_network | Social Network | Y
                    ---
                    messaging | Messaging and Communication | Y
                    ---
                    professional_network | Professional Network | Y
                    ---
                    neighbourhood_network | Local/Neighbourhood network | Y
                    ---
                    automobile_associations_and_clubs | Automobile Associations | Y
                    ---
                    political_organizations | Political Organizations | N
                    ---
                    country_and_athletic_clubs | Clubs-Country Clubs, Membership-Athletic, Recreation, Sports, Private Golf Courses | Y
                    ---
                    associations_and_membership | Associations and membership | Y
                      
                  

          
        
    

### Credit Card EMI

   
### 1. What are the standard credit card interest rates charged by the banks for EMI?

       The interest rates charged by various banks for each of the tenures are provided for your reference. The minimum transaction amount for which EMIs are applicable can vary for each bank. The maximum amount is dependent on the card limit set by the issuing bank.
      
       
         
             **American Express (AMEX)**:
            
             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 5000 ^^^^^^^ | 199 ^^^^^^^ | 14% | October 12, 2023 ^^^^^^^
                  ---
                  6 months |  |  | 14% | 
                  ---
                  9 months |  |  | 14% | 
                  ---
                  12 months |  |  | 14% | 
                  ---
                  18 months |  |  | 15% | 
                  ---
                  24 months |  |  | 15% | 
                  ---
                  36 months |  |  | NA | 
                  
            

       
       
         
###  **Bank of Baroda (BARB)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 2500 ^^^^^^^ | NA ^^^^^^^ | 16% | July 26, 2024 ^^^^^^^
                  ---
                  6 months |  |  | 16% | 
                  ---
                  9 months |  |  | 16% | 
                  ---
                  12 months |  |  | 16% | 
                  ---
                  18 months |  |  | 16% | 
                  ---
                  24 months |  |  | 16% | 
                  ---
                  36 months |  |  | NA | 
                  
            

       
       
         
###  **Citibank (CITI)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 2500 ^^^^^^^ | A one-time processing fee of 1% or ₹100, whichever is higher, will be charged by the bank. ^^^^^^^ | 16% | April 08, 2024 ^^^^^^^
                  ---
                  6 months |  |  | 16% | 
                  ---
                  9 months |  |  | 16% | 
                  ---
                  12 months |  |  | 16% | 
                  ---
                  18 months |  |  | 16% | 
                  ---
                  24 months |  |  | 16% | 
                  ---
                  36 months |  |  | NA | 
                  
            

       
       
         
###  **Federal Bank (FDRL)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 2500 ^^^^^^^ | NA ^^^^^^^ | 15.99% | July 26, 2024 ^^^^^^^
                  ---
                  6 months |  |  | 15.99% | 
                  ---
                  9 months |  |  | 15.99% | 
                  ---
                  12 months |  |  | 15.99% | 
                  ---
                  18 months |  |  | 15.99% | 
                  ---
                  24 months |  |  | 15.99% | 
                  ---
                  36 months |  |  | NA | 
                  
            

       
       
         
###  **HDFC Bank (HDFC)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 1000 | 299 ^^^^^^^ | 16% | July 23, 2025 ^^^^^^^
                  ---
                  6 months | 1000 |  | 16% | 
                  ---
                  9 months | 1000 |  | 16% | 
                  ---
                  12 months | 1000 |  | 16% | 
                  ---
                  18 months | 3000 |  | 16% | 
                  ---
                  24 months | 3000 |  | 16% | 
                  ---
                  36 months | NA |  | NA | 
                  
            

       
       
         
###  **HSBC Bank (HSBC)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 2000 ^^^^^^^ | 99 ^^^^^^^ | 15% | 21 February 2024 ^^^^^^^
                  ---
                  6 months |  |  | 15% | 
                  ---
                  9 months |  |  | 15% | 
                  ---
                  12 months |  |  | 15% | 
                  ---
                  18 months |  |  | 15% | 
                  ---
                  24 months |  |  | 15% | 
                  ---
                  36 months |  |  | NA | 
                  
            

       
       
         
###  **ICICI Bank (ICIC)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 1500 ^^^^^^^ | 199 ^^^^^^^ | 15.99% | November 29, 2023 ^^^^^^^
                  ---
                  6 months |  |  | 15.99% | 
                  ---
                  9 months |  |  | 15.99% | 
                  ---
                  12 months |  |  | 15.99% | 
                  ---
                  18 months |  |  | 15.99% | 
                  ---
                  24 months |  |  | 15.99% | 
                  ---
                  36 months |  |  | NA | 
                  
            

       
       
         
###  **IDFB Bank (IDFB)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 2500 ^^^^^^^ | A one-time processing fee of 1% or ₹99, whichever is higher, will be charged by the bank. ^^^^^^^ | 16% | September 17, 2025 ^^^^^^^
                  ---
                  6 months |  |  | 16% | 
                  ---
                  9 months |  |  | 16% | 
                  ---
                  12 months |  |  | 16% | 
                  ---
                  18 months |  |  | 16% | 
                  ---
                  24 months |  |  | 16% | 
                  ---
                  36 months |  |  | 16% | 
                  
            

       
       
         
###  **IndusInd Bank (INDB)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 2000 ^^^^^^^ | 249 ^^^^^^^ | 16% | September 12, 2024 ^^^^^^^
                  ---
                  6 months |  |  | 16% | 
                  ---
                  9 months |  |  | 16% | 
                  ---
                  12 months |  |  | 16% | 
                  ---
                  18 months |  |  | 16% | 
                  ---
                  24 months |  |  | 16% | 
                  ---
                  36 months |  |  | 16% | 
                  
            

       
       
         
###  **Kotak Mahindra Bank (KKBK)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 2500 ^^^^^^^ | 249 ^^^^^^^ | 16% | February 21, 2024 ^^^^^^^
                  ---
                  6 months |  |  | 16% | 
                  ---
                  9 months |  |  | 16% | 
                  ---
                  12 months |  |  | 16% | 
                  ---
                  18 months |  |  | 16% | 
                  ---
                  24 months |  |  | 16% | 
                  ---
                  36 months |  |  | NA | 
                  
            

       
       
         
###  **RBL Bank (RATN)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 2000 ^^^^^^^ | 199 ^^^^^^^ | 13% | April 05, 2023 ^^^^^^^
                  ---
                  6 months |  |  | 14% | 
                  ---
                  9 months |  |  | 15% | 
                  ---
                  12 months |  |  | 15% | 
                  ---
                  18 months |  |  | 15% | 
                  ---
                  24 months |  |  | 15% | 
                  ---
                  36 months |  |  | NA | 
                  
            

       
       
         
###  **State Bank of India (SBIN)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 2500 ^^^^^^^ | NA | 16.75% | January 7, 2026 ^^^^^^^
                  ---
                  6 months |  | A one-time processing fee of ₹40 will be charged if the transaction amount exceeds ₹20,000. | 16.50% | 
                  ---
                  9 months |  | A one-time processing fee of ₹79 will be charged if the transaction amount exceeds ₹20,000. | 16.50% | 
                  ---
                  12 months |  | A one-time processing fee of ₹159 will be charged if the transaction amount exceeds ₹20,000. | 16% | 
                  ---
                  18 months |  | A one-time processing fee of ₹199 will be charged if the transaction amount exceeds ₹20,000. | 16.25% | 
                  ---
                  24 months |  | A one-time processing fee of ₹299 will be charged if the transaction amount exceeds ₹20,000. | 16.25% | 
                  ---
                  36 months |  | NA | NA | 
                  
            

       
       
         
###  **Standard Chartered (SCBL)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 2500 ^^^^^^^ | A one-time processing fee of 1% will be charged by the bank. ^^^^^^^ | 11.88% | July 26, 2024 ^^^^^^^
                  ---
                  6 months |  |  | 13% | 
                  ---
                  9 months |  |  | 14% | 
                  ---
                  12 months |  |  | 14% | 
                  ---
                  18 months |  |  | NA | 
                  ---
                  24 months |  |  | NA | 
                  ---
                  36 months |  |  | NA | 
                  
            

       
       
         
###  **Axis Bank (UTIB)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 3000 ^^^^^^^ | A one-time processingfee of 1% or ₹100, whichever is higher, will be charged by the bank. ^^^^^^^ | 16% | December 12, 2023 ^^^^^^^
                  ---
                  6 months |  |  | 16% | 
                  ---
                  9 months |  |  | 16% | 
                  ---
                  12 months |  |  | 16% | 
                  ---
                  18 months |  |  | 16% | 
                  ---
                  24 months |  |  | 16% | 
                  ---
                  36 months |  |  | NA | 
                  
            

       
       
         
###  **Yes Bank (YESB)**:

             

                  Tenures in Months[columWidth="20"]  | Minimum Amount (in INR)[columWidth="20"]  | Processing Fee (in INR) | Interest rates | Last Updated
                  ---
                  3 months | 1500 ^^^^^^^ | 299 ^^^^^^^ | 16% | December 12, 2023 ^^^^^^^
                  ---
                  6 months |  |  | 16% | 
                  ---
                  9 months |  |  | 16% | 
                  ---
                  12 months |  |  | 16% | 
                  ---
                  18 months |  |  | 16% | 
                  ---
                  24 months |  |  | 16% | 
                  ---
                  36 months |  |  | NA | 
                  
            

       
      
   
   
### 2. What are the interest rates charged by other credit cards for EMI?

         The interest rates charged by other cards for EMI is given below.
         
           
               **OneCard**:
              
              

                  Tenures in Months | Minimum Amount (in INR) | Interest rates
                  ---
                  3 months | 2500 ^^^^^^ | 16%
                  ---
                  6 months |  | 16% 
                  ---
                  9 months |  | 16%
                  ---
                  12 months |  | 16%
                  ---
                  18 months |  | 16% 
                  ---
                  24 months |  | 16% 
                  
             

         
        
    
   

### Cardless EMI

    
### 1. What are the standard interest rates charged by the banks for cardless EMI?

         The standard interest rates charged by various banks for cardless EMI are provided for your reference.

         
         Cardless EMI | Issuer Bank | Provider Code | Minimum Amount (in INR) | 3 months | 6 months | 9 months | 12 months | 18 months
         ---
         InstaCred | HDFC Bank | `hdfc` | 5000 | 16% | 16% | 16% | 16% | 16%
         ---
         InstaCred | ICICI Bank | `icic` | 7000 | 16% | 16% | 16% | 16% | NA
         ---
         InstaCred | IDFC First | `idfb` | 5000 | 24% | 24% | 24% | 24% | NA
         ---
         InstaCred | Kotak Mahindra Bank | `kkbk` | 3000| 20% | 20% | 20% | 20% | NA
         ---
         axio | NA | `walnut369` | 900 | 24% | 24% | 24% | NA | NA
         ---
         Fibe | NA | `earlysalary` | 3000 | 30% | 30% | 30% | NA | NA
         ---
         ZestMoney | NA | `zestmoney` | 3000 | 22% | 24% | 24% | NA | NA
         
        

    
### 2. What are the standard interest rates charged by Pay Later providers for cardless EMI?

         The standard interest rates charged by the providers for Pay Later providers are given below:

         
         Pay Later | 15 days | 30 days | 45 days | 60 days | 90 days
         ---
         LazyPay | Interest free | NA | NA | NA | NA
         ---
         PayPal | Interest free | NA | NA | NA | NA
         

         * Interest rates are determined on a case-to-case basis. [Contact support](https://razorpay.com/support/#request) for more information.

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          All interest rates mentioned above are per annum.
>          

        

## Eligibility Check

    
### 1. How does eligibility check work?

         Razorpay has partnered with various Debit Card EMI, Cardless EMI, and Pay Later providers. The providers determine customer eligibility for payment instruments based on their respective pre-defined criteria. Razorpay aggregates the information and presents customers with eligible payment options on checkout.

         The customer proceeds with the selected payment option on Razorpay checkout if eligible. If ineligible, alternate options are presented.
        

    
### 2. What is the pre-defined criteria to determine customer eligibility?

         The pre-defined criteria are specific factors each provider uses, such as repayment history, digital footprint, and bureau score, to assess a customer's creditworthiness.
        

    
### 3. What parameters are required during the eligibility check process?

         The providers determine customer eligibility based on their mobile number and order amount for the requested transaction.
        

    
### 4. If a customer is ineligible for payment, what should they do next?

         The customer can view the reason for ineligibility and choose to:
         - Use a different mobile number for the chosen payment instrument and try again. 
         - Opt for a different payment instrument/method.
        

    
### 5. What are the reasons for ineligibility?

         You can view the [list of reasons for ineligibility](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/eligibility-check/standard.md#reasons-for-ineligibility) and their descriptions.
        

    
### 6. Where can I find the minimum and maximum order amount eligible for a specific payment method/instrument?

         You can view the minimum and maximum order amount for the following payment methods. However, ensure you [check the providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/eligibility-check/standard.md#list-of-payment-methods) on which eligibility check is performed.
         - [Debit Card EMI](#5-can-you-provide-a-list-of-the)
         - [Cardless EMI](#1-what-are-the-standard-interest-rates-charged)
         - [Pay Later](#2-what-are-the-standard-interest-rates-charged)

         Please note that not all the providers listed under the above methods are applicable for an eligibility check.
