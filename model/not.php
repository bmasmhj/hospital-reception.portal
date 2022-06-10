<?php 
if(!isset($profile)){
if($status === 'reset' ){
    echo "<li class='mx-5 d-flex w-100'>
    <div class='alert align-items-center justify-content-center text-dark alert-warning' role='alert'>Your password was reset sucessfully ! Please change it form <a class='text-danger' href='Profile'>here</a></div>
</li>";
}
else if ($status == 'new')
echo "<li class='mx-5 d-flex w-100'>
<div class='alert align-items-center justify-content-center text-dark alert-info' role='alert'>Seems like you haven't changed password ! Please change it form <a class='text-danger' href='Profile'>here</a></div>
</li>";
}
?>