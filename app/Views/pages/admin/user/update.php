<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>
<h2>Update Users</h2>
<a href="/admin/users">Back</a>
<form method="post">
  <?= csrf_field() ?>
  <div>
    <label>
      Name
      <input value="<?= esc($user->name) ?>" type="text" name="name" />
    </label>
  </div>
  <div>
    <label>
      Email
      <input value="<?= esc($user->email) ?>" type="text" name="email" />
    </label>
  </div>
  <div>
    <label>
      Bio
      <textarea name="bio"><?= esc($user->bio) ?></textarea>
    </label>
  </div>
  <div>
    <label>
      Role
      <select name="role">
        <?php foreach ($roles as $role) : ?>
          <option <?= esc($user->role_id) === esc($role->id) ? 'selected=selected' : '' ?> value="<?= esc($role->id) ?>"><?= esc($role->name) ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
  <div>
    <input id="submit" type="submit" name="submit" value="Update User" />
  </div>
</form>
<?= $this->endSection() ?>