<?php include ("header.php"); ?>
<style>
  :root {
    --notification-background: #313e2c;
    --notification-primary: #aaec8a;
    --background: #FAF9FF;
  }

  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: 'Poppins', sans-serif;
    height: 100vh;
    background-color: var(--background);
  }

  .notification {
    position: absolute;
    width: max-content;
    left: 0;
    right: 0;
    bottom: 1.5rem;
    margin-left: auto;
    margin-right: auto;
    border-radius: 0.375rem;
    background-color: var(--notification-background);
    color: var(--notification-primary);
    box-shadow: 0 1px 10px rgba(0, 0, 0, 0.1);
    transform: translateY(1.875rem);
    opacity: 0;
    visibility: hidden;
    animation: fade-in 3s linear;
  }

  .notification__icon {
    height: 1.625rem;
    width: 1.625rem;
    margin-right: 0.25rem;
  }

  .notification__body {
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 1rem 0.5rem;
  }

  .notification__progress {
    position: absolute;
    left: 0.25rem;
    bottom: 0.25rem;
    width: calc(100% - 0.5rem);
    height: 0.2rem;
    transform: scaleX(0);
    transform-origin: left;
    background: linear-gradient(to right,
        var(--notification-background),
        var(--notification-primary));
    border-radius: inherit;
    animation: progress 2.5s 0.3s linear;
  }

  @keyframes fade-in {
    5% {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }

    95% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes progress {
    to {
      transform: scaleX(1);
    }
  }
</style>

<body>

  <div class="cards ">
    <div class="container py-5">
      <h1 class="text-center" style="color: #808080;">Admin Paneli</h1>
      <div class="row">

        <div class="col-md-4">
          <div class="card" style="background:#f2f2f2;">
            <img id="MDB-logo5" class="card-img-top" src="<?php echo base_url('ViewAssets/') ?>images/5.jpg"
              alt="..." />
            <div class="card-body">
              <h5 class="card-title" style="color: #808080; text-align:center;">PERSONEL</h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <button class="btn " type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"
                style="color: #808080; background:#ffa500; font-weight: bold;">EKLE</button>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="background:#f2f2f2;">
            <img id="MDB-logo5" class="card-img-top" src="<?php echo base_url('ViewAssets/') ?>images/8.jpg"
              alt="..." />
            <div class="card-body">
              <h5 class="card-title" style="color: #808080; text-align:center;">HASTA</h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <button class="btn " type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop4"
                style="color: #808080; background:#ffa500; font-weight: bold;">EKLE</button>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card" style="background:#f2f2f2;">
            <img id="MDB-logo5" class="card-img-top" src="<?php echo base_url('ViewAssets/') ?>images/9.jpg"
              alt="..." />
            <div class="card-body">
              <h5 class="card-title" style="color: #808080; text-align:center;">STOK</h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <button class="btn " type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop5"
                style="color: #808080; background:#ffa500; font-weight: bold;">EKLE</button>
            </div>
          </div>
        </div>
      </div><br>
      <div class="row">
        <div class="col-lg-4">
          <div class="card" style="background:#f2f2f2;">
            <img id="MDB-logo6" class="card-img-top" src="<?php echo base_url('ViewAssets/') ?>images/6.jpg"
              alt="..." />
            <div class="card-body">
              <h5 class="card-title" style="color: #808080; text-align:center;">İLAÇ</h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <button class="btn " data-bs-toggle="modal" id="ekleBtn" data-bs-target="#staticBackdrop"
                style="color: #808080; background:#ffa500; font-weight: bold; ">EKLE</button>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card" style="background:#f2f2f2;">
            <img id="MDB-logo7" class="card-img-top" src="<?php echo base_url('ViewAssets/') ?>images/7.jpg"
              alt="..." />
            <div class="card-body">
              <h5 class="card-title" style="color: #808080;text-align:center;">KATEGORİ</h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop3"
                style="color: #808080; background:#ffa500; font-weight: bold;">EKLE</button>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card" style="background:#f2f2f2;">
            <img id="MDB-logo8" class="card-img-top" src="<?php echo base_url('ViewAssets/') ?>images/10.jpg"
              alt="..." />
            <div class="card-body">
              <h5 class="card-title" style="color: #808080;text-align:center;">Reçete</h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop6"
                style="color: #808080; background:#ffa500; font-weight: bold;">EKLE</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="MedicineAdder"> <!-- Form başlangıcı -->
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">İlaç Ekle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Form Girdi Alanları -->
            <div class="input-group mb-3">
              <input type="text" name="IlaçAdı" class="form-control" placeholder="İlaç Adı" />
            </div>
            <div class="input-group mb-3">
              <input type="text" name="Fiyatı" class="form-control" placeholder="Fiyatı" />
            </div>
            <div class="input-group mb-3">
              <input type="text" name="Firması" class="form-control" placeholder="Firması" />
            </div>
            <select class="form-select" name="receteRengi">
              <option selected>Reçete rengini seçin.</option>
              <option value="Kırmızı">Kırmızı</option>
              <option value="Yeşil">Yeşil</option>
              <option value="Sarı">Sarı</option>
              <option value="Mor">Mor</option>
              <option value="Turuncu">Turuncu</option>
            </select>
            <div style="margin-bottom: 15px;"></div>
            <select class="form-select" name="kategori" aria-label="Kategori seçiniz">
              <option selected>Kategori seçiniz.</option>
              <?php foreach ($categorys as $category): ?>
                <option name="category" value="<?php echo $category->category_id; ?>"><?php echo $category->c_type; ?>
                </option>
              <?php endforeach; ?>
            </select>
            <div style="margin-bottom: 20px;"></div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-custom btn-lg w-100 fs-6"
              style="background-color: #ffa500; color: white;">Ekle</button> <!-- Formu gönder -->
          </div>
        </form> <!-- Form bitişi -->
      </div>
    </div>
  </div>
  <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Personel Ekle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" id="EmployeeAdderKapatBtn"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="EmployeeAdder">
            <div class="input-group mb-3">
              <input type="text" name="Ad" class="form-control form-control-lg bg-ligth fs-6" placeholder="Ad" />
            </div>
            <div class="input-group mb-3">
              <input type="text" name="Soyad" class="form-control form-control-lg bg-ligth fs-6" placeholder="Soyad" />
            </div>
            <select class="form-select w-100" name="Cinsiyet" style="color: #808080;"
              aria-label="Default select example">
              <option selected>Cinsiyet seçin..</option>
              <option value="Kadın">Kadın &#9792;</option>
              <option value="Erkek">Erkek &#9794;</option>
            </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-custom btn-lg w-100 fs-6"
            style="background-color: #ffa500; color: #808080; font-weight: bold;">EKLE</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Kategori Ekle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" id="CategoryAdderKapatBtn"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="CategoryAdder">
            <div class="input-group mb-3">
              <input type="text" name="Kategori" id="" class="form-control form-control-lg bg-ligth fs-6"
                placeholder="Kategori adını girin." />
            </div> 
        </div>
        <div class="modal-footer"><button type="submit" class="btn btn-custom btn-lg w-100 fs-6"
            style="background-color: #ffa500; color: #808080; font-weight: bold;">EKLE</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="staticBackdrop5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdrop5Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdrop5Label">Stok Ekle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" id="StockAdderKapatBtn"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="StockAdder">
            <div class="input-group mb-3">
              <input type="text" name="Stok" class="form-control form-control-lg bg-light fs-6"
                placeholder="Stok sayısını girin." />
            </div>
            <div class="input-group mb-3">
              <select class="form-select" name="ilac" aria-label="İlaç seçiniz">
                <option selected disabled>İlaç seçiniz.</option>
                <?php foreach ($medicines as $medicine): ?>
                  <option name="id" value="<?php echo $medicine->medicine_id; ?>"><?php echo $medicine->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-custom btn-lg w-100 fs-6"
            style="background-color: #ffa500; color: white; font-weight: bold;">EKLE</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  </form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
  </div>
  </div>
  </div>
  </div>
  <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Hasta Ekle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" id="PatientAdderKapatBtn"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="PatientAdder">
            <div class="input-group mb-3">
              <div class="input-group mb-3">
                <input type="text" name="TC" class="form-control form-control-lg bg-ligth fs-6"
                  placeholder="TC Kimlik No" />
              </div>
              <div class="input-group mb-3">
                <input type="text" name="Ad" class="form-control form-control-lg bg-ligth fs-6" placeholder="Ad" />
              </div>
              <div class="input-group mb-3">
                <input type="text" name="Soyad" class="form-control form-control-lg bg-ligth fs-6"
                  placeholder="Soyad" />
              </div>
              <div class="input-group mb-3">
                <input type="date" name="DogumTarihi" class="form-control form-control-lg bg-ligth fs-6"
                  placeholder="Doğum Tarihi" />
              </div>
              <div class="input-group mb-3">
                <input type="text" name="Adres" class="form-control form-control-lg bg-ligth fs-6"
                  placeholder="Adres" />
              </div>
              <select class="form-select w-100" name="Cinsiyet" style="color: #808080;"
                aria-label="Default select example">
                <option selected>Cinsiyet seçin..</option>
                <option value="Kadın">Kadın &#9792;</option>
                <option value="Erkek">Erkek &#9794;</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-custom btn-lg w-100 fs-6"
                style="background-color: #ffa500; color: white; font-weight: bold;">EKLE</button> 
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="staticBackdrop6" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="PresAdder"> <!-- Form başlangıcı  Reçete-->
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Reçete Ekle</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="input-group mb-3">
              <select class="form-select" name="pat_id" aria-label="İlaç seçiniz">
                <option selected disabled>Hasta seçiniz.</option>
                <?php foreach ($patient as $patients): ?>
                  <option name="patient" value="<?php echo $patients->patient_id; ?>">
                    <?php echo $patients->p_name, " ", $patients->p_surname; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="input-group mb-3">
              <input type="text" name="verilmetarih" name="tarih" class="form-control form-control-lg bg-ligth fs-6"
                placeholder="Verilme tarihi" />
            </div>
            <div class="input-group mb-3">
              <input type="text" name="kullanımsüre" name="sure" class="form-control form-control-lg bg-ligth fs-6"
                placeholder="Kullanım Süresi" />
            </div>
            <select class="form-select" name="receteRengi">
              <option selected>Reçete rengini seçin.</option>
              <option value="Kırmızı">Kırmızı</option>
              <option value="Yeşil">Yeşil</option>
              <option value="Sarı">Sarı</option>
              <option value="Mor">Mor</option>
              <option value="Turuncu">Turuncu</option>
            </select>
            <br>
            <div class="dropdown">
              <select id="ilacSelect" class="form-select" aria-label="Default select example">
                <option value="-1" selected>İlaç Seçiniz</option>
                <?php foreach ($medicines as $medicine): ?>
                  <option value="<?php echo $medicine->medicine_id; ?>"><?php echo $medicine->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div><br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ilaç</th>
                  <th scope="col">İlaçlar</th>
                  <th scope="col">Adet</th>
                  <th scope="col">Sil</th>
                </tr>
              </thead>
              <tbody id="ilacTable">
              </tbody>
            </table>
            <input type="hidden" value="" id="ilaclar" name="ilac">


          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="MedicineAdderKapatBtn"
              data-bs-dismiss="modal">Kaydet</button>
            <!-- Formu gönder -->
          </div>
        </form> <!-- Form bitişi -->
      </div>
    </div>
  </div>


  <div id="notif"> </div>
  <script>
    //Succes-Fail Alert
    function showSnackbar(btnid, text, status) {
      document.getElementById(btnid).click();
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
                <img src="<?php echo base_url('ViewAssets/') ?>images/` + circle + `" alt="Success" class="notification__icon">
                ` + text + ` &#128640;
              </div>
              <div class="notification__progress"></div>
            </div>
          `;
      notifDiv.innerHTML = notificationContent;
    }
  </script>

  <script>
    function silButtonClick(id) {
      var tbody = document.getElementById("ilacTable"); // tbody elementini al
      var trList = tbody.getElementsByTagName("tr");

      // Tablodan ilgili satırı bul ve adetini azalt
      for (var i = 0; i < trList.length; i++) {
        var tr = trList[i];
        if (tr.id == id) {
          var adetCell = tr.querySelector('td.adet');
          var adet = parseInt(adetCell.textContent);
          adet--;
          adetCell.textContent = adet;

          // Adet 0 ise satırı sil
          if (adet == 0) {
            tbody.removeChild(tr);
          }
          break; // Döngüden çık
        }
      }
      ilacBilgileriniGetir();
    }
    function ilacBilgileriniGetir() {
      var ilacBilgileri = [];
      var tbody = document.getElementById("ilacTable");
      var trList = tbody.getElementsByTagName("tr");
      for (var i = 0; i < trList.length; i++) {
        var tr = trList[i];
        var id = tr.id;
        var adet = parseInt(tr.querySelector('td.adet').textContent);
        ilacBilgileri.push({ id: id, adet: adet });
      }
      return ilacBilgileri;
    }
    $(document).ready(function () {

      $('#ilacSelect').change(function () {
        var id = $(this).find(':selected')[0].value;
        var name = $(this).find(':selected')[0].innerHTML;

        // Tablodaki öğelerin kontrolü
        var existingRow = $('#ilacTable').find('#' + id);
        if (existingRow.length > 0) {
          // Öğe tabloda varsa adetini arttır
          var adetCell = existingRow.find('td.adet');
          var adet = parseInt(adetCell.text());
          adet++;
          adetCell.text(adet);
        } else {
          // Tabloda yoksa yeni bir satır oluştur
          if (id != -1) {
            var yeniSiraNumarasi = id;
            var yeniIlacAdi = name;
            var yeniSatir = document.createElement("tr");
            yeniSatir.id = yeniSiraNumarasi;
            var siraHucresi = document.createElement("th");
            siraHucresi.setAttribute("scope", "row");
            siraHucresi.textContent = yeniSiraNumarasi;
            yeniSatir.appendChild(siraHucresi);
            var ilacAdiHucresi = document.createElement("td");
            ilacAdiHucresi.textContent = yeniIlacAdi;
            yeniSatir.appendChild(ilacAdiHucresi);
            var adetHucre = document.createElement("td");
            adetHucre.className = "adet"; // adet hücresine class ekle
            adetHucre.textContent = 1;
            yeniSatir.appendChild(adetHucre);
            var silButonuHucresi = document.createElement("td");
            var silButonu = document.createElement("button");
            silButonu.className = "btn btn-sm";
            silButonu.type = "button";
            silButonu.setAttribute("id", "ilacSil" + yeniSiraNumarasi);
            silButonu.style.color = "#808080";
            silButonu.style.background = "#ffa500";
            silButonu.style.fontWeight = "bold";
            silButonu.textContent = "SİL";
            silButonu.setAttribute("onclick", "silButtonClick(" + yeniSiraNumarasi + ");");
            silButonuHucresi.appendChild(silButonu);
            yeniSatir.appendChild(silButonuHucresi);
            document.getElementById("ilacTable").appendChild(yeniSatir);
            document.getElementById("ilacSelect").value += id + ",";
          }
        }
        ilacBilgileriniGetir();
        let element = document.getElementById("ilacSelect");
        element.value = "-1";
      });


      $('#PresAdder').on('submit', function (e) {
        var ilaclar = ilacBilgileriniGetir();
        e.preventDefault();
        var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
        var stockAdd_URL = base_url + "/PresAdd"
        var formData = $(this).serialize();
        formData += '&ilaclar=' + JSON.stringify(ilaclar);
        $.ajax({
          type: 'POST',
          url: stockAdd_URL, // StockAdd fonksiyonunun URL'si
          data: formData,
          success: function (response) {
            if (response == "200") {
              console.log("Succes");
              showSnackbar("PatientAdderKapatBtn", "Reçete Eklendi!", 1)
            } else {
              showSnackbar("PatientAdderKapatBtn", "Reçete Eklenirken Bir Hata Oluştu!", 0)
            }
          },
          error: function () {
            $('#errorMessage').text("Error occurred while processing your request.").show();
          }
        });
      });



      $('#PatientAdder').on('submit', function (e) {
        e.preventDefault();
        var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
        var stockAdd_URL = base_url + "/PatientAdd"
        var formData = $(this).serialize();
        $.ajax({
          type: 'POST',
          url: stockAdd_URL, // StockAdd fonksiyonunun URL'si
          data: formData,
          success: function (response) {
            if (response == "200") {
              console.log("Succes");
              showSnackbar("PatientAdderKapatBtn", "Hasta Eklendi!", 1)
            } else {
              showSnackbar("PatientAdderKapatBtn", "Hasta Eklenirken Bir Hata Oluştu!", 0)
            }
          },
          error: function () {
            $('#errorMessage').text("Error occurred while processing your request.").show();
          }
        });
      });
    });
    //PatientAdd

    //EmployeeAdd
    $(document).ready(function () {
      $('#EmployeeAdder').on('submit', function (e) {
        e.preventDefault();
        var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
        var stockAdd_URL = base_url + "/EmployeeAdd"
        var formData = $(this).serialize();
        $.ajax({
          type: 'POST',
          url: stockAdd_URL, // StockAdd fonksiyonunun URL'si
          data: formData,
          success: function (response) {
            if (response == "200") {
              console.log("Succes");
              showSnackbar("EmployeeAdderKapatBtn", "Personel Eklendi!", 1)
            } else {
              showSnackbar("EmployeeAdderKapatBtn", "Personel Eklenirken Bir Hata Oluştu!", 0)
            }
          },
          error: function () {
            $('#errorMessage').text("Error occurred while processing your request.").show();
          }
        });
      });
    });
    //EmployeeAdd 

    //StockAdd
    $(document).ready(function () {
      $('#StockAdder').on('submit', function (e) {
        e.preventDefault();
        var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
        var stockAdd_URL = base_url + "/StockAdd"
        var formData = $(this).serialize();
        $.ajax({
          type: 'POST',
          url: stockAdd_URL, // StockAdd fonksiyonunun URL'si
          data: formData,
          success: function (response) {
            if (response == "200") {
              console.log("Succes");
              showSnackbar("StockAdderKapatBtn", "Stok Eklendi!", 1)
            } else {
              showSnackbar("StockAdderKapatBtn", "Stok Eklenirken Bir Hata Oluştu!", 0)
            }
          },
          error: function () {
            $('#errorMessage').text("Error occurred while processing your request.").show();
          }
        });
      });
    });
    //StockAdd

    //CategoryAdd
    $(document).ready(function () {
      $('#CategoryAdder').on('submit', function (e) {
        e.preventDefault();
        var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
        var stockAdd_URL = base_url + "/CategoryAdd"
        var formData = $(this).serialize();
        $.ajax({
          type: 'POST',
          url: stockAdd_URL, // StockAdd fonksiyonunun URL'si
          data: formData,
          success: function (response) {
            if (response == "200") {
              console.log("Succes");
              showSnackbar("CategoryAdderKapatBtn", "Kategori Eklendi!", 1)
            } else {
              showSnackbar("CategoryAdderKapatBtn", "Kategori Eklenirken Bir Hata Oluştu!", 0)
            }
          },
          error: function () {
            $('#errorMessage').text("Error occurred while processing your request.").show();
          }
        });
      });
    });
    //CategoryAdd

    //MedicineAdd
    $(document).ready(function () {
      $('#MedicineAdder').on('submit', function (e) {
        e.preventDefault();
        var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
        var stockAdd_URL = base_url + "/MedicineAdd"
        var formData = $(this).serialize();
        $.ajax({
          type: 'POST',
          url: stockAdd_URL, // StockAdd fonksiyonunun URL'si
          data: formData,
          success: function (response) {
            if (response == "200") {
              console.log("Succes");
              showSnackbar("MedicineAdderKapatBtn", "İlaç Eklendi!", 1)
            } else {
              showSnackbar("MedicineAdderKapatBtn", "İlaç Eklenirken Bir Hata Oluştu!", 0)
            }
          },
          error: function () {
            $('#errorMessage').text("Error occurred while processing your request.").show();
          }
        });
      });
    });
    //MedicineAdd 
  </script>
</body>

</html>