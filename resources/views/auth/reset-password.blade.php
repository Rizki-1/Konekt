<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

   @endif
   @if (session()->has('status'))
   <div class="alert alert-success">
    {{ session()->get('status')}}
   @endif
   </div>
    <form action="{{ route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ request()->token }}" id="">
        <input type="hidden" name="email" value="{{ request()->email }}" id="">
        <label for="password">Password</label>
        <input type="password"  class="form-control" name="password">
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        <input type="submit" value="Update password">
    </form>
</body>
</html>
