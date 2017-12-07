document.addEventListener('DOMContentLoaded', function() {
  initDemoNotice();
});

function initDemoNotice() {
  const demoNoticeClose = document.querySelector('[data-demo-notice-close]');
  const demoNotice = document.querySelector('.demo-notice');

  if (!demoNoticeClose || !demoNotice) return;

  if (readCookie('demoNoticeClose')) demoNotice.classList.remove('demo-notice--show');

  demoNoticeClose.addEventListener('click', function(event) {
    event.preventDefault();

    createCookie('demoNoticeClose', true, 1);
    demoNotice.classList.remove('demo-notice--show');
  });
}

/* From https://stackoverflow.com/a/24103596/7022831 */
function createCookie(name,value,days) {
  var expires = "";
  if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days*24*60*60*1000));
      expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

function eraseCookie(name) {
  createCookie(name,"",-1);
}