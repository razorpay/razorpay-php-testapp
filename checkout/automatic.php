<!--  The entire list of Checkout fields is available at
 https://docs.razorpay.com/docs/checkout-form#checkout-fields -->

<form action="verify.php" method="POST">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $keyId?>"
    data-amount="<?php echo $amount?>"
    data-currency="INR"
    data-name="Daft Punk"
    data-description="Purchase Description"
    data-image="../daft-punk.jpg"
    data-description="Tron Legacy"
    data-prefill.name="User Name"
    data-prefill.email="harshil@razorpay.com"
    data-prefill.contact="9999999999"
    data-notes.shopping_order_id="3456"
    data-order_id="<?php echo $razorpayOrderId?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $displayAmount?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $displayCurrency?>" <?php } ?>
  >
  </script>
  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="shopping_order_id" value="3456">
</form>