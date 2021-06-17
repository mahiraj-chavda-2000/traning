<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10th</title>
</head>

<body>
    <form id="myForm" method="POST">
        <div id="test">
            <button id="btn">+</button>
            <input type="submit" value="save">
        </div>
        <div id="clone" class="MyDiv"></div>
    </form>
    <table>
        <tr>
            <th>
                <button onclick="add()"></button>
            </th>
            <th>

            </th>
        </tr>
        <tbody id="body1">

        </tbody>
    </table>
</body>

</html>
<script type="text/javascript">
    count = 1;
    var btn = document.getElementById("btn");
    btn.onclick = function () {
        count++;
          var text = "";
          var i;
          for (i = 1; i < count; i++) {
              text += "<div class='count'><input type='hidden' name='id[]' id='id_"+i+"' value="+i+" > Number of Members: <input type='text' name='member[]' id='member_"+i+"' >percentage: <input type='text' name='pr[]' id='pr_"+i+"' ><button class='a' onclick='del(this)'>-</button></div></br>";} 
          document.getElementById("clone").innerHTML = text;
    }
    var forms = document.getElementById("myForm");
    forms.addEventListener('submit', function (event) {
        event.preventDefault();
        var totalCloneElem = document.getElementsByClassName('count').length;
        var data = new FormData();
        for (i = 1; i <= totalCloneElem; i++) {
            data.append('id[]', document.getElementById("id_" + i + "").value);
            data.append('member[]', document.getElementById("member_" + i + "").value);
            data.append('pr[]', document.getElementById("pr_" + i + "").value);
        }
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '10.php');
        xhr.onload = function () {
            // console.log(this.response);
        }
        xhr.send(data);
        return false;
    });
    function del(event) {
        count--;
        event.parentNode.remove();

    }

    function add() {
      // count++;
      //   // count = ('table tr').length;
      //   text = "<tr id=" + count + ">" +
      //       " <td>Number of Members: <input type='text' name='member[]' id='member_" + count + "' ></td>" +
      //       " <td> percentage: <input type='text' name='pr[]' id='pr_" + count + "' ></td>" +
      //       "<td>  <button class='a' onclick='del(this)'>-</button></td></tr>";
        const para = document.createElement('p');
        const node = document.createTextNode("This is new.");
        para.appendChild(node);
            // //   document.getElementById('body1').innerHTML = text;
        // var dom = document.getElementById('body1');
        // dom. = text;
        //   // return dom;
        // // let app = document.querySelector('#body1');
        // // app.append(text);
        // // console.log(text);
    }
</script>