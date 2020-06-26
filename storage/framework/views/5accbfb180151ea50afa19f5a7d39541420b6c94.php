    <section class="sidebar">
      <input type="checkbox" class="toggler"/>
      <div class="hamburger">
        <div></div>
       </div>
      <div class="menu">
        <div>
          <ul class="menu-list">
<?php if($userRank==="Admin"): ?>
            <li<?php echo $current=='โหมดผู้ดูแลระบบ'?' class="current"><a href="#">':'><a href="/admin">'; ?>โหมดผู้ดูแลระบบ</a></li>
<?php endif; ?>
            <li<?php echo $current=='การสั่งพิมพ์'?' class="current"><a href="#">':'><a href="/">'; ?>การสั่งพิมพ์</a></li>
<?php if($userRank==="Admin"): ?>
            <li<?php echo $current=='ประวัติ'?' class="current"><a href="#">':'><a href="/admin/history">'; ?>ประวัติ</a></li>
<?php endif; ?>
            <li<?php echo $current=='ช่วยเหลือ'?' class="current"><a href="#">':'><a href="#">'; ?>ช่วยเหลือ</a></li>
            <li<?php echo $current=='ออกจากระบบ'?' class="current"><a href="#">':'><a href="/logout">'; ?>ออกจากระบบ</a></li>
          </ul>
        </div>
      </div>
    </section>
<?php /**PATH D:\Code Project\Printer Room System\PrinterRoomSystem\resources\views/component/sidebar.blade.php ENDPATH**/ ?>