<?php
require_once 'inc/header.php';
require_once 'inc/db.php';

?>
<!-- Page Content -->
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>new Post</h4>
          <h2>add new personal post</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="best-features about-features">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Our Background</h2>
        </div>
      </div>
      <?php
      if (!isset($_GET['id'])) {
        header("location:index.php");
        exit();
      }
      $id = $_GET['id'];
      $query = "SELECT * FROM posts where id = $id";
      $result = mysqli_query($connection, $query);
      $post = mysqli_fetch_assoc($result);
      if (!empty($post)) {
      ?>
        <div class="col-md-6">
          <div class="right-image">
            <img src="assets/images/postImage/<?php echo $post['image']; ?>" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="left-content">
            <h4><?php echo $post['title'] ?></h4>
            <p><?php echo $post['body'] ?></p>
            <?php if (isset($_SESSION['user_id'])): ?>
              <div class="d-flex justify-content-center">
                <a href="editPost.php?id=<?php echo $post['id'] ?>" class="btn btn-success mr-3"> edit post</a>
                <a href="handel/handleDelete.php?php echo $post['id'] ?>" class="btn btn-danger"> delete post</a>
              </div>
            <?php endif; ?>
          </div> <!-- closing left-content div -->
        </div> <!-- closing col-md-6 div -->
      <?php } ?> <!-- closing if (!empty($post)) block -->
    </div> <!-- closing row div -->
  </div> <!-- closing container div -->
</div> <!-- closing about-features div -->

<?php require_once 'inc/footer.php'; ?>
