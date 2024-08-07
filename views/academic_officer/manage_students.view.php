<?php require_once "./views/partials/header.php";
// if(isset($_SESSION["admin"])){
require_once "./views/partials/academic_nav.php";
 if(isset($_GET["id"])){
    $pageId =$_GET["id"]; 
  }else{
    $pageId =1; 
  }
?>
<div class="w-[95%] mx-4  my-4 flex flex-row items-center justify-between">
        <p class="sm:text-xl sm:text-center text-base md:ms-6">Manage Students</p>
<a href="/admin/add-students">
        <button type="submit" class="inline-flex items-center py-2 px-2 ms-1 text-sm font-medium text-white bg-yellow-500 gap-1 rounded-lg border border-yellow-600 hover:bg-yellow-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
</svg></svg>Add <span class="md:block hidden">New</span>
                </button>
        </a>
        <!-- search bar -->
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
                            <th scope="col" class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th scope="col" class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider"> Name </th>
                            <th scope="col" class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider"> Username </th>
                            <th scope="col" class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider"> Class </th>
                            <th scope="col" class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider"> Email </th>
                            <th scope="col" class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider"> Registered Date </th>
                            <th scope="col" class="px-2 md:px-3 py-2 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
<?php 
require_once "./views/partials/alert.php";
$AllStudents_rs = Database::search("SELECT COUNT(`email`) AS student_count FROM `student` ");
$AllStudents = $AllStudents_rs->fetch_assoc();
if($AllStudents_rs->num_rows){
    $output = preg_replace( '/[^0-9]/', '', $pageId );
    if($output){
      $pageId = $pageId-1;
      $from = 0;
      $to = 10;
      $from = $to * $pageId;
    }else{
      $from = 0;
    $to = 10;
    }
$manageStudents_rs = Database::search("SELECT * FROM `student` INNER JOIN `class` WHERE `class`.`id`=`student`.`class_id` LIMIT $from,$to");
if($manageStudents_rs->num_rows!==0){
    for ($i=0; $i < $manageStudents_rs->num_rows; $i++) { 
        $manageStudents= $manageStudents_rs->fetch_assoc();
    ?>
    <tr id="<?= $manageStudents["email"]?>">
                            <td class="px-3 py-2 text-center whitespace-nowrap">
                                    <div class="text-sm text-gray-900"><?= $i+1?></div>
                                </td>    
                                <?php 
                                if($manageStudents["first_name"]!==null || $manageStudents["last_name"]!==null){
    ?>
                                  <td class="px-3 py-2 text-center whitespace-nowrap">
                                    <div class="text-sm text-gray-900"><?=  $manageStudents["first_name"] ." ".$manageStudents["last_name"]?> </div> 
                                </td>
    <?php
                                }else{
                                    ?>
                                    <td class="px-3 py-2 text-center whitespace-nowrap">
                                 <div class="text-sm ps-10 text-gray-900">-</div> 
                                     </td>
                                  <?php
                                }
                                ?>
    <td id="email" class="px-3 py-2 text-center whitespace-nowrap text-sm text-gray-900"><?= $manageStudents["username"]?></td>
                                <td class="px-3 py-2 text-center whitespace-nowrap text-sm text-gray-500"><?= $manageStudents["grade_id"] ." - ".$manageStudents["class_name"] ?></td>
                                <td class="px-3 py-2 text-center whitespace-nowrap text-sm text-gray-500"><?= $manageStudents["email"] ?></td>
                                <td class="px-3 py-2 text-center whitespace-nowrap text-sm text-gray-500"><?= $manageStudents["joined_date"] ?></td>
                            <td class="px-3 py-2 text-center whitespace-nowrap  text-sm font-medium flex items-center justify-center">
                             <button onclick="deleteTeacher('<?= $manageStudents['email'] ?>');">
                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6  hover:text-red-600 transform">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                             </button>
                                </td>
                            </tr>
    <?php
    }
    ?> <!-- More people... -->
       </tbody>
          </table>
         <?php }} ?>
            </div>
        </div>
    </div>
</div>
<!-- product table start -->
<div>
</div>
<?php require_once "./views/partials/footer.php";?>