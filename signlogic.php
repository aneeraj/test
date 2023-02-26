<?php
  include("connection.php");
  session_start();
  ob_start();

  if (isset($_GET["signup"]) && $_GET["signup"]==1) {
    $name =  $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $mobile = $_POST["mobile"];
    $ngo = 0;
    if (isset($_POST["isNGO"])) {
      $ngo = 1;
    }
    $pass = $_POST["pass"];
    $pass = sha1($pass.$email);

    $sql = "INSERT INTO user values('$email','$name','$address','$dob','$mobile','$ngo','$pass','','')";
    $conn->query($sql);

    include("loader.php");

    ?>
    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.22/dist/web3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">

    function addHash(email,hash) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          window.location.replace("login.php?signsuccess=1");
        }
      };
      xmlhttp.open("GET", "addhash.php?register=1&email="+email+"&hash="+hash, true);
      xmlhttp.send();
    }

      var contract;
      web3 = new Web3(web3.currentProvider);
      var address = "0x2b44f4291DD159CBE67f30251e72599b33F1E081";
      var abi = [
        	{
        		"constant": true,
        		"inputs": [],
        		"name": "getRegisteredUser",
        		"outputs": [
        			{
        				"name": "email",
        				"type": "string"
        			},
        			{
        				"name": "name",
        				"type": "string"
        			},
        			{
        				"name": "mobile",
        				"type": "string"
        			},
        			{
        				"name": "addr",
        				"type": "string"
        			}
        		],
        		"payable": false,
        		"stateMutability": "view",
        		"type": "function"
        	},
        	{
        		"constant": false,
        		"inputs": [
        			{
        				"name": "email",
        				"type": "string"
        			},
        			{
        				"name": "name",
        				"type": "string"
        			},
        			{
        				"name": "mobile",
        				"type": "string"
        			},
        			{
        				"name": "addr",
        				"type": "string"
        			}
        		],
        		"name": "userRegistration",
        		"outputs": [],
        		"payable": false,
        		"stateMutability": "nonpayable",
        		"type": "function"
        	}
        ];

        contract = new web3.eth.Contract(abi,address);


        var name = "<?php echo $name ?>";
        var email = "<?php echo $email ?>";
        var mobile = "<?php echo $mobile ?>";
        var address = "<?php echo $address ?>";
        ethereum.enable();
        web3.eth.getAccounts().then(function(accounts)
        {
          var acc = accounts[0];
          contract.methods.userRegistration(email,name,mobile,address).send({from: acc})
  					.on('transactionHash', function(hash){
              addHash(email,hash);
  				})
        })

    </script>
    <?php
  }

  if (isset($_GET["login"]) && $_GET["login"]==1) {
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $sql = "SELECT * FROM user where email='$email' and AC_hash!=''";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo sha1($pass.$email)."\n";
    echo $row["pass"];
    if(sha1($pass.$email)==$row["pass"]){
      $_SESSION["userlogged"] = "True";
      $_SESSION["useremail"] = $email;
      $_SESSION["isNGO"] = $row["ngo"];
      $_SESSION["hash"] = $row["AC_hash"];
      $_SESSION["uname"] = $row["name"];
      setcookie("userlogged", "True", time() + (86400 * 30), "/"); // 86400 = 1 day
      setcookie("useremail", $email, time() + (86400 * 30), "/");
      setcookie("uname", $row["name"], time() + (86400 * 30), "/");
      setcookie("isNGO", $row["ngo"], time() + (86400 * 30), "/");
      setcookie("hash", $row["AC_hash"], time() + (86400 * 30), "/");
      header("Location: profile.php");
    }else{
      header("Location: login.php?logerror=1");
    }
  }

  if (isset($_GET["logout"])) {
    unset($_SESSION["useremail"]);
    unset($_SESSION["isNGO"]);
    unset($_SESSION["userlogged"]);
    unset($_COOKIE['useremail']);
    unset($_COOKIE['hash']);
    unset($_SESSION["uname"]);
    setcookie('useremail', null, -1, '/');
    unset($_COOKIE['userlogged']);
    setcookie('userlogged', null, -1, '/');
    unset($_COOKIE['isNGO']);
    setcookie('isNGO', null, -1, '/');
    header("Location: index.php");
  }


 ob_end_flush();
?>
