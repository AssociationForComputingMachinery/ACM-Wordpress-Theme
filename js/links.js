var link = window.location.hostname

var css = '#maincontent a[href^="http://"]:not([href*="'+link+'"]):after, #maincontent a[href^="http://"]:not([href*="'+link+'"]):after, #maincontent a[href^="https://"]:not([href*="'+link+'"]):after, #maincontent a[href^="https://"]:not([href*="'+link+'"]):after, #maincontent a[href^="//"]:not([href*="'+link+'"]):after, #maincontent a[href^="//"]:not([href*="'+link+'"]):after {content: "\\00a0\\f08e"} #maincontent a[href$=".xls"]:not([href*="'+link+'"]):after, #maincontent a[href$=".xlsx"]:not([href*="'+link+'"]):after, #maincontent a[href$=".xlsm"]:not([href*="'+link+'"]):after, #maincontent a[href$=".xlsb"]:not([href*="'+link+'"]):after {content: "\\00a0\\f1c3"} #maincontent a[href$=".doc"]:not([href*="'+link+'"]):after, #maincontent a[href$=".docx"]:not([href*="'+link+'"]):after {content: "\\00a0\\f1c2"} #maincontent a[href$=".pdf"]:not([href*="'+link+'"]):after {content: "\\00a0\\f1c1"} #maincontent a[href$=".ppt"]:not([href*="'+link+'"]):after, #maincontent a[href$=".pptx"]:not([href*="'+link+'"]):after {content: "\\00a0\\f1c4"} #maincontent a[href$=".mpg"]:not([href*="'+link+'"]):after, #maincontent a[href$=".mpeg"]:not([href*="'+link+'"]):after, #maincontent a[href$=".avi"]:not([href*="'+link+'"]):after, #maincontent a[href$=".wmv"]:not([href*="'+link+'"]):after, #maincontent a[href$=".mov"]:not([href*="'+link+'"]):after, #maincontent a[href$=".rm"]:not([href*="'+link+'"]):after, #maincontent a[href$=".ram"]:not([href*="'+link+'"]):after, #maincontent a[href$=".swf"]:not([href*="'+link+'"]):after, #maincontent a[href$=".flv"]:not([href*="'+link+'"]):after, #maincontent a[href$=".webm"]:not([href*="'+link+'"]):after, #maincontent a[href$=".mp4"]:not([href*="'+link+'"]):after {content: "\\00a0\\f1c8"} #maincontent a[href$=".mid"]:not([href*="'+link+'"]):after, #maincontent a[href$=".midi"]:not([href*="'+link+'"]):after, #maincontent a[href$=".wma"]:not([href*="'+link+'"]):after, #maincontent a[href$=".aac"]:not([href*="'+link+'"]):after, #maincontent a[href$=".wav"]:not([href*="'+link+'"]):after, #maincontent a[href$=".ogg"]:not([href*="'+link+'"]):after, #maincontent a[href$=".mp3"]:not([href*="'+link+'"]):after { content: "\\00a0\\f1c7"}',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

style.type = 'text/css';
if(style.styleSheet){
    style.styleSheet.cssText = css;
}
else{
    style.appendChild(document.createTextNode(css));
}

head.appendChild(style);
