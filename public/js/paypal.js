var total = document.getElementById("amount").value;
// Render the PayPal button into #paypal-button-container
paypal
  .Buttons({
    style: {
      size: "small",
      color: "blue",
      shape: "pill",
      label: "checkout",
    },

    // Set up the transaction
    createOrder: function (data, actions) {
      return actions.order.create({
        purchase_units: [
          {
            amount: {
              value: total,
            },
          },
        ],
      });
    },

    onApprove: function (data, actions) {
      return actions.order.capture().then(function (details) {
        // Show a success message to the buyer
        var amt = total;
        var cc = details.payer.address.country_code;
        var tx = details.id;
        var st = details.status;
        var url =
          "http://localhost:8888/tostinh/public/thankyou.php" +
          "?amt=" +
          amt +
          "?cc=" +
          cc +
          "?tx=" +
          tx +
          "?st=" +
          st;
        window.location.replace(url);
      });
    },
    onCancel: function (data) {
      window.location.href("http://localhost:8888/tostinh/public/cancel.php");
    },
  })
  .render("#paypal-payment-button");
