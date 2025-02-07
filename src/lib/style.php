<style type="text/css">
a {text-decoration: none !important;}
  .hidden {
  display: none;
}

.sticky-button {
  position: fixed;
  background-color: #25d366;
  bottom: 20px;
  right: 20px;
  border-radius: 50px;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.1);
  z-index: 20;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 55px;
  height: 55px;
  -webkit-transition: all 0.2s ease-out;
  transition: all 0.2s ease-out;
  z-index: 999;
}

.sticky-button svg {
  margin: auto;
  fill: #fff;
  width: 35px;
  height: 35px;
}

.sticky-button a,
.sticky-button label {
  cursor: pointer;
  display: flex;
  align-items: center;
  width: 55px;
  height: 55px;
  -webkit-transition: all 0.3s ease-out;
  transition: all 0.3s ease-out;
}

.sticky-button label svg.close-icon {
  display: none;
}

.sticky-chat {
  position: fixed;
  bottom: 70px;
  right: 20px;
  width: 320px;
  -webkit-transition: all 0.3s ease-out;
  transition: all 0.3s ease-out;
  z-index: 21;
  opacity: 0;
  visibility: hidden;
}

.sticky-chat a {
  text-decoration: none;
  font-family: "Roboto", sans-serif;
  color: #505050;
}

.sticky-chat svg {
  width: 35px;
  height: 35px;
}

.sticky-chat .chat-content {
  border-radius: 10px;
  background-color: #fff;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.25);
  overflow: hidden;
  font-family: "Roboto", sans-serif;
  font-weight: 400;
}

.sticky-chat .chat-header {
  position: relative;
  display: flex;
  align-items: center;
  padding: 15px 20px;
  background-color: #25d366;
  overflow: hidden;
}

.sticky-chat .chat-header:after {
  content: "";
  display: block;
  position: absolute;
  bottom: 0;
  right: 0;
  width: 80px;
  height: 75px;
  background: rgba(0, 0, 0, 0.04);
  border-radius: 70px 0 5px 0;
}

.sticky-chat .chat-header svg {
  width: 35px;
  height: 35px;
  flex: 0 0 auto;
  fill: #fff;
}

.sticky-chat .chat-header .title {
  padding-left: 15px;
  font-size: 14px;
  font-weight: 600;
  font-family: "Roboto", sans-serif;
  color: #fff;
}

.sticky-chat .chat-header .title span {
  font-size: 11px;
  font-weight: 400;
  display: block;
  line-height: 1.58em;
  margin: 0;
  color: #f4f4f4;
}

.sticky-chat .chat-text {
  display: flex;
  flex-wrap: wrap;
  margin: 30px 20px;
  font-size: 12px;
}

.sticky-chat .chat-text span {
  display: inline-block;
  margin-right: auto;
  padding: 10px;
  background-color: #f0f5fb;
  border-radius: 0px 15px 15px;
}

.sticky-chat .chat-text span:after {
  content: "just now";
  display: inline-block;
  margin-left: 2px;
  font-size: 9px;
  color: #989b9f;
}

.sticky-chat .chat-text span.typing {
  margin: 15px 0 0 auto;
  padding: 10px;
  border-radius: 15px 0px 15px 15px;
}

.sticky-chat .chat-text span.typing:after {
  display: none;
}

.sticky-chat .chat-text span.typing svg {
  height: 13px;
  fill: #505050;
}

.sticky-chat .chat-button {
  display: flex;
  align-items: center;
  margin-top: 15px;
  padding: 12px 20px;
  border-radius: 10px;
  background-color: #fff;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.25);
  overflow: hidden;
  font-size: 12px;
  font-family: "Roboto", sans-serif;
  font-weight: 400;
}

.sticky-chat .chat-button svg {
  width: 20px;
  height: 20px;
  fill: #505050;
  margin-left: auto;
  transform: rotate(40deg);
  -webkit-transform: rotate(40deg);
}

.chat-menu:checked + .sticky-button label {
  -webkit-transform: rotate(360deg);
  transform: rotate(360deg);
}

.chat-menu:checked + .sticky-button label svg.chat-icon {
  display: none;
}

.chat-menu:checked + .sticky-button label svg.close-icon {
  display: table-cell;
}

.chat-menu:checked + .sticky-button + .sticky-chat {
  bottom: 90px;
  opacity: 1;
  visibility: visible;
}

.slick-slide {
    margin: 0px 20px;
}

.slick-slide img {
    width: 100%;
}

.slick-slider
{
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
            user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;
    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;
    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}/*
.imgq img{height: 300px;*/}
</style>