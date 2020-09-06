<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bienvenido a Alimentapp</i></h1>

<p>¡Lleva aquí la cuenta de lo que comes diariamente, comaprte tus dietas con tus amigos o hazte un influencer gastronómico!</p>

<canvas id="myChart" width="400" height="200"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['<?php
                $ingests = Ingest::model()->findAll(array('order'=>'votes DESC'));
                echo User::model()->findAll("id = {$ingests[0]->user_id}")[0]->email ?>',
            '<?php echo User::model()->findAll("id = {$ingests[1]->user_id}")[0]->email ?>',
            '<?php echo User::model()->findAll("id = {$ingests[2]->user_id}")[0]->email ?>',
            '<?php echo User::model()->findAll("id = {$ingests[3]->user_id}")[0]->email ?>',
            '<?php echo User::model()->findAll("id = {$ingests[4]->user_id}")[0]->email ?>'
            ],
            datasets: [{
                label: 'Comidas más votadas',
                data: [<?php echo $ingests[0]->votes ?>, <?php echo $ingests[1]->votes ?>, <?php echo $ingests[2]->votes ?>,
                <?php echo $ingests[3]->votes ?>, <?php echo $ingests[4]->votes ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>