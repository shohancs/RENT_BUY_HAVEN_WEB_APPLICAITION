<?php
session_start();

    // Retrieve the GET parameters
    $price = isset($_GET['price']) ? $_GET['price'] : null;
    $pak = isset($_GET['pak']) ? $_GET['pak'] : null;
    $email = isset($_GET['email']) ? $_GET['email'] : $_SESSION['email']; // Use session email if not in GET

    // Check if the parameters are present
    if ($price === null || $pak === null || $email === null) {
        echo "Missing required parameters!";
        exit;
    }

    // Calculate the renewal date (30 days from today)
    $renewal_date = date('Y-m-d', strtotime('+30 days'));

    // Prepare the data for SSLCOMMERZ API
    $post_data = array();
    $post_data['store_id'] = "shoha67631ea4e1170";
    $post_data['store_passwd'] = "shoha67631ea4e1170@ssl";
    $post_data['total_amount'] = $price;
    $post_data['currency'] = "BDT";
    $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
    $post_data['success_url'] = "http://localhost/project/PROPERTY_RENTAL/success.php?price=" . urlencode($price) . "&pak=" . urlencode($pak) . "&email=" . urlencode($email); // Pass parameters to success.php
    $post_data['fail_url'] = "http://localhost/project/PROPERTY_RENTAL/fail.php";
    $post_data['cancel_url'] = "http://localhost/project/PROPERTY_RENTAL/cancel.php";

    // Additional customer and shipping info
    $post_data['cus_name'] = "Test Customer";
    $post_data['cus_email'] = $email;
    $post_data['cus_add1'] = "Dhaka";
    $post_data['cus_add2'] = "Dhaka";
    $post_data['cus_city'] = "Dhaka";
    $post_data['cus_state'] = "Dhaka";
    $post_data['cus_postcode'] = "1000";
    $post_data['cus_country'] = "Bangladesh";
    $post_data['cus_phone'] = "01711111111";
    $post_data['ship_name'] = "testshohac4gx";
    $post_data['ship_add1'] = "Dhaka";
    $post_data['ship_add2'] = "Dhaka";
    $post_data['ship_city'] = "Dhaka";
    $post_data['ship_state'] = "Dhaka";
    $post_data['ship_postcode'] = "1000";
    $post_data['ship_country'] = "Bangladesh";

    // Send request to SSLCOMMERZ API
    $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $direct_api_url);
    curl_setopt($handle, CURLOPT_TIMEOUT, 30);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($handle, CURLOPT_POST, 1);
    curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE);  // Keep it false if running locally

    $content = curl_exec($handle);
    $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

    if ($code == 200 && !(curl_errno($handle))) {
        curl_close($handle);
        $sslcommerzResponse = $content;
    } else {
        curl_close($handle);
        echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
        exit;
    }

    // Parse the JSON response
    $sslcz = json_decode($sslcommerzResponse, true);

    if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
        // Redirect the user to the payment gateway
        echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
        exit;
    } else {
        echo "JSON Data parsing error!";
    }
?>
