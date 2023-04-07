<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <h1>Recent Posts</h1>

    <?php if (!empty($posts)): ?>
        <ul>
            <?php foreach ($posts as $post): ?>
                <li><a href="<?php echo redirect("blog/".$post['id']); ?>"><?php echo $post['title']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

  </body>
</html>
