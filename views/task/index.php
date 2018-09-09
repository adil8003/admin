<?php
$this->title = Yii::t('app', 'Dashboard');
?>
<input type="hidden" id="task"  value="<?php // echo $objUserroles->org_id                    ?>"/>
<input type="hidden" id="listpage" value="1" />
<div class="row">
    <div class="header">
        <h4 class="title">Task</h4>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="stats" id="customerCallList">
                <div class="card shadow">
                    <p></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 card">
            <div id="panel" class="card">
                <form name="form" id="resaleForm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Issues / task</label>
                                <textarea type="text" name="ask"  id="ask"  class="form-control border-input input-sm"
                                          placeholder="Issues/task"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Priority</label>
                                <input type="text" name="priority"  id="priority"  class="form-control border-input input-sm"
                                       placeholder="priority"></input>
                            </div>
                        </div>

                    </div>
                    <div class="text-center">
                        <button type="button" onclick="savelistTask();" class="btn btn-info btn-fill ">Save</button>
                    </div>
                    <div class="clearfix"></div><br>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        ListTask();
    });
    function savelistTask() {
        var obj = new Object();
        obj.ask = $('#ask').val();
        obj.priority = $('#priority').val();
        $.ajax({
            url: 'index.php?r=task/savetask',
            async: false,
            data: obj,
            type: 'POST',
            success: function (data) {
                showMessage('success', 'task added successfully.');
                $('#ask').val();
                $('#priority').val();
                ListTask();
            },
            error: function (data) {
                showMessage('danger', 'Please try again.');
            }
        });
    }
    function ListTask(id) {
        var obj = new Object();
        obj.page = $('#listpage').val();
        $.ajax({
            url: "index.php?r=task/listtask",
            async: false,
            data: obj,
            type: 'GET',
            success: function (data) {
                data = JSON.parse(data);
                if (data.data == '') {
                    $('#notAvailable').html("<h5>Follow up not available </h5>");
                } else {
                    if (data.data[0].status == true) {
                        window.listCourse = data;
                        var htm = '';
                        htm = getCourseHorizontalCard(data);
                        $('#customerCallList').html(htm);

                    }
                }
            }
        });
    }

//follow up layout-
    function searchPage(page) {
        $('#listpage').val(page);
        ListTask();
    }
    function getCourseHorizontalCard(dataAll) {
        dataAll = window.listCourse;
        var intRecords = dataAll.data.length;
        var intRecordsPerpage = 5;
        var intRecordsMaxpage = Math.ceil(dataAll.data.length / intRecordsPerpage);
        var intCurrPage = $('#listpage').val();
        var html = '';

        $.each(dataAll.data, function (k, v) {
            var url = window.location.href;
            var startRecord = (intCurrPage - 1) * intRecordsPerpage;
            var endRecord = intCurrPage * intRecordsPerpage;
            if (startRecord <= k && k < endRecord) {
                html += '<div class="card shadow" >';
                html += '<p class="word-wrap: break-word">' + v.ask + '</p><hr>';
                html += '<p>priority:' + v.priority + ' <span class="pull-right">' + v.addeddate + '</span></p>';
                html += '</div>';
            }
        });

        html += '<div id="pagination">';
        html += '<span class="all-pages">Page ' + intCurrPage + ' of ' + intRecordsMaxpage + '</span>';
        for (var i = 1; i <= intRecordsMaxpage; i++) {
            if (i != intCurrPage) {
                html += '<span onclick="searchPage(' + i + ');" class="page-num">' + i + '</span>';
            } else {
                html += '<span class="current page-num">' + i + '</span>';
            }
        }
        html += '</div><br>';
        return html;
    }
</script>
<style>
    .shadow{-webkit-box-shadow:  -18px 17px 9px -17px rgba(212,26,26,1);
            -moz-box-shadow: -18px 17px 9px -17px rgba(212,26,26,1);
            box-shadow: -16px 16px 7px -17px rgba(212,26,26,1);
            /*height: 20px !important;*/
            min-height: 100px;
            margin: 14px;
            padding: 6px;
            word-wrap: break-word;
    }

</style>

