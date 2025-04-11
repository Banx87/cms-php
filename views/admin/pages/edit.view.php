<h1>THIS IS THE EDIT PAGE WITH ID <?php echo e($page->id) . ": " . e($page->title); ?></h1>

<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo e($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>

<form method="POST"
    action="index.php?<?php echo http_build_query(['route' => 'admin/pages/edit', 'id' => $page->id]); ?>">
    <label for="title">Title: </label>
    <input type="text" name="title" value="<?php
                                            if (!empty($_POST['title'])) echo e($_POST['title']);
                                            else echo e($page->title) ?>" id="title" />
    <label for="slug">Slug: </label>
    <input disabled type="text" name="slug" value="<?php
                                                    if (!empty($_POST['slug'])) echo e($_POST['slug']);
                                                    else echo e($page->slug) ?>" id="slug" />
    <label for="content">Content: </label>
    <textarea name="content" id="content" rows="15"><?php
                                                    if (!empty($_POST['content'])) echo e($_POST['content']);
                                                    else echo e($page->content) ?></textarea>

    <input type="submit" value="Submit!">
</form>