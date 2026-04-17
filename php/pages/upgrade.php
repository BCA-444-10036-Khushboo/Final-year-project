<?php
session_start();
require("../db.php");

if(!isset($_SESSION['login_email'])){
    die("User not logged in");
}

$user_email = $_SESSION['login_email'];
$user_sql   = "SELECT * FROM members WHERE user_email = '$user_email'";
$user_res   = $db->query($user_sql);
$user_data  = $user_res->fetch_assoc();

$name   = $user_data['full_name'];
$plan   = $user_data['plans'];
$p_status = " ";

// Plan status check
if($plan != "free"){
    $ed = $user_data['expiry_date'];
    $cd = date('Y-m-d');
    if($ed < $cd){
        $p_status = "deactivate";
    } else {
        $p_status = "activate";
    }
}

// Buttons
$s_btn='<button class="btn btn-secondary w-50 buy" plan="silver" amount="170">&#8377;170 / Month</button>';
$g_btn='<button class="btn btn-secondary w-50 buy" plan="gold" amount="320">&#8377;320 / Month</button>';
$p_btn='<button class="btn btn-secondary w-50 buy" plan="premium" amount="500">&#8377;500 / Month</button>';

// Current plan disable logic
if($plan=="silver" && $p_status=="activate"){
    $s_btn='<button class="btn btn-secondary w-50 buy disabled" plan="silver" amount="170">Current Plan</button>';
}
elseif($plan=="gold" && $p_status=="activate"){
    $g_btn='<button class="btn btn-secondary w-50 buy disabled" plan="gold" amount="320">Current Plan</button>';
}
elseif($plan=="premium" && $p_status=="activate"){
    $p_btn='<button class="btn btn-secondary w-50 buy disabled" plan="premium" amount="500">Current Plan</button>';
}
?>

<div class="row">
<h1 class="text-center mb-5">OUR PLANS</h1>

<div class="col-4 px-5">
    <div class="card shadow" style="background-color:#EAEAEA;border-width:4px;border-radius:12px;">
        <div class="car-body text-center border-0">
            <label class="fs-5 mt04">SILVER</label><br>
            <label class="fs-2">50 GB</label><br><br>
            <?php echo $s_btn; ?>
            <hr>
            <label>50 GB Storage</label><hr>
            <label>24X7 Technical Support</label><hr>
            <label>Data Security</label><hr>
            <label>SEO Services</label><hr>
            <label>Email Support</label><hr>
            <label>Sharing Facility</label><hr>
        </div>
    </div>
</div>

<div class="col-4 px-5">
    <div class="card border-warning shadow" style="background-color:#FFEFD5;border-width:4px;border-radius:12px;">
        <div class="car-body text-center border-0">
            <label class="fs-5 mt04">GOLD</label><br>
            <label class="fs-2">100 GB</label><br><br>
            <?php echo $g_btn; ?>
            <hr>
            <label>100 GB Storage</label><hr>
            <label>24X7 Technical Support</label><hr>
            <label>Data Security</label><hr>
            <label>SEO Services</label><hr>
            <label>Email Support</label><hr>
            <label>Sharing Facility</label><hr>
        </div>
    </div>
</div>

<div class="col-4 px-5">
    <div class="card border-primary shadow" style="background-color:#e8f2ff;border-width:4px;border-radius:12px;">
        <div class="car-body text-center border-0">
            <label class="fs-5 mt04">PREMIUM</label><br>
            <label class="fs-2">500 GB</label><br><br>
            <?php echo $p_btn; ?>
            <hr>
            <label>500 GB Storage</label><hr>
            <label>24X7 Technical Support</label><hr>
            <label>Data Security</label><hr>
            <label>SEO Services</label><hr>
            <label>Email Support</label><hr>
            <label>Sharing Facility</label><hr>
        </div>
    </div>
</div>
</div>

<!-- Razorpay checkout library -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="js/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $(".buy").click(function(){
        var plan = $(this).attr("plan");
        var amt  = $(this).attr("amount");

        $.ajax({
            type: "GET",
            url: "php/create_order.php", // renamed from pay.php
            data: { plan: plan, amt: amt },
            success: function(res) {
                var data = JSON.parse(res);
                if(data.error){
                    alert("Error: " + data.error);
                } else {
                    startPayment(data.order_id, data.amount, plan);
                }
            }
        });
    });
});

function startPayment(orderId, amount, plan) {
    var options = {
        key: "rzp_test_RzmUuiBZ9X9hxL",
        amount: amount,
        currency: "INR",
        name: "My Drive",
        description: "Your Plan Purchase",
        order_id: orderId,
        prefill: {
            name: "<?php echo $name; ?>",
            email: "<?php echo $user_email; ?>",
            contact: "+919876543210"
        },
        theme: { "color": "#3399cc" },
        handler: function (response){
            $.ajax({
                type: "POST",
                url: "php/payment.php", // renamed from payment_success.php
                data: {
                    plan_name: plan,
                    amount: amount,
                    razorpay_order_id: response.razorpay_order_id,
                    razorpay_payment_id: response.razorpay_payment_id
                },
                success: function(res){
                    if(res.trim()=="success"){
                        alert("Payment recorded successfully!");
                        window.location.href = "php/update_plan.php?plan=" + plan;
                    } else {
                        alert("Error: " + res);
                    }
                }
            });
        }
    };
    var rzp = new Razorpay(options);
    rzp.open();

    rzp.on('payment.failed', function (response){
        alert("Payment failed: " + response.error.reason);
    });
}
</script>
