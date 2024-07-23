<?php 
require_once "./views/partials/header.php";
?>
<div class="grid grid-cols-2 justify-center w-full h-[100vh] p-[4rem] gap-10 items-center">
  <a href="/admin" class="bg-orange-500 w-full text-white text-2xl font-semibold flex flex-row justify-center items-center h-full rounded-lg shadow-lg  hover:bg-orange-300">Admin</a>
  <a href="/student" class="bg-blue-500 w-full text-white text-2xl font-semibold flex flex-row justify-center items-center h-full rounded-lg shadow-lg  hover:bg-blue-300">Student</a>
  <a href="/teacher" class="bg-green-500 w-full text-white text-2xl font-semibold flex flex-row justify-center items-center h-full rounded-lg shadow-lg  hover:bg-green-300">Teacher</a>
  <a href="/academic-officer" class="bg-red-500 w-full text-white text-2xl font-semibold flex flex-row justify-center items-center h-full rounded-lg shadow-lg  hover:bg-red-300">Academic Officer</a>
</div>
<?php 
require_once "./views/partials/footer.php";
?>

