<div>
    <div class="container-sm px-5">
        
          <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{'/storage/images/DocuMate-t.png'}}" alt="" width="144" height="114">
            <h2>Bussiness Permit <br> Checkout Form</h2>
            <p class="lead">Thank you for your purchase! We appreciate your business</p>
          </div>
      
          <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Your cart</span>
                <span class="badge bg-primary rounded-pill">1</span>
              </h4>
              <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                  <div>
                    <h6 class="my-0">Product name</h6>
                    <small class="text-body-secondary">Bussiness Permit</small>
                  </div>
                  <span class="text-body-secondary">P 1000</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span>Total (PHP)</span>
                  <strong>P 1000</strong>
                </li>
              </ul>
      
            </div>
            <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" wire:submit.prevent="saveBilling">
                <div class="row g-3">
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">First name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" wire:model="firstName" required>
                    <div class="invalid-feedback">
                      Valid first name is required.
                    </div>
                  </div>
      
                  <div class="col-sm-6">
                    <label for="lastName" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" wire:model="lastName" required>
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>
      
                  <div class="col-12">
                    <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" name="email" wire:model="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>
      
                  <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" wire:model="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="town" class="form-label">Town</label>
                    <input type="text" class="form-control" id="town" name="town" wire:model="town" placeholder="barotac nuevo" required>
                    <div class="invalid-feedback">
                      Please enter your town.
                    </div>
                  </div>
      
                  <div class="col-md-4">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" wire:model="city" placeholder="iloilo" required>
                    <div class="invalid-feedback">
                      Please provide a valid city.
                    </div>
                  </div>
      
                  <div class="col-md-5">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" wire:model="country" placeholder="philippines" required>
                    <div class="invalid-feedback">
                      Please select a valid country.
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="zip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="zip" name="zip" wire:model="zip" required>
                    <div class="invalid-feedback">
                      Zip code required.
                    </div>
                  </div>
                </div>
      
                <hr class="my-4">
      
                <h4 class="mb-3">Payment</h4>
      
                <div class="my-3">
                  <div class="form-check">
                    <input id="credit" name="paymentMethod" type="radio" wire:model="paymentMethod" value="credit" class="form-check-input" onchange="togglePayFields(this)" required>
                    <label class="form-check-label" for="credit">Credit card</label>
                  </div>
                  <div class="form-check">
                    <input id="debit" name="paymentMethod" type="radio" wire:model="paymentMethod" value="debit" class="form-check-input" onchange="togglePayFields(this)" required>
                    <label class="form-check-label" for="debit">Debit card</label>
                  </div>
                  <div class="form-check">
                    <input id="gcash" name="paymentMethod" type="radio" wire:model="paymentMethod" value="gcash" class="form-check-input" onchange="togglePayFields(this)" required>
                    <label class="form-check-label" for="gcash">Gcash</label>
                  </div>
                </div>
                <!--for payment-->
                <div id="payField" class="row gy-3" style="display: none">
                  <div class="col-md-6">
                    <label for="nameOnCard" class="form-label">Name on card</label>
                    <input type="text" class="form-control" id="nameOnCard" name="nameOnCard" wire:model="nameOnCard">
                    <small class="text-body-secondary">Full name as displayed on card</small>
                    <div class="invalid-feedback">
                      Name on card is required
                    </div>
                  </div>
      
                  <div class="col-md-6">
                    <label for="acctnumber" class="form-label">Card number</label>
                    <input type="text" class="form-control" id="acctnumber" name="acctnumber" wire:model="acctnumber">
                    <div class="invalid-feedback">
                      Credit card number is required
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="expiration" class="form-label">Expiration</label>
                    <input type="text" class="form-control" id="expiration" name="expiration" wire:model="expiration">
                    <div class="invalid-feedback">
                      Expiration date required
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="cvvSecurity" class="form-label">CCV</label>
                    <input type="text" class="form-control" id="cvvSecurity" name="cvvSecurity" wire:model="cvvSecurity" >
                    <div class="invalid-feedback">
                      Security code required
                    </div>
                  </div>
                </div>

                <div id="payFieldGcash" class="row gy-3" style="display: none;">
                    <div class="col-md-6">
                      <label for="nameGcash" class="form-label">Name on card</label>
                      <input type="text" class="form-control" id="nameGcash" name="nameGcash" wire:model="nameGcash">
                      <small class="text-body-secondary">Full name as displayed on card</small>
                      <div class="invalid-feedback">
                        Name on card is required
                      </div>
                    </div>
        
                    <div class="col-md-6">
                      <label for="gcashNumber" class="form-label">Gcash Number</label>
                      <input type="text" class="form-control" id="gcashNumber" name="gcashNumber" wire:model="gcashNumber">
                      <div class="invalid-feedback">
                        Credit card number is required
                      </div>
                    </div>
                </div>
                <hr class="my-4">
      
                <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
            </form>
            </div>
          </div>
    </div>
    <!--modal for receipt-->
    <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="receiptModalLabel">Receipt Preview</h1>
            <a href="{{route("documate.dashboard")}}" class="btn-close"></a>
          </div>
          @if ($receiptUrl)
              <!-- Display the PDF preview -->
              <iframe src="{{ $receiptUrl }}" style="width: 100%; height: 600px;" frameborder="0"></iframe>

              <!-- Provide a download link -->
              <a href="{{ $receiptUrl }}" class="btn btn-primary" download="Receipt.pdf">Download PDF</a>
          @endif
        </div>
      </div>
    </div>
</div>
@script
<script>
    $wire.$on('showReceiptModal', () => {
      $('#receiptModal').modal('show');
    });
</script>
@endscript