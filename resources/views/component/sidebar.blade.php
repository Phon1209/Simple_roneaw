    <section class="sidebar">
      <input type="checkbox" class="toggler"/>
      <div class="hamburger">
        <div></div>
       </div>
      <div class="menu">
        <div>
          <ul class="menu-list">
            <li{!!$current=='ตั้งค่าบัญชี'?' class="current"><a href="#">':'><a href="/accountSetting">'!!}{{$userData->DisplayName}}</a></li>
@if ($userRank==="Admin")
            <li{!!$current=='โหมดผู้ดูแลระบบ'?' class="current"><a href="#">':'><a href="/admin">'!!}โหมดผู้ดูแลระบบ</a></li>
@endif
@if ($userRank==="Admin")
<li{!!$current=='ประวัติ'?' class="current"><a href="#">':'><a href="/admin/history">'!!}ประวัติ</a></li>
@endif
            <li{!!$current=='การสั่งพิมพ์'?' class="current"><a href="#">':'><a href="/">'!!}การสั่งพิมพ์</a></li>
            <li{!!$current=='ติดต่อผู้จัดทำ'?' class="current"><a href="#">':'><a href="/contact">'!!}ติดต่อผู้จัดทำ</a></li>
            <li{!!$current=='ออกจากระบบ'?' class="current"><a href="#">':'><a href="/logout">'!!}ออกจากระบบ</a></li>
          </ul>
        </div>
      </div>
    </section>
