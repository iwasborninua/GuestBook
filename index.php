<?php

require_once "db_connection.php";

for ($i = 0; $i < 50; $i++)
{
    $title = "title N " . $i;
    $content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet vestibulum velit. Maecenas imperdiet sapien et ipsum facilisis egestas non 
            ac tortor. Quisque tincidunt, nibh quis rhoncus laoreet, dolor justo ultrices nisl, ac ullamcorper enim justo vel turpis. Interdum et malesuada fames ac ante 
            ipsum primis in faucibus. Donec et lobortis nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas 
            fermentum vehicula posuere. Fusce dapibus quis mi ac ullamcorper. Nunc tristique varius maximus. Morbi quis orci fermentum, condimentum ante et, pellentesque 
            quam. Proin aliquam eleifend mollis. Etiam neque augue, ultricies eget eleifend eu, dictum id nisl. ";

    $db = DBConnection::getConnection();

    $query = "INSERT INTO notes VALUES(NULL, ?, ?, NOW())";
    $arr = $db->prepare($query);
    $arr ->execute([$title, $content]);
}

echo "??";