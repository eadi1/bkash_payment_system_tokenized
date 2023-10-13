<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bKash Payment Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #77746a;
            color: white;
            text-align: center;
            border-radius: 15px 15px 0 0;
        }


        .btn-bkash:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning">
                        <img src="bkash.svg" alt="bKash Logo" width="100">
                        <h4 class="mt-2">bKash Payment</h4>
                    </div>
                    <div class="card-body">
                   
                           
                            <div class="form-group">
                                <label for="amount">Amount (BDT)</label>
                                <input type="number" class="form-control" id="amount" value="125" readonly>
                            </div>
                            <br>
                            <button id="payButton" class="btn btn-bkash btn-block btn-warning">Pay with bKash</button>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#payButton").click(function () {
                
                // api And amount filed if you want change it this is sandbox
                var amount = $("#amount").val();
                var app="4f6o0cjiki2rfm34kfdadl1eqq";
                var baseUrl="https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/";
                var app_secret="2is7hdktrekvrbljjh44ll3d9l1dtjo4pasmjvs5vl5qr3fug4b";
                var password="sandboxTokenizedUser02@12345";
                var username="sandboxTokenizedUser02";
                
                // Make an AJAX call to token.php to obtain the token
                $.get("token.php",{
                    baseURL:baseUrl,
                    app_secret:app_secret,
                    password:password,
                    username:username,
                    app:app
                },function(data2, status){
                   
                    $.get("create.php",{
                    baseURL:baseUrl,
                    token:data2,
                    app:app,
                    amount:amount
                },function(data, status){
         window.location.href=data;

    });
                // window.location.href="create.php?token="+data+"&app_key="+app+"&amount="+amount;

    });


            });
        });
    </script>
</body>

</html>
