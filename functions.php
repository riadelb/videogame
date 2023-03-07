
<?php
function get_my_post($jeu_id)
{
    global $connection;

    //REQUETE QUI VA RECUPERER TOUS LES INFOS DES ID
    $query =  "SELECT note.`note_media`, note.`note_utilisateur`, jeu.`*`, restriction_age.`label`, restriction_age.`image_path` AS pegi
    FROM jeu 
    INNER JOIN note ON jeu.`note_id` = note.`id`
    INNER JOIN restriction_age ON jeu.`age_id` =  restriction_age.`id`
    WHERE jeu.`id` = $jeu_id ";

    //REQUETE 
    $query_by_id = "SELECT console.id, console.`label` AS console FROM jeu 
                        INNER JOIN game_console ON jeu.`id` = game_console.`jeu_id`
                        INNER JOIN console ON game_console.`console_id` = console.`id` 
                        WHERE jeu.`id` = $jeu_id
                        ";

    //on prepare la requete
    $stmt_by_id = mysqli_prepare($connection, $query);
    $stmt_by_id_two = mysqli_prepare($connection, $query_by_id);



    // on execute
    mysqli_stmt_execute($stmt_by_id);

    //on récupere les résultats
    $res = mysqli_stmt_get_result($stmt_by_id);
    $result = [];
    // on affiche les résultats
    while ($data = mysqli_fetch_assoc($res)) {
        $result = $data;
        mysqli_stmt_execute($stmt_by_id_two);
        $resu = mysqli_stmt_get_result($stmt_by_id_two);
        while ($data2 = mysqli_fetch_assoc($resu)) {
            $type_console[] = $data2['console'];
        }

        $result['console'] = $type_console;
        my_post($result);
    }
}

?>