<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOTELS</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php require_once 'process.php'; ?>

  <?php

  if (isset($_SESSION['message'])) : ?>

  <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

    <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
  </div>
  <?php endif ?>


  <?php $mysqli = new mysqli('localhost', 'root', '', 'hotels_project2020-2021') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM hotel_list") or die($mysqli->error);
  ?>


  <table id="customers">
    <thead>
      <tr>
        <th>IMAGE</th>
        <th>HOTEL NAME</th>
        <th>EMAIL</th>
        <th>PHONE NUMBER</th>
        <th>POSTAL CODE</th>
        <th>COUNTRY</th>
        <th>CITY</th>
        <th>RATING</th>
        <th>ID</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>

    <?php while ($row = $result->fetch_assoc()) : ?>
    <tr>
      <td>
        <?php echo "<img src='images/" . $row['image'] . "' id='img_div' ' alt='hotel_imgs\placeholder-image.png'> "; ?>
      </td>
      <td><?php echo $row['hotel_Name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['phone'] ?></td>
      <td><?php echo $row['post'] ?></td>
      <td><?php echo $row['country'] ?></td>
      <td><?php echo $row['city'] ?></td>
      <td><?php echo $row['rating'] ?></td>
      <td><?php echo $row['id'] ?></td>
      <td>
        <a href="index.php?edit=<?php echo $row['id'] ?>" class="edit btns">
          Edit</a>
        <br><br>
        <a href="process.php?delete=<?php echo $row['id'] ?>" class="delete btns">
          Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
  <br>



  <div id="container">
    <div class="form-wrap">
      <h1>Add Hotels Here</h1>

      <form method="POST" action="process.php" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $id; ?>" />

        <div class="form-group">
          <label for="hotel_Name">HOTEL NAME</label>
          <input type="text" value="<?php echo $hotel_Name; ?>" name="hotel_Name" id="hotel_name"
            placeholder="Enter Hotel Name" />
        </div>

        <div class="form-group">
          <label for="email">EMAIL</label>
          <input type="email" value="<?php echo $email; ?>" name="email" id="email" placeholder="Enter Hotel Email" />
        </div>
        <div class="form-group">
          <label for="phone">PHONE NUMBER</label>
          <input type="text" value="<?php echo $phone; ?>" name="phone" id="phone"
            placeholder="Enter Hotel Phone Number" />
        </div>
        <div class="form-group">
          <label for="post">POSTAL CODE</label>
          <input type="post" value="<?php echo $post; ?>" name="post" id="post" placeholder="Enter postal code" />
        </div>

        <div class="form-group">
          <label for="country">COUNTRY</label>
          <input type="text" value="<?php echo $country; ?>" name="country" id="country"
            placeholder="Enter Hotel Country" />
        </div>


        <div class="form-group">
          <label for="city">CITY</label>
          <input type="text" name="city" value="<?php echo $city; ?>" id="city" placeholder="Enter Hotel City" />
        </div>

        <div class="form-group">
          <label for="rating">RATING</label>
          <select id="rating" value="<?php echo $rating; ?>" name="rating" id="rating">
            <option value="unrated" selected>Please Select Rating!!</option>
            <option value="5 Star">5 Star</option>
            <option value="4 Star">4 Star</option>
            <option value="3 Star">3 Star</option>
            <option value="2 Star">2 Star</option>
            <option value="1 Star">1 Star</option>
          </select>
        </div>


        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" value="<?php echo $image; ?>" id="image" />
        </div>


        <div class="form-group">
          <?php
          if ($update == true) :
          ?>
          <button type="submit" name="update" class="btn btn-warning">Update</button>
          <?php else : ?>
          <button type="submit" name="save" class="btn btn-success">Save</button>
          <?php endif; ?>
        </div>

      </form>
    </div>


</body>

</html>