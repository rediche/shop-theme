document.addEventListener('DOMContentLoaded', function() {
  initNewsletter();
});

function initNewsletter() {
  const NEWSLETTER_FORM = document.querySelector('.newsletter__form');
  const NEWSLETTER_INPUT = document.querySelector('.newsletter__input');
  const NEWSLETTER_SUBMIT = document.querySelector('.newsletter__submit');
  const NEWSLETTER_THANKS = document.querySelector('.newsletter__thanks');
  const NEWSLETTER_ERROR = document.querySelector('.newsletter__error');

  if (!NEWSLETTER_FORM && !NEWSLETTER_INPUT && !NEWSLETTER_SUBMIT && !NEWSLETTER_THANKS && !NEWSLETTER_ERROR) return;

  NEWSLETTER_FORM.addEventListener('submit', function(event) {
    event.preventDefault();
    
    if (NEWSLETTER_INPUT.checkValidity() && NEWSLETTER_INPUT.value) {
      NEWSLETTER_ERROR.classList.remove('newsletter__error--show');
      NEWSLETTER_THANKS.classList.add('newsletter__thanks--show');
    } else {
      NEWSLETTER_ERROR.classList.add('newsletter__error--show');
    }
  });
}