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

  .tableBtn:focus {
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
    margin-bottom: 10px;
    border: 2px solid;
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
    color: #007048;
    width: 180px;
    border: 2px solid #007048;
    margin-bottom: 10px;
    border: 2px solid;
  }

  .addBtn:focus {
    background-color: #007048;
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

  body {
    font-size: 3rem;
  }

  a.btn {
    font-size: 2rem;
  }

  button.btn {
    font-size: 2rem;
  }

  h2#swal2-title {
    font-size: 4em;
  }

  input.swal2-input {
    font-size: 2rem;
  }

  div#row_title a,
  div#row_title button {
    background-color: #007048;
    color: white;
    font-size: 3rem;
    width: 5rem;
  }

  div#btn_control_left {
    display: flex;
    justify-content: start;
    gap: 1rem;
  }

  div#btn_control_right {
    display: flex;
    justify-content: end;
    gap: 1rem;
  }

  div#v-pills-tab button {
    width: 10rem;
  }

  @media (orientation: portrait) {
    div#table_add_list>button {
      width: auto;
    }

    div#row_title {
      margin-left: 1rem;
      margin-right: 1rem;
      display: grid;
      grid-template-columns: 1fr 2fr 1fr;
    }

    div#col_control>button {
      margin-top: 0;
    }

    div#col_tables,
    div#col_control,
    div#col_remark {
      margin-left: 1rem;
      margin-right: 1rem;
      margin-top: 1rem;
    }

    div#v-pills-tabContent {
      margin-left: 4rem;
      display: grid;
      justify-items: center;
      overflow-y: scroll;
    }
  }

  @media (orientation: landscape) {
    div#row_title {
      margin-left: 2rem;
      margin-right: 2rem;
      display: grid;
      grid-template-columns: 1fr 2fr 1fr;
    }

    div#buttons_table {
      display: flex;
      justify-content: space-between;
      margin-left: 4rem;
      margin-right: 4rem;
    }

    div#row_main {
      display: grid;
      grid-template-columns: 1fr 2fr 1fr;
    }

    div#col_tables {
      margin-top: .5rem;
    }

    div#table_add_list {
      display: flex;
      justify-content: space-between;
      margin-left: 4rem;
      margin-right: 4rem;
      height: 50vh;
      overflow-y: scroll;
    }

    div#table_add_list>button {
      width: 100%;
    }

    div#v-pills-tabContent {
      height: 50vh;
    }

    div#remarks_button_container {
      height: 50vh;
      overflow-y: scroll;
    }
  }
</style>

<body>
  <div class="row" id="row_title" style="margin-top: 15px;">
    <div id="btn_control_left">
      <a href="index.php" type="button" class="btn btn-xl" title="跳回點餐系統"><i class="fas fa-share-square"></i></a>
      <a href="checkout.php" type="button" class="btn btn-xl" title="結帳"><i class="fas fa-hand-holding-usd"></i></a>
    </div>
    <h1 style="text-align: center;color: #007048; font-size: 4rem;">後臺操作</h1>
    <div id="btn_control_right">
      <button type="button" class="btn" id="btnConfirm" title="確認"><i class="fas fa-check"></i></button>
      <a href="report.php" type="button" class="btn" title="報表"><i class="fas fa-file-alt"></i></a>
    </div>
  </div>

  <div id="row_main" style="margin-top: 65px;">
    <div id="col_tables">
      <div id="buttons_table">
        <button type="button" class="btn" id="tableDelete" title="刪除" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 0;" onclick="delete_table()"><i class="fas fa-minus"></i></button>
        <button type="button" class="btn" id="tableAdd" title="新增" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;" onclick="add_table()"><i class="fas fa-plus"></i></button>
        <button type="button" class="btn" id="tableDelete" title="修改" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;" onclick="edit_table()"><i class="fas fa-pen"></i></button>
      </div>
      <div class="nav nav-pills" id="table_add_list" role="tablist"></div>
    </div>
    <div id="col_control">
      <button type="button" class="btn" id="navDelete" title="刪除" style="background-color: #007048;color: white;margin-bottom: 10px;" onclick="delete_menu_type()"><i class="fas fa-minus"></i></button>
      <button type="button" class="btn" id="navAdd" title="新增" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;" onclick="add_menu_type()"><i class="fas fa-plus"></i></button>
      <button type="button" class="btn" id="navRevise" title="修改" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;" onclick="edit_menu_type()"><i class="fas fa-pen"></i></button>

      <button type="button" class="btn" id="projectDelete" title="刪除" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 34px;" onclick="delete_menu_item()"><i class="fas fa-minus"></i></button>
      <button type="button" class="btn" id="projectAdd" title="新增" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;" onclick="add_menu_item()"><i class="fas fa-plus"></i></button>
      <button type="button" class="btn" id="projectRevise" title="修改" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;" onclick="edit_menu_item()"><i class="fas fa-pen"></i></button>

      <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="margin-left: 40px;">
        </div>
        <div class="tab-content" id="v-pills-tabContent">
        </div>
      </div>
    </div>
    <div id="col_remark">
      <button type="button" class="btn" id="btnDelete" title="刪除" style="background-color: #007048;color: white;margin-bottom: 10px;" onclick="delete_remarks()"><i class="fas fa-minus"></i></button>
      <button type="button" class="btn" id="btnAdd" title="新增" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;" onclick="add_remarks()"><i class="fas fa-plus"></i></button>
      <button type="button" class="btn" id="btnRevise" title="修改" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;" onclick="edit_remarks()"><i class="fas fa-pen"></i></button>
      <div id="remarks_button_container">
      </div>
    </div>
  </div>
  <div class="col-md-1"></div>
  </div>
