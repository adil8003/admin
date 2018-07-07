<?php
$this->title = Yii::t('app', 'Dashboard');
?>

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
                                            <p> your Organisations</p>
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
                                            <p>Selected course</p>
                                            5
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Course  </h4>
                                <p class="category">Last Performance</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-pie" style="width: 100%; height: 100%;"><g class="ct-series ct-series-c"><path d="M235,5A117.5,117.5,0,0,0,191.364,13.403L235,122.5Z" class="ct-slice-pie" ct:value="6"></path></g><g class="ct-series ct-series-b"><path d="M191.745,13.251A117.5,117.5,0,0,0,154.865,208.434L235,122.5Z" class="ct-slice-pie" ct:value="32"></path></g><g class="ct-series ct-series-a"><path d="M154.566,208.154A117.5,117.5,0,1,0,235,5L235,122.5Z" class="ct-slice-pie" ct:value="62"></path></g><g><text dx="289.6243685459348" dy="144.12731747022482" text-anchor="middle" class="ct-label">62%</text><text dx="177.29062401968952" dy="111.49134776808874" text-anchor="middle" class="ct-label">32%</text><text dx="223.99134776808862" dy="64.79062401968955" text-anchor="middle" class="ct-label">6%</text></g></svg></div>

                                    <div class="chart-legend">
