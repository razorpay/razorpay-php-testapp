---
title: Store Management Settings
heading: Store Management
description: Update and configure settings for each store to ensure smooth billing processes.
---

# Store Management

You can manage all your physical and online outlets with Billme’s **Store Management**. Each store can have its own branding, campaigns and analytics.

The Store Management module in Billme provides a comprehensive solution for organising and managing your business hierarchy, from companies and brands to individual stores and their groupings. This centralised system enables efficient store operations, customer engagement targeting and access control across your entire business network.

With Store Management, businesses can stay informed and in control of their entire retail footprint in real time. The Store Management page enables businesses to monitor store activity, maintain visibility across locations and take quick action if needed.

![Store Management](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/store-management-company-page.jpg.md)

    
### Key Features

         - Add multiple stores under one account
         - Customise branding (logo, theme, contact info) per store
         - View store-specific dashboards and feedback
         - Assign access control per store
        

    
### Advantages

         - **Hierarchical Organisation**: Manage companies, brands and stores in a structured hierarchy
         - **Multi-Channel Support**: Handle both retail and e-commerce stores from a single interface
         - **Flexible Grouping**: Create custom store groups for targeted campaigns and management
         - **Bulk Operations**: Efficiently add multiple stores using CSV uploads
         - **Access Control**: Manage POS access keys and monitor store activity
         - **Comprehensive Data**: Store detailed business, location and compliance information
        

The Store Management module consists of six main sections:

1. **Company** - Business entity management
2. **Brands** - Brand portfolio management
3. **Retail Stores** - Physical store locations
4. **E-Commerce Stores** - Online store management
5. **Store Groups** - Logical store groupings
6. **Access Keys** - POS system access management

### Company

Companies form the top level of your business hierarchy. Each company represents a distinct business entity with its own legal and operational details.

### Creating a New Company

**Required Information:**
- **Company Name**: Full legal business name
- **Company Type**: Business structure (private, partnership and so on.)
- **Email ID**: Primary business email address
- **State**: Business registration state
- **City**: Business registration city
- **Contact Number**: Primary business phone number
- **PIN Code**: Business location postal code
- **Display Address**: Address to be shown on bills and documents

**Additional Details:**
- **Incharge Name**: Primary business contact person
- **Country**: Business location country (auto-populates currency and country code)
- **GST Number**: Goods and Services Tax registration number
- **Billing Name**: Name to appear on billing documents
- **PAN**: Permanent Account Number
- **Address**: Complete business address

### Brand

### Creating a New Brand

**Required Information:**
- **Brand Name**: Distinctive brand identifier
- **Brand Category**: Industry classification (Automotive, E-commerce, Food and Beverages, Education and so on.)

**Optional Information:**
- **Brand Logo**: Visual brand identity (drag-and-drop upload)
- **Brand Description**: Detailed brand information

### Brand Categories

The system supports diverse brand categories including:
- Automotive
- E-commerce
- Food and Beverages
- Education
- Electricity
- Jewellery
- Groceries
- And more

### Retail Store

Retail stores represent physical business locations with specific addresses, staff and point-of-sale systems. Each retail store is associated with a company and brand.

### Creating a New Retail Store

**Basic Information:**
- **Company Selection**: Choose parent company (drop-down)
- **Brand Selection**: Select associated brand (drop-down)
- **Store Incharge Name**: Store manager or primary contact

**Location Details:**
- **Country**: Store location country
- **State**: Store location state
- **City**: Store location city
- **PIN Code**: Store postal code
- **Address**: Complete physical address
- **Display Address**: Customer-facing address for bills

**Contact Information:**
- **Primary Contact Number**: Main store phone number
- **Secondary Contact Number**: Backup contact number

**Operational Details:**
- **Number of POS**: Point-of-sale terminals count
- **Store Code**: Unique store identifier
- **Number of Employees**: Staff count
- **Store Size**: Physical store dimensions or area

**Legal and Compliance:**
- **GST Number**: Store-specific GST registration number
- **FSSAI License Number**: Food safety license number (for food businesses)
- **CIN Number**: Corporate identification number

**Additional Features:**
- **Custom Links**: Add store-specific websites, social media or other links

### Store Status

**Status Options:**
- **Active**: Store is operational and accepting transactions
- **Inactive**: Store is temporarily closed or not processing transactions

**Status Actions:**
- **View Store**: Access detailed store information
- **Edit Store**: Modify store details and settings
- **Reactivate Store**: Change inactive stores back to active status

### E-Commerce Store

E-commerce stores represent online business channels. They share most characteristics with retail stores but are optimised for digital operations without physical location constraints.

### Creating a New E-Commerce Store

**Key Differences from Retail Stores:**
- **No POS Requirement**: E-commerce stores don't require point-of-sale terminal counts
- **Digital Focus**: Optimised for online business operations
- **Same Compliance**: Maintains all legal and tax compliance requirements

**Common Features:**
- Company and brand association
- Contact information management
- Legal compliance fields (GST, FSSAI, CIN)
- Custom links for digital properties
- Store status management

