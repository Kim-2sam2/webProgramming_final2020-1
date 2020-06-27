function addList() {
  var todo = document.getElementsByClassName("todo");
  var text = todo[0].value;
  var textnode = document.createTextNode(text);
  var li = document.createElement("LI");
  var node = document.createElement("DIV");
  var button = document.createElement("BUTTON");
  var list = document.getElementsByClassName("myList");

  var index = list[0].getAttribute("index");
  index = parseInt(index) + 1;
  list[0].setAttribute("index", index);
  li.id = index;

  var max = document.getElementById("max");
  max.value = index;

  var hidden = document.createElement("input");
  hidden.type = "hidden";
  hidden.name = index;
  hidden.value = todo[0].value;

  button.className = "remove";
  button.setAttribute("type", "button");
  button.setAttribute("onclick", "remove(this)");
  button.setAttribute("target", index);
  button.innerHTML = "제거";

  node.appendChild(hidden);
  node.appendChild(textnode);
  li.appendChild(node);
  li.appendChild(button);
  list[0].appendChild(li);
  todo[0].value = "";
}

function remove(x) {
  var feild = x.parentNode;
  document.getElementsByClassName("myList")[0].removeChild(feild);
}

function check_todo(x) {
  var index = x.getAttribute("index");
  var form = document.getElementById(index);
  if (x.checked == true) {
    x.nextElementSibling.style.textDecoration = "line-through";
    form.submit();
  } else {
    x.nextElementSibling.style.textDecoration = "none";
    form.submit();
  }
}
