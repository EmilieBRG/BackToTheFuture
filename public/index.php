<?php
/**
 * Created by PhpStorm.
 * User: wilder8
 * Date: 10/06/18
 * Time: 15:15
 */

    require '../src/TimeTravel.php';

    $start = new DateTime('1970-01-01');
    $end = new DateTime('2038-01-19');
    $timeTravel = new TimeTravel($start, $end);
?>

<h1>Back to the future</h1>

<h2>Travel information</h2>

<p>
    <?php
        echo $timeTravel->getTravelInfo();
    ?>
</p>

<h2>Travel information</h2>

<?php
    $start= new DateTime('1985-12-31');
    $interval = new DateInterval('PT1000000000S');
?>
<p>
    Marty, Doc se trouve le
    <?php
        echo $timeTravel->findDate($interval)
    ?>
</p>

<h2>Tableau de bord de la Dolorean</h2>
<?php
    $steps = $timeTravel->backToFutureStepByStep('P1M8D');

?>

<p> Il faut faire le plein de combustible aux dates suivantes
    <ul>
        <?php
        foreach($steps as $step){
            echo '<li>'.$step."</li>";
        }?>
    </ul>
</p>
