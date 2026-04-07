---
title: Razorpay DataSync FAQs
description: FAQs on DataSync
---

# Razorpay DataSync FAQs

## Razorpay DataSync - Frequently Asked Questions

Find answers to common questions about Razorpay DataSync, including technical details, troubleshooting guidance, and operational information.

   
### FAQ 1

       your answer
      

   
### FAQ 2

       your answer
      

### What is Razorpay DataSync?

Razorpay DataSync is a data streaming platform that enables businesses to transfer payment, transaction, and settlement data directly to their data warehouses, either in real-time (for unprocessed data) or with latency (for processed data).

DataSync automates data handling, reduces operational overhead, and eliminates the need for manual report downloads and uploads.

### How does Razorpay DataSync work?

DataSync streams both raw and processed data from Razorpay's systems to your data warehouse (Snowflake, Redshift, BigQuery, or Kafka).

**For Processed Data:**
- Razorpay processes and structures the data
- System shares data to your warehouse via secure private network
- System delivers updates with 24-hour latency
- Zero integration effort required from your end

**For Real-time Data:**
- System captures raw transaction events in real-time
- Kafka infrastructure streams data
- Data available in less than 1 minute
- Requires ETL setup if consuming from Kafka

This process automates data handling, reduces latency, and ensures data security, accuracy, and integrity.

### What capabilities does DataSync provide?

**For Real-time Data Sync:**
- Instantaneous access to data (less than 1 minute)
- No API integration needed
- Real-time transaction monitoring
- Fraud detection capabilities

**For Processed Data Sync:**
- Zero integration effort (no engineering/DevOps support needed)
- Quick setup: Less than an hour for POC, less than a day for full setup
- No manual downloads/uploads from dashboard or S3
- Automated report delivery
- Secure data transfer process

### How does DataSync differ from manual processes?

**Manual Process:**
- Download reports from dashboard
- Manually upload to data warehouse
- Process and clean data
- High manual effort
- Significant operational overhead

**DataSync:**
- Direct streaming to warehouse
- Automated processing and delivery
- Minimal human intervention
- Real-time access option available
- Secure private network transfer

DataSync provides data streaming directly to your warehouse, reducing manual errors, operational complexity, and processing overheads.

---

## Technical Questions

### What types of data can DataSync stream?

**Processed Datasets:**
- Reporting data and fact files
- Optimiser data
- Reconciliation SaaS data
- Settlement information
- Custom reporting datasets

**Real-time Raw Data:**
- Payment events
- Transaction data
- Settlement events
- Status updates
- Refund information
- Dispute data

Stream all data to Snowflake, Redshift, BigQuery, or Kafka based on your preference.

### Which data warehouses and destinations does DataSync support?

**For Processed Data:**
- Snowflake (self-serve onboarding)
- Redshift (self-serve onboarding)
- BigQuery (manual setup via support)

**For Real-time Data:**
- Kafka cluster
- Snowflake
- Redshift
- BigQuery

### How does DataSync handle data security?

DataSync implements multiple layers of security:

**Encryption:**
- Razorpay encrypts data in transit using TLS 1.2+
- Razorpay encrypts data at rest in your warehouse
- System uses secure private network for all transfers

**Authentication:**
- Warehouse-level authentication protocols
- Role-based access control
- Dedicated data isolation per merchant

**Privacy:**
- No PII (Personally Identifiable Information) transmitted
- Data ownership remains with merchant
- GDPR and data protection compliant
- Complete audit trail for compliance

**Network Security:**
- Transfer over secure private network
- No data exposure to public internet
- Dedicated connections for enterprise customers

### What latency does DataSync provide for data streaming?

**Processed Data:** 24-hour delay from transaction time

**Real-time Data:** Less than 1 minute from transaction occurrence

Latency depends on whether you need processed (structured and cleaned) or raw (unprocessed) data.

### What system requirements must I meet to use DataSync?

**For Processed Data (Must Have):**

**Snowflake:**
- Active Snowflake account
- Account ID
- Permission to accept data shares

**Redshift:**
- AWS Account ID
- Cluster must be:
  - Serverless, OR
  - ra3 instance type with encryption enabled
- Permission for cross-account access

**BigQuery:**
- Active BigQuery account
- Ability to deploy a script (minimal DevOps effort)
- Contact support for setup

**For Real-time Data:**

**Kafka Option:**
- Dedicated Kafka cluster
- ETL jobs to extract data from cluster
- Development resources for integration

