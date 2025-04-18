<h1>CREATE A NEW PAGE</h1>

<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo e($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>

<form action="index.php?route=admin/pages/create" method="POST">
    <input type="hidden" name="_csrf" value="<?php echo e(csrf_token()); ?>">
    <label for="title">Title: </label>
    <input type="text" name="title" value="<?php if (!empty($_POST['title'])) echo e((string) $_POST['title']) ?> "
        id="title">
    <label for="slug">Slug: </label>
    <input type="text" name="slug" value="<?php if (!empty($_POST['slug'])) echo e((string) $_POST['slug']) ?>"
        id="slug" />
    <label for="content">Content: </label>
    <textarea name="content" value="<?php if (!empty($_POST['content'])) echo e((string) $_POST['content']) ?>"
        id="content" rows="10" cols="30"></textarea>

    <input type="submit" value="Submit!">
</form>