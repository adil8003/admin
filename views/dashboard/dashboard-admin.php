<?php
$this->title = Yii::t('app', 'Dashboard');
?>
<input type="hidden" id="orgid"  value="<?php // echo $objUserroles->org_id ?>"/>
<div class="row">
    <div class="col-md-12">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card" style="min-height:150px">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-world"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Organisations</p>
                                            30
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="stats">
                                    <i class="ti-reload"></i>new org xyz
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card" style="min-height:150px">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Employees</p>
                                            1,345
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="stats">
                                    <i class="ti-calendar"></i> New employee
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card" style="min-height:150px">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-book"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Courses</p>
                                            25
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="stats">
                                    <i class="ti-timer"></i> new course
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card" style="min-height:150px">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-twitter-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Followers</p>
                                            +45
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated now
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 ">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Stats</h4>
                        <!--<p class="category">Last Performance</p>-->
                    </div>
                    <div class="content">
                        <div class="js-donut-container"></div>

                        <div class="chart-legend">
                            <i class="fa fa-circle text-info"></i> Performance high
                        </div>
                        <hr>
                        <div class="stats">
                            <!--<i class="ti-timer"></i> Campaign sent 2 days ago-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card ">
                    <div class="header">
                        <h4 class="title">Courses</h4>
                        <p class="category">Course by employee</p>
                    </div>
                    <div class="content">
                        <div class="js-bar-container"></div>   

                        <div class="chart-legend">
                            <i class="fa fa-circle text-info"></i> Active employees
                            <i class="fa fa-circle text-warning"></i>Inactive employees
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="ti-check"></i> Data information certified
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="js-bar-container"></div>
                <div class="js-donut-container"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
//        var container = d3Selection.select('.js-chart-container')
//      lineChart = new LineChart();
        getAllCourseStats();
        var data = [
            {name: 'Shiny', id: 1, quantity: 86, percentage: 5},
            {name: 'Blazing', id: 2, quantity: 300, percentage: 18},
            {name: 'Dazzling', id: 3, quantity: 276, percentage: 16},
            {name: 'Radiant', id: 4, quantity: 195, percentage: 11},
            {name: 'Sparkling', id: 5, quantity: 36, percentage: 2},
            {name: 'Other', id: 0, quantity: 814, percentage: 48}
        ];
        function createHorizontalBarChart() {
            let barChart = new britecharts.bar(),
                    margin = {
                        left: 120,
                        right: 20,
                        top: 20,
                        bottom: 30
                    },
                    barContainer = d3.select('.js-bar-container'),
                    containerWidth = barContainer.node() ? barContainer.node().getBoundingClientRect().width : false;

            barChart
                    .isHorizontal(true)
                    .margin(margin)
                    .width(containerWidth)
                    .colorSchema(britecharts.colors.colorSchemas.britecharts)
                    .valueLabel('percentage')
                    .height(300);

            barContainer.datum(data).call(barChart);
        }

        function createDonutChart() {
            let donutChart = britecharts.donut();

            donutChart
                    .width(400)
                    .height(300);

            d3.select('.js-donut-container').datum(data).call(donutChart);

        }

        createHorizontalBarChart();
        createDonutChart();
    }); // end document.ready

    function getAllCourseStats() {
//        var obj = new Object();
//        obj.orgid = $('#orgid').val();
        $.ajax({
            url: 'index.php?r=dashboard/getallcoursestats',
            async: false,
//            data: obj,
            type: 'GET',
            success: function (r) {
                data = JSON.parse(r)
//                  console.log(data);
                    dataLoad(data);
                if (data.data[0].status == true) {
//                  console.log(data.data);
                
                }
            },
            error: function (data) {
                showMessage('danger', 'Please try again.');
            }
        });
    }
</script>
