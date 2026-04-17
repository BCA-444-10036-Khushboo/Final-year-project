<?php 
session_start();
if(empty($_SESSION['login_email'])) {   
    header("Location:signin.php");      
}
require("php/db.php");

$user_email = $_SESSION['login_email'];
$query_user = "SELECT * FROM members WHERE user_email='$user_email'";
$result_user = $db->query($query_user);
$row_user = $result_user->fetch_assoc();

$display_name = $row_user['full_name'];
$total_space  = $row_user['storage'];
$used_space   = round($row_user['used_storage'],2);
$plan         = $row_user['plans'];

$percentage   = ($total_space > 0) ? round(($used_space*100)/$total_space,2) : 0;
$user_id      = $row_user['id'];
$folder_name  = "member_".$user_id;
$free_space   = $total_space - $used_space;
$p_status     = " ";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Dashboard</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
  <style>
    body {
      background: #4a00e0;
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
    }
    .sidebar-panel {
      width: 20%;
      min-height: 100vh;
      background: linear-gradient(135deg, #4a00e0, #8e2de2);
      color: #fff;
      padding: 20px 10px;
    }
    .profile_pic {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      border: 4px solid #fff;
      margin-bottom: 15px;
    }
    .nav-list li {
      padding: 12px 15px;
      border-radius: 8px;
      margin-bottom: 8px;
      transition: 0.3s;
      list-style: none;
    }
    .nav-list li:hover {
      background: #fff;
      color: #4a00e0;
      cursor: pointer;
    }
    .main-panel {
      width: 80%;
      background: #f9f9f9;
      overflow: auto;
    }
    .workspace {
      padding: 30px;
      background-image: url(assets/dashboard_bg.png);
      border-radius: 12px;
      min-height: 80vh;
    }
  </style>
</head>
<body>
<div class="main-container d-flex">
  <div class="sidebar-panel">
    <div class="d-flex justify-content-center align-items-center flex-column p-5">
      <div class="profile_pic d-flex justify-content-center align-items-center">
        <i class="fa fa-user fs-1 text-white"></i>
      </div>
      <span class="text-white fs-4"><?php echo $display_name ?></span>
      <hr>
      <button class="btn btn-light rounded-pill upload"><i class="fa fa-upload"></i> Add New File</button>
      <div class="progress storage mt-3 d-none u_pro">
        <div class="progress-bar bg-primary upload_p" style="width:0%"></div>
      </div>
      <div class="upload_msg"></div>
      <hr>
      <ul class="nav-list">
        <li class="menu" p_link="documents"><i class="far fa-folder-open"></i> All Documents</li>
        <li class="menu" p_link="starred"><i class="fas fa-star"></i> Starred Items</li>
        <li class="menu" p_link="upgrade"><i class="fas fa-shopping-cart"></i> Upgrade Plan</li>
      </ul>
      <hr>
      <span class="text-white"><i class="fas fa-database"></i> Storage Usage</span>
      <div class="progress storage">
        <div class="progress-bar bg-primary pb" style="width:<?php echo $percentage ?>%"></div>
      </div>
      <span class="text-white"><span class="us"><?php echo $used_space ?></span>MB / <?php echo $total_space ?>MB</span>
      <a href="php/logout.php" class="btn btn-light mt-3">Sign Out</a>
    </div>
  </div>
  <div class="main-panel">
    <nav class="navbar navbar-light bg-light p-3 shadow-sm sticky-top">
      <div class="container-fluid">
        <form class="d-flex ms-auto search_frm">
          <input class="form-control me-2" type="search" placeholder="Search" id="search">
          <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <div class="workspace p-4"></div>
  </div>
</div>
<div class="msg d-none"></div>
<?php
if($plan != "free") {
  $expiry = $row_user['expiry_date'];
  $current = date('Y-m-d');
  if($expiry < $current) {
    $p_status="deactivate";
    echo "<style>.upload,[p_link='documents'],[p_link='starred']{pointer-events:none;}</style>";
  } else {
    $p_status="activate";
  }
}
?>
<script>
$(document).ready(function () {
  $(".upload").click(function () {
    var input = document.createElement("INPUT");
    input.type = "file";
    input.click();
    input.onchange = function () {
      $(".u_pro").removeClass("d-none");
      var file = new FormData();
      file.append("data", input.files[0]);
      var file_Size = Math.floor(input.files[0].size / 1024 / 1024);
      var free_space = <?php echo $free_space; ?>;
      if (file_Size < free_space) {
        $.ajax({
          type: "POST",
          url: "php/upload.php",
          data: file,
          processData: false,
          contentType: false,
          xhr: function () {
            var request = new window.XMLHttpRequest();
            request.upload.onprogress = function (e) {
              var upload_per = ((e.loaded * 100) / e.total).toFixed(0);
              $(".upload_p").css("width", upload_per + "%").html(upload_per + "%");
            };
            return request;
          },
          success: function (response) {
            var obj = JSON.parse(response);
            $(".u_pro").addClass("d-none");
            var new_per = (obj.used_storage * 100) / <?php echo $total_space ?>;
            $(".us").html(obj.used_storage);
            $(".pb").css("width", new_per + "%");
            var div = document.createElement("DIV");
            div.className = "alert mt-3 " + (obj.msg == "File Upload Successfully" ? "alert-success" : "alert-danger");
            div.innerHTML = obj.msg;
            $(".upload_msg").append(div);
            load_files();
            setTimeout(function () {
              $(".upload_msg").html("");
              $(".upload_p").css("width", "0%");
            }, 3000);
          }
        });
      } else {
        $(".upload_msg").html('<div class="alert alert-danger mt-3">File size too large. Kindly upgrade plan.</div>');
        setTimeout(function () {
          $(".upload_msg").html("");
          $(".upload_p").css("width", "0%");
          $(".u_pro").addClass("d-none");
        }, 3000);
      }
    };
  });

  $(".menu").click(function() {
    var page_link = $(this).attr("p_link");
    $.ajax({
      type:"POST",
      url:"php/pages/"+page_link+".php",
      beforeSend:function(){
        $(".msg").html("<div class='alert alert-success fs-1 text-center p-5'><i class='fas fa-spinner fa-spin fs-1'></i><br>Loading....</div>").removeClass("d-none");
      },
      success:function(response){
        $(".msg").addClass("d-none");
        $(".workspace").html(response);
      }
    });
  });

  function load_files() {
    if("<?php echo $plan;?>" != "free"){
      if("<?php echo $p_status;?>"=="activate"){
        $("[p_link='documents']").click();
      } else {
        $("[p_link='upgrade']").click();
      }
    } else {
      $("[p_link='documents']").