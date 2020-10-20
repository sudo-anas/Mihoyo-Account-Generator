<html>
<head>
    <title>MIHOYO ACCOUNT GENERATOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<script>
function getKey() {
    var mihoyouser = $('#mihoyo_username').val();
    var mihoyopass = $('#mihoyo_password').val();
    var mihoyocount = $('#banyak').val();
  if (mihoyouser == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","GenAcc.php?u="+mihoyouser+"&p="+mihoyopass+"&c="+mihoyocount,true);
    xmlhttp.send();
  }
}
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h2 class="text-center">MIHOYO ACCOUNT GENERATOR v2 with Ajax Jquery</h2>
  <div class="row justify-content-center">
    <div class="col-12 col-md-12 col-lg-12">
          <div class="card border-primary rounded-0">
              <div class="card-header p-0">
                 <div class="bg-info text-white text-center py-2">
                     <h3><i class="fa fa-cog"></i> GENERATOR</h3>
                          <p class="m-0">GENSHIN IMPACT</p>
                  </div>
              </div>
            <div class="card-body p-3">
              <div class="form-group">
                 <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                    </div>
                        <input type="text" class="form-control" id="mihoyo_username" name="mihoyo_username" placeholder="MIHOYO USERNAME" required>
                 </div>
              </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-lock text-info"></i></div>
                    </div>
                    <input type="text" class="form-control" id="mihoyo_password" name="mihoyo_password" placeholder="MIHOYO PASSWORD" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-cog text-info"></i></div>
                    </div>
                    <input type="text" class="form-control" id="banyak" name="banyak" placeholder="Banyaknya" value="2" required>
                </div>
            </div>
            <div class="text-center">
              <input type="submit" value="GENERATOR" onclick="getKey()" class="btn btn-info btn-block rounded-0 py-2">
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
            <div id="txtHint"><b>Result info will be listed here...</b></div>
</body>
</html>
