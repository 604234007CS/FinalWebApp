<?php
require 'db.php';
$sql = 'SELECT books.BookId,categories.CategoryName,authors.AuthorName,
publishers.PublisherName,books.BookName,books.BookPrice,
books.BookStatus,books.BookNumPages 
FROM books,authors,categories,publishers 
WHERE books.CategoryID=categories.CategoryID 
AND books.AuthorID=authors.AuthorID 
AND books.PublisherID=publishers.PublisherID';



$statement = $connection->prepare($sql);
$statement->execute();
$books = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require 'header.php'; ?>


<div class="container-fluid">
  <div class="card mt-5">
    <div class="card-header">
      <h2>ข้อมูลหนังสือ</h2>
      <a href="addBook.php" class='btn btn-info'>เพิ่มหนังสือ</a>
    </div>
    <div class="card-body"> 
        <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>ชื่อหนังสือ</th>
                            <th>ผู้แต่ง</th>
                            <th>ประเภทหนังสือ </th>
                            <th>สำนักพิมพ์ </th>
                            <th>ราคา</th>
                            <th>สถานะการขาย</th>
                            
                        </tr>
                    </thead>

        <?php foreach($books as $book): ?>
          <tr>
             <!-- สร้างชื่อให้เหมือนในฐานข้อมูล -->
                    <td><?= $book->BookName; ?> </td> 
                    <td><?= $book->AuthorName; ?> </td>
                    <td><?= $book->CategoryName; ?> </td>
                    <td><?= $book->PublisherName; ?> </td>
                    <td><?= $book->BookPrice; ?> </td>
                    <td><?= $book->BookStatus; ?> </td>   
            <td>
              <a href="BookEdit.php?id=<?= $book->BookName ?>" class="btn btn-info">แก้ไข</a>
              <a onclick="return confirm('ต้องการลบหรือไม่?')" 
              href="DeleteBook.php?id=<?= $book->BookID ?>" class='btn btn-danger'>ลบ</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>




<?php require 'footer.php'; ?>
