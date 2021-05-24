var total = document.getElementById("amount").value;
paypal.Button.render(
  {
    // Configure environment
    env: "sandbox",
    client: {
      sandbox:
        "AfX1HvnlHboY9Rdr-XKoxlxHZBcOqv_7XmoN2ysf3woaDc6rV9pUlDfjZkPXzhqCK8qvlQz2pbJGa2xz",
      production: "demo_production_client_id",
    },
    // Customize button (optional)
    locale: "en_US",
    style: {
      size: "small",
      color: "blue",
      shape: "pill",
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function (data, actions) {
      return actions.payment.create({
        transactions: [
          {
            amount: {
              total: total,
              currency: "USD",
            },
          },
        ],
      });
    },
    // Execute the payment
    onAuthorize: function (data, actions) {
      return actions.payment.execute().then(function () {
        // Show a confirmation message to the buyer
        window.location.href =
          "http://localhost:8888/tostinh/public/thankyou.php";
      });
    },
  },
  "#paypal-button"
);
