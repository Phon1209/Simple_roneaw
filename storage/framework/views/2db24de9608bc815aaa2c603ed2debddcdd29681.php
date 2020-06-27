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
    <?php echo $__env->make('component/sidebar',['current'=>'ประวัติ'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="modal-collection">
      <div class="modal" id="historyFilter">
        <div class="modal-dismiss">&times;</div>
        <div>
          <h3>Filter</h3>
          <form id="filterForm">
            <div class="form-group">
              <label for="usrFilter">Username: </label>
              <input type="text" id="usrFilter"<?php if($usrFilter!==NULL): ?> value="<?php echo e($usrFilter); ?>"<?php endif; ?>>
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
                  <input type="checkbox" id="filter-worktype1" name="workTypeFilter" value="1" checked>
                  <label for="filter-worktype1">เอกสารการสอน</label>
                </div>
                <div class="sub-form-group">
                  <input type="checkbox" id="filter-worktype2" name="workTypeFilter" value="2" checked>
                  <label for="filter-worktype2">เอกสารทั่วไป</label>
                </div>
                <div class="sub-form-group">
                  <input type="checkbox" id="filter-worktype3" name="workTypeFilter" value="3" checked>
                  <label for="filter-worktype3">ข้อสอบ</label>
                </div>
              </div>
            </div>
            <div class="form-group form-multi form-grid">
              <div class="form-title">
                <h5>Organization List:</h5>
              </div>
              <div class="form-multi-body form-grid-body">
                <?php $__currentLoopData = $organizationList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organizationID => $organizationName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="sub-form-group">
                  <input type="checkbox" id="filter-org<?php echo e($organizationID); ?>" name="organizationFilter" value="<?php echo e($organizationID); ?>" checked>
                  <label for="filter-org<?php echo e($organizationID); ?>"><?php echo e($organizationName); ?></label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        </section>
        <section id="history-page-control" class="page-control py-2 child-round"></section>
      </div>
    </div>>
    <script type="text/javascript">
      const token = "<?php echo e(csrf_token()); ?>";

      window.history.replaceState({},document.title,window.location.pathname);
    </script>
    <script src="/js/loader.js"></script>
    <script src="/js/api.js"></script>
    <script src="/admin/js/dropdown.js"></script>
    <script src="/admin/js/utilities.js"></script>
    <script src="/admin/js/ui.js"></script>
    <script src="/admin/js/history.js"></script>
  </body>
</html>
<?php /**PATH /Users/Admin/Sites/PrinterRoomSystem/resources/views/admin/history.blade.php ENDPATH**/ ?>