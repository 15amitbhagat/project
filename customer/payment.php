
<?php 
include 'database.php';

session_start();
$fid = $_GET['fid'];
$email=$_SESSION['email'];
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from addfarmer where fid ='$fid' "));
$rows = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from farmer where email='$email' "));

?>
<?php
?>
<form action="https://www.example.com/payment/success/" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_test_sxCOlAwBPuacF7"
    data-amount="<?php echo $row['product_price']*100;  ?>" 
    data-currency="INR"
    data-buttontext="Pay with Razorpay"
    data-name="FarmFood"
    data-description="A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami"
    data-image="<?php echo $row['image'] ?>"
    data-prefill.name="amit Kumar"
    data-prefill.email="<?php echo $rows['email'] ?>"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>