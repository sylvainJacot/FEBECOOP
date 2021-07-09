const tabs = document.querySelectorAll('[data-tab-target]');
const tabContents = document.querySelectorAll('.form-wrapper-item');

// console.log(tabs, tabContents)

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        const target = document.querySelector(tab.dataset.tabTarget);
        tabContents.forEach(tabContent => {
            tabContent.classList.remove('form-wrapper-item-active')
        })
        tabs.forEach(tab => {
            tab.classList.remove('tab-nav-item-active')
        })
        target.classList.add('form-wrapper-item-active')
        tab.classList.add('tab-nav-item-active')
    })
})