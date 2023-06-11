<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['username'] ?></td>
                <td><?= $user['surename'] ?></td>
                <td><?= $user['phone'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