<!--                                        <i class="fa fa-circle text-info"></i> Performance high
                                        <i class="fa fa-circle text-danger"></i> Performance high
                                        <i class="fa fa-circle text-warning"></i> Performance high-->
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <!--<i class="ti-timer"></i> Campaign sent 2 days ago-->
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Course status</h4>
                                <p class="category">All course</p>
                            </div>
                            <div class="content">
                                <div id="chartActivity" class="ct-chart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="245px" class="ct-chart-line" style="width: 100%; height: 245px;"><g class="ct-grids"><line y1="210" y2="210" x1="50" x2="455" class="ct-grid ct-vertical"></line><line y1="182.14285714285714" y2="182.14285714285714" x1="50" x2="455" class="ct-grid ct-vertical"></line><line y1="154.28571428571428" y2="154.28571428571428" x1="50" x2="455" class="ct-grid ct-vertical"></line><line y1="126.42857142857143" y2="126.42857142857143" x1="50" x2="455" class="ct-grid ct-vertical"></line><line y1="98.57142857142857" y2="98.57142857142857" x1="50" x2="455" class="ct-grid ct-vertical"></line><line y1="70.71428571428572" y2="70.71428571428572" x1="50" x2="455" class="ct-grid ct-vertical"></line><line y1="42.85714285714286" y2="42.85714285714286" x1="50" x2="455" class="ct-grid ct-vertical"></line><line y1="15" y2="15" x1="50" x2="455" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M50,114.729C55.625,114.682,72.5,113.429,83.75,114.45C95,115.471,106.25,127.218,117.5,120.857C128.75,114.496,140,82.461,151.25,76.286C162.5,70.111,173.75,87.196,185,83.807C196.25,80.418,207.5,40.768,218.75,55.95C230,71.132,241.25,160.089,252.5,174.9C263.75,189.711,275,156.05,286.25,144.814C297.5,133.579,308.75,115.657,320,107.486C331.25,99.314,342.5,104.514,353.75,95.786C365,87.057,376.25,68.346,387.5,55.114C398.75,41.882,415.625,22.846,421.25,16.393" class="ct-line"></path><line x1="50" y1="114.72857142857143" x2="50.01" y2="114.72857142857143" class="ct-point" ct:value="542"></line><line x1="83.75" y1="114.45" x2="83.76" y2="114.45" class="ct-point" ct:value="543"></line><line x1="117.5" y1="120.85714285714286" x2="117.51" y2="120.85714285714286" class="ct-point" ct:value="520"></line><line x1="151.25" y1="76.28571428571428" x2="151.26" y2="76.28571428571428" class="ct-point" ct:value="680"></line><line x1="185" y1="83.80714285714286" x2="185.01" y2="83.80714285714286" class="ct-point" ct:value="653"></line><line x1="218.75" y1="55.94999999999999" x2="218.76" y2="55.94999999999999" class="ct-point" ct:value="753"></line><line x1="252.5" y1="174.9" x2="252.51" y2="174.9" class="ct-point" ct:value="326"></line><line x1="286.25" y1="144.81428571428572" x2="286.26" y2="144.81428571428572" class="ct-point" ct:value="434"></line><line x1="320" y1="107.48571428571428" x2="320.01" y2="107.48571428571428" class="ct-point" ct:value="568"></line><line x1="353.75" y1="95.78571428571429" x2="353.76" y2="95.78571428571429" class="ct-point" ct:value="610"></line><line x1="387.5" y1="55.11428571428573" x2="387.51" y2="55.11428571428573" class="ct-point" ct:value="756"></line><line x1="421.25" y1="16.39285714285714" x2="421.26" y2="16.39285714285714" class="ct-point" ct:value="895"></line></g><g class="ct-series ct-series-b"><path d="M50,201.643C55.625,198.718,72.5,191.057,83.75,184.093C95,177.129,106.25,168.539,117.5,159.857C128.75,151.175,140,137.711,151.25,132C162.5,126.289,173.75,128.982,185,125.593C196.25,122.204,207.5,116.168,218.75,111.664C230,107.161,241.25,103.725,252.5,98.571C263.75,93.418,275,85.293,286.25,80.743C297.5,76.193,308.75,73.407,320,71.271C331.25,69.136,342.5,69.693,353.75,67.929C365,66.164,376.25,64.632,387.5,60.686C398.75,56.739,415.625,46.989,421.25,44.25" class="ct-line"></path><line x1="50" y1="201.64285714285714" x2="50.01" y2="201.64285714285714" class="ct-point" ct:value="230"></line><line x1="83.75" y1="184.09285714285716" x2="83.76" y2="184.09285714285716" class="ct-point" ct:value="293"></line><line x1="117.5" y1="159.85714285714286" x2="117.51" y2="159.85714285714286" class="ct-point" ct:value="380"></line><line x1="151.25" y1="132" x2="151.26" y2="132" class="ct-point" ct:value="480"></line><line x1="185" y1="125.59285714285714" x2="185.01" y2="125.59285714285714" class="ct-point" ct:value="503"></line><line x1="218.75" y1="111.66428571428571" x2="218.76" y2="111.66428571428571" class="ct-point" ct:value="553"></line><line x1="252.5" y1="98.57142857142857" x2="252.51" y2="98.57142857142857" class="ct-point" ct:value="600"></line><line x1="286.25" y1="80.74285714285713" x2="286.26" y2="80.74285714285713" class="ct-point" ct:value="664"></line><line x1="320" y1="71.27142857142857" x2="320.01" y2="71.27142857142857" class="ct-point" ct:value="698"></line><line x1="353.75" y1="67.92857142857142" x2="353.76" y2="67.92857142857142" class="ct-point" ct:value="710"></line><line x1="387.5" y1="60.68571428571428" x2="387.51" y2="60.68571428571428" class="ct-point" ct:value="736"></line><line x1="421.25" y1="44.25" x2="421.26" y2="44.25" class="ct-point" ct:value="795"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="215" width="33.75" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Jan</span></foreignObject><foreignObject style="overflow: visible;" x="83.75" y="215" width="33.75" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Feb</span></foreignObject><foreignObject style="overflow: visible;" x="117.5" y="215" width="33.75" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Mar</span></foreignObject><foreignObject style="overflow: visible;" x="151.25" y="215" width="33.75" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Apr</span></foreignObject><foreignObject style="overflow: visible;" x="185" y="215" width="33.75" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Mai</span></foreignObject><foreignObject style="overflow: visible;" x="218.75" y="215" width="33.75" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Jun</span></foreignObject><foreignObject style="overflow: visible;" x="252.5" y="215" width="33.75" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Jul</span></foreignObject><foreignObject style="overflow: visible;" x="286.25" y="215" width="33.75" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Aug</span></foreignObject><foreignObject style="overflow: visible;" x="320" y="215" width="33.75" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Sep</span></foreignObject><foreignObject style="overflow: visible;" x="353.75" y="215" width="33.75" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Oct</span></foreignObject><foreignObject style="overflow: visible;" x="387.5" y="215" width="33.75" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Nov</span></foreignObject><foreignObject style="overflow: visible;" x="421.25" y="215" width="33.75" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 34px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Dec</span></foreignObject><foreignObject style="overflow: visible;" y="182.14285714285714" x="10" height="27.857142857142858" width="30"><span class="ct-label ct-vertical ct-start" style="height: 28px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">200</span></foreignObject><foreignObject style="overflow: visible;" y="154.28571428571428" x="10" height="27.857142857142858" width="30"><span class="ct-label ct-vertical ct-start" style="height: 28px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">300</span></foreignObject><foreignObject style="overflow: visible;" y="126.42857142857142" x="10" height="27.857142857142854" width="30"><span class="ct-label ct-vertical ct-start" style="height: 28px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">400</span></foreignObject><foreignObject style="overflow: visible;" y="98.57142857142857" x="10" height="27.85714285714286" width="30"><span class="ct-label ct-vertical ct-start" style="height: 28px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">500</span></foreignObject><foreignObject style="overflow: visible;" y="70.71428571428572" x="10" height="27.857142857142847" width="30"><span class="ct-label ct-vertical ct-start" style="height: 28px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">600</span></foreignObject><foreignObject style="overflow: visible;" y="42.85714285714286" x="10" height="27.85714285714286" width="30"><span class="ct-label ct-vertical ct-start" style="height: 28px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">700</span></foreignObject><foreignObject style="overflow: visible;" y="15" x="10" height="27.85714285714286" width="30"><span class="ct-label ct-vertical ct-start" style="height: 28px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">800</span></foreignObject><foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" style="height: 30px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">900</span></foreignObject></g></svg></div>

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
    </div>
</div>
