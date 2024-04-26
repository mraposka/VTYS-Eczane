<?php include ("header.php"); ?>
<div id="cats" style="visibility: hidden;">
  <?php foreach ($categories as $category): ?>
    <a id="<?php echo $category->category_id; ?>"
      name="<?php echo $category->c_type; ?>"><?php echo $category->c_type; ?>-<?php echo $category->category_id; ?></a>
  <?php endforeach; ?>
</div>
<div class="table ">
  <table class="table  table-hover" style="background:#f2f2f2;">
    <thead>
      <tr>
        <th scope="col">Güncelle</th>
        <th scope="col">ilaç ID</th>
        <th scope="col">İlaç Adı</th>
        <th scope="col">Fiyat</th>
        <th scope="col">Kategori</th>
        <th scope="col">Üretici Firma</th>
        <th scope="col">Reçete Rengi</th>
        <th scope="col"></th> 
      </tr>
    </thead>
    <tbody>
      <?php foreach ($medicines as $medicine): ?>
        <tr id="tableID_<?php echo $medicine->medicine_id;?>">
          <td><button class="btn btn-sm" type="button" id="delete_<?php echo $medicine->medicine_id; ?>"
              style="color: #808080; background:#ffa500; font-weight: bold; "><i class="fa-solid fa-trash"></i>&nbsp;Sil</button>&nbsp;<button class="btn btn-sm"
              type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $medicine->medicine_id; ?>"
              style="color: #808080; background:#ffa500; font-weight: bold; "><i class="fa-solid fa-pen-to-square"></i>&nbsp;Düzenle</button></td>
          </td>
          <td id="tableMedID_<?php echo $medicine->medicine_id; ?>"><?php echo $medicine->medicine_id; ?></td>
          <td id="tableMedName_<?php echo $medicine->medicine_id; ?>"><?php echo $medicine->name; ?></td>
          <td id="tableMedPrice_<?php echo $medicine->medicine_id; ?>"><?php echo $medicine->price; ?></td>
          <td id="tableMedCat_<?php echo $medicine->medicine_id; ?>">
            <?php
            foreach ($categories as $category) {
              if ($category->category_id == $medicine->category_id) {
                echo $category->c_type;
                break;
              }
            }
            ?>
          </td>
          <td id="tableMedComp_<?php echo $medicine->medicine_id; ?>"><?php echo $medicine->company; ?></td>
          <td id="tableMedPresColor_<?php echo $medicine->medicine_id; ?>"><?php echo $medicine->pres_color; ?></td>
          <td><button class="btn btn-sm" style="color: #808080; background:#ffa500; font-weight: bold; "><i class="fa-solid fa-cart-shopping"></i>&nbsp;Sepete Ekle</button>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>
<?php foreach ($medicines as $medicine): ?>
  <form id="ilacEdit<?php echo $medicine->medicine_id; ?>">
    <div class="modal fade" id="staticBackdrop<?php echo $medicine->medicine_id; ?>" data-bs-backdrop="static"
      data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">İlaç Bilgileri</h5>
            <input type="hidden" value="<?php echo $medicine->medicine_id; ?>" name="med_id">
            <button type="button" class="btn-close" id="kapatBtn<?php echo $medicine->medicine_id; ?>"
              data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"> <i class="fas fa-pencil-alt"></i></span>
              <input name="IlaçAdı" type="text" class="form-control" placeholder="İlaç Adı" aria-label="Username"
                aria-describedby="basic-addon1" value="<?php echo $medicine->name; ?>">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"> <i class="fas fa-pencil-alt"></i></span>
              <input name="Fiyatı" type="text" class="form-control" placeholder="İlaç Adı" aria-label="Username"
                aria-describedby="basic-addon1" value="<?php echo $medicine->price; ?>">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
              <select class="form-select" name="kategori" aria-label="Kategori seçiniz">
                <?php foreach ($categories as $category): ?>
                  <?php if ($category->category_id == $medicine->category_id) { ?>
                    <option selected name="category" value="<?php echo $category->category_id; ?>">
                      <?php echo $category->c_type; ?>
                    </option>
                    <?php
                  } else { ?>
                    <option name="category" value="<?php echo $category->category_id; ?>">
                      <?php echo $category->c_type; ?>
                    </option><?php

                  } ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
              <input name="Firması" value="<?php echo $medicine->company; ?>" type="text" class="form-control"
                placeholder="Üretici Firma" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
              <select name="receteRengi">
                <option <?php if ($medicine->pres_color == "Normal")
                  echo "selected"; ?> value="Normal">Normal</option>
                <option <?php if ($medicine->pres_color == "Kırmızı")
                  echo "selected"; ?> value="Kırımızı">Kırımızı</option>
                <option <?php if ($medicine->pres_color == "Turuncu")
                  echo "selected"; ?> value="Turuncu">Turuncu</option>
                <option <?php if ($medicine->pres_color == "Yeşil")
                  echo "selected"; ?> value="Yeşil">Yeşil</option>
                <option <?php if ($medicine->pres_color == "Mor")
                  echo "selected"; ?> value="Mor">Mor</option>
              </select>
            </div>
            <button class="btn btn-sm"
              style="color: #808080; background:#ffa500; font-weight: bold; float: right;">KAYDET</button>
          </div>
        </div>
      </div>
    </div>
  </form>
