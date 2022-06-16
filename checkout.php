<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <script src="js/all.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/sweetalert2.all.js"></script>
    <script src="js/sweetalert2.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.css">
    <title>Zulite</title>
</head>
<style>
    body {
        font-family: 'Noto Sans TC', sans-serif;
        font-size: 16px;
        background-color: #ebdcc3;
    }

    .btn {
        background-color: #007048;
        color: white;
        font-size: 3rem;
    }

    .btn_reverse {
        background-color: #ebdcc3;
        color: #007048;
        font-size: 2rem;
    }

    .swal2-popup.swal2-modal.swal2-icon-error.swal2-show,
    .swal2-popup.swal2-modal.swal2-icon-success.swal2-show {
        background-color: #007048;
        color: white;
    }

    .swal2-html-container,
    .swal2-title {
        color: white;
    }

    .swal2-success-circular-line-left,
    .swal2-success-circular-line-right {
        background-color: #007048;
    }

    .swal2-icon.swal2-error.swal2-icon-show {
        background-color: white;
    }

    body {
        margin-left: 2rem;
        margin-right: 2rem;
    }

    div#row_title {
        display: grid;
        grid-template-columns: 30% auto 30%;
        margin-top: 17px;
        margin-bottom: 1rem;
    }

    div#row_main {
        background-color: #007048;
        color: white;
        padding: 1rem;
    }

    select#select_table {
        font-size: 2rem;
        width: 100%
    }

    div#row_main {
        font-size: 2rem;
    }

    div#checkout_footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    div.div_item {
        display: grid;
        grid-template-columns: 1fr 1fr;
        margin-bottom: 1rem;

    }

    div.div_item_up_right {
        display: flex;
        justify-content: flex-end;
    }

    div.div_item_down_left {
        color: rgb(210, 210, 210);
    }

    div.div_item_down_right {
        display: flex;
        justify-content: flex-end;
    }
</style>

<body>
    <div id="row_title">
        <div id="btn_control_left">
            <a href="index.php" type="button" class="btn" title="跳回點餐系統" id="link_index"><i class="fas fa-share-square"></i></a>
        </div>
        <h1 style="text-align: center;color: #007048;">結帳系統</h1>
        <div id="btn_control_right">
            <a href="report.php" type="button" class="btn" title="報表" id="link_report" style="float: right; margin-right: 2rem;"><i class="fas fa-file-alt"></i></a>
            <a href="setting.php" type="button" class="btn" title="修改" id="link_setting" style="float: right; margin-right: 1rem;"><i class="fas fa-pen"></i></a>
        </div>
    </div>
    <select id="select_table" class="form-select form-select-lg" aria-label="桌號選擇"></select>
    <div id="row_main">
        <div id="checkout_list"></div>
        <div id="checkout_footer">
            <div>總計：$<span id="checkout_amount">0</span></div>
            <div id="btn_checkout" class="btn btn_reverse" onclick="checkout_submit()"><i class="fas fa-dollar-sign"></i></div>
        </div>
    </div>
</body>

</html>

<script>
    var global_json_data;

    function set_checkout() {
        // get the current table uuid and post it to get the checkout items
        const current_table_uuid = document.getElementById("select_table").value;

        $.post(
            "/API/checkout/get_checkout.php",
            JSON.stringify({
                "table_uuid": current_table_uuid
            }),
            function(data) {
                json_data = JSON.parse(data);
                global_json_data = json_data;

                // change the price
                document.getElementById("checkout_amount").innerText = json_data["total_charge"];

                // clear the old post
                document.getElementById("checkout_list").innerHTML = '';

                // add the items
                for (const checkout_item of json_data["checkout_items"]) {
                    let div_item = document.createElement("div");
                    div_item.className = "div_item";
                    let div_item_name = document.createElement("div");
                    div_item_name.innerText = checkout_item["item_name"];
                    div_item_name.className = "div_item_up_left";
                    let div_item_quantity = document.createElement("div");
                    div_item_quantity.innerText = `x${checkout_item["item_quantity"]}`;
                    div_item_quantity.className = "div_item_up_right";
                    let div_item_remark = document.createElement("div");
                    div_item_remark.innerText = checkout_item["item_remark"];
                    div_item_remark.className = "div_item_down_left";
                    let div_item_price = document.createElement("div");
                    div_item_price.innerText = `$${checkout_item["item_price"]}`;
                    div_item_price.className = "div_item_down_right";
                    div_item.append(div_item_name);
                    div_item.append(div_item_quantity);
                    div_item.append(div_item_remark);
                    div_item.append(div_item_price);
                    document.getElementById("checkout_list").append(div_item);
                }
            }
        )
    }

    function checkout_submit() {
        console.log(global_json_data);
        if (global_json_data && global_json_data["checkout_items"].length !== 0) {
            $.post(
                "/API/checkout/set_checkout.php",
                JSON.stringify({
                    "b01_uuid": global_json_data["b01_uuid"]
                }),
                function(data_checkout) {
                    json_data_checkout = JSON.parse(data_checkout);
                    if (json_data_checkout["checkout_result"]) {
                        Swal.fire({
                            icon: 'success',
                            title: '結帳成功',
                            html: `本次結帳金額為$${global_json_data["total_charge"]}`,
                            showConfirmButton: false,
                            timer: 1500,
                            didOpen: () => {
                                document.querySelector(".swal2-success-circular-line-left").style.backgroundColor = "#007048";
                                document.querySelector(".swal2-success-circular-line-right").style.backgroundColor = "#007048";
                                document.querySelector(".swal2-success-fix").style.backgroundColor = "#007048";
                            }
                        });
                        global_json_data = '';
                        set_checkout();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '結帳失敗',
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                }
            );
        } else {
            Swal.fire({
                icon: 'error',
                title: '結帳失敗',
                showConfirmButton: false,
                // timer: 1500,
            });
        }
    }

    $.post("/API/table/get_table.php",
        function(data) {
            const json_table = JSON.parse(data);
            for (const [index, table] of json_table.entries()) {
                let table_options = document.createElement("option");
                table_options.value = table["uuid"];
                table_options.innerText = `桌號${table["table_name"]}`;
                document.getElementById("select_table").append(table_options);
                document.getElementById("select_table").onchange = function() {
                    set_checkout();
                }
            }
            set_checkout();
        }
    );
</script>