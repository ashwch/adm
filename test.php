  <html>
    <body> <!-- the body tag is required or the CAPTCHA may not show on some browsers -->
      <!-- your HTML content -->
        <?php
        if(isset($_POST['cat'])){
  require_once('recaptchalib.php');
  $privatekey = "6Lfdn84SAAAAAMjiWxkgrwNapHb4p0SVUhD8Z9vS";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    echo 'bad boy';
  } else {
    echo 'well done';
    exit();
  }}
  ?>
      <form method="post" action="">
        <?php
          require_once('recaptchalib.php');
          $publickey = "6Lfdn84SAAAAAN5a6VH5Q4zSefu-5z_NlpGKHIK4"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
        <input type="submit" name='cat' value='submit'/>
      </form>

      <!-- more of your HTML content -->
    </body>
  </html>