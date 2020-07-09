const Profile = (function(){
  let menu, sections, tabItems;

  const toggleActiveClass = (currentTabItem, currentSection) => {
    [].slice.call(sections).forEach(item => {
      item.classList.remove('active');
    });

    [].slice.call(tabItems).forEach(item => {
      item.classList.remove('active');
    });

    currentTabItem.classList.add('active');
    currentSection.classList.add('active');
  }

  const bindEvents = () => {
    const handleClickTabItem = event => {
      event.preventDefault();

      const currentTabItem = event.target;
      const itemType = currentTabItem.getAttribute('data-item-type');
      const currentSection = document.querySelector(`#${itemType}`);

      toggleActiveClass(currentTabItem, currentSection);
    }

    menu.addEventListener('click', event => {
      if(event.target.getAttribute('data-item-type')) {
        handleClickTabItem(event);
      }
    }, false);
  }

  const init = () => {
    menu = document.querySelector('.profile-menu');
    sections = document.querySelectorAll('.content-holder > div');
    tabItems = document.querySelectorAll('.profile-menu a');

    bindEvents();
  };

  return {
    init
  }

})();

function previewFile(input, image){
  input.change(function(){
    const file = $(this)[0].files[0];
    const fileReader = new FileReader;
  
    fileReader.onloadend = () => {
      image.attr('src', fileReader.result)
    }
    fileReader.readAsDataURL(file);
  })
}
function previewText(text, destiny) {
  text.change(() => {
    destiny.html(text[0].value)
  })
}
function setProfilePicUser(id) {
  let formData = new FormData();
  let profilePic = $('form #profilePic')[0];
  let formatPic = profilePic.files[0].name.split(".")[1];

  formData.append("fileData", profilePic.files[0]);

  if (formatPic == "jpg" || formatPic == "png" || formatPic == "svg") {
    $.ajax({
      url: `http://localhost:3000/usuarios/uploadperfil/${id}`,
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
  let formData = new FormData();
  let bannerPic = $('form #bannerPic')[0];
  let formatPic = bannerPic.files[0].name.split('.')[1];

  formData.append('fileCapa', bannerPic.files[0]);
  
  if (formatPic == "jpg" || formatPic == "png" || formatPic == "svg") {
    $.ajax({
      url: `http://localhost:3000/usuarios/uploadcapa/${id}`,
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
function setProfilePhrase(id, name) {
  alert('Oi')
  console.log(id, name)
  let formData = new FormData();

  let phrase = $('input[name="phrase"]');

  formData.append('nome', name)
  formData.append('frase', phrase.val());

  $.ajax({
    url: `http://localhost:3000/usuarios/editadados/${id}`,
    type: 'PUT',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: () => {
      alert('Frase Trocada')
    }
  }).fail(function(err) {
    alert("Tivemos um problema incomum" + err);
  })
}
previewFile($('.profile-pic input[name="profilePic"]'), $('.profile-pic img'));
previewFile($('.banner input[name="bannerPic"]'), $('.banner img'));
previewText($('.phrase input[name="phrase"]'), $('.cover-description'));

// $("form").submit(function(e){
//   e.preventDefault();
// });

window.addEventListener('load', Profile.init, false)