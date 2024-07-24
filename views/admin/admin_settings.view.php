<?php require_once "./views/partials/header.php";
require_once "./views/partials/nav.php";
if (isset($_SESSION["admin_lms"])) {
  $email = $_SESSION["admin_lms"]["email"];
  $details_rs = Database::search("SELECT * FROM user INNER JOIN gender ON 
  `user`.`gender_id`=`gender`.`id` WHERE email='" . $email . "' AND `positions_id`='1'");
$gender_rs = Database::search("SELECT * FROM `gender`");
  $user_details = $details_rs->fetch_assoc(); ?>
  <div>
    <main class="max-w-screen mx-auto pb-10 lg:py-12 lg:px-8">
      <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
          <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="max-w-2xl  mx-auto px-4 lg:max-w-4xl lg:px-0">
              <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Administrator Settings</h1>
            </div>
            <!-- Profile detais section -->
            <section aria-labelledby="payment-details-heading">
              <div class=" sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                  <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                      <label class="block text-sm font-medium text-gray-700">First name</label>
                      <input
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        value="<?php echo $user_details["first_name"]; ?>" type="text" id="fname">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                      <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                      <input
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        value="<?php echo $user_details["last_name"]; ?>" type="text" id="lname">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                      <label class="block text-sm font-medium text-gray-700">Gender</label>
                      <select id="gender"
                        class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        <option>Select</option>
                        <?php
                        for ($x = 0; $x < $gender_rs->num_rows; $x++) {
                          $gender_data = $gender_rs->fetch_assoc();
                          ?>
                          <option value="<?php echo $gender_data["name"]; ?>" <?php
                             if (!empty($user_details["name"])) {
                               if ($gender_data["name"] == $user_details["name"]) {
                                 ?>selected<?php
                               }
                             }
                             ?>>
                            <?= $gender_data["name"] ?>
                          </option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                      <label class="block text-sm font-medium text-gray-700">Email address</label>
                      <input
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        type="email" id="email2" value="<?php echo $user_details["email"]; ?>" readonly>
                    </div>
                    <?php $gender_rs = Database::search("SELECT * FROM gender"); ?>
                          <div class="col-span-4 sm:col-span-2">
                      <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                      <input
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        value="<?= $user_details["username"] ?>" id="username">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                      <label class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative">
                          <input
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="<?= $user_details["password"] ?>">
                        </div>
                    </div>
                  </div>
                </div>
                <button onclick="updateProfile();" class="mr-auto bg-gray-800 text-white rounded-md py-2 px-4">save</button>
              </div>
            </section>
          </div>
        </div>
    </main>
  </div>
  <?php
} else { ?><script> window.location = "/admin/signin";</script><?php }require_once "./views/partials/alert.php"; ?>
<!--alert model -->
<script src="./public/js/admin/updateProfile.js"></script>
<?php require_once "./views/partials/footer.php"; ?>