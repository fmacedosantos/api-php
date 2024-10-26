<title><?php echo $title; ?></title>

<ul>
    <?php foreach($users as $item) {?>
        <li><?php echo $item['email']; ?></li>
        <li><?php echo $item['password']; ?></li>
    <?php } ?>
</ul>