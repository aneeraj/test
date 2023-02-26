<?php
  include("islogged.php");
  include("connection.php");

  if (isset($_GET["sendotp"],$_GET["d_id"])) {
    $d_id = $_GET["d_id"];
    $sql = "SELECT * from donations d,listings l where d.fk_listing=l.listing_ID and d.d_ID='$d_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $otp = $row["otp"];
    $title = $row["title"];
    $amt = $row["amount"];
    $to = explode("*#", $row["beneficiary_id"]);

    $sql2 = "SELECT sum(amount) as recieved from donations where d_ID='$d_id' and success='YES'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $recieved = $row2["recieved"];
    if ($recieved=="") {
      $recieved = 0;
    }
    $recieved = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $recieved);

    $to = $to[0];
    $subject = "Dapp for charity: OTP verification for listing (".$title.")";

    $message = "
    <html>
    <head>
    <title>OTP from DApp for charity</title>
    </head>
    <body>
    <h3>Hey there!</h3>
    <p>You have recieved this mail in order to verify the cash benefit you recieved from the NGO with E-mail ".$row["fromNGO"]." who posted a request on your behalf.</p>
    <p>Kindly verify the following details</p>
    <h4>OTP for verification:".$otp." </h4>
    <table border>
      <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Target amount</th>
        <th>Amount recieved till now</th>
        <th>Amount in this installment</th>
      </tr>
      <tr>
        <td>".$title."</td>
        <td>".$row["category"]."</td>
        <td>Rs.".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$row["target"])."</td>
        <td>Rs.".$recieved."</td>
        <td>Rs.".preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,",$amt)."</td>
      </tr>
    </table>
    <p>Thank you.</p>

    </body>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: dappforcharity@gmail.com' . "\r\n";

    if (mail($to,$subject,$message,$headers)) {
      echo "OTP sent successfully. Please enter it to verify";
    }else{
      echo "There was a problem sending the OTP";
    }
  }

  if (isset($_GET["verify_otp"],$_GET["d_ID"])) {
    $d_id = $_GET["d_ID"];
    $otp_recieved = $_POST["otp"];
    $sql = "SELECT * from donations where d_ID='$d_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $ngomail = $row["to_email"];
    $otp = $row["otp"];

    $lid = $row["fk_listing"];
    $from = $row["from_email"];
    $to = $row["to_email"];
    $amt = $row["amount"];
    $hash2 = $row["hash"];
    $stat = "Reached end user through NGO ".$_SESSION["uname"];

    if ($ngomail==$_SESSION["useremail"] && $otp_recieved==$otp) {
      $sql = "update donations set success='YES' where d_ID='$d_id'";
      $conn->query($sql);
      $addr = "approve.php?s=1";
      include("loader.php");

      ?>
      <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.22/dist/web3.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript">

      function addHash(did,hash) {
        console.log("Inside call");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            window.location.replace("details.php?amt="+amt+"&listing="+lid);
          }
        };
        xmlhttp.open("GET", "addhash.php?verified_donation=1&did="+did+"&hash="+hash, true);
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
          var from = "<?php echo $from ?>";
          var to = "<?php echo $to ?>";
          var amt = "<?php echo $amt ?>";
          var stat = "<?php echo $stat ?>";
          var did = "<?php echo $d_id ?>";
          ethereum.enable();
          web3.eth.getAccounts().then(function(accounts)
          {
            var acc = accounts[0];
            contract.methods.makeDonation(lid,from,to,amt,stat).send({from: acc})
    					.on('transactionHash', function(hash){
                console.log("Inside method");
                addHash(did,hash);
    				})
          })

      </script>
      <?php

    }

  }
?>
