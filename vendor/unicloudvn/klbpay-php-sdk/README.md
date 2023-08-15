# KLBPay-PHP-SDK

Thư viện người dùng tích hợp KLBPay vào hệ thống thanh toán của Merchant

# PHP
Github: [https://github.com/unicloudvn/KLBPay-PHP-SDK.git](https://github.com/unicloudvn/KLBPay-PHP-SDK.git)

##  **Cài đặt và sử dụng**

### **Requirements**
Phiên bản PHP: từ 7.2 trở lên.
Ngoài ra cần một số extension của php như php-oauth.

Ví dụ cài đặt trên Linux

```shell
sudo install php-oauth
```

hoặc

```shell
sudo install php<version>-oauth
sudo install php7.2-oauth

```

### **Composer**

Để cài đặt các ràng buộc bằng [Composer](https://getcomposer.org/). Làm theo  [hướng dẫn cài đặt](https://getcomposer.org/doc/00-intro.md) nếu bạn chưa cài đặt Composer.


Chạy dòng lệnh:
```shell
composer require unicloudvn/klbpay-php-sdk
```

Kiểm tra phần sau ở file composer.json:
```json
{
  "require": {
        "unicloudvn/klbpay-php-sdk": "^1.0"
    }
}
```

Cuối cùng, hãy chắc chắn đã bao gồm autoloader:

```php
require_once '/path/to/your-project/vendor/autoload.php';
``` 



### **Cài đặt thủ công:**

Bước 1. Tải thư mục sdk vào dự án của bạn.

Bước 2. cd đến vị trí thư mục composer.json của sdk. Chạy commandLine: `composer install`.


## **Cách sử dụng:**



### **Imports**

```php
require_once '/path/to/your-project/vendor/autoload.php';
```

### **Constants**

```php
const HOST = '<HOST_URL>'; //'https://api-staging.kienlongbank.co/pay'
const CLIENT_ID = '<YOUR_CLIENT_ID>';
const SECRET_KEY = '<YOUR_SECRET_KEY>';
const ENCRYPT_KEY = '<YOUR_ENCRYPT_KEY>';
const ACCEPT_TIME_DIFF = '<YOUR_ACCEPT_TIME_DIFF>';
```

### **Configure**

```php
$kPayPacker = new KPayPacker(
    CLIENT_ID,
    ENCRYPT_KEY,
    SECRET_KEY,
    ACCEPT_TIME_DIFF,
    HOST
);

$payClient = new KPayClient($kPayPacker);
```

## **Ví dụ cơ bản**
Trong dự án của bạn:

Bước 1. Tạo thư mục `/assets` -> tạo các files:
- Bootstrap v3.3.4 - `bootstrap.min.css`.
- jQuery v1.11.3 - `jquery-1.11.3.min.js`.
- Jumbotron-narrow - `jumbotron-narrow.css`:

```css
/* Space out content a bit */
body {
    padding-top: 20px;
    padding-bottom: 20px;
}

/* Everything but the jumbotron gets side spacing for mobile first views */
.header,
.marketing,
.footer {
    padding-right: 15px;
    padding-left: 15px;
}

/* Custom page header */
.header {
    padding-bottom: 20px;
    border-bottom: 1px solid #e5e5e5;
}

/* Make the masthead heading the same height as the navigation */
.header h3 {
    margin-top: 0;
    margin-bottom: 0;
    line-height: 40px;
}

/* Custom page footer */
.footer {
    padding-top: 19px;
    color: #777;
    border-top: 1px solid #e5e5e5;
}

/* Customize container */
@media (min-width: 768px) {
    .container {
        max-width: 970px;
    }
}

.container-narrow > hr {
    margin: 30px 0;
}

/* Main marketing message and sign up button */
.jumbotron {
    text-align: center;
    border-bottom: 1px solid #e5e5e5;
}

.jumbotron .btn {
    padding: 14px 24px;
    font-size: 21px;
}

/* Supporting marketing content */
.marketing {
    margin: 40px 0;
}

.marketing p + h4 {
    margin-top: 28px;
}

/* Responsive: Portrait tablets and up */
@media screen and (min-width: 768px) {
    /* Remove the padding we set earlier */
    .header,
    .marketing,
    .footer {
        padding-right: 0;
        padding-left: 0;
    }

    /* Space out the masthead */
    .header {
        margin-bottom: 30px;
    }

    /* Remove the bottom border on the jumbotron for visual effect */
    .jumbotron {
        border-bottom: 0;
    }
}

.pay-success {
    color: blue;
}

.pay-unsuccess {
    color: black;
}

.pay-error {
    color: red;
}

.footer {
    text-align: center
}

/* Pager */
.pager {
    margin: 8px 3px;
    padding: 3px;
}

.pager .disabled {
    border: 1px solid #ddd;
    color: #999;
    margin-top: 4px;
    padding: 3px;
    text-align: center;
}

.pager .current {
    background-color: #6ea9bf;
    border: 1px solid #6e99aa;
    color: #fff;
    font-weight: bold;
    margin-top: 4px;
    padding: 3px 5px;
    text-align: center;
}

.pager span, .pager a {
    margin: 4px 3px;
}

.pager a {
    border: 1px solid #aaa;
    padding: 3px 5px;
    text-align: center;
    text-decoration: none;
}
```

Bước 2. Tạo index.php trên thư mục root của dự án.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Test Transaction</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap.min.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="assets/jquery-1.11.3.min.js"></script>
</head>

<body>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted text-center">KLBPAY DEMO</h3>
    </div>
    <h3>Tạo mới giao dịch</h3>
    <div class="table-responsive">
        <form action="CreateTransaction.php" id="create_form" method="post">
            <div class="form-group">
                <label for="refTransactionId">Mã giao dịch</label>
                <input class="form-control" id="refTransactionId" name="refTransactionId" type="text"
                       value="<?php try {
                           print random_int(100000, 999999);
                       } catch (Exception $e) {
                           error_log($e->getMessage());
                       } ?>"/>
            </div>
            <div class="form-group">
                <label for="amount">Số tiền</label>
                <input class="form-control" id="amount"
                       name="amount" type="number" value="10000"/>
            </div>

            <div class="form-group">
                <label for="title">Nội dung thanh toán</label>
                <textarea class="form-control" cols="20" id="title" name="description"
                          rows="2">Noi dung thanh toan</textarea>
            </div>

            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input class="form-control" id="title"
                       name="title" type="text" value="Thanh toán hóa đơn tiền điện"/>
            </div>

            <div class="form-group">
                <label for="timeout">timeout</label>
                <input class="form-control" id="timeout"
                       name="timeout" type="number" value="10000"/>
            </div>

            <div class="form-group">
                <label for="language">Ngôn ngữ</label>
                <select name="language" id="language" class="form-control">
                    <option value="vn">Tiếng Việt</option>
                    <option value="en">English</option>
                </select>
            </div>

            <div class="form-group">
                <h3>Thông tin khách hàng</h3>
            </div>
            <div class="form-group">
                <label for="fullName">Họ tên (*)</label>
                <input class="form-control" id="fullName"
                       name="fullName" type="text" value="NGUYEN VAN XO"/>
            </div>

            <div class="form-group">
                <label for="email">Email (*)</label>
                <input class="form-control" id="email"
                       name="email" type="text" value="xonv@KLBPAY.vn"/>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại (*)</label>
                <input class="form-control" id="phone"
                       name="phone" type="text" value="0934998386"/>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ (*)</label>
                <input class="form-control" id="address"
                       name="address" type="text" value="22 Lang Ha"/>
            </div>

            <button type="submit" class="btn btn-primary" id="btnPopup">Tạo giao dịch</button>
            <button type="button" onclick="window.location.href='query.php'" name="redirect" id="redirect"
                    class="btn btn-default">Kiểm tra giao dịch</button>
        </form>
    </div>
    <p>
        &nbsp;
    </p>
    <footer class="footer">
        <p>&copy; KLBPAY <?php echo date('Y') ?></p>
    </footer>
</div>


</body>
</html>
```
### **Tạo giao dịch**:

```php
$response = $pay_client->createTransaction($request);
```

Bước 3. Tạo `CreateTransaction.php` file:

```php
<?php

use src\transaction\model\CustomerInfo;
use src\transaction\request\CreateTransactionRequest;

require 'kpay-php-sdk/vendor/autoload.php';
include_once 'Config.php';

// Input data
$tnx_ref = $_POST['ref_transaction_id'];
$amount = $_POST['amount'];
$desc = $_POST['description'];
$timeout = $_POST['timeout'];
$title = $_POST['title'];
$language = $_POST['language'];
$full_name = $_POST['full_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];

$success_url = 'https://success.example.com.vn';
$fail_url = 'https://fail.example.com.vn';
$redirect_after = 5;
$bank_account_no = "";

$customer_info = new CustomerInfo($full_name, $email, $phone, $address);

$request = new CreateTransactionRequest(
    $tnx_ref,
    $amount,
    $desc,
    $timeout,
    $title,
    $language,
    $customer_info,
    $success_url,
    $fail_url,
    $redirect_after,
    $bank_account_no // hệ thống chọn tài khoản mặc định trong trường hợp null
);

try {
    if (!empty($pay_client)) {
        $response = $pay_client->createTransaction($request);
        header('Location: ' . $response->getUrl());
    }
} catch (Exception $e) {
    error_log($e->getMessage());
}
```

### **Kiểm tra giao dịch** (tương tự):

```php
$order_id = $_POST["order-id"];

$checkRequest = new QueryTransactionRequest($order_id);

$response = $pay_client->checkTransaction($checkRequest);
```

### **Hủy giao dịch** (tương tự):

```php
$order_id = $_POST["order-id"];

$cancelRequest = new CancelTransactionRequest($order_id);

$response = $pay_client->cancelTransaction($cancelRequest);
```

Bước cuối: Chạy dòng lệnh the php built-in web server
```shell
php -S localhost:8000
```

Sau đó, mở trình duyệt truy cập đến host và port đã chỉ định (Ví dụ bên trên, [http://localhost:8000](http://localhost:8000) ).

### **Callback thanh toán** (Webhook):

Thông báo giao dịch:

```php
use src\security\SecurityUtil;

require 'vendor/autoload.php';
include_once 'config.php';


/* Payment Notify
 * IPN URL: Ghi nhận kết quả thanh toán từ KLBPay
 * $response_data -> Giá trị 'data' từ Request body  
 * $encrypt_key -> ENCRYPT_KEY
 * $decrypt_data -> Giá trị data sau khi decryptAES (JSON String)
 */
$decrypt_data = SecurityUtil::decryptAES($response_data, $encrypt_key)
// Kiểm tra giao dịch và trả về giá trị bool $status (true or false)
echo json_encode(['status' => $status]);
```


## **Author**

[dev@unicloud.com.vn](#)
