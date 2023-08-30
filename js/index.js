const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
const appendAlert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)
}

const alertTrigger = document.getElementById('liveAlertBtn')
if (alertTrigger) {
  alertTrigger.addEventListener('click', () => {
    appendAlert('Nice, you triggered this alert message!', 'success')
  })
}


/* EmailJS */
function sendMail()
{
  var info = {
      full_name: document.getElementById("full_name").value,
      email: document.getElementById("email").value,
      tele: document.getElementById("tele").value,
      message: document.getElementById("message").value
  };

  const serviceID = "service_neca54h";
  const template = "template_kwxqqwf"

emailjs.send(serviceID, template, info)
.then(
  res => {
    document.getElementById("full_name").value = "";
    document.getElementById("email").value = "";
    document.getElementById("tele").value = "";
    document.getElementById("message").value = "";

    console.log(res);

    alert("Votre message a été envoyé avec succès");
  })
  .catch(err => console.log(err));
  ;

}