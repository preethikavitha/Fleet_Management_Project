<html>
  <style>

    .notify{
      position:relative;
    }
    .notify-btn{
margin-right:100px;
margin-top:300px;
float:right;
    }
    .notify-menu{
      overflow:hidden;
      box-shadow:1px 1px 10px rgba(0,0,0,2);
      position:absolute;
      width:200px;
      top:140px;
      right:130px;
      display:none;
    }
    .show{
      display:block;
    }
    .notify-menu li:hover{
      background-color:#ccc;
      cursor:pointer;
      color:white;
    }
    .icon-button{
      position:relative;
      display:flex;
      align-items:center;
      justify-content:center;
      width:50px;
      height:50px;
      color:#333333;
      background:#dddddd;
      border:none;
      outline:none;
      border-radius:50%;
    }
    .icon-button:hover{
      cursor:pointer;
    }
    .icon-button__badge{
      position:absolute;
      top:-10px;
      right:-10px;
      width:25px;
      height:25px;
      background:red;
      color:#ffffff;
      display:flex;
      justify-content:center;
      align-items:center;
      border-radius:50%;
    }
    </style>
<body>
  <div class="notify">
    <div class="notify-btn" id="notify-btn">
      <button type="button" class="icon-button">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
          </svg>
        </span>
        <span class="icon-button__badge" id="show_notify">0</span>
      </button>
    </div>
    <div class="notify-menu" id="notify-menu"></div>
  </div>

  <script>
    const notify_btn = document.getElementById('notify-btn');
    const notify_label = document.getElementById('show_notify');
    const notify_container = document.getElementById('notify-menu');
    let xhr = new XMLHttpRequest();

    function notify_me() {
      xhr.open('GET', 'select.php', true);
      xhr.send();
      xhr.onload = () => {
        if (xhr.status == 200) {
          let get_data = JSON.parse(xhr.responseText);
console.log(get_data);
if(get_data==get_data){

    notify_label.innerHTML=get_data;
}
else{
    notify_btn.innerHTML+=get_data;
}
        }
      }
    }

   
    window.onload = () => {
    notify_me();
    setInterval(() => {
        notify_me();
    }, 1000);
};

    notify_btn.addEventListener('click', (e) => {
      e.preventDefault();
      let type=e.type;
      notify_container.classList.toggle('show');


      xhr.open('GET', 'data.php', true);
      xhr.send();
      notify_container.innerHTML='';
      xhr.onload = function() {
        if (xhr.status == 200) {
          let data = JSON.parse(xhr.responseText);
          data.forEach(message => {
            let li = `<li>${message.msg}</li>`;
            notify_container.innerHTML += li;
          });
        }
      }
    })
  </script>
</body>
</html>
