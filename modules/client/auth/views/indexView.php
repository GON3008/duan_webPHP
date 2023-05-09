<?php require "layout/client/header_client.php" ?>
<!----------------------------------------------------------------------------------------------------->
        <!--Đăng nhập-->
        <style>
            h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin-bottom: 20px;
	width: 100%;
}

.containers {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 80%;
	max-width: 100%;
	min-height: 680px;
    margin-left: 12%;
    margin-top: 60px;
    margin-bottom: 60px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.containers.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.containers.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.containers.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background: #87CBB9;
	background: -webkit-linear-gradient(to right, #A3E4DB, #87CBB9);
	background: linear-gradient(to right, #A3E4DB, #87CBB9);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.containers.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.containers.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.containers.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}
        </style>
        <div class="containers" id="container">
        <div class="form-container sign-up-container">
            <form action="/MiuStore/?role=client&mod=auth&action=saveSignUp" method="post">
                <h1>Đăng ký</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <input id="my-login" name="full_name" type="text" placeholder="Họ và tên" />
                <input type="email" id="my-login" name="email" placeholder="Email" />
                <input type="password" id="my-login" name="password" placeholder="Mật khẩu" />
                <input type="password" id="my-login" name="nhaplaipassword" placeholder="Nhập lại mật khẩu"/>
                <input type="phone" maxlength="10" id="my-login" name="numberphone" placeholder="Số điện thoại"/>
                <div class="form-group">
                            <label for="my-login">
                                <input id="my-login" class=""  type="radio" name="gender" value="1">
                                Nam</label>
                                <label for="my-login">
                                    <input id="my-login" class=""  type="radio" name="gender" value="2">
                                    Nữ</label>
                          
                        </div>
                        <div class="form-group">
                        <?php foreach ($notifications as $notification) : ?>
                        <?php foreach ($notification['msgs'] as $msg): ?>
                            <span class="label label-lg label-light-<?php echo $notification['type'] ?> label-inline mb-3"><?php echo $msg ?></span>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                        </div>

                <button id="my-login" type="submit">Đăng ký</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="/MiuStore/?role=client&mod=auth" method="post">
                <h1>Đăng nhập</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span></span>
                <input id="my-login" class="form-control border-bottom"  type="email" name="email" placeholder="Email" required>
                <input id="my-login" class="form-control border-bottom"  type="password" name="password" placeholder="Password">
                <div class="float-right mb-3">
                    <a href="/MiuStore/?role=client&mod=auth&action=forgotPassword">Quên mật khẩu?</a>
                    </div>
                    <br>
                    <?php foreach ($notifications as $notification) : ?>
                    <?php foreach ($notification['msgs'] as $msg): ?>
                        <span class="label label-lg label-light-<?php echo $notification['type'] ?> label-inline mb-3"><?php echo $msg ?></span>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                    <div class="form-group">
                        <!-- <button class="btn btn-primary"> Đăng nhập</button> -->
                        <!-- <label for="my-login">Email</label> -->
                        <input id="my-login" class="form-control bg-success text-white"  style="height:45px;"  type="submit" name="" value="Đăng nhập">
                    </div>
            </form>
            <div  style="margin-bottom:40px ;">
                Bạn chưa có tài khoản? <a href="dangky.html" style="color:#00a79e;">Đăng ký</a>
            </div>
 <!--ENd Đăng nhập-->
 


        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào bạn quay trở lại!</h1>
                    <p>Bạn vui lòng đăng nhập để tiếp tục trải nghiệm với chúng tôi.</p>
                    <img width="200px" style="margin-bottom: 10px;" src="public/image/dn.png" alt="">
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Chào, bạn!</h1>
                    <p>Bạn vui lòng đăng ký thông tin tại đây và bắt đầu là thành viên của chúng tôi.</p>
                    <img width="200px" style="margin-bottom: 30px;" src="public/image/dk.png" alt="">
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
    </script>
<!--ENd Đăng nhập-->
<?php require "layout/client/footer_client.php" ?>

