<h1>Admin: Manage pages</h1>

<table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pages as $page): ?>

        <tr>
            <td><?php echo e($page->id); ?></td>
            <td><?php echo e($page->title); ?></td>
            <td><?php echo e($page->content); ?></td>
        </tr>

        <?php endforeach ?>

    </tbody>
</table>

<a href="index.php?route=admin/pages/create">Create page</a>