### E-Commerce Specific Considerations

**Store Codes:**
- Often reflect platform integration (e.g., marketplace codes)
- May include platform-specific identifiers
- Support for multiple channel management

**Digital Properties:**
- Custom links for website URLs
- Social media integration
- Third-party marketplace associations

### Store Groups

Store Groups enable logical organisation of stores for targeted campaigns, reporting and management. Groups can be created based on geography, performance, store type or any business logic.

### Creating Store Groups

**Basic Information:**
- **Group Name**: Descriptive group identifier
- **Group Description**: Purpose and criteria for the group

**Store Selection:**
- **Store Search**: Search by store code or display address
- **Multi-Select**: Add multiple stores to a single group
- **Real-Time Counter**: View selected store count

### Common Store Group Types

**Geographic Groups:**
- Regional stores (North, South, East, West)
- City-specific groups
- State-wise organsation

**Performance Groups:**
- High-performing stores
- New store launches
- Underperforming locations requiring attention

**Operational Groups:**
- Franchise vs. company-owned
- Store size categories
- Brand-specific groups

### Access Keys

Access Keys manage point-of-sale system access and monitor store-level technical operations. This section tracks POS device connections, versions and transaction activity.

### Access Key Information

**Data Tracked:**
- **Store Details**: Associated store information
- **Store Code**: Unique store identifier
- **Access Key**: POS system authentication key
- **POS Name**: Point-of-sale device identifier
- **MAC ID**: Hardware device identifier
- **Version**: Software version information
- **BIT**: System architecture information
- **Last Transaction**: Most recent transaction timestamp
- **Last Updated**: Access key update timestamp
- **Status**: Connection and operational status

## Other Features

Store Management page also offers advanced features such as bulk upload, search, filter, export, reporting and integration with auto-engagement journeys and POS systems.

### Bulk Upload Operations

Bulk Upload functionality enables efficient addition of multiple stores through CSV file uploads, significantly reducing manual data entry time.

### Bulk Upload Process

**1. Configuration Setup:**
- **Select Company**: Choose the parent company for all stores
- **Select Brand**: Choose the associated brand for all stores
- **Select Store Type**: Choose Retail, E-Commerce or both

**2. File Preparation:**
- **Download Sample CSV**: Get the correct file format template
- **Prepare Data**: Fill in store information according to template
- **Validate Data**: Ensure all required fields are complete

**3. File Upload:**
- **Drag & Drop**: Drop CSV file into upload area
- **Browse Files**: Use file browser to select CSV
- **File Validation**: System validates file format and content

**4. Submit and Process:**
- **Review**: Confirm upload settings
- **Submit**: Process the bulk upload
- **Monitor**: Track upload progress and results

### CSV File Requirements

**Required Fields:**
- Store name and basic information
- Location details (address, city, state, PIN code)
- Contact information
- Store-specific identifiers

**Optional Fields:**
- Employee count
- Store size
- Additional contact numbers
- Custom links
- Compliance numbers

**Data Validation:**
- All required fields must be populated
- Geographic data validated against system standards
- Contact numbers verified for format
- Duplicate store codes prevented

### Search and Filter Functionality

You can search and filter your stores with dynamic options.

### Search Capabilities

**Global Search:**
- Search across all store management sections
- Find stores by name, code or address
- Quick access to specific entities

**Section-Specific Search:**
- Company search by name or incharge
- Brand search by name or category
- Store search by multiple criteria
- Group search by name or description

### Filter Options

**Status Filtering:**
- Active vs. inactive stores
- Operational status tracking
- Performance-based filtering

**Geographic Filtering:**
- Filter by country, state or city
- Regional store management
- Location-based operations

**Brand and Company Filtering:**
- Multi-brand portfolio management
- Company-specific views
- Hierarchical filtering

### Export and Reporting

You can export store data and generate reports for business requirements.

### Data Export

**Export Formats:**
- CSV format for data analysis
- Excel compatibility for reporting
- Bulk data extraction capabilities

**Export Options:**
- Complete dataset exports
- Filtered data exports
- Custom field selection
- Scheduled exports

### Reporting Integration

**Business Intelligence:**
- Store performance analytics
- Geographic distribution reports
- Brand-wise performance tracking
- Operational efficiency metrics

**Compliance Reporting:**
- Tax compliance status
- License expiration tracking
- Legal documentation status
- Audit trail maintenance

### Integration Capabilities

You can integrate stores and store groups with AutoEngagement Journeys and POS System.

### AutoEngagement Integration

**Audience Targeting:**
- Use store groups for campaign targeting
- Brand-specific engagement campaigns
- Geographic campaign distribution
- Store performance-based targeting

**Campaign Management:**
- Leverage store hierarchy for campaigns
- Brand-consistent messaging
- Location-specific promotions
- Group-based communication strategies

### POS System Integration

**Access Management:**
- Secure key distribution
- Device authentication
- Version control management
- Activity monitoring

**Transaction Processing:**
- Real-time transaction tracking
- Store-level performance monitoring
- System health management
- Operational analytics
