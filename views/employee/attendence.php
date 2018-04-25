<?php
$this->title = Yii::t('app', 'Employee');
?>
<!-- Nav Bar- start-->
<div class="container">
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li class="nav-item">
            <a class="nav-link" href="#attendence" role="tab" data-toggle="tab" aria-controls="Attendence">Attendence</a>
        </li>
    </ul>
    <!-- Nav Bar- start-->

    <div class="tab-content">
        <div class="dropdown  pull-right">
            <button class="btn btn-default dropdown-toggle" type="button" id="currMonth" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <?php echo date('M Y'); ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <?php
                $currMonth = (int) date('n');
                for ($i = 1; $i <= $currMonth; $i++) {
                    echo '<li onClick="getAttn(' . date('Ym') . ')" ><a href="#">' . date('M Y') . '</a></li>';
                }
                ?>
            </ul>
        </div>
        <div role="tabpanel" class="tab-pane active" id="attendence"> <!-- /tab-panel -list -->
            <h2>Attendence</h2>

            <div id="graph">
            </div>
        </div> <!-- /tab-panel list -->
    </div><!-- /tab-content -->

</div> <!-- /container -->
<script type="text/javascript">
    $(document).ready(function() {
        var attnData = <?php echo $jsonAttendence; ?>;
        window.a = attnData;
        $('#myTab a:first').tab('show');
        var chart = Morris.Bar({
            element: 'graph',
            data: attnData,
            xkey: 'date',
            ykeys: ['duration'],
            labels: ['Duration'],
            barColors: function(row) {
                var colr = '#FFF';
                $.each(a, function(k, v) {
                    if (v.date == row.label) {
                        colr = v.color;
                    }
                });
                return [colr];
            },
        });
        window.chart = chart;
    }); // end document.ready
    function getAttn(m) {
        $('#currMonth').html('Jan 2016');
        var obj = new Object();
        obj.m = m;
        $.ajax({
            url: 'index.php?r=employee/getattendencebymonth',
            async: false,
            data: obj,
            type: 'POST',
            success: function(data) {
                data = JSON.parse(data);
                if (data.status == true) {
                    window.a = data.jsonAttendence;
                    chart.setData(data.jsonAttendence);
                }

            }
        });
    }

</script>
