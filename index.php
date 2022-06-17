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

  a {
    text-decoration: none;
  }

  .tableBtn {
    color: #007048;
    width: 100px;
    border: 2px solid;
    margin-bottom: 10px;
  }

  .tableBtn:focus,
  .tableBtn :visited {
    background-color: #007048;
    color: white;
  }

  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background-color: #007048;
    color: white;
  }

  .nav-link {
    color: #007048;
    width: 100px;
    margin-bottom: 5px;
    border: 2px solid;
  }

  .projectBtn:focus {
    background-color: #007048;
    color: white;
  }

  .projectBtn {
    color: #007048;
    width: 180px;
    border: 2px solid;
    display: grid;
  }

  .row {
    --bs-gutter-x: 0;
  }

  ul {
    list-style: none;
    padding-left: 0px;
    margin-top: 5px;
  }

  li {
    display: inline;
  }

  .fa-trash-alt {
    margin-right: 2px;
  }

  .addBtn {
    color: #ebdcc3;
    width: 180px;
    border: 2px solid #ebdcc3;
    margin-bottom: 10px;
    border: 2px solid;
  }

  .addBtn:focus {
    background-color: #ebdcc3;
    color: white;
    border: 0;
  }

  .add-on {
    background-color: #007048;
    color: white;
    border: 0;
    border-radius: 5px;
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

  #checkboxes {
    height: auto;
  }

  #checkboxes input[type="checkbox"] {
    display: none;
  }

  input[type="checkbox"] {
    -webkit-appearance: checkbox;
  }

  #checkboxes input[type="checkbox"]:checked+.button {
    background: #ebdcc3;
    color: #007048;
  }

  #checkboxes .button {
    display: inline-block;
    margin: 0 5px 10px 0;
    padding: 5px 10px;
    border: 2px solid #ebdcc3;
    color: #ebdcc3;
    cursor: pointer;
  }

  #checkboxes .round {
    border-radius: 5px;
  }

  #reviseCheckbox {
    height: 100px;
    overflow-y: auto;
  }

  #reviseCheckbox input[type="checkbox"] {
    display: none;
  }

  #reviseCheckbox input:checked+.button {
    background: #ebdcc3;
    color: #007048;
  }

  #reviseCheckbox .button {
    display: inline-block;
    margin: 0 5px 10px 0;
    padding: 5px 10px;
    border: 2px solid #ebdcc3;
    color: #ebdcc3;
    cursor: pointer;
  }

  #reviseCheckbox .button:hover {
    background: #ebdcc3;
    color: #007048;
  }

  #reviseCheckbox .round {
    border-radius: 5px;
  }

  .btn-xxl {
    font-size: 2rem;
  }

  .btn-xl {
    font-size: 3rem;
  }

  div#v-pills-tab>button {
    justify-self: center;
    width: auto;
  }

  h2#swal2-title {
    font-size: 3rem;
  }

  div#order_list {
    font-size: 2rem;
    overflow-y: scroll;
  }

  button.add-on {
    font-size: 4rem;
  }

  input#appendedPrependedInput1 {
    font-size: 4rem;
  }

  span.remark_span {
    font-size: 3rem;
  }

  /* Chrome, Safari, Edge, Opera */
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }

  div#row_title>*>a {
    background-color: #007048;
    color: white;
  }

  div#row_title h1 {
    text-align: center;
    color: #007048;
    font-size: 4rem;
  }

  a#link_report {
    width: 5rem;
  }

  div#btn_control_right {
    display: flex;
    justify-content: end;
    gap: 1rem;
  }

  button.menutypeBtn {
    width: auto;
  }

  @media (orientation: landscape) {
    div#order_list_background {
      color: white;
      border: 2px solid #007048;
      height: 70vh;
      border-radius: 15px;
      box-shadow: 2px 2px 8px 2px #579982;
      padding: 30px 30px;
      background-color: #007048;
      display: grid;
      grid-template-rows: 80% 20%;
      justify-self: end;
    }

    div#row_title {
      display: grid;
      grid-template-columns: 30% auto 30%;
      margin-top: 17px;
      margin-bottom: 1rem;
      margin-left: 1rem;
      margin-right: 1rem;
    }

    div#row_title a {
      width: 5rem;
    }

    div#col_ordering_controls {
      display: grid;
      grid-template-columns: 20% auto;
      margin-bottom: 1rem;
    }

    div#row_main {
      margin-top: 1rem;
      display: grid;
      grid-template-columns: 1.5fr 1fr;
    }

    div#v-pills-tab {
      display: grid;
      row-gap: 1em;
      max-height: 70vh;
      overflow-y: scroll;
    }

    div.tab-pane.fade.active.show {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1em;
      overflow-y: scroll;
      max-height: 50vh;
    }
  }

  @media (orientation: portrait) {
    div#order_list_background {
      color: white;
      border: 2px solid #007048;
      height: 36vh;
      border-radius: 15px;
      box-shadow: 2px 2px 8px 2px #579982;
      padding: 30px 30px;
      background-color: #007048;
      display: grid;
      grid-template-rows: 80% 20%;
      justify-self: end;
    }

    div#row_title {
      display: grid;
      grid-template-columns: 30% auto 30%;
      margin-top: 15px;
      margin-bottom: 1rem;
      margin-left: 1rem;
      margin-right: 1rem;
    }

    div#row_main {
      overflow-y: hidden;
    }

    div#col_ordering_controls {
      display: grid;
      grid-template-columns: 30% 70%;
      margin-bottom: 1rem;
    }

    div#v-pills-tab {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      /* max-height: 45vh; */
      /* overflow-y: scroll; */
    }

    div.tab-pane.fade.active.show {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1em;
      overflow-y: scroll;
      /* height: 40vh; */
    }

    div.tab-pane.fade.active.show button {
      width: auto;
    }
  }
