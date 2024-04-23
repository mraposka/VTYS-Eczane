<?php include("header.php"); ?>

<head>
</head>
<div class="table ">
  <table class="table  table-hover" style="background:#f2f2f2;">
    <thead>
      <tr>
        <th scope="col">Personel ID</th>
        <th scope="col">Ad</th>
        <th scope="col">Soyad</th>
        <th scope="col">Cinsiyet</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($employees as $employee) : ?>
        <tr> 
          <td><?php echo $employee->emp_id; ?></td>
          <td><?php echo $employee->name; ?></td>
          <td><?php echo $employee->surname; ?></td>
          <td><?php echo $employee->gender; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>

</html>