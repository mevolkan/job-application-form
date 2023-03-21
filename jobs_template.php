<h1><?php echo $title; ?></h1>
    <ul>
    <?php foreach ($jobs as $job): ?>
        <li><?php echo $job['role_name'][0]; ?></li>
    <?php endforeach; ?>
    </ul>