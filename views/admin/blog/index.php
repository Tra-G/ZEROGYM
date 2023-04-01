<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1>Total Posts: <?php echo $total_posts; ?></h1>
    <b><a href="<?php echo redirect("admin/blog/new"); ?>">Add New Post</a></b>
    <ol>
    <?php
    foreach ($blog_rows as $blog_rows) {
        echo "<li>";
        echo $blog_rows['title'];
        echo " [<a href='".redirect("admin/blog/".$blog_rows['id']."/edit")."'>Edit</a>]";
        echo "[<a href='".redirect("admin/blog/".$blog_rows['id']."/delete")."'>Delete</a>]";
        echo "</li><br>";
    }
    ?>
    </ol>

    <br><a href='<?php echo redirect('admin/dashboard'); ?>'>Dashboard</a>
</body>
</html>