</style>

<body>
  <div class="row" id="row_title">
    <div id="btn_control_left">
      <a href="checkout.php" type="button" class="btn btn-xl" title="結帳"><i class="fas fa-hand-holding-usd"></i></a>
    </div>
    <h1>點餐系統</h1>
    <div id="btn_control_right">
      <a href="report.php" type="button" class="btn btn-xl" id="link_report" title="報表"><i class="fas fa-file-alt"></i></a>
      <a href="setting.php" type="button" class="btn btn-xl" title="修改"><i class="fas fa-pen"></i></a>
    </div>
  </div>

  <div class="row" id="row_main">
    <div id="col_ordering_controls">
      <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      </div>
      <div>
        <div class="nav nav-pills me-3" id="v-pills-tab-type" role="tablist">
        </div>
        <div class="tab-content" id="v-pills-tabContent">
        </div>
      </div>
    </div>
    <div id="order_list_background">
      <div id="order_list">
      </div>
      <div style="align-self: end;">
        <label style="font-size: 40px;">總金額:$<span id="totalAmount">0</span></label>
        <button type="button" class="btn btn-xxl" id="checkOut" style="float: right;background-color: #ebdcc3;color: #007048;margin-top: 4px;" onclick="confirmAlert()"><i class="fas fa-arrow-right"></i></button>
      </div>
    </div>
</body>

</html>

