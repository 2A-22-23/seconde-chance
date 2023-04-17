<?php 
require_once "../model/users.php";
$users = new users();
$usertable = $users->afficherUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
        <th>nom</th>
        <th>prenom</th>
        <th>email</th>
        <th>password</th>
        <th>control</th>
    </thead>
    <tbody>
    <?php for($i = 0;$i < count($usertable);$i++) : ?>
        <tr>
            <td><?= $usertable[$i]['nom'] ?></td>
            <td><?= $usertable[$i]['prenom'] ?></td>
            <td><?= $usertable[$i]['email'] ?></td>
            <td><?= $usertable[$i]['password'] ?></td>
            <td>
            <button onclick="deleteUser(<?= $usertable[$i]['id']?>)">Delete</button>
            <button onclick="updateUser(<?= $usertable[$i]['id']?>)">Update</button>
            </td>
        </tr>
    <?php endfor ?>
    </tbody>
</table>
<script>
    function deleteUser(id)
    {
        location.href = "../controller/delete.php?id="+id;
    }    
    function updateUser(id)
    {
        location.href = "../controller/update.php?id="+id;
    }
</script>
    
</body>
</html>