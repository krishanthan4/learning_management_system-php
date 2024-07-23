<?php require_once "./views/partials/header.php";
require_once "connection.php";

if (isset($_SESSION["student_lms"])) {
  require_once "./views/partials/student_nav.php"; ?>
<div>
<div class="w-[95%] mx-4  my-4 flex flex-row items-center">
<h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Lesson Notes</h1>
</div>
<div class="flex flex-col mt-5">
    <div class="-my-2 overflow-x-auto sm:-mx-4 md:-mx-6 lg:mx-1">
        <div class="py-1 align-middle inline-block min-w-full sm:px-4 md:px-6 lg:px-8">
            <div class=" overflow-hidden sm:rounded-lg">
                <table class="shadow lg:min-w-[90%] sm:md-w-[60%] md:min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <!-- Table Headers -->
                    <thead class="bg-gray-50">
                    <tr>
                            <th scope="col" class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider">Assignment ID</th>
                            <th scope="col" class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider">Assignment Subject</th>
                            <th scope="col" class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider">Assignment Title</th>
                            <th scope="col" class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
<?php 
require_once "./views/partials/alert.php";

$grade_id ;
$lesson_notes_rs = Database::search("SELECT * FROM `lesson` INNER JOIN `subject` ON `subject`.`id`=`lesson`.`subject_id`");
if($lesson_notes_rs->num_rows!==0){
    for ($i=0; $i < $lesson_notes_rs->num_rows; $i++) { 
        $lesson_notes_= $lesson_notes_rs->fetch_assoc();
    ?>
    
    <tr id="<?= $lesson_notes_["id"]?>">
                            <td class="px-3 py-2 text-center whitespace-nowrap">
                                    <div class="text-sm text-gray-900"><?= $lesson_notes_["id"]?></div>
                                </td>    
                            <td class="px-3 py-2 text-center whitespace-nowrap">
                                    <div class="text-sm text-gray-900"><?= $lesson_notes_["subject"]?></div>
                                </td>
                                <td class="px-3 py-2 text-center whitespace-nowrap">
                                    <div class="text-sm text-gray-900"><?= $lesson_notes_["title"]?></div>
                                </td>        
                                <td class="px-3 py-2 text-center whitespace-nowrap text-blue-600 hover:underline">
                                    <a href="<?= $lesson_notes_["lesson_note_path"]?>" class="text-sm ">Download</a>
                                </td>    
                            </tr>
    <?php
    }
    ?>
       </tbody>
          </table>
         <?php } ?>
            </div>
        </div>
    </div>
</div>
<table>
</table>
</div>
<?php }else { ?><script> window.location = "/student/signin";</script><?php }
  require_once "./views/partials/footer.php"; ?>