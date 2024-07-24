<?php
include_once "./views/partials/header.php";
include_once "./connection.php";
?>
<link rel="stylesheet" href="/public/css/style.css">
<!-- signIn part start -->
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 " id="signInDiv">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Teacher Sign In</h2>
  </div>
  <?php
$email = "";
$password = "";
if (!empty($_COOKIE["teacher_email_lms"])) {
    $email = $_COOKIE["teacher_email_lms"];
}
if (!empty($_COOKIE["teacher_password_lms"])) {
    $password = $_COOKIE["teacher_password_lms"];
}
  ?>
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm space-y-6">
    <div>
      <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
      <div class="mt-2">
        <input id="email" name="email" type="email" autocomplete="email" value="<?= $email ?>" required
          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
      </div>
    </div>
    <div>
      <div class="flex items-center justify-between">
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        <div class="text-sm">
        </div>
      </div>
      <div class="mt-2">
        <input id="password" name="password" type="password" autocomplete="current-password" required
          value="<?= $password ?>"
          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
      </div>
    </div>
    <div>
      <button onclick="signIn();"
        class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Sign
        in</button>
        <p class="text-center text-green-500 text-sm mt-5"><a href="/teacher/signup">Sign Up</a></p>
    </div>
  </div>
</div>
<!-- signIn Part End -->
<!-- alert model -->
<?php require_once "./views/partials/alert.php"; ?>
<!--alert model -->
<!-- forgotPassword Model -->
<?php require_once "./views/partials/verify_code_model.php"; ?>
<?php require_once "./views/partials/forgot_password_model.php"; ?>
<!-- forgotPassword Model -->
<!-- black cover -->
<div id="modal-backdrop" class="fixed inset-0 bg-black bg-opacity-30  hidden"></div>
<script src="/public/js/admin/adminSignin.js"></script>
<script src="/public/js/admin/verifyCode.js"></script>
<!-- <script src="./public/js/forgotPassword.js"></script> -->
<!-- Sign Up end -->
<?php include_once "./views/partials/footer.php" ?>