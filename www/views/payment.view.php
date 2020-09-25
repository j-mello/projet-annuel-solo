<?php

use secretshop\core\Helper;
//require_once('./../config.php');
?>
<h1 class="text-center">Paiement</h1>

<div class="container">
    <div class="billing_details">
        <div class="row">
            <div class="col-lg-8">
                <h3>Paiement</h3>
                <form class="row contact_form" action="<?= Helper::getUrl('Checkout','payment') ?>" method="POST" id='payment-form'>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="firstname" name="firstname">
                        <span class="placeholder" data-placeholder="First name"></span>
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="lastname" name="lastname">
                        <span class="placeholder" data-placeholder="Last name"></span>
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="hidden" class="form-control" id="price" name="price" value="<?= $totalPrice ?>">
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="creat_account">
                            <div class="form-group">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                        </div>
                    </div>
                    <button class='primary-btn my-3' id='complete-order' type="submit">Procéder au paiement</button>
                </form>
            </div>

            <div class='col-lg-4'>
                <h2>Facture</h2>
                <h3>Les produits :</h3>
                <ul class="list">
                    <?php foreach($products as $product): ?>
                        <li><?= $product->getName()." (".$product->getPrice()." €)" ?></li>
                    <?php endforeach; ?>
                </ul>
                Prix total : <?= $totalPrice ?> €
            </div>
        </div>
    </div>
</div>

<script>
    // Create a Stripe client.
let stripe = Stripe('pk_test_51H1Z9XA4txFW05KBDkgEF4GHU7CVAovpIFXeGSex5F97uDlLtDxkhc7SSdxNJ6Au6jvxpS9vfpRp38NG4Kpb5Ldh00URrLJGQx');

// Create an instance of Elements.
let elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
let style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
let card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  let displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
let form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  let options = {
      firstname: document.getElementById('firstname').value,
      lastname: document.getElementById('lastname').value,
  }

  console.log(options);

  stripe.createToken(card, options).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      let errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  let form = document.getElementById('payment-form');
  let hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>