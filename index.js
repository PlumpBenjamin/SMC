// const LogBtn = document.getElementById("sign-in-button");
// LogBtn.addEventListener("click", function() {visitsigninPage();});

function visithomePage(){
  window.location = 'index.html'
}

// const guestBtn = document.getElementById("guest-button");
// guestBtn.addEventListener("click", function() {visithomePage();});

function gotologin(){
  window.location = 'login.html'
}
			
// Used to load jpeg file in post.html
var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
};

// Should check database for account details that matched with entered details, not setup yet. Can be found in login.html
function Correctlogindetails() {
  var theemail = document.getElementById('email').value;
  var password = document.getElementById('password').value;
  if (theemail == "benjaminnamayandeh@gmail.com" && thepassword == "testpassword1") {
    signedin();
    break;
  }
  else {
    window.alert("Wrong email and/or password")
    break;
  }
}

// if 'Sign in as Guest' button is clicked leads to index.html
let guestBtn = document.getElementById("guest-button");
guestBtn.addEventListener("click", function() {visithomePage();});

function visitregisterPage(){
  window.location('register.html');
}


// Let's register button lead to register.html
const regBtn = document.getElementById("register-button");
regBtn.addEventListener("click", function() {
        visitregisterPage();
      });

// Makes display box in post.html disappear once image file is accepted
function postedPhoto() {
  document.getElementById('image-box-plus"').style.display = none;
}