@mixin splash-h1($top,$left,$font_size) {
position: absolute;
top: $top;
left: $left;
height: 64px;
text-align: center;
font-size: $font_size;
font-weight: 900;
color: #ffffff;
font-family: Lato;
}

@mixin banner-path-left($top,$left ,$width, $height, $border) {
position: absolute;
background-color: #ffffff;
width: $width;
height: $height;
top: $top;
left: $left;
border-top: #e21936 solid 2.5px;
border-bottom-left-radius: $border;
}

@mixin banner-description($top, $left, $width, $height, $font_size) {
position: absolute;
top: $top;
left: $left;
width: $width;
height: $height;
text-align: center;
font-size: $font_size;
line-height: 1.8;
color: #ffffff;
font-family: Lato;
}

@mixin banner-path-right($top, $right, $width, $height, $border) {
position: absolute;
background-color: #ffffff;
width: $width;
height: $height;
top: $top;
right: $right;
border-top: #159bd7 solid 2.5px;
border-bottom-right-radius: $border;
}
section.elementor-section-banner{
position: relative;
}

.splash-banner {
object-fit: contain;
width: 100%;
margin: auto;
border-top: #014d93 solid 20px;

& .banner-description {
@include banner-description(32%, 34%, 592px, 64px, 18px);
}

img {
position: relative;
object-fit: contain;
width: 100%;
}

h1 {
@include splash-h1(17%, 34%, 40px)
}
}

.banner-path-left {
@include banner-path-left(45%, 24%, 400px, 300px, 36%);

& img {
width: 236px;
height: 51px;
margin: 34px 41px 16.5px 14.8px;
object-fit: contain
}

& .path-title {
margin: 0 0 10px 14.8px;
color: #e21936;
font-size: 20px;
font-weight: 900;
font-family: Lato;
}

& .path-description {
margin: 0 0 10px 14.8px;
font-size: 17px;
line-height: 16px;
letter-spacing: 0.27px;
font-family: Roboto;
}

& .path-link {
text-decoration: none;
color: #e21936;
font-size: 17px;
letter-spacing: 0.7px;
font-weight: 500;
margin: 0 0 10px 14.8px;
font-family: Roboto;
}
}

.banner-path-right {
@include banner-path-right(45%, 24%, 400px, 300px, 36%);

img {
width: 236px;
height: 51px;
margin: 34px 41px 16.5px 14.8px;
object-fit: contain
}

& .path-title {
margin: 0 0 10px 14.8px;
color: #159bd7;
font-size: 20px;
font-weight: 900;
font-family: Lato;
}

& .path-description {
margin: 0 0 10px 14.8px;
font-family: Roboto;
}

& .path-link {
margin: 0 0 10px 14.8px;
text-decoration: none;
color: #159bd7;
font-size: 17px;
letter-spacing: 0.7px;
font-weight: 500;
font-family: Roboto;
}
}

.splash-banner-about {
margin: auto;
margin-top: 70px;
max-width: 1140px;

& h2 {
text-align: left;
font-size: 38px;
font-weight: 900;
width: 75%;
line-height: 1.28;
letter-spacing: 0.75px;
margin: auto;
font-family: Lato;
}

& p {
width: 100%;
font-size: 15px;
line-height: 1.78;
letter-spacing: 0.27px;
font-family: Roboto;
}

& .mores {
display: flex;
justify-content: center;
text-align: center;
flex-wrap: wrap;

& a {
width: 46px;
height: auto;
margin: 0 0 0.5px 8px;
font-family: Roboto;
font-size: 19px;
font-weight: 500;
font-stretch: normal;
font-style: normal;
line-height: normal;
letter-spacing: 0.27px;
text-align: left;
color: #014d93;
}

& p {
margin: 20px 87px 1.5px 6.5px;
font-family: Roboto;
font-size: 8px;
font-weight: normal;
font-stretch: normal;
font-style: normal;
line-height: 2;
letter-spacing: 0.24px;
text-align: left;
color: #00b54e;
}
}
}

