<!DOCTYPE html>
<html ng-app="">
<head>
<link rel="stylesheet" href = "http://apps.bdimg.com/libs/bootstrap/3.2.0/css/bootstrap.min.css">
</head>

<body ng-controller="userController">
<div class="container">

<h3>用户列表</h3>

<table class="table table-striped">
  <thead>
    <tr>
      <th>编辑</th>
      <th>名</th>
      <th>姓</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="user in users">
      <td>
        <button class="btn" ng-click="editUser(user.id)">
          <span class="glyphicon glyphicon-pencil"></span>编辑
        </button>
      </td>
      <td><span gn-bind="user.fName"></span></td>
      <td><span gn-bind="user.lName"></span></td>
    </tr>
  </tbody>
</table>

<hr>
<button class="btn btn-success" ng-click="editUser('new')">
<span class="glyphicon glyphicon-user"></span>创建新用户
</button>
<hr>

<h3 ng-show="edit">创建新用户:</h3>
<h3 ng-hide="edit">编辑用户:</h3>

<form class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label">名:</label>
    <div class="col-sm-10">
    <input type="text" ng-model="fName" ng-disabled="!edit" placeholder="名">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">姓:</label>
    <div class="col-sm-10">
    <input type="text" ng-model="lName" ng-disabled="!edit" placeholder="姓">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">密码:</label>
    <div class="col-sm-10">
    <input type="password" ng-model="passw1" placeholder="密码">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">重复密码:</label>
    <div class="col-sm-10">
    <input type="password" ng-model="passw2" placeholder="重复密码">
    </div>
  </div>
</form>

<hr>
<button class="btn btn-success" ng-disabled="error || incomplete">
<span class="glyphicon glyphicon-save"></span>  保存修改
</button>

</div>

<script src= "http://apps.bdimg.com/libs/angular.js/1.2.15/angular.min.js"></script>
<script>
function myUsers(){
$s.users=[{fName:'a',lName:'b'}]

}
</script>

</body>
</html>


