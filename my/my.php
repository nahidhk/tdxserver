<section class="vcc" id="main">
   <div class="mynav flex around">
    <span class="line">TDX SERVER</span>
      <span onclick="openpopup('account')" class="cr">Account</span>
      
   </div>
  <div class="darkbox" id="account">
    <div class="popup">
      <div class="underline flex beet">
        <br>
        <h1>UserID : <?php //echo $user['id']?><?php //echo $user['username']?></h1>
        <div class="pointer flex center medel icon" onclick="closepopup('account')">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <br>
      <div class="flex center">
        <div class="textcenter">
          <img  class="userlogo" src="/src/img/home.png" alt="" srcset="">

          <h1>
            <?php //echo $user['name']?> <i class="fas fa-pen-to-square cr"></i>
          </h1>
        </div>
      </div>
    </div>
  </div>
  </section>