<script>
    // new variable
    var fetch_url = "<?php echo $fetch_url; ?>";
</script>

<br><br>
<form action="" method="post">
    <div class="form-group">
        <!-- Take input for Password and confirm password -->
        <label for="password">New Password</label><br>
        <input type="password" name="password" placeholder="Enter password" class="form-control" id="password" required><br><br>
        <label for="confirm_password">Confirm Password</label><br>
        <input type="password" name="confirm_password" placeholder="Confirm password" class="form-control" id="confirm_password" required><br><br>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