<?php endforeach; ?>
<div id="notif"></div>
</body>

<script>
  function findCatName(id) {
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

  function showSnackbar(btnid, text, status) {
    var notifDiv = document.getElementById("notif");
    if (status == 1) {
      var circle = "check-circle.svg";
      document.documentElement.style.setProperty('--notification-primary', '#aaec8a');
    } else {
      var circle = "cross-circle.svg";
      document.documentElement.style.setProperty('--notification-primary', '#ed3b32');
    }
    console.log(circle);
    var notificationContent = `
            <div class="notification">
              <div class="notification__body">
                <img src="<?php echo base_url('ViewAssets/') ?>images/`+ circle + `" alt="Success" class="notification__icon">
                `+ text + ` &#128640;
              </div>
              <div class="notification__progress"></div>
            </div>
          `;
    notifDiv.innerHTML = notificationContent;
  }
  $(document).ready(function () {
    var forms = document.getElementsByTagName('form');
    var formIDs = [];
    for (var i = 0; i < forms.length; i++) {
      var formID = forms[i].id;
      if (formID) {
        medicineID = formID.replace("ilacEdit", "");
        var ajaxFormID = '#ilacEdit' + medicineID;
        var ajaxDeleteID = '#delete_' + medicineID;
        $(ajaxDeleteID).click(function (e) {
          e.preventDefault();
          var confirmMessage = "Bu ilacı silmek istediğinize emin misiniz?"; // Kullanıcıya gösterilecek onay iletişim kutusu mesajı

          // Kullanıcıya onay mesajını göster
          var confirmed = confirm(confirmMessage);

          // Kullanıcı EVET'i seçerse
          if (confirmed) {
            var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
            var _URL = base_url + "/MedicineDel";
            id=e.currentTarget.id.split("_")[1];
            // AJAX isteğini gönder
            $.ajax({
              type: "POST",
              url: _URL,
              data: {
                id: id
              },
              success: function (result) {
                showSnackbar("NULL", "İlaç Başarıyla Silindi!", 1);
                document.getElementById("tableID_" + id).remove();            
              },
              error: function (result) {
                showSnackbar("NULL", "İlaç Silinirken Bir Hata Oluştu!", 0);
              }
            });
          }
        });

        console.log(ajaxDeleteID);
        $(ajaxFormID).on('submit', function (e) {
          document.getElementById(e.delegateTarget[1].id).click();
          e.preventDefault();
          var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
          var _URL = base_url + "/MedicineEdit"
          console.log("Basıldı" + _URL);
          var formData = $(this).serialize();
          var formDataArray = {};
          console.log(formData);
          // URL kodlu dizeden anahtar-değer çiftlerini ayır
          var formDataArray = {};
          var pairs = formData.split('&');
          for (var i = 0; i < pairs.length; i++) {
            var pair = pairs[i].split('=');
            formDataArray[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1] || '');
          }
          $.ajax({
            type: 'POST',
            url: _URL, // StockAdd fonksiyonunun URL'si
            data: formData,
            success: function (response) {
              if (response == "200") {
                console.log("Succes");
                showSnackbar(e.delegateTarget[1].id, "İlaç Güncellendi!", 1);
                let currentMedID = e.delegateTarget[1].id.replace("kapatBtn", "");
                console.log("tableMedName_" + e.delegateTarget[1].id + "=" + formDataArray["IlaçAdı"]);
                document.getElementById("tableMedName_" + currentMedID).innerHTML = formDataArray["IlaçAdı"];
                document.getElementById("tableMedPrice_" + currentMedID).innerHTML = formDataArray["Fiyatı"];
                document.getElementById("tableMedCat_" + currentMedID).innerHTML = findCatName(formDataArray["kategori"]);
                document.getElementById("tableMedComp_" + currentMedID).innerHTML = formDataArray["Firması"];
                document.getElementById("tableMedPresColor_" + currentMedID).innerHTML = formDataArray["receteRengi"];
              } else {
                showSnackbar("MedicineAdderKapatBtn", "İlaç Güncellenirken Bir Hata Oluştu!", 0)
              }
            },
            error: function () {
              $('#errorMessage').text("Error occurred while processing your request.").show();
            }
          });
        });

      }
    }
  });
</script>

</html>