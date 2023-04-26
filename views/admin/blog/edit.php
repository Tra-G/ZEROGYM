<?php require_once(__DIR__.'/../inc/header.php'); ?>

<!-- DISPLAY MODAL CONTENT -->
<section id="dashboard-display" class="relative flex align-center justify-center">
    <!--Menu For Mobile -->
    <div class="mobile-menu-open absolute flex align-center">
        <i class="fa fa-bars"></i> <span>Menu</span>
    </div>
    <h3 class="display-heading absolute">
        Edit Post
    </h3>

    <div class="dashboard-modal flex align-center justify-center">
        <div class="modal-content edit-profile">
            <form action="" method="post" class="flex align-center justify-center" enctype="multipart/form-data">

                <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <h3></h3>

                <input type="text" name="title" id="title" value="<?php echo $post['title']; ?>" placeholder="Title" required>
                <textarea name="content" id="content"><?php echo $post['content']; ?></textarea><br>
                Thumbnail:<br>
                <img src="<?php echo redirect('assets/media/'.$post['thumbnail_path']); ?>" width="20%" height="20%" alt="Thumbnail"><br>
                <input type="file" name="thumbnail" id="thumbnail" accept="image/*" placeholder="Thumbnail">
                <button class="btn">Save New Changes</button>
            </form>
        </div>
    </div>
</section>

<?php require_once(__DIR__.'/../inc/footer.php'); ?>