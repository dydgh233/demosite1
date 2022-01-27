<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/sytle_buy">
</head>
<body>

<h2>중고차 구매</h2>
<p>Resize the browser window to see the effect. When the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other.</p>
<div class="row">
  <div class="col-75">
    <div class="container">
    <form action="buy_process.php" method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>구매자 정보</h3>
            
            <label for="fname"><i class="fa fa-user"></i> 이름</label>
            <input type="text" id="fname" name="o_name" placeholder="이름">
            <label for="email"><i class="fa fa-envelope"></i> 이메일</label>
            <input type="text" id="email" name="o_email" placeholder="이메일">
            <label for="adr"><i class="fa fa-address-card-o"></i> 주소</label>
            <input type="text" id="adr" name="o_adress" placeholder="주소 예:청주시 흥덕구 ..">
            <label for="city"><i class="fa fa-institution"></i> 주민등록번호</label>
            <input type="text" id="city" name="o_number" placeholder="주민등록번호">
            
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
            <input type="text" id="cname" name="cardname" placeholder="이름">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            
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
