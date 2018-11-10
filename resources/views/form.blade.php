<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
#login{
    float:none;
    margin:50px auto;}
</style>
</head>

<body>

<div class="container">
    <div class="row">
        <div id="login" class="col-xs-4">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input  type="text" name="mail" class="form-control" placeholder="Username" />
                </div>
                <div class="form-group">
                    <label>status</label>
                    <input  type="text" name="pass" class="form-control" placeholder="Password" />
                </div>
                <div class="form-group">
                    <label>Anh minh hoa</label>
                    <input type="file" name="img" class="form-control"  />
                </div>
                <!-- <button type="submit" name="sbm" class="btn btn-primary">ATM</button> -->
                <input type="submit" name="sbm" value="ATM">
                {{csrf_field()}}
            </form>
           
        </div>
    </div>
</div>

</body>
</html>
