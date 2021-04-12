<div>
  <h1><?php $attributes['content'] ?></h1>
  <h2><?php $testing ?></h2>
  <table>
    <tr>
      <th>User Name</th>
    </tr>
    <?php
    foreach(get_users() as $user) {
      echo "<tr><td>" . $user->display_name . "</td></tr>";
    }
    ?>
  </table>
</div>
