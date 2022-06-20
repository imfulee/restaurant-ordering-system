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
    <script src="static/fontawesome-free-6.1.1-web/js/all.min.js"></script>
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

    .swal2-popup.swal2-modal.swal2-show {
        background-color: #007048;
    }

    .swal2-title {
        font-size: 3rem;
    }

    .swal2-cancel.swal2-styled.swal2-default-outline {
        color: #007048;
    }

    body {
        margin-left: 1rem;
        margin-right: 1rem;
    }

    p {
        margin-bottom: 0;
    }

    div#row_title {
        display: grid;
        grid-template-columns: 30% auto 30%;
        margin-top: 15px;
        margin-bottom: 1rem;
    }

    div#row_title h1 {
        font-size: 4rem;
        text-align: center;
        color: #007048;
    }

    div#btn_control_right {
        display: flex;
        justify-content: end;
        gap: 1rem;
    }

    a#link_report {
        width: 5rem;
    }

    div#row_main {
        background-color: #007048;
        color: white;
        padding: 1rem;
        border-radius: 0.5rem;
        font-size: 2rem;
    }

    p.p_center {
        display: flex;
        justify-content: center;
    }

    div#checkout_footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    div.div_checkout_table {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        align-items: center;
    }

    div.checkout_details {
        grid-column: 1 / 4;
        color: lightgray;
    }

    div.detail_row {
        display: grid;
        grid-template-columns: 3fr 1fr 1fr;
    }

    div.checkout_total_charge_div {
        display: flex;
        align-items: center;
    }

    div.checkout_button_container {
        display: flex;
        justify-content: end;
        align-items: center;
    }

    div.swal_grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        font-size: 3rem;
    }

    div.swal_grid input {
        width: 100%;
    }

    input#swal_grid_is_paying_amount {
        width: 100%;
    }

    button.btn_checkout {
        width: 5rem;
        height: 5rem;
        display: grid;
        justify-content: center;
        align-content: center;
        background-color: #ebdcc3;
        color: #007048;
    }

    div.item_name {
        display: flex;
        align-items: center;
    }

    div.detail_remark_container {
        display: flex;
        font-size: 1rem;
        gap: 5px;
        margin-left: 5px;
        flex-wrap: wrap;
        margin-right: 5px;
    }

    div.remark_div {
        background-color: gold;
        border-radius: 2px;
        padding: .5rem;
        color: #231F20;
        white-space: nowrap;
    }

    div.item_price_div {
        display: flex;
        justify-content: end;
    }
</style>

<body>
    <div id="row_title">
        <div id="btn_control_left">
            <a href="index.php" type="button" class="btn" title="跳回點餐系統" id="link_index"><i class="fas fa-share-square"></i></a>
        </div>
        <h1>結帳系統</h1>
        <div id="btn_control_right">
            <a href="report.php" type="button" class="btn" title="報表" id="link_report"><i class="fas fa-file-alt"></i></a>
            <a href="setting.php" type="button" class="btn" title="修改" id="link_setting"><i class="fas fa-pen"></i></a>
        </div>
    </div>
    <div id="row_main">
    </div>
</body>

