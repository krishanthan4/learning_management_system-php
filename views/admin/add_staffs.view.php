<?php require_once "./views/partials/header.php";
require_once "./views/partials/nav.php"; ?>
    <main class="max-w-screen mx-auto pb-10 lg:py-12 lg:px-8">
      <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        <!-- Payment details -->
        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
          <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="max-w-2xl  mx-auto px-4 lg:max-w-4xl lg:px-0">
              <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Register Staffs</h1>
            </div>
            <section aria-labelledby="payment-details-heading">
              <div class="sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                  <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-2">
                      <label class="block text-sm font-medium text-gray-700">First name</label>
                      <input
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                         type="text" id="firstname">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                      <label for="lastname" class="block text-sm font-medium text-gray-700">Last name</label>
                      <input
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                         type="text" id="lastname">
                    </div>
                    <div class="col-span-4 sm:col-span-2">
                      <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                      <input
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                         type="text" id="username">
                    </div>
                    <?php $position_rs = Database::search("SELECT * FROM positions"); ?>
                    <div class="col-span-4 sm:col-span-2">
                      <label class="block text-sm font-medium text-gray-700">Position</label>
                      <select id="Position"
                        class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        <option>Select</option>
                        <?php
                        for ($posi = 0; $posi < $position_rs->num_rows; $posi++) {
                          $position_data = $position_rs->fetch_assoc();
                          ?>
                          <option value="<?= $position_data["position"]; ?>">
                            <?= $position_data["position"]; ?>
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
                        type="email" id="email2">
                    </div>
                    <?php $gender_rs = Database::search("SELECT * FROM gender"); ?>
                    <div class="col-span-4 sm:col-span-2">
                      <label class="block text-sm font-medium text-gray-700">Gender</label>
                      <select id="gender"
                        class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        <option>Select</option>
                        <?php
                        for ($gend = 0; $gend < $gender_rs->num_rows; $gend++) {
                          $gender_data = $gender_rs->fetch_assoc();
                          ?>
                          <option value="<?= $gender_data["name"]; ?>">
                            <?= $gender_data["name"]; ?>
                          </option>
                          <?php
                        }
                        ?>


                      </select>
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                      <label class="block text-sm font-medium text-gray-700">Password</label>
                      <div class="" x-data="{ show: true }">

                        <div class="relative">
                          <input 
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                            value="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <button onclick="addStaffs();" class="py-2 px-3 bg-gray-700 text-white mt-7 rounded-md">Save</button>
                </div>
              </div>
            </section>
          </div>
        </div>
    </main>
<?php require_once "./views/partials/alert.php"; ?>
<script src="../public/js/admin/addStaffs.js"></script>
<?php require_once "./views/partials/footer.php"; ?>