section.section-news{
background: #6794be3d;
}
.news-background {
max-width: 100%;
height: 584.5px;
margin: 69.5px 0 0 0;
padding: 85.1px 186.5px 115.2px 179.5px;
}

.splash-news {
margin: auto;
max-width: 1000px;

& .splash-news-up {
& .news-title {
font-family: Lato;
font-size: 38px;
font-weight: 900;
font-stretch: normal;
font-style: normal;
line-height: 1.28;
width: 75%;
letter-spacing: 0.75px;
text-align: left;
color: #000000;
}

& a {
margin: 0 0 0.5px 8px;
font-family: Roboto;
font-size: 20px;
font-weight: 700;
font-stretch: normal;
font-style: normal;
line-height: normal;
letter-spacing: 0.27px;
text-align: left;
color: #014d93;
float: right;
width: 50%;
}
}
}

.news-down-post {
.blog {
border-top: dotted black 2px;

& .news-down-channel {
font-family: Roboto;
font-size: 17px;
font-weight: 500;
margin: 25px 0 2px 0;
font-stretch: normal;
font-style: normal;
line-height: 1.29;
letter-spacing: 1.12px;
text-align: left;
color: #014d93;
}

& .news-down-title {
font-family: Lato;
font-size: 13px;
font-weight: bold;
font-stretch: normal;
font-style: normal;
margin-bottom: 5px;
line-height: 1.4;
letter-spacing: 0.3px;
text-align: left;
color: #000000;
}

& .news-down-date {
font-family: Roboto;
font-size: 12px;
font-weight: normal;
font-stretch: normal;
font-style: normal;
margin-bottom: 22px;
line-height: 1.43;
letter-spacing: 0.21px;
text-align: left;
color: #000000;
}
}
.bot {
border-bottom: dotted black 2px;
}
}

section.section-singup{
display: block;
position: relative;
padding-bottom: 130px;
}
.newsletter-signup {
.colour-block {
background-color: #014d93;
height: 375px;
border-radius: 0 100px 0 0;
z-index: 1;
position: relative;
margin-top: -100px;
.content {
width: 788px;
margin: 0 auto;

.Heading-H2 {
font-size: 50px;
font-weight: 900;
line-height: 1.2px;
font-family: 'Lato';
padding-top: 110px;
padding-left: -6%;
margin-left: -9%;
letter-spacing: 1.25px;
color: #fff;
}

.Rectangle-573 {
width: 260px;
margin-top: -24px;
margin-left: 55%;
padding: 8px 0;
padding: -6px 5px;
border-radius: 23px;
box-shadow: 1px 1.5px 0 0 rgba(0, 0, 0, 0.16);
border: solid 0.8px #fff;

p {
color: #fff;
font-size: 22px;
letter-spacing: 1px;
text-align: center;
margin-bottom: 0;
}
}

.subscribe {
font-size: 22px;
font-weight: 100;
line-height: 1.82;
font-family: 'Roboto';
margin: 95px 0 0 -9%;
letter-spacing: 1px;
color: #fff;
}

}

}

.newsletter-left {
position: absolute;
z-index: 0;
right: 0;
top: -2%;
}
}


