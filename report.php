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
  </style>
  <body>
    <div class="row">
      <div class="col-4">
        <a href="index.php" type="button" class="btn" title="跳回點餐系統" style="background-color: #007048;color: white;margin-top: 25px;margin-left: 126px;"><i class="fas fa-share-square"></i></a>
        <a href="setting.php" type="button" class="btn" title="修改" style="background-color: #007048;color: white;margin-top: 25px;margin-left: 10px;" ><i class="fas fa-pen"></i></a>
      </div>
      <div class="col-4">
        <h1 style="margin-top: 15px;text-align: center;color: #007048;">報表</h1>
      </div>
      <div class="col-4">
        <button type="button" class="btn btn-primary" title="下載" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #007048;color: white;margin-top: 25px;margin-left: 285px;">
          <i class="fas fa-download"></i>
        </button>
      </div>
    </div>
      
      <div class="row" style="margin-top: 15px;color: #007048;">
        <div class="col-md-1"></div>
        <div class="col-md-11">
          <form style="margin-bottom: 10px;display: inline;">
            <label for="Turnover">選擇日期：</label>
            <input id="Turnover" type="date" name="Turnoverdate" style="border-radius: 5px;border-color: aliceblue;">
          </form>
          <form style="margin-bottom: 10px;display: inline;">
            <label for="Turnover">---</label>
            <input id="Turnover" type="date" name="Turnoverdate" style="border-radius: 5px;border-color: aliceblue;">
          </form>
        </div>
      </div>
      <div class="row" style="margin-top: 15px;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <table class="table table-striped table-dark" border="1" style="margin-left: 15px; margin-bottom: 15px;margin-top: 15px;border-color: white;">
            <tr>
              <th width="40%">日期</th>
              <th width="60%">金額</th>
            </tr>
            <tr>
              <td>2022/9/1</td>
              <td>$285
                <a class="" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  <i class="fas fa-sort-down" style="margin-bottom: 4px;color: white;"></i>
                </a>
                <div class="collapse" id="collapseExample">
                  <div class="card card-body" style="background-color: #007048;border-color: #007048;">
                    <div class="row">
                      <div class="col-5">
                        <div style="margin-bottom: 5px;">海鮮炒粄條</div>
                        <div style="margin-bottom: 5px;">肉絲蛋炒飯</div>
                        <div style="margin-bottom: 5px;">肝連湯</div>
                        <div style="margin-bottom: 5px;">皮蛋豆腐</div>
                      </div>
                      <div class="col-3">
                        
                        <div style="margin-bottom: 5px;">x1</div>
                        <div style="margin-bottom: 5px;">x1</div>
                        <div style="margin-bottom: 5px;">x2</div>
                        <div style="margin-bottom: 5px;">x1</div>
                      </div>
                      <div class="col-4" style="text-align: end;">
                        <div style="margin-bottom: 5px;">$85</div>
                        <div style="margin-bottom: 5px;">$70</div>
                        <div style="margin-bottom: 5px;">$90</div>
                        <div style="margin-bottom: 5px;">$40</div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-2"></div>
      </div>
  </body>
</html>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-color: #007048;color: white;">
        <!-- <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> 
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> -->
        <div class="modal-body">
          <div style="margin-bottom: 10px;">下載日期：2022/9/3-2022/9/4</div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
              細項
            </label>
          </div>
        </div>
        <div class="modal-footer" style="border-top: #007048;">
          <button type="button" class="btn" style="background-color: #ebdcc3;color: #007048;" data-bs-dismiss="modal">關閉</button>
          <button type="button" id="sureBtn" class="btn" style="background-color: #ebdcc3;color: #007048;">確定</button>
        </div>
      </div>
    </div>
  </div>

<script>

function Alertadd(){
  let timerInterval
  Swal.fire({
    title: '處理中...',
    html: '稍等幾秒',
    timerProgressBar: true,
    allowOutsideClick:false,
    didOpen: () => {
      Swal.showLoading()
    },
    willClose: () => {
      clearInterval(timerInterval)
    }
  }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
      console.log('I was closed by the timer')
    }
  })
}

document.getElementById("sureBtn").addEventListener("click",function(){
  Alertadd();
});




</script>
