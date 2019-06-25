<?php

include '..\Classes\User.php';

$users=new User("localhost","root","","users");

$users = new User();
echo json_encode($users->getUsers());

// if($post->create()) {
//   echo json_encode(
//     array('message' => 'Post Created')
//   );
// } else {
//   echo json_encode(
//     array('message' => 'Post Not Created')
//   );
// }


