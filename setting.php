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
    .tableBtn:focus{
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
      color: #007048;
      width: 180px;
      border: 2px solid #007048;
      margin-bottom: 10px;
      border: 2px solid;
    }
    .addBtn:focus{
      background-color: #007048;
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
  </style>
  <body>
    <div class="row">
      <div class="col-4">
        <a href="index.php" type="button" class="btn" title="跳回點餐系統" style="background-color: #007048;color: white;margin-top: 25px;margin-left: 126px;"><i class="fas fa-share-square"></i></a>
      </div>
      <div class="col-4">
        <h1 style="margin-top: 15px;text-align: center;color: #007048;">後臺操作</h1>
      </div>
      <div class="col-4">
        <button type="button" class="btn" id="btnConfirm" title="確認" style="background-color: #007048;color: white;margin-top: 25px;margin-left: 285px;"><i class="fas fa-check"></i></button>
        <a href="report.php" type="button" class="btn" title="報表" style="background-color: #007048;color: white;margin-top: 25px;margin-left: 5px;"><i class="fas fa-file-alt"></i></a>
      </div>
    </div>
      
      <div class="row" style="margin-top: 15px;">
        <div class="col-md-1"></div>
        <div class="col-md-1" style="margin-top: 50px;">
          <button type="button" class="btn" id="tableDelete" title="刪除" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 25px;"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn" id="tableAdd" title="新增" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;"><i class="fas fa-plus"></i></button>
          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="margin-left: 25px;">
            <button class="btn nav-link active" data-bs-toggle="pill">桌號1</button>
            <button class="btn nav-link" data-bs-toggle="pill">桌號2</button>
            <button class="btn nav-link" data-bs-toggle="pill">桌號3</button>
            <button class="btn nav-link" data-bs-toggle="pill">桌號4</button>
            <button class="btn nav-link" data-bs-toggle="pill">桌號5</button>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5" style="margin-top: 50px;">
          <button type="button" class="btn" id="navDelete" title="刪除" style="background-color: #007048;color: white;margin-bottom: 10px;"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn" id="navAdd" title="新增" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;"><i class="fas fa-plus"></i></button>
          <button type="button" class="btn" id="navRevise" title="修改" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;"><i class="fas fa-pen"></i></button>

          <button type="button" class="btn" id="projectDelete" title="刪除" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 152px;"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn" id="projectAdd" title="新增" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;"><i class="fas fa-plus"></i></button>
          <button type="button" class="btn" id="projectRevise" title="修改" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;"><i class="fas fa-pen"></i></button>

          <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="margin-left: 25px;">
              <button class="btn nav-link active" id="v-pills-friedNoodles-tab" data-bs-toggle="pill" data-bs-target="#v-pills-friedNoodles" type="button" role="tab" aria-controls="v-pills-friedNoodles" aria-selected="true">炒麵</button>
              <button class="btn nav-link" id="v-pills-noodleSoup-tab" data-bs-toggle="pill" data-bs-target="#v-pills-noodleSoup" type="button" role="tab" aria-controls="v-pills-noodleSoup" aria-selected="false">湯麵</button>
              <button class="btn nav-link" id="v-pills-rice-tab" data-bs-toggle="pill" data-bs-target="#v-pills-rice" type="button" role="tab" aria-controls="v-pills-rice" aria-selected="false">飯類</button>
              <button class="btn nav-link" id="v-pills-soup-tab" data-bs-toggle="pill" data-bs-target="#v-pills-soup" type="button" role="tab" aria-controls="v-pills-soup" aria-selected="false">湯類</button>
              <button class="btn nav-link" id="v-pills-sideDish-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sideDish" type="button" role="tab" aria-controls="v-pills-sideDish" aria-selected="false">小菜</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent" style="margin-left: 78px;">
              <div class="tab-pane fade show active" id="v-pills-friedNoodles" role="tabpanel" aria-labelledby="v-pills-friedNoodles-tab">
                <button class="btn projectBtn">海鮮炒烏龍 $85</button>
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
        <div class="col-md-1"></div>
        <center class="col-md-2" style="margin-top: 50px;">
          <button type="button" class="btn" id="btnDelete" title="刪除" style="background-color: #007048;color: white;margin-bottom: 10px;"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn" id="btnAdd" title="新增" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;"><i class="fas fa-plus"></i></button>
          <button type="button" class="btn" id="btnRevise" title="修改" style="background-color: #007048;color: white;margin-bottom: 10px;margin-left: 17px;"><i class="fas fa-pen"></i></button>
          <button class="btn addBtn" id>加大</button>
          <button class="btn addBtn">加辣</button>
          <button class="btn addBtn">招待</button>
        </center>
        </div>
        <div class="col-md-1"></div>
      </div>
  </body>
</html>

<script>

  function confirmAlert(){
    Swal.fire({
      icon: 'success',
      title: '存取成功!!',
      showConfirmButton: false,
      timer: 1500,
      didOpen: () => {
        document.querySelector(".swal2-success-circular-line-left").style.backgroundColor="#007048";
        document.querySelector(".swal2-success-circular-line-right").style.backgroundColor="#007048";
        document.querySelector(".swal2-success-fix").style.backgroundColor="#007048";
      }
    })
  }
  document.getElementById("btnConfirm").addEventListener("click",function(){
    confirmAlert();
  });

  function tableAlert(){
    Swal.fire({
    title: '確定刪除嗎?',
    icon: 'warning',
    showCancelButton: true,
    background:'#106A8E;',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '刪除',
    cancelButtonText: '關閉'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  }
  document.getElementById("tableDelete").addEventListener("click",function(){
    tableAlert();
  });


  function btnAlert(){
    Swal.fire({
    title: '確定刪除嗎?',
    icon: 'warning',
    showCancelButton: true,
    background:'#106A8E;',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '刪除',
    cancelButtonText: '關閉'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  }
  document.getElementById("btnDelete").addEventListener("click",function(){
    btnAlert();
  });


  function navAlert(){
    Swal.fire({
    title: '確定刪除嗎?',
    icon: 'warning',
    showCancelButton: true,
    background:'#106A8E;',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '刪除',
    cancelButtonText: '關閉'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  }
  document.getElementById("navDelete").addEventListener("click",function(){
    navAlert();
  });


  function navAlertadd(){
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
    preConfirm: (login) => {
      return fetch(`//api.github.com/users/${login}`)
        .then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json()
        })
        .catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        })
    },
    allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: `${result.value.login}'s avatar`,
          imageUrl: result.value.avatar_url
        })
      }
    })
  }

  document.getElementById("navAdd").addEventListener("click",function(){
    navAlertadd();
  });


  function navAlertRevise(){
    Swal.fire({
    title: '修改項目名稱',
    input: 'text',
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: '確定',
    cancelButtonText: '關閉',
    showLoaderOnConfirm: true,
    preConfirm: (login) => {
      return fetch(`//api.github.com/users/${login}`)
        .then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json()
        })
        .catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        })
    },
    allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: `${result.value.login}'s avatar`,
          imageUrl: result.value.avatar_url
        })
      }
    })
  }

  document.getElementById("navRevise").addEventListener("click",function(){
    navAlertRevise();
  });

  function projectAlert(){
    Swal.fire({
    title: '確定刪除嗎?',
    icon: 'warning',
    showCancelButton: true,
    background:'#106A8E;',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '刪除',
    cancelButtonText: '關閉'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  }
  document.getElementById("projectDelete").addEventListener("click",function(){
    projectAlert();
  });


  function projectAlertadd(){
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
    preConfirm: (login) => {
      return fetch(`//api.github.com/users/${login}`)
        .then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json()
        })
        .catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        })
    },
    allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: `${result.value.login}'s avatar`,
          imageUrl: result.value.avatar_url
        })
      }
    })
  }

  document.getElementById("projectAdd").addEventListener("click",function(){
    projectAlertadd();
  });


  function projectAlertRevise(){
    Swal.fire({
    title: '修改項目名稱',
    input: 'text',
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: '確定',
    cancelButtonText: '關閉',
    showLoaderOnConfirm: true,
    preConfirm: (login) => {
      return fetch(`//api.github.com/users/${login}`)
        .then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json()
        })
        .catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        })
    },
    allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: `${result.value.login}'s avatar`,
          imageUrl: result.value.avatar_url
        })
      }
    })
  }

  document.getElementById("projectRevise").addEventListener("click",function(){
    projectAlertRevise();
  });



  function Alertadd(){
    Swal.fire({
    title: '新增選項',
    input: 'text',
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: '新增',
    cancelButtonText: '關閉',
    showLoaderOnConfirm: true,
    preConfirm: (login) => {
      return fetch(`//api.github.com/users/${login}`)
        .then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json()
        })
        .catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        })
    },
    allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: `${result.value.login}'s avatar`,
          imageUrl: result.value.avatar_url
        })
      }
    })
  }

  document.getElementById("btnAdd").addEventListener("click",function(){
    Alertadd();
  });

  function btnAlertRevise(){
    Swal.fire({
    title: '修改項目名稱',
    input: 'text',
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: '確定',
    cancelButtonText: '關閉',
    showLoaderOnConfirm: true,
    preConfirm: (login) => {
      return fetch(`//api.github.com/users/${login}`)
        .then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json()
        })
        .catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        })
    },
    allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: `${result.value.login}'s avatar`,
          imageUrl: result.value.avatar_url
        })
      }
    })
  }

  document.getElementById("btnRevise").addEventListener("click",function(){
    btnAlertRevise();
  });

  </script>