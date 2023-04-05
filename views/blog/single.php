<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h2><?php echo $post['title']; ?></h2>
    Date: <?php echo $post['created_at']; ?><br><br>
    <?php echo $post['content']; ?>
</body>
</html>