@media only screen and (min-width: 320px) and (max-width: 767px) {
.splash-banner {
& h1 {
@include splash-h1(9%, 24%, 11px)
}

& .banner-description {
@include banner-description(29%, 6%, 88%, 64px, 7px)
}
}

.banner-path-left {
@include banner-path-left(15%, 14%, 32%, 70px, 21%);

& img {
width: 75px;
height: 31px;
margin: 1px 0px 1.5px 1px;
}

& .path-title {
margin: 1px 0 -6px 1px;
font-size: 9px;
}

& .path-description-up {
display: none;
}

& .path-description {
display: none;
}

& .path-link {
font-size: 8px;
letter-spacing: 0.2px;
margin: 0 0 7px 1px;
}
}

.banner-path-right {
@include banner-path-right(15%, 14%, 32%, 70px, 21%);

& img {
width: 75px;
height: 31px;
margin: 1px 0px 1.5px 0px;
}

& .path-title {
margin: 1px 0 -6px 0px;
font-size: 9px;
white-space: nowrap;
}

& .path-description {
display: none;
}

& .path-link {
font-size: 8px;
letter-spacing: 0.2px;
margin: 0 0 7px 0px;
}
}

.splash-banner-about {
margin: auto;
margin-top: 25px;
max-width: 90%;

& h2 {
text-align: left;
font-size: 15px;
width: 100%;
margin: initial;
}

& p {
width: 100%;
font-size: 10px;
line-height: 1.38;
letter-spacing: 0.27px;
display: block;
display: -webkit-box;
max-width: 100%;
height: auto;
margin: 0 0 11px 0;
font-size: 11px;
line-height: 1;
-webkit-line-clamp: 3;
-webkit-box-orient: vertical;
overflow: hidden;
text-overflow: ellipsis;
}

& .mores {
& a {
width: 109px;
height: auto;
margin: 0px 0 0.5px 0;
font-family: Roboto;
font-size: 9px;
font-weight: 500;
font-stretch: normal;
font-style: normal;
line-height: normal;
letter-spacing: 0.27px;
text-align: left;
color: #014d93;
}

& p {
font-size: 8px;
margin: 10px 3px 1.5px 0;
}
}
}

.news-background {
padding: 35.1px 0.5px 17.2px 17.5px;
margin-top: 21.5px;
height: auto;
}

.splash-news {
max-width: 100%;

& .splash-news-up {
& .news-title {
font-size: 19px;
width: 100%;
letter-spacing: 0.15px;
text-align: left;
color: #000000;
}

& a {
margin: 8px 11px 0.5px 5px;
font-size: 11px;
width: 54%;
text-align: right;
}
}
}

.news-down-title {
font-size: 17px;
}

.news-down-channel {
font-size: 15px;
margin: 15px 0 2px 0;
}
.news-down-date {
font-size: 9px;
margin-bottom: 17px;
}

.newsletter-signup {
.colour-block {
height: auto;
border-radius: none;

.content {

width: 100%;

.Heading-H2 {
font-size: 18px;
padding-top: 40px;
margin-left: 4.5%;
}

.Rectangle-573 {
margin-top: 30px;
margin-left: 4.5%;
width: 180px;

p {
font-size: 13px;
}
}

.subscribe {
margin: 60px 0 0 4.5%;
font-size: 13px;
width: 97%;
padding-bottom: 30px;
}

}

}

.newsletter-left {
top: 0;
width: 100%;
text-align: center;
position: relative;
display: none;
}
}
}

@media only screen and (min-width: 360px) {
.splash-banner {
& h1 {
@include splash-h1(10%, 25%, 12px)
}

& .banner-description {
@include banner-description(29%, 6%, 88%, 64px, 7px)
}
}

.splash-banner-about {
& .mores {
& a {
width: 100%;
height: auto;
margin: 0px 0 0.5px 0px;
font-size: 9px;
}

& p {
font-size: 8px;
margin: 10px 3px 1.5px 0;
}
}
}
}

@media only screen and (min-width: 414px) {
.splash-banner {
& h1 {
@include splash-h1(10%, 25%, 14px)
}

& .banner-description {
@include banner-description(29%, 6%, 88%, 64px, 7px)
}
}

.splash-banner-about {
& h2 {
font-size: 21px;
}

& p {
height: auto;
font-size: 13px;
line-height: 1.3;
}

& .mores {
& a {
width: 100%;
height: auto;
margin: 0px 0 0.5px 0px;
font-size: 9px;
}

& p {
font-size: 8px;
margin: 10px 3px 1.5px 0;
}
}
}

}

