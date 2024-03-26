<?php
//###########################################################
session_start();
include('connection.php');
$sql1 ="SELECT * FROM payment where pid='" . $_GET['fee_payment_id'] . "'";
$qsql1 = mysqli_query($connection,$sql1);
$rs1 = mysqli_fetch_array($qsql1);
?>
	<!-- register -->
	<div class="register-sec-w3l" id="register">
		<div class="container table table-bordered">


<div bgcolor="#f6f6f6" style="color: #333; height: 60%; width: 100%;" height="100%" width="100%" id="print_receipt">
	<br><br>
    <table bgcolor="#f6f6f6" cellspacing="0" style="border-collapse: collapse; padding: 40px; width: 100%;" >
        <tbody>
            <tr>
                <td width="5px" style="padding: 0;"></td>
                <td bgcolor="#FFFFFF" style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                    <table width="100%" style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
                        <tbody>
                            <tr>
                                <td width="30%" style="padding: 20px;"><img src="../images/logo.png" style="height: 60px;width: 200px;"></img></td>
                                <td align="right" width="70%" style="padding: 20px;"><?php echo "Pune Youth Club in Pune 244, Bhandarkar Rd Deccan Gymkhana Pune - 411004"; ?>,<br><?php echo "power123@gmail.com" ?>,<br> <?php echo "9422267122" ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="padding: 0;"></td>
                <td width="5px" style="padding: 0;"></td>
            </tr>
            <tr>
                <td width="5px" style="padding: 0;"></td>
                <td bgcolor="#FFFFFF" style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                    <table width="100%" style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
                        <tbody>
                            <tr>
                                <td width="50%" style="padding: 20px;">
<b>Date :</b> <?php echo date("d-m-Y",strtotime($rs1['payment_date'])); ?><strong style="color: #333; font-size: 26px;">
<br>
                                	<!--₹<?php echo $rs1['total_amt']; ?></strong> Paid</td>-->
                                <td align="right" width="50%" style="padding: 20px;"><b>Name - </b> <?php echo $rs1['uname']; ?><br>
    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="padding: 0;"></td>
                <td width="5px" style="padding: 0;"></td>
            </tr>
            <tr>
                <td width="5px" style="padding: 0;"></td>
                <td style="border: 1px solid #000; border-top: 0; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                    <table cellspacing="0" style="border-collapse: collapse; border-left: 1px solid #000; margin: 0 auto; max-width: 600px;width: 500px;">
                        <tbody>
                            <tr>
                                <td valign="top"  style="padding: 20px;">
                                    <h3
                                        style="
                                            border-bottom: 1px solid #000;
                                            color: #000;
                                            font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
                                            font-size: 18px;
                                            font-weight: bold;
                                            line-height: 1.2;
                                            margin: 0;
                                            margin-bottom: 15px;
                                            padding-bottom: 5px;
                                        "
                                    >
                                        Summary
                                    </h3>
                                    <table cellspacing="0" style="border-collapse: collapse; margin-bottom: 40px;width: 500px;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 5px 0;">Total Amount</td>
                                                <td align="right" style="padding: 5px 0;">₹<?php echo $rs1['total_amt']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 5px 0;">Paid Amount</td>
                                                <td align="right" style="padding: 5px 0;">₹<?php echo $rs1['total_amt']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">Balance Amount</td>
                                                <td align="right" style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">₹<?php echo $rs1['total_amt'] - $rs1['total_amt']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <b>Thank you for the Payment...</b>
                                    
            
</table>
        </tbody>
    </table>
    </div	
     <br>			
    <center><button class="btn btn-info" onclick="print_receipt('print_receipt')" >Print Receipt</button></center>
    <h2>You Will Get Connection Within 15 Days!!!<h2>

			</div>
			
		</div>
	</div>
	<!-- //register -->
<script>
	function print_receipt(divName)
	{
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	}
</script>


<style>
    /* Overall styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f6f6f6;
        color: #333;
    }

    /* Receipt container */
    .container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        border: 1px solid #000;
    }

    /* Header section */
    .header {
        background-color: #f9f9f9;
        border-bottom: 1px solid #eee;
        padding: 20px;
        text-align: center;
    }

    .header img {
        height: 60px;
        width: 200px;
    }

    /* Receipt details section */
    .receipt-details {
        padding: 20px;
    }

    .receipt-details table {
        width: 100%;
        border-collapse: collapse;
        color: #999;
    }

    .receipt-details table td {
        padding: 5px 0;
    }

    /* Summary section */
    .summary {
        border-left: 1px solid #000;
        padding: 20px;
        width: 500px;
        margin: 0 auto;
    }

    .summary h3 {
        color: #000;
        font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
        font-size: 18px;
        font-weight: bold;
        line-height: 1.2;
        margin: 0;
        margin-bottom: 15px;
        padding-bottom: 5px;
        border-bottom: 1px solid #000;
    }

    .summary table {
        width: 500px;
        margin-bottom: 40px;
        border-collapse: collapse;
    }

    .summary table td {
        padding: 5px 0;
    }

    .summary table td:last-child {
        text-align: right;
    }

    .summary table td:first-child {
        border-bottom: 2px solid #000;
        border-top: 2px solid #000;
        font-weight: bold;
    }

    /* Print button */
    .print-button {
        text-align: center;
        margin-top: 20px;
    }
</style>
