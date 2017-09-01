<!-- index.html -->
<?php

//var_dump($_POST);

?>
<!DOCTYPE html>
<html>
<head>
    <title>angular-formly</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.css">

    <style>
       [ng\:cloak], [ng-cloak], .ng-cloak {
         display: none;
       }
       </style>


</head>
<body ng-app="formlyApp" ng-controller="MainController as vm" ng-cloak>

    <div class="container col-md-6 col-md-offset-3">
	<form ng-submit="vm.onSubmit()" name="vm.partnerForm" method="POST" novalidate>
		<h1>Partner Registrations</h1>
		<formly-form model="vm.partner" fields="vm.partnerFields" form="vm.partnerForm" options="vm.options">
			<button type="submit" class="btn btn-primary submit-button" ng-disabled="vm.partnerForm.$invalid">Submit</button> <!--action here-->
       <button type="button" class="btn btn-default" ng-click="vm.options.resetModel()">Reset</button>
		</formly-form>
	</form>
 

    </div>
	<script type="text/ng-template" id="repeatSection.html">
      <div>
      	<!--loop through each element in model array-->
      	<div class="{{hideRepeat}}">
          <div class="repeatsection" ng-repeat="element in model[options.key]" ng-init="fields = copyFields(to.fields)">
            <formly-form fields="fields"
                         model="element"
                         form="form">
            </formly-form>
            <!--div style="margin-bottom:20px;">
              <button type="button" class="btn btn-sm btn-danger" ng-click="model[options.key].splice($index, 1)">
                Remove
              </button>
            </div>
            <hr-->
        </div>
        <p class="AddNewButton">
  	      <button type="button" class="btn btn-primary" ng-click="addNew()" >{{to.btnText}}</button>
        </p>
      </div>
    </script>


</body>

    <!-- Application Dependencies -->
    <script src="node_modules/api-check/dist/api-check.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="node_modules/angular-formly/dist/formly.js"></script>
    <script src="node_modules/angular-formly-templates-bootstrap/dist/angular-formly-templates-bootstrap.js"></script>

    <!-- Application Scripts -->
    <script src="app.js"></script>
    <script src="scripts/MainController.js"></script>
    <script src="scripts/province.js"></script>
	<script src="scripts/partnerMetaData.js"></script>
</html>
