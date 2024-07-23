<?php require_once "./views/partials/header.php";
 require_once "./views/partials/nav.php";
 if (isset($_SESSION["admin_lms"])) {

    $email = $_SESSION["admin_lms"]["email"];
 if(isset($_GET["id"])){
    $pageId =$_GET["id"]; 
  
  }else{
    $pageId =1; 
  }
?>

<div class="w-[95%] mx-4  my-4 flex flex-row items-center justify-between">
        <p class="sm:text-xl sm:text-center text-base md:ms-3">Manage Subjects</p>
<a href="/admin/add-subjects">
        <button type="submit" class="inline-flex items-center py-2 px-2 ms-1 text-sm font-medium text-white bg-yellow-500 gap-1 rounded-lg border border-yellow-600 hover:bg-yellow-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
</svg></svg>Add <span class="md:block hidden">New</span>
                </button>
        </a>
        <!-- search bar -->
</div>

<div class="px-10 flex flex-col md:flex-row justify-evenly items-center  gap-10 py-10">

<div class="flex items-center gap-2">
    <label for="">Subject Name : </label>
    <select name="Subject Name"  class="outline-none px-2 rounded-md border border-gray-300 bg-gray-100 py-1 " id="">
    <option value="Select" default>Select</option>
    <?php 
  $subject_rs = Database::search("SELECT * FROM `subject`");
for ($sj=0; $sj < $subject_rs->num_rows; $sj++) { 
  $subject = $subject_rs->fetch_assoc();
    ?>
    <option value="<?= $subject["subject"] ?>"><?= $subject["subject"] ?></option>
    <?php } ?>
</select>
</div>

<div class="flex items-center gap-2">
    <label for="">Grade : </label>
    <select name="Subject Name" class="outline-none px-2 rounded-md border border-gray-300 bg-gray-100 py-1 " id="">
    <option value="Select" default>Select</option>
  <?php 
  $grade_rs = Database::search("SELECT * FROM `grade`");
for ($gd=0; $gd < $grade_rs->num_rows; $gd++) { 
  $grade = $grade_rs->fetch_assoc();
    ?>
    <option value="<?= $grade["name"] ?>"><?= $grade["name"] ?></option>
    <?php } ?>
</select>
</div>
</div>
<!-- product table start -->
<div class="flex flex-col ">
    <div class=" overflow-x-auto sm:-mx-4 md:-mx-6 ">
        <div class="py-2 align-middle inline-block min-w-full sm:px-4 md:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <!-- Table Headers -->
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 md:px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Subject Name</th>
                            <th scope="col" class="px-4 md:px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Grade From</th>
                            <th scope="col" class="px-4 md:px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Grade To</th>
     
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
<?php 
$manageSubject_rs = Database::search("SELECT * FROM `grade_has_subject` INNER JOIN `subject` ON `grade_has_subject`.`subject_id`=`subject`.`id` ");
if($manageSubject_rs->num_rows!==0){
    for ($i=0; $i < $manageSubject_rs->num_rows; $i++) { 
        $manageSubjects= $manageSubject_rs->fetch_assoc();
    ?>
    
    <tr>
                       
                                <td class="px-3 py-2 text-center whitespace-nowrap">
                                <?= $manageSubjects["subject"]?>
                                </td>
    
             
                                    <td class="px-3 py-2 text-center whitespace-nowrap">
                                 <div class="text-sm ps-10 text-gray-900"><?= $manageSubjects["grade_from"]?></div> 
                                     </td>
                                     <td class="px-3 py-2 text-center whitespace-nowrap">
                                 <div class="text-sm ps-10 text-gray-900"><?= $manageSubjects["grade_to"]?></div> 
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
    </div>
</div>
<!-- product table start -->

<script src="./public/js/manageUsers.js"></script>
<?php }else { ?><script> window.location = "/admin/signin";</script><?php }
require_once "./views/partials/footer.php";

?>