<script>
    function update_change_amount() {
        const paid = parseInt(document.getElementById("swal_grid_is_paying_amount").value);
        const need = parseInt(document.getElementById("swal_grid_need_pay_amount").innerText.substring(1));
        const change = paid ? paid - need : 0;
        document.getElementById("swal_grid_change_amount").innerText = `$${change}`;
    }

    function draw_checkout() {
        $.post(
            "/API/checkout/get_checkout.php",
            function(json_data) {
                const checkout_records = JSON.parse(json_data);
                document.getElementById("row_main").innerHTML = '';
                if (checkout_records.length === 0) {
                    let error_shown = document.createElement("p");
                    error_shown.innerText = "沒有可以顯示的資料";
                    error_shown.className = "p_center";
                    document.getElementById("row_main").append(error_shown);
                } else {
                    for (const checkout_record of checkout_records) {
                        let checkout_table_div = document.createElement("div");
                        checkout_table_div.className = "div_checkout_table";
                        checkout_table_div.id = checkout_record["b01_uuid"];
                        let checkout_table_name_div = document.createElement("div");
                        checkout_table_name_div.innerText = `桌號${checkout_record["table_name"]}`;
                        let checkout_total_charge_div = document.createElement("div");
                        checkout_total_charge_div.className = "checkout_total_charge_div";
                        checkout_total_charge_div.innerHTML = `$${checkout_record["total_charge"]}
                        <a class="btn" data-bs-toggle="collapse" href="#collapse${checkout_record["b01_uuid"]}" role="button" aria-expanded="false" aria-controls="collapse${checkout_record["b01_uuid"]}"><i class="fa-solid fa-caret-down"></i></a>`;

                        let checkout_button_container = document.createElement("div");
                        checkout_button_container.className = "checkout_button_container";
                        let checkout_button = document.createElement("button");
                        checkout_button.className = "btn btn_checkout";
                        checkout_button.onclick = function() {
                            let swal_grid = document.createElement("div");
                            swal_grid.className = "swal_grid";
                            let swal_grid_is_paying = document.createElement("div");
                            swal_grid_is_paying.id = "swal_grid_is_paying";
                            swal_grid_is_paying.innerText = "繳付金額";
                            let swal_grid_is_paying_amount = document.createElement("input");
                            swal_grid_is_paying_amount.id = "swal_grid_is_paying_amount";
                            swal_grid_is_paying_amount.type = "number";
                            swal_grid_is_paying_amount.setAttribute("onkeyup", "update_change_amount()");

                            swal_grid.append(swal_grid_is_paying);
                            swal_grid.append(swal_grid_is_paying_amount);
                            swal_grid.insertAdjacentHTML('beforeend', `<div id="swal_grid_need_pay">結帳金額</div><div id="swal_grid_need_pay_amount">$${checkout_record["total_charge"]}</div>`);
                            swal_grid.insertAdjacentHTML('beforeend', `<div id="swal_grid_change">結帳金額</div><div id="swal_grid_change_amount">$0</div>`);
                            Swal.fire({
                                title: '結帳資訊',
                                html: swal_grid.outerHTML,
                                showConfirmButton: true,
                                showCancelButton: true,
                                confirmButtonText: '結賬',
                                cancelButtonText: "取消",
                            }).then(function(result) {
                                if (result.isConfirmed) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: '結帳成功',
                                        html: `本次結帳金額為$${checkout_record["total_charge"]}`,
                                        showConfirmButton: false,
                                        timer: 1500,
                                        didOpen: () => {
                                            document.querySelector(".swal2-success-circular-line-left").style.backgroundColor = "#007048";
                                            document.querySelector(".swal2-success-circular-line-right").style.backgroundColor = "#007048";
                                            document.querySelector(".swal2-success-fix").style.backgroundColor = "#007048";
                                        }
                                    }).then(function() {
                                        $.post(
                                            "/API/checkout/set_checkout.php",
                                            JSON.stringify({
                                                "b01_uuid": checkout_record["b01_uuid"]
                                            }),
                                            function() {
                                                draw_checkout();
                                            }
                                        );
                                    });
                                }
                            });

                        }
                        checkout_button.innerHTML = '<i class="fa-solid fa-dollar-sign"></i>';
                        checkout_button_container.append(checkout_button);

                        let checkout_details = document.createElement("div");
                        checkout_details.className = "collapse checkout_details"
                        checkout_details.id = `collapse${checkout_record["b01_uuid"]}`;

                        // adding the details of the checkout
                        for (const checkout_item of checkout_record["checkout_items"]) {
                            let detail_row = document.createElement("div");
                            detail_row.id = checkout_item["item_uuid"];
                            detail_row.className = "detail_row";
                            let detail_name = document.createElement("div");
                            detail_name.className = "item_name";
                            detail_name.innerText = checkout_item["item_name"];

                            // add remark tags
                            if (checkout_item["item_remark"] !== '') {
                                let detail_remark_container = document.createElement("div");
                                detail_remark_container.className = "detail_remark_container";
                                for (const remark of checkout_item["item_remark"].split(',')) {
                                    let remark_div = document.createElement("div");
                                    remark_div.className = "remark_div";
                                    remark_div.innerText = remark;
                                    detail_remark_container.append(remark_div);
                                }
                                detail_name.append(detail_remark_container);
                            }

                            let detail_quantity = document.createElement("div");
                            detail_quantity.innerText = `X ${checkout_item["item_quantity"]}`;
                            let detail_price = document.createElement("div");
                            detail_price.className = "item_price_div";
                            detail_price.innerText = `$${checkout_item["item_price"]}`;
                            detail_row.append(detail_name);
                            detail_row.append(detail_quantity);
                            detail_row.append(detail_price);
                            checkout_details.append(detail_row);
                        }

                        checkout_table_div.append(checkout_table_name_div);
                        checkout_table_div.append(checkout_total_charge_div);
                        checkout_table_div.append(checkout_button_container);
                        checkout_table_div.append(checkout_details);
                        document.getElementById("row_main").append(checkout_table_div);
                    }
                }
            }
        );
    }
    window.onload = function() {
        draw_checkout();
    }
</script>

</html>