<?php
  include("connection.php");
  session_start();
  ini_set('display_errors', '0');
  $email = $_SESSION["useremail"];
  $isNGO = $_SESSION["isNGO"];

  if (isset($_GET["postlisting"])) {
    $title = addslashes($_POST["title"]);
    $desc = addslashes($_POST["desc"]);
    $target = $_POST["target"];
    $category = $_POST["category"];
    $fromNGO = $email;
    $doclinks = "";

    $ben_name = $_POST["ben_name"];
    $ben_address = $_POST["ben_address"];
    $ben_phone = $_POST["ben_phone"];
    $ben_email = $_POST["ben_email"];
    $benkey = $ben_email."*#".date("d/M/Y h:i:s");

    extract($_POST);
    $error=array();
    $extension=array("jpeg","jpg","png","gif");
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
        $file_name=$_FILES["files"]["name"][$key];
        $file_tmp=$_FILES["files"]["tmp_name"][$key];
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);

        if(in_array($ext,$extension)) {
            if(!file_exists("listingimages/".$txtGalleryName."/".$file_name)) {
                move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"listingimages/".$txtGalleryName."/".$file_name);
                $doclinks = $doclinks.$file_name."*";
            }
            else {
                $filename=basename($file_name,$ext);
                $newFileName=$filename.time().".".$ext;
                move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"listingimages/".$txtGalleryName."/".$newFileName);
                $doclinks = $doclinks.$file_name."*";
            }
        }
        else {
            array_push($error,"$file_name, ");
        }
    }


    $sql = "INSERT INTO listings(fk_email,title,description,category,target,doclinks)
     values('$email','$title','$desc','$category','$target','$doclinks')";

    if ($isNGO==1) {
       $sql = "INSERT INTO listings(fk_email,title,description,category,target,doclinks,fromNGO,beneficiary_id)
        values('$email','$title','$desc','$category','$target','$doclinks','$fromNGO','$benkey')";

       $sql2 = "INSERT into beneficiary_details values('$benkey','$ben_name','$ben_address','$ben_email','$ben_phone')";
    }
    $conn->query($sql);
    $conn->query($sql2);

    $sql = "SELECT listing_ID from listings where fk_email='$email' and title='$title' and doclinks='$doclinks'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $list_id = $row["listing_ID"];

    include("loader.php");

    ?>


    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.22/dist/web3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">

    function addHash(lid,cat,title,hash) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          window.location.replace("profile.php?Requestsuccess=1");
        }
      };
      xmlhttp.open("GET", "addhash.php?listing=1&lid="+lid+"&cat="+cat+"&title="+title+"&hash="+hash, true);
      xmlhttp.send();
    }


      var contract;
      web3 = new Web3(web3.currentProvider);
      var address = "0x510602626D048239bAD07654f756A577CC3a8352";
      var abi = [
	{
		"constant": false,
		"inputs": [
			{
				"name": "lid",
				"type": "int256"
			},
			{
				"name": "cat",
				"type": "string"
			},
			{
				"name": "ttl",
				"type": "string"
			},
			{
				"name": "tar",
				"type": "int256"
			}
		],
		"name": "addListing",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "getListing",
		"outputs": [
			{
				"name": "lid",
				"type": "int256"
			},
			{
				"name": "cat",
				"type": "string"
			},
			{
				"name": "ttl",
				"type": "string"
			},
			{
				"name": "tar",
				"type": "int256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	}
];

        contract = new web3.eth.Contract(abi,address);


        var lid = "<?php echo $list_id ?>";
        var cat = "<?php echo $category ?>";
        var title = "<?php echo $title ?>";
        var target = "<?php echo $target ?>";
        ethereum.enable();
        web3.eth.getAccounts().then(function(accounts)
        {
          var acc = accounts[0];
          contract.methods.addListing(lid,cat,title,target).send({from: acc})
  					.on('transactionHash', function(hash){
              addHash(lid,cat,title,hash);
  				})
        })

    </script>

    <?php

  }

  if (isset($_GET["removelisting"]) && isset($_GET["lid"])) {
    $lid = $_GET["lid"];
    $sql = "DELETE from listings where listing_ID='$lid' and fk_email='$email'";
    echo $sql;
    $conn->query($sql);
    header("Location: Manageposts.php");
  }

  if (isset($_GET["donation-txn"])) {
    $amt = (int)$_POST["donation-amt"];
    $lid = $_GET["lid"];
    $to_email = $_GET["email"];
    $from_email = $_SESSION["useremail"];
    $target = (int)$_GET["target"];
    $reached = (int)$_GET["reached"];
    $uname = $_GET["uname"];
    $listing_from_NGO = 0;
    $completed = "Reached beneficiary";
    $dtime = date("Y-m-d h:i:s");

    $sql = "SELECT * from listings where listing_ID='$lid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row["fromNGO"]!=NULL) {
      $listing_from_NGO = 1;
      $completed = "Not reached end beneficiary";
    }



    if ($listing_from_NGO == 1) {
      $otp = mt_rand(100000, 999999);
      $sql = "INSERT into donations(fk_listing,from_email,to_email,amount,success,otp,date_time) values('$lid','$from_email','$to_email','$amt','NO','$otp','$dtime')";
      $conn->query($sql);
    }else{
      $sql = "INSERT into donations(fk_listing,from_email,to_email,amount,success,date_time) values('$lid','$from_email','$to_email','$amt','YES','$dtime')";
      $conn->query($sql);
    }



    $alert_for_ben = "You have recieved Rs.".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amt)." from ".$_SESSION["uname"];
    $sql = "INSERT into alerts(email,alert) values('$to_email','$alert_for_ben')";
    $conn->query($sql);

    $alert_for_sender = "You Donated Rs.".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amt)." to ".$uname;
    $sql = "INSERT into alerts(email,alert) values('$from_email','$alert_for_sender')";
    $conn->query($sql);

    if($reached+$amt>$target){
      $sql = "update listings set reached='YES' where listing_ID='$lid'";
      $conn->query($sql);
    }
    include("loader.php");


    ?>
    <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.22/dist/web3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">

    function addHash(lid,from,to,amt,dtime,hash) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          window.location.replace("details.php?amt="+amt+"&listing="+lid);
        }
      };
      xmlhttp.open("GET", "addhash.php?donation=1&lid="+lid+"&from="+from+"&to="+to+"&amt="+amt+"&hash="+hash+"&dtime="+dtime, true);
      xmlhttp.send();
    }

      var contract;
      web3 = new Web3(web3.currentProvider);
      var address = "0x38fDCc7Ff970869723e742a1248329762449F700";
      var abi = [
	{
		"constant": true,
		"inputs": [],
		"name": "getDonation",
		"outputs": [
			{
				"name": "lid",
				"type": "int256"
			},
			{
				"name": "from_email",
				"type": "string"
			},
			{
				"name": "to_email",
				"type": "string"
			},
			{
				"name": "amt",
				"type": "int256"
			},
			{
				"name": "stat",
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
				"name": "lid",
				"type": "int256"
			},
			{
				"name": "from_email",
				"type": "string"
			},
			{
				"name": "to_email",
				"type": "string"
			},
			{
				"name": "amt",
				"type": "int256"
			},
			{
				"name": "stat",
				"type": "string"
			}
		],
		"name": "makeDonation",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	}
];

        contract = new web3.eth.Contract(abi,address);


        var lid = "<?php echo $lid ?>";
        var from = "<?php echo $from_email ?>";
        var to = "<?php echo $to_email ?>";
        var amt = "<?php echo $amt ?>";
        var stat = "<?php echo $completed ?>";
        var dtime = "<?php echo $dtime ?>";
        ethereum.enable();
        web3.eth.getAccounts().then(function(accounts)
        {
          var acc = accounts[0];
          contract.methods.makeDonation(lid,from,to,amt,stat).send({from: acc})
  					.on('transactionHash', function(hash){
              addHash(lid,from,to,amt,dtime,hash);
  				})
        })

    </script>
    <?php
  }



  if (isset($_GET["report"])) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="Dappforcharity_report.csv"');

    $user_CSV[0] = array('ID of listing', 'Title', 'Category',"Amount donated","Date");

    $sql = "SELECT * FROM donations d,listings l where l.listing_ID=d.fk_listing and d.from_email='$email'";
    $result = $conn->query($sql);
    $flag = 1;
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $user_CSV[$flag] = array($row["listing_ID"],$row["title"],$row["category"],$row["amount"],date("d F Y h:i A e",strtotime($row["date_time"])));
        $flag = $flag + 1;
      }
    }


    $fp = fopen('php://output', 'wb');
    foreach ($user_CSV as $line) {
        // though CSV stands for "comma separated value"
        // in many countries (including France) separator is ";"
        fputcsv($fp, $line, ',');
    }
    fclose($fp);
  }
?>
