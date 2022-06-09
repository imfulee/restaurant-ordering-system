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
      background-color:#ebdcc3;
    }
    a{
      text-decoration:none;
    }
    .tableBtn{
      color: #007048;
      width: 100px;
      border: 2px solid;
      margin-bottom: 10px;
    }
    .tableBtn:focus,.tableBtn :visited{
      background-color: #007048;
      color: white;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
      background-color: #007048;
      color: white;
    }
    .nav-link{
      color: #007048;
      width: 100px;
      margin-bottom: 5px;
      border: 2px solid;
    }
    .projectBtn:focus{
      background-color: #007048;
      color: white;
    }
    .projectBtn{
      color: #007048;
      width: 180px;
      margin-bottom: 10px;
      border: 2px solid;
    }
    .row{
      --bs-gutter-x: 0;
    }
    ul{
      list-style:none;
      padding-left: 0px;
      margin-top: 5px;
    }
    li{
      display: inline;
    }
    .fa-trash-alt{
      margin-right: 2px;
    }
    .addBtn{
      color: #ebdcc3;
      width: 180px;
      border: 2px solid #ebdcc3;
      margin-bottom: 10px;
      border: 2px solid;
    }
    .addBtn:focus{
      background-color: #ebdcc3;
      color: white;
      border: 0;
    }
    .add-on{
      background-color: #007048;
      color: white;
      border: 0;
      border-radius: 5px;
    }
    body > div.swal2-container.swal2-center.swal2-backdrop-show > div{
      background-color: #007048;
      color: white;
    }
    #swal2-title{
      color: white;
    }
    #swal2-html-container{
      color: #e0e0e0;
    }
    #checkbox {height: 100px;overflow-y: auto;}
    #checkbox input[type="checkbox"] {display: none; }
    #checkbox input:checked + .button {background: #ebdcc3; color: #007048;}
    #checkbox .button {display: inline-block; margin: 0 5px 10px 0; padding: 5px 10px; border: 2px solid #ebdcc3; color: #ebdcc3; cursor: pointer; }
    #checkbox .button:hover {background: #ebdcc3; color: #007048; }
    #checkbox .round {border-radius: 5px; }

    #reviseCheckbox {height: 100px;overflow-y: auto;}
    #reviseCheckbox input[type="checkbox"] {display: none; }
    #reviseCheckbox input:checked + .button {background: #ebdcc3; color: #007048;}
    #reviseCheckbox .button {display: inline-block; margin: 0 5px 10px 0; padding: 5px 10px; border: 2px solid #ebdcc3; color: #ebdcc3; cursor: pointer; }
    #reviseCheckbox .button:hover {background: #ebdcc3; color: #007048; }
    #reviseCheckbox .round {border-radius: 5px; }
  </style>
  <body>
    <div class="row">
      <div class="col-4"></div>
      <div class="col-4">
        <h1 style="margin-top: 15px;text-align: center;color: #007048;">點餐系統</h1>
      </div>
      <div class="col-4">
        <a href="setting.php" type="button" class="btn" title="修改" style="background-color: #007048;color: white;margin-top: 25px;margin-left: 282px;" ><i class="fas fa-pen"></i></a>
        <a href="report.php" type="button" class="btn" title="報表" style="background-color: #007048;color: white;margin-top: 25px;margin-left: 5px;"><i class="fas fa-file-alt"></i></a>
      </div>
    </div>
      
      <div class="row" style="margin-top: 15px;">
        <div class="col-md-1"></div>
        <div class="col-md-1" style="margin-top: 50px;">
          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="margin-left: 25px;">
            <button class="btn nav-link active" data-bs-toggle="pill">桌號1</button>
            <button class="btn nav-link" data-bs-toggle="pill">桌號2</button>
            <button class="btn nav-link" data-bs-toggle="pill">桌號3</button>
            <button class="btn nav-link" data-bs-toggle="pill">桌號4</button>
            <button class="btn nav-link" data-bs-toggle="pill">桌號5</button>
          </div>
        </div>
        <div class="col-md-6" style="margin-top: 50px;">
          <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="margin-left: 25px;">
              <button class="btn nav-link active" id="v-pills-friedNoodles-tab" data-bs-toggle="pill" data-bs-target="#v-pills-friedNoodles" type="button" role="tab" aria-controls="v-pills-friedNoodles" aria-selected="true">炒麵</button>
              <button class="btn nav-link" id="v-pills-noodleSoup-tab" data-bs-toggle="pill" data-bs-target="#v-pills-noodleSoup" type="button" role="tab" aria-controls="v-pills-noodleSoup" aria-selected="false">湯麵</button>
              <button class="btn nav-link" id="v-pills-rice-tab" data-bs-toggle="pill" data-bs-target="#v-pills-rice" type="button" role="tab" aria-controls="v-pills-rice" aria-selected="false">飯類</button>
              <button class="btn nav-link" id="v-pills-soup-tab" data-bs-toggle="pill" data-bs-target="#v-pills-soup" type="button" role="tab" aria-controls="v-pills-soup" aria-selected="false">湯類</button>
              <button class="btn nav-link" id="v-pills-sideDish-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sideDish" type="button" role="tab" aria-controls="v-pills-sideDish" aria-selected="false">小菜</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-friedNoodles" role="tabpanel" aria-labelledby="v-pills-friedNoodles-tab">
                <button class="btn projectBtn" id="addRemark">海鮮炒烏龍 $85</button>
                <button class="btn projectBtn">海鮮炒米粉 $85</button>
                <button class="btn projectBtn">海鮮炒粄條 $85</button>
                <button class="btn projectBtn">海鮮炒麵 $85</button>
                <button class="btn projectBtn">肉絲炒烏龍 $70</button>
                <button class="btn projectBtn">肉絲炒米粉 $70</button>
                <button class="btn projectBtn">肉絲炒粄條 $70</button>
                <button class="btn projectBtn">肉絲炒麵 $70</button>
                <button class="btn projectBtn">羊肉炒烏龍 $80</button>
                <button class="btn projectBtn">羊肉炒米粉 $80</button>
                <button class="btn projectBtn">羊肉炒粄條 $80</button>
                <button class="btn projectBtn">羊肉炒麵 $80</button>
                <button class="btn projectBtn">乾意麵 $45</button>
                <button class="btn projectBtn">乾麵 $45</button>
                <button class="btn projectBtn">乾米粉 $45</button>
                <button class="btn projectBtn">乾粄條 $45</button>
              </div>
              <div class="tab-pane fade" id="v-pills-noodleSoup" role="tabpanel" aria-labelledby="v-pills-noodleSoup-tab">
                <button class="btn projectBtn">海鮮湯烏龍 $85</button>
                <button class="btn projectBtn">海鮮湯米粉 $85</button>
                <button class="btn projectBtn">海鮮湯粄條 $85</button>
                <button class="btn projectBtn">海鮮湯麵 $85</button>
                <button class="btn projectBtn">肉絲湯烏龍 $70</button>
                <button class="btn projectBtn">肉絲湯米粉 $70</button>
                <button class="btn projectBtn">肉絲湯粄條 $70</button>
                <button class="btn projectBtn">肉絲湯麵 $70</button>
                <button class="btn projectBtn">豬腸冬粉 $75</button>
                <button class="btn projectBtn">餛飩麵 $65</button>
                <button class="btn projectBtn">鍋燒意麵 $90</button>
                <button class="btn projectBtn">鍋燒烏龍 $90</button>
                <button class="btn projectBtn">擔仔粄條 $50</button>
                <button class="btn projectBtn">擔仔米粉 $50</button>
                <button class="btn projectBtn">擔仔麵 $50</button>
              </div>
              <div class="tab-pane fade" id="v-pills-rice" role="tabpanel" aria-labelledby="v-pills-rice-tab">
                <button class="btn projectBtn">白飯 $10</button>
                <button class="btn projectBtn">肉燥飯(小) $35</button>
                <button class="btn projectBtn">肉燥飯(大) $45</button>
                <button class="btn projectBtn">肉絲蛋炒飯 $70</button>
                <button class="btn projectBtn">蝦仁蛋炒飯 $70</button>
                <button class="btn projectBtn">火腿蛋炒飯 $70</button>
                <button class="btn projectBtn">蝦仁火腿蛋炒飯 $80</button>
                <button class="btn projectBtn">蝦仁肉絲蛋炒飯 $90</button>
                <button class="btn projectBtn">肉絲火腿蛋炒飯 $80</button>
                <button class="btn projectBtn">羊肉炒飯 $80</button>
                <button class="btn projectBtn">海鮮粥 $85</button>
                <button class="btn projectBtn">無刺虱目魚粥 時價</button>
              </div>
              <div class="tab-pane fade" id="v-pills-soup" role="tabpanel" aria-labelledby="v-pills-soup-tab">
                <button class="btn projectBtn">無刺虱目魚湯 時價</button>
                <button class="btn projectBtn">肝連湯 $45</button>
                <button class="btn projectBtn">豬肝湯 $45</button>
                <button class="btn projectBtn">餛飩湯 $40</button>
                <button class="btn projectBtn">貢丸湯 $30</button>
                <button class="btn projectBtn">蛤蜊湯 $45</button>
                <button class="btn projectBtn">蛋花湯 $35</button>
              </div>
              <div class="tab-pane fade" id="v-pills-sideDish" role="tabpanel" aria-labelledby="v-pills-sideDish-tab">
                <button class="btn projectBtn">燙青菜 $35</button>
                <button class="btn projectBtn">油豆腐 $25</button>
                <button class="btn projectBtn">海帶 $25</button>
                <button class="btn projectBtn">小豆干 $20</button>
                <button class="btn projectBtn">滷蛋 $15</button>
                <button class="btn projectBtn">皮蛋豆腐 $40</button>
                <button class="btn projectBtn">涼拌時蔬 $50</button>
                <button class="btn projectBtn">醃蜆仔 $40</button>
                <button class="btn projectBtn">豬耳朵 $30</button>
                <button class="btn projectBtn">肝連肉 $50</button>
                <button class="btn projectBtn">粉腸 $50</button>
                <button class="btn projectBtn">嘴邊肉 $50</button>
                <button class="btn projectBtn">豬心 $50</button>
                <button class="btn projectBtn">涼拌海蜇皮 $70</button>
                <button class="btn projectBtn">涼拌小黃瓜 $40</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3" style="color: white;">
          <div style="border: 2px solid #007048;height: 583px;border-radius: 24px;border-radius: 15px;box-shadow: 2px 2px 8px 2px #579982;padding: 50px 30px;background-color: #007048;">
            <ul id="reviseDelete">
              <li>蝦仁肉絲蛋炒飯</li>
              <li style="float: right;">x1</li>
                <ul>
                  <li style="color: #d2d2d2;">加大，加辣</li>
                  <li style="float: right;">$100</li>
                </ul>
            </ul>
            <ul>
              <li>肝連湯</li>
              <li style="float: right;">x1</li>
                <ul>
                  <li style="float: right;">$45</li>
                </ul>
            </ul>
            <div style="position: relative;top: 335px;">
              <lable style="font-size: 30px;">總金額:</lable>
              <button type="button" class="btn" id="checkOut" style="float: right;background-color: #ebdcc3;color: #007048;margin-top: 4px;"><i class="fas fa-arrow-right"></i></button>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
  </body>
