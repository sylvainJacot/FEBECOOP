let DownloadBtn = document.querySelector('#js-download-form');
let SubmitBtn = document.querySelector('#submit-form-digi-gratuit');




if(SubmitBtn) {
    SubmitBtn.addEventListener('click', () => {
        let NameInput = document.querySelector('#js-ContainerName input[aria-invalid="false"]')
        let EmailInput = document.querySelector('#js-ContainerEmail input[aria-invalid="false"]')

        DownloadBtn.click();
        console.log(NameInput)
        console.log(EmailInput)

    })
}
