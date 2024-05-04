<?php include ("header.php"); ?>
<div class="table ">

    <table class="table  table-hover" style="background:#f2f2f2;">
        <thead>
            <tr>
                <th scope="col">Hasta Adı</th>
                <th scope="col">İlaç Adı</th>
                <th scope="col">Adeti</th>
                <th scope="col">Fiyatı</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($items != "0")
                foreach ($items as $ilacID => $ilacSayisi) { ?>
                    <tr>
                        <td id="patient" scope="row"><?php echo $pat; ?></td>
                        <td><?php foreach ($medicines as $medicine)
                            if ($medicine->medicine_id == $ilacID)
                                echo $medicine->name; ?>
                        </td>
                        <td><?php echo $ilacSayisi; ?></td>
                        <td id="ilacFiyat"><?php foreach ($medicines as $medicine)
                            if ($medicine->medicine_id == $ilacID)
                                echo ($medicine->price * $ilacSayisi); ?>
                            TL</td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
    <div class="row"><a style="font-size:20pt;font-weight: bold; float:right;" id="toplamFiyat"></a></div>
    <div class="row" style="float:right;"><button class="btn btn-lg" onclick="SaveCart()"
            style="color: #808080; background:#ffa500; font-weight: bold; float:right;">Alışverişi
            Tamamla</button></div>
</div>

<div id="notif"></div>
<script>
    var pres_id = <?php echo $pres_id; ?>;
    $(document).ready(function () {
        toplamFiyat();  
    });
    function SaveCart() {
        var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
        var _URL = base_url + "/SaveCart";
        $.ajax({
            type: "POST",
            url: _URL,
            data: {
                pat_id: document.getElementById("patient").innerHTML.split("-")[0],
                total_price: document.getElementById("toplamFiyat").innerHTML.split(":")[1],
                pres_id: pres_id
            },
            success: function (result) {
                showSnackbar("NULL", "Alışveriş Tamamlandı!", 1);
                const myTimeout = setTimeout(GoToBill, 5000);
            },
            error: function (result) {
                showSnackbar("NULL", "Alışveriş Tamamlanırken Bir Hata Oluştu!", 0);
            }
        });
    }

    function GoToBill() {
        window.location.replace(window.location.origin + "/" + window.location.pathname.split("/")[1]+"/Faturalar");
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
                <img src="<?php echo base_url('ViewAssets/') ?>images/` + circle + `" alt="Success" class="notification__icon">
                ` + text + ` &#128640;
              </div>
              <div class="notification__progress"></div>
            </div>
          `;
        notifDiv.innerHTML = notificationContent;
    }
    function toplamFiyat() {
        var toplamFiyat = 0;
        document.querySelectorAll('#ilacFiyat').forEach(function (ilacFiyat) {
            var fiyat = parseFloat(ilacFiyat.innerText.replace(' TL', ''));
            toplamFiyat += fiyat;
        });
        document.getElementById("toplamFiyat").innerHTML = "Toplam Tutar:" + toplamFiyat;
    }
</script>
</body>

</html>