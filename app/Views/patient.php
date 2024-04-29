<?php include ("header.php"); ?>
<div class="table">
    <table class="table  table-hover" style="background:#f2f2f2;">
        <thead>
            <tr>
                <th scope="col">Hasta ID</th>
                <th scope="col">TCKNO</th>
                <th scope="col">Ad</th>
                <th scope="col">Soyad</th>
                <th>Cinsiyet</th>
                <th scope="col">Doğum Tarihi</th>
                <th scope="col">Adres</th>
                <th scope="col">Güncelle</th>
                <th scope="col">Reçete Görüntüle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $patient): ?>
                <tr id="tablePatID_<?php echo $patient->patient_id; ?>">
                    <td id="tableID"><?php echo $patient->patient_id; ?></td>
                    <td id="tableName"><?php echo $patient->p_name; ?></td>
                    <td id="tableSurname"><?php echo $patient->p_surname; ?></td>
                    <td id="tableGender"><?php echo $patient->gender; ?></td>
                    <td id="tableDOB"><?php echo $patient->dob; ?></td>
                    <td id="tableAdres"><?php echo $patient->address; ?></td>
                    <td id="tableTC"><?php echo $patient->tckno; ?></td>
                    <td><button id="delete_<?php echo $patient->patient_id; ?>" class="btn btn-sm" type="button"
                            data-bs-toggle="modal" style="color: #808080; background:#ffa500; font-weight: bold; "><i
                                class="fa-solid fa-trash"></i>&nbsp;Sil</button>
                        <button class="btn btn-sm" type="button" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop<?php echo $patient->patient_id; ?>"
                            style="color: #808080; background:#ffa500; font-weight: bold; "><i
                                class="fa-solid fa-pen-to-square"></i>&nbsp;Düzenle</button>
                    </td>
                    <td><button class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            style="color: #808080; background:#ffa500; font-weight: bold;">GÖRÜNTÜLE</button></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
<div id="notif"></div>
<?php foreach ($patients as $patient): ?>
    <div class="modal fade" id="staticBackdrop<?php echo $patient->patient_id; ?>" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editPatient_<?php echo $patient->patient_id; ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Bilgiler</h5>
                        <input type="hidden" value="<?php echo $patient->patient_id; ?>" name="pat_id">
                        <button id="kapatBtn<?php echo $patient->patient_id; ?>" type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> <i class="far fa-id-card"></i></span>
                            <input type="text" name="tckno" class="form-control" value="<?php echo $patient->tckno; ?>"
                                placeholder="TCKNO" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-pencil-alt"></i></span>
                            <input type="text" name="name" class="form-control" value="<?php echo $patient->p_name; ?>"
                                placeholder="AD" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                            <input name="surname" type="text" class="form-control" placeholder="SOYAD"
                                value="<?php echo $patient->p_surname; ?>" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                            <input name="dob" type="date" class="form-control" placeholder="DOĞUM TARİHİ"
                                value="<?php echo $patient->dob; ?>" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
                            <input name="address" type="text" class="form-control" placeholder="ADRES" aria-label="Username"
                                value="<?php echo $patient->address; ?>" aria-describedby="basic-addon1">
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-restroom"></i></span>
                                <select name="gender" class="form-select w-50" style="color: #808080;"
                                    aria-label="Default select example">
                                    <option value="Erkek" <?php if ($patient->gender == "Erkek")
                                        echo "selected"; ?>>Erkek
                                    </option>
                                    <option value="Kadın" <?php if ($patient->gender == "Kadın")
                                        echo "selected"; ?>>Kadın
                                    </option>
                                </select>
                            </div>
                        </div>
                        <button id="edit_<?php echo $patient->patient_id; ?>" class="btn btn-sm"
                            style="color: #808080; background:#ffa500; font-weight: bold; float: right;">KAYDET</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>
</body>
<script>
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
        var base_url = window.location.href.replace(window.location.href.split("/")[window.location.href.split("/").length - 1], "")
        <?php foreach ($patients as $patient): ?>
            $("#editPatient_" + <?php echo $patient->patient_id; ?>).submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                var formDataArray = {};
                var pairs = formData.split('&');
                for (var i = 0; i < pairs.length; i++) {
                    var pair = pairs[i].split('=');
                    formDataArray[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1] || '');
                }
                $.ajax({
                    type: "POST",
                    url: base_url + "PatientEdit",
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response == "200") {
                            showSnackbar("NULL", "Hasta Başarıyla Güncellendi!", 1);
                            document.getElementById("kapatBtn<?php echo $patient->patient_id; ?>").click();
                            var currentEmpID = <?php echo $patient->patient_id; ?>;
                            var trElement = document.getElementById("tablePatID_" + currentEmpID);
                            trElement.querySelector("#tableID").innerHTML = formDataArray["pat_id"];
                            trElement.querySelector("#tableName").innerHTML = formDataArray["name"];
                            trElement.querySelector("#tableSurname").innerHTML = formDataArray["surname"];
                            trElement.querySelector("#tableGender").innerHTML = formDataArray["gender"];
                            trElement.querySelector("#tableDOB").innerHTML = formDataArray["dob"];
                            trElement.querySelector("#tableAdres").innerHTML = formDataArray["address"];
                            trElement.querySelector("#tableTC").innerHTML = formDataArray["tckno"];
                        } else {
                            showSnackbar("NULL", "Hasta Güncelllenirken Hata Oluştu!", 0);
                            document.getElementById("kapatBtn<?php echo $patient->patient_id; ?>").click();
                        }
                    },
                    error: function () {
                        showSnackbar("NULL", "Hasta Güncelllenirken Hata Oluştu!", 0);
                        document.getElementById("kapatBtn<?php echo $patient->patient_id; ?>").click();
                    }
                });
            });
            $("#delete_" + <?php echo $patient->patient_id; ?>).click(function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: base_url + "PatientDel",
                    data: {
                        patient_id: <?php echo $patient->patient_id; ?>
                    },
                    success: function (result) {
                        document.getElementById("tablePatID_"+<?php echo $patient->patient_id; ?>).remove();
                        showSnackbar("NULL", "Hasta Başarıyla Silindi!", 1);
                    },
                    error: function (result) {
                        showSnackbar("NULL", "Hasta Silinirken Hata Oluştu!", 0);
                    }
                });
            });

        <?php endforeach; ?>
    });

</script>

</html>