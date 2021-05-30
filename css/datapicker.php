<?php 

echo '/* Reset */
.ui-datepicker,
.ui-datepicker table,
.ui-datepicker tr,
.ui-datepicker td,
.ui-datepicker th {
	margin: 0;
	padding: 0;
	border: none;
	border-spacing: 0;
}

/* Calendar Wrapper */
.ui-datepicker {
	display: none;
	width: 294px;
	padding: 25px;
	cursor: default;

	text-transform: uppercase;
	   font-family: "Open Sans",sans-serif;
	font-size: 12px;

	background: #23282D;	

	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;

	-webkit-box-shadow: 0px 1px 1px rgba(255,255,255, .1), inset 0px 1px 1px rgb(0,0,0);
	-moz-box-shadow: 0px 1px 1px rgba(255,255,255, .1), inset 0px 1px 1px rgb(0,0,0);
	box-shadow: 0px 1px 1px rgba(255,255,255, .1), inset 0px 1px 1px rgb(0,0,0);
}

/* Calendar Header */
.ui-datepicker-header {
	position: relative;
	padding-bottom: 10px;
	border-bottom: 1px solid #d6d6d6;
}

.ui-datepicker-title { text-align: center; }

/* Month */
.ui-datepicker-month {
	position: relative;
	padding-right: 15px;
	color: #eee;
}

.ui-datepicker-month:before {
	display: block;
	position: absolute;
	top: 5px;
	right: 0;
	width: 5px;
	height: 5px;
	content: "";

	background: #008ec2;

	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
}

/* Year */
.ui-datepicker-year {
	padding-left: 8px;
	color: #eee;
}

/* Prev Next Month */
.ui-datepicker-prev,
.ui-datepicker-next {
	position: absolute;
	top: -2px;
	padding: 5px;
	cursor: pointer;
}

.ui-datepicker-prev {
	left: 0;
	padding-left: 0;
}

.ui-datepicker-next {
	right: 0;
	padding-right: 0;
}

.ui-datepicker-prev span,
.ui-datepicker-next span{
	display: block;
	width: 5px;
	height: 10px;
	text-indent: -9999px;

	background-image: url('.get_template_directory_uri().'/images/arrows.png);
}

.ui-datepicker-prev span { background-position: 0px 0px; }

.ui-datepicker-next span { background-position: -5px 0px; }

.ui-datepicker-prev-hover span { background-position: 0px -10px; }

.ui-datepicker-next-hover span { background-position: -5px -10px; }

.ui-datepicker-calendar th {
	padding-top: 15px;
	padding-bottom: 10px;
	
	text-align: center;
	font-weight: normal;
	color: #eee;
}

.ui-datepicker-calendar td {
	padding: 0 7px;
	
	text-align: center;
	line-height: 26px;
}
.ui-datepicker-calendar .ui-state-default {
	display: block;
	width: 26px;
	outline: none;

	text-decoration: none;
	color: #eee;
	
	border: 1px solid transparent;
}
.ui-datepicker-calendar .ui-state-active {
	color: #008EC2;
	border-color: #008EC2;
}
.ui-datepicker-other-month .ui-state-default { color: #565656; }';

?>