**Warehouse Option:**
- Same requirements as processed data above
- No additional ETL infrastructure needed

---

## Implementation Questions

### How long does DataSync implementation take?

**Processed Data Sync:**
- POC setup: Less than 1 hour
- Full setup: Less than 1 day
- First data delivery: Within 24 hours of activation
- Engineering effort from your end: Zero

**Real-time Data Sync:**
- Full implementation: 2-3 weeks
- Includes: Initial setup, configuration, testing, and go-live
- First data delivery: Immediate after go-live
- Engineering effort: ETL setup required if using Kafka

Timeline may vary based on specific requirements, existing infrastructure, and customisation needs.

### How does the integration process work?

**For Processed Data (Self-Serve):**
1. Access DataSync from Razorpay Dashboard
2. Select warehouse destination (Snowflake/Redshift)
3. Enter warehouse credentials
4. Select datasets and MIDs
5. Accept sample data share in your warehouse
6. Verify connection and activate
7. Data sync begins within 24 hours

Razorpay's technical team handles all backend configuration automatically.

**For Real-time Data (Manual Setup):**
1. Contact DataSync support team
2. Share warehouse details or Kafka cluster information
3. Technical team configures streaming pipeline
4. Connection testing with sample data
5. ETL setup (if consuming from Kafka)
6. Full activation after successful testing

For BigQuery syncs, deploy a script at your end (minimal DevOps effort).

### Can I customise DataSync configuration?

Yes, DataSync offers flexibility in several areas:

**Customisable Options:**
- Dataset selection (reporting, optimiser, reconciliation, settlements, etc.)
- MID selection for multi-account organisations
- Data retention periods
- Sync frequency
- Data encryption options

**Enterprise Customisation:**
- Custom data transformations
- Advanced filtering logic
- Multi-region support
- Custom approval workflows
- Integration with internal systems

Contact support to discuss specific customisation requirements. Additional costs may apply for advanced customisations.

### Does DataSync offer a trial period or POC?

Yes, DataSync offers a **1-month Proof of Concept (POC)** for evaluation.

**POC Details:**
- Full feature access
- Sample data sync to your warehouse
- Technical support included
- No long-term commitment
- Evaluate setup and data quality

**POC Timeline:**
- Processed data: POC setup in less than 1 hour
- Real-time data: POC setup in 2-3 weeks

Contact support to request a POC.

---

## Use Cases

### What are common use cases for DataSync?

**Real-time Transaction Monitoring**
- Monitor payment success rates
- Track settlement timelines
- Alerts for failed transactions

**E-commerce Order Processing**
- Verify payment before order fulfilment
- Reduce COD failures
- Automated order confirmation

**Fraud Detection**
- Build custom fraud detection models
- Monitor suspicious patterns in real-time
- Immediate corrective actions

**Reconciliation**
- Automated daily reconciliation
- Eliminate manual downloads and uploads
- Faster financial closing

**Data Access & Analytics**
- Direct access in existing BI tools
- Custom SQL queries on payment data
- Build dashboards without data migration
- Real-time reporting

**Infrastructure Optimisation**
- No API integration maintenance
- Reduced ETL pipeline costs
- Lower operational overhead

---

## Pricing & Commercial Questions

### What pricing model does DataSync use?

Contact Support to know about the different subscription plans and pricing.

Pricing depends on:
- Transaction volume
- Selected datasets
- Destination warehouse
- Subscription duration

Reach out to your account manager or DataSync support for detailed pricing information based on your specific requirements.

### Are there additional costs associated with DataSync?

Additional costs may apply for:
- Advanced customisation beyond standard features
- Enhanced support packages
- Extended data retention periods
- Historical data backfill
- Multi-region deployments
- Custom data transformations

Standard pricing covers:
- Self-serve onboarding
- Standard dataset syncs
- 90-day data retention
- Standard support
- Regular feature updates

Contact support for detailed pricing on additional features.

### How does billing work?

**Payment Integration:**
- System automatically deducts fees from monthly settlements or merchant balance with Razorpay
- Seamless integration with existing billing

**Billing Cycles:**
- Monthly or annual subscriptions available
- Annual subscriptions typically offer discounts
- Flexible billing terms for enterprise customers

**Invoicing:**
- Monthly invoices via Razorpay Dashboard
- Detailed usage breakdown
- GST included in all pricing

