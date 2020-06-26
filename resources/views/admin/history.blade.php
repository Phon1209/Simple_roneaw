<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link
      rel="stylesheet"
      href="/css/mobile.css"
    />
    <title>History</title>
  </head>
  <body class="bg_sk">
    @include('component/sidebar',['current'=>'ประวัติ'])
    <div class="modal-collection">
      <div class="modal" id="historyFilter">
        <div class="modal-dismiss">&times;</div>
        <div>
          <h3>Filter</h3>
          <form id="filterForm">
            <div class="form-group">
              <label for="usrFilter">Username: </label>
              <input type="text" id="usrFilter">
            </div>
            <div class="form-group">
              <label for="displayNameFilter">Display Name:</label>
              <input type="text" id="displayNameFilter">
            </div>
            <div class="form-group form-multi">
              <div class="form-title">
                <h5>Work Type:</h5>
              </div>
              <div class="form-multi-body">
                <div class="sub-form-group">
                  <input type="checkbox" id="filter-worktype1" name="workTypeFilter" value="1">
                  <label for="filter-worktype1">เอกสารการสอน</label>
                </div>
                <div class="sub-form-group">
                  <input type="checkbox" id="filter-worktype2" name="workTypeFilter" value="2">
                  <label for="filter-worktype2">เอกสารทั่วไป</label>
                </div>
                <div class="sub-form-group">
                  <input type="checkbox" id="filter-worktype3" name="workTypeFilter" value="3">
                  <label for="filter-worktype3">ข้อสอบ</label>
                </div>
              </div>
            </div>
            <div class="form-group form-multi form-grid">
              <div class="form-title">
                <h5>Organization List:</h5>
              </div>
              <div class="form-multi-body form-grid-body">
                @foreach($organizationList as $organizationID => $organizationName)
                <div class="sub-form-group">
                  <input type="checkbox" id="filter-org{{$organizationID}}" name="organizationFilter" value="{{$organizationID}}">
                  <label for="filter-org{{$organizationID}}">{{$organizationName}}</label>
                </div>
                @endforeach
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
    <div class="alert-collection"></div>
    <div class="container">
      <h2>History</h2>
      <div class="table-content">
        <header class="table-heading">
          <div></div>
          <div class="btn-control">
            <div class="dropdown" value="1">
              เรียงโดย: 
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSortBy" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              เวลา
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownSortBy">
                <a class="dropdown-item" href="#">ชื่อผู้ใช้</a>
                <a class="dropdown-item" href="#">ชื่อ</a>
                <a class="dropdown-item" href="#">เวลา</a>
                <a class="dropdown-item" href="#">กระดาษน้ำตาล</a>
                <a class="dropdown-item" href="#">กระดาษขาว</a>
                <a class="dropdown-item" href="#">กระดาษสี</a>
              </div>
            </div>
            <div class="dropdown" value="1">
              เรียงจาก: 
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSortOrder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              น้อยไปมาก
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownSortOrder">
                <a class="dropdown-item" href="#">น้อยไปมาก</a>
                <a class="dropdown-item" href="#">มากไปน้อย</a>
              </div>
            </div>
            <div id="historyFilterBtn" class="btn">
              <i class="fas fa-filter"></i> Filter
            </div>
          </div>
        </header>
        <section class="py-2" id="history-collection">
          <div class="title">ID</div>
          <div class="title">Username</div>
          <div class="title">Display</div>
          <div class="title">Organize</div>
          <div class="title">WorkType</div>
          <div class="title">Paper</div>
          <div class="title">Time</div>

          <div class="body d-flex-cc">000001</div>
          <div class="body">Successor</div>
          <div class="body">ปฏิพล เลิศสุธากุล</div>
          <div class="body">กลุ่มสาระการเรียนรู้สังคมศึกษา ศาสนา และวัฒนธรรม</div>
          <div class="body text-center">ข้อสอบ</div>
          <div class="body paper-grid text-center">
            <div class="bg-brown">3000</div>
            <div class="bg-white">3000</div>
            <div class="bg-pink">3000</div>
          </div>
          <div class="body text-center">
            20:00:00 31/06/63
          </div>
          <div class="body d-flex-cc">000001</div>
          <div class="body">Successor</div>
          <div class="body">ปฏิพล เลิศสุธากุล</div>
          <div class="body">กลุ่มสาระการเรียนรู้คณิตศาสตร์</div>
          <div class="body text-center">เอกสารทั่วไป</div>
          <div class="body paper-grid text-center">
            <div class="bg-brown">3000</div>
            <div class="bg-white">3000</div>
            <div class="bg-pink">3000</div>
          </div>
          <div class="body text-center">
            20:00:00 31/06/63
          </div>
          <div class="body d-flex-cc">000001</div>
          <div class="body">Successor</div>
          <div class="body">ปฏิพล เลิศสุธากุล</div>
          <div class="body">กลุ่มสาระการเรียนรู้คณิตศาสตร์</div>
          <div class="body text-center">เอกสารการสอน</div>
          <div class="body paper-grid text-center">
            <div class="bg-brown">3000</div>
            <div class="bg-white">3000</div>
            <div class="bg-pink">3000</div>
          </div>
          <div class="body text-center">
            20:00:00 31/06/63
          </div>
          <div class="body d-flex-cc">000001</div>
          <div class="body">Successor</div>
          <div class="body">ปฏิพล เลิศสุธากุล</div>
          <div class="body">กลุ่มสาระการเรียนรู้คณิตศาสตร์</div>
          <div class="body text-center">เอกสารการสอน</div>
          <div class="body paper-grid text-center">
            <div class="bg-brown">3000</div>
            <div class="bg-white">3000</div>
            <div class="bg-pink">3000</div>
          </div>
          <div class="body text-center">
            20:00:00 31/06/63
          </div>
          <div class="body d-flex-cc">000001</div>
          <div class="body">Successor</div>
          <div class="body">ปฏิพล เลิศสุธากุล</div>
          <div class="body">กลุ่มสาระการเรียนรู้คณิตศาสตร์</div>
          <div class="body text-center">เอกสารการสอน</div>
          <div class="body paper-grid text-center">
            <div class="bg-brown">3000</div>
            <div class="bg-white">3000</div>
            <div class="bg-pink">3000</div>
          </div>
          <div class="body text-center">
            20:00:00 31/06/63
          </div>
          <div class="body d-flex-cc">000001</div>
          <div class="body">Successor</div>
          <div class="body">ปฏิพล เลิศสุธากุล</div>
          <div class="body">กลุ่มสาระการเรียนรู้คณิตศาสตร์</div>
          <div class="body text-center">เอกสารการสอน</div>
          <div class="body paper-grid text-center">
            <div class="bg-brown">3000</div>
            <div class="bg-white">3000</div>
            <div class="bg-pink">3000</div>
          </div>
          <div class="body text-center">
            20:00:00 31/06/63
          </div>
          <div class="body d-flex-cc">000001</div>
          <div class="body">Successor</div>
          <div class="body">ปฏิพล เลิศสุธากุล</div>
          <div class="body">กลุ่มสาระการเรียนรู้คณิตศาสตร์</div>
          <div class="body text-center">เอกสารการสอน</div>
          <div class="body paper-grid text-center">
            <div class="bg-brown">3000</div>
            <div class="bg-white">3000</div>
            <div class="bg-pink">3000</div>
          </div>
          <div class="body text-center">
            20:00:00 31/06/63
          </div>
          <div class="body d-flex-cc">000001</div>
          <div class="body">Patiphon Loetsuthakun</div>
          <div class="body">ปฏิพล เลิศสุธากุล</div>
          <div class="body">กลุ่มสาระการเรียนรู้คณิตศาสตร์</div>
          <div class="body text-center">เอกสารการสอน</div>
          <div class="body paper-grid text-center">
            <div class="bg-brown">3000</div>
            <div class="bg-white">3000</div>
            <div class="bg-pink">3000</div>
          </div>
          <div class="body text-center">
            20:00:00 31/06/63
          </div>
          <div class="body d-flex-cc">000001</div>
          <div class="body">Successor</div>
          <div class="body">ปฏิพล เลิศสุธากุล</div>
          <div class="body">กลุ่มสาระการเรียนรู้คณิตศาสตร์</div>
          <div class="body text-center">เอกสารการสอน</div>
          <div class="body paper-grid text-center">
            <div class="bg-brown">3000</div>
            <div class="bg-white">3000</div>
            <div class="bg-pink">3000</div>
          </div>
          <div class="body text-center">
            20:00:00 31/06/63
          </div>
        </section>
        <section id="history-page-control" class="page-control py-2 child-round"></section>
      </div>
    </div>
    <script src="/admin/js/api.js"></script>
    <script src="/js/dropdown.js"></script>
    <script src="/_admin/js/utilities.js"></script>
    <script src="/admin/js/ui.js"></script>
    <script src="/_admin/js/history.js"></script>
  </body>
</html>