</body>

</html>

<script>
  function confirmAlert() {
    $.post(
      "/API/table/set_table.php",
      JSON.stringify(global_table_action),
      function() {
        global_table_action = [];
      }
    );

    $.post(
      "/API/remarks/set_remarks.php",
      JSON.stringify(global_remarks_action),
      function() {
        global_remarks_action = [];
      }
    );

    $.post(
      "/API/types/set_types.php",
      JSON.stringify(global_menu_type_action),
      function() {
        global_menu_type_action = [];
      }
    );

    $.post(
      "/API/menu/set_menu.php",
      JSON.stringify(global_menu_item_action),
      function() {
        global_menu_item_action = [];
      }
    );

    Swal.fire({
      icon: 'success',
      title: '存取成功!!',
      showConfirmButton: false,
      timer: 1500,
      didOpen: () => {
        document.querySelector(".swal2-success-circular-line-left").style.backgroundColor = "#007048";
        document.querySelector(".swal2-success-circular-line-right").style.backgroundColor = "#007048";
        document.querySelector(".swal2-success-fix").style.backgroundColor = "#007048";
      }
    })
  }
  document.getElementById("btnConfirm").addEventListener("click", function() {
    confirmAlert();
  });

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

  var global_table_names, global_menu_item, global_menu_type, global_remarks, global_selected_item, global_selected_remarks,
    global_table_action = [],
    global_menu_type_action = [],
    global_menu_item_action = [],
    global_remarks_action = [];
  var global_menu;

  function set_table_buttons() {
    document.getElementById("table_add_list").innerHTML = '';
    let current_table_count = 0;

    function draw_table_buttons() {
      let button, index = 0;
      let table_add_list_div = document.getElementById("table_add_list");
      for (const table of global_table_names) {
        button = document.createElement("button");
        if (index === 0) {
          button.className = "btn nav-link tableBtn active";
        } else {
          button.className = "btn nav-link tableBtn";
        }
        button.setAttribute("data-bs-toggle", "pill");
        button.innerHTML = `<i class="fa-solid fa-utensils" style="margin-right: 5px;"></i>桌號${table["table_name"]}`;
        button.id = `${table["uuid"]}`;
        table_add_list_div.append(button);
        index++;
      }
    }

    if (!global_table_names) {
      $.post("/API/table/get_table.php", function(data) {
        data_json = JSON.parse(data);
        global_table_names = data_json;
      }).done(function() {
        draw_table_buttons();
      });
    } else {
      draw_table_buttons();
    }

  }

  function add_table() {
    Swal.fire({
      title: '新增桌號',
      input: 'text',
      inputAttributes: {
        autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: '新增',
      cancelButtonText: '關閉',
      showLoaderOnConfirm: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
    }).then((result) => {
      if (result.isConfirmed) {
        let uuid = _uuid();
        global_table_names.push({
          "uuid": uuid,
          "table_name": result.value
        });
        global_table_action.push({
          "action": "add",
          "uuid": uuid,
          "table_name": result.value
        })
        set_table_buttons();
      }
    });
  }

  function edit_table() {
    let button_list = document.querySelectorAll(".btn.nav-link.tableBtn");
    let inner_text = '',
      id = '';
    for (const button of button_list) {
      if (button.className === "btn nav-link tableBtn active") {
        inner_text = button.innerText.substring(2);
        id = button.id;
      }
    }
    Swal.fire({
      title: '修改桌號',
      input: 'text',
      inputValue: inner_text,
      inputAttributes: {
        autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: '修改',
      cancelButtonText: '關閉',
      showLoaderOnConfirm: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
    }).then((result) => {
      if (result.isConfirmed) {
        let temp = [];
        let value = result.value;
        for (let table of global_table_names) {
          if (table["uuid"] === id) {
            temp.push({
              "uuid": id,
              "table_name": result.value
            });
            global_table_action.push({
              "action": "edit",
              "uuid": id,
              "table_name": result.value
            })
          } else {
            temp.push(table);
          }
        }
        global_table_names = temp;
        set_table_buttons();
      }
    });
  }

  function delete_table() {
    Swal.fire({
      title: '確定刪除嗎?',
      icon: 'warning',
      showCancelButton: true,
      background: '#106A8E;',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '刪除',
      cancelButtonText: '關閉'
    }).then((result) => {
      if (result.isConfirmed) {
        let button_list = document.querySelectorAll(".btn.nav-link.tableBtn");
        let inner_text = '',
          id = '';
        for (const button of button_list) {
          if (button.className === "btn nav-link tableBtn active") {
            id = button.id;
            inner_text = button.innerText;
          }
        }
        global_table_names = global_table_names.filter(function(value, index, arr) {
          return value["uuid"] !== id;
        });
        global_table_action.push({
          "action": "delete",
          "uuid": id,
          "table_name": inner_text
        })
        set_table_buttons();
      }
    })

  }

  function set_menu_type_buttons() {
    function draw_menu_type() {
      let v_tabs_div = document.getElementById("v-pills-tab");
      v_tabs_div.innerHTML = '';
      let index_menu_type = 0;
      for (const menu_type of global_menu_type) {
        let button = document.createElement("button");
        if (index_menu_type === 0) {
          button.className = "btn nav-link menutypeBtn active";
        } else {
          button.className = "btn nav-link menutypeBtn";
        }
        button.id = `${menu_type["uuid"]}`;
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
            insert_icon = `<i class="fa-solid fa-bowl-spoon" style="margin-right: 5px;"></i>`
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

  function add_menu_type() {
    Swal.fire({
      title: '新增項目',
      input: 'text',
      inputAttributes: {
        autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: '新增',
      cancelButtonText: '關閉',
      showLoaderOnConfirm: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
    }).then((result) => {
      if (result.isConfirmed) {
        const uuid = _uuid();
        global_menu_type.push({
          "uuid": uuid,
          "type": result.value
        });
        global_menu_type_action.push({
          "action": "add",
          "uuid": uuid,
          "type": result.value
        })
        set_menu_type_buttons();
      }
    });
  }

  function delete_menu_type() {
    Swal.fire({
      title: '確定刪除嗎?',
      icon: 'warning',
      showCancelButton: true,
      background: '#106A8E;',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '刪除',
      cancelButtonText: '關閉'
    }).then((result) => {
      if (result.isConfirmed) {
        let button = document.querySelector(".btn.nav-link.active.menutypeBtn");
        let temp = [];
        for (const type of global_menu_type) {
          if (type["uuid"] !== button.id) {
            temp.push(type);
          } else {
            global_menu_type_action.push({
              "action": "delete",
              "uuid": button.id,
              "type": button.innerText
            });
            let temp_items = [];
            for (const item of global_menu_item) {
              if (item["type_uuid"] !== type["uuid"]) {
                temp_items.push(item);
              } else {
                global_menu_item_action.push({
                  "action": "delete",
                  "uuid": item["uuid"],
                  "type": item["type"],
                  "item_name": item["item_name"],
                  "price": item["price"],
                  "type_uuid": item["type_uuid"]
                });
              }
            }
            global_menu_item = temp_items;
          }
        }
        global_menu_type = temp;
        set_menu_type_buttons();
      }
    })
  }

  function edit_menu_type() {
    let button = document.querySelector(".btn.nav-link.active.menutypeBtn");
    Swal.fire({
      title: '修改項目',
      input: 'text',
      inputValue: button.innerText,
      inputAttributes: {
        autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: '修改',
      cancelButtonText: '關閉',
      showLoaderOnConfirm: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
    }).then((result) => {
      if (result.isConfirmed) {
        let temp = [];
        for (const type of global_menu_type) {
          if (type["uuid"] !== button.id) {
            temp.push(type);
          } else {
            temp.push({
              "uuid": button.id,
              "type": result.value
            });
            global_menu_type_action.push({
              "action": "edit",
              "uuid": button.id,
              "type": result.value
            });
            let temp_items = [];
            for (const item of global_menu_item) {
              if (item["type_uuid"] !== type["uuid"]) {
                temp_items.push(item);
              } else {
                temp_items.push({
                  "uuid": item["uuid"],
                  "type": result.value,
                  "item_name": item["item_name"],
                  "price": item["price"],
                  "type_uuid": item["type_uuid"]
                })
                global_menu_item_action.push({
                  "action": "edit",
                  "uuid": item["uuid"],
                  "type": result.value,
                  "item_name": item["item_name"],
                  "price": item["price"],
                  "type_uuid": item["type_uuid"]
                });
              }
            }
            global_menu_item = temp_items;
          }
        }
        global_menu_type = temp;
        set_menu_type_buttons();
      }
    })
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
        menu_item_button.className = "btn projectBtn";
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
          global_selected_item = {
            "uuid": menu_item["uuid"],
            "type": menu_item["type"],
            "item_name": menu_item["item_name"],
            "price": menu_item["price"],
            "type_uuid": menu_item["type_uuid"],
          };
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



  function add_menu_item() {
    Swal.fire({
      title: '新增品項',
      html: '<div style="display: grid; row-gap: 1em;">' +
        '<div style="display: grid; grid-template-columns: 20% auto;">' +
        '<label style="color: white; align-self: center; font-size: 2rem;" for="swal-input1">名稱</label>' +
        '<input id="swal-input1" class="swal2-input" style="width: 90%; margin: 0; align-self: center; color: white;">' +
        '</div>' +
        '<div style="display: grid; grid-template-columns: 20% auto;">' +
        '<label style="color: white; align-self: center; font-size: 2rem;" for="swal-input2">價錢</label>' +
        '<input id="swal-input2" type="number" class="swal2-input" style="width: 90%; margin: 0; align-self: center; color: white;" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">' +
        '</div>' +
        '</div>',
      showCancelButton: true,
      confirmButtonText: '新增',
      cancelButtonText: '關閉',
      showLoaderOnConfirm: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      preConfirm: function() {
        let set_price = 0;
        if ($('#swal-input2').val()) {
          set_price = $('#swal-input2').val();
        }
        return new Promise(function(resolve) {
          resolve([
            $('#swal-input1').val(),
            set_price
          ])
        });
      },
    }).then(function(result) {
      if (result.isConfirmed) {
        let button = document.querySelector(".btn.nav-link.active.menutypeBtn");
        let uuid = _uuid();
        global_menu_item.push({
          "uuid": uuid,
          "type": button.innerText,
          "item_name": result.value[0],
          "price": result.value[1],
          "type_uuid": button.id
        });
        global_menu_item_action.push({
          "action": "add",
          "uuid": uuid,
          "type": button.innerText,
          "item_name": result.value[0],
          "price": result.value[1],
          "type_uuid": button.id
        })
        set_menu_item_buttons();
      }
    })
  }

  function delete_menu_item() {
    if (global_selected_item) {
      Swal.fire({
        title: '確定刪除嗎?',
        icon: 'warning',
        showCancelButton: true,
        background: '#106A8E;',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '刪除',
        cancelButtonText: '關閉'
      }).then((result) => {
        if (result.isConfirmed) {
          let temp = [];
          for (const item of global_menu_item) {
            if (item["uuid"] !== global_selected_item["uuid"]) {
              temp.push(item);
            } else {
              global_menu_item_action.push({
                "action": "delete",
                "uuid": global_selected_item["uuid"],
                "type": global_selected_item["type"],
                "item_name": result.value[0],
                "price": result.value[1],
                "type_uuid": global_selected_item["type_uuid"]
              })
            }
          }
          global_menu_item = temp;
          global_selected_item = 0;
          set_menu_item_buttons();
        }
      })
    }
  }

  function edit_menu_item() {
    if (global_selected_item) {
      const item_name_selected = global_selected_item["item_name"];
      const price_selected = global_selected_item["price"];
      Swal.fire({
        title: '修改品項',
        html: '<div style="display: grid; row-gap: 1em;">' +
          '<div style="display: grid; grid-template-columns: 20% auto;">' +
          '<label style="color: white; align-self: center; font-size: 2rem;" for="swal-input1">名稱</label>' +
          `<input id="swal-input1" class="swal2-input" style="width: 90%; margin: 0; align-self: center; color: white;" value="${item_name_selected}">` +
          '</div>' +
          '<div style="display: grid; grid-template-columns: 20% auto;">' +
          '<label style="color: white; align-self: center; font-size: 2rem;" for="swal-input2">價錢</label>' +
          `<input id="swal-input2" type="number" class="swal2-input" style="width: 90%; margin: 0; align-self: center; color: white;" value="${price_selected}" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">` +
          '</div>' +
          '</div>',
        showCancelButton: true,
        confirmButtonText: '修改',
        cancelButtonText: '關閉',
        showLoaderOnConfirm: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        preConfirm: function() {
          let set_price = 0;
          if ($('#swal-input2').val()) {
            set_price = $('#swal-input2').val();
          }
          return new Promise(function(resolve) {
            resolve([
              $('#swal-input1').val(),
              set_price
            ])
          });
        },
      }).then(function(result) {
        if (result.isConfirmed) {
          let temp = [];
          for (const item of global_menu_item) {
            if (item["uuid"] !== global_selected_item["uuid"]) {
              temp.push(item);
            } else {
              temp.push({
                "uuid": item["uuid"],
                "type": item["type"],
                "item_name": result.value[0],
                "price": result.value[1],
                "type_uuid": item["type_uuid"],
              });
              global_menu_item_action.push({
                "action": "edit",
                "uuid": item["uuid"],
                "type": item["type"],
                "item_name": result.value[0],
                "price": result.value[1],
                "type_uuid": item["type_uuid"],
              })
            }
          }
          global_menu_item = temp;
          global_selected_item = 0;
          set_menu_item_buttons();
        }
      })
    }
  }

  function set_remarks_button() {
    function draw_remarks_button() {
      let container = document.getElementById("remarks_button_container");
      container.innerHTML = '';
      for (const item of global_remarks) {
        let button = document.createElement("button");
        button.className = "btn addBtn tableBtn";
        button.innerText = item["remark"];
        button.id = item["uuid"]
        button.onclick = function() {
          global_selected_remarks = this.id;
        }
        container.append(button);
      }
    }
    if (!global_remarks) {
      $.post("/API/remarks/get_remarks.php", function(data) {
        let json_data = JSON.parse(data);
        global_remarks = json_data;
        draw_remarks_button();
      });
    } else {
      draw_remarks_button();
    }

  }

  function add_remarks() {
    Swal.fire({
      title: '新增項目',
      input: 'text',
      inputAttributes: {
        autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: '新增',
      cancelButtonText: '關閉',
      showLoaderOnConfirm: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
    }).then((result) => {
      if (result.isConfirmed) {
        let uuid = _uuid();
        global_remarks.push({
          "uuid": uuid,
          "remark": result.value
        });
        global_remarks_action.push({
          "action": "add",
          "uuid": uuid,
          "remark": result.value
        });
        set_remarks_button();
      }
    });
  }

  function delete_remarks() {
    if (global_selected_remarks) {
      Swal.fire({
        title: '確定刪除嗎?',
        icon: 'warning',
        showCancelButton: true,
        background: '#106A8E;',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '刪除',
        cancelButtonText: '關閉'
      }).then((result) => {
        if (result.isConfirmed) {
          let temp = [];
          for (const item of global_remarks) {
            if (item["uuid"] !== global_selected_remarks) {
              temp.push(item);
            } else {
              global_remarks_action.push({
                "action": "delete",
                "uuid": item["uuid"],
                "remark": item["remark"]
              });
            }
          }
          global_remarks = temp;
          global_selected_remarks = 0;
          set_remarks_button();
        }
      })
    }
  }

  function edit_remarks() {
    if (global_selected_remarks) {
      Swal.fire({
        title: '修改項目',
        input: 'text',
        inputValue: document.getElementById(global_selected_remarks).innerText,
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: '修改',
        cancelButtonText: '關閉',
        showLoaderOnConfirm: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
      }).then((result) => {
        if (result.isConfirmed) {
          let temp = [];
          for (const item of global_remarks) {
            if (item["uuid"] !== global_selected_remarks) {
              temp.push(item);
            } else {
              temp.push({
                "uuid": item["uuid"],
                "remark": result.value
              });
              global_remarks_action.push({
                "action": "edit",
                "uuid": item["uuid"],
                "remark": result.value
              });
            }
          }
          global_remarks = temp;
          global_selected_remarks = 0;
          set_remarks_button();
        }
      })
    }
  }

  window.onload = function() {
    set_table_buttons();
    set_menu_type_buttons();
    set_remarks_button();
  }
</script>