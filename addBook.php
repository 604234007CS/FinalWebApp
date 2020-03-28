<?php
require 'db.php';
$message = '';
if (isset($_POST['BookName']) && isset($_POST['Author']) && isset($_POST['Category']) && isset($_POST['Publisher'])
&& isset($_POST['BookDescription']) && isset($_POST['BookPrice']) && isset($_POST['BookStatus']) 
&& isset($_POST['BookISBN']) && isset($_POST['BookNumPages'])){
    $BookName = $_POST['BookName'];
    $AuthorName = $_POST['Author'];
    $Category = $_POST['Category'];
    $Publisher = $_POST['Publisher'];
    $BookDescription = $_POST['BookDescription']; 
    $BookPrice = $_POST['BookPrice']; 
    $BookISBN = $_POST['BookISBN']; 
    $BookStatus = $_POST['BookStatus'];
    $BookNumpages = $_POST['BookNumpages'];

    $sql = "INSERT INTO books(BookName, Author, Category,Publisher, BookDescription, BookPrice, BookStatus, BookISBN, BookNumPages )
    VALUES('$BookName', '$Author', '$Category',$Publisher, '$BookDescription', '$BookPrice', '$BookStatus' , '$BookISBN' , '$BookNumPages')";
    $statement = $connection->prepare($sql);
    if($statement->execute())   {
        $message = 'เพิ่มหนังสือสำเร็จ';
        header("Location: /BookList.php");
    }
}
?>

<?php require 'header.php'; ?>

<div class="container">
  <div class = "card mt-5">
    <div class = "card-header">
    <h2>เพิ่มข้อมูลหนังสือ</h2>
    </div>
    <div class = "card-body">
    <?php if(!empty($message)): ?>
    <div class = "alert alert-success">
    <?= $message; ?>
    </div>
    <?php endif; ?>

      <form method="post">        
        <div class="form-group">
          <label for="">ชื่อหนังสือ</label>
          <input type="text" name="BookName" id="BookName" class="form-control" 
          placeholder = 'กรอกชื่อหนังสือ' required ></div>
        
          <div class="form-group"> 
            <label for="">ผู้เเต่ง</label>
            <select name="Author" id="Author" class="form-control" 
            placeholder = 'ผู้เเต่ง' required >
                <option value="1">Haruki Murakami</option>
                <option value="2">Malcolm Gladwell</option>
                <option value="3">Meg Jay</option>
                <option value="4">นายเเพทย์จางเหวินหง</option>
                <option value="5">Charles Duhigg</option>
                <option value="6">Higashino Keigo</option>
                <option value="7">Matthew Walker</option>
            </select></div>

        <div class="form-group"> 
            <label for="">ประเภทหนังสือ</label>
            <select name="Category" id="Category" class="form-control" 
            placeholder = 'ประเภทหนังสือ' required >
                <option value="1">นิยาย</option>
                <option value="2">จิตวิทยา/พัฒนาตนเอง</option>
                <option value="3">อาหารและสุขภาพ</option>
            </select></div>

       <div class="form-group"> 
            <label for="">สำนักพิมพ์</label>
            <select name="Publisher" id="Publisher" class="form-control" 
            placeholder = 'สำนักพิมพ์' required >
            <option value="1">สำนักพิมพ์กำมะหยี่</option>
            <option value="2">สำนักพิมพ์วีเลิร์น</option>
            <option value="3">สำนักพิมพ์ Amarin Health</option>
            <option value="4">น้ำพุสำนักพิมพ์</option>
            <option value="5">บุ๊คสเคป</option>
            </select></div>
          
        <div class="form-group">
          <label for="">คำอธิบาย</label>
          <input type="text" name="BookDescription" id="BookDescription" class="form-control" placeholder = 'กรอกคำอธิบาย' required ></div>   
       
        <div class="form-group">
          <label for="">ราคา</label>
          <input type="text" name="BookPrice" id="BookPrice" class="form-control" placeholder = 'ราคา' required ></div>
        
        <div class="form-group">
          <label for="">จำนวนหน้า</label>
          <input type="text" name="BookNumpages" id="BookNumpages" class="form-control" placeholder = 'จำนวนหน้า' required ></div>
        
          <div class="form-group">
          <label for="">ISBN</label>
          <input type="text" name="BookISBN" id="BookISBN" class="form-control" placeholder = 'หมายเลข ISBN' required ></div>
        
         <div class="form-check">
            <label for="">สถานะการขาย</label> &nbsp; &nbsp; &nbsp; 
                <input class="form-check-input" type="radio" name="BookStatus" id="exampleRadios1" value="ปกติ" checked required>
                <label class="form-check-label" for="exampleRadios1">ปกติ</label> &nbsp; &nbsp; &nbsp; 

                <input class="form-check-input" type="radio" name="BookStatus" id="exampleRadios2" value="เลิกจำหน่าย" required>
                <label class="form-check-label" for="exampleRadios1">เลิกจำหน่าย</label>
        </div>

        <div class="form-group">
           <button type="submit" class="btn btn-info">เพิ่มหนังสือ</button></div>
      </form>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>