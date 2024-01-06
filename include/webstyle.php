body
{
	background-image: linear-gradient(white,#f2f2f2,white);
}
.mainbody
{
	width : 100%;
}
.mainbody .header
{
	height : 130px;
	background-color:white;
}
.header .img1
{
	width: 168px;
	height: 49px;
}
.header span
{
	font-size:30px;
	margin-left : 20px;
	font-weight : bold;
	font-family:"Times New Roman", Times, serif;
}
.header i
{
	float : right;
	margin : 30px;
}
.mainbody .header img
{
	width : 112px;
	height : 60px;
	margin : 3px 14px;
}
.header .btn1
{
	float : right;
	margin-top : 15px;
	margin-right : 15px;
}
.mainbody .bgimage img
{
	height : 600px;
	overflow : hidden;
	filter: blur(2px);
  -webkit-filter: blur(2px);
}
.bgimage h5
{
	color : black;
	font-weight : bold;
	font-size : 80px;
	font-family:"Times New Roman", Times, serif;
}
.bgimage p
{
	color : black;
	font-size : 20px;
	font-family:"Times New Roman", Times, serif;
}
.mainbody .navigationbar
{
	height : 58px;
	overflow : hidden;
	width : 100%;
	margin-top : -110px;
	background-color : #d9d9d9;
}
.navigationbar h6
{
	margin : 16px;
	font-size : 20px;
	display: inline-block;
	position: relative;
	font-family:"Times New Roman", Times, serif;
}
.navigationbar a
{
	text-decoration:none;
	color : black;
}
h6:after
{
	content: '';
	position: absolute;
	width: 100%;
	transform: scaleX(0);
	height: 1px;
	bottom: 0;
	left: 0;
	background-color: black;
	transform-origin: bottom right;
	transition: transform 0.25s ;
}
h6:hover:after
{
	transform: scaleX(1);
	transform-origin: bottom left;
}
a:active
{
	background-color : white;
}
.navigationbar i
{
	font-size : 13px;
}
.mainbody .container 
{
	margin : 60px;
	width : 100%;
	height : auto;
}
.container .card
{
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}
.container h3
{
	text-align : center;
	font-weight : bold;
	font-size : 40px;
	font-family:"Times New Roman", Times, serif;
	margin-bottom : 40px;
}
.container h5
{
	text-align : center;
	font-size : 18px;
	font-family:"Times New Roman", Times, serif;
	margin-bottom : 70px;
}
.container .btn2
{
	width: 15%;
	margin: -19px 0px 0px 62px;
	position: absolute;
}
.container a 
{
	color : black;
	text-align : center;
	text-decoration : none;
	font-size : 20px;
	font-family:"Times New Roman", Times, serif;
}
.mainbody .btn1
{
	text-decoration : none;
}
.mainbody .footer
{
	width: 100%;
	padding-top:10px;
	text-align: center;
	height: 400px;
	overflow:hidden;
	float:bottom;
	background-color : #747776;
	background-position : center;
	background-repeat : no-repeat;
	background-image : url(image/footer.jpg);
}
.footer a
{
	text-align : left;
	text-decoration:none;
	color : black;
}
.footer .up
{
	float : top;
	text-align : left;
	height : 320px;
	border-bottom: 1px dotted white;
}
.footer .down
{
	float : bottom;
	height : 77px;
	margin-top:10px;
}
.footer h4
{
	color : black;
	text-align : left;
	font-weight: bold;
	font-size : 30px;
	margin: 38px 0px 0px 19px;
	font-family:"Times New Roman", Times, serif;
}
.footer h6
{
	color : black;
	text-align : left;
	margin: 5px 0px 10px 19px;
	font-family:"Times New Roman", Times, serif;
}
.footer span
{
	color : black;
	margin-left : 25px;
	display: inline-block;
	position: relative;
	font-size : 20px;
	margin-top : 15px;
	font-family:"Times New Roman", Times, serif;
}
span:after
{
	content: '';
	position: absolute;
	width: 100%;
	transform: scaleX(0);
	height: 2px;
	bottom: 0;
	left: 0;
	background-color: white;
	transform-origin: bottom right;
	transition: transform 0.25s ease-out;
}
span:hover:after
{
	transform: scaleX(1);
	transform-origin: bottom left;
}