var stripe = Stripe('pk_test_wykU4chNFN4qdf7EMZtO4BlU');
var elements = stripe.elements();

var card = elements.create('card');

// Add an instance of the card UI component into the `card-element` <div>
card.mount('#card-element');

// Create a token when the form is submitted.
var form = document.getElementById('checkout-form');
form.addEventListener('submit', function(e) {
  e.preventDefault();
  createToken();
});
function createToken() {
    stripe.createToken(card).then(function(result) {
      if (result.error) {
        // Inform the user if there was an error
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server
        stripeTokenHandler(result.token);
      }
    });
  };
  function stripeTokenHandler(token) {
    
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('checkout-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
  }