</html>

<script>
  function chgNum(ndid, opr){
    var input = document.getElementById(`appendedPrependedInput${ndid}`);
    var index= parseInt(input.value);
   
    // var price = $('.price').html().substring(1);
    if(opr=='del'){

      if(index == 1){
        // alert("不能減了!");
        return ;
      }
      index = index - 1;
      
    }else if(opr=='add'){
      // if(index == 99){
      //   // alert('不能加了!');
      //   return ;
      // }
      index = index + 1;
    }
    input.value=index;
    // $('.nums ').html(index);
    // $('.total').html(index*price+'元')
  }

  function confirmAlert(){
    Swal.fire({
      icon: 'success',
      title: '結帳成功',
      html: '本次結帳金額為$145',
      showConfirmButton: false,
      timer: 1500,
      didOpen: () => {
        document.querySelector(".swal2-success-circular-line-left").style.backgroundColor="#007048";
        document.querySelector(".swal2-success-circular-line-right").style.backgroundColor="#007048";
        document.querySelector(".swal2-success-fix").style.backgroundColor="#007048";
      }
    })
  }
  document.getElementById("checkOut").addEventListener("click",function(){
    confirmAlert();
  });
  
  function Alertadd(e){
    Swal.fire({
    title: '海鮮炒烏龍',
    html:`
          <div style="margin-bottom: 10px;">
            <button class="add-on" onclick="chgNum(1,'del')"><i class="fas fa-minus"></i></button>
            <input class="span3 text-center" id="appendedPrependedInput1" disabled="disabled" type="text" value="1" style="width: 122px;border-radius: 5px;background-color: #ffffff;color: #106a8e;"/>
            <button class="add-on" onclick="chgNum(1,'add')"><i class="fas fa-plus"></i></button>
          </div>
          <div id="checkbox">
            <label><input type="checkbox" name="variety" value="加大" /><span class="round button">加大</span></label>
            <label><input type="checkbox" name="variety" value="加辣" /><span class="round button">加辣</span></label>
            <label><input type="checkbox" name="variety" value="招待" /><span class="round button">招待</span></label>
          </div>`,
    showCancelButton: true,
    confirmButtonText: '確定',
    cancelButtonText: e,
    
    }).then((result) => {
      if (result.isConfirmed) {

      }
    })
  }

  document.getElementById("addRemark").addEventListener("click",function(){
    Alertadd('取消');
  });

  document.getElementById("reviseDelete").addEventListener("click",function(){
    Alertadd('刪除');
  });

  </script>