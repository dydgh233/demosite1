<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      font-family: Arial;
      font-size: 17px;
      padding: 8px;
    }

    * {
      box-sizing: border-box;
    }

    .row {
      display: -ms-flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
    }

    .col-25 {
      -ms-flex: 25%;
      /* IE10 */
      flex: 25%;
    }

    .col-50 {
      -ms-flex: 50%;
      /* IE10 */
      flex: 50%;
    }

    .col-75 {
      -ms-flex: 75%;
      /* IE10 */
      flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }

    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }

    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196F3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }

      .col-25 {
        margin-bottom: 20px;
      }
    }
  </style>
</head>

<body>

  <?php
  require '../util/dbconfig_remind2.php';
  require_once '../util/loginchk.php';
  $c_id = $_GET['c_id'];
  $m_id = $_GET['m_id'];

  ?>
  <h2>중고차 구매</h2>
  <p>Resize the browser window to see the effect. When the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other.</p>
  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="buy_process.php" method="POST">

          <div class="row">
            <div class="col-50">
              <h3>구매자 정보</h3>
              <input type="hidden" name="m_id" value="<?=$m_id?>">
              <input type="hidden" name="c_id" value="<?=$c_id?>">
              <label for="fname"><i class="fa fa-user"></i> 이름</label>
              <input type="text" name="o_name" placeholder="이름">
              <label for="email"><i class="fa fa-envelope"></i> 이메일</label>
              <input type="text" name="o_email" placeholder="이메일">
              <label for="adr"><i class="fa fa-address-card-o"></i> 주소</label>
              <input type="text" name="o_adress" placeholder="주소 예:청주시 흥덕구 ..">
              <label for="city"><i class="fa fa-institution"></i> 주민등록번호</label>
              <input type="text" name="o_number" placeholder="주민등록번호">
              <input type="hidden" name="regtime">

              <div class="row">
                <div class="col-50">

                </div>
                <div class="col-50">

                </div>
              </div>
            </div>

            <div class="col-50">
              <h3>Payment</h3>
              <label for="fname">카드</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>

              <label for="cname">카드이름</label>
              <input type="text" name="o_cardname" placeholder="이름">
              <label for="ccnum">Credit card number</label>
              <input type="text" name="o_cardnumber" placeholder="1111-2222-3333-4444">

              <div class="row">
                <div class="col-50">

                </div>
                <div class="col-50">

                </div>
              </div>
            </div>

          </div>
          <label>
            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
          </label>
          <input type="submit" value="Continue to checkout" class="btn">
        </form>
      </div>
    </div>


  </div>

</body>

</html>