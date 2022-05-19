<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>
<h2>List All Users</h2>
<a href="/admin/users/create">Add</a>
<table>
  <tr>
    <th>No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Bio</th>
    <th>Role</th>
    <th>Action</th>
  </tr>
  <?php
  $num = 0;
  foreach ($users as $user) : ?>
    <tr>
      <td><?= $num += 1 ?></td>
      <td><?= esc($user->name) ?></td>
      <td><?= esc($user->email) ?></td>
      <td><?= esc($user->bio) ?></td>
      <td><?= esc($user->role) ?></td>
      <td>
        <a href="/admin/users/edit/<?= esc($user->id) ?>">Edit</a>
        <a href="/admin/users/delete/<?= esc($user->id) ?>">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?= $this->endSection() ?>