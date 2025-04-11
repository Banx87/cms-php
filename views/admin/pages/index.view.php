<h1>Admin: Manage pages</h1>

<table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pages as $page): ?>

        <tr>
            <td><?php echo e($page->id); ?></td>
            <td><?php echo e($page->title); ?></td>
            <td><?php echo e($page->content); ?></td>
            <td class="btn action-btn">
                <a href="index.php?<?php echo http_build_query(['route' => 'admin/pages/edit']); ?>" class="btn"
                    name="edit">
                    <button>
                        <svg class="icon edit" viewBox="0 0 24 24">
                            <path
                                d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z">
                            </path>
                        </svg>
                    </button>
                    <input type="hidden" name="id" value="<?php echo e($page->id); ?>">
                </a>

                <!-- <form class="form form_edit"
                    action="index.php?<?php echo http_build_query(['route' => 'admin/pages/edit']); ?>" method="POST">
                    <button type="submit" name="edit">
                        <svg class="icon edit" viewBox="0 0 24 24">
                            <path
                                d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z">
                            </path>
                        </svg>
                        <input type="hidden" name="id" value="<?php echo e($page->id); ?>">
                    </button>
                </form> -->
                <form class="form form_delete"
                    action="index.php?<?php echo http_build_query(['route' => 'admin/pages/delete']); ?>" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this page?');">
                    <button type="submit" name="delete">
                        <svg class="icon trash" viewBox="0 0 24 24">
                            <path d="M3 6h18v2H3V6zm2 3h14l-1.5 14h-11L5 9zm5-5h4v2h-4V4z" />
                        </svg>
                        <input type="hidden" name="id" value="<?php echo e($page->id); ?>">
                    </button>
                </form>
            </td>
            </td>
        </tr>

        <?php endforeach ?>

    </tbody>
</table>

<a href="index.php?route=admin/pages/create">Create page</a>