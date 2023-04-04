<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1>Plans: <?php echo $total_plans; ?></h1>
    <b><a href="<?php echo redirect("admin/plans/new"); ?>">Add New Plan</a></b>
    <ol>
    <?php
    foreach ($plan_rows as $plan) {
        echo "<li>";
        echo $plan['name'];
        echo "<br>[<a href='".redirect("admin/plans/".$plan['id'])."'>View</a>]";
        echo "[<a href='".redirect("admin/plans/".$plan['id']."/edit")."'>Edit</a>]";
        echo "[<a href='".redirect("admin/plans/".$plan['id']."/delete")."' onclick=\"if(confirm('Are you sure you want to delete this plan?')) { return true; } else { return false; }\">Delete</a>]";
        echo "</li><br>";
    }
    ?>
    </ol>

    <br><a href='<?php echo redirect('admin/dashboard'); ?>'>Dashboard</a>
</body>
</html>