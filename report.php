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

  a {
    text-decoration: none;
  }

  .table-dark {
    --bs-table-bg: #395f51;
    --bs-table-striped-bg: #007048;
    --bs-table-striped-color: #fff;
    --bs-table-active-bg: #373b3e;
    --bs-table-active-color: #fff;
    --bs-table-hover-bg: #323539;
    --bs-table-hover-color: #fff;
    color: #fff;
    border-color: #373b3e;
  }

  body>div.swal2-container.swal2-center.swal2-backdrop-show>div {
    background-color: #007048;
    color: white;
  }

  #swal2-title {
    color: white;
  }

  #swal2-html-container {
    color: #e0e0e0;
  }
</style>

<body>
  <div class="row">
    <div class="col-4">
      <a href="index.php" type="button" class="btn" title="跳回點餐系統" style="background-color: #007048;color: white;margin-top: 25px;margin-left: 126px;"><i class="fas fa-share-square"></i></a>
      <a href="setting.php" type="button" class="btn" title="修改" style="background-color: #007048;color: white;margin-top: 25px;margin-left: 10px;"><i class="fas fa-pen"></i></a>
    </div>
    <div class="col-4">
      <h1 style="margin-top: 15px;text-align: center;color: #007048;">報表</h1>
    </div>
    <div class="col-4">
      <button type="button" class="btn btn-primary" title="下載" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #007048;color: white;margin-top: 25px;margin-left: 285px;" onclick="update_modal_date()">
        <i class="fas fa-download"></i>
      </button>
    </div>
  </div>

  <div class="row" style="margin-top: 15px;color: #007048;">
    <div class="col-md-1"></div>
    <div class="col-md-11">
      <div style="display: inline-block;">
        選擇日期：
        <form method="post" id="download_report" action="/API/order/get_order_file.php">
          <input id="input_start_date" name="start_date" type="date" style="border-radius: 5px;border-color: aliceblue;" onchange="set_time()">
          ---
          <input id="input_end_date" name="end_date" type="date" style="border-radius: 5px;border-color: aliceblue;" onchange="set_time()">
          <input type="hidden">
        </form>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top: 15px;">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <table class="table table-dark" id="table_orders" border="1" style="margin-left: 15px; margin-bottom: 15px;margin-top: 15px;border-color: white;">
        <thead>
          <tr>
            <th width="40%">日期</th>
            <th width="60%">金額</th>
          </tr>
        </thead>
        <tbody id="tbody_order">
        </tbody>
      </table>
    </div>
    <div class="col-md-2"></div>
  </div>
</body>

</html>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #007048;color: white;">
      <div class="modal-body">
        <div style="margin-bottom: 10px;">下載日期：<span id="span_date_modal"></span></div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
          <label class="form-check-label" for="flexCheckChecked">
            細項
          </label>
        </div>
      </div>
      <div class="modal-footer" style="border-top: #007048;">
        <button type="button" class="btn" style="background-color: #ebdcc3;color: #007048;" data-bs-dismiss="modal">關閉</button>
        <button type="button" id="sureBtn" class="btn" data-bs-dismiss="modal" style="background-color: #ebdcc3;color: #007048;" onclick="download_file()">確定</button>
      </div>
    </div>
  </div>
</div>

