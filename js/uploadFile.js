var profilePic = $("form #profilePic")[0];

var picName = profilePic.files[0].name;

var formatPic = picName.split(".")[1];

var formData = new FormData();

formData.append("fileData", profilePic.files[0]);

function setProfilePicCompany(id) {
  if (formatPic == "jpg" || formatPic == "png" || formatPic == "svg") {
    $.ajax({
      url: `https://cineasy.herokuapp.com/empresa/fotoempresa/${id}`,
      type: 'PUT',
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: () =>{ alert('Imagem trocada')}
    }).fail(function(err) {
      alert( "error" + err);
    })
  }else{
    alert('Formato de imagem não surpotado');
  }
}
function setProfilePicUser(id) {
  if (formatPic == "jpg" || formatPic == "png" || formatPic == "svg") {
    $.ajax({
      url: `https://cineasy.herokuapp.com/usuario/uploadperfil/${id}`,
      type: 'PUT',
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: () =>{ alert('Imagem trocada')}
    }).fail(function(err) {
      alert( "error" + err);
    })
  }else{
    alert('Formato de imagem não surpotado');
  }
}
function setBannerPicUser(id) {
  if (formatPic == "jpg" || formatPic == "png" || formatPic == "svg") {
    $.ajax({
      url: `https://cineasy.herokuapp.com/usuario/uploadcapa/${id}`,
      type: 'PUT',
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: () =>{ alert('Imagem trocada')}
    }).fail(function(err) {
      alert( "error" + err);
    })
  }else{
    alert('Formato de imagem não surpotado');
  }  
}
