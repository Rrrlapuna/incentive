document
  .getElementById("dataForm")
  .addEventListener("submit", function (event) {
    var name = document.getElementById("task-name").value;
    var totalAmount = document.getElementById("total-amount").value;
    var advanceAmount = document.getElementById("advance-amount").value;
    var remainAmount = document.getElementById("remain-amount").value;

    if (!name || !totalAmount || !advanceAmount) {
      alert("All fields are required.");
      event.preventDefault();
      return;
    }

    if (isNaN(totalAmount)) {
      alert("Total Amount must be a numbers.");
      event.preventDefault();
      return;
    }
    if (isNaN(advanceAmount)) {
      alert("Advance Amount must be a numbers.");
      event.preventDefault();
      return;
    }
  });
