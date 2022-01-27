<?php
$hostname = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($hostname, $username, $password);
if(!$conn->connect_error) {
    echo "<script>alert('DBMS와 연결이 설정되었습니다.')</script>";
} else {
    echo "<script>alert('DBMS와 연결을 설정할 수 없습니다. \\n호스트명, 계정, 비밀번호를 확인해주세요.')</script>";
}
$dbname = "remind2";
$sql="DROP DATABASE IF EXISTS" .$dbname;
$conn->query($sql);
$sql="CREATE DATABASE IF NOT EXISTS".$dbname;
$conn->query($sql);




// Create User
// 먼저, 기존에 존재하는 account가 있으면 삭제하고
$account = $dbname;
$sql = "DROP USER IF EXISTS ".$account;
$conn->query($sql);
// 만들고자하는 이름으로 애플리케이션용 계정을 생성한다.
$sql = "CREATE USER IF NOT EXISTS '" . $account . "'@'%' IDENTIFIED BY '" . $account . "'";
$conn->query($sql);
// 생성된 계정에 리소스 제한 처리하고
$sql = "GRANT USAGE ON *.* TO '".$account."'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0";
$conn->query($sql);
//생성된 계정에 특정 데이터베이스에 대한 권한 부여
$sql = "GRANT ALL PRIVILEGES ON `".$dbname."` .* TO '".$account."'@'%'";
$conn->query($sql);

//명시적으로 현재 사용 DB 선언
$sql = "use " .$dbname;
$conn->query($sql);

// Create Table
// 먼저, 존재하는 테이블이 있으면 삭제하고
$sql = "DROP TABLE IF EXISTS `".$dbname."`.`car` ";
$conn->query($sql);

// 새롭게 테이블 생성
$sql = "CREATE TABLE IF NOT EXISTS `".$dbname."`.`car` (
    `id` INT(6) NOT NULL AUTO_INCREMENT ,
    `c_name` VARCHAR(100) NOT NULL ,
    `size` VARCHAR(100) NOT NULL ,
    `energy` VARCHAR(100) NOT NULL ,
    `price`VARCHAR(100) NOT NULL,
    `model` VARCHAR(100) NOT NULL,
    `c_date` VARCHAR(100) NOT NULL ,
    `uploadfile` VARCHAR(200) NULL COMMENT 'attached file name',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `".$dbname."`.`member` (
    `id` INT(6) NOT NULL AUTO_INCREMENT ,
    `m_name` VARCHAR(100) NOT NULL ,
    `number` VARCHAR(100) NOT NULL ,
    `adress` VARCHAR(100) NOT NULL ,
    `phone`VARCHAR(100) NOT NULL,
    
    PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `".$dbname."`.`tbl_order` (
    `id` INT(6) NOT NULL AUTO_INCREMENT ,
    `m_id` INT(6) NOT NULL ,
    `c_id` INT(6) NOT NULL ,
    
    `regtime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'registration time' ,
    
    PRIMARY KEY (`id`),
    FOREIGN KEY (`m_id`) REFERENCES member(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`c_id`) REFERENCES car(`id`) ON DELETE CASCADE
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";
$conn->query($sql);



?>