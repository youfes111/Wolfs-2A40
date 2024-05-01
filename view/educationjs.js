function showForm() {
    var formContainer = document.querySelector('.form-container');
    formContainer.style.display = (formContainer.style.display === 'none') ? 'block' : 'none';
  }


  function validateForm() {

 
    
    let photo = document.getElementById('profile-photo').value.trim();
    let emplacement = document.getElementById('emplacement').value.trim();
    let bac = document.getElementById('baccalaureat').value.trim();
    let etudiant = document.getElementById('etudiant').value.trim();
    let diplome = document.getElementById('diplome').value.trim();
  

    let isValid = true;

    
    if (photo === '') {
        isValid = false;
        setErrorFor(document.getElementById('profile-photo'), 'Le photo  ne doit pas etre vide');
        
    } else
    {
        setSuccessFor(document.getElementById('profile-photo'));
    }

    // Validation pour le emplacement 
    if (emplacement === 'Sélectionnez un emplacement') {
        isValid = false;
        setErrorFor(document.getElementById('emplacement'), 'Sélectionnez un emplacement !!!!');

    } 
    else{
        setSuccessFor(document.getElementById('emplacement'));

    }
    if (diplome === '') {
      isValid = false;
      setErrorFor(document.getElementById('diplome'), 'Sélectionnez un diplome !!!!');

  } 
  else{
      setSuccessFor(document.getElementById('diplome'));

  }
   return isValid;
   
  }

 
  


function setErrorFor(input, message) {
  let formControl = input.parentElement;
  let small = formControl.querySelector('small');
  formControl.className = 'form-control error';
  small.innerText = message;
}

function setSuccessFor(input) {
  let formControl = input.parentElement;
  formControl.className = 'form-control success';
}

