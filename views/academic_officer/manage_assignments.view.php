<?php require_once "./views/partials/header.php";
require_once "./views/partials/academic_nav.php";
// if (isset($_SESSION["user"])) {
$email = $_SESSION["academic_lms"]["email"];
?>
<div class="w-[95%] mx-4  my-4 flex flex-row items-center">
  <p class="sm:text-xl sm:text-center text-base md:ms-6">Manage Assignments</p>
</div>

<!-- product table start -->
<div class="flex flex-col mt-5">
  <div class="-my-2 overflow-x-auto sm:-mx-4 md:-mx-6 lg:mx-1">
    <div class="py-1 align-middle inline-block min-w-full sm:px-4 md:px-6 lg:px-8">
      <div class=" overflow-hidden sm:rounded-lg">
        <table class="shadow lg:min-w-[90%] sm:md-w-[60%] md:min-w-full overflow-x-scroll divide-y divide-gray-200">
          <!-- Table Headers -->
          <thead class="bg-gray-50">
            <tr>
              <th scope="col"
                class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider">
                Student email </th>
              <th scope="col"
                class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider">
                Student Name </th>
              <th scope="col"
                class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider">
                Subject </th>
              <th scope="col"
                class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider"> Grade
              </th>
              <th scope="col"
                class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider">
                Assignment ID </th>
              <th scope="col"
                class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider"> Marks
              </th>
              <th scope="col"
                class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider"></th>

            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php
            require_once "./views/partials/alert.php";

            $manageAssignments_rs = Database::search("SELECT `student`.`email`,`student`.`first_name`,`student`.`last_name`,`subject`.`subject`,grade.`name` AS grade,assignment.id,student_has_assignment.marks,student_has_assignment.mark_sent FROM `student_has_assignment`
 INNER JOIN `student` ON `student`.`email`=`student_has_assignment`.`student_email`
  INNER JOIN `class` ON `class`.`id`=`student`.`class_id`
   INNER JOIN `grade` ON `grade`.`id`=`class`.`grade_id` 
  INNER JOIN `assignment` ON `student_has_assignment`.`assignment_id`=`assignment`.`id`
  INNER JOIN `subject` ON `assignment`.`subject_id`=`subject`.`id`;");
            if ($manageAssignments_rs->num_rows !== 0) {
              for ($i = 0; $i < $manageAssignments_rs->num_rows; $i++) {
                $manage_assignments = $manageAssignments_rs->fetch_assoc();
                ?>

                <tr id="<?= $manage_assignments["email"] ?>">
                  <td class="px-3 py-2 text-center whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?= $manage_assignments["email"] ?></div>
                  </td>
                  <?php
                  if ($manage_assignments["first_name"] !== null || $manage_assignments["last_name"] !== null) {
                    ?>
                    <td class="px-3 py-2 text-center whitespace-nowrap">
                      <div class="text-sm text-gray-900">
                        <?= $manage_assignments["first_name"] . " " . $manage_assignments["last_name"] ?> </div>
                    </td>
                    <?php
                  } else {
                    ?>
                    <td class="px-3 py-2 text-center whitespace-nowrap">
                      <div class="text-sm ps-10 text-gray-900">-</div>
                    </td>
                    <?php
                  }
                  ?>
                  <td id="email" class="px-3 py-2 text-center whitespace-nowrap text-sm text-gray-900">
                    <?= $manage_assignments["subject"] ?></td>
                  <td class="px-3 py-2 text-center whitespace-nowrap text-sm text-gray-500">
                    <?= $manage_assignments["grade"] ?></td>
                  <td class="px-3 py-2 text-center whitespace-nowrap text-sm text-gray-500"><?= $manage_assignments["id"] ?>
                  </td>
                  <td class="px-3 py-2 text-center whitespace-nowrap text-sm text-gray-500">
                    <?= $manage_assignments["marks"] ?></td>
                  <td class="px-3 py-2 text-center whitespace-nowrap text-sm text-gray-500">
                    <?php
                    if ($manage_assignments["mark_sent"] == 0) {
                      ?><button onclick="sentToStudent('<?= $manage_assignments['email'] ?>','<?= $manage_assignments['id'] ?>');" id="sendButton<?= $manage_assignments['email'] ?><?= $manage_assignments['id'] ?>" class="bg-orange-400 text-white py-2 px-2 rounded-md">Send To Student</button><?php

                    } else {
                      ?>
                      <button disabled class="bg-green-500 text-white py-2 px-2 rounded-md">Mark Sent</button>
                      <?php
                    }
                    ?>
                  </td>

                </tr>
                <?php
              }
              ?> <!-- More people... -->
            </tbody>
          </table>
        <?php } ?>
      </div>
    </div>
    <div class="w-[95%] mx-4  my-4 mt-8 flex flex-row items-center">
      <p class="sm:text-xl sm:text-center text-base md:ms-6">Assign Marks</p>
    </div>
    <div class="grid grid-cols-3 items-center gap-2">
      <div class="flex flex-row ms-4 items-center gap-3">
        <p>Student Email : </p>
        <?php $student_email_rs = Database::search("SELECT * FROM `student`") ?>
        <select id="student_email"
          class=" block  bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
          <option>Select</option>
          <?php
          for ($x = 0; $x < $student_email_rs->num_rows; $x++) {
            $student_email_data = $student_email_rs->fetch_assoc();
            ?>
            <option value="<?php echo $student_email_data["email"]; ?>">
              <?php echo $student_email_data["email"]; ?>
            </option>
            <?php
          }
          ?>


        </select>
      </div>
      <div class="flex flex-row ms-4 items-center gap-2">
        <p>Assignment : </p>
        <?php $assignment_id_rs = Database::search("SELECT * FROM `assignment` INNER JOIN `subject` ON `subject`.`id`=`assignment`.`subject_id`") ?>
        <select id="assignment_id"
          class=" block  bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
          <option>Select</option>
          <?php
          for ($x = 0; $x < $assignment_id_rs->num_rows; $x++) {
            $assignment_id_data = $assignment_id_rs->fetch_assoc();
            ?>
            <option value="<?php echo $assignment_id_data["id"]; ?>">
              <?php echo $assignment_id_data["id"] . " - subject : " . $assignment_id_data["subject"] . " | grade : " . $assignment_id_data["grade_id"]; ?>
            </option>
            <?php
          }
          ?>


        </select>
      </div>
      <div class="flex flex-row ms-4 items-center gap-3">
        <p>Marks : </p>
        <input type="number" id="marks"
          class=" block  bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none sm:text-sm">
      </div>

    </div>
    <div class="w-full flex flex-row mt-4 justify-center">
      <button onclick="assignMarks();" class="mx-auto bg-red-400 rounded-md py-2 px-3 text-white">Save & Send to
        Student</button>
    </div>
  </div>
</div>
<?php require_once "./views/partials/alert.php"; ?>
<script src="../../public/js/academic/manageAssignments.js"></script>
<?php require_once "./views/partials/footer.php"; ?>