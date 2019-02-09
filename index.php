<?php

require 'app/init.php';

$articlesQuery = $db->query("SELECT
    articles.id,
    articles.title,
    COUNT(articles_likes.id) AS likes,
    GROUP_CONCAT(users.username SEPARATOR '|') AS liked_by
   
    FROM articles

    LEFT JOIN articles_likes
    ON articles.id = articles_likes.article

    LEFT JOIN users
    ON articles_likes.user = users.id

    GROUP BY articles.id
");

while($row=$articlesQuery->fetch_object()){
    $row->liked_by = $row->liked_by ? explode('|', $row->liked_by) : [];
    $articles[]=$row;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Like Button</title>

<style>
a .material-icons:hover{
    color: #002eff;

}

</style>

</head>
<body>
    <div class="container">
        <?php foreach($articles as $article): ?>
        <div class="article">
            <h3><?php echo $article->title; ?></h3>
           <a href="like.php?type=article&id=<?php echo $article->id; ?>"><i class="small material-icons">thumb_up</i></a>
           <p><?php echo $article->likes; ?> people liked this:</p>
            <?php if(!empty($article->liked_by)): ?>
                <ul>
                    <?php foreach($article->liked_by as $user): ?>
                        <li><?php echo $user; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    
    
    </div>




 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>   
</body>
</html>