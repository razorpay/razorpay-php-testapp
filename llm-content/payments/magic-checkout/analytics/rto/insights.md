---
title: RTO Insights | Razorpay Magic Checkout
heading: RTO Insights
description: Find insights about cost savings, risky ZIP codes and IP addresses. Take actions using Razorpay Magic Checkout.
---

# RTO Insights

View information about cost savings, risky ZIP codes and IP Addresses and take specific actions as required. You can generate data for a selected period of up to the last 90 days. 

> **WARN**
>
> 
> **Watch Out!**
> 
> - We recommend integrating with logistics partners like [Shiprocket](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/shiprocket.md), [Delhivery](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/delhivery.md), [Unicommerce](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/unicommerce.md), [ClickPost](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/clickpost.md) and  [iThink Logistics](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/ithink-logistics.md) to reflect the data on the widget. 
> 
> - You can only view these widgets.
> 

## Widgets

The following widgets are available in the **RTO Insights** tab of the [RTO Analytics Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/analytics/rto.md). Check which widgets are applicable when you opt either for: 
- COD Intelligence.
- Manual review of COD Orders.

Widget | COD Intelligence | Manual review of COD Orders
---
[Cost saved by COD Intelligence](#cost-saved-by-cod-intelligence) | ✓ | x 
---
[Cost Saved Due to Manual Review of COD Orders](#cost-saved-due-to-manual-review-of-cod-orders) | x | ✓
---
[RTO Orders by ZIP codes and IP Addresses](#rto-orders-by-ZIP codes-and-ip-addresses) | ✓ | ✓ 

## Cost Saved by COD Intelligence

The following chart provides insights only when you opt for **COD Intelligence** in the **Settings** section. It displays how much shipping cost you have saved as COD Intelligence blocked risky RTO orders. 

You can filter the data to display it on a **Daily**, **Weekly** or **Monthly** basis. Hover over the graph for more details. 

![RTO Analytics cost saved by COD intelligence graph](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rto-cost-saved-cod.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> The default shipping charge is ₹75. You can enter your average shipping charge in the field.
>     ![RTO Analytics customise shipping charge](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rto-cost-saved-cod-charges.jpg.md)
> 

## Cost Saved Due to Manual Review of COD Orders 

The following chart provides insights only when you opt for **Manual review of COD orders** in the **Settings** section.

The **Cost saved due to manual review of COD orders** widget shows the trend of cost saved. You can view the data **Daily**, **Weekly** or **Monthly**.

![RTO cost savings via manual review](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rto-manual-review-cost-saved.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> [Automate](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/order-settings/review-cod-orders/workflow#how-it-works.md) your manual review process or let COD Intelligence handle your COD Orders. Know more about the [RTO Analytics Dashboard for COD Intelligence](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/analytics/rto.md). 
> 

## RTO Orders by ZIP codes and IP Addresses

The following widget is available when you opt for either **COD Intelligence** or **Manual review of COD orders** in the **Settings** section.

This tab displays the RTO orders at the zipcode (PIN code) and IP address level. These are sorted based on the **RTO risk %**. You can also view the total number of orders shipped and returned for each zipcode and IP address.

![RTO Orders by ZIP codes and IP addresses](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rto-zipcode-ip-address.jpg.md)

You can block or unblock COD orders for a zipcode or an IP address. Orders from these ZIP codes or IP addresses will not be eligible for COD in the future. Click **next** to view more data.

### Related information

- [Risk Report](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/analytics/rto/risk-report.md) 
- [Manually Review COD Orders](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/order-settings/review-cod-orders.md)
