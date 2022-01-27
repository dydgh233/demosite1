
<?php
require_once "../util/utility.php";
require_once '../util/loginchk.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style_login.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div class="loginlink">
            <?php
            if (!$chk_login) {  // 로그인 상태가 아니라면
            ?>
                <button id='trglgnModal'>login</button>
                
                <div id='lgnModal' class='modal'>
                   
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form action="../remind2/login_process.php" method="POST" class="loginbox">
                            <label for="username"><b>ID</b></label><input type="text" name="m_id" placeholder="ID를 입력하세요." required />
                            <label for="passwd"><b>Password </label><input type="password" name="m_password" placeholder=" password를 입력하세요." required />
                            <button type=submit>로그인</button><br>
                            <label>
                                <input type="checkbox" value="yes" name="chkbox">Remember me
                            </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                        </form>

                    </div>
                    
                </div>
                
            <?php
            } else {
                echo $_SESSION['m_id']; ?>
                <button?><a href="./logout.php">logout</a></button>
                <?php
            } 
                ?>
        </div>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">회원가입</button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/remind2/insert_process.php" method="POST">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>ID</b></label>
      <input type="text" placeholder="ID" name="m_id" required>
      <label for="email"><b>비밀번호</b></label>
      <input type="text" placeholder="password" name="m_password" required>
      <label for="email"><b>이메일</b></label>
      <input type="text" placeholder="이메일" name="m_email" required>

      <label for="psw"><b>이름</b></label>
      <input type="text" placeholder="이름" name="m_name" required>

      <label for="psw-repeat"><b>주소</b></label>
      <input type="text" placeholder="주소" name="adress" required>

      <label for="psw-repeat"><b>주민등록번호</b></label>
      <input type="text" placeholder="주민등록번호" name="number" required>

      <label for="psw-repeat"><b>폰번호</b></label>
      <input type="text" placeholder="핸드폰번호" name="phone" required>
      <label for="psw-repeat"><b>카드이름</b></label>
      <input type="text" placeholder="카드이름" name="m_cardname" required>
      <label for="psw-repeat"><b>카드번호</b></label>
      <input type="text" placeholder="카드번호" name="m_cardnumber" required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>
<script src='../js/login.js'></script>

</body>
</html>