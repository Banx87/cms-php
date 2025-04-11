<h1>THIS IS THE EDIT PAGE WITH ID <?php echo e($page->id) . ": " . e($page->title); ?></h1>

<?php if (!empty($errors)): ?>
<ul>
    <?php foreach ($errors as $error): ?>
    <li><?php echo e($error) ?></li>
    <?php endforeach; ?>
</ul>
<?php endif ?>

<form action="index.php?route=admin/pages/edit" method="POST">
    <input type="hidden" name="id" value="<?php echo e($page->id); ?>">
    <label for="title">Title: </label>
    <input type="text" name="title" value="<?php if (!empty($page->title)) echo e((string) $page->title) ?> "
        id="title">
    <label for="slug">Slug: </label>
    <input disabled type="text" name="slug" value="<?php if (!empty($page->slug)) echo e((string) $page->slug) ?>"
        id="slug" />
    <label for="content">Content: </label>
    <textarea name="content" id="content" rows="10" cols="30"><?php if (!empty($page->content)): ?>
            <?php echo $page->content ?>
        <?php endif ?></textarea>

    <input type="submit" value="Submit!">
</form>