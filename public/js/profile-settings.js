function previewImage(input) {
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const avatar = document.getElementById('profile-avatar');
      if (avatar) {
        avatar.src = e.target.result;
      }
    };
    reader.readAsDataURL(input.files[0]);
  }
}

window.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('profile-form');
  if (form) {
    form.onsubmit = function (e) {
      e.preventDefault();
      alert('Profile updated successfully!');
    };
  }
});


