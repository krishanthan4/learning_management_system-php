<?php require_once "./views/partials/header.php";
require_once "./views/partials/academic_nav.php";
// if (isset($_SESSION["user"])) {
  $email = $_SESSION["academic_lms"]["email"];
  $details_rs = Database::search("SELECT * FROM user INNER JOIN gender ON 
  `user`.`gender_id`=`gender`.`id` WHERE `email`='" . $email . "'");
$gender_rs = Database::search("SELECT * FROM `gender`");
  $user_details = $details_rs->fetch_assoc();
  ?>
  <div>
    <main class="max-w-screen mx-auto pb-10 lg:py-12 lg:px-8">
      <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
          <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="max-w-2xl  mx-auto px-4 lg:max-w-4xl lg:px-0">
              <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Academic Officer Settings</h1>
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
                        value="<?php echo $user_details["fname"]; ?>" type="text" id="fname">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                      <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                      <input
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        value="<?php echo $user_details["lname"]; ?>" type="text" id="lname">
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
                            <?php echo $gender_data["gender"]; ?>
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
                    <?php
                    $gender_rs = Database::search("SELECT * FROM gender");
                    ?>
                          <div class="col-span-4 sm:col-span-2">
                      <label for="Mobile" class="block text-sm font-medium text-gray-700">Username</label>
                      <input
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        value="<?php echo $user_details["mobile"]; ?>" id="mobile">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                      <label class="block text-sm font-medium text-gray-700">Password</label>
                      <div class="" x-data="{ show: true }">
                        <div class="relative">
                          <input type="password"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="<?php echo $user_details["password"]; ?>">
                          <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg class="h-6 text-gray-700 hidden" fill="none" @click="show = !show"
                              :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                              viewbox="0 0 576 512">
                              <path fill="currentColor"
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                              </path>
                            </svg>
                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                              :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                              viewbox="0 0 640 512">
                              <path fill="currentColor"
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                              </path>
                            </svg>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button onclick="updateProfile();" class="mr-auto bg-gray-800 text-white rounded-md py-2 px-4">save</button>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                </div>
              </div>
            </section>
          </div>
        </div>
    </main>
  </div>
  <?php
// } else {
  ?>
  <!-- <script> -->
    <!-- window.location = "/"; -->
  <!-- </script> -->
  <?php
// }
?>
<!-- alert model -->
<?php require_once "./views/partials/alert.php"; ?>
<!--alert model -->
<script src="./public/js/admin/updateProfile.js"></script>
<?php require_once "./views/partials/footer.php"; ?>