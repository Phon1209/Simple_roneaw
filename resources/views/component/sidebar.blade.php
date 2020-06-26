    <section class="sidebar">
      <input type="checkbox" class="toggler"/>
      <div class="hamburger">
        <div></div>
       </div>
      <div class="menu">
        <div>
          <ul class="menu-list">
@if ($userRank==="Admin")
            <li{!!$current=='โหมดผู้ดูแลระบบ'?' class="current"><a href="#">':'><a href="/admin">'!!}โหมดผู้ดูแลระบบ</a></li>
@endif
            <li{!!$current=='การสั่งพิมพ์'?' class="current"><a href="#">':'><a href="/">'!!}การสั่งพิมพ์</a></li>
@if ($userRank==="Admin")
            <li{!!$current=='ประวัติ'?' class="current"><a href="#">':'><a href="/admin/history">'!!}ประวัติ</a></li>
@endif
            <li{!!$current=='ช่วยเหลือ'?' class="current"><a href="#">':'><a href="#">'!!}ช่วยเหลือ</a></li>
            <li{!!$current=='ออกจากระบบ'?' class="current"><a href="#">':'><a href="/logout">'!!}ออกจากระบบ</a></li>
          </ul>
        </div>
      </div>
    </section>
