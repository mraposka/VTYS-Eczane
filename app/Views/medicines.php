<?php include("header.php"); ?>
<div class="table ">
  <table class="table  table-hover" style="background:#f2f2f2;">
    <thead>
      <tr>
        <th scope="col">ilaç ID</th>
        <th scope="col">İlaç Adı</th>
        <th scope="col">Kategori</th>
        <th>Üretici Firma</th>
        <th scope="col">Fiyat</th>
        <th scope="col">Reçete Rengi</th>
        <th scope="col">Sepete Ekle</th>
        <th scope="col">Satış Yap</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($employees as $employee) : ?>
        <tr>
          <td><?php echo $employee->emp_id; ?></td>
          <td><?php echo $employee->name; ?></td>
          <td><?php echo $employee->surname; ?></td>
          <td><?php echo $employee->gender; ?></td>
          <td><button class="btn btn-sm" style="color: #808080; background:#ffa500; font-weight: bold; ">EKLE</button>
          </td>
          <td><button class="btn btn-sm" style="color: #808080; background:#ffa500; font-weight: bold;">SATIŞ YAP</button>
          </td>
        </tr>
      <?php endforeach; ?>
      
    </tbody>
  </table>
</div>
</body>

</html>