@media only screen and (min-width: 440px) {
.splash-banner {
& h1 {
@include splash-h1(11%, 26%, 14px)
}

& .banner-description {
@include banner-description(30%, 14%, 71%, 64px, 9px);
line-height: 1.6;
}
}

.banner-path-left {
@include banner-path-left(15%, 17%, 30%, 80px, 21%);

& img {
width: 100px;
height: 35px;
margin: 1px 0px 1.5px 1px;
}

& .path-title {
margin: 0px 0 0px 1px;
font-size: 11px;
}

& .path-description {
width: 85%;
font-size: 11px;
line-height: 1.38;
}

& .path-link {
font-size: 11px;
letter-spacing: 0.2px;
margin: 0 0 7px 1px;
}
}

.banner-path-right {
@include banner-path-right(15%, 17%, 30%, 80px, 21%);

& img {
width: 100px;
height: 35px;
margin: 1px 0px 1.5px 1px;
}

& .path-title {
margin: 0px 0 0px 1px;
font-size: 11px;
}

& .path-description {
width: 85%;
font-size: 11px;
line-height: 1.38;
}

& .path-link {
font-size: 11px;
letter-spacing: 0.2px;
margin: 0 0 7px 1px;
}
}

.splash-banner-about {
& .mores {
& a {
width: 100%;
height: auto;
margin: 0px 0 0.5px 0px;
font-size: 9px;
}

& p {
font-size: 8px;
margin: 10px 3px 1.5px 0;
}
}
}
}

@media only screen and (min-width: 480px) {
.banner-path-left {
@include banner-path-left(15%, 14%, 32%, 83px, 21%);
}

.banner-path-right {
@include banner-path-right(15%, 14%, 32%, 83px, 21%);
}

.splash-banner-about {
& .mores {
& a {
width: 100%;
height: auto;
margin: 0px 0 0.5px 0px;
font-size: 9px;
}

& p {
font-size: 8px;
margin: 10px 3px 1.5px 0;
}
}
}
}

@media only screen and (min-width: 520px) {
.splash-banner {
& h1 {
@include splash-h1(10%, 28%, 16px)
}

& .banner-description {
@include banner-description(29%, 6%, 88%, 64px, 11px)
}
}

.banner-path-left {
@include banner-path-left(22%, 14%, 32%, 90px, 21%);
}

.banner-path-right {
@include banner-path-right(22%, 14%, 32%, 90px, 21%);
}
}

@media only screen and (min-width: 576px) {
.splash-banner {
& h1 {
@include splash-h1(10%, 24%, 22px)
}

& .banner-description {
@include banner-description(30%, 14%, 71%, 64px, 12px);
line-height: 1.6;
}

}

.splash-banner-about {
max-width: 100%;
margin-top: 62px;

& h2 {
font-size: 22px;
}

& p {
font-size: 12px;
height: auto;
line-height: 1.6;
}
}

.banner-path-left {
@include banner-path-left(20%, 17%, 30%, 120px, 21%);

& img {
width: 75px;
height: 31px;
margin: 1px 0px 1.5px 6.8px;
}

& .path-title {
margin: 0px 0 0px 10.8px;
font-size: 12px;
}

& .path-description {
width: 85%;
font-size: 10px;
line-height: 1.38;
letter-spacing: 0.27px;
display: block;
display: -webkit-box;
max-width: 100%;
height: 27px;
margin: 6px 0 0px 10.8px;
-webkit-line-clamp: 3;
-webkit-box-orient: vertical;
overflow: hidden;
text-overflow: ellipsis;
}

& .path-link {
font-size: 10px;
letter-spacing: 0.2px;
margin: 0 0 7px 10.8px;
}
}

.banner-path-right {
@include banner-path-right(20%, 17%, 30%, 120px, 21%);

& img {
width: 75px;
height: 31px;
margin: 1px 0px 1.5px 6.8px;
}

& .path-title {
margin: 0px 0 0px 10.8px;
font-size: 12px;
}

& .path-description {
width: 85%;
font-size: 10px;
line-height: 1.38;
letter-spacing: 0.27px;
display: block;
display: -webkit-box;
max-width: 100%;
height: 27px;
margin: 6px 0 0px 10.8px;
font-size: 9px;
line-height: 1;
-webkit-line-clamp: 3;
-webkit-box-orient: vertical;
overflow: hidden;
text-overflow: ellipsis;
}

& .path-link {
font-size: 10px;
letter-spacing: 0.2px;
margin: 0 0 7px 10.8px;
}
}

.splash-news {
max-width: 76%;
}

.news-background {
padding: 50.1px 0.5px 17.2px 0.5px;
margin-top: 21.5px;
height: 515.5px;
}
.splash-news {
& .splash-news-up {
& .news-title {
font-size: 26px;
}

& a {
font-size: 14px;
}
}
}
}

