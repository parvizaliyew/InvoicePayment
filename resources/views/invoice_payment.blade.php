<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front/') }}/style.css">
    <title>Document</title>
</head>
<body>
  <div class="container d-flex justify-content-center col-md-12">
    <div class="mx-auto mb-3">
      <form action="{{ route('invoice_post') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{  $user->id }}">
        <input type="hidden" name="service_id" value="{{  $service->id }}">
        <div class="col-md-12 text-center" value="">
          <h4 class="mt-5">{{ $user->name .'  '. $user->surname.'  '.$user->father_name }}</h4>
          <p class="mt-5">{{ $service->name }}</p>
          <span class="amount">{{ $service->amount }} грн </span>
          <div class="d-flex justify-content-center mt-5 ">
            <button type="submit" class="btn btn-primary btn-block mt-4 custom-width ">оплатить</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  
</body>
</html>