<?php
include_once "./views/partials/header.php";
include_once "./connection.php";
?>

<link rel="stylesheet" href="/public/css/style.css">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 " id="signInDiv">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Academic Officer Sign Up</h2>
  </div>
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm space-y-6">
    <div>
      <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
      <div class="mt-2">
        <input id="username" name="username" type="username" required
          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-600 sm:text-sm sm:leading-6">
      </div>
    </div>

    <div>
      <div class="flex items-center justify-between">
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
      </div>
      <div class="mt-2">
        <input id="password" name="password" type="password" required
          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-600 sm:text-sm sm:leading-6">
      </div>
    </div>
    <div>
      <label for="verification_code" class="block text-sm font-medium leading-6 text-gray-900">verification code</label>
      <div class="mt-2">
        <input id="verification_code" name="verification_code" required
          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-purple-600 sm:text-sm sm:leading-6">
      </div>
    </div>

    <div>
      <button onclick="academic_signup();"
        class="flex w-full justify-center rounded-md bg-purple-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">Register Now</button>
        <p class="text-center text-purple-400 text-sm mt-5"><a href="/academic-officer/signin">Sign In</a></p>
    </div>


  </div>
</div>
<?php require_once "./views/partials/alert.php"; ?>
<script src="/public/js/academic/academicSignin.js"></script>
<?php include_once "./views/partials/footer.php" ?>