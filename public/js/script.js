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

// SweetAllert2
const flashData = $(".flash-data").data("flashdata");

if (flashData) {
  Swal.fire({
    icon: "success",
    title: "RH Wedding Planner",
    text: flashData,
    showConfirmButton: false,
    timer: 1500,
  });
}

$(".btn-delete").on("click", function (e) {
  e.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "You will delete this data",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $(this).unbind("click").click();
    }
  });
});

$(".check-can-borrow").on("click", () => {
  console.log("ok");
  if ($(".check-can-borrow").val() == "1") {
    $(".check-can-borrow").val("0");
    console.log($(".check-can-borrow").val());
  } else {
    $(".check-can-borrow").val("1");
    console.log($(".check-can-borrow").val());
  }
});

function previewPdf() {
  const uploadFile = document.querySelector("#upload");
  const labelUpload = document.querySelector(".pdf-label");
  const previewPdf = document.querySelector(".preview-pdf");
  previewPdf.classList.remove("d-none");
  labelUpload.textContent = uploadFile.files[0].name;
  const content = new FileReader();
  content.readAsDataURL(uploadFile.files[0]);

  content.onload = function (e) {
    previewPdf.src = e.target.result;
  };
}
