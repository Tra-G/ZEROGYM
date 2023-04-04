<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <h1>Edit Blog Post</h1>
    <?php if (!empty($errors)): ?>
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <form method="post" action="">
      <label for="title">Title:</label>
      <input type="text" name="title" id="title" value="<?php echo $post['title']; ?>"><br>
      <label for="content">Content:</label>
      <textarea name="content" id="content"><?php echo $post['content']; ?></textarea><br>
      <input type="submit" value="Save Changes">
    </form>
  </body>
</html>