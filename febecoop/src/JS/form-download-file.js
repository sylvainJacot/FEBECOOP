let DownloadBtn = document.querySelector('#js-download-form');
let SubmitBtn = document.querySelector('#submit-form-digi-gratuit');




if(SubmitBtn) {
    SubmitBtn.addEventListener('click', () => {

        let EmailInput = document.querySelector('#js-ContainerEmail input[aria-invalid="true"]')
        
        if (EmailInput) {
            DownloadBtn.click();
        }

        DownloadBtn.click();
    
        
    })
}



// $(document).ready(function($){
//     $(document).on( 'frmFormComplete', function( event, form, response ) {
//     var formID = $(form).find('input[name="field_sxl7y"]').val();
//     console.log(formID);
//     DownloadBtn.click();
// });
// });