---

## Support & Troubleshooting

### Who should I contact for issues, queries, or support?

**Primary Contacts:**

**Product Team:**
- Aditi Maheshwari: aditi.maheshwari@razorpay.com

**Data Engineering Team:**
- Narendra Kumar: narendra.kumar@razorpay.com

**Escalations:**
- Vivek Agarwal: vivek.agarwal@razorpay.com
- Anand A: anand.na@razorpay.com
- Vijaypal Singh: vijaypal.singh@razorpay.com

**General Support:**
- Email: datasync-support@razorpay.com
- Dashboard: Raise tickets directly from DataSync dashboard

### What support does Razorpay provide?

**During Implementation:**
- Setup assistance
- Configuration guidance
- Testing support
- Sample data validation
- Connection troubleshooting
- Documentation and training materials

**Post-Implementation:**
- Ongoing technical assistance
- Troubleshooting and debugging
- Performance optimisation guidance
- Configuration change support
- Regular product updates
- Feature enhancement guidance

**Support Channels:**
- Email support
- Dashboard-based ticket system
- Documentation portal
- For enterprise: Dedicated account manager

### What should I do if my sync fails?

**Immediate Steps:**

1. **Check Dashboard Status:**
   - View error message in DataSync dashboard
   - Review sync history logs
   - Check for pattern in failures

2. **Verify Warehouse Connectivity:**
   - Ensure warehouse is accessible
   - Check credentials haven't changed
   - Verify network connectivity

3. **Review Recent Changes:**
   - Check if warehouse configuration changed
   - Verify permissions remain valid
   - Confirm no infrastructure changes

4. **Retry Connection:**
   - Dashboard provides retry option
   - System automatically retries transient failures
   - Manual retry available for persistent issues

5. **Contact Support:**
   - If issue persists after retries
   - Provide error logs from dashboard
   - Share recent configuration changes

**Common Causes:**
- Warehouse credentials expired or changed
- Network connectivity issues
- Warehouse capacity or performance issues
- Permission changes in warehouse
- Maintenance windows

### Why am I not seeing expected data in my warehouse?

**Troubleshooting Checklist:**

1. **Verify Configuration:**
   - Check that expected MIDs are selected
   - Confirm datasets include the data you need
   - Review sync frequency settings

2. **Check Sync Status:**
   - Ensure sync completed successfully
   - Review last successful sync timestamp
   - Check for failed syncs in history

3. **Confirm Data Timing:**
   - Processed data has 24-hour latency
   - Check transaction timestamps vs sync time
   - Verify data falls within selected date range

4. **Review Warehouse:**
   - Verify you're querying correct database/schema
   - Check data share was accepted properly
   - Confirm permissions to view data

5. **Validate Data Retention:**
   - Check if data exceeds retention period
   - Review retention policy in configuration

**Still Not Resolved?**

Contact support with:
- Missing data details (date range, MIDs, dataset)
- Sync history logs
- Example query you're running

### How do I optimise DataSync performance?

**Best Practices:**

**1. Select Only Needed Datasets:**
- Reduce sync scope to essential datasets
- Remove unused datasets from configuration
- Improves sync speed and reduces costs

**2. Optimise Warehouse:**
- Ensure adequate warehouse capacity
- Optimise table structures and indexes
- Consider warehouse scaling for large volumes

**3. Configure Appropriate Sync Frequency:**
- Align frequency with business needs
- More frequent syncs increase load
- Daily is recommended for most use cases

**4. Monitor Usage Metrics:**
- Review dashboard performance metrics
- Track sync duration trends
- Identify and address anomalies

**5. Manage MID Selection:**
- Include only active merchant accounts
- Remove dormant MIDs
- Reduces data volume and improves performance

**For Enterprise:**
- Contact support for performance review
- Discuss infrastructure optimisation
- Consider dedicated sync infrastructure

### What happens if my warehouse is temporarily unavailable?

**Automatic Retry:**
- DataSync automatically retries failed deliveries
- Multiple retry attempts over several hours
- Exponential backoff to avoid overwhelming warehouse

**Data Queuing:**
- System queues data during warehouse downtime
- System delivers data once warehouse becomes available
- No data loss during temporary outages

**Notification:**
- System sends alert when sync failures occur
- Status visible in dashboard
- Email notification for extended outages

**Resolution:**
- Once warehouse is back online, acknowledge in dashboard
- System automatically resumes sync
- System delivers backfill for missed data in next cycle

