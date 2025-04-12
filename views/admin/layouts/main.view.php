<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/simple.css" />
    <link rel="stylesheet" type="text/css" href="./styles/admin.css" />
    <!-- <link rel="stylesheet" type="text/css" href="./styles/custom.css" /> -->
    <title>CMS Project</title>
</head>

<body>
    <header>
        <h1>
            <a href="index.php">CMS: Admin</a>
        </h1>
        <p>My admin area</p>
        <?php if (!empty($isLoggedIn)): ?>
        <nav>
            <a href="index.php?<?php echo http_build_query(['route' => 'admin/logout']); ?>" class="action-btn btn"
                name="logout">
                <button class="btn logout-btn">
                    Logout
                </button>
            </a>
        </nav>
        <?php endif;  ?>
        <a href='index.php?page=index'>To Wayne mansion</a>
    </header>
    <main>
        <?php echo $contents; ?>
    </main>
    <footer>
        <p></p>
    </footer>
</body>

</html>