<script>
  function _uuid() {
    var d = Date.now();
    if (typeof performance !== 'undefined' && typeof performance.now === 'function') {
      d += performance.now(); //use high-precision timer if available
    }
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
      var r = (d + Math.random() * 16) % 16 | 0;
      d = Math.floor(d / 16);
      return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
    });
  }

  function chgNum(ndid, opr) {
    var input = document.getElementById(`appendedPrependedInput${ndid}`);
    var index = parseInt(input.value);
    if (opr == 'del') {

      if (index == 1) {
        return;
      }
      index = index - 1;

    } else if (opr == 'add') {
      index = index + 1;
    }
    input.value = index;
  }

  function confirmAlert() {
    let is_all_unit_price_set = true;
    for (const order_item of global_order[table_button_selected_id()]) {
      let is_gifted = false;
      for (const remark of order_item["item_remarks"]) {
        if (remark["remark"] === "招待") {
          is_gifted = true;
        }
      }
      if (!(order_item["unit_price"] !== 0 || is_gifted || order_item["edited"])) {
        alert(`${order_item["item_name"]}的價格還沒有設定`);
        is_all_unit_price_set = false;
      }
    }

    if (is_all_unit_price_set) {
      const payment = parseInt(document.getElementById("totalAmount").innerText);
      $.post("/API/order/set_order.php",
        JSON.stringify({
          "uuid": _uuid(),
          "table_uuid": table_button_selected_id(),
          "payment": payment,
          "order_list": global_order[table_button_selected_id()]
        }),
        function() {
          Swal.fire({
            icon: 'success',
            title: '出單成功',
            html: `本次結帳金額為$${payment}`,
            showConfirmButton: false,
            timer: 1500,
            didOpen: () => {
              document.querySelector(".swal2-success-circular-line-left").style.backgroundColor = "#007048";
              document.querySelector(".swal2-success-circular-line-right").style.backgroundColor = "#007048";
              document.querySelector(".swal2-success-fix").style.backgroundColor = "#007048";
            }
          });
          global_order[table_button_selected_id()] = [];
          document.cookie = `global_order=${JSON.stringify(global_order)};`;
          set_order();
          
        });

    }
  }

  var global_remarks = [];
  var global_selected_item;
  var global_table, global_menu_item, global_menu_type, global_order = {};
  var global_input_bool_alertadd = false;

  function table_button_selected_id() {
    return document.querySelector(".btn.nav-link.tableBtn.active").id;
  }

  function Alertadd() {
    let outer_div = document.createElement("div");
    outer_div.id = "checkboxes";
    for (const remark of global_remarks) {
      let outer_label = document.createElement("label");
      let checkbox_input = document.createElement("input");
      checkbox_input.type = "checkbox";
      checkbox_input.value = remark["remark"];
      checkbox_input.id = remark["uuid"];
      let span_in_label = document.createElement("span");
      span_in_label.className = "round button remark_span";
      span_in_label.innerText = remark["remark"];

      outer_label.append(checkbox_input);
      outer_label.append(span_in_label);
      outer_div.append(outer_label);
    }

    let div_edit_price = document.createElement("div");
    div_edit_price.style = "display: grid; width: 100%; font-size: 2rem;";
    if (global_selected_item["price_editable"]) {
      let label_edit_price = document.createElement("label");
      label_edit_price.innerText = "單價";
      let input_edit_price = document.createElement("input");
      input_edit_price.className = "swal2-input";
      input_edit_price.style = "width: 80%; justify-self: center; margin: 0";
      input_edit_price.type = "number";
      input_edit_price.id = "input-1-price";
      input_edit_price.setAttribute("min", "0")
      input_edit_price.setAttribute("value", global_selected_item["price"]);
      input_edit_price.setAttribute("oninput", "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null");
      div_edit_price.append(label_edit_price);
      div_edit_price.append(input_edit_price);
    }
    global_input_bool_alertadd = false;
    Swal.fire({
      title: global_selected_item["item_name"],
      html: `
          <div style="margin-bottom: 10px;">
            <button class="add-on" onclick="chgNum(1,'del')"><i class="fas fa-minus"></i></button>
            <input class="span3 text-center" id="appendedPrependedInput1" type="number" value="1" style="width: 122px;border-radius: 5px;background-color: #ffffff;color: #106a8e;" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
            <button class="add-on" onclick="chgNum(1,'add')"><i class="fas fa-plus"></i></button>
          </div>` + outer_div.outerHTML + div_edit_price.outerHTML,
      showCancelButton: true,
      confirmButtonText: '確定',
      cancelButtonText: '取消',
      preConfirm: function() {
        let remark_list = []
        for (const remark of global_remarks) {
          if (document.getElementById(`${remark["uuid"]}`).checked) {
            remark_list.push(remark);
          }
        }
        let edited_price = 0,
          edited_price_alertadd = false;
        if (document.getElementById("input-1-price")) {
          edited_price_alertadd = true;
          if (document.getElementById("input-1-price").value) {
            edited_price = parseInt(document.getElementById("input-1-price").value);
          }
        }
        return new Promise(function(resolve) {
          resolve([
            $('#appendedPrependedInput1').val(),
            remark_list,
            edited_price_alertadd,
            edited_price
          ])
        })
      },
    }).then((result) => {
      let multiplier = 1;
      if (result.isConfirmed) {
        const table_button_selected = table_button_selected_id();
        for (const remark of result.value[1]) {
          if (remark["remark"] === "招待") {
            multiplier = 0;
          }
        }
        const price_set_to_order = result.value[2] ? result.value[3] : parseInt(global_selected_item["price"]);
        global_order[`${table_button_selected}`].push({
          "uuid": _uuid(),
          "item_name": global_selected_item["item_name"],
          "quantity": parseInt(result.value[0]),
          "item_remarks": result.value[1],
          "unit_price": price_set_to_order,
          "order_price": price_set_to_order * parseInt(result.value[0]) * multiplier,
          "price_editable": global_selected_item["price_editable"],
          "edited": result.value[2],
        });
        document.cookie = `global_order=${JSON.stringify(global_order)};`;
        console.log(JSON.parse(document.cookie
          .split('; ')
          .find(row => row.startsWith('global_order='))
          ?.split('=')[1]));
        set_order();
      }
    })
  }

  function set_order() {
    document.getElementById("order_list").innerHTML = '';
    let total_price = 0;
    for (const order of global_order[table_button_selected_id()]) {
      let div_outer = document.createElement("div");
      div_outer.id = order["uuid"];
      div_outer.style = "display: grid;row-gap: 5px;margin-bottom: 10px;";
      div_outer.onclick = function() {
        let outer_div = document.createElement("div");
        outer_div.id = "checkboxes";
        for (const remark of global_remarks) {
          let outer_label = document.createElement("label");
          let checkbox_input = document.createElement("input");
          checkbox_input.type = "checkbox";
          checkbox_input.value = remark["remark"];
          checkbox_input.id = remark["uuid"];
          checkbox_input.name = "variety";
          for (const remark_ind of order["item_remarks"]) {
            if (remark_ind["remark"] === remark["remark"]) {
              checkbox_input.setAttribute("checked", "true");
            }
          }
          let span_in_label = document.createElement("span");
          span_in_label.className = "round button remark_span";
          span_in_label.innerText = remark["remark"];

          outer_label.append(checkbox_input);
          outer_label.append(span_in_label);
          outer_div.append(outer_label);
        }

        let div_edit_price = document.createElement("div");
        div_edit_price.style = "display: grid; width: 100%; font-size: 2rem;";
        if (order["price_editable"]) {
          let label_edit_price = document.createElement("label");
          label_edit_price.innerText = "單價";
          let input_edit_price = document.createElement("input");
          input_edit_price.className = "swal2-input";
          input_edit_price.style = "width: 80%; justify-self: center; margin: 0";
          input_edit_price.type = "number";
          input_edit_price.id = "input-0-price";
          input_edit_price.setAttribute("min", "0")
          input_edit_price.setAttribute("value", order["unit_price"]);
          input_edit_price.setAttribute("autocapitalize", "none");
          input_edit_price.setAttribute("oninput", "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null");
          div_edit_price.append(label_edit_price);
          div_edit_price.append(input_edit_price);
        }

        Swal.fire({
          title: order["item_name"],
          html: `
          <div style="margin-bottom: 10px;">
            <button class="add-on" onclick="chgNum(1,'del')"><i class="fas fa-minus"></i></button>
            <input class="span3 text-center" id="appendedPrependedInput1" disabled="disabled" type="text" value="${order["quantity"]}" style="width: 122px;border-radius: 5px;background-color: #ffffff;color: #106a8e;" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
            <button class="add-on" onclick="chgNum(1,'add')"><i class="fas fa-plus"></i></button>
          </div>` + outer_div.outerHTML + div_edit_price.outerHTML,
          showCancelButton: true,
          showDenyButton: true,
          confirmButtonText: '確定',
          denyButtonText: "刪除",
          cancelButtonText: '取消',
          preConfirm: function() {
            let remark_list = []
            for (const remark of global_remarks) {
              if (document.getElementById(`${remark["uuid"]}`).checked) {
                remark_list.push(remark);
              }
            }
            let new_unit_price = order["unit_price"];
            let edited_price = 0;
            if (document.getElementById("input-0-price")) {
              if (document.getElementById("input-0-price").value) {
                edited_price = parseInt(document.getElementById("input-0-price").value);
              }
            }
            return new Promise(function(resolve) {
              resolve([
                $('#appendedPrependedInput1').val(),
                remark_list,
                order["uuid"],
                new_unit_price,
              ])
            })
          },
        }).then((result) => {
          if (result.isConfirmed) {
            let multiplier = 1;
            const table_button_selected = table_button_selected_id();
            let tmp_order_list = [];
            for (const remark of result.value[1]) {
              if (remark["remark"] === "招待") {
                multiplier = 0;
              }
            }
            for (const ind_order of global_order[`${table_button_selected}`]) {
              if (ind_order["uuid"] === order["uuid"]) {
                tmp_order_list.push({
                  "uuid": order["uuid"],
                  "item_name": order["item_name"],
                  "quantity": parseInt(result.value[0]),
                  "item_remarks": result.value[1],
                  "unit_price": parseInt(result.value[3]),
                  "order_price": parseInt(result.value[3]) * parseInt(result.value[0]) * multiplier,
                  "price_editable": order["price_editable"],
                  "edited": true,
                });
              } else {
                tmp_order_list.push(ind_order);
              }
            }
            global_order[`${table_button_selected}`] = tmp_order_list;
            document.cookie = `global_order=${JSON.stringify(global_order)};`;
            console.log(JSON.parse(document.cookie
              .split('; ')
              .find(row => row.startsWith('global_order='))
              ?.split('=')[1]));
            set_order();
          }
          if (result.isDenied) {
            let tmp_order_list = [];
            for (const ind_order of global_order[table_button_selected_id()]) {
              if (ind_order["uuid"] !== order["uuid"]) {
                tmp_order_list.push(ind_order);
              }
            }
            global_order[table_button_selected_id()] = tmp_order_list;
            document.cookie = `global_order=${JSON.stringify(global_order)};`;
            console.log(JSON.parse(document.cookie
              .split('; ')
              .find(row => row.startsWith('global_order='))
              ?.split('=')[1]));
            set_order();
          }
        });
      }

      let div_upper = document.createElement("div");
      div_upper.style = "display: grid;grid-template-columns: 50% 50%;";
      let div_item_name = document.createElement("div");
      div_item_name.innerText = order["item_name"];
      let div_multiplier = document.createElement("div");
      div_multiplier.innerText = `x${order["quantity"]}`;
      div_multiplier.style = "justify-self: end";

      let div_lower = document.createElement("div");
      div_lower.style = "display: grid;grid-template-columns: 50% 50%;";
      let div_remarks = document.createElement("div");
      div_remarks.style = "color: #d2d2d2";
      let concat_remark_str = '';
      for (const [index, remark] of order["item_remarks"].entries()) {
        concat_remark_str += remark["remark"];
        if (index !== order["item_remarks"].length - 1) {
          concat_remark_str += ', ';
        }
      }
      div_remarks.innerText = concat_remark_str;
      let div_price = document.createElement("div");
      div_price.style = "justify-self: end";
      div_price.innerText = `$${order["order_price"]}`;
      total_price += parseInt(order["order_price"]);

      div_lower.append(div_remarks);
      div_lower.append(div_price);
      div_upper.append(div_item_name);
      div_upper.append(div_multiplier);
      div_outer.append(div_upper);
      div_outer.append(div_lower);
      document.getElementById("order_list").append(div_outer);
    }
    document.getElementById("totalAmount").innerText = total_price;
  }

  function set_menu_type_buttons() {
    function draw_menu_type() {
      let v_tabs_div = document.getElementById("v-pills-tab-type");
      v_tabs_div.innerHTML = '';
      let index_menu_type = 0;
      for (const menu_type of global_menu_type) {
        let button = document.createElement("button");
        if (index_menu_type === 0) {
          button.className = "btn nav-link menutypeBtn active btn-xxl";
        } else {
          button.className = "btn nav-link menutypeBtn btn-xxl";
        }
        button.id = menu_type["uuid"];
        button.setAttribute("data-bs-toggle", "pill");
        button.setAttribute("data-bs-target", `#v-pills-${menu_type["type"]}`);
        button.setAttribute("type", "button");
        button.setAttribute("role", "tab");
        button.setAttribute("aria-controls", `v-pills-${menu_type["type"]}`);
        button.setAttribute("aria-selected", "true");
        let insert_icon = '';
        switch (menu_type["type"]) {
          case "湯類":
            insert_icon = `<i class="fa-solid fa-whiskey-glass" style="margin-right: 5px;"></i>`;
            break;
          case "湯麵":
            insert_icon = `<i class="fa-solid fa-bowl-food" style="margin-right: 5px;"></i>`;
            break;
          case "飯類":
            insert_icon = `<i class="fa-solid fa-bowl-rice" style="margin-right: 5px;"></i>`;
            break;
          case "小菜":
            insert_icon = `<i class="fa-solid fa-pepper-hot" style="margin-right: 5px;"></i>`;
            break;
          case "炒麵":
            insert_icon = `<i class="fa-solid fa-bacon" style="margin-right: 5px;"></i>`;
            break;
          default:
            insert_icon = `<i class="fa-solid fa-stroopwafel" style="margin-right: 5px;"></i>`
        }
        button.innerHTML = `${insert_icon}${menu_type["type"]}`;
        v_tabs_div.append(button);
        index_menu_type++;
      }
    }

    if (!global_menu_type) {
      $.post("/API/types/get_types.php", function(data) {
        data_json = JSON.parse(data);
        global_menu_type = data_json;
        draw_menu_type();
        set_menu_item_buttons();
      });
    } else {
      draw_menu_type();
      set_menu_item_buttons();
    }
  }

  function set_menu_item_buttons() {
    function draw_menu_buttons() {
      let inner_text = document.querySelector(".btn.nav-link.menutypeBtn.active").innerText;
      document.getElementById("v-pills-tabContent").innerHTML = '';
      for (const menu_type of global_menu_type) {
        let menu_type_items_div = document.createElement("div");
        if (menu_type["type"] == inner_text) {
          menu_type_items_div.className = "tab-pane fade show active";
        } else {
          menu_type_items_div.className = "tab-pane fade";
        }
        menu_type_items_div.id = `v-pills-${menu_type["type"]}`;
        menu_type_items_div.setAttribute("role", "tabpanel");
        // menu_type_items_div.setAttribute("aria-labelledby", `v-pills-${menu_type}-tab`);
        document.getElementById("v-pills-tabContent").append(menu_type_items_div);
      }

      for (const menu_item of global_menu_item) {
        let menu_item_button = document.createElement("button");
        menu_item_button.className = "btn projectBtn btn-xxl";
        let menu_item_button_itemname = document.createElement("div");
        menu_item_button_itemname.innerText = menu_item["item_name"];
        menu_item_button_itemname.className = "projectBtnDetails";
        let menu_item_button_price = document.createElement("div");
        menu_item_button_price.innerText = `$${menu_item["price"]}`;
        menu_item_button_price.className = "projectBtnDetails";
        menu_item_button.append(menu_item_button_itemname);
        menu_item_button.append(menu_item_button_price);
        menu_item_button.id = menu_item["uuid"];
        menu_item_button.onclick = function() {
          let price_editable = false;
          if (parseInt(menu_item["price"]) === 0) {
            price_editable = true;
          }
          global_selected_item = {
            "uuid": menu_item["uuid"],
            "type": menu_item["type"],
            "item_name": menu_item["item_name"],
            "price": menu_item["price"],
            "type_uuid": menu_item["type_uuid"],
            "price_editable": price_editable,
            "edited": menu_item["edited"],
          };
          Alertadd();
        }
        document.getElementById(`v-pills-${menu_item["type"]}`).append(menu_item_button);
      }
    }

    if (!global_menu_item) {
      $.post("/API/menu/get_menu.php", function(data) {
        data_json = JSON.parse(data);
        global_menu_item = data_json;
        draw_menu_buttons();
      });
    } else {
      draw_menu_buttons();
    }
  }


  window.onload = function() {
    $.post("/API/table/get_table.php",
      function(data) {
        const json_data = JSON.parse(data);
        global_table = json_data;

        for (const [index, table] of json_data.entries()) {
          let button = document.createElement("button");
          if (index === 0) {
            button.className = "btn nav-link tableBtn active btn-xxl"
          } else {
            button.className = "btn nav-link tableBtn btn-xxl";
          }
          button.setAttribute("data-bs-toggle", "pill");
          button.innerHTML = `<i class="fa-solid fa-utensils" style="margin-right: 5px;"></i>桌號${table["table_name"]}`;
          button.id = table["uuid"];
          button.addEventListener("click", set_order);
          document.getElementById("v-pills-tab").append(button);

          global_order[table["uuid"]] = [];
        }
        if (document.cookie.indexOf('global_order=')) {
          global_order = JSON.parse(document.cookie
            .split('; ')
            .find(row => row.startsWith('global_order='))
            ?.split('=')[1]);
          set_order();
        } else {
          document.cookie = `global_order=${JSON.stringify(global_order)};`;
        }
      });

    $.post("/API/remarks/get_remarks.php",
      function(data) {
        const json_data = JSON.parse(data);
        for (const remarks of json_data) {
          global_remarks.push(remarks);
        }
      });
    set_menu_type_buttons();
  }
</script>