**Best Practices:**
- Schedule warehouse maintenance during low-activity periods
- Notify DataSync support of planned downtime
- Monitor sync status after maintenance

---

## Data & Configuration Questions

### Can I sync to multiple warehouses simultaneously?

No, each Razorpay account syncs to only one warehouse destination at a time.

**To Switch Warehouses:**
1. Delete existing DataSync configuration
2. Data syncing stops immediately
3. Create new configuration for different warehouse
4. Complete setup and activation process
5. Sync begins to new destination

**Important Notes:**
- Historical data remains in old warehouse
- No automatic migration of data between warehouses
- New sync starts fresh in new destination
- Consider backfill options for historical data (contact support)

### Can I customise which data fields DataSync syncs?

**Dataset-Level Selection:** Yes, select which datasets to sync (payments, settlements, refunds, etc.)

**Field-Level Customisation:** Limited in self-serve. For specific field selection or custom transformations, contact support for enterprise customisation options.

**MID-Level Filtering:** Yes, select specific merchant IDs to include in sync.

### What data retention period does DataSync provide?

**Standard Retention:** 90 days in your warehouse

**Extended Retention:** Available upon request (additional costs may apply)

**In Your Warehouse:** Data persists according to your warehouse's own retention policies after DataSync delivers it.

**Historical Backfill:** Contact support for access to historical data beyond the standard retention period.

### Can I get historical data backfilled?

Yes, historical data backfill is available.

**Process:**
1. Contact DataSync support
2. Specify date range needed
3. Receive pricing quote (based on data volume)
4. Approve and schedule backfill
5. System delivers data to your warehouse

**Use Cases:**
- New DataSync setup requiring historical context
- Switching warehouses
- Data loss or migration scenarios
- Building historical analytics models

### How do I handle sensitive data or PII?

**DataSync Privacy Measures:**
- No PII transmitted through streaming process
- System masks payment instrument details
- System excludes customer personal information
- Compliance with GDPR and data protection regulations

**In Your Warehouse:**
- You control access to synced data
- Implement warehouse-level security policies
- Apply encryption and access controls
- Follow your organisation's data governance policies

**For Additional Security:**
- Contact support for custom data masking
- Discuss field-level encryption options
- Implement row-level security in warehouse

---

## Future Developments

### What new features does Razorpay plan for DataSync?

**Upcoming Enhancements:**

**Additional Destinations:**
- More cloud platforms and regions
- Additional BI tools integration
- Extended warehouse support

**Self-Serve Improvements:**
- BigQuery self-serve onboarding
- Kafka self-serve setup
- Enhanced UI for configuration management

**Feature Additions:**
- Improved customisation options
- Advanced filtering and transformation
- Real-time monitoring dashboards
- Enhanced alerting capabilities

**Optimisation:**
- Further reduction in latency
- Improved data transfer efficiency
- Enhanced scalability
- Performance improvements for high-volume merchants

The product roadmap evolves based on merchant feedback and market needs.

---

## Getting Started

### How do I get started with DataSync?

**Step-by-Step:**

1. **Verify Prerequisites:**
   - Ensure you have Snowflake, Redshift, BigQuery, or Kafka
   - Confirm your infrastructure meets technical requirements
   - Gather necessary credentials

2. **Access Dashboard:**
   - Log in to Razorpay Dashboard
   - Navigate to Settings → Data & Reports → DataSync

3. **Start Onboarding:**
   - Click "Get Started"
   - Follow self-serve wizard for Snowflake/Redshift
   - For BigQuery/Kafka, contact support

4. **Complete Setup:**
   - Enter warehouse credentials
   - Select datasets and MIDs
   - Accept sample data share
   - Verify and activate

5. **Monitor & Use:**
   - Data available within 24 hours
   - Access from your warehouse
   - Build analytics and reports

**Need Help?**
- Email: datasync-support@razorpay.com
- Request demo or POC
- Contact your account manager

---

## Additional Resources

### Where can I find more information?

**Documentation:**
- [DataSync Overview](#)
- [Dashboard Guide](#)
- Technical specifications (contact support)

**Support:**
- Email: datasync-support@razorpay.com
- Dashboard: Raise ticket from DataSync section
- Account manager for enterprise customers

**Learning Resources:**
- Best practices guide (contact support)
- Integration examples and templates

For questions not covered here, contact the DataSync support team.