@media only screen and (min-width: 672px) {
.splash-banner {
& h1 {
@include splash-h1(10%, 29%, 19px)
}

& .banner-description {
@include banner-description(24%, 14%, 71%, 64px, 11px)
}

& .splash-banner-about {
margin-top: 70px;

& h2 {
font-size: 20px;
}

& p {
font-size: 16px;
line-height: 1.6;
height: 124px;
}

& a {
font-size: 15px;
}
}
}

.banner-path-left {
@include banner-path-left(22%, 17%, 30%, 131px, 21%);

& img {
width: 90px;
height: 31px;
margin: 1px 0px 1.5px 10.8px;
}

& .path-title {
margin: 0px 0 0px 10.8px;
font-size: 13px;
}

& .path-description {
width: 85%;
font-size: 11px;
height: 33px;
margin: 6px 0 0px 10.8px;
}

& .path-link {
font-size: 10px;
margin: 0 0 7px 10.8px;
}
}

.banner-path-right {
@include banner-path-right(22%, 17%, 30%, 131px, 21%);

& img {
width: 90px;
height: 31px;
margin: 1px 0px 1.5px 10.8px;
}

& .path-title {
margin: 0px 0 0px 10.8px;
font-size: 13px;
}

& .path-description {
width: 85%;
font-size: 11px;
height: 33px;
margin: 6px 0 0px 10.8px;
font-size: 9px;
}

& .path-link {
font-size: 10px;
margin: 0 0 7px 10.8px;
}
}

.news-background {
padding: 57.1px 0.5px 17.2px 0.5px;
margin-top: 45.5px;
padding-bottom: 200px;
}

.splash-news {
& .splash-news-up {
& .news-title {
font-size: 35px;
}

& a {
font-size: 14px;
margin-top: 23px;
}
}
}

.news-down-post {
& .news-down-title {
font-size: 14px;
}

& .news-down-date {
font-size: 12px;
}
}

}

@media only screen and (min-width: 710px) {
.splash-banner {
& h1 {
@include splash-h1(10%, 29%, 19px)
}

& .banner-description {
@include banner-description(25%, 14%, 71%, 64px, 11px)
}

& .splash-banner-about {
margin-top: 70px;

& h2 {
font-size: 20px;
}

& p {
font-size: 16px;
line-height: 1.6;
height: 124px;
}

& a {
font-size: 15px;
}
}
}
}

@media only screen and (min-width: 768px) {
.splash-banner {
& h1 {
@include splash-h1(13%, 28%, 23px)
}

& .banner-description {
@include banner-description(30%, 14%, 71%, 64px, 12px)
}
}

.banner-path-left {
@include banner-path-left(25%, 15%, 32%, 154px, 21%);

& img {
width: 115px;
height: 31px;
margin: 1px 0px 1.5px 10.8px;
}

& .path-title {
margin: 5px 0 0px 10.8px;
font-size: 13px;
}

& .path-description {
width: 85%;
font-size: 13px;
height: 38px;
margin: 6px 0 7px 10.8px;
}

& .path-link {
font-size: 12px;
margin: 0 0 7px 10.8px;
}
}

.banner-path-right {
@include banner-path-right(25%, 15%, 30%, 154px, 21%);

& img {
width: 115px;
height: 31px;
margin: 1px 0px 1.5px 10.8px;
}

& .path-title {
margin: 5px 0 0px 10.8px;
font-size: 13px;
}

& .path-description {
width: 85%;
font-size: 13px;
height: 38px;
margin: 6px 0 7px 10.8px;
}

& .path-link {
font-size: 12px;
margin: 0 0 7px 10.8px;
}
}

.splash-banner-about {
& .mores {
flex-wrap: nowrap;

& a {
width: 27%;
height: 5px;
margin: 0;
font-size: 12px;
}

& p {
font-size: 11px;
margin: 0;
margin-top: -3px;
}
}
}

.newsletter-signup {
.colour-block {
.content {
.Heading-H2 {
font-size: 18px;
margin-left: 11.5%;
}

.Rectangle-573 {
margin-top: -20px;
margin-left: 34%;
width: 180px;

p {
font-size: 13px;
}
}

.subscribe {
padding-bottom: 0;
margin: 60px 0 0 11.5%;
font-size: 13px;
width: 58%;
}


}

}
}
}

