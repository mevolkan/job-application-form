<?php

/**
 * Template Name: Job Form
 */
get_header(); ?>
<?php
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
// header("Access-Control-Allow-Headers: *");
// header("Access-Control-Allow-Credentials: true");
?>

<?php
if (has_post_thumbnail($post->ID)) :
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
?>
    <div class="inner-banner">
        <img src="<?php echo $image[0]; ?>" alt="" />
    </div>
<?php endif; ?>
<?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
<?php endwhile; // end of the loop. 
?>

<form action="process.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>