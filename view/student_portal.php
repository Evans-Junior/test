<?php
    //inclde deletion of the verificaiton pin
    include '../functions/clear_data.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STUDENT PORTAL</title>
  <link rel="stylesheet" href="../css/student_portal.css">
</head>

<body>
  <div class="navbar">
    <div class="logo">ASBED</div>
    <div class="navbar-links">
      <a href="#">Home</a>
      <a href="#"><img src="../../asbed/assets/magnifying-glass.png" alt="search" width="20px" height="20px"></a>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Welcome, <?php
                           echo $_SESSION['username']
                        ?> 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../login/logout_view.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
  </div>

  <div class="hall-container">
    <button id="hallA_Btn" class="hall-box">
      <div class="hall-name">Hall A</div>
      <div class="room-count">0/10 rooms</div>
      <img class="description-icon" src="../../asbed/assets/description-icon.png" alt="Description Icon">
    </button>
    <button id="hallB_Btn" class="hall-box">
      <div class="hall-name">Hall B</div>
      <div class="room-count">0/30 rooms</div>
      <img class="description-icon" src="../../asbed/assets/description-icon.png" alt="Description Icon">
    </button>
    <button id="hallC_Btn" class="hall-box">
      <div class="hall-name">Hall C</div>
      <div class="room-count">0/20 rooms</div>
      <img class="description-icon" src="../../asbed/assets/description-icon.png" alt="Description Icon">
    </button>
    <button id="hallD_Btn" class="hall-box" onclick="hallBio()">
      <div class="hall-name">Hall D</div>
      <div class="room-count">0/40 rooms </div>
      <img class="description-icon" src="../../asbed/assets/description-icon.png" alt="Description Icon">
    </button>
    <button id="hallE_Btn" class="hall-box" onclick="hallBio()">
      <div class="hall-name">Hall E</div>
      <div class="room-count">0/60 rooms </div>
      <img class="description-icon" src="../../asbed/assets/description-icon.png" alt="Description Icon">
    </button>
  </div>

  <div class="lsection">
    <div class="requests">Requests</div>
    <div class="ann">
      <table class="requests-table">
        <tr>
          <th>Requests</th>
          <th>
            <div class="arrange">
              Actions
              <div class="make"> <img src="../../asbed/assets/plus.png" alt="make" title="make announcement"
                  style="width: 20px;"></a></div>
            </div>
          </th>
        </tr>
        <tr>
          <th>Faulty sink</th>
          <th>
            <div class="actions">
              <div class="edit"> <img src="../../asbed/assets/pencil.png" alt="edit" title="edit request"
                  style="width: 20px;"> </div>
              <div class="delete"><img src="../../asbed/assets/delete.png" alt="delete" title="delete request"
                  style="width: 20px;"></div>
              <div class="send"><img src="../../asbed/assets/delete.png" alt="send" title="send request"
                  style="width: 20px;"></div>

            </div>
          </th>
        </tr>
      </table>
    </div>
    <div class="announcement">Announcements</div>
    <div class="ann">
      <table class="announcement-table">
        <tr>
          <th>Requests</th>
          <th>Status</th>
        </tr>
        <tr>
          <th>Faulty sink</th>
          <th>
            <div class="actions">
              <input type="radio" id="pending" name="progress" value="pending">
              <label for="pending">Pending</label><br>
              <input type="radio" id="Complete" name="fav_language" value="Complete">
              <label for="Complete">Complete</label><br>
            </div>
          </th>
        </tr>
      </table>
    </div>
  </div>
  </div>

  <script src="../js/student_portal.js"></script>
  <script>
document.getElementById("hallA_Btn").addEventListener("click", function() {
    window.location.href = "hallA.html";
});

document.getElementById("hallB_Btn").addEventListener("click", function() {
    window.location.href = "hallB.html";
});
document.getElementById("hallC_Btn").addEventListener("click", function() {
    window.location.href = "hallC.html";
});
document.getElementById("hallD_Btn").addEventListener("click", function() {
    window.location.href = "hallD.html";
});
document.getElementById("hallE_Btn").addEventListener("click", function() {
    window.location.href = "hallE.html";
});
</script>

</body>

</html>