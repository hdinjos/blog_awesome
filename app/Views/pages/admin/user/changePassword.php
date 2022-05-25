<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>
<h2> Change Password</h2>
<a href="/admin/users">Back</a>
<form method="post">
  <?= csrf_field() ?>
  <div>
    <label>
      Password
      <input type="password" name="password" />
    </label>
  </div>

  <div>
    <label>
      Password Confirmation
      <input type="password" name="passwordConfirm" />
    </label>
  </div>
  <button>Change Password</button>
</form>
<?= $this->endSection() ?>