<script>
  function update_modal_date() {
    document.getElementById("span_date_modal").innerText = '';
    const start_date = document.getElementById("input_start_date").value;
    const end_date = document.getElementById("input_end_date").value;
    if (start_date && end_date) {
      document.getElementById("span_date_modal").innerText = `${start_date} 至 ${end_date}`;
    } else {
      document.getElementById("span_date_modal").innerText = '沒選擇日期';
    }
  }

  function set_time() {
    const start_date = document.getElementById("input_start_date").value;
    const end_date = document.getElementById("input_end_date").value;
    if (document.getElementById("input_start_date").value && document.getElementById("input_end_date").value) {
      if (Date.parse(start_date) <= Date.parse(end_date)) {
        set_orders();
      } else {
        alert("你的開始日期比你的結束日期還晚");
      }
    } else if (!document.getElementById("input_start_date").value && !document.getElementById("input_end_date").value) {
      set_orders();
    }
  }

  function download_file() {
    const start_date = document.getElementById("input_start_date").value;
    const end_date = document.getElementById("input_end_date").value;
    if (document.getElementById("input_start_date").value && document.getElementById("input_end_date").value) {
      if (Date.parse(start_date) <= Date.parse(end_date)) {
        document.getElementById("download_report").submit();
      } else {
        alert("你的開始日期比你的結束日期還晚");
      }
    } else if (!document.getElementById("input_start_date").value && !document.getElementById("input_end_date").value) {
      document.getElementById("download_report").submit();
    } else {
      if (!document.getElementById("input_start_date").value) {
        alert("您還沒有輸入開始日期");
      }
      if (!document.getElementById("input_end_date").value) {
        alert("您還沒有輸入結束日期");
      }
    }
  }

  function set_orders() {
    let tbody_order = document.getElementById("tbody_order");
    let start_date = document.getElementById("input_start_date").value;
    let end_date = document.getElementById("input_end_date").value;

    // set the orders
    $.post("/API/order/get_order.php",
      JSON.stringify({
        start_date,
        end_date
      }),
      function(data) {
        tbody_order.innerHTML = '';
        const orders = JSON.parse(data);
        for (const order of orders) {
          let tr_outer = document.createElement("tr");
          tr_outer.style = "background-color: rgb(0, 112, 72);";
          let td_date_content = document.createElement("td");
          td_date_content.style = "background-color: rgb(0, 112, 72);";
          td_date_content.innerHTML = `${order["date_time"].split(' ')[0]}`;

          let td_price_content = document.createElement("td");
          td_price_content.style = "background-color: rgb(0, 112, 72);";
          let a_order_details = document.createElement("a");
          a_order_details.type = "button";
          a_order_details.setAttribute("data-bs-toggle", "collapse");
          a_order_details.setAttribute("data-bs-target", `#collapse_${order["uuid"]}`);
          a_order_details.setAttribute("aria-expanded", "false");
          a_order_details.setAttribute("aria-controls", `collapse_${order["uuid"]}`);
          a_order_details.innerHTML = '<i class="fas fa-sort-down" style="margin-bottom: 4px;color: white;"></i>';

          let div_details = document.createElement("div");
          div_details.className = "collapse";
          div_details.id = `collapse_${order["uuid"]}`;

          let div_card = document.createElement("div");
          div_card.className = "card card-body";
          div_card.style = "background-color: #007048;border-color: #007048;";
          let div_class_row = document.createElement("div");
          div_class_row.className = "row";

          let div_col5 = document.createElement("div");
          div_col5.className = "col-5";
          let div_col3 = document.createElement("div");
          div_col3.className = "col-3";
          let div_col4 = document.createElement("div");
          div_col4.className = "col-4";
          div_col4.style = "text-align: end;";

          for (const item of order["order_items"]) {
            let div_item_name = document.createElement("div");
            div_item_name.style = "margin-bottom: 5px;";
            div_item_name.innerHTML = item["item_name"];
            div_col5.append(div_item_name);

            let div_quantity = document.createElement("div");
            div_quantity.style = "margin-bottom: 5px;";
            div_quantity.innerHTML = `x${item["quantity"]}`;
            div_col3.append(div_quantity);

            let div_item_price = document.createElement("div");
            div_item_price.style = "margin-bottom: 5px;";
            div_item_price.innerHTML = `$${item["item_price"]}`;
            div_col4.append(div_item_price);
          }

          div_class_row.append(div_col5);
          div_class_row.append(div_col3);
          div_class_row.append(div_col4);
          div_card.append(div_class_row);
          div_details.append(div_card);

          td_price_content.innerHTML = `$${order["total_payment"]}` + a_order_details.outerHTML + div_details.outerHTML;

          tr_outer.append(td_date_content);
          tr_outer.append(td_price_content);
          tbody_order.append(tr_outer);
        }
      });
  }

  set_orders();
</script>