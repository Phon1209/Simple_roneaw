    <section class="sidebar">
      <input type="checkbox" class="toggler"/>
      <div class="hamburger">
        <div></div>
       </div>
      <div class="menu">
        <div>
          <ul class="menu-list">
            <li<?php echo $current=='ตั้งค่าบัญชี'?' class="current"><a href="#">':'><a href="/accountSetting">'; ?><?php echo e($userData->DisplayName); ?></a></li>
<?php if($userRank==="Admin"): ?>
            <li<?php echo $current=='โหมดผู้ดูแลระบบ'?' class="current"><a href="#">':'><a href="/admin">'; ?>โหมดผู้ดูแลระบบ</a></li>
<?php endif; ?>
<?php if($userRank==="Admin"): ?>
<li<?php echo $current=='ประวัติ'?' class="current"><a href="#">':'><a href="/admin/history">'; ?>ประวัติ</a></li>
<?php endif; ?>
            <li<?php echo $current=='การสั่งพิมพ์'?' class="current"><a href="#">':'><a href="/">'; ?>การสั่งพิมพ์</a></li>
            <li<?php echo $current=='ออกจากระบบ'?' class="current"><a href="#">':'><a href="/logout">'; ?>ออกจากระบบ</a></li>
          </ul>
        </div>
      </div>
    </section>
<?php /**PATH /Users/Admin/Sites/PrinterRoomSystem/resources/views/component/sidebar.blade.php ENDPATH**/ ?>