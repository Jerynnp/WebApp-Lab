<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  //ส่วนของการสร้างฟอร์ม
    <form method="POST" action="">
        <label for="uname">Enter your name:</label>
        <input type="text" name="uname" pattern="[A-Za-z\s]{1,}" required><br>   //ตรงregex {1,} คือinput ต้องมีจำนวน1หรือมากกว่า
        <label for="utell">Enter your phone:</label>
        <input type="tel" name="utell" required><br>
        <label for="ulist">Enter numbers for average calculation (comma-separated):</label>
        <input type="text" name="ulist" pattern="[0-9\s,]{1,}"><br>      
        <input type="submit" value="Submit">
    </form>
    <?php
    //ถ้าrequest method = POST ให้ทำ
     if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $uname = $_POST["uname"];       //นำค่าในelementที่มีname="uname" มาใส่ในตัวแปร$uname 
        $utell = $_POST["utell"]; 
        echo "<hr>" ;      //ตีเส้นแนวนอน
        echo "<b>"."answer:"."</B>"."<br>" ;        //เผื่อลืมฮะ . มันทำหน้าที่เหมือน + ในภาษาอื่น ๆ
        echo "Name: $uname"."<br>";      //ใน " " ในตัวแปรเข้าไปแสดงผลได้เลย
        echo "Phone: $utell"."<br>";
       //ส่วนของฟังก์ชัน 
       //การคำนวณหาค่าเฉลี่ยน ใช้ผลรวม หารด้วย จำนวนข้อมูล
       function callavg(){
        $ulist = $_POST["ulist"]; 
        $foravg = explode(",", $ulist);        //explodeมีหน้าที่เหมือนกับsplit ในภาษาอื่น ๆ เมื่อexplodeเสร็จเอามาใส่ในตัวแปร$foravg ซึ่งจะเป็นตัวแปรประเภทarray
        $result=0;           //สร้างตัวแปรขึ้นมาเพื่อเก็บผลรวม             
        $count=0;         //สร้างตัวแปรขึ้นมาเพื่อนับจำนวนข้อมูล
         //วิธีการวนหาข้อมูลในarrayแบบง่าย ๆ
        foreach ($foravg as $iavg) {    //$foravg คือarrayที่เราแยก , ออกมา สว่น$iavg คือตัวแปรที่เราสร้างขึ้นใหม่เพื่อวนในarray
            $count+=1;       //ให้บวกตัวนับเพิ่มแต่ละรอบ       
            $result+=$iavg ;   //หาผลรวม
        }
        return $result/$count;  //returm ค่า ผลรวมส่วนด้วยจำนวนข้อมูลออกกลับไป
    }         

        echo "Average number:". callavg();   //เรียกใช้ฟังก์ชัน
}
    ?>
</body>
 
