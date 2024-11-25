<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSINESS PERMIT RECEIPT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
    <body >
        <div class="card">
            <div class="card-body">
              <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                  <div class="col-xl-9">
                    <p style="color: #7e8d9f;font-size: 20px;">Invoice &gt;&gt; <strong>ID: {{$pdfdata->id}}</strong></p>
                  </div>
                </div>
                <hr>
                <div class="container">
                  <div class="col-md-12">
                    <div style="text-align: center">
                        <h2>DocuMate</h2>
                        <h4>Bussiness Permit Receipt</h4>
                    </div>
                  </div>
                  <hr>
                  <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                      <!-- Left Column -->
                      <td style="width: 66.666%; padding: 10px; border: 1px solid #ccc;">
                        <h3>To:</h3>
                        <p>{{$pdfdata->firstname}}&ensp;{{$pdfdata->lastname}}</p>
                        <p>{{$pdfdata->email}}</p>
                        <p>{{$pdfdata->adddress}}&ensp;{{$pdfdata->town}}</p>
                        <p>{{$pdfdata->city}}&ensp;{{$pdfdata->country}}&ensp;{{$pdfdata->zip}}</p>
                      </td>
                      
                      <!-- Right Column -->
                      <td style="width: 33.333%; padding: 10px; border: 1px solid #ccc;">
                        <h3>Invoice</h3>
                        <p><strong>Invoice NO: </strong> {{$pdfdata->invoiceno}}</p>
                        <p><strong>Creation Date:</strong> {{$pdfdata->created_at}}</p>
                        <p><strong>Status:</strong> <span style="color: orange;">PAID</span></p>
                      </td>
                    </tr>
                  </table>
                  <hr>
                  <div class="row my-2 mx-1 justify-content-center">
                    <div class="col-md-7 mb-4 mb-md-0">
                      <h4><b>PRODUCTS</b></h4>
                      <hr>
                      <p>{{$pdfdata->productname}}</p>
                      <p><b>{{$pdfdata->amount}}</b></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-xl-8">
                      <p class="ms-3">Add additional notes and payment information</p>
                    </div>
                    <p><b>Payment Method: {{$pdfdata->paymentmethod}}</b></p>
                    <p>Name on Card: {{$pdfdata->namecard}}</p>
                    <p>Account Number: {{$pdfdata->acctnumber}}</p>
                    <div class="col-xl-3">
                      <ul class="list-unstyled">
                        <li class="text-muted ms-3"><span class="text-black me-4">SubTotal: &ensp;</span>{{$pdfdata->amount}}</li>
                      </ul>
                      <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><br><span
                          style="font-size: 25px;">{{$pdfdata->amount}}</span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </body>
</html>