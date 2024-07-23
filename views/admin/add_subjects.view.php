<?php require_once "./views/partials/header.php";
require_once "./views/partials/nav.php"; ?>
    <main class="max-w-screen mx-auto pb-10 lg:py-12 lg:px-8">
      <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        <!-- Payment details -->
        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">
          <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="max-w-2xl  mx-auto px-4 lg:max-w-4xl lg:px-0">
              <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Add Subjects</h1>
            </div>
            <!-- Profile detais section -->
            <section aria-labelledby="payment-details-heading">
              <div class="sm:rounded-md sm:overflow-hidden">
                <div class="bg-white py-6 px-4 sm:p-6">
                  <div class="mt-2 grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-1">
                      <label class="block text-sm font-medium text-gray-700">Subject Name</label>
                      <input
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                         type="text" id="subject_input">
                    </div>
                    <?php $grade_from_rs = Database::search("SELECT * FROM grade"); ?>
                    <div class="col-span-3 sm:col-span-1">
                      <label class="block text-sm font-medium text-gray-700">Grade From</label>
                      <select id="grade_from"
                        class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        <option>Select</option>
                        <?php for ($posi = 0; $posi < $grade_from_rs->num_rows; $posi++) {
                          $grade_from_data = $grade_from_rs->fetch_assoc(); ?>
                          <option value="<?= $grade_from_data["name"]; ?>">
                            <?= $grade_from_data["name"]; ?>
                          </option>
                          <?php }?>
                      </select>
                    </div>
                    <?php $grade_to_rs = Database::search("SELECT * FROM grade"); ?>
                    <div class="col-span-3 sm:col-span-1">
                      <label class="block text-sm font-medium text-gray-700">Grade To</label>
                      <select id="Position"
                        class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        <option>Select</option>
                        <?php for ($posi2 = 0; $posi2 < $grade_to_rs->num_rows; $posi2++) {
                          $grade_to_data = $grade_to_rs->fetch_assoc(); ?>
                          <option value="<?= $grade_to_data["name"]; ?>">
                            <?= $grade_to_data["name"]; ?>
                          </option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="px-4 py-3  text-right sm:px-6 ">
                <button onclick="goBackSubject();" class="py-1.5 px-3 rounded-md bg-gray-500 text-white hover:bg-gray-600">Discard</button>   
            <button class="py-1.5 px-4 ms-3 rounded-md bg-blue-500 text-white hover:bg-blue-600">Save</button>   
            </div>
              </div>
            </section>
          </div>
        </div>
    </main>
<!-- alert model -->
<?php require_once "./views/partials/alert.php"; ?>
<!--alert model -->
<script src="./public/js/profileImage.js"></script>
<script src="./public/js/updateProfile.js"></script>
<script>
    function goBackSubject(){
        window.location.href="/admin/manage-subjects";
    }
</script>
<?php require_once "./views/partials/footer.php"; ?>