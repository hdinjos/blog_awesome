<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>
<h2>Create Users</h2>
<form method="post">
  <?= csrf_field() ?>
  <div>
    <label>
      Name
      <input type="text" name="name" />
    </label>
  </div>
  <div>
    <label>
      Email
      <input type="text" name="email" />
    </label>
  </div>
  <div>
    <label>
      Bio
      <textarea name="bio"></textarea>
    </label>
  </div>
  <div>
    <label>
      Role
      <select name="bio">
        <?php foreach ($roles as $role) : ?>
          <option value="<?= esc($role->id) ?>"><?= esc($role->name) ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
  <div>
    <input type="submit" name="submit" value="Create User" />
  </div>

</form>
<?= $this->endSection() ?>