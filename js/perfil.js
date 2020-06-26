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

window.addEventListener('load', Profile.init, false)