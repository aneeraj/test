<?php
  $maill = $_SESSION["useremail"];
  $sql = "SELECT count(email) as cnt from alerts where email='$maill'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
?>
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter"><?php echo $row["cnt"] ?></span>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Alerts Center
        </h6>

        <?php
        $sql = "SELECT * from alerts where email='$maill'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '<a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fa fa-donate text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">'.date("M,d,y",strtotime($row["date_time"])).'</div>
                    '.$row["alert"].'
                </div>
            </a>';
          }
        } else {
          echo "0 results";
        }
        ?>

    </div>
</li>
