<h2>Delete User</h2>
<a href="/admin/users">Back</a>
<p>Are sure to delete it?</p>
<form method="post">
  <?= csrf_field() ?>
  <button>Delete</button>
</form>