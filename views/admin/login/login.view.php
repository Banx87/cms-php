<?php
if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo e($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="index.php?<?php echo http_build_query(['route' => 'admin/login']); ?>" method="post">
    <input type="hidden" name="_csrf" value="<?php echo e(csrf_token()); ?>">
    <label for="login-username">Username:</label>
    <input type="text" id="login-username" name="username"
        value="<?php if (!empty($_POST['username'])) echo e($_POST['username']) ?>" required>

    <br>

    <label for="login-password">Password:</label>
    <input type="password" id="login-password" name="password" required>

    <br><br>
    <input type="submit" value="Login">
</form>