<h2>Delete Articles</h2>
<p>Are you sure to delete it?</p>
<form method="post" action="">
  <?= csrf_field() ?>
  <input type="submit" name="submit" value="delete" />
</form>