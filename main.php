<?php header("Content-type: text/css"); ?>

html
{
    color: white;
    text-align: center;
    font-family: Verdana;
}

h1
{
    font-size: 96px;
}

.form-btn
{
    color: white;
    width: 196px;
    height: 48px;
    line-height: 48px;
    background-color: #333;
    border: none;
}

/* Header */
.large-header {
	position: relative;
	width: 100%;
	background: #333;
	overflow: hidden;
	background-size: cover;
	background-position: center center;
	z-index: 1;
}

#large-header
{
    background-image: url("7NvodtH.jpg");
    background-size: 100%;
    background-position: fixed;
}

.main-title {
	position: absolute;
	margin: 0;
	padding: 0;
	color: #f9f1e9;
	text-align: center;
	top: 50%;
	left: 50%;
	-webkit-transform: translate3d(-50%,-50%,0);
	transform: translate3d(-50%,-50%,0);
}

.demo-1 .main-title {
	text-transform: uppercase;
	font-size: 4.2em;
	letter-spacing: 0.1em;
}

.main-title .thin {
	font-weight: 200;
}

@media only screen and (max-width : 768px) {
	.demo-1 .main-title {
		font-size: 3em;
	}
}