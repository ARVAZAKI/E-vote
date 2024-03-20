function toggleDropdown(dropdownId) {
  var dropdownContent = document.getElementById(dropdownId);

  if (dropdownContent.style.display === 'block') {
    dropdownContent.style.display = 'none';
  } else {
    hideAllDropdowns();

    dropdownContent.style.display = 'block';
  }
}

function hideAllDropdowns() {
  var dropdownContents = document.getElementsByClassName('dropdown-content');
  for (var i = 0; i < dropdownContents.length; i++) {
    dropdownContents[i].style.display = 'none';
  }
}

function showConfirmation(candidateId) {
  var confirmation = confirm('Yakin memilih kandidat ini?');
  if (confirmation) {
    console.log('User yakin memilih kandidat ' + candidateId);
  } else {
    console.log('User tidak yakin memilih kandidat ' + candidateId);
  }
}
