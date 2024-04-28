<?php include("header.php"); ?>

<head>
</head>
<div class="table">
  <table class="table table-hover" style="background:#f2f2f2;">
    <thead>
      <tr>
      <th scope="col">Güncelle</th>
        <th scope="col">Personel ID</th>
        <th scope="col">Ad</th>
        <th scope="col">Soyad</th>
        <th scope="col">Cinsiyet</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($employees as $employee) : ?>
        <tr id="tableID_<?php echo $employee->emp_id; ?>">
          <td>
            <button class="btn btn-sm" type="button" id="delete_<?php echo $employee->emp_id; ?>" 
              style="color: #808080; background:#ffa500; font-weight: bold;">
              <i class="fa-solid fa-trash"></i>&nbsp;Sil
            </button>
            &nbsp;
            <button class="btn btn-sm" type="button" data-bs-toggle="modal" 
              data-bs-target="#staticBackdrop<?php echo $employee->emp_id; ?>" 
              style="color: #808080; background:#ffa500; font-weight: bold;">
              <i class="fa-solid fa-pen-to-square"></i>&nbsp;Düzenle
            </button>
          </td>
          <td><?php echo $employee->emp_id; ?></td>
          <td><?php echo $employee->name; ?></td>
          <td><?php echo $employee->surname; ?></td>
          <td><?php echo $employee->gender; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php foreach ($employees as $employee): ?> <!-- Düzeltme -->
  <form id="personelEdit<?php echo $employee->emp_id; ?>"> <!-- Düzeltme -->
    <div class="modal fade" id="staticBackdrop<?php echo $employee->emp_id; ?>" data-bs-backdrop="static"
      data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Personel Bilgileri</h5> <!-- Başlık düzeltilmesi -->
            <input type="hidden" value="<?php echo $employee->emp_id; ?>" name="emp_id"> <!-- Doğru değişken -->
            <button type="button" class="btn-close" id="kapatBtn<?php echo $employee->emp_id; ?>" 
              data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
              <input name="PersonelAdi" type="text" class="form-control" placeholder="Personel Adı" 
                aria-label="Personel Adı" value="<?php echo $employee->name; ?>">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
              <input name="PersonelSoyadi" type="text" class="form-control" placeholder="Personel Soyadı" 
                aria-label="Personel Soyadı" value="<?php echo $employee->surname; ?>">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
              <select class="form-select" name="Cinsiyet">
                <option value="Erkek" <?php if ($employee->gender == "Erkek") echo "selected"; ?>>Erkek</option>
                <option value="Kadın" <?php if ($employee->gender == "Kadın") echo "selected"; ?>>Kadın</option>
              </select>
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
              <img src="${base_url('ViewAssets/')}images/${circle}" alt="Notification" class="notification__icon">
              ${text} &#128640;
            </div>
            <div class="notification__progress"></div>
          </div>
        `;
  notifDiv.innerHTML = notificationContent;
}

$(document).ready(function () {
  var forms = document.getElementsByTagName('form');
  
  for (var i = 0; i < forms.length; i++) {
    var formID = forms[i].id;
    if (formID) {
      var employeeID = formID.replace("personelEdit", "");
      var ajaxFormID = '#personelEdit' + employeeID;
      var ajaxDeleteID = '#delete_' + employeeID;

      // Silme düğmesi olayı
      $(ajaxDeleteID).click(function (e) {
        e.preventDefault();
        var confirmMessage = "Bu çalışanı silmek istediğinize emin misiniz?";
        var confirmed = confirm(confirmMessage);

        if (confirmed) {
          var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
          var _URL = base_url + "/EmployeeDel";
          var id = e.currentTarget.id.split("_")[1];
          
          $.ajax({
            type: "POST",
            url: _URL,
            data: { id: id },
            success: function (result) {
              showSnackbar(null, "Çalışan Başarıyla Silindi!", 1);
              document.getElementById("tableID_" + id).remove();
            },
            error: function () {
              showSnackbar(null, "Çalışan Silinirken Bir Hata Oluştu!", 0);
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
        for (var j = 0; j < pairs.length; j++) {
          var pair = pairs[j].split('=');
          formDataArray[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
        }

        $.ajax({
          type: 'POST',
          url: _URL,
          data: formData,
          success: function (response) {
            if (response == "200") {
              showSnackbar(null, "Çalışan Güncellendi!", 1);
              var currentEmpID = e.delegateTarget[1].id.replace("kapatBtn", "");

              document.getElementById("tableID_" + currentEmpID).innerHTML = formDataArray["PersonelAdi"];
              document.getElementById("tableMedPrice_" + currentEmpID).innerHTML = formDataArray["PersonelSoyadi"];
              document.getElementById("tableMedCat_" + currentEmpID).innerHTML = findEmployeeCategory(formDataArray["kategori"]);
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