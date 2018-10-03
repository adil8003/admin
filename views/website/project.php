<?php
$this->title = Yii::t('app', 'Project List ');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Request Customer Project 
                    <!--<form><input type="text" onblur="seacrhCustomer();" name="search" id="search" placeholder="Enter location"></form>-->
                    <span>
<!--                        <div class="btn-group pull-right">
                            <a href="index.php?r=crm/add" type="button" class="btn btn-info btn-wd btn-fill btn-xs ">Add Customer</a>
                            <a href="index.php?r=crm/callnow" type="button" class="btn btn-info btn-wd btn-fill btn-xs ">Call Now</a>
                            <a href="index.php?r=crm/inactivecustomer" type="button" class="btn btn-info btn-wd btn-fill btn-xs">Inactive Customer</a>
                        </div>-->
                    </span>
                </h4>
                <hr>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped" id="tblProject">
                        <thead>
                        <th>I,am</th>
                        <th>For</ th>
                        <th>Area Sqft</th>
                        <th>Price</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <!--<th>Action</th>-->
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card" style="padding: 5px;">
                <div class="card shadow" id="customerDetails">

                </div>
            </div>
        </div>

    </div>
</div> 
<script src="js/website/project.js"></script>
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button{
             box-sizing: border-box;
    display: inline-block;
    min-width: 1.5em;
    margin-left: 2px;
    text-align: center;
    text-decoration: none !important;
    cursor: pointer;
    *cursor: hand;
    color: #333 !important;
    border: 1px solid transparent;
    border-radius: 2px;
    }
    .cus-data{
        color: #100e0e;
        font-family: sans-serif;
        background-color: #47525d66;
    }
    .shadow{-webkit-box-shadow:  -18px 17px 9px -17px rgba(212,26,26,1);
            -moz-box-shadow: -18px 17px 9px -17px rgba(212,26,26,1);
            box-shadow: -16px 16px 7px -17px rgba(212,26,26,1);
            /*height: 20px !important;*/
            min-height: 100px;
            margin: 14px;
            padding: 6px;
            word-wrap: break-word;
    }
     .dataTables_length{
        display: none;
    }
</style>