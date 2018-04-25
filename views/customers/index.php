<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Customers */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Customers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Customers',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<table id="customers" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>DOB</th>
                <th>Status</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>DOB</th>
                <th>Reg. Date</th>
            </tr>
        </tfoot>
 
        <tbody>
			<?php
				foreach($model AS $row){
					echo '<tr>';
					echo '<th><a href="index.php?r=customers/view&id='.$row->id.'" >'.$row->name.'</a></th>';
					echo '<th>'.$row->email.'</th>';
					echo '<th>'.$row->phone.'</th>';
					echo '<th>'.$row->address.'</th>';
					echo '<th>'.date('d-M-Y', strtotime($row->dob)).'</th>';
					echo '<th>'.date('d-M-Y', strtotime($row->regDate)).'</th>';
					echo '</tr>';
				}
			?>
		</tbody>
    </table>
	
	<script>
	   $(document).ready(function() {
    $('#customers').dataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
	
	</script>
</div>
