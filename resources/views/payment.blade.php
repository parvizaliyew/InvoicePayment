<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front/') }}/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
  <div class="container  justify-content-center col-md-5">
    <div id="statusDiv"></div><br>
    <div class="mx-auto mb-3">
      <form action="{{ route('payment_post') }}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="{{ $_GET['order_id'] }}">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="mb-3">
                        <input placeholder="номер карты " class="form-control" type="text" name="number_card">
                    </div>
                    @error('number_card')
                    <span class="text-danger mt-2">{{ $message }}</span> 
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <input placeholder="MM/yyyyy" class="form-control" type="text" name="date">
                    </div>
                    @error('date')
                    <span class="text-danger mt-2">{{ $message }}</span> 
                    @enderror
                </div>


                <div class="col-md-6">
                    <div class="mb-3">
                        <input placeholder="cvv" class="form-control"  name="cvv">
                    </div>
                    @error('cvv')
                    <span class="text-danger mt-2">{{ $message }}</span> 
                    @enderror
                </div>                
            </div>
            

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="mb-3">
                        <input placeholder="фио" class="form-control" type="text" name="фио">
                    </div>
                    @error('фио')
                    <span class="text-danger mt-2">{{ $message }}</span> 
                    @enderror
                </div>               
            </div>
      

        
          <div class="d-flex justify-content-center mt-5 ">
            <button type="submit" class="btn btn-primary btn-block mt-4 custom-width p-3 ">оплатить</button>
        </div>
      </form>
    </div>
  </div>
  
  
<script>
$(document).ready(function() {
    var status = "{{ session('status') }}"; 
    
    var statusDiv = $("#statusDiv"); 
    
    if (status === '1') {
        statusDiv.text("Successful").css("color", "green");
    } else if (status === '2') {
        statusDiv.text("Not enough money").css("color", "red");
    } else if(status=== '-1') {
        statusDiv.text("The bank rejected the payment").css("color", "red");
    }
});
</script>

</body>
</html>