@media only screen and (min-width: 930px) {
.banner-path-left {
@include banner-path-left(30%, 15%, 32%, 168px, 21%);

& img {
width: 115px;
height: 31px;
margin: 1px 0px 1.5px 10.8px;
}

& .path-title {
margin: 5px 0 0px 10.8px;
font-size: 13px;
}

& .path-description {
width: 85%;
font-size: 13px;
height: 42px;
margin: 6px 0 7px 10.8px;
line-height: 1.8;
}

& .path-link {
font-size: 12px;
margin: 0 0 7px 10.8px;
}
}

.banner-path-right {
@include banner-path-right(30%, 15%, 30%, 168px, 21%);

& img {
margin: 1px 0px 1.5px 10.8px;
}

& .path-title {
margin: 5px 0 0px 10.8px;
font-size: 13px;
}

& .path-description {
width: 85%;
font-size: 13px;
height: 42px;
margin: 6px 0 7px 10.8px;
line-height: 1.8;
}

& .path-link {
font-size: 12px;
margin: 0 0 7px 10.8px;
}
}
}

@media only screen and (min-width: 1024px) {
.splash-banner {
& h1 {
@include splash-h1(13%, 37%, 28px)
}

& .banner-description {
@include banner-description(30%, 14%, 71%, 64px, 18px)
}
}

.banner-path-left {
@include banner-path-left(52%, 15%, 32%, 180px, 21%);

& img {
width: 115px;
height: 31px;
margin: 1px 0px 1.5px 10.8px;
}

& .path-title {
margin: 5px 0 0px 10.8px;
font-size: 13px;
}

& .path-description {
width: 85%;
font-size: 13px;
height: 42px;
margin: 6px 0 7px 10.8px;
line-height: 1.8;
}

& .path-link {
font-size: 12px;
margin: 0 0 7px 10.8px;
}
}

.banner-path-right {
@include banner-path-right(52%, 15%, 30%, 180px, 21%);

& img {
width: 115px;
height: 31px;
margin: 1px 0px 1.5px 10.8px;
}

& .path-title {
margin: 5px 0 0px 10.8px;
font-size: 13px;
}

& .path-description {
width: 85%;
font-size: 13px;
height: 42px;
margin: 6px 0 7px 10.8px;
line-height: 1.8;
}

& .path-link {
font-size: 12px;
margin: 0 0 7px 10.8px;
}
}

.splash-banner-about {
margin-top: 100px;

& h2 {
font-size: 36px;
}

& p {
font-size: 16px;
height: 130px;
line-height: 1.6;
}

& .mores {
flex-wrap: nowrap;

& a {
width: 27%;
height: 5px;
margin: 0;
font-size: 17px;
}

& p {
font-size: 13px;
margin: 0;
margin-top: -3px;
}
}
}

.news-background {
margin-top: 90px;
}

.newsletter-signup {
.colour-block {
.content {
.Heading-H2 {
font-size: 32px;
margin-left: 15.5%;
}
.Rectangle-573 {
margin-top: -22px;
width: 200px;
margin-left: 52%;
p {
font-size: 16px;
}
}
.subscribe {
margin: 60px 0 0 15.5%;
font-size: 16px;
width: 72%;
}

}

}
}
}

