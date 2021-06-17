<?php
    session_start();
    // $_SESSION['count']=null;
    if(isset($_POST['count'])){
            $count = $_SESSION['count'] + 1;
            $_SESSION['count'] = $count; 
    }
    $i = $_SESSION['count'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>10th</title>


</head>
  <form method="post" action="2.php">
            <input type="submit" name="count" value="+" />
            <a href="logout.php">clear</a>
    </form>

  <form id="myForm" method="POST">
    <div id="test">
      <!-- <button id="add" class="a" onclick="inc(this)">+</button> -->
      <input type="submit" value="save">
    </div>
    
    <?php
    
    for ($x = 1; $x <= $i; $x++) {
    ?>
    <div id="clone" class="MyDiv">
        Number of Members: <input type="text" name="member[]" id="member_<?php echo $x;?>" required>
        percentage: <input type="text" name="pr[]" id="pr_<?php echo $x;?>" required>
        <button id="del" class="a" onclick="del(this)">-</button>
    </div>
    <?php
    }
    ?>

  <script>

    var forms = document.getElementById("myForm");
    forms.addEventListener('submit', function (event) {
      event.preventDefault();

      var data = new FormData();
      var totalCloneElem = document.getElementsByClassName('MyDiv').length;
      data.append('member[]', document.getElementsByClassName("MyDiv")[totalCloneElem - 1].querySelector('#member').value);
      data.append('pr[]', document.getElementsByClassName("MyDiv")[totalCloneElem - 1].querySelector('#pr').value);

      var xhr = new XMLHttpRequest();
      xhr.open('POST', '10.php');



      xhr.onload = function () {
        console.log(this.response);
      }
      xhr.send(data);
      return false;



      // console.log("form submited")


    });

    function inc(event) {
      let elem = document.getElementsByClassName("MyDiv")[0];
      let clon = elem.cloneNode(true);
      document.body.appendChild(clon);
      var totalCloneElem = document.getElementsByClassName('MyDiv').length;
      document.getElementsByClassName("MyDiv")[totalCloneElem - 1].querySelector('#member').value = '';
      document.getElementsByClassName("MyDiv")[totalCloneElem - 1].querySelector('#pr').value = '';
    }

    function del(event) {
      // console.log(event.parentNode.remove());
      event.parentNode.remove();
    }

  </script>

</body>

</html>