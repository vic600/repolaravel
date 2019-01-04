paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'ASXITlHINMVA9B3PohP9l5TkleBv2VDOW6THiwuX6RVU9raWgh6lQobGkecJs6p1mIhg_PIsctUCqSFQ',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
          redirect_urls:{
              return_url:'http://payment.me/execute-pay'
          },
        transactions: [{
          amount: {
            total: '20',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.redirect();
    }
  }, '#paypal-button');
