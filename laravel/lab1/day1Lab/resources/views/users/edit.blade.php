<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="{{ route('users.update') }}" method="post" id="userform">
    <h3>Hello user your id is  {{$id}}</h3>
  <div class="form-group">
     <label for="first_name">Your first Name</label>
     <input class="form-control" type="text" name="first_name" id="fullname">
  </div>

  <div class="form-group">
      <label for="email">Your E-Mail</label>
      <input class="form-control" type="text" name="email" id="email">
  </div>

  <div class="form-group">
      <label for="password">Your Password</label>
      <input class="form-control" type="password" name="password" id="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <input type="hidden" name="_token" value="{{ Session::token() }}">
</form>

</body>
</html>