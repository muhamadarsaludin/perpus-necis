function previewImg() {
  const uploadImage = document.querySelector("#image");
  const labelImage = document.querySelector(".image-label");
  const imgPreview = document.querySelector(".img-preview");

  labelImage.textContent = uploadImage.files[0].name;
  const content = new FileReader();
  content.readAsDataURL(uploadImage.files[0]);

  content.onload = function (e) {
    imgPreview.src = e.target.result;
  };
}