@media only screen and (min-width: 1280px) and (max-width:1365px){
.newsletter-signup {
.colour-block {
.content {
.Heading-H2 {
font-size: 32px;
margin-left: 9.5%;
}
.Rectangle-573 {
margin-top: -22px;
width: 200px;
p {
font-size: 16px;
}
}
.subscribe {
margin: 60px 0 0 9.5%;
font-size: 16px;
}

}

}
}
}

@media only screen and (min-width: 1366px) and(max-width:1439px) {
.banner-path-left {
@include banner-path-left(45%, 15%, 32%, 180px, 21%);
}

.banner-path-right {
@include banner-path-right(45%, 15%, 30%, 180px, 21%);
}

.newsletter-signup {
.colour-block {
.content {
.Heading-H2 {
margin-left: 7.2%;
font-size: 50px;
}
.Rectangle-573 {
margin-top: -22px;
width: 200px;
margin-left: 60%;
}
.subscribe {
margin: 60px 0 0 7.2%;
font-size: 22px;
}

}

}
}
}

@media only screen and (min-width: 1440px) {
.splash-banner {
& h1 {
@include splash-h1(17%, 34%, 44px)
}

& .banner-description {
@include banner-description(32%, 20%, 61%, 64px, 23px);
}
}

.banner-path-left {
@include banner-path-left(52%, 21%, 27%, 300px, 21%);

img {
width: 236px;
height: 51px;
margin: 34px 41px 16.5px 14.8px;
object-fit: contain
}

& .path-title {
margin: 0 0 10px 14.8px;
color: #e21936;
font-size: 20px;
font-weight: 900;
}

& .path-description {
margin: 0 0 20px 14.8px;
font-size: 17px;
line-height: 1.8;
height: 68px;
letter-spacing: 0.27px;
}

& .path-link {
text-decoration: none;
color: #e21936;
font-size: 17px;
letter-spacing: 0.7px;
font-weight: 500;
margin: 0 0 10px 14.8px;
}
}

.banner-path-right {
@include banner-path-right(52%, 21%, 27%, 300px, 21%);

img {
width: 236px;
height: 51px;
margin: 34px 41px 16.5px 14.8px;
object-fit: contain
}

& .path-title {
margin: 0 0 10px 14.8px;
color: #e21936;
font-size: 20px;
font-weight: 900;
}

& .path-description {
margin: 0 0 20px 14.8px;
font-size: 17px;
line-height: 1.8;
height: 68px;
letter-spacing: 0.27px;
}

& .path-link {
text-decoration: none;
color: #e21936;
font-size: 17px;
letter-spacing: 0.7px;
font-weight: 500;
margin: 0 0 10px 14.8px;
}
}

.splash-banner-about {
margin-top: 190px;

& h2 {
font-size: 50px;
}

& p {
font-size: 24px;
height: auto;
line-height: 1.6;
margin-bottom: 50px;
}

& .mores {
flex-wrap: nowrap;

& a {
width: 27%;
height: 5px;
margin: 0;
font-size: 18px;
}

& p {
font-size: 16px;
margin: 0;
margin-top: -3px;
}
}
}

.news-background {
max-width: 100%;
height: 584.5px;
margin: 170px 0 0 0;
padding: 120.1px 186.5px 115.2px 179.5px;
}

.splash-news {
& .splash-news-up {
& .news-title {
font-size: 38px;
}
}
}

.newsletter-signup {
.colour-block {
.content {
.Heading-H2 {
font-size: 36px;
margin-left: 21.4%;
}
.Rectangle-573 {
margin-top: -22px;
width: 200px;
margin-left: 60%;
}
.subscribe {
margin: 60px 0 0 21.4%;
}

}

}
}

}

@media only screen and (min-width:1920px) {
.newsletter-signup {
.colour-block {
.content {
.Heading-H2 {
margin-left: 6.4%;
}
.subscribe {
margin: 60px 0 0 6.4%;
}

}

}
}
}