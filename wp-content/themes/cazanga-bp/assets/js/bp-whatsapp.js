
  var weekday = ["Dom","Seg","Ter","Qua","Qui","Sex","Sab"];
  var dt = new Date();
  switch (weekday[dt.getDay()]){
    case 'Seg':
    case 'Ter':
    case 'Qua':
    case 'Qui':
    case 'Sex':
      if (parseInt(dt.getHours()) >= 9 && parseInt(dt.getHours()) < 18)
        jQuery('.texto-whatsapp').css('display', 'block');
      break;
    default:
  }