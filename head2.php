<?php

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex">
        <title>Core Committee</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>-->

        <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.css">

    <style>
       [ng\:cloak], [ng-cloak], .ng-cloak {
         display: none;
       }
       </style>
    </head>
<body ng-app="HeadEmail" ng-controller="AngularEmailController as angCtrl" ng-cloak>
  <div class="container col-md-6 col-md-offset-3">
      <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <div class="panel panel-info" >
                  <div class="panel-heading">
                      <div class="panel-title">Add Core Committee</div>

                  </div>

                  <div style="padding-top:30px" class="panel-body" >
                      <form name="email" type="form-control" ng-submit="angCtrl.emailForm()" class="form-horizontal" method="POST" novalidate>

                          <div style="margin-bottom: 25px" class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                      <input type="email" id="inputemail" class="form-control" placeholder="Enter a Partner Head Email" ng-model="angCtrl.inputData.email" ng-required="true">
				  <span>{{angCtrl.inputData.email}}</span>					
						  </div>

                          <div style="margin-bottom: 25px" class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                      <input type="email" id="inputemail2" class="form-control" placeholder="Enter a training excellence Email" ng-model="angCtrl.inputData.email2" ng-required="true">
				  <span>{{angCtrl.inputData.email2}}</span>
			      </div>

                          <div style="margin-bottom: 25px" class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                      <input type="email" id="inputemail3" class="form-control" placeholder="Enter a delivery head Email" ng-model="angCtrl.inputData.email3" ng-required="true">
				  <span>{{angCtrl.inputData.email3}}</span>
			      </div>
                          <div class="form-group">
                              <!-- Button -->
                              <div class="col-sm-12 controls">
                                  <button type="submit" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-plus"></i> Add</button>
                              </div>
                          </div>
                              <div class="alert alert-danger" ng-show="errorMsg">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                      ×</button>
                                  <span class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;{{errorMsg}}
                              </div>
                          </form>
                      </div>
                  </div>
      </div>
  </div>
    <!-- Application Dependencies -->
    <script src="node_modules/api-check/dist/api-check.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="node_modules/angular-formly/dist/formly.js"></script>
    <script src="node_modules/angular-formly-templates-bootstrap/dist/angular-formly-templates-bootstrap.js"></script>


<script>
	angular.module('HeadEmail', [])
	.controller('AngularEmailController', ['$scope', '$http', function($scope, $http) {
		this.emailForm = function() {

			var user_data='partner_head=' +this.inputData.email+'&training_excellence='+this.inputData.email2+'&delivery_head='+this.inputData.email3;

			$http({
				method: 'POST',
				url: 'save_core_committee.php',
				data: user_data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.success(function(data) {
        console.log(data);
				alert("Success");
			})
		}

	}]);
	</script>


    </body>
</html>
