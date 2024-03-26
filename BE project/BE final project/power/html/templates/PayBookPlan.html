<?php
session_start();
include('connection.php');
$dt = date('Y-m-d');
if(isset($_POST['submit'])){
    $userid=$_GET['id'];
	$uname=$_GET['name'];
	$total=$_POST['total'];
     $arrpayment = array('card_holder'=>$_POST['card_holder'],'card_number'=>$_POST['card_number'],'cvv_number'=>$_POST['cvv_number'],'expiry_date'=>$_POST['expiry_date']);
	$serializepmt = serialize($arrpayment);
$query2 = "insert into payment values(null,'$userid','$uname','$dt','$total','$serializepmt')";
$query_run2 = mysqli_query($connection,$query2);
echo mysqli_error($connection);
	if(mysqli_affected_rows($connection) == 1)
	{
		$insid = mysqli_insert_id($connection);
		echo "<script>alert('Fees Payment done successfully...');</script>";
		echo "<script>window.location='payment_receipt.php?fee_payment_id=$insid';</script>";
	}
}
?>
	
	<div class="register-sec-w3l" id="register">
		<div class="container">
			<div class="col-md-10 col-sm-offset-1 book-appointment" >
				<h3>Make Fees payment</h3>
				<form action="" method="post" name="frm" onsubmit="return validateform()">
					<div class="col-md-6 gaps">
						<label>Total Fees Amount  </label>
						<input type="number" style="background: rgb(255 219 219);" readonly name="total"  value=5000 />
					</div>
				
					
					<div class="col-md-12 gaps"><hr></div>

					<div class="col-md-6 gaps">
						<label>Card Holder </label>
						<input type="text" name="card_holder" id="card_holder" />
					</div>

					<div class="col-md-6 gaps">
						<label>Card Number </label>
						<input type="number" name="card_number" id="card_number" pattern="[0-9\s]{13,19}" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" />
					</div>


					<div class="col-md-6 gaps">
						<label>CVV Number </label>
						<input type="number" min="001" max="999" name="cvv_number" id="cvv_number" />
					</div>

					<div class="col-md-6 gaps">
						<label>Card Expires on </label>
						<input type="month" min="<?php echo date("Y-m"); ?>"  name="expiry_date" id="expiry_date"  />
					</div>

					<div class="col-md-12 gaps"><hr></div>
					<div class="col-md-6 col-sm-offset-3 gaps">
						<input type="submit" name="submit" id="submit" value="Click here to Pay Fee">
					</div>
			 	</form>
			</div>
			
		</div>
	</div>
	<script>
function validateform()
{
	if(document.frm.card_holder.value == "")
	{
		alert("Card holder should not be empty..");
		return false;
	}
    else if(document.frm.card_number.value == "")
	{
		alert("Card Number should not be empty..");
		return false;
	
	}
	else if(document.frm.cvv_number.value == "")
	{
		alert("Cvv Number should not be empty..");
		return false;		
	}
	else if(document.frm.expiry_date.value == "")
	{
		alert("Expiry Date Should Not be empty..");
		return false;		
	}
	else
	{
		return true;
	}
}
</script>


<style>
.register-sec-w3l {
  margin-top: 20px;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 0 15px;
}

.book-appointment {
  background-color: #f5f5f5;
  border-radius: 5px;
  padding: 30px;
}

h3 {
  margin-top: 0;
  text-align: center;
  font-size: 24px;
  color: #333;
}

.gaps {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
  color: #555;
}

input[type="number"],
input[type="text"],
input[type="month"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  transition: border-color 0.3s ease;
}

input[type="number"]:focus,
input[type="text"]:focus,
input[type="month"]:focus {
  border-color: #66afe9;
  outline: none;
}

hr {
  border: 0;
  border-top: 1px solid #ddd;
}

input[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #337ab7;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #286090;
}

.error {
  color: red;
  font-size: 12px;
  margin-top: 5px;
}
</style>
