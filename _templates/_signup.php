<?
$signup = false;
// print_r($_POST);
if(isset($_POST['email_address']) and isset($_POST['pass']) and isset($_POST['username']) and isset($_POST['Phone'])){
  $email = $_POST['email_address'];
  $password = $_POST['pass'];
  $username=$_POST['username'];
  $phone=$_POST['Phone'];
  $result = signup($username,$password,$email, $phone);
  $signup = true;
}
if($signup)
{
  if($result){?>
    <main class="container">
      <div class="bg-light p-5 rounded">
        <h1>Signup Success</h1>
        <a class="btn btn-lg btn-primary" href="login.php" role="button">Login Here</a>
      </div>
    </main>
  <?}
  else{
    ?>
    <main class="container">
      <div class="bg-light p-5 rounded">
        <h1>Signup Fail</h1>
        <p class="lead" >Something went wrong <?=$error?></p>
        <a class="btn btn-lg btn-primary" href="signup.php" role="button">Signup Here</a>
      </div>
    </main>
  <?}
}
else
{?>
<form method="post" action="signup.php">
    <img class="mb-4" src="assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Signup Here</h1>
    <div class="form-floating">
      <input name="username"type="text" class="form-control" id="floatingInputUsername" placeholder="Username">
      <label for="floatingPassword">Username</label>
    </div>
    <div class="form-floating">
      <input name="Phone" type="text" class="form-control" id="floatingInputphone" placeholder="PhoneNumber">
      <label for="floatingPassword">Phone</label>
    </div>
    <div class="form-floating">
      <input name="email_address" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="pass"type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    
    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
  </form>
<?
}?>