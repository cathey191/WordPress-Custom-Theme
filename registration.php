<?php
  /* Template Name: Registration Form */
?>

<?php
  get_header();

  global $wpdb;

  if ($_POST) {

    $email = $wpdb->escape($_POST['email']);
    $username = $wpdb->escape($_POST['username']);
    $password = $wpdb->escape($_POST['password']);
    $conpassword = $wpdb->escape($_POST['conpassword']);

    $error = array();

    if (strpos($username, ' ') != false) {
      $error['username_space'] = 'Username has space';
    } else if (empty($username)) {
      $error['username_empty'] = 'Username is empty';
    } else if (username_exists($username)) {
      $error['username_exists'] = 'Username exists already';
    }

    if (!is_email($email)) {
      $error['email_valid'] = 'Email is not valid';
    } else if (email_exists($email)) {
      $error['email_exists'] = 'Email exists already';
    }

    if (strcmp($password, $conpassword) !== 0) {
      $error['password'] = 'Password must match';
    }

    print_r($error);

    if (count($error) == 0) {
      wp_create_user($username, $password, $email);
      echo 'User Created Successfully';
      exit();
    } else {
      print_r($error);
    }

  }

?>

  <div class="container">
    <form class=""  method="post">
      <div class="form-group row">
        <label for="email" class="col-2 col-form-label">Email</label>
        <div class="col-10">
          <input class="form-control" type="email" name="email" id="email" placeholder="Email">
        </div>
      </div>

      <div class="form-group row">
        <label for="username" class="col-2 col-form-label">Username</label>
        <div class="col-10">
          <input class="form-control" type="text" name="username" id="username" placeholder="Username">
        </div>
      </div>

      <div class="form-group row">
        <label for="password" class="col-2 col-form-label">Password</label>
        <div class="col-10">
          <input class="form-control" type="password" name="password" id="password" placeholder="Password">
        </div>
      </div>

      <div class="form-group row">
        <label for="conpassword" class="col-2 col-form-label">Confirm Password</label>
        <div class="col-10">
          <input class="form-control" type="password" name="conpassword" id="conpassword" placeholder="Password">
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>

    </form>

  </div>

<?php get_footer(); ?>
