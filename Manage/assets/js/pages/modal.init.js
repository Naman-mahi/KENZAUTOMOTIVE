var exampleModal = document.getElementById("exampleModal");
exampleModal.addEventListener("show.bs.modal", function (event) {
  var relatedTarget = event.relatedTarget; // Button that triggered the modal
  var recipient = relatedTarget.getAttribute("data-bs-whatever"); // Extract info from data-* attributes

  var modalTitle = exampleModal.querySelector(".modal-title");
  var modalInput = exampleModal.querySelector(".modal-body input");

  // Update the modal's content
  modalTitle.textContent = "New message to " + recipient;
  modalInput.value = recipient;
});
