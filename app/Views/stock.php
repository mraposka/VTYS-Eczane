<?php include("header.php"); ?>
<div class="table">
    <table class="table  table-hover" style="background:#f2f2f2;">
        <thead>
            <tr>
                <th scope="col">Güncelle</th>
                <th scope="col">Stok İD</th>
                <th scope="col">İlaç Adı</th>
                <th scope="col">Stok Adedi</th>
                <th scope="col">Kategori</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($stock as $stocks) : ?>
                <tr id="tableID_<?php echo $stocks->stock_id; ?>">
                    <td>
                        <button class="btn btn-sm" type="button" id="delete_<?php echo $stocks->stock_id; ?>" style="color: #808080; background:#ffa500; font-weight: bold;">
                            <i class="fa-solid fa-trash"></i>&nbsp;Sil
                        </button>
                        &nbsp;
                        <button class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $stocks->stock_id; ?>" style="color: #808080; background:#ffa500; font-weight: bold;">
                            <i class="fa-solid fa-pen-to-square"></i>&nbsp;Düzenle
                        </button>
                    </td>
                    <td id="tableStock_id"><?php echo $stocks->stock_id; ?></td>
                    <td id="tableStock_med"><?php echo $stocks->medicine_id; ?></td>
                    <td id="tableStock_piece"><?php echo $stocks->piece; ?></td>
                    <td id="tableStock_piece"><?php echo $stocks->category_id; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php foreach ($stock as $stocks) : ?> <!-- Düzeltme -->
    <form id="personelEdit<?php echo $stocks->stock_id; ?>"> <!-- Düzeltme -->
        <div class="modal fade" id="staticBackdrop<?php echo $stocks->stock_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Stok Düzenleme</h5> <!-- Başlık düzeltilmesi -->
                        <input type="hidden" value="<?php echo $stocks->stock_id; ?>" name="stock_id"> <!-- Doğru değişken -->
                        <button type="button" class="btn-close" id="kapatBtn<?php echo $stocks->stock_id; ?>" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input name="adi" type="text" class="form-control" placeholder="Güncel stok adedi" aria-label="Stok adedi" value="<?php echo $stocks->piece; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            <input name="ilac" type="text" class="form-control" placeholder="ilaç adı" aria-label="İlaç Adı" value="<?php echo $stocks->medicine_id; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Kaydet</button> <!-- Submit button -->
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>
</body>
<script>
  // Çalışan kategorisini bulmak için yardımcı fonksiyon
  function findEmployeeCategory(id) {
    var catsDiv = document.getElementById("cats");
    if (catsDiv) {
      var elements = catsDiv.getElementsByTagName("a");
      for (var i = 0; i < elements.length; i++) {
        if (elements[i].id === id) {
          return elements[i].getAttribute("name");
        }
      }
    }
    return null;
  }

  // Bildirimleri göstermek için yardımcı fonksiyon
  function showSnackbar(btnid, text, status) {
    var notifDiv = document.getElementById("notif");
    var circle = (status === 1) ? "check-circle.svg" : "cross-circle.svg";
    var color = (status === 1) ? "#aaec8a" : "#ed3b32";

    document.documentElement.style.setProperty('--notification-primary', color);

    var notificationContent = `
          <div class="notification">
            <div class="notification__body">
              <img src="<?php echo base_url('ViewAssets/') ?>images/` + circle + `" alt="Success" class="notification__icon">
                ` + text + ` &#128640;
            </div>
            <div class="notification__progress"></div>
          </div>
        `;
    notifDiv.innerHTML = notificationContent;
  }

  $(document).ready(function () {
    var forms = document.getElementsByTagName('form');
    var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
    for (var i = 0; i < forms.length; i++) {
      var formID = forms[i].id;
      if (formID) {
        var employeeID = formID.replace("personelEdit", "");
        var ajaxFormID = '#personelEdit' + employeeID;
        var ajaxDeleteID = '#delete_' + employeeID;

        // Silme düğmesi olayı
        $(ajaxDeleteID).click(function (e) {
          e.preventDefault();
          var confirmMessage = "Bu stoğu silmek istediğinize emin misiniz?";
          var confirmed = confirm(confirmMessage);

          if (confirmed) {
            console.log(base_url);
            var _URL = base_url + "/StockDel";
            var id = e.currentTarget.id.split("_")[1];
            console.log("ID=" + id);
            $.ajax({
              type: "POST",
              url: _URL,
              data: { id: id },
              success: function (result) {
                showSnackbar(null, "Stok Başarıyla Silindi!", 1);
                document.getElementById("tableID_" + id).remove();
              },
              error: function () {
                showSnackbar(null, "Stok Silinirken Bir Hata Oluştu!", 0);
              }
            });
          }
        });

        // Form gönderme olayı
        $(ajaxFormID).on('submit', function (e) {
          e.preventDefault();
          var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
          var _URL = base_url + "/EmployeeEdit"; // Çalışan güncelleme URL'si

          var formData = $(this).serialize();
          var formDataArray = {};
          var pairs = formData.split('&');
          for (var i = 0; i < pairs.length; i++) {
            var pair = pairs[i].split('=');
            formDataArray[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1] || '');
          }
          $.ajax({
            type: 'POST',
            url: _URL,
            data: formData,
            success: function (response) {
              if (response == "200") {
                showSnackbar(null, "Çalışan Güncellendi!", 1);
                document.getElementById(e.delegateTarget[1].id).click();
                var currentEmpID = e.delegateTarget[1].id.replace("kapatBtn", "");
                var trElement = document.getElementById("tableID_" + currentEmpID); 
                trElement.querySelector("#tableEmp_id").innerHTML = formDataArray["emp_id"];
                trElement.querySelector("#tableEmp_name").innerHTML = formDataArray["adi"];
                trElement.querySelector("#tableEmp_surname").innerHTML = formDataArray["soyadi"];
                trElement.querySelector("#tableEmp_gender").innerHTML = formDataArray["cinsiyeti"];
              } else {
                showSnackbar(null, "Çalışan Güncellenirken Bir Hata Oluştu!", 0);
              }
            },
            error: function () {
              console.error("Bir hata oluştu.");
            }
          });
        });
      }
    }
  });

</script>









</html>